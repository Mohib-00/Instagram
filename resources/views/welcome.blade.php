<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('css')
 
     
</head>
<body>
               
                     {{--sign up--}}
                  <div class="page register registr" style="margin-left:40%">
                    <div class="header" style="width:80%"  >
                      <h1 class="logo">Instagram</h1>
                      <p>Sign up to see photos and videos from your friends.</p>
                      <button><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                      </svg> Log in with Facebook</button>
                      <div>
                        <hr>
                        <p>OR</p>
                        <hr>
                      </div>
                    </div>
                    <div class="container">
                        <form id="registrationForm">
                            <input style="width:120%;margin-left:-30px" type="text" class="form-control" id="name" name="name" placeholder="Full Name *" />
                            <span style="width:120%;margin-left:-30px" id="nameError" class="text-danger"></span>

                            <input style="width:120%;margin-left:-30px" type="text" class="form-control" id="userName" name="userName" placeholder="User Name *" />
                            <span style="width:120%;margin-left:-30px" id="usernameError" class="text-danger"></span>

                            <input style="width:120%;margin-left:-30px" type="text" id="email" name="email" class="form-control" placeholder="Email *" />
                            <span style="width:120%;margin-left:-30px" id="emailError" class="text-danger"></span>

                            <input style="width:120%;margin-left:-30px" type="password" id="password" name="password" class="form-control" placeholder="Password *" />
                            <span style="width:120%;margin-left:-30px" id="passwordError" class="text-danger"></span>

                            <input style="width:120%;margin-left:-30px" type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password *" />
                            <span style="width:120%;margin-left:-30px" id="confirmPasswordError" class="text-danger"></span>
                        
                       

                        <button style="width:120%; "  type="button" class="registerbtn p-2" id="register">
                             Sign Up
                         </button>
                      </form>
                      
                      <ul>
                        <li>By signing up, you agree to our</li>
                        <li><a href="">Terms</a></li>
                        <li><a href="">Data Policy</a></li>
                        <li>and</li>
                        <li><a href="">Cookies Policy</a> .</li>
                     </ul>
                    </div>
                </div>
                <div class="option register registr" id="profile-tab" style="margin-left:40%">
                   <p id="profile-tab">Have an account? <a href="">Log in</a></p>
                </div>
                <div class="otherapps register registr">
                  <p>Get the app.</p>
                  <button type="button"><i class="fab fa-apple"></i> App Store</button>
                  <button type="button"><i class="fab fa-google-play"></i> Google Play</button>
                </div>



                {{--login--}}
                <div class="page register login" style="margin-left:40%;display:none">
                    <div class="header" style="width:80%"  >
                      <h1 class="logo">Instagram</h1>
                       
                      
                      <div>
                       
                      </div>
                    </div>
                    <div class="container">
                        <form id="loginForm">
                            

                            <input style="width:120%;margin-left:-30px" type="text" id="loginEmail" class="form-control" name="email" placeholder="Email *" />
                            <span style="width:120%;margin-left:-30px" id="loginEmailError" class="text-danger"></span>

                            <input style="width:120%;margin-left:-30px" type="password" id="loginPassword" name="password" class="form-control" placeholder="Password *" />
                            <span style="width:120%;margin-left:-30px" id="loginPasswordError" class="text-danger"></span>

                            
                        
                       

                        <button style="width:120%; " type="button"  class="loginbtn p-2" id="login">
                          Login
                        </button>
                      </form>
                      
                      <ul>
                        <li>By signing up, you agree to our</li>
                        <li><a href="">Terms</a></li>
                        <li><a href="">Data Policy</a></li>
                        <li>and</li>
                        <li><a href="">Cookies Policy</a> .</li>
                     </ul>
                    </div>
                </div>

                <div class="option register login" id="register-tab" style="margin-left:40%">
                    <p id="register-tab">Don't have an account? <a href="">Sign Up </a></p>
                 </div>
                
                <div class="otherapps  register login"  style=" display:none">
                  <p>Get the app.</p>
                  <button type="button"><i class="fab fa-apple"></i> App Store</button>
                  <button type="button"><i class="fab fa-google-play"></i> Google Play</button>
                </div>
                 
                 
                 

       @include('ajax')

</body>