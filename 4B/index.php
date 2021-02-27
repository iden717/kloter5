<?php 
error_reporting(0);
include "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style/master.css" rel="stylesheet">
  <link href="style/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
    <?php 
    if ($_GET['add'] == 'buku') {
      include 'addtam.php';
    }
    if ($_GET['edit'] == 'true') {
      include 'edit.php';
    }
    if ($_GET['delete'] == 'true') {
      include 'delete.php';
    }
    if ($_GET['add'] == 'category') {
      include 'addkat.php';
    }
    ?>
<div class="container-fluid">
<?php
  $data_kat = $db->query("SELECT * FROM categories");
  if ($data_kat->num_rows > 0) {
    while($row = $data_kat->fetch_assoc()){
      $id = $row['id'];
?>
      <h3 style="padding-bottom:20px;">Kategori <span class="badge bg-secondary"> <?= $row['name_category']?></span></h3>
      <div class="row" style="padding-bottom:60px;">
    <?php
      $data = $db->query("SELECT categories.name_category,books.name,books.stok,books.deskripsi,books.id,books.image FROM books INNER JOIN categories ON categories.id = books.category_id WHERE categories.id = '".$id."'");
      if ($data->num_rows > 0) {
        while($row = $data->fetch_assoc()){
          ?>
            <div class="col-sm-3">
              <div class="card" style="width: 18rem;">
                <img src="<?= $row['image']?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"> <?= $row['name']; ?></h5>
                    <h5 class="card-title text-end"> Stock <?= $row['stok'];?></h5>
                    <p class="card-text" id="deskripsi"> <?= $row['deskripsi']; ?></p>
                    <div class="text-end" style="padding-bottom:20px;">
                      <a href="?edit=true&id=<?= $row['id']?>">Edit</a>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <button type="button" class="btn btn-primary" <?php if ($row['stok'] == 0) { echo "disabled"; }?>>Pinjam</button>
                      </div>
                      <div class="col-sm-6">
                        <button type="button" class="btn btn-success" >Kembalikan</button>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
    <?php
        }
      }
    ?>
  </div>
<?php
    }
  }

?>
</div>
<div id="container">
  <a href="index.php?add=buku" class="" id="act-btn">+</a>
  <a href="index.php?delete=true" class="" id="delete-btn"><img src="style/icon/delete-bin-line.svg" width="38" height="38"></a>
</div>

</body>
</html>