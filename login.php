<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; // Include the database connection script

session_start();

header('Content-Type: application/json'); // Set the content type to JSON

$response = [];

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // SQL query to fetch user with matching email and password
            $sql = "SELECT user_id FROM users WHERE email = ? AND password = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception('Failed to prepare statement: ' . $conn->error);
            }

            $stmt->bind_param("ss", $email, $password);

            if (!$stmt->execute()) {
                throw new Exception('Failed to execute statement: ' . $stmt->error);
            }

            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (isset($row['user_id'])) {
                    $_SESSION['user_id'] = $row['user_id'];

                    // Respond with JSON
                    $response = [
                        'status' => 'success',
                        'message' => 'Logged in successfully',
                        'user_id' => $_SESSION['user_id']
                    ];
                } else {
                    throw new Exception('User ID not found in database.');
                }
            } else {
                // Respond with JSON
                $response = [
                    'status' => 'error',
                    'message' => 'Email or password is incorrect.'
                ];
            }

            $stmt->close();
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Email and password are required.'
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Invalid request method.'
        ];
    }
} catch (Exception $e) {
    $response = [
        'status' => 'error',
        'message' => 'Exception: ' . $e->getMessage()
    ];
}

echo json_encode($response);
exit;
?>
