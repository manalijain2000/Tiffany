<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
 
</head>

<body class="log-box d-flex justify-content-center align-items-center bg-lights" >
   <div class="container my-5 bg-white p-4 rounded border">
     <h1 class="text-center mb-5">LOGIN</h1>
      <div class="row justify-content-center">
         <div class="col-md-6 ">
         <img src="../img/dark-logo.png" alt="" class="w-fit-200">
            <div class="card border-0 text-start mt-4">
              
               <div class="card-body">
                  <form action="authentication.php" method="post">
                     <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                     </div>
                     <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                     </div>
                     <button type="submit" class="btn btn-theme">Login</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-6">
         <img src="../img/log.webp"  alt="">
         </div>
      </div>
   </div>
   <!-- <script type="text/javascript" src="../js/jquery-datatables.js"></script> -->

<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
