<?php
    include("sambungan.php");

    if(isset($_POST["submit"])) {
        $idahli = $_POST["idahli"];
        $password = $_POST["password"];
        $namaahli = $_POST["namaahli"];

        $check_sql = "select count(*) as id_count from ahli where idahli = '$idahli'";
        $check_result = mysqli_query($sambungan, $check_sql);
        $check_row = mysqli_fetch_assoc($check_result);
        $id_count = $check_row['id_count'];

        if ($id_count > 0) {
            echo "<script>alert('ID Ahli sudah wujud. Sila gunakan ID Ahli yang lain.')</script>";
        } else {
            $sql = "insert into ahli values ('$idahli', '$password', '$namaahli')";
            $result = mysqli_query($sambungan, $sql);

            if ($result) {
                echo "<script>alert('Berjaya signup')</script>";
            } else {
                echo "<h4 class='ralat'>MESEJ RALAT</h4>";
                echo "<div class='ralat'>$sql<br><br>" . mysqli_error($sambungan) . "</div>";
            }
        }

        echo "<script>window.location='index.php'</script>";
    }
?>


<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <center><br>
        <img class="tajuk" src="imej/tajuk.png" width=500>
    </center>

    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
        <table>
            <tr>
                <td>ID Ahli</td>
                <td><input required type="text" name="idahli" 
                placeholder="A123" pattern="[A-Z0-9]{4}"
                oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')"
                oninput="this.setCustomValidity('')">
            </td>
            </tr>
            <tr>
                <td>Nama Ahli</td>
                <td><input type="text" name="namaahli"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
        </table>

        <button class="tambah" type="submit" name="submit">Daftar</button>
        <button class="batal" type="button" onclick="window.location='index.php'">
        Batal</button>
    </form>
</main>