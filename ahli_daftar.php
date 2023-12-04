<?php
include("keselamatan.php");
include("sambungan.php");
include("ahli_menu.php");

$idahli = $_SESSION["idpengguna"];
$namaahli = $_SESSION["namapengguna"];

if (isset($_POST["submit"])) {
    if (isset($_POST["idaktiviti"])) {
        $idaktiviti = $_POST["idaktiviti"];

        $sql = "INSERT INTO kehadiran VALUES ('$idahli', '$idaktiviti', 'tidak')";
        $result = mysqli_query($sambungan, $sql);

        if ($result == true) {
            echo "<h4 class='ok'>MESEJ OUTPUT </h4><div class='ok'>Berjaya tambah</div>";
        } else {
            echo "<h4 class='ralat'>MESEJ RALAT</h4><div class='ralat'>$sql<br><br>" . mysqli_error($sambungan) . "</div>";
        }
    } else {
        echo "<h4 class='ralat'>MESEJ RALAT</h4><div class='ralat'>Please select an activity</div>";
    }
}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">
<main>
    <h3 class="panjang">TAMBAH AHLI KE AKTIVITI</h3>
    <form class="panjang" action="ahli_daftar.php" method="post">
        <table>
            <tr>
                <td>ID Ahli</td>
                <td><input type="text" name="idahli" value="<?php echo $idahli; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Ahli</td>
                <td><input type="text" name="namaahli" value="<?php echo $namaahli; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama aktiviti</td>
                <td>
                    <select name="idaktiviti">
                        <?php
                        $sql = "SELECT * FROM aktiviti WHERE idaktiviti NOT IN (SELECT idaktiviti FROM kehadiran WHERE idahli='$idahli')";
                        $data = mysqli_query($sambungan, $sql);
                        while ($aktiviti = mysqli_fetch_array($data)) {
                            echo "<option value='$aktiviti[idaktiviti]'>$aktiviti[namaaktiviti]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <button class="tambah" type="submit" name="submit">Tambah</button>
    </form>
</main>

<?php
include("footer.php");
?>
