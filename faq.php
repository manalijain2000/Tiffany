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
// SQL query to select all products from the 'products' table
$faqsSql = "SELECT * FROM faq_section";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
    <?php include('header.php') ?>
    <div class="container-fluid p-0 banner-header">
        <div class=" header-slider">
            <img src="img/about.jpg" class="d-block w-100" alt="...">
            <h3 class="heading">FAQs</h3>
        </div>
    </div>
    <div class = "container-fluid  mt-0">
        <div class="row align-items-center">
            <div class="col-md-5">
                <img src="img/faq.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 mt-3">
                <div class="faq-box">
                     <?php foreach ($faqs as $faq) { ?>
                            <div class="accordion  mb-2" id="accordionExample<?= $faq['faq_id'] ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne<?= $faq['faq_id'] ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne<?= $faq['faq_id'] ?>" aria-expanded="false"
                                            aria-controls="collapseOne<?= $faq['faq_id'] ?>">
                                            <?= $faq['question'] ?>
                                        </button>
                                    </h2>
                                    <div id="collapseOne<?= $faq['faq_id'] ?>" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne<?= $faq['faq_id'] ?>"
                                        data-bs-parent="#accordionExample<?= $faq['faq_id'] ?>">
                                        <div class="accordion-body">
                                            <p>
                                                <?= $faq['answer'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                 </div>
            </div>
        </div>
       
    </div>

    <?php include('footer.php') ?>

</body>


</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script>
    $(document).ready(function () {
        emiCalculator()     
    });
</script>