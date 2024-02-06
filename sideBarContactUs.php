<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Emi</title>
     <link rel="shortcut icon" href="img/dark-logo-sm.png">
 <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
</head>

<body>
    <?php include('header.php') ?>

    <div class="container-fluid bg-light mt-5 pt-5">
        <div class="card p-4 container " id = 'contact-us-main-form'>
            <div class="row">
                <div>
                    <div class="row ">
                        <input class='input-clear-cls' type="hidden" id='contact_id'>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <div class="input-group mb-1">
                                <input type="text" class="form-control input-clear-cls" id="contact-name"
                                    placeholder="Enter Name">
                                <span class="input-icon"><i class=" fas fa-solid fa-user"></i></span>
                            </div>
                        </div>
                        <div class="mb-3  col-md-6">
                            <label class="form-label">Email ID</label>
                            <div class="input-group mb-1">
                                <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control input-clear-cls" id="contact-email"
                                    placeholder="ex@gmail.com">
                            </div>
                        </div>
                        <div class="mb-3  col-md-4">
                            <label class="form-label">Contact No</label>
                            <div class="input-group mb-1">
                                <span class="input-icon"><i class="fas fa-id-badge"></i></span>
                                <input type="number" class="form-control input-clear-cls" id="contact-phone_number"
                                    placeholder="Contact No">
                            </div>
                        </div>

                        <div class="mb-3  col-md-4">
                            <label class="form-label">State <span class='text-danger'>*</span></label>
                            <div class="input-group mb-1">
                                <select id="contact-state" class="form-select">
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="others">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3  col-md-4">
                            <label class="form-label">City</label>
                            <div class="input-group mb-1">
                                <span class="input-icon">
                                    <i class="fas fa-map-marker"></i></span>
                                <input type="text" class="form-control input-clear-cls" id="contact-city"
                                    placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <div class="input-group mb-1">
                            <span class="input-icon">
                                <i class="fas fa-comment-alt"></i></span>
                            <textarea class="form-control input-clear-cls" id="contact-message" rows="3"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-theme btn-sm mt-2" onclick="saveContactData()"> Submit </button>
                </div>
            </div>
        </div>
        <div class="d-none card" id = 'contact-us-main-msg-modal'>
            <div class="card-body">
                <h5 class="card-title" id = 'contact-us-dynamic-name'></h5>
                <p class="card-text">Thank you for contacting us! We will contact you shortly.</p>
                <a href="index.php" class="btn btn-btn-sm btn-theme">Home</a>
            </div>
        </div>
    </div>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <?php include('footer.php') ?>
    <!-- End of .container -->
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>

<!-- <script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script> -->
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/sweat-alert.js"></script>


<script>
    function saveContactData() {
        var contact_id = $("#contact_id").val();
        var name = $("#contact-name").val();
        var email = $("#contact-email").val();
        var phone_number = $("#contact-phone_number").val();
        var loan_acc_number = $("#contact-loan_acc_number").val();
        var state = $("#contact-state").val();
        var city = $("#contact-city").val();
        var message = $("#contact-message").val();

        console.log(name, email)
        if (!name || !email || !phone_number || !state) {
            Swal.fire({
                text: "Please fill in all required fields. Required fields marked as *",
                icon: "error"
            });
            return; // Stop further execution if validation fails
        }

        // first_name phone email loan type desired loan amoutn address
        var requestData = {
            name: name,
            email: email,
            phone_number: phone_number,
            loan_acc_number: loan_acc_number,
            state: state,
            city: city,
            message: message,
        };

        $.ajax({
            url: 'addUsersData.php?action=addContact', // replace with your backend endpoint
            type: 'POST',
            data: requestData,
            success: function (response) {
                var responseJson = JSON.parse(response);
                if (responseJson.success) {
                    $('#ContactUs').modal('hide');
                    $('#contact-us-main-form').addClass('d-none')
                    $('#contact-us-main-msg-modal').removeClass('d-none')
                    $('#contact-us-dynamic-name').val('Dear ' + name ? name : '')
                    Swal.fire({
                        text: "Record has been successfully recorded! Thank You",
                        icon: "success"
                    });
                    $('.input-clear-cls').val('')
                } else {
                    Swal.fire({
                        text: responseJson.message,
                        icon: "error"
                    });
                }
            },
            error: function (error) {
                console.error('Error adding data:', error);
            }
        });
    }
</script>