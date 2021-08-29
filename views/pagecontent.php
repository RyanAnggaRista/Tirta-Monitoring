<?php
require '../control/metode.php';
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

        header {
            min-height: 100vh;
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
            margin-top: 50px;
            text-align: center;
            color: #fff;
            padding: 0 2rem;
        }

        .main__cards {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin: 15px;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 15px;
            border-radius: 10px;
            background: #282f36;
        }

        .card img {
            width: 50px;
        }

        .card_inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card_inner>span {
            font-size: 25px;
            font-weight: bolder;
            color: yellow;
        }

        .card_inner>p {
            text-decoration: none;
            font-size: 17px;
            color: white;
        }

        .main h1 {
            color: white;
            width: 100%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 17px;
        }

        .main h3 {
            color: white;
            width: 100%;
            text-align: center;
            margin-bottom: 5px;
        }

        .main-1 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin: 15px;
            z-index: 2;
        }

        .m-1 {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 15px;
            border-radius: 10px;
            background: #282f36;
        }

        #m-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .main-card-m-2 {
            color: white;
            display: flex;
            flex-direction: column;
            padding: 15px;
            border-radius: 5px;
            margin: 5px;
            background: #2f363f;
            font-size: 11px;
        }

        .area>h5 {
            text-align: center;
            color: yellow;
            font-size: 14px;
        }

        .kondisi {
            margin-bottom: 10px;
        }

        .cards>h1 {
            margin-bottom: 20px;
        }

        .normal {
            position: relative;
            display: block;
        }

        .bocor1 {
            position: absolute;
            display: none;
        }

        .bocor2 {
            position: absolute;
            display: none;
        }

        .bocor3 {
            position: absolute;
            display: none;
        }

        .bocor4 {
            position: absolute;
            display: none;
        }

        .bocor5 {
            position: absolute;
            display: none;
        }

        .bocor6 {
            position: absolute;
            display: none;
        }

        .bocor7 {
            position: absolute;
            display: none;
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
                height: fit-content;
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

            .main__cards {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-bottom: 0;
                margin-left: 15%;
                margin-right: 15%;
            }

            .main-1 {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-left: 15%;
                margin-right: 15%;
            }

            .m-1 {
                width: 100%;
                padding: 10px;
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
            .container {
                grid-template-columns: 1fr;
                grid-template-rows: 0.2fr 4.8fr;
                grid-template-areas:
                    "nav"
                    "main";
            }

            .card {
                height: fit-content;
                padding: 15px;
            }

            .card img {
                width: 50px;
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

            .main__cards {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-bottom: 0;
                margin-left: 15%;
                margin-right: 15%;
            }

            .main-1 {
                grid-template-columns: 1fr;
                gap: 10px;
                height: min-content;
                margin-left: 15%;
                margin-right: 15%;
            }

            .m-1 {
                height: fit-content;
                width: 70%;
                padding: 10px;
            }

            .bocor1 {
                height: 95%;
                width: 95%;
                left: 0;
                top: 30;
                padding: 10px;
            }

            .bocor2 {
                position: absolute;
                display: none;
            }

            .bocor3 {
                position: absolute;
                display: none;
            }

            .bocor4 {
                position: absolute;
                display: none;
            }

            .bocor5 {
                position: absolute;
                display: none;
            }

            .bocor6 {
                position: absolute;
                display: none;
            }

            .bocor7 {
                position: absolute;
                display: none;
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
                height: fit-content;
                width: fit-content;
                margin-top: 50px;
                margin-bottom: 25px;
                text-align: center;
                color: #fff;
                padding: 0 2rem;
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
                $('#bpnn').load("kontrol.php #bpnn");
                $('#count').load("kontrol.php #count");
                $('#area1').load("kontrol.php #area1");
                $('#area2').load("kontrol.php #area2");
                $('#area3').load("kontrol.php #area3");
                $('#area4').load("kontrol.php #area4");
                $('#area5').load("kontrol.php #area5");
                $('#area6').load("kontrol.php #area6");
                $('#area7').load("kontrol.php #area7");
                $('#nilai_nb1').load("kontrol.php #nilai_nb1");
                $('#nilai_nb2').load("kontrol.php #nilai_nb2");
                $('#nilai_nb3').load("kontrol.php #nilai_nb3");
                $('#nilai_nb4').load("kontrol.php #nilai_nb4");
                $('#nilai_nb5').load("kontrol.php #nilai_nb5");
                $('#nilai_nb6').load("kontrol.php #nilai_nb6");
                $('#nilai_nb7').load("kontrol.php #nilai_nb7");
            }, 1000
        );

        function AutoRefresh(t) {
            setTimeout("location.reload(true);", t);
        }
    </script>
</head>

<body onload="JavaScript:AutoRefresh(10000);">
    <div class="container">
        <div class="navbar">
            <div class="menu">
                <h3 class="logo">TIRTA<span>sistem</span></h3>
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="main">
                <header>
                    <div class="overlay">
                        <div class="inner">
                            <!-- MAIN CARDS STARTS HERE -->
                            <div class="main__cards">
                                <div class="card">
                                    <img class="gambar1" src="img/logo.png"></img>
                                    <div class="card_inner">
                                        <p>Jalur Pipa Distribusi</p>
                                        <span class="font-bold text-title">7</span>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="gambar1" src="img/logo.png"></img>
                                    <div class="card_inner">
                                        <p>Kebocoran yang Terdeteksi</p>
                                        <span class="font-bold text-title" id="count">
                                            <?php echo $count;
                                            ?></span>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="gambar1" src="img/logo.png"></img>
                                    <div class="card_inner">
                                        <p>Kondisi</p>
                                        <span class="font-bold text-title" id="bpnn">
                                            <?php echo $area;
                                            ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="main-1">
                                <div class="m-1">
                                    <img id="normal" class="normal" src="img/jalur2/kondisi0.png" alt="">
                                    <img id="bocor1" class="bocor1" src="img/jalur2/kondisi1.png" alt="">
                                    <img id="bocor2" class="bocor2" src="img/jalur2/kondisi2.png" alt="">
                                    <img id="bocor3" class="bocor3" src="img/jalur2/kondisi3.png" alt="">
                                    <img id="bocor4" class="bocor4" src="img/jalur2/kondisi4.png" alt="">
                                    <img id="bocor5" class="bocor5" src="img/jalur2/kondisi5.png" alt="">
                                    <img id="bocor6" class="bocor6" src="img/jalur2/kondisi6.png" alt="">
                                    <img id="bocor7" class="bocor7" src="img/jalur2/kondisi7.png" alt="">
                                </div>
                                <div class="m-1" id="m-2">
                                    <div class="main-card-m-2">
                                        <div class="area" id="area1">
                                            <h5>BPNN CABANG 1</h5>
                                            <p>Sensor 1 = <span class="font-bold text-title"><?php echo $flow1; ?></span> L/M</p>
                                            <p>Sensor 2 = <span class="font-bold text-title"><?php echo $flow2; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_1 font-bold text-title" id="span_bocor_1">
                                                    <?php print_r($bpnn_cabang1);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="area2">
                                            <h5>BPNN CABANG 2</h5>
                                            <p>Sensor 3 = <span class="font-bold text-title"><?php echo $flow3; ?></span> L/M</p>
                                            <p>Sensor 4 = <span class="font-bold text-title"><?php echo $flow4; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_2 font-bold text-title" id="span_bocor_2">
                                                    <?php print_r($bpnn_cabang2);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="area3">
                                            <h5>BPNN CABANG 3</h5>
                                            <p>Sensor 5 = <span class="font-bold text-title"><?php echo $flow5; ?></span> L/M</p>
                                            <p>Sensor 6 = <span class="font-bold text-title"><?php echo $flow6; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_3 font-bold text-title" id="span_bocor_3">
                                                    <?php print_r($bpnn_cabang3);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="area4">
                                            <h5>BPNN CABANG 4</h5>
                                            <p>Sensor 7 = <span class="font-bold text-title"><?php echo $flow7; ?></span> L/M</p>
                                            <p>Sensor 8 = <span class="font-bold text-title"><?php echo $flow8; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_4 font-bold text-title" id="span_bocor_4">
                                                    <?php print_r($bpnn_cabang4);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="main-card-m-2">
                                        <div class="area" id="area5">
                                            <h5>BPNN CABANG 5</h5>
                                            <p>Sensor 9 = <span class="font-bold text-title"><?php echo $flow9; ?></span> L/M</p>
                                            <p>Sensor 10 = <span class="font-bold text-title"><?php echo $flow10; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_5 font-bold text-title" id="span_bocor_5">
                                                    <?php print_r($bpnn_cabang5);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="area6">
                                            <h5>BPNN CABANG 6</h5>
                                            <p>Sensor 11 = <span class="font-bold text-title"><?php echo $flow11; ?></span> L/M</p>
                                            <p>Sensor 12 = <span class="font-bold text-title"><?php echo $flow12; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_6 font-bold text-title" id="span_bocor_6">
                                                    <?php print_r($bpnn_cabang6);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="area7">
                                            <h5>BPNN CABANG 7</h5>
                                            <p>Sensor 13 = <span class="font-bold text-title"><?php echo $flow13; ?></span> L/M</p>
                                            <p>Sensor 14 = <span class="font-bold text-title"><?php echo $flow14; ?></span> L/M</p>
                                            <p class="kondisi">Kondisi =
                                                <span class="span_bocor_7 font-bold text-title" id="span_bocor_7">
                                                    <?php print_r($bpnn_cabang7);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-1" id="m-2">
                                    <div class="main-card-m-2">
                                        <div class="area" id="nilai_nb1">
                                            <h5>NB CABANG 1</h5>
                                            <p>Sensor 1 = <span class="font-bold text-title"><?php echo $flow1; ?></span> L/M</p>
                                            <p>Sensor 2 = <span class="font-bold text-title"><?php echo $flow2; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_1 font-bold text-title" id="span_bocor_1">
                                                    <?php print_r($nb_cabang1);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="nilai_nb2">
                                            <h5>NB CABANG 2</h5>
                                            <p>Sensor 3 = <span class="font-bold text-title"><?php echo $flow3; ?></span> L/M</p>
                                            <p>Sensor 4 = <span class="font-bold text-title"><?php echo $flow4; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_2 font-bold text-title" id="span_bocor_2">
                                                    <?php print_r($nb_cabang2);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="nilai_nb3">
                                            <h5>NB CABANG 3</h5>
                                            <p>Sensor 5 = <span class="font-bold text-title"><?php echo $flow5; ?></span> L/M</p>
                                            <p>Sensor 6 = <span class="font-bold text-title"><?php echo $flow6; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_3 font-bold text-title" id="span_bocor_3">
                                                    <?php print_r($nb_cabang3);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="nilai_nb4">
                                            <h5>NB CABANG 4</h5>
                                            <p>Sensor 7 = <span class="font-bold text-title"><?php echo $flow7; ?></span> L/M</p>
                                            <p>Sensor 8 = <span class="font-bold text-title"><?php echo $flow8; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_4 font-bold text-title" id="span_bocor_4">
                                                    <?php print_r($nb_cabang4);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="main-card-m-2">
                                        <div class="area" id="nilai_nb5">
                                            <h5>NB CABANG 5</h5>
                                            <p>Sensor 9 = <span class="font-bold text-title"><?php echo $flow9; ?></span> L/M</p>
                                            <p>Sensor 10 = <span class="font-bold text-title"><?php echo $flow10; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_5 font-bold text-title" id="span_bocor_5">
                                                    <?php print_r($nb_cabang5);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="nilai_nb6">
                                            <h5>NB CABANG 6</h5>
                                            <p>Sensor 11 = <span class="font-bold text-title"><?php echo $flow11; ?></span> L/M</p>
                                            <p>Sensor 12 = <span class="font-bold text-title"><?php echo $flow12; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_6 font-bold text-title" id="span_bocor_6">
                                                    <?php print_r($nb_cabang6);
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="area" id="nilai_nb7">
                                            <h5>NB CABANG 7</h5>
                                            <p>Sensor 13 = <span class="font-bold text-title"><?php echo $flow13; ?></span> L/M</p>
                                            <p>Sensor 14 = <span class="font-bold text-title"><?php echo $flow14; ?></span> L/M</p>
                                            <p class="kondisi">Nilai =
                                                <span class="span_bocor_7 font-bold text-title" id="span_bocor_7">
                                                    <?php print_r($nb_cabang7);
                                                    ?>
                                                </span>
                                            </p>
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

    <script>
        var kondisi1 = document.getElementById('bocor1');
        var kondisi2 = document.getElementById('bocor2');
        var kondisi3 = document.getElementById('bocor3');
        var kondisi4 = document.getElementById('bocor4');
        var kondisi5 = document.getElementById('bocor5');
        var kondisi6 = document.getElementById('bocor6');
        var kondisi7 = document.getElementById('bocor7');

        var channel1 = "<?php echo $value_1; ?>"
        var channel2 = "<?php echo $value_2; ?>"
        var channel3 = "<?php echo $value_3; ?>"
        var channel4 = "<?php echo $value_4; ?>"
        var channel5 = "<?php echo $value_5; ?>"
        var channel6 = "<?php echo $value_6; ?>"
        var channel7 = "<?php echo $value_7; ?>"

        if (channel1 == "1") {
            kondisi1.style.display = "block";
        } else {
            kondisi1.style.display = "none";
        }
        if (channel2 == "1") {
            kondisi2.style.display = "block";
        } else {
            kondisi2.style.display = "none";
        }
        if (channel3 == "1") {
            kondisi3.style.display = "block";
        } else {
            kondisi3.style.display = "none";
        }
        if (channel4 == "1") {
            kondisi4.style.display = "block";
        } else {
            kondisi4.style.display = "none";
        }
        if (channel5 == "1") {
            kondisi5.style.display = "block";
        } else {
            kondisi5.style.display = "none";
        }
        if (channel6 == "1") {
            kondisi6.style.display = "block";
        } else {
            kondisi6.style.display = "none";
        }
        if (channel7 == "1") {
            kondisi7.style.display = "block";
        } else {
            kondisi7.style.display = "none";
        }
    </script>
</body>

</html>