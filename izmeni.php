<?php
require "dbBroker.php";
require "models/Aranzman.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$poruka = "";

if(isset($_POST['izmeni'])){
    $aranzman = trim($_POST['aranzman']);
    $datum = trim($_POST['datum']);
    $datumF = date("Y-m-d", strtotime($datum));

    if(Aranzman::izmeniAranzman($aranzman, $datumF, $konekcija)){
        header("Location: home.php");
    }else{
        $poruka = "Aranzman nije izmenjen";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Salon lepote</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
 
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="aranzman">Aranzman</label>
                    <select id="aranzman" name="aranzman" class="form-control">

                    </select>
                    <label for="datum">Datum</label>
                    <input type="date" name="datum" class="form-control">
                    <br>
             
                    <button class="BtnForm" type="submit" name="izmeni">Izmeni</button>
                    <br> <br>
                    <a href="home.php", class="BtnForm">Nazad</a>

                </form>
            </div>

        </div>

    </div> 
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script src="js/main.js"></script>

    <script>
    function popuniAranzmane() {
            $.ajax({
                url: 'popuniAranzmane.php',
                success: function (data) {
                   $("#aranzman").html(data);
                }
            });
        }
        popuniAranzmane();

    </script>
</body>

</html>