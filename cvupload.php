 <?php
session_start();

if(
        isset($_SESSION['useremail'])
    &&  !empty($_SESSION['useremail'])
){
    ///already logged in
    
    ?>

 <!DOCTYPE html>

 <html>

 <head>
     <meta charset="utf-8">
     <title>Upload CV Page</title>
     <?php include "css.php"; ?>
 </head>

 <body>
     <div class="navbar">
         <div class="ui segment">
             <div class="ui secondary  menu">
                 <input class="item" type="button" value="CareerBuilder" onclick="homefn();">
                 <input class=" active  item" type="button" value="Profile" onclick="profilefn();">

                 <?php include "dropdown.php"; ?>


                 <input class="item" type="button" value="Message" onclick="messagefn();">
                 <input class="item" type="button" value="Notification" onclick="notificationfn();">
                 <input class="item" type="button" value="Application Status" onclick="statusfn();">
                 <input class="item" type="button" value="Suggest JOB" onclick="suggestfn();">

                 <div class="right menu">
                     <div class="item">
                         <div class="ui icon input">
                             <form action="searchprocess.php" method="POST">
                                 <input type="text" name="pid" id="pid" Placeholder="ALL CAPITAL LETTER">
                                 <input type="submit" value="Search">

                             </form>
                             <input class="item" type="button" value="Logout" onclick="logoutfn();">

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div>

         <form  class="ui form" method="POST" id="form_cvupload">
             <h2>Update your Info HERE</h2>
             <h4 class="ui dividing header">Curriculum vitae</h4>
             <div class="field">
                 <label for="fullname">fullname</label>
                 <input type="text" name="fullname" id="fullname">
             </div>

             <h4 class="ui dividing header">Qualifications</h4>
             <div class="field">

                 <div class="two fields">
                     <div class="field">
                         <label for="education">education</label>
                         <input type="text" name="education" id="education">
                     </div>
                     <div class="field">
                         <label for="skills">skill</label>
                         <input type="text" name="skills" id="skills">
                     </div>

                 </div>
             </div>

             <h4 class="ui dividing header">Interest And Language</h4>
             <div class="field">

                 <div class="two fields">
                     <div class="field">
                         <label for="interest">Interest</label>
                         <input type="text" name="interest" id="interest">
                     </div>
                     <div class="field">
                         <label for="language">language</label>
                         <input type="text" name="language" id="language">
                     </div>

                 </div>
             </div>

             <div class="field">
                 <h4 class="ui dividing header">Awards and Experience</h4>
                 <div class="two fields">
                     <div class="field">
                         <label for="certification">certification</label>
                         <input type="text" name="certification" id="certification">
                     </div>
                     <div class="field">
                         <label for="experience">experience</label>
                         <input type="text" name="experience" id="experience">
                     </div>
                 </div>

             </div>
             <div class="field">
                 <h4 class="ui dividing header">References and Contacts</h4>
                 <div class="three fields">
                     <div class="field">
                         <label for="reference">reference</label>
                         <input type="text" name="reference" id="reference">
                     </div>
                     <div class="field">
                         <label for="links">links</label>
                         <input type="text" name="links" id="links">
                     </div>
                     <div class="field">
                         <label>Email</label>
                         <input type="text" name="shipping[last-name]" placeholder="Last Name" value="<?php echo $_SESSION['useremail']; ?>" readonly>
                     </div>
                 </div>

             </div>


             <div class="ui huge buttons">
                 <input type="submit" class="ui green button" value="Upload CV">
             </div>


         </form>
     </div>

     <?php include "userfooter.php"; ?>
<!-----------------start jquary and ajax action="uploadcvprocess.php"------------->
<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
       

        $("#form_cvupload").submit(function(){
            $.ajax({
                method: "POST",
                url: "uploadcvprocess.php",
                data : $('#form_cvupload').serialize()
                })
                .done(function( msg ) {
                    //alert (msg);
                    if (msg=="Invalid User")
                    {
                        location.href="login.php";
                        return false;
                    }
                   else if (msg=="Data missing")
                    {
                        alert("Please enter all filed");
                        return false;
                    }

                    else if (msg=="success")
                    {
                        alert("your data has been uploaded successfully.");
                        location.href="home.php";
                        return false;
                    }
                    
                    else if (msg=="error")
                    {
                        alert("your data has not uploaded.");
                        return false;
                    }
                });
            return false;
        });
            

    });
</script>


 </body>

 </html>

 <?php
}
else{
    ?>
 <script>
     location.assign('login.php')
 </script>
 <?php
}

?>