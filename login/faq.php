<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
        <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <script src="../js/sweat-alert.js"></script>
</head>

<body>
<div class="container-fluid py-1"> 
    <?php include('sideNavigation.php') ?>
    <section class="home-section">
      <div class="home-content">
        <div class="container-fluid pt-4 sidebar-content">
          <div class="d-flex mb-4 justify-content-between align-items-center">
            <h2 class="mb-0">Frequently Asked Questions List</h2>
            <!-- Add Product Button -->
            <button type="button" class="btn btn-theme btn-sm mb-0" onclick="addEditModal('add', '')"> Add FAQ <i class="fas fa-plus fs-8 ms-2"></i>
            </button>
          </div>
          <!-- DataTable -->
          <div class="card p-4 table-responsive">
            <table id="faqTable" class="table mt-3 w-100">
              <thead>
                <tr class="bg-light-primary">
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addFAQModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Product Form -->
                <form id = 'addEditForm' action="?action=add" update-action = '?action=update' method="post" enctype="multipart/form-data">
                  <div class="row">
                    <input type="hidden" name="faq_id" id="faq-id" value = "" class="form-control form-control-sm mb-3 input-value-clear" required>
                    <div class="col-md-12">
                      <label class="mb-2" for="productDescription">Question <span class = "text-danger">*</span></label>
                      <input type="text" name="question" id="question-id" class="form-control form-control-sm mb-3 input-value-clear" required>
                    </div>
                  </div>
                  <label  class="form-label">Answer <span class = "text-danger">*</span></label>
                  <textarea class="form-control input-value-clear" id="answer-id" name = 'answer' rows="3"></textarea>
                  <div class="col-md-12 mt-3">
                      <label class="mb-2" for="productImage">Loan Category <span class = "text-danger">*</span></label>
                      <!-- Add a select box for categories -->
                      <select name="category" id="loan-category-id" class="form-control form-control-sm mb-3" required>
                          <option value="loan-against-property">Loan-against-property</option>
                          <option value="home-construction-loan">Home-construction-loan</option>
                          <option value="commercial-vehicle-loan">Commercial-vehicle-loan</option>
                          <option value="personal-loan">Personal-loan</option>
                          <option value="business-loan">Business-loan</option>
                          <option value="education-loan">Education-loan</option>
                      </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addFormData(event)" class="btn btn-theme btn-sm">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
    <!-- Include your scripts here -->
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
</body>
</html>

<script>
  var dt
  $(document).ready(function() {
    window.dt = $('#faqTable').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
          "url": "faqServerSide.php?action=index",
          "type": "POST",
          "data": function(d) {
          d.draw = d.draw || 1; // Set a default value if not provided
          // You can add other custom parameters here
          }
      },
      "columns": [
        {
          "data": "question"
        },
        {
          "data": "answer"
        }, 
        {
          "data": "category"
        },
        {
          "data": "action"
        }],
      });
  });

  function addFormData(event) {
    $('#loader-id').removeClass('d-none')
    event.preventDefault()
    var formData = $('#addEditForm').serializeArray();
    var formDataObject = {};
    $.each(formData, function(index, field) {
        formDataObject[field.name] = field.value;
    });

    if( formDataObject.faq_id === '' || formDataObject.faq_id === undefined || formDataObject.faq_id === null) {
      $.ajax({
            url: 'faqServerSide.php?action=add', // replace with your backend endpoint
            type: 'POST',
            data: formDataObject,
            success: function(response) {
                var responseJson = JSON.parse(response);
                if(responseJson.success == true) {
                  window.dt.draw();
                  clearValues()
                  $('#addModal').modal('hide');
                  Swal.fire({
                    text: "FAQ added Successfully!",
                    icon: "success"
                  });
                }
              $('#loader-id').addClass('d-none')
            },
            error: function(error) {
                $('#loader-id').addClass('d-none')
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error
                });
            }
        });
    } else {
      $.ajax({
          url: 'faqServerSide.php?action=update', // replace with your backend endpoint
          type: 'POST',
          data: formDataObject,
          success: function(response) {
              var responseJson = JSON.parse(response);
              if (responseJson.success == true) {
                  window.dt.draw();
                  clearValues();
                  $('#addModal').modal('hide');
                  Swal.fire({
                      text: "FAQ updated Successfully!",
                      icon: "success"
                  });
              }
              $('#loader-id').addClass('d-none')
          },
          error: function(error) {
              console.error('Error updating data:', error);
          }
    });
    }
    
  }

  function clearValues() {
    $('.input-value-clear').val('')
  }

  function deleteFAQ(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $('#loader-id').removeClass('d-none')
          $.ajax({
            url: 'faqServerSide.php?action=delete&faq_id=' + id,// replace with your backend endpoint
            type: 'GET',
            success: function(response) {
                var responseJson = JSON.parse(response);
                $('#loader-id').addClass('d-none')
                if(responseJson.success_code == 200) {
                  Swal.fire({
                    title: "Deleted!",
                    text: "Your FAQ has been deleted!",
                    icon: "success"
                  });
                  window.dt.draw();
                }
            },
            error: function(error) {
                $('#loader-id').addClass('d-none')
                console.error('Error adding data:', error);
            }
          }); 
        }
      });
  }

  function addEditModal(type, id) {
    $('#loader-id').removeClass('d-none')
    $('.input-value-clear').val('')
    $('#addModal').modal('show');
    if(type == 'add') {
      $('#loader-id').addClass('d-none')
      $('#addFAQModalLabel').text('Add FAQ')
    } else {
      $('#addFAQModalLabel').text('Edit FAQ')
      $.ajax({
            url: 'faqServerSide.php?action=getSignleRecord', // replace with your backend endpoint
            type: 'GET',
            data: { id: id }, 
            success: function(response) {
                var responseJson = JSON.parse(response);
                
                if(responseJson.success_code == 200) {
                  var data = responseJson.data;
                  $('#faq-id').val(data.faq_id)
                  $('#question-id').val(data.question)
                  $('#answer-id').val(data.answer)
                  $('#loan-category-id').val(data.category)
                }
                $('#loader-id').addClass('d-none')
            },
            error: function(error) {
              $('#loader-id').addClass('d-none')
              console.error('Error adding data:', error);
            }
        });
    }
  }
</script>
