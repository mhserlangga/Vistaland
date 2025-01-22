<?php
  // memanggil file database
  include "../Service/database.php";
  // memulai session
  session_start();

  // jika tombol login ditekan
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // query untuk mencari username dan password yang sesuai pada database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // eksekusi query
    $result = $db -> query($sql);
    
    // jika hasil query lebih dari 0 (berarti ada data yang sesuai)
    if($result -> num_rows > 0){
      // ambil data user yang sesuai
      $data = $result -> fetch_assoc();
      
      // mengalihkan halaman ke landing page ketika login berhasil
      header("location: ../Dashboard/dashboard.php");
      
      // membuat session username dan is_login
      $_SESSION['username'] = $data['username'];
      $_SESSION['is_login'] = true;
    } else {
      echo "Login Gagal";
    }
  }
  
  // jika user sudah login, maka akan diarahkan ke landing page dan tidak bisa login lagi
  if(isset($_SESSION['is_login'])){
    header("location:../Dashboard/dashboard.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <title>Login</title>
  </head>
  <body>
    <!-- Login Section -->
    <section class="login">
      <div class="login-container">
        <div class="logo">
          <img src="../img/Logo/logo.png" alt="" />
        </div>
        <br />
        <form action="#" method="POST" class="login-form">
          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Enter your username"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              required
            />
          </div>
          <button type="submit" class="btn" name="login">Login</button>
          <p class="signup-link">
            Belum punya akun?
            <a href="../SignUp/signup.php">Daftar di sini</a>
          </p>
        </form>
      </div>
    </section>
  </body>
</html>
