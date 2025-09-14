<?php
session_start();

// Only allow if user is logged in
if (empty($_SESSION['users'])) {
    header("Location: form.php");
    exit;
}

require("db.php");

$user_email = $_SESSION['users'];

// Fetch user
$user_sql = "SELECT * FROM backend WHERE email ='$user_email'";
$user_res = $db->query($user_sql);

if ($user_res && $user_res->num_rows > 0) {
    $user_data = $user_res->fetch_assoc();
    $ful_name = $user_data['ful_name'];
    $user_id = $user_data['id'];
    $tf = "user_" . $user_id;

    $use_storage   = round($user_data['used_storage'], 2);
    $totel_storage = $user_data['storage'];
    $per_stor      = round(($use_storage * 100) / $totel_storage, 2);
} else {
    echo "User not found or query failed.";
    exit;
}

// -------------------------------
// Utility Function for File Card
// -------------------------------
function render_file_card($basename, $icon, $tf) {
    // Browser URL
    $base_url = "http://localhost:8080/project.php/user_data/$tf/";
    $file_url = $base_url . urlencode($basename);

    // Delete URL
    $delete_url = "http://localhost:8080/project.php/delete.php?file=" . urlencode($basename) . "&folder=" . urlencode($tf);

    return "
    <div class='col-md-4 mb-3'>
      <div class='card shadow-sm'>
        <div class='card-body text-center thumb-box'>
          <img src='" . htmlspecialchars($icon) . "' 
               style='max-width:100%; height:150px; object-fit:contain;' 
               onerror=\"this.src='http://localhost:8080/setlogo/file.png'\">
          <p class='mt-2'><strong>" . htmlspecialchars($basename) . "</strong></p>
        </div>
        <hr class='line_icon m-0'>
        <div class='u_icon text-center p-2'>
          <!-- View -->
          <a href='" . htmlspecialchars($file_url) . "' target='_blank' title='View'>
            <i class='fa-solid fa-eye mx-2'></i>
          </a>

          <!-- Delete -->
          <a href='" . htmlspecialchars($delete_url) . "' 
             onclick=\"return confirm('Are you sure you want to delete this file?')\" title='Delete'>
            <i class='fa-solid fa-trash mx-2 text-danger'></i>
          </a>

          <!-- Download -->
          <a href='" . htmlspecialchars($file_url) . "' download title='Download'>
            <i class='fa-solid fa-download mx-2 text-success'></i>
          </a>
        </div>
      </div>
    </div>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="profile.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


</head>
<body>

<!-- loding ui LODER -->
  <!-- Preloader -->
  <div id="preloader" class="d-none">
  <div class="loadingspinner d-none">
    <div id="square1"></div>
    <div id="square2"></div>
    <div id="square3"></div>
    <div id="square4"></div>
    <div id="square5"></div>
  </div>
  <p class="loading-text">Loading...</p>
</div>
<!-- loding ui  and -->





  
  

    <!-- main big box -->

<div class="container-fluid">

        <!-- left  box 1 -->

    





    <!-- left box 2 -->

  
  <!-- laft_box {{{{{{{ man }}}}}}}}}}} -->
   <div class="left_box">

      <!-- laft_box card -->
      <div class="profile_desing3 position-absolute d-none">
    
    <!-- Close Button -->
    <button type="button" class="btn-close position-absolute top-0 end-0 m-2 text-white" aria-label="Close"></button>

    
    

    <!-- Skills Section -->
    <div class="bg-transparent skile_2">
      <!-- Skills yaha add karna -->
    </div>

    <!-- Profile Data Section -->
    <div class="profile_data">
      <!-- Files / Info yaha add karna -->
    </div>
    
  </div>

    
<!-- exra card -->

    <!-- Toggle Switch -->
<div class="form-check form-switch my-3 mt-2 redio_btn">
  <input class="form-check-input" type="checkbox" id="darkModeToggle">
  <label class="text-primary">Mahtab Coder</label>
