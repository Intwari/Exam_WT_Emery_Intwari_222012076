<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Practices</title>
    <style>
        /* Additional CSS styles */
        .services, .call-to-action, .process {
            padding: 60px 0;
            text-align: center;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 20px; /* Spacing between grid items */
            padding: 20px;
        }

        .grid-item {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            cursor: pointer;
            text-decoration: none; /* Remove underline from links */
        }

        /* Gradient background */
        .grid-item:nth-child(odd) {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }

        .grid-item:nth-child(even) {
            background: linear-gradient(135deg, #283048, #859398);
        }

        /* Hover animation */
        .grid-item:hover:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.5);
            transition: transform 0.5s;
            z-index: -1;
        }

        .grid-item:hover {
            transform: scale(1.1);
            transition: transform 0.5s;
        }

        /* Text styles */
        h3, p {
            color: #fff;
            z-index: 1;
            position: relative;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <a href="index.php">
                <p>TONGUE MASTER .</p>
            </a>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="Home.php" class="link">Home</a></li>
                <li><a href="Courses.php" class="link">Courses</a></li>
                <li><a href="Practice.php" class="link active">Practices</a></li>
                <li><a href="Community.php" class="link">Community</a></li>
            </ul>
        </div>
    </nav>

    <section class="services">
        <div class="container">
            <div class="grid-container">
                <!-- Grid items -->
                <a href="practiceEnglish.php" class="grid-item">
                    <h3>Engish</h3>
                    <p>Practice French Vocabulary</p>
                </a>
                <a href="practiceFrench.php" class="grid-item">
                    <h3>French</h3>
                    <p>Practice French Vocabulary</p>
                </a>
                <a href="practiceDeutsch.php" class="grid-item">
                    <h3>Deutsch</h3>
                    <p>Practice Deutsch vocabulary</p>
                </a>
                <a href="practiceMandarin.php" class="grid-item">
                    <h3>Mandarin</h3>
                    <p>Practice Mandarin Vocabulary</p>
                </a>
                <a href="practiceKinyarwanda.php" class="grid-item">
                    <h3>Kinyarwanda</h3>
                    <p>Practice Kinyarwanda vocabulary</p>
                </a>
                <a href="practiceSpanish.php" class="grid-item">
                    <h3>Spanish</h3>
                    <p>Practice Spanish Vocabulary</p>
                </a>
            </div>
        </div>
    </section>
</div>
</body>
</html>
