<?php
    $orszagList="";
    $kivalasztott="";
    $strLista="";
    require_once "config.php";
    $sql="Select orszag from eredmeny Group by orszag";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
        extract($row);
        $orszagList.="<option>{$orszag}</option>";
    }

    if(isset($_POST["gomb"])){
        $kivalasztott=$_POST["orszagok"];
        $sql="SELECT nev, ev from versenyzo inner join eredmeny on versenyzo.az=eredmeny.versenyzoaz
         where orszag='{$kivalasztott}' ORDER by ev asc";
        $stmt=$db->query($sql);
        while($row=$stmt->fetch()){
            extract($row);
            $strLista.="<tr><td>{$row["nev"]}</td><td>{$row["ev"]}</td></tr>";
        }
    }
?>

<h1>
   Nemzetek olimpikonjai
</h1>

<form method="post">
    <select name="orszagok">
        <option value="0">
            Válassz egy országot
        </option>
        <?=$orszagList?>
    </select>

    <input type="submit" value="Kilistáz" name="gomb">
</form>

<table>
    <thead>
        <th>Versenyző neve</th>
        <th>Olimpia éve</th> 
    </thead>

    <tbody>
        <?=$strLista?>
    </tbody>
</table>