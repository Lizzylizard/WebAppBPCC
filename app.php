<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    if (array_key_exists('fname', $_POST)) {
        $fname = $_POST['fname'];
    } else {
        $fname = "";
    }

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    if(!empty($fname)) {
        $sql = "SELECT * FROM test_db.Guests WHERE name =?";
        $stmt = mysqli_stmt_init($con);
        if(mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $fname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck == 0) {
                #neuer name
                $one = 1;
                $sql = "INSERT into test_db.Guests (firstname, count) VALUES (?,?)";
                if(mysqli_stmt_prepare($stmt, $sql)) {
                   mysqli_stmt_bind_param($stmt, "si", $fname, $one);
                   mysqli_stmt_execute($stmt);
                }
            } else {
                #inkrementieren
                $sql = "UPDATE test_db.Guests SET count = count + 1 WHERE firstname = ?";
                if(mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $fname);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
    }

?>
