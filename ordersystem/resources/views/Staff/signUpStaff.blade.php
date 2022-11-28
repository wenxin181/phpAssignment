<?php
/**
 * @author Sim Hui Ming
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Staff Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/test.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>
        <style>
            .accAsk-link > a{
                color:orange;
                font-weight: bold;
                text-decoration: none;
            }

            .accAsk-link > a:hover{
                text-decoration: underline;
            }
        </style>
    </head>

    <script>
        function password() {
            var x = document.getElementById("staffPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function confirm_password() {
            var y = document.getElementById("staffConfirmPassword");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>

    <body>
        <!--HEADER-->
        <div class="row bg-light">
            <div class="col-md-1 ">
                <div class="navbar-brand p-3" >
                    <a href="#" class="text-decoration-none">M&#252;M&#252;</a>

                </div>
            </div>
        </div>

        <div class="text-center pt-4 pb-2">
            <h2>Sign Up For Your Account Now!</h2>
        </div>

        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <form method="POST" action="{{url('/Staff/signUpStaff')}}">
                        @csrf
                        <p><label for="staffName">Name:</label>
                            <input type="text"  name="staffName" id="staffName" size="30" /></p>

                        <p><label for="staffEmail">Email:</label>
                            <input type="email" name="staffEmail" id="staffEmail" size="30" placeholder="example@gmail.com"/></p>

                        <p><label for="staffPosition">Position:</label></br>
                            <input type="radio" name="staffPosition" value="Admin" checked/>Admin</br>
                            <input type="radio" name="staffPosition" value="Store Manager" />Store Manager</br>
                            <input type="radio" name="staffPosition" value="Inventory Control Specialist" />Inventory Control Specialist</p>

                        <p><label for="staffPassword">Password:</label>
                            <input type="password" name="staffPassword" id="staffPassword" size="23" /></br>
                            <input type="checkbox" onclick="password()"><small>Show Password</small></p>

                        <p><label for="staffConfirmPassword">Confirm Password:</label>
                            <input type="password" name="staffConfirmPassword" id="staffConfirmPassword" size="23" /></br>
                            <input type="checkbox" onclick="confirm_password()"><small>Show Password</small></p>

                        <p><small id="pswdHelp" class="form-text text-muted">*Password must between 8-16 character and contain at least 1 digit, 1 uppercase, 1 lowercase and 1 special character.</small></p>


                        <div class="text-center py-3">
                            <button type="submit" name="signUpStaff" value="signUpStaff" class="btn btn-warning mx-2">SIGN UP</button>
                            <button type="reset" value="Reset" class="btn btn-warning mx-2">RESET</button>
                        </div>

                        <div class="accAsk-link text-center">
                            <label for="staffLoginLink" style="">Have An Account?</label>
                            <a href="{{url('/Staff/loginStaff') }}">Log In</a>
                        </div>
                    </form>

                </div>
                <div class="col-sm-4">
                </div>
            </div>
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
