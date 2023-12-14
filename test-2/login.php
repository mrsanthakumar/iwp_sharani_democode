<?php
session_start();

include "config.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>

<body>

    <h2>Login</h2>

    <form action="" method="POST">

        Email:<br>
        <input type="email" name="email" required><br>

        Password:<br>
        <input type="password" name="password" required><br>

        <?php if (isset($login_error)) { ?>
            <p style="color: red;"><?php echo $login_error; ?></p>
        <?php } ?>

        <input type="submit" name="login" value="Login">

    </form>

    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

</body>

</html>