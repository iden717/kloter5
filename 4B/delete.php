<div class="container-fluid" style="padding-bottom: 50px;">
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Stok</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $dataa = $db->query("SELECT categories.name_category,books.name,books.stok,books.deskripsi,books.id FROM books INNER JOIN categories ON categories.id = books.category_id");
if ($dataa->num_rows > 0) {
  while($roww = $dataa->fetch_assoc()){
?>
      <tr>
        <th scope="row"><?= $roww['id']?></th>
        <td><?= $roww['name']?></td>
        <td><?= $roww['stok']?></td>
        <td><?= $roww['name_category']?></td>
        <td><a href="add.php?action=delete&id=<?= $roww['id']?>" class="btn btn-danger"><img src="style/icon/delete-bin-line.svg" width="14" height="14"></a></td>
      </tr>
      <?php
  }
}
?>
    </tbody>
  </table>
  </div>