</div>
<!-- Headline Dropdown -->
       <div class="d-flex align-items-center drop_maneu">
  <select class="form-select form-select-sm w-auto ms-auto" id="Headline" name="Headline">
    <option value="">Menu</option>
    <option value="JM">Dashboard</option>
    <option value="AU">About Us</option>
    <option value="HW">How It Works</option>
    <option value="PP">Pricing / Plans</option>
    <option value="FS">Features</option>
    
    <option value="BR">Blog / Resources</option>
    <option value="JH">Categories</option>
    <option value="BBK"> FAQ->Trash </option>
    <option value="CS">Contact / Support</option>
    <option value="LS">Login / Sign Up</option>
    <option value="EC">Setting / Profile</option>
  </select>
</div>


<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->





  <div class="profile_desing2 position-relative animate__animated d-none">

        <div class="rating animate__animated animate__heartBeat" style="--animate-duration: 3s;" id="profile_cver">



   <!-- left ⭐⭐⭐⭐⭐ box 1 -->

  <i class="bi bi-star-fill reting_1"></i>
  <i class="bi bi-star eting_2"></i>
  <i class="bi bi-star eting_3"></i>
  <i class="bi bi-star eting_4"></i>
  <i class="bi bi-star eting_5"></i>
</div>

    <!-- Close Button -->
    <button type="button" class="btn-close position-absolute top-0 end-0 m-2 text-white" aria-label="Close"></button>

    <div class="progress profil_baar mt-2 mb-1" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar mini_baar" style="width: 25%">25%</div>
</div>

    
    <!-- Profile Icon -->
    <div class="profile_man d-flex justify-content-center align-items-center">
      <i class="fas fa-camera text-white" id="user"></i>
    </div>
    



    <!-- Profile Name -->
    <span class="text-primary mt-2 fs-3">
      My Profile.
      <br><br>
      <h5 class="text-white">name </h5><h6 class="text-success"><?= htmlspecialchars($ful_name) ?></h6>
    </span>
    <hr class="line">






    <!-- Skills Section -->
    <div class="profil_add animate__animated animate__fadeInRight d-none">
  <!-- Tumhara form content -->
  <div class="profil_add_row">
    <i class="bi bi-house-add"></i>
    <input type="text" name="address" class="p_input" placeholder="Full address">
  </div>

  <div class="profil_add_row">
    <i class="bi bi-phone"></i>
    <input type="text" name="number" class="p_mo_input" placeholder="Phone number">
  </div>

  <div class="profil_add_row">
    <i class="bi bi-calendar"></i>
    <input type="date" name="dob" class="p_input">
  </div>

  <div class="profil_add_row">
    <i class="bi bi-gender-ambiguous"></i>
    <select name="gender" class="form-select custom-select bg-transparent text-white">
      <option value="">Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
  </div>
<div class="text-center mt-1">
    <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#okModal" id="checkBtn">
      OK
    </button>
  </div>
  
</div>
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% d-none %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->





<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% d-none %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->


<div class="profile_card d-none">
  <!-- Occupation -->
  <div class="profil_add_row">
    <i class="bi bi-briefcase"></i>
    <input type="text" name="occupation" class="p_input" placeholder="Occupation / Job Title">
  </div>

  <!-- Company / Organization -->
  <div class="profil_add_row">
    <i class="bi bi-building"></i>
    <input type="text" name="company" class="p_input" placeholder="Company / Organization Name">
  </div>

  <!-- Website / Portfolio -->
  <div class="profil_add_row">
    <i class="bi bi-globe"></i>
    <input type="url" name="website" class="p_input" placeholder="Website / Portfolio Link">
  </div>

  <!-- Social Links -->
  <div class="profil_add_row">
    <i class="bi bi-link-45deg"></i>
    <input type="url" name="social" class="p_input" placeholder="LinkedIn / GitHub / Social Media Link">
  </div>

  <div class="text-center mt-1">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#okModal" id="checkBtn2">
      OK
    </button>
  </div>

