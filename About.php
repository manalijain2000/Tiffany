<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - Tiffany Finance Private Limited</title>
  <link rel="shortcut icon" href="img/dark-logo-sm.png">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="style.css">
 
  <!-- <link rel="stylesheet" href="bootstrap/font-awesome-min.css"> -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
  <!-- <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" /> -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <script src="js/chart.js"></script>
</head>

<?php
// Include the database connection file
include("db_connection.php");
// SQL query to select all products from the 'products' table
$teamMembersSql = "SELECT * FROM members";
$teamMembers = $conn->query($teamMembersSql);

$conn->close();
?>

<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100 loan-header" alt="...">

      <div class="top-left"><h2>Your <span class="tfpl">T</span>rusted <span class="tfpl">F</span>inancial <span class="tfpl">P</span>referred <span class="tfpl">L</span>ender</h2></div>
    </div>
  </div>
  <div class="container mt-5" id = "who-we-are">
    <div class="row">

      <h5 class="heading mb-4"> Who We Are?</h5>
      <p class="paragraph"> Incorporated in 2017, Tiffany Finance is a fast-growing NBFC (Non-Banking Finance Company) based out of
        Bhilwara, Rajasthan with a niche leadership in retail financing. </p>
      <p class="paragraph" >We are a Non-Banking Financial Company - Non-Systemically Important Non-Deposit taking Company (NBFC-ND),
        registered with Reserve Bank of India (“RBI”) under section 45- IA of the Reserve Bank of India Act, 1934.
      </p>
      <p class="paragraph">The company is managed by two dynamic entrepreneurs Mr. Virendra Prakash Ranka and Mr. Ronak Jain with a
        primary focus to reach and lend to the unorganized market and micro small and medium businesses (MSMEs)
        especially catering to semi-urban and rural areas.</p>
      <p class="paragraph">Main services of the company include Loan Against Property, Two-Wheeler Loan and Three- Wheeler Loan. </br>
        </br> We are known for dedicated customer service and safe and fair business practices. Our services are
        efficient and trusted by diverse range of customers. The process of applying for loans is fast and easy with a
        quick disbursement of funds within 5-7 days. </p>


    </div>
  </div>
  <div class="container text-center" id = "our-values">
  <h4 class="heading text-center  mt-5 ">Our Values</h4>
   <img src="img/values.png" class="values">
  </div>
  <div class="container-fluid" id="vision-n-mission">
    <div class="container-fluid">
        <div class="row justify-content-center  mt-3 py-5">
            <h4 class="heading text-center mb-4">Our Vision & Mission</h4>
            <div class="col-md-12 col-lg-6 p-4 bg-theme vission-mission"> <!-- Changed col-md-5 to col-md-12 and added col-lg-6 -->
                <img src="img/values/vision.png" class="vision-img">
                <span class="fs-1 ">Vision</span><br><br>
                <p>Vision Statement: To offer financial services to the underserved and under resourced market and transform into a most trusted financier in India serving a large number of customers.</p>
            </div>
            <div class="col-md-12 col-lg-6 p-4 bg-theme-sec"> <!-- Changed col-md-5 to col-md-12 and added col-lg-6 -->
                <img src="img/values/mission.png" class="vision-img2">
                <span class="fs-1">Mission</span><br><br>
                <p>Mission Statement: To provide sustainable financing and reach the maximum number of underserved micro, small, and medium enterprises by providing them easy and quick loans at the best interest rate possible, hence creating a positive impact on economic growth and contributing to financial inclusion.</p>
            </div>
            
        </div>
    </div>
</div>

 
  <div class="container" id='our-team'>
    <div class="row mt-5 meet-team-box justify-content-between">
      <h4 class="heading text-center mb-4 ">Meet The Team</h4>
      <?php foreach ($teamMembers as $teamMember) { ?>
        <div class="col-md-3 p-3 img-team-box">
          <div class="team-img"
            onclick="viewDetail('<?= $teamMember['first_name'] . ($teamMember['middle_name'] ? " " . $teamMember['middle_name'] : '') . ($teamMember['last_name'] ? " " . $teamMember['last_name'] : '') ?>', '<?= $teamMember['designation'] ?>', '<?= $teamMember['member_image'] ? $teamMember['member_image'] : 'img/client3.png' ?>', '<?= $teamMember['description'] ?>')">
            <img src="<?= $teamMember['member_image'] ? $teamMember['member_image'] : 'img/client3.png' ?>" alt="">
            <div class="mt-3">
              <h6>
                <?= $teamMember['first_name'] . ($teamMember['middle_name'] ? " " . $teamMember['middle_name'] : '') . ($teamMember['last_name'] ? " " . $teamMember['last_name'] : '') ?>
              </h6>
              <label class="team-position fw-bold ">
                <?= $teamMember['designation'] ?>
              </label>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- Modal -->
      <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="userDetailModalLabel">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 fs-6" id='member-name'>Mr. Virendra Prakash Ranka</h6>
                  <label class="ms-3 mb-0 border-start ps-3 fs-6" id='member-designation'>Managing Director</label>
                </div>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="team-img" data-bs-toggle="modal" data-bs-target="#userDetailModal">
                    <img src="img/client3.png" id='member-image' alt="" class="w-100">
                  </div>
                </div>
                <div class="col-md-9">
                  <p id='member-description'></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <?php include('footer.php') ?>
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script>
  function viewDetail(name, designation, image, description) {
    $('#member-name').text(name)
    $('#member-designation').text(designation)
    $('#member-description').text(description)
    $('#member-image').attr('src', image)
    $('#userDetailModal').modal('show')
  }

  $(document).ready(function () {
    emiCalculator()
    var hashValue = window.location.hash;
    var valueAfterHash = hashValue.substring(1);
    if (valueAfterHash) {
      var targetDiv = document.getElementById(valueAfterHash);
      if (targetDiv) {
        var offset = window.innerWidth < 768 ? 20 : 200;
        window.scrollTo({
          top: targetDiv.offsetTop - offset,
          behavior: 'smooth'
        });
      }
    }


  });


</script>