<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIRTA Monitoring</title>
    <link rel="stylesheet" href="../asset/css/style-website.css">
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
            grid-area: nav;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 11;
            height: 3rem;
        }

        .container_ {
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
            transform-style: preserve-3d;
            transform-origin: left;
            transition: 0.5s;
            background-color: white;
        }

        .shadow.one {
            z-index: -1;
            opacity: 0.15;
        }

        .shadow.two {
            z-index: -2;
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

        @media only screen and (max-width: 500px) {
            .container {
                grid-template-columns: 1fr;
                grid-template-rows: 0.2fr 4.8fr;
                grid-template-areas:
                    "nav"
                    "main";
            }

            .title {
                font-size: 24px;
                color: yellow;
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

            .container.active .links a {
                animation: appear 0.5s forwards ease var(--i);
            }

            .container.active header {
                animation: hide 0.5s forwards ease;
            }
        }

        header {
            min-height: 100vh;
            width: 100%;
            background: url("img/wallpaper login.jpg") no-repeat top center / cover;
            position: relative;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(43, 51, 59, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inner {
            max-width: 35rem;
            text-align: center;
            color: #fff;
            padding: 0 2rem;
        }

        .title {
            font-size: 2.7rem;
        }

        .btn-a {
            margin-top: 1rem;
            padding: 0.6rem 1.8rem;
            background-color: #1179e7;
            border: none;
            border-radius: 25px;
            color: #fff;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: none;
        }

        #wntable {
            border-collapse: collapse;
            width: 100%;
        }

        #wntable td,
        #wntable th {
            border: 1px solid #ddd;
            padding: 20px;
        }

        #wntable th {
            padding-top: 15px;
            padding-bottom: 15px;
            text-align: center;
            background-color: #485461;
            color: white;
        }
    </style>
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
                            <h2 class="title">TUGAS AKHIR</h2>
                            <p>
                                RANCANG BANGUN SISTEM PERINGATAN DAN MONITORING KEBOCORAN PADA INSTALASI PIPA DISTRIBUSI
                                AIR BERSIH MENGGUNAKAN SENSOR NODE WSN
                            </p>
                            <br><br>
                            <table id="wntable">
                                <tr>
                                    <th>DATA COUNT</th>
                                    <th>DATA BANDING</th>
                                </tr>
                                <tr>
                                    <td><a class="btn-a" href="datacount/index.php">Count</a></td>
                                    <td><a class="btn-a" href="data/index.php">Banding</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>ss
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