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
        and <a href="https://www.copperstate.com" target="_blank">Copperstate</a> as well as numerous mobile apps using React Native.
    </div>
    <img src="/img/family.jpg" alt="Sam Hughes and Family" />
</div>
<div class="col-sm-6">
    <h2>Experience</h2>

    <div class="accordions">
        <div class="accordion" data-status="open">
            <h3 class="title">HTML & CSS <i class="fa fa-plus"></i></h3>
            <div class="content">
                <div class="meter meter-90">
                    <!--<div class="from">0</div>-->
                    <!--<div class="to">10</div>-->
                </div>
                <span class="teal">Skill Level: 90%</span>
            </div>
        </div>

        <div class="accordion" data-status="closed">
            <h3 class="title">PHP <i class="fa fa-plus"></i></h3>
            <div class="content">
                <div class="meter meter-70">
                    <!--<div class="from">0</div>-->
                    <!--<div class="to">10</div>-->
                </div>
                <span class="teal">Skill Level: 70%</span>
            </div>
        </div>

        <div class="accordion" data-status="closed">
            <h3 class="title">JQuery <i class="fa fa-plus"></i></h3>
            <div class="content">
                <div class="meter meter-60">
                    <!--<div class="from">0</div>-->
                    <!--<div class="to">10</div>-->
                </div>
                <span class="teal">Skill Level: 60%</span>
            </div>
        </div>

        <div class="accordion" data-status="closed">
            <h3 class="title">Javascript <i class="fa fa-plus"></i></h3>
            <div class="content">
                <div class="meter meter-50">
                    <!--<div class="from">0</div>-->
                    <!--<div class="to">10</div>-->
                </div>
                <span class="teal">Skill Level: 50%</span>
            </div>
        </div>


        <div class="accordion" data-status="closed">
            <h3 class="title">SQL <i class="fa fa-plus"></i></h3>
            <div class="content">
                <div class="meter meter-40">
                    <!--<div class="from">0</div>-->
                    <!--<div class="to">10</div>-->
                </div>
                <span class="teal">Skill Level: 40%</span>
            </div>
        </div>

        <div class="accordion" data-status="closed">
            <h3 class="title">React Native <i class="fa fa-plus"></i></h3>
            <div class="content">
                <div class="meter meter-40">
                    <!--<div class="from">0</div>-->
                    <!--<div class="to">10</div>-->
                </div>
                <span class="teal">Skill Level: 40%</span>
            </div>
        </div>

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