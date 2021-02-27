<?php
echo "Masukan angka:";
$pal = trim(fgets(STDIN));
palindrom($pal);

function palindrom($nilai){
    $lenfor = strlen($nilai);
    $len = strlen($nilai)-1;
    $split = str_split($nilai);
    $no = 0;
    $check = 0;
    for ($i=0; $i < $lenfor ; $i++) { 
        if($split[$no++] == $split[$len-$i]){
            $data = $check;
        }else{
            $data = $check++;
        };
    }
    if($check == 0){
        echo $nilai." Merupakan bilangan palindrom";
    }else{
        echo $nilai." Bukan bilangan palindrom";
    }

}
?>