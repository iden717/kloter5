<?php
    error_reporting(0);

    if ($_POST['action'] == 'books') {
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $tmp = $_FILES['image']['tmp_name'];

        $data = image($name,$size,$type,$tmp);
        addbooks($_POST['id'],$_POST['name'],$_POST['stok'],$data,$_POST['des'],$_POST['kat']);
    }else if ($_POST['action'] == 'category') {
        addCategory($_POST['id'],$_POST['name']);
    }else if ($_POST['action'] == 'edit') {
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $tmp = $_FILES['image']['tmp_name'];

        $data = image($name,$size,$type,$tmp);
        editbook($_POST['id'],$_POST['name'],$_POST['stok'],$data,$_POST['des'],$_POST['kat']);
    }else if ($_GET['action'] == 'delete') {
        deletebook($_GET['id']);
    }

    function addbooks($id,$name,$stok,$image,$des,$kat){
        include 'dbconnect.php';
        if (!empty($id) AND !empty($kat)) {
            $data = $db->query("INSERT INTO books(id,name,stok,image,deskripsi,category_id) VALUES ('".$id."','".$name."','".$stok."','".$image."','".$des."','".$kat."')");
            if ($data === TRUE) {
                echo "sukses";
            }else{
                echo "Error: " . $data . "<br>" . $db->error;
            }
        }else{
            echo "ggl";
        }
    }
    function addCategory($id,$name){
        include 'dbconnect.php';
        if (!empty($id) AND !empty($name)) {
            $data = $db->query("INSERT INTO categories(id,name_category) VALUES ('".$id."','".$name."')");
            if ($data === TRUE) {
                echo "sukses";
            }else{
                echo "Error: " . $data . "<br>" . $db->error;
            }
        }else{
            echo "ggl";
        }
    }
    function image($name,$size,$type,$tmp){

        $path = "style/image/".$name;

        if ($type == 'image/jpeg' || $type == 'image/png') {
            if ($size <= 5000000) {
                if (move_uploaded_file($tmp, $path)) {
                    return $path;
                }else{
                    echo "Error : Gagal upload gambar";
                }
            }else{
                echo "Error : Ukuran gambar harus di bawah 5MB";
            }
        }else{
            echo "Error : tipe gambar harus ber format JPG / PNG";
        }

    }

    function editbook($id,$name,$stok,$image,$des,$kat){
        include 'dbconnect.php';
        if (!empty($id) AND !empty($kat)) {
            $data = $db->query("UPDATE books SET id='".$id."', name='".$name."', stok='".$stok."', image='".$image."', deskripsi='".$des."', category_id='".$kat."' WHERE id='".$id."'");

            if ($data === TRUE) {
                echo "Record updated successfully";
            }else{
                echo "Error updating record: ".$db->error;
            }
        }
    }

    function deletebook($id){
        include 'dbconnect.php';
        if (!empty($id) ) {
            $data = $db->query("DELETE FROM books WHERE id='".$id."'");
            if ($data === TRUE) {
                echo "Delete successfully";
            }else{
                echo "Error Delete: ".$db->error;
            }
        }
    }
?>