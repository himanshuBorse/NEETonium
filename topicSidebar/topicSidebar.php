<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Toogle Sidebar</title>
</head>
<body>
    <div id="side-menu" class="sideMenu">
        <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
        <div class="main-menu">
            <h2>Side Menu</h2>
            <a href="#">Home</a>
            <a href="#">pressure</a>
            <a href="#">thermodynamics</a>
            <a href="#">dilution</a>
            <a href="#">Summary</a>
        </div>
    </div>

    <div id="content-area">
        <span style="font-size: 30px; cursor: pointer" onclick="openNav()">&#9776; ToogleMenu</span>
        <div class="content-text">
            <h2>Toggle Sidebar Navigation</h2>
            <h3>Html Css Javascript</h3>
        </div>
    </div>

    <script>
        console.log("slfjs;f");
        function openNav(){
            console.log("sglsg;sg");
            document.getElementById("side-menu").style.width = "300px";
            document.getElementById("content-area").style.width = "300px";
        }

        function closeNav(){
            document.getElementById("side-menu").style.width = "0";
            document.getElementById("content-area").style.width = "0";
        }
    </script>
</body>
</html>