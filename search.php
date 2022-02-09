<?php
#Tech challenge - Coolshop internship
#Francesco Maula


#ricerca della chiave key nella colonna cnumber 
function check($buffer, $cnumber, $key) {

    $buffer = str_replace(";","",$buffer);
    $vect = explode (",",$buffer);

    if ($cnumber >= count($vect)) {
        die('Indice di colonna fuori dimensione');
    }
    
    if ($vect[$cnumber]==$key) {
        return 1;
    }
    return 0;
}


if ($argc != 4) {
    die('Numero di parametri non corretto');
}

$filename = $argv[1];
$cnumber = $argv[2];
$key = $argv[3];

$handler = fopen($filename, 'r');

if (false == $handler) {
    die('Impossibile aprire il file inserito');
}

$flag = 1;

#ciclo lettura file per righe e chiamata alla funzione di ricerca della chiave
while (false !== ($buffer = fgets($handler, 1024))) {
    if (check($buffer, $cnumber, $key) == 1) {
        echo $buffer;
        $flag = 0;
        break;
    }
}

if($flag == 1) {
    echo "Chiave $key non trovata";
}

fclose($handler);

?>