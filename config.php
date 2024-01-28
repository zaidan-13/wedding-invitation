<?php
// Koneksi ke database MySQL
$servername = "localhost";
$username = "u917640836_wedding"; // Ganti dengan username MySQL Anda
$password = "Wedding*180224"; // Ganti dengan password MySQL Anda
$dbname = "u917640836_rsvp"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>