<div class="container-fluid page-header p-0">
    <nav class="navbar  navbar-expand-lg navbar-light">
        <div class="container-fluid align-items-start header-box">
            <a class="navbar-brand logo-img p-0" href="index.php">
                <img src="img/dark-logo.png" alt="" class="logo-img">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= basename($_SERVER['REQUEST_URI']) == 'About.php' ? 'active' : '' ?>" aria-current="page" href="About.php"
                        id="navbarDropdownabout" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownabout">
                            <li>
                                <a class="dropdown-item">Who We Are?</a>
                            </li>
                            <li>
                                <a class="dropdown-item  ">Vision and Mission   </a>
                            </li>
                            <li>
                                <a class="dropdown-item ">Our Values</a>
                            </li>
                            <li>
                                <a class="dropdown-item ">Our Team </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['REQUEST_URI']), ['loan-against-property.php', 'home-construction-loan.php', 'commercial-vehicle-loan.php', 'personal-loan.php', 'business-loan.php']) ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button"
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
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'commercial-vehicle-loan.php' ? 'active' : '' ?>" href="commercial-vehicle-loan.php">Vehicle Loan </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'personal-loan.php' ? 'active' : '' ?>" href="personal-loan.php">Personal Loan </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= basename($_SERVER['REQUEST_URI']) == 'business-loan.php' ? 'active' : '' ?>" href="business-loan.php">Business Loan </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['REQUEST_URI']) == 'career.php' ? 'active' : '' ?>" href="career.php">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['REQUEST_URI']) == 'gallary.php' ? 'active' : '' ?>"  href="gallary.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['REQUEST_URI']) == 'contact.php' ? 'active' : '' ?>" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?php include('sideCalculator.php') ?>
