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

<body class="sidebar-dark">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <!-- <div class="content-wrapper d-flex align-items-center auth"> -->
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5" style="margin-top: 100px;">
              <!-- <div class="brand-logo">
                <img src="<?=base_url();?>assets/images/logo.svg" alt="logo">
              </div> -->
              <h4>Sign up to continue.</h4>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email">
                </div>
                <div class="form-group" >
                  <select class="form-control form-control-lg" id="role" name="role">
                    <option value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Receptionist">Receptionist</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="cnfrm_password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="ConfirmPassword">
                </div>
                <small id="pswd_error"></small>
                <div class="mt-3">
                  <input type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Register" onclick="return checkvalidation();">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="<?=base_url('users');?>" class="text-primary">Login</a>
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
    $("select").change(function() {
    this.style.color = 'black';
 })
  </script>
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
     var nameValid, passwordValid, emailValid, roleValid = false;

    var name = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password1 = document.getElementById("cnfrm_password").value;
    var role = document.getElementById("role").value;
   // var sub_plan = document.getElementById("radio_plan").checked;
    //var sub_pay = document.getElementById("radio_pay").checked; 
    //var terms = document.getElementById("terms").checked;

    if(name!= ""){
        var nameRegex = /^[a-zA-Z0-9_ ]*$/;
        var nameRes = nameRegex.test(name);
        if(nameRes){
            nameValid = true;
            document.getElementById("username").style.border='';
        }
        else{
            document.getElementById("username").style.border='1px solid red';
            nameValid = false;
        }
            
    }
    else{
        document.getElementById("username").style.border='1px solid red';
    }

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

    if(password!="" && password1!="" && password.length > 5 && password1.length > 5){
        if(password == password1){
            
              document.getElementById("password").style.border='';
              document.getElementById("cnfrm_password").style.border='';
              passwordValid = true;
            }
        else{
            document.getElementById("password").style.border='1px solid red';
            document.getElementById("cnfrm_password").style.border='1px solid red';
            document.getElementById("pswd_error").innerHTML = "*password must contain atleast 5 characters";
            document.getElementById("pswd_error").style.color='red';
            passwordValid=false;
        }
                            
    }
    else{
        document.getElementById("password").style.border='1px solid red';
        document.getElementById("cnfrm_password").style.border='1px solid red';
        document.getElementById("pswd_error").innerHTML = "*password must contain atleast 5 characters";
        document.getElementById("pswd_error").style.color='red';
    }
    if(role!= ""){
        roleValid = true;
        document.getElementById("role").style.border='';
    }
    else{
        document.getElementById("role").style.border='1px solid red';
    }

    if(nameValid  && emailValid && passwordValid && roleValid){
      return true;
    }
    else{
      return false;
    }
   }
  </script>
</body>

</html>
