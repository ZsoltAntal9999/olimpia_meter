<?php
    $nevList="";
    $kivalasztott="";
    $strList="";
    require_once "config.php";
    $sql="Select nev from versenyzo order by nev";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
        extract($row);
        $nevList.="<option>{$nev}</option>";
    }

    if(isset($_POST["gomb"])){
        $kivalasztott=$_POST["nevek"];
        $sql="Select versenyszam.nev, ev from versenyszam inner join eredmeny on versenyszam.az=eredmeny.versenyszamaz
         inner join versenyzo on eredmeny.versenyzoaz=versenyzo.az where helyezes<4 and versenyzo.nev='{$kivalasztott}'";
        $stmt=$db->query($sql);
        while($row=$stmt->fetch()){
            extract($row);
            $strList.="<li>{$row["nev"]}"." - "."{$row["ev"]}</li>";
        }
    }
?>

<h1>
   Dobogósok listája
</h1>

<form method="post">
    <select name="nevek">
        <option value="0">
            Versenyzők
        </option>
        <?=$nevList?>
    </select>

    <input type="submit" value="Kilistáz" name="gomb">
</form>

<ul>
    <?=$strList?>
</ul>