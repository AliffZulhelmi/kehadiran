<?php
include("keselamatan.php");
include("sambungan.php");
include("admin_menu.php");
?>

<link rel="stylesheet" href="aasenarai.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <?php
    if (isset($_POST['submit'])) {
        $idaktiviti = $_POST['idaktiviti'];
        $idahli = $_POST['idahli'];
        $pilih = $_POST['pilih'];

        if ($pilih == 1) {
            $sql = "SELECT * FROM kehadiran 
                    JOIN aktiviti ON kehadiran.idaktiviti = aktiviti.idaktiviti
                    JOIN ahli ON kehadiran.idahli = ahli.idahli
                    WHERE kehadiran.idaktiviti = '$idaktiviti' ";

            $result = mysqli_query($sambungan, $sql);

            if (mysqli_num_rows($result) > 0) {
                $kehadiran = mysqli_fetch_array($result);

                $tempat = $kehadiran["tempat"];
                $namaaktiviti = $kehadiran["namaaktiviti"];
                $tarikh = date_format(date_create($kehadiran['tarikhmasa']), 'd-m-Y');
                $masa = date_format(date_create($kehadiran['tarikhmasa']), 'h:i A');

                echo "<div class='laporan'>
                        <h3 class='tajuk'>Senarai Nama Kehadiran Mengikut Aktiviti</h3>
                        <h3 class='laporan'>Aktiviti: $namaaktiviti<br>
                            Tempat : $tempat<br>
                            Tarikh : $tarikh  Masa : $masa</h3>
                    </div>";

                echo "<table class='senarai'>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Hadir</th>
                        </tr>";

                while ($kehadiran = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>$kehadiran[idahli]</td>
                            <td class='nama'>$kehadiran[namaahli]</td>
                            <td>";

                    if ($kehadiran['hadir'] == "ya")
                        echo "<img src='imej/right.png'>";
                    else
                        echo "<img src='imej/absent.png'>";

                    echo "</td></tr>";
                }

                echo "</table>";
            } else {
                echo "<h4 class='ralat'>MESEJ RALAT</h4>
                <div class='ralat'>Tiada Pelajar Terlibat</div>";
            }
        }

        if ($pilih == 2) {
            $sql = "SELECT * FROM kehadiran 
                    JOIN aktiviti ON kehadiran.idaktiviti = aktiviti.idaktiviti
                    JOIN ahli ON kehadiran.idahli = ahli.idahli
                    WHERE kehadiran.idahli = '$idahli' ";

            $result = mysqli_query($sambungan, $sql);

            if (mysqli_num_rows($result) > 0) {
                $kehadiran = mysqli_fetch_array($result);

                $namaahli = $kehadiran["namaahli"];

                echo "<div class='laporan'>
                        <h3 class='tajuk'>Senarai Nama Kehadiran Mengikut Ahli</h3>
                        <h3 class='laporan'>Nama: $namaahli<br>
                        </div>";

                echo "<table class='senarai'>
                        <tr>
                            <th>ID</th>
                            <th>Aktivit</th>
                            <th>Hadir</th>
                        </tr>";

                while ($kehadiran = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>$kehadiran[idaktiviti]</td>
                            <td class='nama'>$kehadiran[namaaktiviti]</td>
                            <td>";

                    if ($kehadiran['hadir'] == "ya")
                        echo "<img src='imej/right.png'>";
                    else
                        echo "<img src='imej/absent.png'>";

                    echo "</td></tr>";
                }

                echo "</table>";
            } else {
                echo "<h4 class='ralat'>MESEJ OUTPUT</h4>
                <div class='ralat'>Tiada Pelajar Terlibat</div>";
            }
        }
    }
    ?>
    <center><button class="cetak" onclick='window.print()'>Cetak</button></center>
</main>
<style>
h4 {
    font-family: verdana;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    color: white;
    width: 330px;

    padding: 10px 22px;
    margin: 20px auto 0px;
    box-shadow: 15px 15px 6px 0px rgba(96, 96, 96, 0.7)
}

    h4.ralat {
    background-color: red;
}

div.ralat {
    text-align: center;
    width: 330px;
    padding: 20px;
    border: 2px solid darkgreen;
    margin: 0px auto 0px;
    background-color: white;
    box-shadow: 15px 15px 6px 0px rgba(57, 43, 43, 0.67);
}
</style>
<?php
include("footer.php");
?>
