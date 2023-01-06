<?php
/*1.	Kérdezzük le az aktuális napot (date függvény), majd ennek megfelelően írjunk ki egy üzenetet  magyarul (pld. Ma hétfő.)  */

$napok = Array( "vasárnap" , "hétfő" , "kedd",  "szerda", "csütörtök", "péntek", "szombat");
echo "<h2>Ma milyen nap van?</h2>";
$nap  =  $napok[date("w")];
print "Ma " .$nap. " van<br>";

?>

<?php

/*2.	Írjál programot, egy számológép elkészítésére (4 alapműveletre)*/

echo "<br><h2>Egyszeru szamologep</h2>"
?>

    <!DOCTYPE html>
    <html>
    <body>

    <?php
    ini_set('display_errors',0);

    if( isset( $_REQUEST['calculate'] ))
    {
        $operator=$_REQUEST['operator'];
        $n1 = $_REQUEST['first_value'];
        $n2 = $_REQUEST['second_value'];

        if($operator=="+")
        {
            $res= $n1+$n2;
        }
        if($operator=="-")
        {
            $res= $n1-$n2;
        }
        if($operator=="*")
        {
            $res =$n1*$n2;
        }
        if($operator=="/")
        {
            $res= $n1/$n2;
        }

        if($_REQUEST['first_value']==NULL || $_REQUEST['second_value']==NULL)
        {
            echo "<script language=javascript> alert(\"Please Enter Correct values.\");</script>";
        }
    }

    ?>

    <form>
        <table style="border:groove black">

            <tr>
                <td>Enter Number</td>
                <td colspan="1">
                    <input name="first_value" type="number" style="font-weight: bolder"/></td>
            </tr>

            <tr>
                <td>Select Operator</td>
                <td>
                    <select name="operator" style="width: 63px">
                        <option>+</option>
                        <option>-</option>
                        <option>*</option>
                        <option>/</option>
                    </select></td>
            </tr>

            <tr>
                <td>Enter Number</td>
                <td class="auto-style5">
                    <input name="second_value" type="number" style="font-weight: bolder"/></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="calculate" value="Calculate" style="color:wheat;background-color:blue" /></td>
            </tr>

            <tr>
                <td>Output = </td>
                <td style="font-weight: bolder"><?php echo $res;?></td>
            </tr>

        </table>
    </form>

    </body>
    </html>




<?php

/*3.	Készítsél egy osztó táblát 1-tól 10-ig*/

echo "<br><h2>Oszto tablazat</h2>"

?>

    <table align="center" border='1' width="100%">
        <?php

        $num = 10;
        for($i = 1; $i <= $num; $i++)
        {
            echo "<tr>";

            for($j =1; $j <= $num; $j++)
            {
                $oszto_tabla = ($j / $i);
                echo "<td>$j  / $i =  $oszto_tabla </td>";

            }

            echo "<tr/>";
        }

        ?>
    </table>

<?php

/*4.	Készítsél programot sakktábla kirajzolására */

echo "<br><h2>Sakk tabla</h2>"

?>

    <!DOCTYPE html>
    <html>
    <body>
    <table  cellspacing="0px" cellpadding="0px" border="1px">
        <?php
        for($row=1;$row<=8;$row++)
        {
            echo "<tr>";
            for($col=1;$col<=8;$col++)
            {
                $total=$row+$col;
                if($total%2==0)
                {
                    echo "<td height=50px width=50px bgcolor=#FFFFFF></td>";
                }
                else
                {
                    echo "<td height=50px width=50px bgcolor=#000000></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
    </body>
    </html>

<?php

/*5.	Készítsél függvényt, amely  egy sztring „Spongcase” változatát készíti el (*/

echo "<h2><br>String \"Spongecase\"</h2>";

$string = "Hello World";
$characters = str_split($string);
$i = 0;
do{
    $random_index = rand(0, count($characters) - 1);
    $unique_indices[] = "";
    while (in_array($random_index, $unique_indices)) {
        $random_index = rand(0, count($characters) - 1);
    }
    $unique_indices[] = $random_index;

    $random_letter = $characters[$random_index];
    if(ctype_alpha($random_letter)){
        $characters[$random_index] = strtoupper($random_letter);
        $i++;
    }
}while($i<5);echo implode('', $characters);
?>