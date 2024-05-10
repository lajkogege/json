<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilus.css">
    <title>Document</title>
</head>

<body>
    <?php
    //Első beolvasás
    $fajl = readfile("kedvenc2.json");
    echo "$fajl<br>";
    //Második beolvasás
    $eroforras = fopen("kedvenc2.json", "r") or die("Unable to open file!");
    $fajl = fread($eroforras, filesize("kedvenc2.json"));  //teljes beolvasás
    fclose($eroforras);
    echo $fajl;

    //átalakítás tömbbé
    $tomb = json_decode($fajl);
    echo '<pre>' . var_export($tomb, true) . '</pre>';

    //táblázat kiiratása
    ?>
    <div>
        <table>
            <tr>
                <?php
                foreach ($tomb[0] as $kulcs => $ertek) {

                    echo "<th>";
                    echo $kulcs;
                    echo "</th>";
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < count($tomb); $i++) {
                    echo "<tr>";
                    foreach ($tomb[$i] as $kulcs => $ertek) {
                        if ($kulcs =="kép") {
                            echo "<td>";
                            echo "<img src='kepek/$ertek' alt=''>";
                            echo "</td>";
                        }
                        echo "<td>";
                        echo $ertek;
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tr>
            
        </table>
    </div>
</body>

</html>