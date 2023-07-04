<?php 
$connect = mysqli_connect('mariadb106.server400620.nazwa.pl', 'server400620_generator2', 'T5%koNsLsw') or die('Could not connect');
// $connect = mysqli_connect('sql.server400620.nazwa.pl', 'server400620_generator', '1Zy(opC0d4') or die('Could not connect');
mysqli_query($connect,'SET NAMES utf8');
mysqli_select_db($connect,'server400620_generator2');

$devicesArray = array(
    array("chłodziarki farmaceutyczne","",""),
    array("chłodziarki laboratoryjne","laboratory refrigerators","refrigeradores de laboratorio"),
    array("zamrażarki laboratoryjne","Laboratory Freezers","Congeladores De Laboratorio"),
    array("zamrażarki niskotemperaturowe","Ultra-Low Freezers","Congeladores De Ultra-Baja Temperatura"),
    array("szafy termostatyczne","Cooled Incubators (ST)","Incubadoras Refrigeradas (ST)"),
    array("szafy termostatyczne do bzt","BOD Incubators","Incubadoras DBO"),
    array("inkubatory laboratoryjne","Cooled Incubators (IL)","Incubadoras Refrigeradas (IL)"),
    array("inkubatory z chłodzeniem peltiera","Peltier-Cooled Incubators","Incubadoras Refrigeradas Con El Sistema Peltier"),
    array("inkubatory CO2","CO2 incubators","Incubadoras de CO2"),
    array("cieplarki laboratoryjne","laboratory incubators","incubadoras de laboratorio"),
    array("suszarki laboratoryjne","Drying Ovens","Estufas De Secado"),
    array("suszarki simple","SIMPLE Drying Oven","Estufas De Secado SIMPLE"),
    array("suszarki z możliwością przedmuchiwania azotem","Drying ovens with nitrogen blow","Estufas De Secado con soplado de nitrógeno"),
    array("sterylizatory laboratoryjne","Laboratory Sterilizers","Esterilizadores"),
    array("sterylizatory przelotowe","Pass-Through Sterilizers","Esterilizadores De Transferencia"),
    array("komory grzewcze caldera","Heating-Up Chamber CALDERA","Cámara De Calentamiento"),
    array("komory klimatyczne kkp","KKP Climatic Chambers ","Cámaras Climáticas KKP"),
    array("komory klimatyczne","Climatic Chambers","Cámaras Climáticas"),
    array("komory fitotronowe","Climatic Chambers With Phytotron System","Cámaras Climáticas Con El Sistema Fitotrón"),
); 

/* 
    $device[0] // title_pl
    $device[1] // title_en
    $device[2] // title_es
    $device[3] // img_category_pl
    $device[4] // img_category_en
    $device[5] // img_category_es
    $device[6] // meta_pl
    $device[7] // meta_en
    $device[8] // meta_es

*/


foreach($devicesArray as $key => $device) {
    
    $query = "SELECT img_category_pl, img_category_en, img_category_es, meta_pl, meta_en, meta_es FROM kategorie_content WHERE nazwa_kategoria_pl = '$device[0]'";
   	$result = mysqli_query($connect,$query) or die(mysqli_error($connect));

    $row = mysqli_fetch_array($result);
    
    $devicesArray[$key][3] = $row['img_category_pl'];
    $devicesArray[$key][4] = $row['img_category_en'];
    $devicesArray[$key][5] = $row['img_category_es'];
    $devicesArray[$key][6] = $row['meta_pl'];
    $devicesArray[$key][7] = $row['meta_en'];
    $devicesArray[$key][8] = $row['meta_es'];

    
}
?>


<!DOCTYPE html>
<html lang="pl">
  <head>
    <link rel="stylesheet" href="./style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
  </head>
  <body>
    <div class="myContainer">


    <?php 
        foreach($devicesArray as $device) { ?>
            <a href="/<?php echo $device[3]; ?>">
            <div class="deviceBox">
            <div
                class="devicePhotoBox"
                style="background-image: url(./img/device_category_img/<?php echo $device[3]; ?>.webp)"
            ></div>
            <div class="deviceContentBox">
                <div class="content">
                    <h3 style="text-transform: uppercase;"><?php echo $device[0]; ?></h3>
                        <p>
                            <?php echo $device[6]; ?>
                        </p>
                </div>
            </div>
            </div>
            </a>
        
    <?php
        }
    ?>
    




      


      
    </div>
  </body>
</html>




