   <!-- ! account start -->
   <section class="account-page">


       <div class=" container justify-content-center">
           <div class="account-column">
               <h2 class="text-center" style="font-size: 30px;">Register Account</h2>
               <form method="post" enctype="multipart/form-data">
                   <div>
                       <label>
                           <span style="font-size: 21px;">Username <span class="required">*</span></span>
                           <input type="text" name="name" placeholder="Enter your username" style="font-size: 19px;">
                       </label>
                   </div>
                   <div>
                       <label>
                           <span style="font-size: 21px;">Email Address <span class="required">*</span></span>
                           <input type="email" name="mail" placeholder="Enter your email address" style="font-size: 19px;">
                       </label>
                   </div>
                   <div>
                       <label>
                           <span style="font-size: 21px;">Password <span class="required">*</span></span>
                           <input type="password" name="pass" placeholder="Enter your password" style="font-size: 19px;">
                           <input type="hidden" name="status" value="1">
                       </label>
                   </div>
                   <div class="privacy-policy-text remember">
                       <p style="font-size: 19px;">
                           Your personal data will be used to support your experience throughout this website, to manage access to
                           your account, and for other purposes described in our <a href="#">privacy policy</a>.
                       </p>
                       <button class="btn btn-sm mt-1" type="submit" name="button"> Register</button>
                       <div class="mt-1" style="color: red; font-size:22px; font-weight:bold;">
                           <?php
                            echo $msg;
                            ?>
                       </div>
                   </div>
                   <a href="account.php" class="form-link" style="font-size: 19px;">Already have an account ? Login Account</a>

               </form>
           </div>
       </div>

       </div>
       </div>
   </section>
   <!-- ! account end -->