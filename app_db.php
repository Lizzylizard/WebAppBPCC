<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    if(empty($fname)) {
        # do nothing
    } else {
        # check if name already in database
        # if yes --> increment count
        # else --> add new name to database and start count with 1
    }

?>


if(empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
    } else {
        $sql = "SELECT * FROM userdatabase WHERE email =? AND passwort =?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            //prüft ob sql statement funktioniert
            header("Location: ../index.php?sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck == 0) {
                header("Location: ../index.php?nomatch");
                exit();
            } else {
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                header("Location: ../index.php?login=success");
                exit();
            }
        }

    }