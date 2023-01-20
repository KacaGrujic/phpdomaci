<?php

require "dbBroker.php";
require "models/Aranzman.php";
require "models/Zaposleni.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$poruka = "";

if(isset($_POST['dodaj'])){
    $zaposleni = trim($_POST['zaposleni']);
    $klijent = trim($_POST['klijent']);
    $tip = trim($_POST['tip']);
    $kolicina = trim($_POST['kolicina']);
    $datum = trim($_POST['datum']);
    $datumF = date("Y-m-d", strtotime($datum));


    if(Aranzman::dodajAranzman($zaposleni, $klijent, $tip, $kolicina, $datumF, $konekcija)){
        header("Location: home.php");
    }else{
        $poruka = "Aranzman nije sačuvan";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cvecara</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div id="header"></div>
    <div id="header2"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="zаposleni">Zaposleni</label>
                    <select id="zaposleni" name="zaposleni" class="form-control">
                    </select>
                    <label for="klijent">Klijent</label>
                    <select id="klijent" name="klijent" class="form-control">
                    </select>
                    <label for="cvece">Cvece</label>
                    <select id="cvece" name="cvece" class="form-control">
                    </select>
                    <label for="kolicina">Kolicina</label>
                    <input type="int" id="kolicina" name="kolicina" class="form-control">                    
                    <label for="datum">Datum</label>
                    <input type="date" id="datum" name="datum" class="form-control">
                    <br>
                    <button class="BtnForm" type="submit" name="dodaj" >Dodaj</button>
                    <br><br>
                    <a href="pocetna.php", class="BtnForm">Nazad</a>

                </form>
            </div>
            <div style="height: 40px"></div>
            <br/>
            <br/>

        </div>
    </div>

    <div id="footer"></div>
 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>

    <script>
   


    </script>

</body>

</html>