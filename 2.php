<?php
$input = array(
    array('1','2','3'),
    array('1','2','3'),
    array('1','2','3'),
);
transpose($input);

function transpose($nilai = array()){
    //echo count($nilai);
    for ($baris=0; $baris < count($nilai) ; $baris++) { 
        //echo $baris;
        for ($kolom=0; $kolom < count($nilai[$baris]) ; $kolom++) { 
            echo $nilai[$kolom][$baris];
            # code...
        }
        echo "\n";
    }
}
?>