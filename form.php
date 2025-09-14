<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="form.css">
	<!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
                        <!-- Font Awesome CDN  and -->
                       <!-- ajax.googleapis cdn -->
                       <!-- ajax.googleapis cdn and -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
                                   <!-- animate CDN  and -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


</head>
<body>
	<div id="f_bg">
	<div id="image_div">
    <img src="tab.png" alt="image">

    <div class="fom_box animate__animated animate__flipInY animate__slow">

		 <form autocomplete="off" class="s_form">
      <div id="sing_hading"><h2 id="had2">Sign.Up</h2></div>

      <div class="input-wrapper">
        <i class="fa fa-user input-icon"></i>
        
        <input type="text" name="name" placeholder="Full Name" id="name_input" required="required">
        <i class="fa fa-circle-notch fa-spin loader_name_icon"></i>
      </div>  

      <div class="input-wrapper">
        <i class="fa fa-mobile-alt input-icon"></i>  
        
        <input type="text" name="mobile" placeholder="Mobile No." id="num_input" required="required">
        <i class="fa fa-circle-notch fa-spin loader_num_icon"></i>
      </div>

      <div class="input-wrapper">
         <i class="fa fa-envelope input-icon"></i>
  
              <input type="email" name="email" placeholder="Your @gmail.com" id="email_input" required="required">
  
            <!-- Keep only ONE loader icon inside email-wrapper -->
             <i class="fa fa-circle-notch fa-spin loader-icon"></i>

           <!-- Icons for result -->
             <i class="fa fa-check chack_icon"></i>
              <i class="fa fa-exclamation-triangle x_icon"></i>

                <!-- Warning -->
               <p class="email_wornig">Email already exists</p>
          </div>


      <div class="input-wrapper">
        <i class="fa fa-lock input-icon"></i>
        
        <input type="password" name="password" placeholder="Password" id="pss_word" required="required">
        
        <button type="button" class="p_icon"><i class="fa fa-eye" id="togglePassword"></i></button>
         

        	
      </div>

      
      <div class="btn">
  <div id="crt_btn">auto.pass</div>
</div>


      <button type="submit" disabled="disabled" class="r_btn">Ragister. Now </button>
      <div id="alert"><p class="p_alert">ragister sacssacfuly</p></div>
      <div class="arrow_box">
      <div class="r_div"><i class="fa-solid fa-arrow-right"></i></div>
         </div>
    </form>
      </div>  




    <!-- ***********_______LOGIN_FORM_____************** -->
    
    	<form autocomplete="off" class="l_form">
    		<div id="l_hading">
    			<h2 id="log_h2" class="h1 fs-1 fs-md-2 fs-lg-3 text-center">Login Now!</h2>
    		</div>
    		<div class="input-wrapper">
    			<i class="fa fa-envelope input-icon"></i>
  
         
    			<input type="email" name="email" placeholder="cumferm email" class="log_email_input" id="log_email_input" required="required" autocomplete="username"
>

    			             <i class="fa fa-circle-notch fa-spin login_loader-icon"></i>
    			             <i class="fa fa-check chack_icon"></i>
                             <i class="fa fa-exclamation-triangle x_icon"></i>

                <!-- Warning -->
                              <p class="email_wornig">User not found!</p>

    		</div>

    		<div class="input-wrapper">
    			        <i class="fa fa-lock input-icon"></i>

    			<input type="password" name="password" placeholder="cumferm password" class="log_password_input" id="log_pass_input" required="required" autocomplete="current-password">
                  <button type="button" class="p_icon"><i class="fa fa-eye" id="login_togglePassword"></i></button>

    			<p class="email_wornig">Password not found!</p>

    			       
    		</div>
    		<div class="log_btn_d">
    			      <button type="submit" class="log_btn">Login..</button>
                
                    <p class="log_wornig">Password not found!</p>
    		</div>
        <div class="arrow_box">
      <div class="l_div"><i class="fa-solid fa-arrow-left"></i></div>
         </div>
    		
    	</form>
    
 <!-- ***********___and____LOGIN_FORM_____************** -->
 <!-- ***********___and____LOGIN_FORM_____************** -->



 <!-- ***********___start____pin code_FORM_____************** -->
 

      <!-- ***********___and____pin code_FORM_____************** -->
</div>
	
		
	</div>
	
	
     



