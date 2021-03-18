<?php
require_once "config.php";
$strLista="";
$sql="SELECT nev, tipus, nem from versenyszam order by nev asc, tipus asc";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
        $strLista.="<tr><td>{$row["nev"]}</td><td>{$row["tipus"]}</td><td>{$row["nem"]}</td></tr>";
    }
?>

<h1>Összes versenyszám</h1>

<table>
    <thead>
        <th>Versenyszám neve</th>
        <th>Típusa</th> 
        <th>Nem</th>
    </thead>

    <tbody>
        <?=$strLista?>
    </tbody>

</table>