<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registered</title>
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body>
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Registered Sucessfully!</h5>
    <p class="card-text">Great! Your account is set up. You can sign in now.</p>
      <a href="http://localhost/ITE311-VILLANUEVA/register"> 
        <button type="button" class="btn btn-outline-danger">
        Back</button>
      </a>
      <a href="http://localhost/ITE311-VILLANUEVA/login"> 
        <button type="button" class="btn btn-success">
        Proceed</button>
      </a>
  </div>
</div>
  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>

<style>
   body{
      display: grid;
      height: 100vh;
      place-items: center;
   }
   .card{
    text-align: center;
   }
   a{
    text-decoration: none;
   }
</style>