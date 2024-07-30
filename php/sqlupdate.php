<?php 

if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    } else {
    	header("Location: read.php");
    }

}else if(isset($_POST['update'])){
    include "db_conn.php";
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['user_name']);
    $phone_Mobile = validate($_POST['user_mobile']);
    $email = validate($_POST['user_email']);
    $id = validate($_POST['id']);

    if (empty($name)) {
        header("Location: update.php?id=$id&error=Name is required");
        exit();
    } else if (empty($phone_Mobile)) {
        header("Location: update.php?id=$id&error=Phone Number is required");
        exit();
    } else if (empty($email)) {
        header("Location: update.php?id=$id&error=Email is required");
        exit();
    } else {
        if ($conn->connect_error) {
            header("Location: update.php?id=$id&error=Connection failed: " . $conn->connect_error);
            exit();
        }

    $phonequery = "SELECT * FROM users WHERE mobile='$phone_Mobile'";
    $phonequeryans = $conn->query($phonequery);

    if ($phonequeryans->num_rows > 0) {
        header("Location: update.php?id=$id&error=Phone number already exists");
        exit();
    }
    $emailquery = "SELECT * FROM users WHERE email='$email'";
    $emailqueryans = $conn->query($emailquery);

    if ($emailqueryans->num_rows > 0) {
        header("Location: update.php?id=$id&error=Email already exists");
        exit();
    }
    $query = "UPDATE users SET name='$name', mobile='$phone_Mobile', email='$email' WHERE id=$id";

    $result = mysqli_query($conn,$query);
    if ($result === TRUE) {
        //echo "User inserted successfully.";
        header("location: read.php?success=Successfully Update");
    } else {
        header("Location: update.php?id=$id&error=Error: " . $conn->error);
        exit();
        }
    }
}
 else {
    header("location: read.php");
}
?>
