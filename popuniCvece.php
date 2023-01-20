<?php
require "dbBroker.php";
require "models/Cvece.php";

$cvece = Cvece::vratiCvece($konekcija);

foreach ($cvece as $cvet){

    ?>
    <option value="<?= $cvet->cveceID ?>"><?= $cvet->naziv ?> </option>

<?php
}
?>