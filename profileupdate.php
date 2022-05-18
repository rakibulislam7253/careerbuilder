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
    <title>Update Jobseeker profile Page</title>
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
                <input type="submit"  value="Search">
               
            </form>
            <input class="item" type="button" value="Logout" onclick="logoutfn();">
        
      </div>
    </div>
  </div>
</div>
     </div>
</div>
     
  

    <h4>Upload Profile Info HERE</h4>
         <form action="updateprofileprocess.php" method="POST">
          <div class="ui form">
  <div class="field">
    
        <?php
                     try{
                         
                        $conn=new PDO('mysql:host=localhost:3306;dbname=careerbuilder;','root','');
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                         
                         $mail=$_SESSION['useremail'];
                         

                        //database code execute, default : warning generate
                        $sqlquerystring="SELECT * FROM user WHERE username='$mail'";
                        $returnobj=$conn->query($sqlquerystring); 
                         
                         
            
                            ///product data found
                            $tabledata=$returnobj->fetchAll();
                           
                            
                            foreach($tabledata AS $row){
                                ///$row = array(id=>1,name=>lays,imagepath=>folder/file.jpg,…)
                                
                                ?>
                                  
                                   <div class="two fields">
                                       <div class="field">
                                           <label for="upass">Password: </label>
                                           <input type="text" id="upass" name="upass" value="<?php echo $row['password']; ?>">


                                       </div>
                                       <div class="field">
                                           <label for="fname"> Name *</label>
                                           <input type="text" name="fname" id="fname" value="<?php echo $row['name']; ?>" required>

                                       </div>
                                   </div>
                                   
                                       <div class="field">
                                           <label for="location"> Location *</label>
                                           <input type="text" name="location" id="location" value="<?php echo $row['location']; ?>" required>
                                       </div>
                                       <div class="field">
                                           <label for="gender">Gender: </label>
                        
                                           <input type="radio" id="gender" name="gender" value="male" /> Male
                                           <input type="radio" id="gender" name="gender" value="female" /> Female <br />
                                           
                                       </div>
                                   
                                   <div class="two fields">
                                       <div class="field">
                                           <label for="dob">Date of Birth</label>
                                           <input type="date" name="dob" id="dob" value="<?php echo $row['dateofbirth']; ?>">
                                       </div>
                                       <div class="field">
                                           <label for="phone">Phone Number</label>
                                           <input type="text" name="phone" id="phone" value="<?php echo $row['contact']; ?>">
                                       </div>
                                   </div>                      
        <input type="submit" class="ui basic green button" value="SUBMIT FOR UPDATE">
        <input type="reset" class="ui basic green button" value="RESET">
        
              </div>
             </div>
    </form>
                                    
                                <?php
                                
                            }
                            
                        }
    
    
    
    
                     
    
    
    
    
                    catch (PDOException $ex){
                        ?>
                             catch No data found
                            
                        <?php
                    }
                    
                    ?> 
                     <?php include "userfooter.php"; ?>
    
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