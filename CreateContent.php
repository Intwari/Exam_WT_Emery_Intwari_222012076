<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Content</title>
    <style>
        body {
            background: url("download%20(4).jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: hidden;
            padding: 20px; /* Added padding for better spacing */
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .container h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Close icon styles */
        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #888;
            font-size: 24px;
        }

        /* Close icon hover effect */
        .close-icon:hover {
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Close icon with aria-label for accessibility -->
    <span class="close-icon" onclick="redirectToHome()" aria-label="Close" title="Close">&times;</span>
    
    <h1>Create Content</h1>
    <form id="contentForm" action="createCourse.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="document">Upload Document:</label>
            <input type="file" id="document" name="document" accept=".doc, .docx, .pdf" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    // Function to redirect to Courses.php
    function redirectToHome() {
        if (document.getElementById('title').value || document.getElementById('description').value) {
            if (confirm('You have unsaved changes. Are you sure you want to leave this page?')) {
                window.location.href = "Courses.php";
            }
        } else {
            window.location.href = "Courses.php";
        }
    }
</script>

</body>
</html>
