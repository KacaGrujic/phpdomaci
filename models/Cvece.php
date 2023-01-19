<?php

class Cvece {

    public $cveceID;
    public $naziv;

    public function __construct($cveceID=null,$naziv=null)
    {
        $this->cveceID = $cveceID;
        $this->naziv=$naziv;
    }

    public static function vratiCvece(mysqli $konekcija)
    {
        $sql = "SELECT * FROM cvece";
        $resultSet = $konekcija->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

}



