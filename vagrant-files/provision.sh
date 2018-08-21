#!/bin/bash

if [ ! -f ~/.vagrant-provisioned ]
then
    touch ~/.vagrant-provisioned

    LOG_FILE=/vagrant/vagrant-files/logs/vagrant-provision.log
    LOCAL_PROVISION_SCRIPT=/vagrant/vagrant-files/provision-local.sh

    export DEBIAN_FRONTEND=noninteractive

    echo "Updating Debian packages..."

    # update package lists
    apt-get -qq -y update &>> $LOG_FILE
    # upgrade all packages
    apt-get -qq -y upgrade &>> $LOG_FILE

    # install the vagrant apache vhost file
    cp /vagrant/vagrant-files/conf/apache2/vagrant.conf /etc/apache2/sites-available/
    cp /vagrant/vagrant-files/conf/php5/fpm/pool.d/vagrant.conf /etc/php5/fpm/pool.d/
    cp /vagrant/vagrant-files/conf/php5/fpm/conf.d/20-xdebug.ini /etc/php5/fpm/conf.d/

    echo "Importing database(s)..."

    # import all database files in the "vagrant-files/databases/" folder
    # this will create a database for each ".sql" file in that directory with the same name as the file
    sh /vagrant/vagrant-files/import-databases.sh

    # install custom MySQL init script that includes backup on service shutdown
    cp /vagrant/vagrant-files/init.d/mysql /etc/init.d/

    # set up automated hourly snapshots of database
    crontab -u root -l > /tmp/cron-root &>> $LOG_FILE
    echo "0 * * * * sh /vagrant/vagrant-files/dump-databases.sh auto" >> /tmp/cron-root
    crontab -u root /tmp/cron-root
    rm /tmp/cron-root

    echo "Finalizing configuration..."

    # enable the vagrant.localhost vhost and disable the default vhost
    a2ensite vagrant &>> $LOG_FILE
    a2dissite default &>> $LOG_FILE

    if [ -f $LOCAL_PROVISION_SCRIPT ]
    then
        echo "Running local provision script: $LOCAL_PROVISION_SCRIPT"
        /bin/bash $LOCAL_PROVISION_SCRIPT
    fi

    # restart services to apply new configurations
    service apache2 restart &>> $LOG_FILE
    service php5-fpm restart &>> $LOG_FILE
fi

echo ""
echo "-------------------------------------"
echo "Add the following to your hosts file:"
echo "127.0.0.1 vagrant.localhost"
echo "You can then access the server at the"
echo "hostname 'vagrant.localhost' on the"
echo "ports specified in the config file"
echo "-------------------------------------"
echo ""
