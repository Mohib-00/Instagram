<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('css')
 
     
</head>
<body>

       <div class="col-12" style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);height:920px">

        <div class="container register registr"    style=" height:820px">
            <div class="row">
                <div class="col-md-3 register-left ">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
                    <p> </p>
                    <input type="submit" name="" value="Register Here"/><br/>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#register"  role="tab" aria-controls="home" aria-selected="true">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#login"   role="tab" aria-controls="profile" aria-selected="false">Login</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent"  style=" height:520px">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading"> </h3>
                            <div class="row register-form">
                                <div class="col-md-12">

                                    <form id="registrationForm">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="First Name *" />
                                                <span id="nameError" class="text-danger"></span>
                                            </div>
                                    
                                            <div class="col-6">
                                                <input type="text" id="email" name="email" class="form-control" placeholder="Email *" />
                                                <span id="emailError" class="text-danger"></span>
                                            </div>
                                    
                                            <div class="col-6 my-5">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password *" />
                                                <span id="passwordError" class="text-danger"></span>
                                            </div>
                                    
                                            <div class="col-6 my-5">
                                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password *" />
                                                <span id="confirmPasswordError" class="text-danger"></span>
                                            </div>
                                    
                                            <div class="col-6 my-2">
                                                <button
                                                    type="button"
                                                    style="border-radius: 20px; border: 1px solid green; transition: background-color 0.5s ease, color 0.3s ease;"
                                                    class="registerbtn p-2"
                                                    id="register"
                                                >
                                                    <h3>Register</h3>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                     
                                   
                                    
                                </div>
                                 
                                </div>
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>







            <div class="container register login"  style=" height:820px;display:none">
                <div class="row">
                    <div class="col-md-3 register-left ">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p> </p> 
                        <input type="submit" name="" value="Login Here"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active1" id="register-tab" data-toggle="tab" role="tab" aria-controls="register" aria-selected="true">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="login-tab" data-toggle="tab" role="tab" aria-controls="login" aria-selected="false">Login</a>
                            </li>
                        </ul>
                        
                        
                        
                        
                        <div class="tab-content" id="myTabContent"  style=" height:520px">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading"> </h3>
                                <div class="row register-form">
                                    <div class="col-md-12">
    
                                        <form id="loginForm">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" id="loginEmail" class="form-control" name="email" placeholder="Email *" />
                                                    <span id="loginEmailError" class="text-danger"></span>
                                                </div>
                                        
                                                <div class="col-6">
                                                    <input type="password" id="loginPassword" name="password" class="form-control" placeholder="Password *" />
                                                    <span id="loginPasswordError" class="text-danger"></span>
                                                </div>
                                        
                                                <div class="col-6 my-4">
                                                    <button
                                                        type="button"
                                                        style="border-radius: 20px; border: 1px solid green; transition: background-color 0.5s ease, color 0.3s ease;"
                                                        class="loginbtn p-2"
                                                        id="login"
                                                    >
                                                        <h3>Login</h3>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
    
    
    
                                        </div>
                                         
                                       
                                        
                                    </div>
                                     
                                    </div>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>







        </div>

       

       @include('ajax')

</body>