<?php
$uzenet="";
require_once "config.php";

if(isset($_POST["gomb"])){
    extract($_POST);
    $sql="INSERT INTO versenyszam values(null,'{$nev}','{$tipusnev}','{$nem}')";
    $stmt=$db->exec($sql);

if($stmt){
    $uzenet="Sikeres adatbeírás.";
}
else{ 
    $uzenet="Nem sikerült az adatbeírás!";
}
}
?>
<h1>Új versenyszám</h1>
<form method="post">
    <label>Versenyszám neve: </label> <input type="text" name="nev">
    <br>
    <label>Típusa: </label> <input type="text" name="tipusnev" id="uj">
    <br>
    <label>Nem: </label> <input type="text" name="nem" id="uj">
    <br>
    <input type="submit" value="Beír" name="gomb">
</form>

<div>
    <?=$uzenet?>
</div>