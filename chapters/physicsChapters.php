<!--Start Header-->
<?php
        include ("../resources/mainInclude/header.php");
        include ("../resources/mainInclude/dbConnection.php");
        
        
    ?>
<!--End header-->





<div class="tabcontainer text-center">
    <h1 class="bg-warning " >Physics</h1>
</div>

    <div id="chapterTabs">
        <ul class="nav nav-tabs justify-content-center" >
            <li class="nav nav-item">
                <a class="nav-link tablinks active" data-rel="#content-11">11<sup>th</sup></a>
            </li>
            <li class="nav-item">
                <a class="nav-link tablinks" data-rel="#content-12">12<sup>th</sup></a>
            </li>
        </ul>

        <div class="text-center">
            <div class="container" id="content-11">
                <h4 class="bg-warning">11<sup>th</sup></h4>
                <div class="row mt-5 justify-content-center">
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=Physical World" class="tm-nav-link">
                            <span class="tm-mb-1 circle_chapter_number ">01</span>
                            <span>Physical World</span>
                             <div class="cardTotalQuestion">
                             <?php
                             try{
                                $sql = "SELECT * FROM mcq join chapter on chapter.chap_id = mcq.chap_id where chapter.chap_name = 'Physical World'  ";
                                $result = $conn->query($sql);
                                $incorrectAttemptCount = $result->num_rows;
                                echo $incorrectAttemptCount;
                             }
                             catch(Exception $e){
                                echo 'Message: ' .$e->getMessage();
                             }
                            ?>
                             </div>    
                        </a>
                        
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=Units and Measurement" class="tm-nav-link">
                            <span class="tm-mb-1r circle_chapter_number">02</span>
                            <span>Units and Measurements</span></a>
                            <div class="cardTotalQuestion">
                             <?php
                             try{
                                $sql = "SELECT * FROM mcq join chapter on chapter.chap_id = mcq.chap_id where chapter.chap_name = 'Units and Measurements'  ";
                                $result = $conn->query($sql);
                                $incorrectAttemptCount = $result->num_rows;
                                echo $incorrectAttemptCount;
                             }
                             catch(Exception $e){
                                echo 'Message: ' .$e->getMessage();
                             }
                            ?>
                             </div>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MOTION IN A STRAIGHT LINE" class="tm-nav-link">
                            <span class="tm-mb-1  text-center">03</span>
                            <span>Motion in a Straight Line</span></a>
                            
                        </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MOTION IN A PLANE" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">04</span> <span>Motion in a Plane</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=LAWS OF MOTION" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">05</span> <span>Laws of Motion</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=WORK, ENERGY AND POWER" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">06</span> <span>Work, Energy and Power</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=SYSTEM OF PARTICLES AND ROTATIONAL MOTION" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">07</span> <span>System of Particles and Rotational Motion</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=GRAVITATION" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">08</span> <span>Gravitation</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MECHANICAL PROPERTIES OF SOLIDS" class="tm-nav-link">
                            <span class="tm-mb-1  text-center">09</span> <span>Mechanical Properties of Solids</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MECHANICAL PROPERTIES OF FLUIDS" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">10</span> <span>Mechanical Properties of Fluids</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=THERMAL PROPERTIES OF MATTER" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">11</span> <span>Thermal Properties of Matter</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=THERMODYNAMICS" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">12</span> <span>Thermodynamics</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=KINETIC THEORY" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">13</span> <span>Kinetic Theory</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=KINETIC THEORY" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">14</span> <span>Oscillations</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=KINETIC THEORY" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">15</span> <span>Waves</span></a>
                    </div>
                </div>
            </div>
            <div class="container" id="content-12">
                <h4 class="bg-warning">12<sup>th</sup></h4>
                <div class="row mt-5 justify-content-center">
                <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=PHYSICAL WORLD" class="tm-nav-link">
                            <span class="tm-mb-1 ">01</span>
                            <span>Electric Charges and Fields</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=UNITS AND MEASUREMENTS" class="tm-nav-link">
                            <span class="tm-mb-1">02</span> <span>Electrostatic Potential and Capacitance</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MOTION IN A STRAIGHT LINE" class="tm-nav-link">
                            <span class="tm-mb-1  text-center">03</span> <span>Current Electricity</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MOTION IN A PLANE" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">04</span> <span>Moving Charges and Magnetism</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=LAWS OF MOTION" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">05</span> <span>Magnetism and Matter</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=WORK, ENERGY AND POWER" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">06</span> <span>Electromagnetic Induction</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=SYSTEM OF PARTICLES AND ROTATIONAL MOTION" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">07</span> <span>Alternating Current</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=GRAVITATION" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">08</span> <span>Electromagnetic Waves</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MECHANICAL PROPERTIES OF SOLIDS" class="tm-nav-link">
                            <span class="tm-mb-1  text-center">09</span> <span>Ray Optics and Optical Instruments</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=MECHANICAL PROPERTIES OF FLUIDS" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">10</span> <span>Wave Optics</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=THERMAL PROPERTIES OF MATTER" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">11</span> <span>Dual Nature of Radiation and Matter</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=THERMODYNAMICS" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">12</span> <span>Atoms</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=KINETIC THEORY" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">13</span> <span>Nuclei</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=KINETIC THEORY" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">14</span> <span>Semiconductor Electronics: Materials, Devices and Simple Circuits</span></a>
                    </div>
                    <div class="card card-custom mx-2 mb-3">
                        <a href="../quiz/quiz.php?q=KINETIC THEORY" class="tm-nav-link">
                            <span class="tm-mb-1 text-center">15</span> <span>Communication Systems</span></a>
                    </div>
                </div>
            </div>
        </div>

       

        </div>
    </div>


</div <!--Start Header-->
<?php
        include ("../resources/mainInclude/footer.php");
    ?>
<!--End header-->