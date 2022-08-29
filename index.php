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
        <!-- <section id="projects">
            <h3 class="title">Projektet e fundit</h4>
                <article class="pitem">
                    <img src="images/project1.jpg" alt="Projekti i pare">
                    <h4 class="title">Dizajnimi e webit per Probit</h4>
                    <p>Ky projekt do mundesoj kompanis Probit publikimin e informatave per klientet me anene web faqes.</p>
                    <a href="#">me shume --&gt;&gt;</a>
                </article>
                <article class="pitem">
                    <img src="images/project0.jpg" alt="Projekti i dyte">
                    <h4 class="title">Applikacion per Shkollen Probit</h4>
                    <p>Ky projekt do mundesoj shkolles Probit Academy menaxhimin e studentave me ane te web app.</p>
                    <a href="#">me shume --&gt;&gt;</a>
                </article>
                <article class="pitem">
                    <img src="images/project2.jpg" alt="Projekti i trete">
                    <h4 class="title">Dizajnimi e webit per Probit</h4>
                    <p>Ky projekt do mundesoj kompanis Probit publikimin e informatave per klientet me anene web faqes.</p>
                    <a href="#">me shume --&gt;&gt;</a>
                </article>
        </section> -->
        <section id="projektet">
            <h3 class="title">Projektet e fundit</h4>
                <div class="slider">
                    <?php
                    $projektet = merrProjektet();
                    $i = 0;
                    while ($projekti = mysqli_fetch_assoc($projektet)) {
                        $projektiid = $projekti['projektiid'];
                        $emri = $projekti['emri'];
                        $pershkrimi = $projekti['pershkrimi'];
                        if (strlen($pershkrimi) > 120) {
                            $pershkrimi = substr($pershkrimi, 0, 100) . "...";
                        }
                        echo "<div class='card-info'>";
                        echo "<div class='card-img'>";
                        echo "<img src='images/project{$i}.jpg' alt='Projekti i pare'>";
                        echo "</div>";
                        echo "<div class='card-title'>";
                        echo "<h4>{$emri}</h4>";
                        echo "</div>";
                        echo "<div class='card-footer'><p>{$pershkrimi}</p></div>";
                        echo "<a class='meShume' href='projekti.php?projektiid={$projektiid}'>me shume &#8658;</a>";
                        echo "</div>";
                        $i++;
                        if ($i == 3) $i=0;
                        
                        
                    }
                    ?>

                </div>
        </section>
        <table id="members">
            <tr>
                <th>Emri dhe Mbiemri</th>
                <th>Telefoni</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $antaret = merrAntaret();
            if ($antaret) {
                $i = 0;
                while ($antari = mysqli_fetch_assoc($antaret)) {
                    if ($i % 2 != 0) {
                        echo "<tr class='alt'>";
                    } else {
                        echo "<tr>";
                    }
                    $aid = $antari['antariid'];
                    echo "<td>" . $antari['emri'] . " " . $antari['mbiemri'] . "</td>";
                    echo "<td>" . $antari['telefoni'] . "</td>";
                    echo "<td>" . $antari['email'] . "</td>";
                    echo "<td><a href='modifikoanetar.php?aid={$aid}'>Edit</a></td>";
                    echo "<td><a href='fshijanetar.php?aid={$aid}'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                    if ($i == 5) break;
                }
            }
            ?>
        </table>

    </section>
</main>
<?php include 'inc/footer.php' ?>