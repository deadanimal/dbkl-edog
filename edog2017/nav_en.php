
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  font-size: 18px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<div class="div-lang">
	<a href="index.php">Bahasa Melayu</a> | <strong>English</strong>
</div>
<img src="img/logo_edog.png" width="40">
<nav>
                        <!-- Menu Toggle -->
                        <!-- Toggles menu on small screens -->
                        <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                        <!-- END Menu Toggle -->

                        <!-- Main Menu -->
                        <ul class="site-nav">
                            <!-- Toggles menu on small screens -->
                            <li class="visible-xs visible-sm">
                                <a href="javascript:void(0)" class="site-menu-toggle text-center">
                                    <i class="fa fa-times"></i>
                                </a>
                            </li>
                            <!-- END Menu Toggle -->
                            <li <?php if($thispage == "home"){ echo "class=\"active\"";} ?>>
                                <a href="index_en.php" >Home</a>

                            </li>
                            <li <?php if($thispage == "manual"){ echo "class=\"active\"";} ?>>
                                <a href="manual_en.php">User Manual</a>
                            </li>
                            <li <?php if($thispage == "faq"){ echo "class=\"active\"";} ?>>
                                <a href="faq_en.php">FAQ</a>
                            </li>
                            <li <?php if($thispage == "contact"){ echo "class=\"active\"";} ?>>
                                <a href="contact_us_en.php">Contact Us</a>
                            </li>

                            <!-- <li>
                                 <a href="" class="btn btn-primary" disabled>Log In</a>
                            </li> -->
  
                            <li>
                                 <!-- <a href="<?php // echo $formURL ?>" class="btn btn-primary">Log In</a>
                             -->
                            </li>
                            <!-- <li>
                                <a href="<?php echo $formURL ?>/login#register" class="btn btn-success">Sign Up</a>
                            </li> -->
                
                                                        
                        <!-- Trigger/Open The Modal -->
                        <button class="btn btn-info"  id="myBtn">Log In</button>

                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center" style="color: black; font-size:20px; "> <b> Makluman / Notice </b> </h4>
                        </div>
                            <p class=" text-center "style="color: black;">"MAKLUMAN PENUTUPAN SISTEM PENGURUSAN LESEN ANJING" <br> Capaian Sistem pengurusan Lesen Anjing DBKL akan ditutup sementara waktu bagi kerja-kerja pengemaskinian maklumat pemohon bagi tahun 2021. Segala kesulitan amatlah dikesali.</br>
                           Sebarang pertanyaan lanjut boleh hubungi Unit Kawalan Pest, Jabatan Kesihatan Dan Alam Sekitar di talian 03-92210419.Sekian, dimaklumkan.Terima kasih.

                                <p class=" text-center "style="color: black;">"NOTICE OF CLOSING OF DOG LICENSE MANAGEMENT SYSTEM"  <br> Access to DBKL Dog License Management System will be temporarily closed due to updating applicant information for 2021. We  regret the inconvenience caused.</br>
                                 Any further inquiries can contact Pest Control Unit, Department of Health and Environment at 03-92210419.Be informed. Thank you..</p>
                        </div>

                        </div>
                            
                                    </ul>
                                <!-- END Main Menu -->
                            </nav>
                            
                            
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");
                            
                            // Get the button that opens the modal
                            var btn = document.getElementById("myBtn");
                            
                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];
                            
                            // When the user clicks the button, open the modal 
                            btn.onclick = function() {
                              modal.style.display = "block";
                            }
                            
                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                              modal.style.display = "none";
                            }
                            
                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                              if (event.target == modal) {
                                modal.style.display = "none";
                              }
                            }
                            </script>
                            
                            </body>
                            </html>