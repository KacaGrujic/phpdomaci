<?php
require "dbBroker.php";
require "models/Aranzman.php";

$zaposleni = trim($_GET['zaposleni']);
$sortiranje = trim($_GET['sortiranje']);

$aranzmani = Aranzman::pretraziAranzmane($zaposleni, $sortiranje, $konekcija);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Klijent</th>
            <th>Aranzman</th>
            <th>Zaposleni</th>
            <th>Kolicina</th>
            <th>Datum</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($aranzmani as $aranzman){
    ?>
    <tr>
        <td><?= $aranzman->ime . " " . $aranzman->prezime?></td>
        <td><?= $aranzman->naziv?></td>
        <td><?= $aranzman->imeZap . " " . $aranzman->prezimeZap?></td>
        <td><?= $aranzman->kolicina ?></td>
        <td><?= $aranzman->datum ?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>

