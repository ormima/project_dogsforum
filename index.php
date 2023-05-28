<?php

    $con = mysqli_connect("localhost", "root", "", "forumpsy");
    
    $sql_1 = "SELECT konta.nick, konta.postow, pytania.pytanie
    FROM konta JOIN pytania
    ON konta.id = pytania.konta_id
    WHERE pytania.id = 1";

    $res_1 = "";

    $query1 = mysqli_query($con, $sql_1);

    while($row = mysqli_fetch_row($query1)){
        $res_1 = "<h4>Uzytkownik: ".$row[0]."</h4>";
        $res_1 .= "<p>".$row[1]." postów na forum</p>";
        $res_1 .= "<p>".$row[2]."</p>";
    }

    $_POST["tekst"] ? $flaga = true : $flaga = false;

    if($flaga){
        $tekst = $_POST["tekst"];
        $sql2 = "INSERT INTO odpowiedzi (id, Pytania_id, konta_id, odpowiedz)
VALUES (NULL, 1, 5, '$tekst')";
        mysqli_query($con, $sql2);
    } else {

    }

    $sql3 = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi JOIN konta ON konta.id = odpowiedzi.konta_id WHERE odpowiedzi.Pytania_id = 1";

    $res2 = "";

    $query2 = mysqli_query($con, $sql3);
    while($row = mysqli_fetch_row($query2)){
        $res2 = "<ol><li><i>".$row[0]."</i></li><hr><li>".$row[1]."</li><hr><li>".$row[2]."</li><hr></ol>";
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="./styl.css"/>
</head>
<body>
    <div class="container">
        <header>
            <h1>Forum miłościnków psów</h1>
        </header>
        <div class="box">
            <nav>
                <img src="./avatar.png" alt="Użytkownik forum">
                <!-- skrypt1 -->
                <?=
                    $res_1;
                ?>
                <video src="./video.mp4" controls autoplay loop></video>
            </nav>
            <main>
                <!-- skrypt2 -->
                <form action="./index.php" method="post">
                    <textarea name="tekst" cols="40" rows="4"></textarea><br>
                    <button>Dodaj odpowiedź</button>
                </form>
                <h2>Odpowiedzi na pytanie</h2>
                <!-- skrypt3 -->
                <?=
                    $res2
                ?>
            </main>
        </div>
        <small>
            <span>Autor: <i>000000</i>,</span><a href="./http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
        </small>
    </div>
</body>
</html>