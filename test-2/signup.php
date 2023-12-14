<?php

include "config.php";

if (isset($_POST['signup'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO user(firstname, lastname, email, password, gender) VALUES ('$first_name','$last_name','$email','$password','$gender')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Account created successfully.";
header("Location: login.php");
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<body>

    <h2>Signup</h2>

    <form action="" method="POST">

        First name:<br>
        <input type="text" name="firstname" required><br>

        Last name:<br>
        <input type="text" name="lastname" required><br>

        Email:<br>
        <input type="email" name="email" required><br>

        Password:<br>
        <input type="password" name="password" required><br>

        Gender:<br>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female<br><br>

        <input type="submit" name="signup" value="Sign Up">

    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>

</body>

</html>