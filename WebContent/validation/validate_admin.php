<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password";
    } else {
        $servername = "localhost";
        $dbusername = "27754175";
        $dbpassword = "27754175";
        $dbname = "db_27754175";

        // Create a new MySQLi instance and check for connection errors
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            if (intval($row['user_id'] / 1000) == 3) {
                $_SESSION['admin'] = 'admin';
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['error'] = 'Not an admin';
                header("Location: ../admin_login.php");
                exit();
            }
        } else {
            echo "Incorrect username or password";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Incorrect";
}
?>
