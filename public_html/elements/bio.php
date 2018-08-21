<?php
$skills = [
    'HTML & CSS' => '90',
    'PHP' => '70',
    'JQuery/Javascript' => '60',
    'SQL' => '40',
    'React Native' => '40'
];
?>

<div class="col-sm-6">
    <h2>About</h2>
    <div class="bio">
        I've spent the last four years working with and learning everything I can get my hands on including HTML/CSS, PHP, Javascript,
        React Native, and tools such as Git/Source Tree, Vagrant, CLI, and more.
        I'm most comfortable in a LAMP stack and find working with data (backend) exciting and *gasp* fun.  I have a very
        strong work ethic, a passion for learning, and I am driven by setting and reaching goals.
    </div>

    <div class="bio">
        While working for my current organization, I have had the opportunity to build or work on large-scale, responsive websites
        for clients such as <a href="https://www.harkins.com" target="_blank">Harkins</a>, <a href="https://www.konagrill.com" target="_blank">Kona Grill</a>,
        and <a href="https://www.copperstate.com" target="_blank">Copperstate</a> as well as a handful of mobile apps using React Native.
    </div>
    <img src="/img/family.jpg" alt="Sam Hughes and Family" />
</div>
<div class="col-sm-6">
    <h2>Experience</h2>



    <div class="accordions">
        <?php foreach($skills as $skill => $skillLevel) { ?>
            <div class="accordion" data-status="closed">
                <h3 class="title"><?php echo $skill; ?> <i class="fa fa-plus"></i></h3>
                <div class="content">
                    <div class="meter meter-<?php echo $skillLevel; ?>">
                        <!--<div class="from">0</div>-->
                        <!--<div class="to">10</div>-->
                    </div>
                    <span class="teal">Skill Level: <?php echo $skillLevel; ?>%</span>
                </div>
            </div>
        <?php } ?>

        <div class="accordion" data-status="closed">
            <h3 class="title">Additional <i class="fa fa-plus"></i></h3>
            <div class="content">
                <ul>
                    <?php
                    $additionalSkills = ['Concrete5 CMS', 'AJAX', 'Payment Gateways (Square, Authorize.Net/Accept.js, Braintree)', 'Third Party Integrations such as Google APIs and Infusionsoft', 'Git', 'Sass/SCSS', 'OOP', 'CLI', 'Vagrant', 'Gulp', 'Composer', 'Laravel'];
                    foreach($additionalSkills as $skill){
                        echo '<li>' . $skill . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>