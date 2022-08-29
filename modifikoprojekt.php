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
        if(isset($_GET['pid'])){
            $projektiid= $_GET['pid'];
            $projekti = merrProjektiid($projektiid);
            $emri = $projekti['emri'];
            $pershkrimi = $projekti['pershkrimi'];
            $datafillimit = $projekti['datafillimit'];
            $datambarimit = $projekti['datambarimit'];
        }
            if(isset($_POST['modifiko'])){
                modifikoProjekt($_POST['projektiid'],$_POST['emri'],$_POST['pershkrimi'],$_POST['datafillimit'],$_POST['datambarimit']);
            }
    ?>
    <form id="login" class="box" method="post">
        <legend>Modifiko projektin</legend>
        <fieldset>
            <label>ID: </label>
            <input type="text" name="projektiid" id="projektiid" readonly value="<?php if(!empty($projektiid)) echo $projektiid; ?>">
        </fieldset>
        <fieldset>
            <label>Emri: </label>
            <input type="text" name="emri" id="emri" value="<?php if(!empty($emri)) echo $emri; ?>">
        </fieldset>
        <fieldset>
            <label>Pershkrimi: </label>
            <input type="text" name="pershkrimi" id="pershkrimi" value="<?php if(!empty($pershkrimi)) echo $pershkrimi; ?>">
        </fieldset>
        <fieldset>
            <label>Data e fillimit: </label>
            <input type="date" name="datafillimit" id="datafillimit" value="<?php if(!empty($datafillimit)) echo $datafillimit; ?>">
        </fieldset>
        <fieldset>
            <label>Data e mbarimit: </label>
            <input type="date" name="datambarimit" id="datambarimit" value="<?php if(!empty($datambarimit)) echo $datambarimit; ?>">
        </fieldset>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
    </form>
    </section>
</main>
<?php include 'inc/footer.php' ?>