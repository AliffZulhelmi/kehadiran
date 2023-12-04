 <?php
//    $host = "localhost";
//    $user = "root";
//    $password = "";
//    $database = "kehadiran";
//
//    $sambungan = mysqli_connect($host, $user, $password, $database)
//    or die("Sambungan gagal");

// Ganti dgn atas kalau error

$sambungan = mysqli_connect("localhost", "root", "", "kehadiran");
if (!$sambungan ) {
    die ("sambungan gagal");
}
 ?>