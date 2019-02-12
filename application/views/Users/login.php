<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BogyUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.png" />
  <style>
      body
     {
      margin-top: 100px;
      height: 100%;
      width: 100%;
      margin: auto;
      padding: 0;
      background: url('http://localhost/hospital_erp/assets/images/healthcare.jpg') no-repeat; 
      background-size: cover;
     }
  </style>
</head>

<body class="sidebar-dark" >
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <!-- <div class="content-wrapper d-flex align-items-center auth"> -->
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5" style="margin-top: 100px;">
              <!-- <div class="brand-logo">
                <img src="<?=base_url();?>assets/images/logo.svg" alt="logo">
              </div> -->
              <h4>Sign in to continue.</h4>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password">
                </div>
                <small id="pswd_error"></small>
                <div class="mt-3">
                  <input type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="return checkvalidation();" value="Sign In">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="<?=base_url('users/register');?>" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=base_url();?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?=base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?=base_url();?>assets/js/template.js"></script>
  <script src="<?=base_url();?>assets/js/settings.js"></script>
  <script src="<?=base_url();?>assets/js/todolist.js"></script>
  <!-- endinject -->
  <script>
    window.onload = function(){
  <?PHP if($this->session->flashdata('success')){?>
    showToastInCustomPosition('Success', 'success', "<?= $this->session->flashdata('success')?>");
  <?PHP } ?>
  <?PHP if($this->session->flashdata('failed')){?>
    showToastInCustomPosition('Failed', 'error', "<?= $this->session->flashdata('failed')?>");
  <?PHP } ?>
  }
  showToastInCustomPosition = function(h, color, t) {
    $.toast({
      heading: h,
      text: t,
      icon: color,
      position: {
        left: 643,
        top: 20
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  </script>
  <script>
    function checkvalidation()
    {
      var emailValid,passwordValid=false;
      var email=document.getElementById('email').value;
      var password=document.getElementById('password').value;

      if(email!=""){
        var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var emailRes = emailRegex.test(email);
        if(emailRes){
            document.getElementById("email").style.border='';
            emailValid = true;
        }
        else{
            document.getElementById("email").style.border='1px solid red';
            emailValid=false;
        }
              
      }
      else{
          document.getElementById("email").style.border='1px solid red';
      }
      if(password!="" && password.length > 5 )
      {
        passwordValid = true;
        document.getElementById("password").style.border='';
      }
      else{
          document.getElementById("password").style.border='1px solid red';
          document.getElementById("pswd_error").innerHTML = "*password must contain atleast 5 characters";
          document.getElementById("pswd_error").style.color='red';
      }

      if(emailValid && passwordValid ){
      return true;
      }
      else{
        return false;
      }
    }
  </script>
</body>

</html>
