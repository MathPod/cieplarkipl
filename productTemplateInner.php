<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php 

$lang = "pl";
$path = 'chlodziarka-farmaceutyczna-chs-1';

$connect = mysqli_connect('mariadb106.server400620.nazwa.pl', 'server400620_generator2', 'T5%koNsLsw') or die('Could not connect');
// $connect = mysqli_connect('sql.server400620.nazwa.pl', 'server400620_generator', '1Zy(opC0d4') or die('Could not connect');
mysqli_query($connect,'SET NAMES utf8');
mysqli_select_db($connect,'server400620_generator2');



$query = "SELECT name_pl, name_en, name_es, url_pl, url_en, url_es, content_1_pl, content_1_en, content_1_es, seo_description_pl, content_1_en, content_1_es FROM cieplarki_pl WHERE url_".$lang." = '$path'";
$result = mysqli_query($connect,$query) or die(mysqli_error($connect));

$row = mysqli_fetch_array($result);
$url = $row['url_'.$lang];

$query2 = "SELECT category_url_pl, category_url_en, category_url_es FROM all_products_list WHERE url_".$lang." = '$url'"; 
$result2 =  mysqli_query($connect,$query) or die(mysqli_error($connect));
$row2 = mysqli_fetch_array($result2);
$category = $row2['url_'.$lang];

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
            <a href="">
                <div class="deviceBox deviceBoxBig">
                    <div class="productLvl4titleBox">
                      <h1 class=""><?php echo($row['name_'.$lang]); ?></h1>
                    </div>
                </div>
            </a>  
            
              <div class="deviceBox deviceBoxBig">
                <!-- <div class="devicePhotoBoxLvl2Category devicePhotoBoxLvl3Category" style="background-image: url(./img/chlodziarki-farmaceutyczne.webp);"></div> -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/chlodziarki-farmaceutyczne.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/chlodziarki-farmaceutyczne.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/chlodziarki-farmaceutyczne.webp" class="d-block w-100" alt="...">
    </div>
    <?php 
        
       
       echo("test");
      //  $zdjecia_url = 'https://pol-eko.com.pl/img/devices_galleries_img/'.$lang.'/'.$url.'/';
       $zdjecia_url = 'http://pol-eko.com.pl/img/devices_galleries_img/pl/chlodziarka-farmaceutyczna-chs-1/';
       
    

// Pobierz zawartość katalogu ze zdjęciami
$zdjecia_zawartosc = file_get_contents($zdjecia_url);

if ($zdjecia_zawartosc === false) {
    // Obsłuż błąd pobierania zawartości katalogu
    echo 'Wystąpił błąd podczas pobierania zawartości katalogu ze zdjęciami.';
} else {
    // Przeanalizuj zawartość katalogu
    $zdjecia = array();
    $zdjecia_zawartosc = explode("\n", $zdjecia_zawartosc);
    foreach ($zdjecia_zawartosc as $plik) {
        $plik = trim($plik);
        if (!empty($plik)) {
            $zdjecia[] = $plik;
        }
    }

    // Wyświetl listę zdjęć
    if (count($zdjecia) > 0) {
        foreach ($zdjecia as $zdjecie) {
            echo '<img src="' . $zdjecia_url . $zdjecie . '" alt="' . $zdjecie . '"><br>';
        }
    } else {
        echo 'Brak zdjęć w katalogu.';
    }
}
       
      //  $file_list="<select name='baza' size='0'>";
   
      //  while($file_name=readdir($dir))
      //  {
      //    if(($file_name!=".")&&($file_name!=".."))
      //    {
      //   //  if($flaga_first_picture == 0) {$first_picture = $file_name; $flaga_first_picture++;}
      //    $files_to_input .= $file_name.';';
      //    //$file_list.="<option>$file_name";
      //    }
      //  }
      //    //$file_list.="</option>";
      //    closedir($dir);

      //    print_r($files_to_input);

      
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
              </div>
            
    </div>

    <div class="myContainer">
      <div class="contentBox">
        <?php echo($row['content_1_'.$lang]); ?>
      </div>
    </div>

    <div class="myContainer buttonContainer">
      <a href="https://pol-eko.com.pl/<?php echo($category.'/'.$url)?>">
        <button class="detailsButton">poznaj lepiej <?php echo($row['name_'.$lang]); ?></button>
      </a>
    </div>
    
  </body>