</div>

   <div class="profile_idno">
    <div class="3input">
      <h3>welcom smart <h6 class="text-success text-white"><?= htmlspecialchars($ful_name) ?></h6></h3>
      <form>
        <h4></h4>
        <input type="text" class="pr_code" name="code" placeholder="    inter pr code">
        <button type="submit" class="pr_submit_btn">submit</button>

      </form>
      <hr class="line">

      
      <button class="skip">skip <i class="fas fa-forward"></i></button>
    </div>

     
   </div>

  </div>
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%      profile seting  and     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting      %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting     %%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting     %%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  profile seting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->



<hr class="line">


<!-- dainamic name and uplod btn -->
    <div class="a1 d-flex">
      
      <span class="text-white mt-2 fs-3">Mr. <?= htmlspecialchars($ful_name) ?></span>
      <hr class="line">
      <button type="button" class="btn btn-outline-primary rounded-pill uplod_btn">
        <i class="fa fa-upload"></i> Upload File
      </button>
    </div>

    <hr class="line">
<!-- dainamic progresbaar -->
    <div class="progress" id="auto_baar">
      <div class="progress-bar bg-primary upload_p" style="width:0"></div>
    </div>
    <div class="upload_msg"><h5><i class="fa fa-check-circle"></i></h5></div>
<!-- log aut btn-->
    <div class="log_out">
      <a href="logout.php" class="btn btn-danger">
        <i class="fa-solid fa-right-from-bracket out_btn"></i> Logout
      </a>
    </div>

    <span class="mt-2 fs-3 text-primary" id="str_hading">Your Storage!</span>
    <div class="progress" id="pr_baar">
      <div class="progress-bar bg-primary p_b" style="width: <?= $per_stor ?>%;"></div>
    </div>
    <span class="text-success" id="mb_hading">
      <span class="u_s"><?= $use_storage ?></span>MB / <?= $totel_storage ?>MB
    </span>
       <hr class="line">
       <!-- users plan  -->






       <div class="profile_card2">
        <div class="poster">
          <img src="/setlogo/mahtabcoder.png" alt="code" class="coder_img">
          <button class="btn btn-outline-primary">

  Storage
</button>


        </div>
     
</div>
    
  </div> 
  <!-- laft_box and --> 

  <!-- Right box   ****************** d-none ****************-->

  <!-- Right box -->
  <div class="right_box">

    <nav class="navbar bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid">
      <img src="/setlogo/mahtabcoder.png" alt="code" class="coder_img">
      <a href="#" class="f1"><i class="fab fa-twitter"></i></a>
      <a href="#" class="f2"><i class="fab fa-youtube"></i></a>
      <a href="#" class="f3"><i class="fab fa-facebook-square"></i></a>
      <a href="#" class="f4"><i class="fab fa-whatsapp-square"></i></a>
      <a href="#" class="f5"><i class="fab fa-instagram-square"></i></a>
      
      <!-- Search Box -->
      <form class="d-flex ms-auto" role="search">
  <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-primary ms-2" type="submit">Search</button>
