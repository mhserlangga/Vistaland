<?php
  // memanggil file database
  include "../Service/database.php";
  // memulai session
  session_start();

  $signup_message = "";

  // jika tombol signup ditekan
  if(isset($_POST['signup'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
      // query insert ke database
      $sql = "INSERT INTO users (nama, email, no_hp, username, password) VALUES ('$nama', '$email', '$no_hp', '$username', '$password')";
  
      // eksekusi query
      if($db -> query($sql)){
        header("location: ../Login/login.php");
      } else {
        $signup_message = "Sign Up gagal, silahkan coba lagi";
      }
    }
    catch (mysqli_sql_exception) {
      $signup_message = "Username, Nomor Hp, atau Email telah digunakan";
    }

    $db -> close();
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
    <link rel="stylesheet" href="signup.css"/>
    <title>SignUp</title>
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
            <label for="nama">Nama Lengkap</label>
            <input
              type="text"
              id="nama"
              name="nama"
              placeholder="Masukkan nama"
              required
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Masukkan email aktif"
              required
            />
          </div>
          <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <input
              type="text"
              id="no_hp"
              name="no_hp"
              placeholder="Masukkan nomor aktif"
              required
            />
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Masukkan username baru"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Masukkan password baru"
              required
            />
          </div>
          <button type="submit" class="btn" name="signup">Sign Up</button>
          <p class="login-link">
            Sudah punya akun? <a href="../Login/login.php">Login di sini</a>
          </p>
        </form>
        <br />
        <i><?= $signup_message ?></i>
      </div>
    </section>
  </body>
</html>
