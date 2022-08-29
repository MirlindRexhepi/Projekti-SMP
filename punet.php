<?php include 'inc/header.php' ?>
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
                if(isset($_SESSION['mesazhiPunet'])){
                    echo $_SESSION['mesazhiPunet'];
                }
            ?>
        </div>
        <table id="members">
            <a href="shtopune.php">Shto</a>
            <tr>
                <th>Emri i projektit</th>
                <th>Data</th>
                <th>Pershkrimi</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            //print_r($_SESSION);
            $punet=merrPunet();
            if ($punet) {
                $i = 0;
                while ($puna = mysqli_fetch_assoc($punet)) {
                    if ($i % 2 != 0) {
                        echo "<tr class='alt'>";
                    } else {
                        echo "<tr>";
                    }
                    $pid=$puna['punaid'];
                    $pershkrimi=$puna['pershkrimi'];
                    if(strlen($pershkrimi)>50){
                        $pershkrimi=substr($pershkrimi,0,50) . "...";
                    }
                    echo "<td>" . $puna['emri'] . "</td>";
                    echo "<td>" . $puna['data'] . "</td>";
                    echo "<td>" . $pershkrimi . "</td>";
                    echo "<td><a href='modifikopune.php?pid={$pid}'>Edit</a></td>";
                    echo "<td><a href='fshijpune.php?pid={$pid}'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
            }

            ?>
        </table>

    </section>
</main>
<?php include 'inc/footer.php' ?>