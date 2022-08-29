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

        <?php
        if (isset($_GET['pid'])) {
            $punaid = $_GET['pid'];
            $puna = merrPuneId($punaid);
            $projektiid = $puna['projektiid'];
            $projektiemri = $puna['emri'];
            $datapune = $puna['data'];
            $datapune = date("Y-m-d", strtotime($datapune));
            $pershkrimi = $puna['pershkrimi'];
        }


        if (isset($_POST['modifiko'])) {
            modifikoPune($_POST['punaid'], $_POST['projektiid'], $_POST['datapune'], $_POST['pershkrimi']);
        }

        ?>

        <form id="login" class="box" method="post">
            <input type="text" id="punaid" name="punaid" readonly value="<?php if (!empty($punaid)) echo $punaid; ?>">
            <legend>Forma për regjistrim</legend>
            <fieldset>
                <label>Emri i projektit: </label>
                <select name='projektiid'>
                    <option value="<?php echo $projektiid ?>"><?php echo $projektiemri ?></option>
                    <?php
                    $projektet = merrProjektet();
                    while ($projekti = mysqli_fetch_assoc($projektet)) {
                        $proid = $projekti['projektiid'];
                        $projektiemri = $projekti['emri'];
                        if ($proid != $projektiid) {
                            echo "<option value='{$proid}'>{$projektiemri}</option>";
                        }
                    }

                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>Data e punes: </label>
                <input type="date" id="datapune" name="datapune" value="<?php if (!empty($datapune)) echo $datapune; ?>">
            </fieldset>

            <fieldset>
                <label>Pershkrimi: </label>
                <textarea name="pershkrimi" id="pershkrimi">
                <?php if (!empty($pershkrimi)) echo $pershkrimi; ?>
                </textarea>
            </fieldset>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
        </form>

    </section>
</main>
<?php include 'inc/footer.php' ?>