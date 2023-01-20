<?php


class Aranzman{

   public $aranzmanID;
   public $zaposleniID;
   public $klijentID;
   public $cveceID;
   public $kolicina;
   public $datum;
  
    public function __construct($aranzmanID=null, $zaposleniID=null, $klijentID=null, $cveceID=null, $kolicina=null, $datum=null)
    {
        $this->aranzmanID = $aranzmanID;
        $this->zaposleniID=$zaposleniID;
        $this->klijentID=$klijentID;
        $this->cveceID=$cveceID;
        $this->kolicina=$kolicina;
        $this->datum=$datum;
    }

 

    public static function pretraziAranzmane($zaposleni, $sortiranje, mysqli $konekcija)
    {
        $sql = "SELECT * FROM aranzman a join zaposleni z on a.zaposleniID = z.zaposleniID join klijent k on a.klijentID = k.klijentID join cvece c on a.cveceID = c.cveceID";
        if($zaposleni != "1"){
            $sql .= " WHERE a.zaposleniID = " . $zaposleni;
        }
        $sql.= " ORDER BY a.datum " . $sortiranje;


        $resultSet = $konekcija->query($sql);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    public static function dodajAranzman($zaposleniID, $klijentID, $tipID, $kolicina, $datum, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO aranzman VALUES(null, '$zaposleniID' , '$klijentID', '$tipID' , '$kolicina', '$datum' )");  
    }

    public static function izmeniAranzman($aranzmanID, $datum, mysqli $konekcija)
    {
        return $konekcija->query("UPDATE aranzman SET datum = '$datum' WHERE aranzmanID = $aranzmanID");
    }

    public static function obrisiAranzman($aranzmanID, mysqli $konekcija)
    {
        return $konekcija->query("DELETE FROM aranzman WHERE aranzmanID = $aranzmanID");
    }
}