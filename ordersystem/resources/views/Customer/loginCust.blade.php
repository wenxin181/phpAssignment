<?php
/**

 * @author Sim Hui Ming
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Log In</title>
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
            var x = document.getElementById("custLogPassword");
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

        <div class="text-center mt-5 pt-5 mb-5 ">
            <h2>Log In For A Better Experience Now!</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <form method="GET" action="{{route('loginCust')}}">

                        <p><label for="custLogEmail">Email:</label>
                            <input type="email" name="custLogEmail" id="custLogEmail" size="30" /></p></br>

                        <p><label for="custLogPassword">Password:</label>
                            <input type="password" name="custLogPassword" id="custLogPassword" size="27" /></br>
                            <input type="checkbox" onclick="password()"><small>Show Password</small></p>

                        <div class="text-center py-3">
                            <button type="submit" name="loginCust" class="btn btn-warning mx-2">LOGIN</button>
                            <button type="reset" value="Reset" class="btn btn-warning mx-2">RESET</button>
                        </div>

                        <div class=" text-center pb-3">
                            <!--                                <a href="forgetpasswordCust.php" class="text-decoration-none">Forgotten Password?</a>-->
                            <a href="{{url('/Customer/forgetpasswordCust') }}" class="text-decoration-none">Forgotten Password?</a>
                        </div>

                        <div class="accAsk-link text-center mb-5 pb-5">
                            <label for="custSignupLink" style="">New to M&#252;M&#252;?</label>
                            <a href="{{url('/Customer/signUpCust') }}">Sign Up</a>
                        </div>
                    </form>
                </div>

                <div class="col-sm-4">
                </div>
                <div class="text-center mt-3">
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
