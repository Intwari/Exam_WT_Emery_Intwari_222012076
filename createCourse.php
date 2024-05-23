<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['title'];
    $description = $_POST['description'];
    $course_file = $_FILES['document']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($course_file);

    // Ensure the uploads directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['document']['tmp_name'], $target_file)) {
        // Insert data into the database
        $sql = "INSERT INTO courses (name, description, course_file) VALUES ('$name', '$description', '$course_file')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to Courses.php
            echo "<script>window.location.href = 'Courses.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