</form>


    </div>
  </nav>

     <div class="rightitem d-none">  
    <div class="content p-2 bg-primary">

      <div class="row">
        <?php
        $file_data_sql = "SELECT * FROM $tf";
        $file_res = $db->query($file_data_sql);
        $base_path = "http://localhost:8080/setlogo/";

        if ($file_res && $file_res->num_rows > 0) {
            while ($file_array = $file_res->fetch_assoc()) {
                $basename = $file_array['file_name'];
                $fd_array = pathinfo($basename);
                  $f_ext = strtolower($fd_array['extension'] ?? '');

                // Default icon
                $icon = $base_path . "file.png";

                // Detect extension and change icon
                if (in_array($f_ext, ["mp4", "mov", "wmv"])) {
                    $icon = $base_path . "video.png";
                } elseif (in_array($f_ext, ["mp3", "wav", "m4a"])) {
                    $icon = $base_path . "mp3.png";
                } elseif ($f_ext == "pdf") {
                    $icon = $base_path . "pdf.png";
                } elseif (in_array($f_ext, ["jpg", "jpeg", "png", "webp"])) {
                    // Use actual image as thumbnail
                 $icon = "http://localhost:8080/project/user_data/$tf/" . urlencode($basename);
                }

                echo render_file_card($basename, $icon, $tf);
            }
        } else {
            echo "<p class='text-white'>No files found.</p>";
        }
        ?>
      </div>
    </div>
<!-- %%%%%%%%%%%%%%%%%%%%%%%  file_2  %%%%%%%%%%%%%%%%%%%%% -->

    <div class="content p-2 file2">
      <div class="row">
     <h1>file2</h1>
     <ul class="list-group list-group-flush">
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
</ul>

      </div>
      </div>



<!-- %%%%%%%%%%%%%%%%%%%%%%%  file_3  %%%%%%%%%%%%%%%%%%%%% -->

      <div class="content p-2 bg-primary file3">
      <div class="row">
     <h1>file3</h1>

      </div>
      </div>

<!-- %%%%%%%%%%%%%%%%%%%%%%%  file_3  %%%%%%%%%%%%%%%%%%%%% -->




      <div class="content p-2 bg-light file4">
      <div class="row">
     <h1>file4</h1>

      </div>
      </div>
<!-- %%%%%%%%%%%%%%%%%%%%%%%  file_3  %%%%%%%%%%%%%%%%%%%%% -->


      <div class="content p-2 bg-primary file5">
      <div class="row">

     

      </div>
      </div>
      </div>
<!-- %%%%%%%%%%%%%%%%%%%%%%%  file_3  %%%%%%%%%%%%%%%%%%%%% -->
<div class="plaan d-none">
  <div class="silvar">
    
      <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    Silver Plan
  </a>
  <a href="#" class="list-group-item list-group-item-action"> Gold Plan</a>
  <a href="#" class="list-group-item list-group-item-action">Premium Plan</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>

    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>


  
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <button class="bg-primary list-group-item list-group-item-action">ok</button>


</div>

  </div>
  <div class="gold">
    <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    golden Plan
  </a>
  <a href="#" class="list-group-item list-group-item-action"> Gold Plan</a>
  <a href="#" class="list-group-item list-group-item-action">Premium Plan</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>

    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>


  
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <button class="bg-primary list-group-item list-group-item-action">ok</button>


  </div>

    

</div>
<div class="primiam">
    <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    primiam Plan
  </a>
  <a href="#" class="list-group-item list-group-item-action"> Gold Plan</a>
  <a href="#" class="list-group-item list-group-item-action">Premium Plan</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>

    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>


  
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
   <button class="bg-primary list-group-item list-group-item-action">ok</button>


  </div>

    

</div>

  </div>

</div>

<!-- Upload Script -->
<script>

