<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Mirota KSM | Admin System Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
  body {
      background: rgb(8,67,106);
      background: linear-gradient(234deg, rgba(8,67,106,1) 8%, rgba(77,152,200,1) 29%, rgba(60,142,194,1) 50%, rgba(17,85,131,1) 69%);
  }

  small {
    font-size: 20px;
  }

  .header-login{
    font-weight:bold;
    background: rgb(8,67,106);
    background: linear-gradient(234deg, rgba(8,67,106,1) 8%, rgba(77,152,200,1) 29%, rgba(60,142,194,1) 50%, rgba(17,85,131,1) 69%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .login-box-body {
    box-shadow: 0px 5px 20px 0px rgba(17,85,131,1);
    border-radius: 10px;
  }

  .btn-login{
    float:right;
    border-radius:10px;
    background: rgba(77,152,200,1);
    box-shadow: 2px 2px 4px 0px rgba(17,85,131,1);
    color: #fff;
  }

  .btn-login:hover{
    background:  #fff;
    color: rgb(8,67,106);
    box-shadow: 0px 0px 10px 0px rgba(17,85,131,1);
  }

  @media only screen and (max-width: 900px) {
    .login-box {
      padding-top: 50%;
    }
  }
</style>

<body>
  <div class="login-box">
    <div class="login-box-body">
      <div class="login-logo">
        <h1 class="header-login">PT Mirota KSM</h1>
      </div><!-- /.login-logo -->
      <p class="login-box-msg">Masukkan Username dan Pasword</p>
      <?php $this->load->helper('form'); ?>
      <div class="row">
        <div class="col-md-12">
          <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
        </div>
      </div>
      <?php
      $this->load->helper('form');
      $error = $this->session->flashdata('error');
      if ($error) {
      ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $error; ?>
        </div>
      <?php }
      $success = $this->session->flashdata('success');
      if ($success) {
      ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $success; ?>
        </div>
      <?php } ?>

      <form action="<?php echo base_url(); ?>loginMe" method="post">
        <div class="form-group has-feedback">
          <input type="username" class="form-control" placeholder="username" name="username" />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <input type="submit" class="btn btn-login" value="Sign In" />
          </div><!-- /.col -->
        </div>
      </form>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>