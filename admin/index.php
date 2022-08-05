<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style type="text/css">
    .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-1 h3{
        text-align: center;
        color: #333;
    }
    .login-container form{
    padding: 10%;
  }
  .btnSubmit
  {
      width: 50%;
      border-radius: 1rem;
      padding: 1.5%;
      border: none;
      cursor: pointer;
  }
  .login-form-1 .btnSubmit{
      font-weight: 600;
      color: #fff;
      background-color: #0062cc;
  }
  .login-form-1 .ForgetPwd{
      color: #0062cc;
      font-weight: 600;
      text-decoration: none;
  }
  </style>
  <title>Kepegawaian</title>
</head>
<body>
  <div class="container login-container">
    <div class="row">
      <div class="col-md-6 login-form-1">
          <h3>Login Admin</h3>
          <form action="login.php" method="post">
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Username Admin *" value="" name="username" />
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password *" value="" name="psw" />
              </div>
              <div class="form-group">
                  <input type="submit" class="btnSubmit" value="Login" name="tblLogin" />
              </div>
              <div class="form-group">
                  <a href="../index.php" class="ForgetPwd">Klik Disini untuk Login Karyawan</a>
              </div>
         </form>
      </div>
    </div>
  </div>
</body>
</html>