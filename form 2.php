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

</head>
<body>
	<div id="f_bg">
	<div id="image_div"><img src="tab.png" alt="image">
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
    </form>





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
    			      <button type="submit" class="log_btn" href="form.php">Login..</button>
                    <p class="log_wornig">Password not found!</p>
    		</div>
    		
    	</form>
    
 <!-- ***********___and____LOGIN_FORM_____************** -->

</div>
	
		
	</div>
	
	
     




	<script>
		  
    
   

// Show/Hide Password
  $(document).ready(function() {
  	//jab mera documenet ready ho jae to ye function chalna chahie!


    $("#togglePassword").click(function() {
    	//$togglepassword yani icon pr jab click ho to ye function chalna chahiye!

      const input = $("#pss_word");
      //yaha pr const ka use is liye kiya giya he ki iska val() chang nahi hota
      //is input veryabl me password input ke id ko dala giya he! 

      const type = input.attr("type") === "password" ? "text" : "password";
      //ab input me attrbiyut ko dekha ja rha he ki === he password  ka ? agar he to text me badal jae or agar text he to password ho jae or isko type veriyebal banaya giya!

      input.attr("type", type);
      //ab input me ("type", type) iske sath cudisan ke sath type ko difine kiya gaya he !

      // Toggle icon class
      $(this).toggleClass("fa-eye fa-eye-slash");
      //or sath hi icon me slash add ho jae!
    });

    // Password generate via AJAX
    $("#crt_btn").click(function(e){

    	//$ crt_btn yani password ganret btn pr click ho to ek funtcion ho (e)or off ho or ajax suru ho!

      e.preventDefault();
      $.ajax({
        type: "POST",
        // mera ajax post se ho or !
        url: "formjs.php",
        // url me file ka name "formjs.php" file me code he!


        success: function(response){
        	//jo bhi code likha giya he uska riselt response me aya he !
          $("#pss_word").val(response.trim());
          //ab password input ke ander response ko laya giya he !

        },// ajax off code

        error: function(xhr, status, error) {
          alert("AJAX Error: " + error);
        }
        //  ab agar ajax code nahi chalta he to mujhe ye alert dikhe ga!
      });
    });



    // input loder coding strte  **************
   


       // show #num_input loader yani number input 
$("#num_input").on("input", function() {
	// jb mere mobil_number input me kuch bhi type ho rha ho to ye function chale!

    $(this).siblings(".loader_num_icon").addClass("visible");  
    // Loader dikhaye
});
// hide loader
$("#num_input").on("change", function () {
  var input = $(this);
  var parent = input.closest(".input-wrapper");
           parent.find(".loader_num_icon").removeClass("visible");
              })




       // show name_input loader coding

$("#name_input").on("input", function() {
	// jb name_input me oninput ho yani kuch likha ja raha  ho to kiya ho to ye function chale!  
    $(this).siblings(".loader_name_icon").addClass("visible");  // Loader dikhaye
    // 
});

$("#name_input").on("change", function () {
  var input = $(this);
  var parent = input.closest(".input-wrapper");

  
  parent.find(".loader_name_icon").removeClass("visible");
})

// isme #paasword_imput loder coding nahi kiya gaya ! 


// email loder show coding


$("#email_input").on("input", function() {
    $(this).siblings(".loader-icon").addClass("visible");  // Loader dikhaye
});
//email loder hide coding
$("#email_input").on("change", function () {
  var input = $(this);
  var parent = input.closest(".input-wrapper");

  
  parent.find(".loader-icon").removeClass("visible");
})
           


// users email chack codig______*********
 $("#email_input").on("change", function () {
  var input = $(this);
  var parent = input.closest(".input-wrapper");

  // $.ajax codeing
  

  $.ajax({
    type: "POST",
    url: "formjs2.php",
    data: {
      email: input.val()
    },
    success: function (response) {
      // Hide loader
     

      if (response.trim() === "not found") {
        // Email is available
        parent.find(".chack_icon").addClass("visible");
        parent.find(".x_icon").removeClass("visible");
        parent.find(".email_wornig").removeClass("visible");
        $(".r_btn").removeClass("disabled").prop("disabled", false); // ✅ Important addition

      } else {
        // Email exists
        parent.find(".x_icon").addClass("visible");
        parent.find(".chack_icon").removeClass("visible");
        parent.find(".email_wornig").addClass("visible");
        $(".r_btn").addClass("disabled").prop("disabled", true); // 🔒 Disable if email exists
      }
    },
    error: function () {
      parent.find(".loader-icon").removeClass("visible");
      alert("Server error, try again later.");
    }
  });
});


 $("#email_input").click(function(){
 	const parent = $(this).parent();
 	parent.find(".loader-icon").removeClass("visible");
 	parent.find(".chack_icon").removeClass("visible");
 	 parent.find(".x_icon").removeClass("visible");
 	 parent.find(".email_wornig").removeClass("visible");

 });



 $(".s_form").submit(function(e){
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
    success: function(response){
      $(".r_btn").html(response);
       // ✅ Check for failed response
      if (response.trim() === "Registration failed") {
        $(".r_btn").css("background-color", "red");
      } else {
        $(".r_btn").css("background-color", "green");
        $(".p_alert").css("display","block");
      }

      // ✅ 3 sec baad form reset karo aur button restore
      setTimeout(function(){
        $(".s_form")[0].reset(); // form clear
        $(".chack_icon").removeClass("visible");
        $(".r_btn").html("Register Now").attr("disabled", false);
        $(".r_btn").css("background-color", ""); // reset background
        
          $(".p_alert").css("display","none");
      
          // Animation ke sath form switch

        $(".s_form").fadeOut(600, function() {
        $(".l_form").fadeIn(600);
        });

      }, 3000); // 3 seconds delay
      },
    error: function(xhr, status, error){
      alert("Something went wrong: " + error);
      $(".r_btn").html("Register Now").attr("disabled", false);
    }
  });
});


 
 });
