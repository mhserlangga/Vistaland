<?php

  // memanggil file database
  include "../Service/database.php";
  // memulai session
  session_start();

  // jika tombol signup ditekan
  if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    // query insert ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    // eksekusi query
    if($db -> query($sql)){
      echo "Berhasil";
      header("location: ../Login/login.php");
    } else {
      echo "Gagal";
    }
  }

  // jika user sudah login, maka akan diarahkan ke landing page dan tidak bisa signup lagi
  if(isset($_SESSION['is_login'])){
    header("location:../LandingPage/index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="signup.css" />
    <title>Sign Up</title>
  </head>
  <body>
    <!-- Sign-Up Section -->
    <section class="signup">
      <div class="signup-container">
        <div class="logo">
          <img src="../img/Logo/logo.png" alt="Logo" />
        </div>
        <br />
        <form action="#" method="POST" class="signup-form">
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
          <!-- <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Enter your email"
              required
            />
          </div> -->
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
          <!-- <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input
              type="password"
              id="confirm-password"
              name="confirm-password"
              placeholder="Confirm your password"
              required
            />
          </div> -->
          <button type="submit" class="btn" name="signup">Sign Up</button>
          <p class="login-link">
            Sudah punya akun? <a href="../Login/login.php">Log in di sini</a>
          </p>
        </form>
      </div>
    </section>
  </body>
</html>