$(document).ready(function(){





  // Dropdown change par

//  manue list me click ho codeing  
 
  
$("#Headline").on("change", function () {
  if ($(this).val() === "PP") {
    $(".plaan")
      .removeClass("d-none animate__fadeOut")
      .addClass("animate__animated animate__fadeInUp");
  } else {
    $(".plaan")
      .removeClass("animate__fadeInUp")
      .addClass("animate__animated animate__fadeOut");

    setTimeout(function () {
      $(".plaan").addClass("d-none");
    }, 1000); // animate.css duration
  }
});

// Agar close button chahiye plaan div ke andar
$(document).on("click", ".plaan .btn-close", function () {
  $(".plaan")
    .removeClass("animate__fadeInUp")
    .addClass("animate__animated animate__fadeOut");

  setTimeout(function () {
    $(".plaan").addClass("d-none");
    $("#Headline").val(""); // dropdown reset
  }, 1000);
});



//  manue list me click ho codeing  
 
$("#Headline").on("change", function () {
  if ($(this).val() === "EC") {
    $(".profile_desing2")
      .removeClass("d-none animate__fadeOut")
      .addClass("animate__animated animate__fadeInLeft");
  } else {
    $(".profile_desing2")
      .removeClass("animate__fadeInLeft")
      .addClass("animate__animated animate__fadeOut");

    setTimeout(function () {
      $(".profile_desing2").addClass("d-none");
    }, 1000); // 1s = animate.css default duration
  }
});

// Close button dabane par hide karo
$(document).on("click", ".profile_desing2 .btn-close", function () {
  $(".profile_desing2")
    .removeClass("animate__fadeInLeft")
    .addClass("animate__animated animate__fadeOut");

  setTimeout(function () {
    $(".profile_desing2").addClass("d-none");
    $("#Headline").val(""); // dropdown reset
  }, 1000);
});

  // _________ profile data chack__________



$("#checkBtn2").click(function(){
  var occupation = $('input[name="occupation"]').val().trim();
  var company = $('input[name="company"]').val().trim();
  var website = $('input[name="website"]').val().trim();
  var social = $('input[name="social"]').val().trim();

  // Validation
  if(occupation === "") {
    alert("Please enter occupation!");
    return;
  }
  if(company === "") {
    alert("Please enter company/organization name!");
    return;
  }
  if(website === "" || !isValidURL(website)) {
    alert("Please enter a valid website/portfolio link!");
    return;
  }
  if(social === "" || !isValidURL(social)) {
    alert("Please enter a valid social media link!");
    return;
  }

  // ✅ Data sahi hai → 3 stars auto fill
  selectedRating = 3;
  updateStars();
  // ✅ Progress bar update → 25% → 50%
$(".profil_baar .progress-bar")
  .css("width", "70%")
  .attr("aria-valuenow", 70)
  .text("70%");

});

// ===== Rating Stars =====
var selectedRating = 0;

$(".rating i").click(function(){
  selectedRating = $(this).index() + 1;
  updateStars();
});

function updateStars(){
  $(".rating i").each(function(index){
    if(index < selectedRating){
      $(this).addClass("bi-star-fill text-warning").removeClass("bi-star");
      
    } else {
      $(this).addClass("bi-star").removeClass("bi-star-fill text-warning");

    }
  });

  // ⭐ Profile card show/hide
  if(selectedRating > 0){
    $(".profil_add").addClass("d-none");
    $(".profile_card").removeClass("d-none");
  }
}

// ===== Helper: URL Validation =====
function isValidURL(string) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*))\\.)+[a-z]{2,}'+ // domain
    '(\\:[0-9]{1,5})?(\\/.*)?$','i'); 
  return !!pattern.test(string);
}









$("#checkBtn").click(function(){
  var address = $('input[name="address"]').val().trim();
  var number = $('input[name="number"]').val().trim();
  var dob = $('input[name="dob"]').val();
  var gender = $('select[name="gender"]').val();

  if(address === "") {
    alert("Please enter address!");
    return;
  }
  if(number === "" || isNaN(number)) {
    alert("Please enter a valid phone number!");
    return;
  }
  if(dob === "") {
    alert("Please select your date of birth!");
    return;
  }
  if(gender === "") {
    alert("Please select your gender!");
    return;
  }

  // ✅ Data sahi hai
 
       
  // ⭐ Default 2 star fill karo
  selectedRating = 2;
  updateStars();
});

// ===== Rating Stars =====
var selectedRating = 0;

$(".rating i").click(function(){
  selectedRating = $(this).index() + 1;
  updateStars();
});

