<?php
require "dbBroker.php";
require "models/Aranzman.php";

$aranzmani = Aranzman::pretraziAranzmane("1", "asc", $konekcija);;

foreach ($aranzmani as $aranzman){

    ?>
    <option value="<?= $aranzman->aranzmanID ?>"><?= $aranzman->ime . " " . $aranzman->prezime . " (" . $aranzman->naziv . " - " . $aranzman->datum . " )"?></option>

<?php
}
?>