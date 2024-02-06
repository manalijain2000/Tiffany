<div class="container-fluid py-1">
  <div class="row justify-content-end">
    <div class="col d-flex justify-content-end align-items-center">
      <button class="btn btn-white">
        <i class="far fa-user fs-4"></i>
      </button>
      <button class="btn ms-2 btn-white d-flex">
        <i class="fas fa-sign-out-alt fs-4 me-2"></i>
        <a href="index.php">Log Out</a>
      </button>
    </div>
  </div>
</div>

<div class="sidebar" id='set-image-icon'>
  <div class="logo-details justify-content-center">
    <i class='d-none bx bxl-c-plus-plus' id='logo-image'>
      <img src="../img/dark-logo-sm.png" alt="" class="w-50 text-center">
    </i>
    <span class=" logo_name text-center mt-2" id='logo-complete-image'>
      <img src="../img/logo-sm.png" alt="" class="w-100 text-center px-3 ">
    </span>
  </div>
  <ul class="nav-links">
    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "applicant.php" ? "active" : "" ?>">
      <a href="applicant.php">
        <i class='bx bx-grid-alt '>
          <svg height="20px" width="20" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96.93 122.88">
            <defs>
              <style>
                .cls-1 {
                  fill-rule: evenodd;
                }
              </style>
            </defs>
            <path fill="currentcolor" d="M26.88,66.35a1.73,1.73,0,0,1,2.47,0,1.78,1.78,0,0,1,0,2.5l-3,3,3,3a1.75,1.75,0,0,1-2.48,2.48l-3-3-3,3a1.74,1.74,0,0,1-2.46,0,1.78,1.78,0,0,1,0-2.5l3-3-3-3a1.75,1.75,0,0,1,0-2.48,1.72,1.72,0,0,1,2.45,0l3,3,3-3ZM30.32,5.2H40.81V1.65A1.65,1.65,0,0,1,42.45,0h12a1.66,1.66,0,0,1,1.65,1.65V5.2H66.61a2.34,2.34,0,0,1,2.33,2.32v4.05a52.41,52.41,0,0,1-8.3,4.7,44.44,44.44,0,0,1-8.72,2.91V16.87a1.78,1.78,0,0,0-1.79-1.78H46.79A1.78,1.78,0,0,0,45,16.87v2.26a45.31,45.31,0,0,1-8.51-2.86A52.93,52.93,0,0,1,28,11.42V7.52A2.33,2.33,0,0,1,30.32,5.2ZM50,17H47a.17.17,0,0,0-.17.18v6.38a.17.17,0,0,0,.17.17h3a.19.19,0,0,0,.13-.05.17.17,0,0,0,0-.12V17.21A.18.18,0,0,0,50,17ZM53.22,2.25H43.71a.2.2,0,0,0-.2.2V5.13h9.91V2.45a.21.21,0,0,0-.21-.2ZM68.94,15.17V29.39a2.33,2.33,0,0,1-2.33,2.32H30.32A2.33,2.33,0,0,1,28,29.39V15a54.17,54.17,0,0,0,6.93,3.75,50,50,0,0,0,10,3.26l.07,0v1.86a1.83,1.83,0,0,0,.52,1.27,1.78,1.78,0,0,0,1.26.52h3.34a1.79,1.79,0,0,0,1.27-.52,1.83,1.83,0,0,0,.52-1.27V22.08l.28,0a49.32,49.32,0,0,0,10-3.26,54.5,54.5,0,0,0,6.72-3.61ZM20.67,22.32h-15a.61.61,0,0,0-.58.6v94.27a.6.6,0,0,0,.58.59H91.29a.6.6,0,0,0,.58-.59V22.92a.61.61,0,0,0-.58-.59h-15V17.25h15a5.68,5.68,0,0,1,5.68,5.68V117.2a5.69,5.69,0,0,1-5.68,5.68H5.68A5.69,5.69,0,0,1,0,117.2V22.92a5.68,5.68,0,0,1,5.68-5.68h15v5.08Zm56.52,77a2.57,2.57,0,1,0,0-5.13H43a2.57,2.57,0,1,0,0,5.13H77.19Zm0-49.32a2.57,2.57,0,1,0,0-5.14H43A2.57,2.57,0,0,0,43,50Zm0,24.32a2.57,2.57,0,1,0,0-5.13H43a2.57,2.57,0,1,0,0,5.13Zm-58.6,22.3a2.28,2.28,0,1,1,3.79-2.53L23.62,96l4.92-6a2.28,2.28,0,0,1,3.52,2.89l-6.81,8.29a3,3,0,0,1-.55.52,2.29,2.29,0,0,1-3.16-.63l-2.95-4.38Zm.62-49.93a2.3,2.3,0,0,1,3.17.63l1.24,1.84,4.92-6a2.28,2.28,0,1,1,3.52,2.89l-6.81,8.28a2.48,2.48,0,0,1-.55.52,2.27,2.27,0,0,1-3.16-.63l-2.95-4.37h0a2.29,2.29,0,0,1,.62-3.17Z" />
          </svg>
        </i>
        <span class="link_name">Loan Applicants</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "applicantTransaction.php" ? "active" : "" ?>">
      <a href="applicantTransaction.php">
        <i class='bx bx-grid-alt'>
          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2929 3.29289C15.6834 2.90237 16.3166 2.90237 16.7071 3.29289L22.3657 8.95147C23.1216 9.70743 22.5862 11 21.5172 11H2C1.44772 11 1 10.5523 1 10C1 9.44772 1.44772 9 2 9H19.5858L15.2929 4.70711C14.9024 4.31658 14.9024 3.68342 15.2929 3.29289ZM4.41421 15H22C22.5523 15 23 14.5523 23 14C23 13.4477 22.5523 13 22 13H2.48284C1.41376 13 0.878355 14.2926 1.63431 15.0485L7.29289 20.7071C7.68342 21.0976 8.31658 21.0976 8.70711 20.7071C9.09763 20.3166 9.09763 19.6834 8.70711 19.2929L4.41421 15Z" fill="currentcolor"/>
          </svg>
        </i>
        <span class="link_name"> Applicant Transactions</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "contactsAuth.php" ? "active" : "" ?>">
      <a href="contactsAuth.php">
        <i class='bx bx-grid-alt'>
          <svg fill="currentcolor" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4,21a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1H5A1,1,0,0,0,4,3ZM12,7.5a2,2,0,1,1-2,2A2,2,0,0,1,12,7.5ZM8.211,16.215a4,4,0,0,1,7.578,0A.993.993,0,0,1,14.83,17.5H9.18A1,1,0,0,1,8.211,16.215Z"/></svg>
        </i>
        <span class="link_name">Contact Applicants</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "job_applicant.php" ? "active" : "" ?>">
      <a href="job_applicant.php">
        <i class='bx bx-grid-alt'>
          <svg fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
            <path d="M37.3,31.9h21.8c1.1,0,2-0.9,2-2v-4c0-3.3-2.7-5.9-5.9-5.9H41.3c-3.3,0-5.9,2.7-5.9,5.9v4 C35.3,31,36.2,31.9,37.3,31.9z"/>
            <path d="M70,24.9h-2c-0.6,0-1,0.4-1,1v4c0,4.4-3.6,7.9-7.9,7.9H37.3c-4.4,0-7.9-3.6-7.9-7.9v-4c0-0.6-0.4-1-1-1h-2 c-3.3,0-5.9,2.7-5.9,5.9v40.6c0,3.3,2.7,5.9,5.9,5.9h20c2.8,0,3.1-2.3,3.1-3.1V52.8c0-2.3,1.3-2.8,2-2.8h21.6c2.4,0,2.8-2.1,2.8-2.8 V31C76,27.6,73.3,24.9,70,24.9z"/>
            <path d="M78.4,60.4H56.6c-0.6,0-1.1-0.5-1.1-1.1v-2.2c0-0.6,0.5-1.1,1.1-1.1h21.8c0.6,0,1.1,0.5,1.1,1.1v2.2 C79.5,59.9,79,60.4,78.4,60.4z M78.4,70.2H56.6c-0.6,0-1.1-0.5-1.1-1.1v-2.2c0-0.6,0.5-1.1,1.1-1.1h21.8c0.6,0,1.1,0.5,1.1,1.1v2.2 C79.5,69.7,79,70.2,78.4,70.2z M78.4,80H56.6c-0.6,0-1.1-0.5-1.1-1.1v-2.2c0-0.6,0.5-1.1,1.1-1.1h21.8c0.6,0,1.1,0.5,1.1,1.1v2.2 C79.5,79.5,79,80,78.4,80z"/>
          </svg>
        </i>
        <span class="link_name">Job Applicants</span>
      </a>
    </li>
    
    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "products.php" ? "active" : "" ?>">
      <a href="products.php">
        <i class='bx bx-grid-alt '>
          <svg height="30px" width="30" fill="#fff" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <rect x="43.93" y="68.27" width="36.07" height="7.99" rx="2" ry="2" />
            <path d="M33.82,76.26h-4a2,2,0,0,1-2-2v-4a2,2,0,0,1,2-2h4a2,2,0,0,1,2,2v4A1.9,1.9,0,0,1,33.82,76.26Z" fill-rule="evenodd" />
            <path d="M33.82,58.41h-4a2,2,0,0,1-2-2v-4a2,2,0,0,1,2-2h4a2,2,0,0,1,2,2v4A1.9,1.9,0,0,1,33.82,58.41Z" fill-rule="evenodd" />
            <rect x="43.93" y="50.42" width="36.07" height="7.99" rx="2" ry="2" />
            <rect x="49.92" y="32.57" width="30.08" height="7.99" rx="2" ry="2" />
            <path d="M47.55,26.33l-2.12-2.12a1.44,1.44,0,0,0-2.12,0L30.08,37.32l-5.37-5.24a1.44,1.44,0,0,0-2.12,0L20.47,34.2a1.44,1.44,0,0,0,0,2.12l7.36,7.36a3,3,0,0,0,4.24,0L47.55,28.46A1.69,1.69,0,0,0,47.55,26.33Z" fill-rule="evenodd" />
          </svg>
        </i>
        <span class="link_name">Products</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "customer.php" ? "active": "" ?>">
      <a href="customer.php">
        <i class='bx bx-grid-alt'>
          <svg height="20px" width="20" fill="currentcolor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 472.615 472.615" xml:space="preserve">
            <g>
              <g>
                <circle cx="236.308" cy="142.868" r="70.203" />
              </g>
            </g>
            <g>
              <g>
                <path d="M325.514,234.831l-16.542-4.923l-72.665,72.763l-72.665-72.763l-16.542,4.923c-42.831,12.898-71.582,51.495-71.582,96.197 v82.511h321.575v-82.511C397.095,286.326,368.345,247.729,325.514,234.831z" />
              </g>
            </g>
            <g>
              <g>
                <path d="M319.311,59.077c-11.9,0-23.306,3.208-33.317,8.938c24.209,16.125,40.208,43.645,40.208,74.849 c0,18.496-5.625,35.697-15.239,50.004c2.762,0.348,5.542,0.609,8.348,0.609c37.12,0,67.249-30.129,67.249-67.249 C386.56,89.205,356.431,59.077,319.311,59.077z" />
              </g>
            </g>
            <g>
              <g>
                <path d="M404.283,213.169l-16.049-4.726l-23.555,23.556c32.136,21.917,52.11,58.372,52.11,99.029V384h55.827v-78.966 C472.615,262.4,445.145,225.477,404.283,213.169z" />
              </g>
            </g>
            <g>
              <g>
                <path d="M186.621,68.015c-10.01-5.73-21.416-8.938-33.316-8.938c-37.12,0-67.249,30.128-67.249,67.151 c0,37.12,30.129,67.249,67.249,67.249c2.805,0,5.586-0.262,8.347-0.609c-9.614-14.306-15.239-31.508-15.239-50.004 C146.413,111.66,162.412,84.14,186.621,68.015z" />
              </g>
            </g>
            <g>
              <g>
                <path d="M84.382,208.443l-15.951,4.726h-0.099C27.471,225.477,0,262.4,0,305.034V384h55.827v-52.972 c0-40.666,19.984-77.128,52.104-99.036L84.382,208.443z" />
              </g>
            </g>
          </svg>
        </i>
        <span class="link_name">Customer Reviews</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "partner.php" ? "active" : "" ?>">
      <a href="partner.php">
        <i class='bx bx-grid-alt '>
          <svg height="20px" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 71.04" style="enable-background:new 0 0 122.88 71.04" xml:space="preserve">
            <style type="text/css">
              .st0 {
                fill-rule: evenodd;
                clip-rule: evenodd;
              }
            </style>
            <g>
              <path class="st0" fill="currentcolor" d="M91.95,64.68l1.99-7.59l-1.37-1.5c-0.62-0.9-0.75-1.69-0.41-2.37c0.74-1.47,2.28-1.2,3.72-1.2 c1.51,0,3.37-0.29,3.84,1.6c0.16,0.63-0.04,1.29-0.48,1.97l-1.37,1.5l1.19,4.56l7.89-6.86l4.09,0.1c-1.41-2.83-3.2-5.23-5.28-7.49 c3.92,1.52,7.93,3.02,10.9,4.88c1.89,1.18,2.86,2.08,3.63,3.51c1.62,3.05,1.8,5.78,2.04,9.08l0.57,2.86h-22.24l0.02,0.07h-8.51 c-0.19,1.95-1.31,3.08-3.5,3.24H61.68H34.24c-2.2-0.17-3.32-1.3-3.5-3.27l0.76-12.04c0.21-2.78,0.99-4.98,2.26-6.66 c0.84-1.11,1.88-1.93,3.03-2.57c3.65-2.03,12.17-2.63,15.48-5.61l5.07,14.91l2.55-8.85l-1.25-1.37c-0.56-0.82-0.69-1.54-0.37-2.16 c0.68-1.34,2.08-1.09,3.39-1.09c1.37,0,3.06-0.26,3.49,1.46c0.14,0.57-0.04,1.17-0.44,1.79l-1.25,1.37l2.55,8.85l4.59-14.91 c3.31,2.98,11.84,3.58,15.48,5.61c1.15,0.64,2.2,1.46,3.03,2.57c1.27,1.68,2.05,3.87,2.26,6.66L91.95,64.68L91.95,64.68z M15.29,48.25l3.4,9.99l1.71-5.93l-0.84-0.92c-0.38-0.55-0.46-1.03-0.25-1.45c0.45-0.9,1.39-0.73,2.27-0.73 c0.92,0,2.05-0.17,2.34,0.98c0.1,0.38-0.03,0.79-0.29,1.2l-0.84,0.92l1.71,5.93l3.08-9.99c0.45,0.4,1.07,0.74,1.8,1.03 c-0.25,0.53-0.48,1.09-0.68,1.67c-0.52,1.51-0.86,3.19-1,5.06l0.01,0c0,0.04-0.01,0.09-0.01,0.13l-0.74,11.58h-5.35H2.35 C0.87,67.61,0.12,66.85,0,65.53l0.51-7.34c0.14-1.86,0.67-3.33,1.52-4.46c0.56-0.74,1.26-1.29,2.03-1.72 C6.5,50.65,13.07,50.25,15.29,48.25L15.29,48.25z M13.62,34.09c-0.33,0.03-0.58,0.1-0.76,0.22c-0.1,0.07-0.18,0.16-0.23,0.26 c-0.06,0.12-0.08,0.28-0.08,0.45c0.02,0.55,0.31,1.29,0.88,2.14l0.01,0.02l0,0l1.9,3.02c0.76,1.2,1.55,2.43,2.53,3.33 c0.93,0.85,2.06,1.43,3.56,1.43c1.62,0,2.8-0.6,3.77-1.5c1.01-0.95,1.81-2.25,2.6-3.55l2.13-3.51c0.43-0.98,0.56-1.57,0.42-1.85 c-0.09-0.17-0.44-0.22-1.02-0.17c-0.37,0.08-0.76,0.01-1.17-0.2l1.07-3.2c-3.91-0.05-6.58-0.73-9.75-2.75 c-1.04-0.66-1.35-1.42-2.39-1.35c-0.79,0.15-1.45,0.5-1.97,1.07c-0.5,0.54-0.88,1.28-1.13,2.23l0.63,3.83 C14.3,34.21,13.96,34.23,13.62,34.09L13.62,34.09z M30.55,33.14c0.46,0.14,0.8,0.4,1,0.81c0.32,0.65,0.2,1.62-0.41,3l0,0 c-0.01,0.03-0.02,0.05-0.04,0.08l-2.16,3.56c-0.84,1.38-1.69,2.76-2.83,3.83c-1.19,1.12-2.66,1.86-4.67,1.85 c-1.88,0-3.29-0.72-4.45-1.78c-1.11-1.02-1.96-2.32-2.76-3.6l-1.9-3.02c-0.71-1.06-1.07-2.02-1.1-2.82 c-0.01-0.39,0.05-0.74,0.2-1.04c0.15-0.33,0.38-0.6,0.7-0.81c0.15-0.1,0.33-0.19,0.52-0.26c-0.12-1.62-0.16-3.62-0.08-5.3 c0.04-0.41,0.12-0.82,0.23-1.23c0.49-1.73,1.7-3.13,3.21-4.09c0.53-0.34,1.11-0.62,1.73-0.84c3.65-1.32,8.48-0.6,11.07,2.2 c1.05,1.14,1.72,2.65,1.86,4.65L30.55,33.14L30.55,33.14z M49.65,19.77c-0.42,0.05-0.75,0.16-0.99,0.32 c-0.15,0.1-0.27,0.24-0.34,0.39c-0.08,0.18-0.12,0.41-0.12,0.67c0.02,0.83,0.46,1.92,1.32,3.18l0.02,0.02h0l2.83,4.51 c1.13,1.8,2.31,3.63,3.77,4.96c1.39,1.27,3.08,2.13,5.3,2.14c2.42,0.01,4.18-0.89,5.62-2.23c1.51-1.41,2.71-3.36,3.89-5.3 l3.18-5.24c0.64-1.46,0.84-2.34,0.63-2.76c-0.13-0.27-0.69-0.33-1.63-0.24c-0.07,0.01-0.14,0.01-0.21,0c-0.39,0-0.81-0.1-1.27-0.31 l1.43-4.78c-5.84-0.07-9.83-1.09-14.55-4.11c-1.55-0.99-2.02-2.12-3.57-2.01c-1.17,0.23-2.16,0.75-2.94,1.59 c-0.75,0.81-1.32,1.91-1.69,3.32l1.01,5.78C50.74,19.98,50.18,20,49.65,19.77L49.65,19.77z M75.05,18.34 c0.69,0.2,1.19,0.6,1.5,1.21c0.48,0.98,0.3,2.42-0.61,4.48l0,0c-0.02,0.04-0.04,0.08-0.06,0.11l-3.23,5.32 c-1.25,2.06-2.52,4.13-4.23,5.72c-1.78,1.67-3.97,2.78-6.97,2.77c-2.8-0.01-4.91-1.08-6.64-2.66c-1.66-1.52-2.92-3.46-4.12-5.37 l-2.83-4.51c-1.05-1.57-1.6-3.02-1.64-4.21c-0.02-0.58,0.08-1.1,0.3-1.56c0.23-0.49,0.57-0.9,1.04-1.21 c0.23-0.16,0.49-0.29,0.78-0.39c-0.17-2.41-0.23-5.39-0.12-7.9c0.06-0.61,0.18-1.22,0.35-1.83c0.72-2.59,2.54-4.67,4.79-6.1 c0.79-0.5,1.66-0.92,2.58-1.25c5.44-1.97,12.66-0.89,16.52,3.29c1.57,1.7,2.56,3.96,2.77,6.94L75.05,18.34L75.05,18.34z M84.88,42.96l2.5-0.07l2.07-0.05c-2.42-7.45-1.61-14.3,4.22-20.12c0.99,3.2,3.2,5.83,6.97,7.78c1.8,1.34,3.55,2.96,5.23,4.81 c0.3-1.23-0.84-2.73-2.23-4.27c1.28,0.63,2.46,1.52,3.29,3.22c0.97,1.98,0.95,3.64,0.64,5.79c-0.15,1-0.39,1.93-0.74,2.78h3.45 c3.64-7.79,1.33-19.34-6.11-24.24c-2.28-1.5-3.92-1.45-6.6-1.44c-3.07,0-4.63,0.1-7.26,1.83c-3.87,2.56-6.25,6.99-7.25,13.14 C82.87,35.19,82.74,40.49,84.88,42.96L84.88,42.96z" />
            </g>
          </svg>
        </i>
        <span class="link_name">Bank Partners</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "investors.php" ? "active" : "" ?>">
      <a href="investors.php">
        <i class='bx bx-grid-alt'>
          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2ZM14 15.25H7C6.59 15.25 6.25 14.91 6.25 14.5C6.25 14.09 6.59 13.75 7 13.75H14C14.41 13.75 14.75 14.09 14.75 14.5C14.75 14.91 14.41 15.25 14 15.25ZM17 10.25H7C6.59 10.25 6.25 9.91 6.25 9.5C6.25 9.09 6.59 8.75 7 8.75H17C17.41 8.75 17.75 9.09 17.75 9.5C17.75 9.91 17.41 10.25 17 10.25Z" fill="currentcolor"/>
          </svg>
        </i>
        <span class="link_name">Investors</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "faq.php" ? "active" : "" ?>">
      <a href="faq.php">
        <i class='bx bx-grid-alt '>
          <svg height="20px" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 97.85" style="enable-background:new 0 0 122.88 97.85" xml:space="preserve">
            <g>
              <path fill="currentcolor" d="M45.44,0H15.95c-4.4,0-8.17,1.55-11.3,4.65C1.51,7.75,0,11.52,0,15.95v28c0,4.44,1.55,8.21,4.65,11.3 c3.1,3.1,6.87,4.65,11.3,4.65h13.11c-0.92,3.52-2.04,6.87-3.45,10c-1.37,3.17-3.73,6.2-6.97,9.09c6.23-1.62,11.76-4.05,16.66-7.25 c4.86-3.17,9.09-7.15,12.57-11.83h10.56c4.4,0,8.17-1.58,11.3-4.65c3.13-3.1,4.65-6.87,4.65-11.3v-28c0-4.4-1.55-8.17-4.65-11.3 C66.64,1.51,62.87,0,58.43,0H45.44L45.44,0z M98.04,56.71h-9.34l-1.34,4.16h-8.41l10.04-25.22h9.02l9.99,25.22h-8.63L98.04,56.71 L98.04,56.71z M96.3,51.25l-2.91-9.06l-2.92,9.06H96.3L96.3,51.25z M48.41,37.7c1.09,0.72,1.81,1.18,2.14,1.36 c0.5,0.27,1.18,0.58,2.02,0.94l-2.43,4.65c-1.22-0.56-2.44-1.23-3.64-2c-1.2-0.78-2.04-1.36-2.52-1.74 c-1.94,0.79-4.37,1.19-7.29,1.19c-4.32,0-7.73-1.06-10.22-3.19c-2.95-2.51-4.42-6.05-4.42-10.6c0-4.42,1.29-7.86,3.87-10.31 c2.58-2.45,6.18-3.67,10.81-3.67c4.72,0,8.35,1.19,10.92,3.59c2.57,2.39,3.85,5.82,3.85,10.27C51.5,32.14,50.47,35.31,48.41,37.7 L48.41,37.7z M41.68,33.44c0.7-1.18,1.05-2.95,1.05-5.31c0-2.71-0.54-4.64-1.6-5.8c-1.07-1.16-2.54-1.74-4.42-1.74 c-1.75,0-3.17,0.59-4.25,1.78c-1.09,1.18-1.63,3.03-1.63,5.55c0,2.93,0.53,4.99,1.59,6.17c1.06,1.18,2.52,1.78,4.37,1.78 c0.6,0,1.16-0.06,1.69-0.16c-0.74-0.68-1.9-1.31-3.5-1.91l1.38-2.98c0.78,0.13,1.39,0.3,1.82,0.49c0.44,0.19,1.28,0.71,2.55,1.54 C41.01,33.03,41.33,33.23,41.68,33.44L41.68,33.44z M122.88,32.15v28c0,2.54-0.46,4.93-1.37,7.15c-0.92,2.22-2.25,4.23-4.09,6.02 c-0.77,0.77-1.62,1.48-2.46,2.08c-0.88,0.63-1.8,1.16-2.71,1.62c-0.04,0.04-0.11,0.04-0.14,0.07c-1.2,0.56-2.43,0.95-3.7,1.23 c-1.34,0.28-2.71,0.42-4.12,0.42H90.79c0.18,0.56,0.35,1.13,0.56,1.69c0.53,1.55,1.16,3.1,1.83,4.61v0.04 c0.6,1.41,1.44,2.75,2.47,4.09c1.06,1.37,2.32,2.71,3.84,4.09c1.09,0.95,1.2,2.61,0.21,3.7c-0.67,0.77-1.69,1.06-2.61,0.81 c-3.24-0.85-6.34-1.9-9.23-3.17c-2.89-1.27-5.63-2.75-8.21-4.44c-2.54-1.66-4.93-3.56-7.15-5.63c-1.87-1.76-3.63-3.7-5.28-5.74 h-9.23c-1.73,0-3.42-0.21-5-0.63c-1.58-0.42-3.1-1.09-4.54-1.97c-1.23-0.74-1.62-2.36-0.88-3.59c0.74-1.23,2.36-1.62,3.59-0.88 c0.99,0.6,2.04,1.06,3.2,1.37c1.13,0.32,2.36,0.46,3.63,0.46h10.53c0.81,0,1.58,0.35,2.11,1.06c1.66,2.22,3.49,4.26,5.49,6.13 c1.97,1.87,4.12,3.56,6.44,5.07c2.22,1.44,4.58,2.75,7.08,3.87c-0.49-0.81-0.88-1.62-1.27-2.43c-0.7-1.62-1.37-3.28-1.97-5.04 c-0.56-1.66-1.09-3.38-1.55-5.11c-0.11-0.28-0.14-0.6-0.14-0.92c0-1.44,1.16-2.64,2.64-2.64h16.94c1.06,0,2.04-0.11,2.99-0.32 c0.92-0.21,1.76-0.49,2.57-0.85c0.04-0.04,0.07-0.04,0.11-0.07c0.67-0.32,1.34-0.7,1.94-1.13c0.63-0.46,1.23-0.95,1.8-1.55 c1.3-1.3,2.29-2.75,2.92-4.3c0.63-1.55,0.95-3.28,0.95-5.14v-28c0-1.87-0.32-3.59-0.95-5.14c-0.63-1.55-1.62-2.99-2.92-4.3 c-1.3-1.3-2.75-2.29-4.3-2.92c-1.55-0.63-3.28-0.95-5.14-0.95H86.57c-1.44,0-2.64-1.16-2.64-2.64c0-1.44,1.16-2.64,2.64-2.64h17.72 c2.54,0,4.9,0.46,7.11,1.37c2.22,0.92,4.19,2.25,6.02,4.05c1.8,1.8,3.17,3.8,4.05,6.02c0.92,2.22,1.37,4.58,1.37,7.11H122.88 L122.88,32.15z" />
            </g>
          </svg>
        </i>
        <span class="link_name">FAQs</span>
      </a>
    </li>
    
    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "team.php" ? "active" : "" ?>">
      <a href="team.php">
        <i class='bx bx-grid-alt '>
          <svg height="20px" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 71.04" style="enable-background:new 0 0 122.88 71.04" xml:space="preserve">
            <style type="text/css">
              .st0 {
                fill-rule: evenodd;
                clip-rule: evenodd;
              }
            </style>
            <g>
              <path fill="currentcolor" d="M91.95,64.68l1.99-7.59l-1.37-1.5c-0.62-0.9-0.75-1.69-0.41-2.37c0.74-1.47,2.28-1.2,3.72-1.2 c1.51,0,3.37-0.29,3.84,1.6c0.16,0.63-0.04,1.29-0.48,1.97l-1.37,1.5l1.19,4.56l7.89-6.86l4.09,0.1c-1.41-2.83-3.2-5.23-5.28-7.49 c3.92,1.52,7.93,3.02,10.9,4.88c1.89,1.18,2.86,2.08,3.63,3.51c1.62,3.05,1.8,5.78,2.04,9.08l0.57,2.86h-22.24l0.02,0.07h-8.51 c-0.19,1.95-1.31,3.08-3.5,3.24H61.68H34.24c-2.2-0.17-3.32-1.3-3.5-3.27l0.76-12.04c0.21-2.78,0.99-4.98,2.26-6.66 c0.84-1.11,1.88-1.93,3.03-2.57c3.65-2.03,12.17-2.63,15.48-5.61l5.07,14.91l2.55-8.85l-1.25-1.37c-0.56-0.82-0.69-1.54-0.37-2.16 c0.68-1.34,2.08-1.09,3.39-1.09c1.37,0,3.06-0.26,3.49,1.46c0.14,0.57-0.04,1.17-0.44,1.79l-1.25,1.37l2.55,8.85l4.59-14.91 c3.31,2.98,11.84,3.58,15.48,5.61c1.15,0.64,2.2,1.46,3.03,2.57c1.27,1.68,2.05,3.87,2.26,6.66L91.95,64.68L91.95,64.68z M15.29,48.25l3.4,9.99l1.71-5.93l-0.84-0.92c-0.38-0.55-0.46-1.03-0.25-1.45c0.45-0.9,1.39-0.73,2.27-0.73 c0.92,0,2.05-0.17,2.34,0.98c0.1,0.38-0.03,0.79-0.29,1.2l-0.84,0.92l1.71,5.93l3.08-9.99c0.45,0.4,1.07,0.74,1.8,1.03 c-0.25,0.53-0.48,1.09-0.68,1.67c-0.52,1.51-0.86,3.19-1,5.06l0.01,0c0,0.04-0.01,0.09-0.01,0.13l-0.74,11.58h-5.35H2.35 C0.87,67.61,0.12,66.85,0,65.53l0.51-7.34c0.14-1.86,0.67-3.33,1.52-4.46c0.56-0.74,1.26-1.29,2.03-1.72 C6.5,50.65,13.07,50.25,15.29,48.25L15.29,48.25z M13.62,34.09c-0.33,0.03-0.58,0.1-0.76,0.22c-0.1,0.07-0.18,0.16-0.23,0.26 c-0.06,0.12-0.08,0.28-0.08,0.45c0.02,0.55,0.31,1.29,0.88,2.14l0.01,0.02l0,0l1.9,3.02c0.76,1.2,1.55,2.43,2.53,3.33 c0.93,0.85,2.06,1.43,3.56,1.43c1.62,0,2.8-0.6,3.77-1.5c1.01-0.95,1.81-2.25,2.6-3.55l2.13-3.51c0.43-0.98,0.56-1.57,0.42-1.85 c-0.09-0.17-0.44-0.22-1.02-0.17c-0.37,0.08-0.76,0.01-1.17-0.2l1.07-3.2c-3.91-0.05-6.58-0.73-9.75-2.75 c-1.04-0.66-1.35-1.42-2.39-1.35c-0.79,0.15-1.45,0.5-1.97,1.07c-0.5,0.54-0.88,1.28-1.13,2.23l0.63,3.83 C14.3,34.21,13.96,34.23,13.62,34.09L13.62,34.09z M30.55,33.14c0.46,0.14,0.8,0.4,1,0.81c0.32,0.65,0.2,1.62-0.41,3l0,0 c-0.01,0.03-0.02,0.05-0.04,0.08l-2.16,3.56c-0.84,1.38-1.69,2.76-2.83,3.83c-1.19,1.12-2.66,1.86-4.67,1.85 c-1.88,0-3.29-0.72-4.45-1.78c-1.11-1.02-1.96-2.32-2.76-3.6l-1.9-3.02c-0.71-1.06-1.07-2.02-1.1-2.82 c-0.01-0.39,0.05-0.74,0.2-1.04c0.15-0.33,0.38-0.6,0.7-0.81c0.15-0.1,0.33-0.19,0.52-0.26c-0.12-1.62-0.16-3.62-0.08-5.3 c0.04-0.41,0.12-0.82,0.23-1.23c0.49-1.73,1.7-3.13,3.21-4.09c0.53-0.34,1.11-0.62,1.73-0.84c3.65-1.32,8.48-0.6,11.07,2.2 c1.05,1.14,1.72,2.65,1.86,4.65L30.55,33.14L30.55,33.14z M49.65,19.77c-0.42,0.05-0.75,0.16-0.99,0.32 c-0.15,0.1-0.27,0.24-0.34,0.39c-0.08,0.18-0.12,0.41-0.12,0.67c0.02,0.83,0.46,1.92,1.32,3.18l0.02,0.02h0l2.83,4.51 c1.13,1.8,2.31,3.63,3.77,4.96c1.39,1.27,3.08,2.13,5.3,2.14c2.42,0.01,4.18-0.89,5.62-2.23c1.51-1.41,2.71-3.36,3.89-5.3 l3.18-5.24c0.64-1.46,0.84-2.34,0.63-2.76c-0.13-0.27-0.69-0.33-1.63-0.24c-0.07,0.01-0.14,0.01-0.21,0c-0.39,0-0.81-0.1-1.27-0.31 l1.43-4.78c-5.84-0.07-9.83-1.09-14.55-4.11c-1.55-0.99-2.02-2.12-3.57-2.01c-1.17,0.23-2.16,0.75-2.94,1.59 c-0.75,0.81-1.32,1.91-1.69,3.32l1.01,5.78C50.74,19.98,50.18,20,49.65,19.77L49.65,19.77z M75.05,18.34 c0.69,0.2,1.19,0.6,1.5,1.21c0.48,0.98,0.3,2.42-0.61,4.48l0,0c-0.02,0.04-0.04,0.08-0.06,0.11l-3.23,5.32 c-1.25,2.06-2.52,4.13-4.23,5.72c-1.78,1.67-3.97,2.78-6.97,2.77c-2.8-0.01-4.91-1.08-6.64-2.66c-1.66-1.52-2.92-3.46-4.12-5.37 l-2.83-4.51c-1.05-1.57-1.6-3.02-1.64-4.21c-0.02-0.58,0.08-1.1,0.3-1.56c0.23-0.49,0.57-0.9,1.04-1.21 c0.23-0.16,0.49-0.29,0.78-0.39c-0.17-2.41-0.23-5.39-0.12-7.9c0.06-0.61,0.18-1.22,0.35-1.83c0.72-2.59,2.54-4.67,4.79-6.1 c0.79-0.5,1.66-0.92,2.58-1.25c5.44-1.97,12.66-0.89,16.52,3.29c1.57,1.7,2.56,3.96,2.77,6.94L75.05,18.34L75.05,18.34z M84.88,42.96l2.5-0.07l2.07-0.05c-2.42-7.45-1.61-14.3,4.22-20.12c0.99,3.2,3.2,5.83,6.97,7.78c1.8,1.34,3.55,2.96,5.23,4.81 c0.3-1.23-0.84-2.73-2.23-4.27c1.28,0.63,2.46,1.52,3.29,3.22c0.97,1.98,0.95,3.64,0.64,5.79c-0.15,1-0.39,1.93-0.74,2.78h3.45 c3.64-7.79,1.33-19.34-6.11-24.24c-2.28-1.5-3.92-1.45-6.6-1.44c-3.07,0-4.63,0.1-7.26,1.83c-3.87,2.56-6.25,6.99-7.25,13.14 C82.87,35.19,82.74,40.49,84.88,42.96L84.88,42.96z" />
            </g>
          </svg>
        </i>
        <span class="link_name">Members</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "gallary.php" ? "active" : "" ?>">
      <a href="gallary.php">
        <i class='bx bx-grid-alt'>
          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 8C18 9.10457 17.1046 10 16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8Z" fill="#1C274C"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0574 1.25H11.9426C9.63424 1.24999 7.82519 1.24998 6.41371 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63422 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.41371 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62178 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62178 21.25 12C21.25 12.4502 21.2499 12.8764 21.2487 13.2804L21.0266 13.2497C18.1828 12.8559 15.5805 14.3343 14.2554 16.5626C12.5459 12.2376 8.02844 9.28807 2.98073 10.0129L2.75497 10.0454C2.76633 8.63992 2.80368 7.52616 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z" fill="currentcolor"/>
          </svg>
        </i>
        <span class="link_name">Gallary</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "complaint.php" ? "active" : "" ?>">
      <a href="complaint.php">
        <i class='bx bx-grid-alt'>
          <svg fill="currentcolor" width="20px" height="20px" viewBox="0 0 24 24" id="chat-alert-left-3" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color"><line id="secondary-upstroke" x1="12.05" y1="13.5" x2="11.95" y2="13.5" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2; stroke: currentcolor;"></line>
          <line id="secondary" x1="12" y1="9" x2="12" y2="7" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2; stroke: currentcolor;"></line><path id="primary" d="M20,3H4A1,1,0,0,0,3,4V17a1,1,0,0,0,1,1H8v3l5-3h7a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" style="fill: none; stroke: currentcolor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
        </i>
        <span class="link_name">Complaints</span>
      </a>
    </li>

    <li class="<?= basename($_SERVER["REQUEST_URI"]) == "feedback.php" ? "active" : "" ?>">
      <a href="feedback.php">
        <i class='bx bx-grid-alt'>
          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2ZM14 15.25H7C6.59 15.25 6.25 14.91 6.25 14.5C6.25 14.09 6.59 13.75 7 13.75H14C14.41 13.75 14.75 14.09 14.75 14.5C14.75 14.91 14.41 15.25 14 15.25ZM17 10.25H7C6.59 10.25 6.25 9.91 6.25 9.5C6.25 9.09 6.59 8.75 7 8.75H17C17.41 8.75 17.75 9.09 17.75 9.5C17.75 9.91 17.41 10.25 17 10.25Z" fill="currentcolor"/>
          </svg>
        </i>
        <span class="link_name">Feedbacks</span>
      </a>
    </li>
  </ul>
</div>

<!-- Loader -->
<div class="d-none loader" id = 'loader-id'>
  <div class="ring"></div>
  <div class="ring"></div>
  <div class="ring"></div>
</div>