<script>
$(document).ready(function () {

  // ✅ Show signup form by default
  $(".s_form").addClass("visible");

$(".r_div").click(function(){
  $(".s_form").removeClass("visible");
  $(".l_form").addClass("visible");
});


$(".l_div").click(function(){
  $(".l_form").removeClass("visible");
  $(".s_form").addClass("visible");
});
   
  // 👁️ Toggle password visibility in Signup
  $("#togglePassword").click(function () {
    const input = $("#pss_word");
    const type = input.attr("type") === "password" ? "text" : "password";
    input.attr("type", type);
    $(this).toggleClass("fa-eye fa-eye-slash");
  });

  // 🔐 Generate random password via AJAX
  $("#crt_btn").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "formjs.php",
      success: function (response) {
        $("#pss_word").val(response.trim());
      },
      error: function (xhr, status, error) {
        alert("AJAX Error: " + error);
      }
    });
  });

  // 📲 Show loader while typing phone number
  $("#num_input").on("input", function () {
    $(this).siblings(".loader_num_icon").addClass("visible");
  }).on("change", function () {
    $(this).closest(".input-wrapper").find(".loader_num_icon").removeClass("visible");
  });

  // 🧑 Show loader while typing name
  $("#name_input").on("input", function () {
    $(this).siblings(".loader_name_icon").addClass("visible");
  }).on("change", function () {
    $(this).closest(".input-wrapper").find(".loader_name_icon").removeClass("visible");
  });

  // 📧 Show loader while typing email
  $("#email_input").on("input", function () {
    $(this).siblings(".loader-icon").addClass("visible");
  }).on("change", function () {
    const input = $(this);
    const parent = input.closest(".input-wrapper");

    // 📤 AJAX: Check if email exists
    $.ajax({
      type: "POST",
      url: "formjs2.php",
      data: { email: input.val() },
      cache:false,
      success: function (response) {
        parent.find(".loader-icon").removeClass("visible");
        if (response.trim() === "not found") {
          parent.find(".chack_icon").addClass("visible");
          parent.find(".x_icon, .email_wornig").removeClass("visible");
          $(".r_btn").prop("disabled", false);
        } else {
          parent.find(".x_icon").addClass("visible");
          parent.find(".chack_icon").removeClass("visible");
          parent.find(".email_wornig").addClass("visible");
          $(".r_btn").prop("disabled", true);
        }
      },
      error: function () {
        parent.find(".loader-icon").removeClass("visible");
        alert("Server error, try again later.");
      }
    });
  });

  // 📧 Clear all email icons on focus
  $("#email_input").click(function () {
    const parent = $(this).parent();
    parent.find(".loader-icon, .chack_icon, .x_icon, .email_wornig").removeClass("visible");
  });

  // ✅ Submit Registration Form
  $(".s_form").submit(function (e) {
    e.preventDefault();
    $(".r_btn").attr("disabled", true).text("Please wait...");

    $.ajax({
      type: "POST",
      url: "form3.php",
      data: {
        username: $("#name_input").val(),
        mobile: $("#num_input").val(),
        email: $("#email_input").val(),
        password: $("#pss_word").val()
      },
      cache:false,
      success: function (response) {
        $(".r_btn").html(response);
        if (response.trim() === "Registration failed") {
          $(".r_btn").css("background-color", "red");
        } else {
          $(".r_btn").css("background-color", "green");
          $(".p_alert").css("display", "block");

          // Reset form & switch to login form
          setTimeout(function () {
            $(".s_form")[0].reset();
            $(".chack_icon").removeClass("visible");
            $(".r_btn").html("Register Now").attr("disabled", false).css("background-color", "");
            $(".p_alert").hide();
            $(".s_form").removeClass("visible");
            $(".l_form").addClass("visible");
          }, 3000);
        }
      },
      error: function (xhr, status, error) {
        alert("Something went wrong: " + error);
        $(".r_btn").html("Register Now").attr("disabled", false);
      }
    });
  });

  // 🔐 Login Email & Password Error Hide
  $(".log_email_input").click(function () {
    $(".email_wornig").hide();
  });

  $(".log_password_input").click(function () {
    $(".password_wornig").hide();
  });

  // 📧 Show login loader on input
  $(".log_email_input").on("input", function () {
    $(this).siblings(".login_loader-icon").addClass("visible");
  }).on("change", function () {
    $(this).closest(".input-wrapper").find(".login_loader-icon").removeClass("visible");
  });

  // 👁️ Toggle password visibility in Login
  $("#login_togglePassword").click(function () {
    const input = $("#log_pass_input");
    const type = input.attr("type") === "password" ? "text" : "password";
    input.attr("type", type);
    $(this).toggleClass("fa-eye fa-eye-slash");
  });

  // ✅ Submit Login Form
  $(".l_form").submit(function (e) {
    e.preventDefault();
    $(".log_btn").attr("disabled", true).html("Please wait..").css("background", "green");

    $.ajax({
      type: "POST",
      url: "form_login.php",
      data: {
        email: $(".log_email_input").val(),
        password: $(".log_password_input").val()
      },
      cache:false,
      success: function (response) {
        const res = response.trim();
        $(".log_btn").removeAttr("disabled").html("Login").css("background", "#14b129");
        $(".login_loader-icon").removeClass("visible");

        if (res === "success") {
          $(".log_btn").html("Redirecting...");
          window.location = "profile.php";
        } else if (res === "wrong_password") {
          $(".log_wornig").show().text("Wrong Password!");
        } else if (res === "user_not_found") {
          $(".log_wornig").show().text("User Not Found!");
          setTimeout(function () {
            window.location = "form.php";
          }, 3000);
        } else {
          alert("Unexpected response: " + res);
        }
      },
      error: function (xhr, status, error) {
        $(".log_btn").html("Login").removeAttr("disabled");
        alert("Login error: " + error);
      }
    });
  });

});

</script>



</body>
</html>