<?php include 'inc/header.php';
if(!isset($_SESSION['antari']) || $_SESSION['antari']['roli']!=1 ){
    header("Location: index.php");
}
?>
<!-- End of Header-->
<!--Main Part-->
<main class="container page">
    <article class="maininfo">
        <h2 class="title">SMP Projekti Pershkrimi</h2>
        <p>
            Sistemi për menaxhimin e projekteve mundëson një kompanie menaxhimin e punëve nga punëtorët e saj
            për projektet që ajo ka. Sistemi ofron menaxhimin e stafit: shtimin, modifikimin fshirjen,
            paraqitjen e stafit, menaxhimin e projekteve: shtimin, modifikimin fshirjen, paraqitjen e projekteve
            dhe menaxhimin e punëve ë bën stafi në kuadër të projekteve.
        </p>
    </article>

    <?php include 'inc/sidebar.php' ?>
    <section id="content" class="box">
        <div id="message">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
        </div>
        <table id="members">
            <a href="shtoanetar.php">Shto</a>
            <tr>
                <th>Emri dhe Mbiemri</th>
                <th>Telefoni</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $antaret=merrAntaret();
            if ($antaret) {
                $i = 0;
                while ($antari = mysqli_fetch_assoc($antaret)) {
                    if ($i % 2 != 0) {
                        echo "<tr class='alt'>";
                    } else {
                        echo "<tr>";
                    }
                    $aid=$antari['antariid'];
                    echo "<td>" . $antari['emri'] . " " . $antari['mbiemri'] . "</td>";
                    echo "<td>" . $antari['telefoni'] . "</td>";
                    echo "<td>" . $antari['email'] . "</td>";
                    echo "<td><a href='modifikoanetar.php?aid={$aid}'>Edit</a></td>";
                    echo "<td><a href='fshijanetar.php?aid={$aid}'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
            }

            ?>
        </table>

    </section>
</main>
<?php include 'inc/footer.php' ?>