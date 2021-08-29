<?php
require "../control/metode.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIRTA Monitoring</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        header {
            min-height: fit-content;
            width: 100%;
            background: url("img/wallpaper login.jpg") no-repeat top center / cover;
            position: relative;
        }

        .overlay {
            position: relative;
            width: 100%;
            height: fit-content;
            top: 0;
            left: 0;
            background-color: rgba(43, 51, 59, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inner {
            width: fit-content;
            margin-top: 50px;
            text-align: center;
            color: #fff;
            padding: 0 2rem;
        }

        .inner>h1 {
            margin-top: 30px;
        }

        .database_cards {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
            margin: 30px;
        }

        .card ul {
            display: inline-flex;
            list-style-type: none;
            gap: 125px;
        }

        .card ul li {
            list-style: none;
            margin: 0 10px;
            color: #ffffff;
            text-decoration: none;
        }

        .data_area {
            border-radius: 8px;
            background-color: #008CBA;
            transition-duration: 0.4s;
            border: none;
            color: white;
            padding: 0px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
        }

        .data_area:hover {
            color: #008CBA;
            background-color: white;
            cursor: pointer;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 15px;
            border-radius: 10px;
            background: #282f36;
        }

        .card>h1 {
            text-align: left;
        }

        .card2 {
            display: grid;
            flex-direction: column;
            grid-template-columns: 1fr 1fr;
            margin: 5px;
            padding: 1px;
            border-radius: 10px;
            background: #2f363f;
        }

        .card_inner {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
            background: #2f363f;
            border-style: ridge;
            border-color: white;
            border-width: 1px;
        }

        .card_inner>p {
            text-decoration: none;
            font-size: 15px;
            color: white;
            text-align: left;
        }

        .card_inner>p>span {
            text-decoration: none;
            font-size: 15px;
            color: yellow;
        }

        .main h1 {
            color: white;
            width: 100%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 20px;
        }

        .main h3 {
            color: white;
            width: 100%;
            text-align: center;
            margin-bottom: 5px;
        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        button {
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 11;
            height: 3rem;
        }

        .container {
            min-height: 100vh;
            width: 100%;
            background-color: #485461;
            background-image: linear-gradient(135deg, #485461 0%, #28313b 74%);
            overflow-x: hidden;
            transform-style: preserve-3d;
        }

        .menu {
            max-width: 72rem;
            width: 100%;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }

        .logo {
            font-size: 1.1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 4rem;
        }

        .logo span {
            font-weight: 300;
        }

        .hamburger-menu {
            height: 4rem;
            width: 3rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .bar {
            width: 1.9rem;
            height: 1.5px;
            border-radius: 2px;
            background-color: #eee;
            transition: 0.5s;
            position: relative;
        }

        .bar:before,
        .bar:after {
            content: "";
            position: absolute;
            width: inherit;
            height: inherit;
            background-color: #eee;
            transition: 0.5s;
        }

        .bar:before {
            transform: translateY(-9px);
        }

        .bar:after {
            transform: translateY(9px);
        }

        .main {
            position: relative;
            width: 100%;
            left: 0;
            z-index: 5;
            overflow: hidden;
            transform-origin: left;
            transform-style: preserve-3d;
            transition: 0.5s;
        }

        .sidebar_responsive {
            display: inline !important;
            z-index: 9999 !important;
            left: 0 !important;
            position: absolute;
        }

        .container.active .bar {
            transform: rotate(360deg);
            background-color: transparent;
        }

        .container.active .bar:before {
            transform: translateY(0) rotate(45deg);
        }

        .container.active .bar:after {
            transform: translateY(0) rotate(-45deg);
        }

        .container.active .main {
            animation: main-animation 0.5s ease;
            cursor: pointer;
            transform: perspective(1300px) rotateY(20deg) translateZ(310px) scale(0.5);
        }

        @keyframes main-animation {
            from {
                transform: translate(0);
            }

            to {
                transform: perspective(1300px) rotateY(20deg) translateZ(310px) scale(0.5);
            }
        }

        .links {
            position: fixed;
            width: 30%;
            right: 0;
            top: 0;
            height: 100vh;
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul {
            list-style: none;
        }

        .links a {
            text-decoration: none;
            color: #eee;
            padding: 0.7rem 0;
            display: inline-block;
            font-size: 1rem;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            opacity: 0;
            transform: translateY(10px);
            animation: hide 0.5s forwards ease;
        }

        .links a:hover {
            color: #fff;
        }

        .container.active .links a {
            animation: appear 0.5s forwards ease var(--i);
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        @keyframes hide {
            from {
                opacity: 1;
                transform: translateY(0px);
            }

            to {
                opacity: 0;
                transform: translateY(10px);
            }
        }

        .shadow {
            position: absolute;
            width: 100%;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: -3;
            transform-style: preserve-3d;
            transform-origin: left;
            transition: 0.5s;
            background-color: white;
        }

        .shadow.one {
            z-index: -4;
            opacity: 0.15;
        }

        .shadow.two {
            z-index: -5;
            opacity: 0.1;
        }

        .container.active .shadow.one {
            animation: shadow-one 0.6s ease-out;
            transform: perspective(1300px) rotateY(20deg) translateZ(215px) scale(0.5);
        }

        .container.active .main:hover+.shadow.one {
            transform: perspective(1300px) rotateY(20deg) translateZ(230px) scale(0.5);
        }

        .container.active .main:hover {
            transform: perspective(1300px) rotateY(20deg) translateZ(340px) scale(0.5);
        }

        @media only screen and (max-width: 1000px) {
            .container {
                grid-template-columns: 1fr;
                grid-template-rows: 0.2fr 4.8fr;
                grid-template-areas:
                    "nav"
                    "main";
            }

            .card {
                height: 100%;
                padding: 15px;
            }

            #sidebar {
                display: none;
            }

            .sidebar__title>i {
                display: inline;
            }

            .nav_icon {
                display: inline;
            }

            .database_cards {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .menu {
                padding: 0 1.5rem;
            }

            .menu ul li a {
                display: none;
            }

            .main {
                padding: 0 1.5rem;
            }

            .inner {
                width: 100vh;
                margin-top: 50px;
                margin-bottom: 25px;
                text-align: center;
                color: #fff;
                padding: 0 2rem;
            }
        }

        @media only screen and (max-width: 500px) {

            .menu {
                padding: 0 1.5rem;
            }

            .menu ul li a {
                display: none;
            }

            .main {
                padding: 0 1.5rem;
            }

            .inner {
                width: 100vh;
                margin-top: 50px;
                margin-bottom: 25px;
                text-align: center;
                color: #fff;
                padding: 0 2rem;
            }

            .container {
                grid-template-columns: 1fr;
                grid-template-rows: 0.2fr 4.8fr;
                grid-template-areas:
                    "nav"
                    "main";
            }

            #sidebar {
                display: none;
            }

            .sidebar__title>i {
                display: inline;
            }

            .nav_icon {
                display: inline;
            }

            .database_cards {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-bottom: 25px;
            }

            .card {
                height: fit-content;
                width: 100%;
                padding: 15px;
            }

            .card ul {
                display: inline-flex;
                list-style-type: none;
            }

            .card ul li {
                list-style: none;
                margin: 0 5px;
                color: #ffffff;
                text-decoration: none;
            }

            .container.active .links a {
                animation: appear 0.5s forwards ease var(--i);
            }

            .container.active header {
                animation: hide 0.5s forwards ease;
            }

        }
    </style>

    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#sensor1').load("kontrol.php #sensor1");
                $('#sensor2').load("kontrol.php #sensor2");
                $('#sensor3').load("kontrol.php #sensor3");
                $('#sensor4').load("kontrol.php #sensor4");
                $('#sensor5').load("kontrol.php #sensor5");
                $('#sensor6').load("kontrol.php #sensor6");
                $('#sensor7').load("kontrol.php #sensor7");
                $('#sensor8').load("kontrol.php #sensor8");
                $('#sensor9').load("kontrol.php #sensor9");
                $('#sensor10').load("kontrol.php #sensor10");
                $('#sensor11').load("kontrol.php #sensor11");
                $('#sensor12').load("kontrol.php #sensor12");
                $('#sensor13').load("kontrol.php #sensor13");
                $('#sensor14').load("kontrol.php #sensor14");
            }, 1000
        );
    </script>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="menu">
                <h3 class="logo">TIRTA<span>sistem</span></h3>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="main">
                <header>
                    <div class="overlay">
                        <div class="inner">
                            <h1>Monitoring Data Sensor</h1>
                            <div class="database_cards">
                                <div class="card">
                                    <ul>
                                        <li>Area 1</li>
                                        <li><a href="pagearea/pagearea1.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor1">
                                            <h5>Sensor 1</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow1; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume1; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan1; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor2">
                                            <h5>Sensor 2</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow2; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume2; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan2; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <ul>
                                        <li>Area 2</li>
                                        <li><a href="pagearea/pagearea2.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor3">
                                            <h5>Sensor 3</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow3; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume3; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan3; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor4">
                                            <h5>Sensor 4</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow4; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume4; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan4; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <ul>
                                        <li>Area 3</li>
                                        <li><a href="pagearea/pagearea3.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor5">
                                            <h5>Sensor 5</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow5; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume5; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan5; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor6">
                                            <h5>Sensor 6</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow6; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume6; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan6; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <ul>
                                        <li>Area 4</li>
                                        <li><a href="pagearea/pagearea4.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor7">
                                            <h5>Sensor 7</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow7; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume7; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan7; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor8">
                                            <h5>Sensor 8</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow8; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume8; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan8; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <ul>
                                        <li>Area 5</li>
                                        <li><a href="pagearea/pagearea5.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor9">
                                            <h5>Sensor 9</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow9; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume9; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan9; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor10">
                                            <h5>Sensor 10</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow10; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume10; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan10; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <ul>
                                        <li>Area 6</li>
                                        <li><a href="pagearea/pagearea6.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor11">
                                            <h5>Sensor 11</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow11; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume11; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan11; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor12">
                                            <h5>Sensor 12</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow12; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume12; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan12; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <ul>
                                        <li>Area 7</li>
                                        <li><a href="pagearea/pagearea7.php" style="--i: 0.3s;"><button class="data_area">></button></a></li>
                                    </ul>
                                    <div class="card2">
                                        <div id="sensor13">
                                            <h5>Sensor 13</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow13; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume13; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan13; ?></span> m/s</p>
                                        </div>
                                        <div id="sensor14">
                                            <h5>Sensor 14</h5>
                                            <br>
                                            <p>Q = <span><?php echo $flow14; ?></span> L/min</p>
                                            <p>V = <span><?php echo $volume14; ?></span> L</p>
                                            <p>v = <span><?php echo $kecepatan14; ?></span> m/s</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="shadow one"></div>
            <div class="shadow two"></div>
        </div>

        <div class="links">
            <ul>
                <li>
                    <a href="pagedashboard.php" style="--i: 0.05s;">Home</a>
                </li>
                <li>
                    <a href="pagecontent.php" style="--i: 0.1s;">Monitoring</a>
                </li>
                <li>
                    <a href="pagedatabase.php" style="--i: 0.15s;">Database</a>
                </li>
                <li>
                    <a href="pagetesting.php" style="--i: 0.15s;">Testing</a>
                </li>
                <li>
                    <a href="pageabout.php" style="--i: 0.25s;">About</a>
                </li>
                <li>
                    <a href="../index.php" style="--i: 0.3s;">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="../asset/js/js_website.js"></script>
</body>

</html>