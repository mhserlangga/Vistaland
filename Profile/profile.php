<?php
  session_start();

  if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: ../LandingPage/index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css" />
  </head>
  <body>
    <section class="profile">
      <div class="container">
        <!-- Profile Header -->
        <div class="profile-header">
          <h1>Informasi Profile Pengguna</h1>
        </div>

        <!-- Profile Details -->
        <div class="profile-details">
          <div class="info">
            <strong>ID User</strong>:
            <?= $_SESSION['id']?>
          </div>
          <div class="info">
            <strong>Nama</strong>:
            <?= $_SESSION['nama']?>
          </div>
          <div class="info">
            <strong>Username</strong>:
            <?= $_SESSION['username']?>
          </div>
          <div class="info">
            <strong>Email</strong>:
            <?= $_SESSION['email']?>
          </div>
          <div class="info">
            <strong>Nomor Hp</strong>:
            <?= $_SESSION['no_hp']?>
          </div>
          <div class="info">
            <strong>Password</strong>:
            <?= $_SESSION['password']?>
          </div>
          <div class="info">
            <strong>Waktu Pembuatan</strong>:
            <?= $_SESSION['created_at']?>
          </div>
        </div>

        <!-- Action Buttons -->
        <!-- <div class="btn-container">
          <a href="../EditProfile/EditProfile.html">Edit Profile</a>
          <a href="../LandingPage/index.php">Logout</a>
        </div> -->
        <form action="profile.php" method="POST" class="logout">
          <div class="btn-logout">
            <button type="submit" name="logout">Logout</button>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>
