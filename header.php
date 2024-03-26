<div class="container-fluid page-header p-0">
    <nav class="navbar  navbar-expand-lg navbar-light">
        <div class="container-fluid align-items-start header-box">
            <a class="navbar-brand logo-img p-0" href="index.php">
                <img src="img/logofinal.png" alt="" class="logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-ico  fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0 px-3">
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['REQUEST_URI']) == 'index.php' || basename($_SERVER['REQUEST_URI']) == '' ? 'active' : '' ?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link  <?= basename($_SERVER['REQUEST_URI']) == 'About.php' ? 'active' : '' ?>" aria-current="page" href="About.php" id="navbarDropdownabout" role="button" data-bs-toggle="dropdown" aria-expanded="false">About </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownabout">
                            <li onclick = 'redirectToParticularDiv("About.php", "who-we-are")'>
                                <a class="dropdown-item">Who We Are?</a>
                            </li>
                            <li onclick = 'redirectToParticularDiv("About.php", "vision-n-mission")'>
                                <a class="dropdown-item ">Vision and Mission   </a>
                            </li>
                            <li onclick = 'redirectToParticularDiv("About.php", "our-values")'>
                                <a class="dropdown-item ">Our Values</a>
                            </li>
                            <li onclick = 'redirectToParticularDiv("About.php", "our-team")'>
                                <a class="dropdown-item border-bottom-0 " style="margin-bottom:-5px;">Our Team </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link  <?= in_array(basename($_SERVER['REQUEST_URI']), ['loan-against-property.php', 'home-construction-loan.php', 'commercial-vehicle-loan.php', 'personal-loan.php', 'business-loan.php']) ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> Products 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'loan-against-property.php' ? 'active' : '' ?>" href="loan-against-property.php">Loan Against Property</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'home-construction-loan.php' ? 'active' : '' ?>" href="home-construction-loan.php">Home Construction Loan  </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'commercial-vehicle-loan.php' ? 'active' : '' ?>" href="commercial-vehicle-loan.php">Commercial Vehicle Loan</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'two-vehicle-loan.php' ? 'active' : '' ?>" href="two-vehicle-loan.php">Two Wheeler Loan</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'personal-loan.php' ? 'active' : '' ?>" href="personal-loan.php">Personal Loan </a>
                            </li>
                            <li>
                                <a style="margin-bottom:-5px;" class="dropdown-item border-bottom-0 <?= basename($_SERVER['REQUEST_URI']) == 'business-loan.php' ? 'active' : '' ?>" href="business-loan.php">Business Loan </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown dropdown-hover" >
                        <a class="nav-link  <?= basename($_SERVER['REQUEST_URI']) == 'career.php' ? 'active' : '' ?>" href="career.php"
                         id="navbarDropdowncareer" role="button"  data-bs-toggle="dropdown" aria-expanded="false">Careers </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li onclick = 'redirectToParticularDiv("career.php", "lifeattiffany")'>
                                <a class="dropdown-item ">Life At Tiffany</a>
                            </li>
                            <!-- <li onclick = 'redirectToParticularDiv("career.php", "benefitsandperks")'>
                                <a class="dropdown-item ">Benefits And Perks  </a>
                            </li> -->
                            <li onclick = 'redirectToParticularDiv("career.php", "ouremployee")'>
                                <a class="dropdown-item ">Employee Desk</a>
                            </li>
                            <li onclick = 'redirectToParticularDiv("career.php", "applyforjob")'>
                                <a class="dropdown-item border-bottom-0">Join Our Team</a>
                            </li>
                            <!-- <li onclick = 'redirectToParticularDiv("career.php", "applyforjob")'>
                                <a class="dropdown-item border-bottom-0" style="margin-bottom:-5px;">Become Our Partner </a>
                            </li> -->
                           
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['REQUEST_URI']) == 'gallary.php' ? 'active' : '' ?>"  href="gallary.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['REQUEST_URI']) == 'contact.php' ? 'active' : '' ?>" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?php include('sideCalculator.php') ?>

<script>
    function redirectToParticularDiv(page, targetedDiv) {
        var hashValue = window.location.hash;
        var currentPage = window.location.pathname.split('/').pop();
        var valueAfterHash = hashValue.substring(1);
        if(valueAfterHash != targetedDiv) {
            var concateUrl = page + '#' + targetedDiv;
            window.location.href = concateUrl;
        }
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
    }
     document.addEventListener("DOMContentLoaded", function () {
        // Get all dropdown toggles that are meant to be shown on hover
        var dropdowns = document.querySelectorAll('.dropdown-hover');
        // Loop through each dropdown toggle
        dropdowns.forEach(function (dropdown) {
            // Add event listener for hover
            dropdown.addEventListener('mouseenter', function () {
                // Show the dropdown menu
                this.querySelector('.dropdown-menu').classList.add('show');
            });
            // Add event listener for mouse leave
            dropdown.addEventListener('mouseleave', function () {
                // Hide the dropdown menu
                this.querySelector('.dropdown-menu').classList.remove('show');
            });
        });
    });
</script>