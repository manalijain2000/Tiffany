<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
    <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <!--<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>-->
    <script src="../js/sweat-alert.js"></script>

</head>
<body>
<div class="container-fluid py-1"> 
<?php include('sideNavigation.php') ?>
  <section class="home-section">
    <div class="home-content">
      <div class="container-fluid pt-4 sidebar-content">
        <!-- DataTable -->
        <div class="card p-4 table-responsive">
          <table id="productTable" class="table mt-3 w-100">
            <thead>
              <tr class="bg-light-primary">
                <th>Product Title</th>
                <th>Product Description</th>
                <th>Loan Category</th>
                <th>Product Image</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- Edit Product Modal -->
      <div class="modal fade" id="addEditModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Product Form -->
              <form action="add_products.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <input type="hidden" name="product_id" id="product-id" class="form-control form-control-sm mb-3">
                  <div class="col-md-12">
                    <label class="mb-2" for="product_title">Product Title</label>
                    <input type="text" name="product_title" id="product-title" class="form-control form-control-sm mb-3" required>
                  </div>
                  <div class="col-md-12">
                    <label class="mb-2" for="loan_category">Loan Category</label>
                    <select name="loan_category" id="loan-category" class="form-control form-control-sm mb-3" disabled=true>
                        <option value="loan-against-property">loan-against-property</option>
                        <option value="home-construction-loan">home-construction-loan</option>
                        <option value="commercial-vehicle-loan">commercial-vehicle-loan</option>
                        <option value="personal-loan">personal-loan</option>
                        <option value="business-loan">business-loan</option>
                        <option value="education-loan">education-loan</option>
                    </select>
                  </div>

                  <div class="col-md-12">
                    <label class="mb-2" for="product_url">Product Image</label>
                    <input type="file" name="product_url" id="product-url" class="form-control form-control-sm mb-3" required>
                  </div>
                </div>
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" name = 'product_description' id="product-description" rows="3"></textarea>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-theme btn-sm" onclick = "saveFormData(event)">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
</body>
</html>
<script>
    var dt
    $(document).ready(function() {
      window.dt = $('#productTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "productServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
            d.draw = d.draw || 1; // Set a default value if not provided
            // You can add other custom parameters here
            }
        },
        "columns": [{
            "data": "product_title"
        }, {
            "data": "product_description"
        },
        {
            "data": "loan_category"
        },
        {
            "data": "product_url"
        },
         {
            "data": "action"
        }],
        });
    });

    function addEditModal(type, id) {
        clearValues()
        $('#addEditModal').modal('show');
        if(type == 'add') {
        $('#addProductModalLabel').text('Add Product')
        } else {
          $('#loader-id').removeClass('d-none')
          $('#addProductModalLabel').text('Edit Product')
          $.ajax({
                  url: 'productServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                  type: 'GET',
                  data: { id: id }, 
                  success: function(response) {
                      var responseJson = JSON.parse(response);
                      console.log(responseJson);
                      if(responseJson.success_code == 200) {
                        var data = responseJson.data;
                        $('#product-id').val(data.product_id)
                        $('#loan-category').val(data.loan_category)
                        $('#product-description').val(data.product_description)
                        $('#product-title').val(data.product_title)
                      }
                      $('#loader-id').addClass('d-none')
                  },
                  error: function(error) {
                      console.error('Error adding data:', error);
                  }
              });
          }
      }

    function saveFormData(event) {
        event.preventDefault();
        $('#loader-id').removeClass('d-none')
        var product_id = $('#product-id').val();
        var product_title = $('#product-title').val();
        var product_description = $('#product-description').val();
        var bank_image_el = document.getElementById('product-url');

        var formDataObject = new FormData();
        formDataObject.append('product_id', product_id);
        formDataObject.append('product_title', product_title);
        formDataObject.append('product_description', product_description);

        if (bank_image_el.files.length > 0) {
            var file = bank_image_el.files[0];
            formDataObject.append('product_url', file);
        }

        $.ajax({
            url: 'productServerSide.php?action=update',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formDataObject,
            success: function(response) {
                var responseJson = JSON.parse(response);
                if (responseJson.success == true) {
                    window.dt.draw();
                    clearValues();
                    $('#loader-id').addClass('d-none')
                    $('#addEditModal').modal('hide');
                    Swal.fire({
                        text: "Product Updated Successfully!",
                        icon: "success"
                    });
                }
            },
            error: function(error) {
                $('#loader-id').addClass('d-none')
                console.error('Error updating data:', error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error
                });
            }
        });
    }
  

    function clearValues() {

    }
</script>