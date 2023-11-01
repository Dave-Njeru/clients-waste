<?php
session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// Include your database connection code here
include("db_connection.php");

// Fetch user's profile picture path from the database
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
$profile_picture_path = ""; // Initialize with a default value

// $select_query = "SELECT profile_picture FROM users WHERE id = ?";
$select_stmt = $pdo->prepare($select_query);
$select_stmt->execute([$user_id]);
$user_data = $select_stmt->fetch();

// if ($user_data) {
//     $profile_picture_path = $user_data["profile_picture"];
// }

// In this example, we'll use a default path if not available in the database
// Replace "default_profile_picture.jpg" with your default profile picture path
// if (empty($profile_picture_path)) {
//     $profile_picture_path = "default_profile_picture.jpg";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    .profile-picture-container img {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <h1>Welcome, <?php echo $username; ?></h1>

    <!-- Display the user's profile picture -->
    <div class="profile-picture-container">
        <img src="<?php echo $profile_picture_path; ?>" alt="Profile">
    </div>

    <!-- Add other content for the dashboard here -->

    <a href="logout.php">Logout</a>
</body>

</html>