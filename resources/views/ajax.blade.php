<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--register form css--}}
   <script>
 $(document).ready(function () {
   

  $('#home-tab').on('click', function () {
    $('#home-tab').addClass('active').removeClass('inactive');
    $('#profile-tab').addClass('inactive').removeClass('active');
    
     
    $('#home-tab').css('background-color', '#0062cc');
    $('#home-tab').css('color', 'white');
    $('#profile-tab').css('background-color', 'white');
    $('#profile-tab').css('color', 'black');
  });

  
  $('#profile-tab').on('click', function () {
    $('#profile-tab').addClass('active').removeClass('inactive');
    $('#home-tab').addClass('inactive').removeClass('active');
    
    
    $('#profile-tab').css('background-color', '#0062cc');
    $('#profile-tab').css('color', 'white');
    $('#home-tab').css('background-color', 'white');
    $('#home-tab').css('color', 'black');
  });
});



</script>

{{--login form css--}}
<script>
$(document).ready(function () {
  
    $('#login-tab').addClass('active1').removeClass('inactive');
    $('#register-tab').addClass('inactive').removeClass('active1');

    
    $('#register-tab').on('click', function () {
        $('#register-tab').addClass('active1').removeClass('inactive');
        $('#login-tab').addClass('inactive').removeClass('active1');
    });

   
    $('#login-tab').on('click', function () {
        $('#login-tab').addClass('active1').removeClass('inactive');
        $('#register-tab').addClass('inactive').removeClass('active1');
    });
});

</script>

 
<script>
//click to show login form    
$("#profile-tab").click(function() {
    $(".login").show();
    $(".registr").hide();
});

//click to show register form 
$("#register-tab").click(function() {
    $(".login").hide();
    $(".registr").show();
});


//register
$(document).ready(function () {
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#register').on('click', function () {
      
        $('.text-danger').text('');

        
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            confirmPassword: $('#confirmPassword').val()
        };

        
        var valid = true;

if (!formData.name) {
$('#nameError').text('The name field is required.');
valid = false;
}

if (!formData.email) {
$('#emailError').text('The name field is required.');
valid = false;
}

if (!formData.password) {
$('#passwordError').text('The name field is required.');
valid = false;
}

if (!formData.password) {
$('#confirmPasswordError').text('The name field is required.');
valid = false;
}



if (formData.password !== formData.confirmPassword) {
$('#confirmPasswordError').text('Password do not match');
valid = false;
}

if (!valid) {
return; 
}

        $.ajax({
            url: '/register', 
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.status) {
                    $('#registrationForm')[0].reset();
                    $('.login').show();
                    $('.registr').hide();
                } else {
                    
                    if (response.errors) {
                        $.each(response.errors, function (key, error) {
                            $('#' + key + 'Error').text(error[0]);
                        });
                    } else {
                        
                    }
                }
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    var response = xhr.responseJSON;
                    if (response) {
                        console.error('Login Failed', response);
                        
                        $('#emailError').text('The email has already been taken');
                    } else {
                       
                        $('#emailError').text('The email has already been taken');
                    }
                } else {
                   
                    $('#emailError').text('The email has already been taken');
                }
            }
        });
    });
});


//login
$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#login').on('click', function (e) {
        e.preventDefault();
        
        $('.text-danger').text('');  

        var formData = {
            email: $('#loginEmail').val(),
            password: $('#loginPassword').val()
        };

        var valid = true;

       
        if (!formData.email) {
            $('#loginEmailError').text('The email field is required.');
            valid = false;
        }

        if (!formData.password) {
            $('#loginPasswordError').text('The password field is required.');
            valid = false;
        }

        if (!valid) {
            return;  
        }

      
        $.ajax({
            url: '/login',   
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.status) {
                    
                    localStorage.setItem('token', response.token);
                    
                    
                    if (response.userType === '1') {
                         
                        window.location.href = '/admin';
                    } else {
                         
                        window.location.href = '/home';
                    }
                } else {
                    
                    if (response.errors) {
                        $.each(response.errors, function (key, error) {
                            if (key === 'email' || key === 'password') {
                                $('#' + key + 'Error').text(error[0]);
                            }
                        });
                    } else {
                        
                        $('#loginEmailError').text(response.message);
                        $('#loginPasswordError').text(response.message);
                    }
                }
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    var response = xhr.responseJSON;
                    if (response) {
                        $('#loginEmailError').text(response.message);
                        $('#loginPasswordError').text(response.message);
                    } else {
                        $('#loginEmailError').text('Invalid credentials');
                        $('#loginPasswordError').text('Invalid credentials');
                    }
                } else {
                    $('#loginEmailError').text('The credentials do not match our record.');
                    $('#loginPasswordError').text('The credentials do not match our record.');
                }
            }
        });
    });
});


//logout
$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#logout').on('click', function () {
        $.ajax({
            url: '/logout',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')  
            },
            success: function (response) {
                if (response.status) {
                    
                    localStorage.removeItem('token');

                    window.location.href = '/';
                } else {
                    alert('Logout failed. Please try again.');
                }
            },
            error: function (xhr) {
                console.error(xhr);
                alert('An error occurred while logging out.');
            }
        });
    });

   
    if ((window.location.pathname === '/home' || window.location.pathname === '/admin') && !localStorage.getItem('token')) {
        window.location.href = '/';
    }
});


</script>
</body>