<?php
session_start();

// Periksa apakah pengguna sudah login dan merupakan admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: ../Login/login.php");
    exit();
}

// Memanggil koneksi database
include "../Service/database.php";

// Query untuk mendapatkan data pengguna
$sql = "SELECT * FROM users";
$result = $db->query($sql);

if(isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <h1>Halaman Admin Vistaland</h1>
        <h2>Data Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data pengguna</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Tombol Logout -->
        <form action="#" method="POST">
            <button type="submit" name="logout" class="btn-logout">Logout</button>
        </form>
    </div>
</body>
</html>
