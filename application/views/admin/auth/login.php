<!DOCTYPE html>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-container">

<div >
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <img src="https://www.quanzhanketang.com/w3css/img_avatar4.png" alt="Avatar" style="width:40%" class="w3-circle w3-margin-top">
    </div>

    <div class="w3-container">

    <?php if($this->session->flashdata('error') != NULL) { ?>
        <div class="w3-panel w3-red w3-round">
            <p>Email atau password salah!</p>
        </div>
    <?php } ?>

      <div class="w3-section">
        <?php echo form_open('admin/auth/auth_login'); ?>
            <label><b>Email</b></label>
            <input class="w3-input w3-border w3-hover-border-black w3-margin-bottom" name="email" type="text" placeholder="Enter Email">

            <label><b>Password</b></label>
            <input class="w3-input w3-border w3-hover-border-black" name="password" type="password" placeholder="Enter Password">
            
            <button class="w3-btn w3-btn-block w3-green w3-section">Login</button>
        <?php echo form_close(); ?>
      </div>
    </div>

  </div>
</div>
            
</body>
</html> 
