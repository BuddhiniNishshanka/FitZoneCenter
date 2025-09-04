<?php
session_start();

if ($_SESSION['role'] !== 'customer') {
    header("Location: login.html;");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FitZone Fitness Center </title>
    <link rel="stylesheet" href="customers.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">
</head>

<body>
    <script src="script.js"></script>
    
    <header>

        <div class="logo">
            <img src="background/fitzone_logo.jpg" alt="fitzone_logo"> 
        </div>
                      
        <div class="main">
        
            <a href="#home" class="gymname"> FitZone <br><span> Fitness Center </span> <p>Kurunegala</p></a>
            
            <ul class="nav"> 
                <li class="active"><a href="#home"> Home </a></li>
                <li><a href="#about"> About </a></li>
                <li><a href="#services"> Services </a></li>
                <li><a href="customer_view_classes.php"> Classes </a></li>
                <li><a href="#trainer"> Trainers </a></li>
                <li><a href="customer_profile.php"> My Profile  </a></li>                
                
                <li><a href="logout.php"> Log out</a></li>
            </ul>
        </div>

        <h2 id="greetingMessage"></h2> 
        <div class="title">
            <h1> FitZone Fitness Center</h1>
        </div>

        <p class="overview"> 
            Whether you are a beginner or a fitness enthusiast, FitZone Fitness Center is  <br> your ultimate destination for health and well-being. <br>
            We provide top-notch equipment, expert trainers, and a variety of workout programs to reach your goals.
        </p>

    </header>

<!--About Section-->
    <section id="about" class="about">
        <div class="about-img" data-aos="zoom-in-up">
            <img src="background/about.jpg" alt="about">    
        </div>

        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading"> Why Choose  Us?</h2>
            <p>Whether you are a beginner or a fitness enthusiast, FitZone Fitness Center is your ultimate destination for health and well-being.</p>
            <p>We provide <a href="#equipment">top-notch equipment</a>, expert <a href="#trainers">trainers</a>, and a variety of workout <a href="#services">programs</a> to reach your goals.</p>
            <p><a href="mealplans.html" class="mealplans"> Meal Plans</a></p>
            <p><a href="healthyrecipes.html" class="healthyrecipes"> Healthy Recipes</a></p>
            <a href="customer_query.php" class="btn" type="button"> Submit a Query</a>
        </div>
    </section>

<!--Service Section-->
    <section class="services" id="services">
        <h2 class="heading" data-aos="zoom-in-down">Our <span>Services</span></h2>

        <div class="services-content" data-aos="zoom-in-up">
            <div class="row">
                <img src="services/yoga.jpg">
                <h4>Yoga</h4>
            </div>

            <div class="row">
                <img src="services/weight-gain.jpg">
                <h4> Weight Gain</h4>
            </div>

            <div class="row">
                <img src="services/strength_training.jpg">
                <h4> Strength Training</h4>
            </div>

            <div class="row">
                <img src="services/fatloss.jpg">
                <h4> Fat Loss</h4>
            </div>

            <div class="row">
                <img src="services/weightlifting.jpg">
                <h4> Weightlifting</h4>
            </div>

            <div class="row">
                <img src="services/running.jpg">
                <h4>Running</h4>
            </div>
        </div>
    </section>

<!--Equipment Section-->
    <section class="equipment" id="equipment">
        <h2 class="heading" data-aos="zoom-in-down">State-of-the-art <span>Equipment</span></h2>

        <div class="equipment-content" data-aos="zoom-in-up">
            <div class="row">
                <img src="equipment/yoga.jpg">
                <h4>Yoga</h4>
            </div>

            <div class="row">
                <img src="equipment/treadmill.jpg">
                <h4>Treadmills</h4>
            </div>

            <div class="row">
                <img src="equipment/exercise_bike.jpg">
                <h4>Exercise Bikes</h4>
            </div>

            <div class="row">
                <img src="equipment/dumbel.jpg">
                <h4>Dumbells & Barbells</h4>
            </div>

            <div class="row">
                <img src="equipment/kettlebells.jpg">
                <h4>Kettlebells</h4>
            </div>

            <div class="row">
                <img src="equipment/strength_smith_machine.jpg">
                <h4> Strength Smith Machine</h4>
            </div>

            <div class="row">
                <img src="equipment/battle_rope.jpg">
                <h4>Battle Rope</h4>
            </div>

            <div class="row">
                <img src="equipment/boxing.jpg">
                <h4>Boxing</h4>
            </div>
        </div>
    </section>


<!--Trainers Section-->
    <section class="trainer" id="trainer">
        <div class="trainer-box">

            <h2 class="heading" data-aos="zoom-in-down">Trai<span>ners</span> </h2>

            <div class="trainer-content" data-aos="zoom-in-up">

                <div class="box">
                    <h2> Tarja De Silva</h2>
                    <img src="trainers/tarja.jpg">
                    <p>Personal trainer, a lifestyle and weight management coach, a TRX suspension trainer and a Yoga Alliance Instructor.</p>
                    <ul>
                        <li> ACE Certified</li>
                        <li>Certifications from IKFF</li>
                        <li>Certifications from KetAcademy</li>
                    </ul>
                </div>

                <div class="box">
                    <h2> Mahumood Infaz </h2>
                    <img src="trainers/infaz.jpg">
                    <p> Member of the Royal College soccer team and is currently a trainer specialised in fat loss and muscle building. </p>
                        <ul>
                            <li> 2 years of experience in fitness and wellness training.</li>
                            <li> Specialized fat loss and muscle building training.</li>
                            <li> Specialized group and personal training.</li>
                            <li> Udemy fitness certification 2021 </li>
                            <li> Following ASCA Level 1 S&C coach accreditation course</li>
                        </ul>
                </div>

                <div class="box">
                    <h2> Shaqir Nawfer</h2>
                    <img src="trainers/shaqir.jpg">
                    <p> Wealth of experience in training many professional athletes and vast experience in sport as he was a high performing ruggerite of Royal College Colombo. </p>
                        <ul>
                            <li>Specialized in Performance Training National Level.</li>
                            <li>The Australian Strength & Conditioning Association (ASCA) Level 1 Trainer</li>
                            <li>LPL Dambulla Viiking trainer (2020)</li>
                        </ul>
                </div>

            </div>                
        </div>
    </section>








    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset:200,
            duration:700,
        });
    </script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>


</body>
</head>
<body>
    
</body>
</html>