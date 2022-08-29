<?php include 'inc/header.php' ?>

<?php
    if(!isset($_SESSION['antari']) || $_SESSION['antari']['roli']!=1){
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
        if(isset($_SESSION['messageP'])){
            echo $_SESSION['messageP'];
        }
    ?>
    </div>
        <table id="members">
            <a href="shtoprojekte.php">Shto</a>
            <tr>
                <th>Emri</th>
                <th>Pershkrimi</th>
                <th>Data e fillimit</th>
                <th>Data e mbarimit</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        <?php
            $projektet=merrProjektet();
            if($projektet){
                $i=0;
                while ($projekti = mysqli_fetch_assoc($projektet)) {
                    if($i % 2 != 0){
                        echo "<tr class'alt>";
                    }else {
                        echo "<tr>";
                    }
                    $pid=$projekti['projektiid'];
                    echo "<td>" . $projekti['emri'] . "</td>";
                    echo "<td>" . $projekti['pershkrimi'] . "</td>";
                    echo "<td>" . $projekti['datafillimit'] . "</td>";
                    echo "<td>" . $projekti['datambarimit'] . "</td>";
                    echo "<td><a href='modifikoprojekt.php?pid={$pid}'>Edit</a></td>";
                    echo "<td><a href='fshijprojekt.php?pid={$pid}'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
            }
        ?>
                </table>

</section>
</main>
<?php include 'inc/footer.php' ?>