<!--the page that you land on after logi in or registration-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        .container {
            max-width: 800px;
            text-align: center;
        }

        .container h1,
        .container h2,
        .container label,
        .container button {
            color: #2f8481;
        }

        /* Add margin to the top of the form */
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: transparent; /* Make the form container transparent */
        }

        input[type="email"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Custom styles for the form */
        form {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-size: 18px;
            color: #2f8481;
            margin-bottom: 10px;
        }

        form select {
            width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgba(179, 205, 224, 0.3); 
        }

        form button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        form button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Custom animation for h3 */
        @keyframes moveText {
            0% { transform: translateY(0); letter-spacing: 0; }
            50% { transform: translateY(-10px); letter-spacing: 2px; }
            100% { transform: translateY(0); letter-spacing: 0; }
        }

        .container h3 {
            color: white;
            animation: moveText 2s infinite;
            margin-bottom: 20px; /* Add margin to the bottom of h3 */
        }
    </style>
    <title>Home</title>
</head>
<body>
    <nav class="nav">
        <div class="nav-logo">
        <a href="index.php">
    <p>TONGUE MASTER .</p>
</a>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="Home.php" class="link active">Home</a></li>
                <li><a href="Courses.php" class="link">COURSES</a></li>
                <li><a href="Practice.php" class="link">PRACTISE</a></li>
                <li><a href="Community.php" class="link">COMMUNITY</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" onclick="window.location.href='CreateContent.php'">Create</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Out</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <div class="container">
        <h3>Hello&nbsp;&nbsp;&nbsp;Hola&nbsp;&nbsp;&nbsp;Bonjour&nbsp;&nbsp;&nbsp;bite&nbsp;&nbsp;&nbsp;jambo&nbsp;&nbsp;&nbsp;Ciao&nbsp;&nbsp;&nbsp;Olá&nbsp;&nbsp;&nbsp;Привет</h3>

        <h1>Your Skills Your Pride</h1>
        <h2>Transform Your Life Into Multiple Languages</h2>
        <form action="Courses.php" method="get">
            <label for="language">Select a language</label>
            <select id="language" name="language">
                <option value="English">English</option>
                <option value="Deutsch">Deutsch</option>
                <option value="Mandarin">Mandarin</option>
                <option value="Français">Français</option>
            </select>
            <button type="submit">GET STARTED</button>
        </form>
    </div>
    <script>
        // Function to generate a random color
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Function to change the color of h1 and h2 inside the .container
        function changeColor() {
            var container = document.querySelector('.container');
            var h1 = container.querySelector('h1');
            var h2 = container.querySelector('h2');
            
            // Apply color change to h1 and h2
            var newColor = getRandomColor();
            h1.style.color = newColor;
            h2.style.color = newColor;
        }

        // Call the changeColor function every 2 seconds
        setInterval(changeColor, 1000);
    </script>
</body>
</html>
