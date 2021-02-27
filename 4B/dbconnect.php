<?php
    $db = new mysqli("localhost", "root", "", "kloter5");

    if ($db -> connect_error) {
        die("gagal konek : ". $db->connect_error);
    }
?>