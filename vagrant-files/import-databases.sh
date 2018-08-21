#!/bin/bash
FILES=/vagrant/vagrant-files/databases/*.sql

if test -n "$(find /vagrant/vagrant-files/databases/ -maxdepth 1 -name '*.sql' -print -quit)"
then
    for f in $FILES
    do
        echo "Importing database $(basename $f .sql) from $f"
        echo "create database $(basename $f .sql)" | mysql -u root
        mysql -u root $(basename $f .sql) < $f
    done
fi