// users email chack codig___and___isme *********


  // ***************Login loder strt coding   ***************



$(document).ready(function() {
  $(".log_email_input").click(function(){
    $(".email_wornig").css("display", "none");
  });

  $(".log_password_input").click(function(){
    $(".password_wornig").css("display", "none");
  });

  $(".log_email_input").on("input", function() {
    $(this).siblings(".login_loader-icon").addClass("visible");  // Loader dikhaye
});
//email loder hide coding
$(".log_email_input").on("change", function () {
  var input = $(this);
  var parent = input.closest(".input-wrapper");

  
  parent.find(".login_loader-icon").removeClass("visible");
});

//    loedr icon and codein
$("#login_togglePassword").click(function() {
      //$togglepassword yani icon pr jab click ho to ye function chalna chahiye!

      const input = $("#log_pass_input");
      //yaha pr const ka use is liye kiya giya he ki iska val() chang nahi hota
      //is input veryabl me password input ke id ko dala giya he! 

      const type = input.attr("type") === "password" ? "text" : "password";
      //ab input me attrbiyut ko dekha ja rha he ki === he password  ka ? agar he to text me badal jae or agar text he to password ho jae or isko type veriyebal banaya giya!

      input.attr("type", type);
      //ab input me ("type", type) iske sath cudisan ke sath type ko difine kiya gaya he !

      // Toggle icon class
      $(this).toggleClass("fa-eye fa-eye-slash");
      //or sath hi icon me slash add ho jae!
    });
// passworde icon codeng satrt 
$(".l_form").submit(function(e){
  e.preventDefault();
  $.ajax({
    type:"POST",
    url:"form_login.php",
    data: {
      email: $(".log_email_input").val(),
      password: $(".log_password_input").val() 
    },
    beforeSend: function(){
      $(".log_btn").attr("disabled","disabled");
      $(".log_btn").html("Please wait..");
      $(".log_btn").css("background", "green");
    },
    success: function(response){
      $(".log_btn").removeAttr("disabled");
      $(".log_btn").html("Login..");
      $(".log_btn").css("background", "#14b129");
      if(response.trim() == "success")
      {
        window.location = "profile.php";
      }
      else if(response.trim() == "wrong_password")
      {
          $(".log_wornig").css("display","block");
      }
      else if(response.trim() == "user_not_found")
      {
        $(".log_wornig").css("display","block");
        $(".log_wornig").html("User Not Found !");

        setTimeout(function(){
        window.location = "form.php";

      }, 3000);


      }

      
    },
  })
});


 });  
    //jab mera documenet ready ho jae to ye function chalna chahie!

   
    
        



</script>



</body>
</html>