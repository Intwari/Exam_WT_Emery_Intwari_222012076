<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Login & Registration</title>
</head>
<body onload="login()">
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <a href="index.php">
                <p>TONGUE MASTER .</p>
            </a>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="home.php" class="link active">welcome</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <div class="form-box">
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form id="loginForm" action="login.php" method="POST" onsubmit="submitLoginForm(event)">
                <div class="input-box">
                    <input type="email" id="username_or_email" class="input-field" name="email" placeholder="Email" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" id="password" class="input-field" name="password" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form id="registerForm" onsubmit="submitRegisterForm(event)" action="register.php" method="POST">
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" name="firstname" class="input-field" placeholder="Firstname">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="lastname" class="input-field" placeholder="Lastname">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="email" class="input-field" placeholder="Email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Terms & conditions</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function myMenuFunction() {
        var i = document.getElementById("navMenu");
        if (i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
    }

    function login() {
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

    function submitRegisterForm(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('registerForm'));
        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                alert("Registration successful!");
                window.location.href = "index.php";
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function submitLoginForm(event) {
        event.preventDefault();  // Prevent the default form submission

        var formData = new FormData(document.getElementById('loginForm'));  // Create a FormData object from the form

        fetch('login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            return response.text();  // Parse as text first
        })
        .then(text => {
            try {
                var data = JSON.parse(text);  // Try to parse JSON
                console.log('Server response:', data);  // Log the server response

                if (data.status === 'success') {
                    // Redirect to home.php on successful login
                    window.location.href = "home.php";
                } else {
                    // Show error message from server
                    console.error('Error from server: ', data.message);
                    alert(data.message);
                }
            } catch (error) {
                console.error('There was a problem with parsing JSON:', error, text);
                alert('An error occurred while logging in. Please try again.');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            alert('An error occurred while logging in. Please try again.');
        });
    }
</script>
</body>
</html>
