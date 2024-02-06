<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiffany Finance Private Limited</title>
   <link rel="shortcut icon" href="img/dark-logo-sm.png">
 <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="bootstrap/font-awesome-min.css"> -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <script src="js/chart.js"></script>
</head>
<?php
// Include the database connection file
include("db_connection.php");
$tbl_name = 'gallery_photos';
// SQL query to select all products from the 'products' table
$sql = "SELECT * FROM gallery_photos";
$photos = $conn->query($sql);
$conn->close();
?>
<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/about.jpg" class="d-block w-100" alt="...">
      <h3 class="heading">Gallary</h3>
    </div>
  </div>

  <div class="d-flex flex-wrap p-2">
      <?php foreach ($photos  as $key => $image) { ?>
          <div style="height:200px; width:200px;  margin:10px;">
                <img class="img-fluid" src = "<?= $image['gallery_image'] ?>" onclick = "showImageInModal('<?= $image['gallery_image'] ?>')">
          </div>
       <?php }  ?>
    </div>
  
  <?php include('footer.php') ?>

</body>
<div class="modal fade" id="image-to-be-displayed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class = 'w-100 h-100' src="" class="img-fluid" id="img-path" alt="Modal Image">
      </div>
    </div>
  </div>
</div>

      
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>

</html>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<script>
  function showImageInModal(path) {
    console.log(path)
    $('#image-to-be-displayed').modal('show')
    $('#img-path').attr('src', path);
  }
  $(document).ready(function () {
    emiCalculator()     
  });
</script>