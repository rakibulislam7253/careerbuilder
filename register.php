<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <?php include "css.php"; ?>
    <!--
    <style>
        
        div{
            margin-left: 30%;
            margin-top: 5%;
        }
        h2{
            margin-left: 5%;
            color: green;
            font-size: 32px;
        }
        input[type=submit],#login{
            padding: 15px 35px;
            background: orange;
            color:white;
            
        }
        input[type=submit]:hover,#login:hover{
            padding: 20px 35px;
            background: green;
            color:white;
        }
    </style>
-->
</head>


<body>

    <div style="padding-left: 20%; padding-right: 20%; padding-top: 5%;">
        <form action="registerprocess.php" class="ui form" method="POST">
            <h2 style="text-align:center">Register Here</h2>

            <label for="uemail">Email: </label>
            <input type="email" id="uemail" name="uemail" placeholder="enter your email here" title="valid email">

            <label for="upass">Password: </label>
            <input type="password" id="upass" name="upass" placeholder="1234">


            <label for="fname"> Name *</label>
            <input type="text" name="fname" id="fname" required>

            <label for="location"> Location *</label>
            <input type="text" name="location" id="location" required>
            <br><br>

            <label for="gender">Gender: </label><br>

            <input type="radio" id="gender" name="gender" value="male" /> Male
            <input type="radio" id="gender" name="gender" value="female" /> Female <br />
            <br>

            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob">

            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" placeholder="01*********">
            <br><br>
            <label for="usertype">User type: </label>
            <br>
            <input type="radio" id="usertype" name="usertype" value="recruiter" /> Recruiter
            <input type="radio" id="usertypr" name="usertype" value="applicant" /> Applicant <br />

            <br>

            <input type="submit" class="ui green button" value="Register">
            <input type="reset" class="ui green button" value="Reset">
        </form>
        <!--        <input id="login" type="button" value="Login" onclick=login() >-->
    </div>

    <script>
        function login() {
            location.assign('login.php');
        }
    </script>

</body>

</html>