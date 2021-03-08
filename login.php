<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="bootstraps/css/bootstrap.min.css">
        <script type="text/javascript" scr="bootstraps/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style type="text/css">
    .button4a {
    background-color: #4CAF50; /* Green */
    border: none;
    color: grey;
    padding: 5px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    }
    .button4 {
    background-color: lightgrey;
    color: black;
    border: 2px solid #343a40;
    margin-top: 10px;
    border-radius: 25px;
    }
    .button4:hover{
    background-color: white;
    border: 2px solid #343a40;
    }
    .headercolor{
    background-color: #343a40;
    color: white
    }
    
    </style>
    <body>
    <!-- Header -->
    <?php include "header.php"?>
    <!-- Header -->
    <!-- Content -->
    <div class="container-lg">
        <div class="w3-row-padding w3-padding-64 w3-container">
            <div class="w3-content">
                <center>
                <div class="col-md-12 login-left w3-light-grey" style="border: solid #343a40 5px;padding: 30px;border-radius: 25px;width: 500px; margin:50px;">
                    <h2>Login Here</h2>
                    <br>
                    <form action="PHP/LoginChecking.php" method="post">
                        <div class="form-group">
                            <label>Username : </label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password : </label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <br>
                        <!--        <div class="form-group">
                            <label>User Type : </label>
                            <select type="text" id="type" name="type" class="form-control" required>
                                <option value="Marketing Coordinator">Marketing Coordinator</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Marketing Manager">Marketing Manager</option>
                                <option value="Student">Student</option>
                            </select>
                        </div> -->
                        <center><button type="submit" id="register" class="button4 button4a" name="create" value="Login">Login</button>
                        
                    </form>
                </div>
                </center>
            </div>
        </div>
        
    </div>
    <hr>
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">
      <div class="w3-xlarge w3-padding-32">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
      </div>
      
    </footer>
    
</body>
</html>