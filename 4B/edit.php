
<?php
  $id = $_GET['id'];
  $sqll = $db->query("SELECT * FROM books WHERE id='".$id."'");
  if ($sqll->num_rows > 0) {
    while($rows = $sqll->fetch_assoc()){
?>
<div class="container-fluid" style="padding-bottom: 50px;">
    <div class="row">
    <form method="POST" action="add.php" enctype="multipart/form-data">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                  Edit Buku
                </div>
                <div class="container-fluid" style="padding-bottom: 20px;">
                  <div class="col-md-12">
                    <input type="text" class="form-control" id="action" name="action" value="edit" style="display:none;">
                  </div>
                  <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $rows['id']?>">
                  </div>
                  <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $rows['name']?>">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress" class="form-label">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $rows['stok']?>">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress2" class="form-label">Gambar</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image" value="<?= $rows['image']?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="inputCity" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="des" name="des" value="<?= $rows['deskripsi']?>">
                  </div>
                  <div class="col-md-12" style="padding-bottom: 20px;">
                    <label for="inputZip" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kat">
                        <?php
                        $sqlkat = $db->query("SELECT * FROM categories");
                        if ($sqlkat->num_rows > 0) {
                            while($rowl = $sqlkat->fetch_assoc()){
                                ?>
                                <option name="kat" value="<?= $rowl['id']?>"><?= $rowl['name_category']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                </div>
            </div>  
        </div>
      </form>
      </div>
    </div>
<?php
  }
}
?>