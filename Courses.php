<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Courses</title>
    <style>
    /* Additional CSS styles */
    .services, .call-to-action, .process {
        padding: 60px 0;
        text-align: center;
    }

    .service, .step {
        margin-bottom: 40px;
        border: 2px solid transparent; /* Make border transparent */
        border-radius: 10px; /* Rounded corners */
        background-color: rgba(255, 255, 255, 0.8); /* Add transparency */
        padding: 20px; /* Add padding */
        cursor: pointer; /* Change cursor to hand */
        transition: border-color 0.3s, color 0.3s; /* Smooth transition for border and color */
        width: calc(50% - 20px); /* Two services in a row */
        margin-right: 20px;
        box-sizing: border-box;
        display: inline-block;
        vertical-align: top;
    }

    .services {
        padding: 60px 0;
        text-align: center;
        margin-top: 100px;
    }

    .service:nth-child(2n) {
        margin-right: 0; /* Remove right margin for every second service */
    }

    .service:hover {
        border-color: #ccc; /* Change border color on hover */
    }

    .service:hover h3 {
        color: rgba(51, 51, 51, 1); /* Change text color on hover */
    }

    .footer {
        padding: 40px 0;
        text-align: center;
    }

    /* Modal styles */
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Adjusted width */
        max-height: 80%; /* Adjusted height */
        overflow-y: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        animation-name: animatetop;
        animation-duration: 0.4s;
    }

    @keyframes animatetop {
        from {top: -300px; opacity: 0}
        to {top: 0; opacity: 1}
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    h2 {
        margin-top: 0;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
    }

    input[type="email"],
    input[type="tel"],
    input[type="submit"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50; /* Green submit button */
        color: white;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Ensure the body is scrollable */
    body {
        overflow-y: auto;
    }

    /* Ensure the container is scrollable */
    .container {
        overflow-y: auto;
    }

    /* Gradient background for action buttons */
    .action-button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    /* Hover effect for action buttons */
    .action-button:hover {
        background-image: linear-gradient(to right, #FFA000, #F57C00);
    }

    /* Edit and Delete buttons with gradient background */
    .service button,
    .service form input[type="submit"],
    .service a.action-button {
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    /* Gradient background for Edit and Delete buttons */
    .service button {
        background-image: linear-gradient(135deg, #ff6a00, #ee0979);
    }

    .service form input[type="submit"] {
        background-image: linear-gradient(135deg, #283048, #859398);
    }

    .service a.action-button {
        background-image: linear-gradient(135deg, #f44336, #e91e63);
    }

    /* Hover effect for Edit and Delete buttons */
    .service button:hover,
    .service form input[type="submit"]:hover,
    .service a.action-button:hover {
        filter: brightness(110%);
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
                <li><a href="Courses.php" class="link active">Courses</a></li>
                <li><a href="Practice.php" class="link">Practices</a></li>
                <li><a href="Community.php" class="link">Community</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn
            <button class="btn white-btn" onclick="window.location.href='CreateContent.php'">Create</button>
        </div>
    </nav>
    
    <section class="services">
        <div class="container">
        <?php
include 'db.php';

$updateSuccess = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCourse"])) {
    $courseId = $_POST["courseId"];
    $courseName = $_POST["courseName"];
    $courseDescription = $_POST["courseDescription"];

    $updateSql = "UPDATE courses SET name = ?, description = ? WHERE course_id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssi", $courseName, $courseDescription, $courseId);

    if ($stmt->execute()) {
        $updateSuccess = true;
    } else {
        echo "Error updating course: " . $conn->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteCourse"])) {
    $courseId = $_POST["courseId"];

    $deleteSql = "DELETE FROM courses WHERE course_id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $courseId);

    if ($stmt->execute()) {
        // Course deleted successfully
    } else {
        echo "Error deleting course: " . $conn->error;
    }

    $stmt->close();
}

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="service">';
        echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<a href="uploads/' . htmlspecialchars($row["course_file"]) . '" download class="action-button">Download Course Material</a>';
        echo '<button onclick="openEditForm(' . $row["course_id"] . ')" class="action-button">Edit</button>';
        echo '<form method="post" style="display:inline;">';
        echo '<input type="hidden" name="courseId" value="' . $row["course_id"] . '">';
        echo '<input type="submit" name="deleteCourse" value="Delete" onclick="return confirm(\'Are you sure you want to delete this course?\');" class="delete-button">';
        echo '</form>';
        echo '<div id="editForm' . $row["course_id"] . '" class="modal">';
        echo '<div class="modal-content">';
        echo '<span class="close" onclick="closeEditForm(' . $row["course_id"] . ')">&times;</span>';
        echo '<h2>Edit Course</h2>';
        echo '<form method="post">';
        echo '<input type="hidden" name="courseId" value="' . $row["course_id"] . '">';
        echo '<label for="courseName">Course Name:</label>';
        echo '<input type="text" name="courseName" value="' . htmlspecialchars($row["name"]) . '" required>';
        echo '<label for="courseDescription">Course Description:</label>';
        echo '<textarea name="courseDescription" required>' . htmlspecialchars($row["description"]) . '</textarea>';
        echo '<input type="submit" name="updateCourse" value="Update">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No courses available.";
}

$conn->close();
?>


            <!-- Hidden input to indicate update success -->
            <input type="hidden" id="updateSuccess" value="<?php echo $updateSuccess ? 'true' : 'false'; ?>">
        </div>
    </section>

    <section class="call-to-action">
        <div class="container">
        </div>
    </section>
</div>

<script>
    // Function to open edit form modal
    function openEditForm(courseId) {
        document.getElementById("editForm" + courseId).style.display = "block";
    }

    // Function to close edit form modal
    function closeEditForm(courseId) {
        document.getElementById("editForm" + courseId).style.display = "none";
    }

    // Close modal when user clicks outside of it
    window.onclick = function(event) {
        var modals = document.getElementsByClassName("modal");
        for (var i = 0; i < modals.length; i++) {
            if (event.target == modals[i]) {
                modals[i].style.display = "none";
            }
        }
    }

    // Display

    // Display success message if updateSuccess parameter is set
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('updateSuccess')) {
            alert('Course updated successfully.');
        }
    }
</script>
</body>
</html>