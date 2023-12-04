<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("ahli_menu.php");

    echo"<main class='aktiviti'>";
    
    $sql = "select * from aktiviti";
    $result = mysqli_query($sambungan, $sql);
    while($aktiviti = mysqli_fetch_array($result)) {
        echo "<figure>
        <img class='home' src='imej/$aktiviti[gambar]'>
        <figcaption>$aktiviti[namaaktiviti]</figcaption>
        </figure>";
    }

    echo "</main>";

    include("footer.php");
?>