  <?php
    session_start();

    if (
        isset($_SESSION['useremail'])
        &&  !empty($_SESSION['useremail'])
    ) {
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
          <div style="margin: 15px;">
              <div class="navbar">
                  <div class="ui segment">
                      <div class="ui secondary  menu">
                          <input class="item" type="button" value="CareerBuilder" onclick="homefn();">
                          <input class="active item" type="button" value="Profile" onclick="profilefn();">

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

                  <form  class="ui form" method="POST" id="cvupdate">
                      <h2>Update your Info HERE</h2>

                      <?php

                        $conn = new PDO('mysql:host=localhost:3306;dbname=careerbuilder;', 'root', '');
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $mail = $_SESSION['useremail'];


                        //database code execute, default : warning generate
                        $sqlquerystring = "SELECT * FROM cv WHERE username='$mail'";
                        $returnobj = $conn->query($sqlquerystring);


                        ///product data found
                        $tabledata = $returnobj->fetchAll();

                        foreach ($tabledata as $row) {
                            ///$row = array(id=>1,name=>lays,imagepath=>folder/file.jpg,…) 
                        ?>

                          <label for="fullname">fullname</label>
                          <input type="text" name="fullname" id="fullname" value="<?php echo $row['fullname']; ?>">
                          <br><br>
                          <label for="education">education</label>
                          <input type="text" name="education" id="education" value="<?php echo $row['education']; ?>">
                          <br><br>
                          <label for="skills">skill</label>
                          <input type="text" name="skills" id="skills" value="<?php echo $row['skills']; ?>">
                          <br><br>
                          <label for="language">language</label>
                          <input type="text" name="language" id="language" value="<?php echo $row['language']; ?>">
                          <br><br>
                          <label for="certification">certification</label>
                          <input type="text" name="certification" id="certification" value="<?php echo $row['certification']; ?>">
                          <br><br>
                          <label for="experience">experience</label>
                          <input type="text" name="experience" id="experience" value="<?php echo $row['experience']; ?>">
                          <br><br>
                          <label for="interest">Interest</label>
                          <input type="text" name="interest" id="interest" value="<?php echo $row['interest']; ?>">
                          <br><br>
                          <label for="reference">reference</label>
                          <input type="text" name="reference" id="reference" value="<?php echo $row['reference']; ?>">
                          <br><br>
                          <label for="links">links</label>
                          <input type="text" name="links" id="links" value="<?php echo $row['links']; ?>">
                          <br><br>


                      <?php
                        }
                        ?>



                      <input type="submit" class="ui button" value="Click to Update CV">
                  </form>
              </div>
          </div>


          <?php include "userfooter.php"; ?>

<!-----------------start jquary and ajax action="cvupdateprocess.php"------------->
<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready (function(){
        $("#cvupdate").submit(function(){
            $.ajax({
                method: "POST",
                url: "cvupdateprocess.php",
                data : $('#cvupdate').serialize()
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
                    else if (msg=="successful update")
                    {
                        alert("your data has been updated successfully.");
                        location.href="home.php";
                        return false;
                    }
                    
                    else if (msg=="error")
                    {
                        alert("your data has not updated.");
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
    } else {
    ?>
      <script>
          location.assign('login.php')
      </script>
  <?php
    }

    ?>