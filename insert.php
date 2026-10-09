<?php
include ("connect.php");

if (isset($_POST['addBtn'])) {
    $username = $_POST['username'];
    $usergender = $_POST['usergender'];
    $useremail = $_POST['useremail'];
    $usernumber = $_POST['usernumber'];
    $useraddress = $_POST['useraddress'];

    // Validate username
    if ($username == "" || empty($username) || $usergender == "" || empty($usergender) || $useremail == "" || empty($useremail) || $usernumber == "" || empty($usernumber) || $useraddress == "" || empty($useraddress)) {
        if ($username == "" || empty($username)) {
            header('location: index.php?message=You need to fill in the name first !!');
            exit();
        }

        // Validate gender
        if ($usergender == "" || empty($usergender)) {
            header('location: index.php?message=You need to select a gender !!');
            exit();
        }

        // Validate email
        if ($useremail == "" || empty($useremail) || !filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            header('location: index.php?message=You need to provide a valid email address !!');
            exit();
        }

        // Validate phone number (basic validation to check if it contains only digits and has 10-15 characters)
        if ($usernumber == "" || empty($usernumber) || !preg_match('/^\d{10,15}$/', $usernumber) || strlen($usernumber) < 10) {
            header('location: index.php?message=You need to provide a valid phone number !!');
            exit();
        }

        // Validate address
        if ($useraddress == "" || empty($useraddress)) {
            header('location: index.php?message=You need to provide an address !!');
            exit();
        }
    } else {
        $sqlcheck = "SELECT * FROM `users` WHERE `Email`= '$useremail'";
        $resultcheck = mysqli_query($conn, $sqlcheck);

        //Check for if email already exists
        if (mysqli_num_rows($resultcheck) == 0) {
            $sqlinsert = "INSERT INTO `users` (`id`, `Name`, `Gender`, `Email`, `Mobile`, `Address`) VALUES (NULL, '$username', '$usergender', '$useremail', '$usernumber', '$useraddress')";
            $result = mysqli_query($conn, $sqlinsert);

            if (!$result) {
                die("Addition of new users failed " . mysqli_error($conn));
            } else {
                header("location:index.php?insert_message=You data has been successfully inserted.");
            }
        } else {
            header("location:index.php?message=Email already exists !!!");
        }
    }
}

?>