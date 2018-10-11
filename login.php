<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <center>
    <h1>Login</h1>
    <hr>
    <form method="post">
        Username : <input type="text" name="user"><br><br>
        Password : <input type="password" name="pass"><br><br>
        <input type="submit" name="login" value="Login"><br><br>
        <a href="register.php">Belum Registrasi</a>
    </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['user'])){
    require_once("db.php");
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'");
    $row = mysqli_fetch_assoc($sql);
    $num = mysqli_num_rows($sql);
    $id = $row['id'];

    if ($num != 0) {
        $query = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE id = '$id'");
        $data = mysqli_fetch_assoc($query);
        $_SESSION['nim'] = $data['nim'];
        header("location: home.php");
    }else{
        header("Location: login.php");
        echo "Anda gagal login";
    }
    mysqli_close($conn);
}
?>