function updateStars(){
  $(".rating i").each(function(index){
    if(index < selectedRating){
      $(this).addClass("bi-star-fill").removeClass("bi-star");

      
      $(".profil_add").addClass("d-none");
      $(".profile_card").removeClass("d-none");


      $(".profil_baar .progress-bar")
    .css("width", "50%")
    .attr("aria-valuenow", 50)
    .text("50%");

    } else {
      $(this).addClass("bi-star").removeClass("bi-star-fill");
    }
  });
}
// _________ profile data chack and code __________

  
  // Close button -> smooth hide + d-none
  $(document).on("click", ".btn-close", function (e) {
    e.preventDefault();

    const $box = $(this).closest(".profile_desing2"); // jis wrapper ko hide karna hai

    $box.fadeOut(300, function () {
      // fadeOut display:none inline laga deta hai; hum d-none add karke inline display clear kar dete hain
      $box.addClass("d-none").css("display", "");
    });
  });

  // (Optional) wapas dikhane ke liye koi button/trigger
  $(document).on("click", "#showProfileBtn", function () {
    const $box = $(".profile_desing2");
    $box.removeClass("d-none").hide().fadeIn(300);
  });





//__________user_plaan card  __________


//__________user_plaan card and __________

//__________loding ui ___________
$(window).on("load", function () {
  setTimeout(function () {
    $("#preloader").addClass("d-none");
  }, 3000);
});
//__________loding ui and__________


//__________file uplode  __________
  $(".uplod_btn").click(function(){
    var input = document.createElement("input");
    input.type = "file";

    input.onchange = function() {
      var fileData = new FormData();
      fileData.append("data", input.files[0]);

      $("#auto_baar").hide();
      $(".upload_p").hide().css("width", "0%").html("");
      $(".upload_msg").hide();

      $.ajax({
        type: "POST",
        url: "upload.php",
        data: fileData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        xhr: function() {
          var request = new XMLHttpRequest();
          request.upload.onprogress = function(e) {
            if (e.lengthComputable) {
              var loaded = (e.loaded / 1024 / 1024);
              var total = (e.total / 1024 / 1024);
              var upload_per = Math.round((loaded * 100) / total);

              $("#auto_baar").fadeIn();
              $(".upload_p").show().css("width", upload_per + "%").html(upload_per + "%");

              if (upload_per == 100) {
                $(".upload_msg").fadeIn().html("Uploaded Successfully");
                setTimeout(function(){
                  $(".upload_p").fadeOut("slow", function() {
                    $(this).css("width", "0%").html("");
                  });
                  $(".upload_msg").fadeOut("slow");
                  $("#auto_baar").fadeOut("slow");
                }, 4000);
              }
            }
          };
          return request;
        },
        success: function(obj) {
          if (obj.status === "success") {
            var usedStorage = parseFloat(obj.used_storage);
            var new_per = (usedStorage * 100) / <?= $totel_storage ?>;
            $(".u_s").html(usedStorage.toFixed(2));
            $(".p_b").css("width", new_per + "%");
            $(".upload_msg").fadeIn().html(obj.msg);
            setTimeout(function() { $(".upload_msg").fadeOut("slow"); }, 3000);
          } else {
            $(".upload_msg").fadeIn().html(obj.msg).css("color","red");
            $(".upload_p").hide();
            $("#auto_baar").hide();
            setTimeout(function() { $(".upload_msg").fadeOut("slow"); }, 3000);
          }
        },
        error: function(xhr, status, error) {
          alert("Upload error: " + error);
        }
      });
    };

    document.body.appendChild(input);
    input.click();
    document.body.removeChild(input);
  });
//__________file uplode code and __________

  //__________jQuery version  __________

$("#darkModeToggle").on("change", function () {
  if ($(this).is(":checked")) {
    $(".content").addClass("bg-dark text-white");
  } else {
    $(".content").removeClass("bg-dark text-white");
  }
});
//__________jQuery version and __________



});
</script>

</body>
</html>
