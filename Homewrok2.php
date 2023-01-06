<?php

/*1.	Az alábbi tömb, minden elemének írassuk ki a típusát és ha numerikus az „Igen” szót, különben „Nem”. (gettype, is_numeric függvények)*/

$array = [5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200'];

echo "<h2>Mi a tipusa az alabbi tomb elemeinek?</h2>";

echo  "5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200'"; echo "<br><br>";

foreach ($array as $value) {
    echo is_numeric($value) == true ? "Igen" . "<br>" : "Nem" . "<br>";
}
echo "<br>";
?>


<?php
/*2.	Az alábbi asszociatív tömböt felhasználva állítsuk elő a következő kimenetet:*/

echo "<h2>Aszociativ tomb</h2>";

$orszagok = array( " Magyarország"=>"Budapest", "Románia"=>"Bukarest", "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");
foreach ($orszagok as $key => $value){
    echo $key . " fővárosa " . $value . "<br>";
}
echo "<br>";
?>



<?php
/*3.	A $napok kétdimenziós tömböt írasd ki az alábbi formában:*/

echo "<h2>Napok kiiratasa</h2>";
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

$keys = array_keys($napok);
for($i = 0; $i < count($napok); $i++) {
    echo $keys[$i] . ": ";
    foreach($napok[$keys[$i]] as $value) {
        if ($value == end($napok[$keys[$i]])){
            echo $value;
        }
        else{
            echo $value . ", ";
        }
    }
    echo "<br>";
}
echo "<br>";
?>

<?php

/*4.	Írjunk függvényt, amely egy asszociatív tömb elemeit átalakítja kisbetűs vagy nagybetűs formára.*/

echo "<h2>Kis es nagybetuk kiiratasa</h2>";

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');
$atalakitas = function(array $pArray, int $meret){
    if ($meret != 0 && $meret != 1){
        echo "Helytelen méret paraméter!";
    }
    foreach ($pArray as $value){
        if ($meret == 0){
            echo strtolower($value) . " ";
        }
        elseif ($meret == 1){
            echo strtoupper($value) . " ";
        }
    }
    echo "<br>";
};

$atalakitas($szinek, 0);
$atalakitas($szinek, 1);
$atalakitas($szinek, 3);
?>