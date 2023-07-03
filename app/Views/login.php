<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GM Medical - Login</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/logo/favicon.ico">

  <!-- page css -->

  <!-- Core css -->
  <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
  <div class="auth-full-height">
    <div class="row m-0">
      <div class="col p-0 auth-full-height" style="background-image: url('assets/images/others/bg-1.jpg');">
        <div class="d-flex justify-content-between flex-column h-100 px-5 py-3">
          <div></div>
          <div class="w-100 ">
            <h1 class="display-4 text-white mb-4">Start with us</h1>
            <p class="text-white lead" style="max-width: 630px;">Let's go down to sleep.</p>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-white">© 2023</span>
          </div>
        </div>
      </div>
      <div class="col-12 p-0 auth-full-height bg-white" style="max-width: 450px;">
        <div class="d-flex h-100 align-items-center p-5">
          <div class="w-100">
            <div class="d-flex justify-content-center mt-3">
              <div class="text-center logo">
                <img alt="logo" class="img-fluid" src="assets/images/logo/logo-fold.png" style="height: 50px;">
                <span style="font-size: 30px;"><b>WH-MGM</b></span>
              </div>
            </div>
            <div class="mt-4">
              <form method="POST" action="<?= site_url("login") ?>">
                <div class="form-group mb-3">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" />
                </div>
                <div class="mb-3">
                  <div class="form-group input-affix flex-column">
                    <label class="form-label">Password</label>
                    <input name="password" formcontrolname="password" class="form-control" type="password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log In</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core Vendors JS -->
  <script src="assets/js/vendors.min.js"></script>

  <!-- page js -->

  <!-- Core JS -->
  <script src="assets/js/app.min.js"></script>

</body>

</html>