<?php
session_start();
$dbcon;
dbConnection();
function dbConnection()
{
    global $dbcon;
    $dbcon = mysqli_connect('localhost', 'root', '', 'smp');
    //$dbcon=mysqli_select_db($dbcon,'smp');
    if (!$dbcon) {
        die("Lidhja me DB deshtoi" . mysqli_error($dbcon));
    }
}
function login($email, $fjalekalimi)
{
    global $dbcon;
    $sql = "SELECT antariid, emri, mbiemri, roli FROM antaret";
    $sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $result = mysqli_query($dbcon, $sql);
    if (mysqli_num_rows($result) == 1) {
        $antariData = mysqli_fetch_assoc($result);
        $antari=array();
        $antari['antariid']=$antariData['antariid'];
        $antari['emrimbiemri']=$antariData['emri']. " " . $antariData['mbiemri'];
        $antari['roli']=$antariData['roli'];
        $_SESSION['antari']=$antari;
        header("Location: punet.php");
    }else{
        echo "Ju lutem shenoni email dhe fjalkalim te sakte";
    }


}
if(isset($_GET['dalja'])){
    logout();
}
function logout(){
    unset($_SESSION);
    session_destroy();
    echo "index.php";
}
/** Funksionet per antaret */
function merrAntaret()
{
    global $dbcon;
    $sql = 'SELECT antariid, emri, mbiemri, telefoni, email, fjalekalimi, roli FROM antaret';
    return mysqli_query($dbcon, $sql);
}
function merrAntarId($id)
{
    global $dbcon;
    $sql = "SELECT antariid, emri, mbiemri, telefoni, email, fjalekalimi, roli FROM antaret";
    $sql .= " WHERE antariid=$id";
    $result = mysqli_query($dbcon, $sql);
    $antari = mysqli_fetch_assoc($result);
    return $antari;
}
function shtoAntar($emri, $mbiemri, $telefoni, $email , $password)
{
    global $dbcon;
    $sql = "INSERT INTO antaret(emri, mbiemri, telefoni, email ,fjalekalimi) VALUES ";
    $sql .= " ('$emri','$mbiemri','$telefoni','$email','$password')";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        $_SESSION['message']="Anetari u shtua me sukses";
        header("Location: anetaret.php");
    } else {
        die("Anetari u shtua me sukses" . mysqli_error($dbcon));
    }
}
function modifikoAntar($antariid, $emri, $mbiemri, $telefoni, $email)
{
    global $dbcon;
    $sql = "UPDATE antaret SET emri='$emri',mbiemri='$mbiemri',";
    $sql .= " telefoni='$telefoni', email='$email'";
    $sql .= " WHERE antariid=$antariid";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        echo "Anetari u modifikua me sukses";
    } else {
        die("Anetari nuk u modifikua me sukses" . mysqli_error($dbcon));
    }
}
function fshijAntar($aid)
{
    global $dbcon;
    $sql1 = "DELETE FROM antaret WHERE antariid=$aid";
    $result = mysqli_query($dbcon, $sql1);
    if ($result) {
        echo "Anetari u fshi me sukses";
    } else {
        die("Anetari nuk u fshi me sukses" . mysqli_error($dbcon));
    }
}
/** Funksionet per projekte */

function merrProjektet(){
    global $dbcon;
    $sql = 'SELECT projektiid, emri, pershkrimi, datafillimit, datambarimit FROM projektet';
    return mysqli_query($dbcon, $sql);
}
function merrProjektiid($id){
    global $dbcon;
    $sql = "SELECT projektiid, emri, pershkrimi, datafillimit, datambarimit FROM projektet";
    $sql .= " WHERE projektiid=$id";
    $result = mysqli_query($dbcon, $sql);
    $projekti = mysqli_fetch_assoc($result);
    return $projekti;
}
function shtoProjekt($emri , $pershkrimi , $datafillimit , $datambarimit){
    global $dbcon;
    $sql = "INSERT INTO projektet(emri , pershkrimi , datafillimit , datambarimit) VALUES";
    $sql .= " ('$emri' , '$pershkrimi' , '$datafillimit' , '$datambarimit')";
    $result = mysqli_query($dbcon , $sql);
    if($result){
        $_SESSION['messageP']="Projekti u shtua me sukses";
        header("Location: projektet.php");
    }else {
        die("Projekti nuk u shtua" . mysqli_error($dbcon));
    }
}
function modifikoProjekt($projektiid , $emri , $pershkrimi , $datafillimit , $datambarimit){
    global $dbcon;
    $sql = "UPDATE projektet SET emri='$emri',pershkrimi='$pershkrimi',datafillimit='$datafillimit',datambarimit='$datambarimit'";
    $sql .= " WHERE projektiid=$projektiid";
    $result = mysqli_query($dbcon , $sql);
    if($result){
        echo "Projekti u modifikua me sukses";
    }else {
        die("Projekti nuk u modifikua" . mysqli_error($dbcon));
    }
}
function fshijProjekt($pid){
    global $dbcon;
    $sql = "DELETE FROM projektet WHERE projektiid='$pid'";
    $result = mysqli_query($dbcon , $sql);
    if($result){
        echo "Projekti u fshi me sukses";
    }else {
        die("Projekti nuk u fshie" . mysqli_error($dbcon));
    }
}
/** Funksionet per punet */

function merrPunet()
{
    $antariid=$_SESSION['antari']['antariid'];
    global $dbcon;
    $sql = "SELECT p.punaid, p.antariid, p.projektiid,pr.emri, p.data, p.pershkrimi";
    $sql .= " FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    if($_SESSION['antari']['roli']!=1){
        $sql.=" WHERE p.antariid=$antariid";
    }
    $sql .= " ORDER BY p.punaid DESC";
    return mysqli_query($dbcon, $sql);
}

function merrPuneId($punaid)
{
    global $dbcon;
    $sql = "SELECT p.punaid, p.antariid, p.projektiid,pr.emri, p.data, p.pershkrimi";
    $sql .= " FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    $sql .= " WHERE p.punaid=$punaid";
    $puna = mysqli_query($dbcon, $sql);
    return mysqli_fetch_assoc($puna);
}
function shtoPune($projektiid, $datapune, $pershkrimi)
{
    global $dbcon;
    $antariid=$_SESSION['antari']['antariid'];
    $sql = "INSERT INTO punet(antariid,projektiid, data, pershkrimi) VALUES ";
    $sql .= " ($antariid,'$projektiid','$datapune','$pershkrimi')";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        $_SESSION['mesazhiPunet']="Puna u shtua me sukses";
        header("Location: punet.php");
    } else {
        die("Puna nuk u shtua me sukses" . mysqli_error($dbcon));
    }
}
function modifikoPune($punaid, $projektiid, $datapune, $pershkrimi)
{
    global $dbcon;
    $sql = "UPDATE punet SET projektiid='$projektiid',data='$datapune',";
    $sql .= " pershkrimi='$pershkrimi' WHERE punaid=$punaid";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        echo "Puna u modifikua me sukses";
    } else {
        die("Puna nuk u modifikua me sukses" . mysqli_error($dbcon));
    }
}
function fshijPune($punaid)
{
    global $dbcon;
    $sql1 = "DELETE FROM punet WHERE punaid=$punaid";
    $result = mysqli_query($dbcon, $sql1);
    if ($result) {
        echo "Puna u fshi me sukses";
    } else {
        die("Puna nuk u fshi me sukses" . mysqli_error($dbcon));
    }
}
