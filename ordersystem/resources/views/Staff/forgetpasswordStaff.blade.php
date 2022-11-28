<?php
/**
 * @author Sim Hui Ming
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Staff Reset Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/test.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>

    </head>
    <script>
        function password_reset() {
            var x = document.getElementById("staffPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <body>
        <!--HEADER-->
        <div class="row bg-light">
            <div class="col-md-1 ">
                <div class="navbar-brand p-3" >
                    <a href="#" class="text-decoration-none">M&#252;M&#252;</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-4 pt-4 mb-4 "></div>
        <div class="text-center mt-5 pt-5 mb-5 ">
            <h2>Let's Reset Your Password</h2>
        </div>

        <div class="container">
            <div class="row py-3">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <form method="GET" action="{{route('forgetpasswordStaff')}}">

                        <p><label for="custLogEmail">Email:</label>
                            <input type="email" name="email" id="email" size="30"/></BR>
                        </p></br>
                        
                        <p><label for="staffPassword">New Password:</label>
                            <input type="password" name="staffPassword" id="staffPassword" size="23" /></br>
                            <input type="checkbox" onclick="password_reset()"><small>Show Password</small></p>
                        
                        
                        <div class="text-center pt-3 pb-5">
                            <button type="submit" name="forgetpasswordStaff" class="btn btn-warning mx-2">SUBMIT</button>
                        </div>
                    </form>

                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="text-center mt-3 pt-4 mb-4 "></div>
        </div>


        <footer id="footer"  class="footer">
            <div class="container-fluid py-3 bg-light">
                <div class="text-center">
                    Follow Us
                </div>
                <div class="hm-footer-copyright text-center">
                    <div class="footer-social pt-2" >
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>	
                        <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                        <a href="https://twitter.com/login"><i class="fa fa-twitter"></i></a>
                    </div>
                    <p style="font-size: 80%;margin-bottom: 0px">Copyright 2022 &copy; M&#252;m&#252;. All rights reserved.</br>
                        <span>Made with <span class="heart">♥</span> Team of M&#252;m&#252;</span>
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
