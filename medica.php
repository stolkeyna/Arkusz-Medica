<?php

$con = mysqli_connect("localhost", "root", "", "medica");


//Zapytanie 1: wybierające jedynie nazwę, cenę i opis wszystkich abonamentów
$sql_1 = 'SELECT abonamenty.nazwa, abonamenty.cena, abonamenty.opis FROM abonamenty;';

//-- Zapytanie 2: liczące średnią cenę abonamentów. Cena jest zaokrąglona do dwóch miejsc po przecinku oraz nadano nazwę kolumny (alias) na „Srednio_abonament”
$sql_2_a = 'SELECT abonamenty.nazwa, cechy.cecha FROM abonamenty 
 JOIN szczegolyabonamentu ON abonamenty.id=szczegolyabonamentu.Abonamenty_id
 JOIN cechy ON szczegolyabonamentu.Cechy_id=cechy.id
 WHERE abonamenty.id=1;';

$sql_2_b = 'SELECT abonamenty.nazwa, cechy.cecha FROM abonamenty 
 JOIN szczegolyabonamentu ON abonamenty.id=szczegolyabonamentu.Abonamenty_id
 JOIN cechy ON szczegolyabonamentu.Cechy_id=cechy.id
 WHERE abonamenty.id=2;';

 $sql_2_c = 'SELECT abonamenty.nazwa, cechy.cecha FROM abonamenty 
 JOIN szczegolyabonamentu ON abonamenty.id=szczegolyabonamentu.Abonamenty_id
 JOIN cechy ON szczegolyabonamentu.Cechy_id=cechy.id
 WHERE abonamenty.id=3;';

$wynik_1 = mysqli_query($con, $sql_1);
$wynik_2_a = mysqli_query($con, $sql_2_a);
$wynik_2_b = mysqli_query($con, $sql_2_b);
$wynik_2_c = mysqli_query($con, $sql_2_c);

// function lista ($id, $con){
//     $sql_2_c = 'SELECT abonamenty.nazwa, cechy.cecha FROM abonamenty 
//  JOIN szczegolyabonamentu ON abonamenty.id=szczegolyabonamentu.Abonamenty_id
//  JOIN cechy ON szczegolyabonamentu.Cechy_id=cechy.id
//  WHERE abonamenty.id= '.$id . ";";
// }

?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia Medica</title>
    <link rel="shortcut icon" href="Obraz2.png" type="image/x-icon">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php 
        //nagłówek 3 stopień Pakiet  <nazwa> - cena <cena> zł
        //paragraf
        while($wynik_1_arr = mysqli_fetch_array($wynik_1)){
            // echo "<pre>";
            // print_r($wynik_1_arr);
            // echo "</pre>";
            echo '<h3>' . ' Pakiet ' . $wynik_1_arr[0] . ' - cena ' . $wynik_1_arr[1] . ' zł' . '</h3>';
            echo '<p>' . $wynik_1_arr[2] . '</p>';
        }
        ?>
    </article>
    
    <main>
        <section>
            <h2>Standardowy</h2>  
            <ul>    
            <?php
            while($wynik_lista_arr = mysqli_fetch_array($wynik_2_a)){
                echo  '<li>' . $wynik_lista_arr[1] . '</li>' ;
            }
            ?>
            </ul>
        </section>
        <section>
            <h2>Premium</h2>  
            <ul>    
            <?php
            while($wynik_lista_arr = mysqli_fetch_array($wynik_2_b)){
                echo '<li>' . $wynik_lista_arr[1] . '</li>' ;
            }
            ?>
            </ul> 
        </section>
        <section>
            <h2>Dziecko</h2>
            <ul>
            <?php
            while($wynik_lista_arr = mysqli_fetch_array($wynik_2_c)){
                echo '<li>' . $wynik_lista_arr[1] . '</li>';
            }
            ?>
            </ul>

        </section>
    </main>

    <footer>
        <p>
            <img src="./obraz2.png" alt="Przychodnnia">
            Stronę przygotował: 6
        </p>
    </footer>

</body>
</html>