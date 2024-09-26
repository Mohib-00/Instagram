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


   <script>
 document.getElementById('openDesktop').addEventListener('click', function () {
    document.getElementById('reelUploadInput').click();
});

document.getElementById('reelUploadInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('previewContainer');
    const bzContainer = document.getElementById('bz');
    const discardContainer = document.getElementById('discardcontainer');  
    discardContainer.style.display = 'none';   

    previewContainer.innerHTML = '';   

    if (file) {
        const fileType = file.type;
        const fileURL = URL.createObjectURL(file);

        bzContainer.style.display = 'block';

        if (fileType.startsWith('image/')) {
            const img = document.createElement('img');
            img.src = fileURL;
            img.style.width = '103.2%';   
            img.style.height = '600px';  
            img.style.objectFit = 'cover';  
            img.style.borderRadius = '0px 0px 0px 10px';
            img.style.marginLeft = '-12px';
            previewContainer.appendChild(img);
        } 
        else if (fileType.startsWith('video/')) {
            const video = document.createElement('video');
            video.src = fileURL;
            video.controls = false;
            video.setAttribute('muted', true);
            video.setAttribute('playsinline', true);
            video.setAttribute('autoplay', true);
            video.style.width = '103.2%';   
            video.style.height = '600px'; 
            video.style.objectFit = 'cover';
            video.style.borderRadius ='0px 0px 0px 10px';
            video.style.marginLeft = '-12px';
            previewContainer.appendChild(video);
        } 
        else {
            alert('Please select a valid image or video file.');
        }
    }
});

document.querySelector('.discardsvg').addEventListener('click', function () {
    const discardContainer = document.getElementById('discardcontainer');
    discardContainer.style.display = 'block';   
});

document.getElementById('dddiscard').addEventListener('click', function () {
    const bzContainer = document.getElementById('bz');
    const discardContainer = document.getElementById('discardcontainer');
    bzContainer.style.display = 'none';   
    discardContainer.style.display = 'none';  
});

document.getElementById('cancelDiscard').addEventListener('click', function () {
    const discardContainer = document.getElementById('discardcontainer');
    discardContainer.style.display = 'none';   
});


</script>
 
<script>
   function initializeEmojiHandlers() {
    const emojiElements = document.querySelectorAll('.showemojis');
    const wordInput = document.getElementById('wordInput');

   
    emojiElements.forEach(emoji => {
        const newEmoji = emoji.cloneNode(true);
        emoji.replaceWith(newEmoji);
        newEmoji.addEventListener('click', () => {
            const selectedEmoji = newEmoji.textContent;
            wordInput.value += selectedEmoji;
            wordInput.focus();
        });
    });
}

initializeEmojiHandlers();

</script>  

{{--previous checkbox remove--}}   
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
    const genderCheckboxes = document.querySelectorAll('.gender-checkbox');

   
    genderCheckboxes.forEach(function(checkbox) {
        checkbox.checked = false;  
    });

    genderCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                
                genderCheckboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
});

</script>  

{{--change input borders in red--}}
<script>
$(document).ready(function() {
    const customCheckbox = document.getElementById('customCheckbox');
    const bioInput3 = document.getElementById('bioInput3');
    const bioInput2 = document.getElementById('bioInput2');
    
    function updateBorders() {
        if (customCheckbox.checked) {
            bioInput3.style.border = '1px solid red';
            bioInput2.style.border = '1px solid red';
        } else {
            bioInput3.style.border = '';
            bioInput2.style.border = '';
        }
    }
    
    function handleGenderCheckboxChange(checkbox) {
        if (checkbox.checked) {
            bioInput2.value = checkbox.value;  
            bioInput3.value = '';  
        }
    }
    
    customCheckbox.addEventListener('change', function() {
        updateBorders();  
        if (this.checked) {
            bioInput2.value = bioInput3.value;  
        } else {
            bioInput2.value = '';  
        }
    });
    
    bioInput3.addEventListener('input', function() {
        if (customCheckbox.checked) {
            bioInput2.value = this.value; 
        }
        updateBorders();  
    });
    
    const otherCheckboxes = document.querySelectorAll('.gender-checkbox:not(#customCheckbox)');
    
    otherCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            handleGenderCheckboxChange(this);  
            customCheckbox.checked = false;  
            bioInput3.value = '';  
            bioInput2.value = this.value;  
            updateBorders();  
        });
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

//open logout
$("#openlogout").click(function() { 
    $("#showlogout").fadeIn(150);
});

//close logout
$("#closelogout").click(function() { 
    $("#showlogout").fadeOut(150);
});

//to open checkbox hidden content
$("#bioInput2").click(function() {
    $(".hiddencontent").show();
});

//to close checkbox hidden content
$(".checkbox").click(function() {
    $(".hiddencontent").hide();
});

//to close checkbox hidden content
$(".minus").click(function() {
    $(".hiddencontent").hide();
});


//open profilehiddencontent section
$(".marginleft").click(function() { 
    $(".profilehiddencontent").fadeIn(150);
});

//close profilehiddencontent section
$(".cancel").click(function() { 
    $(".profilehiddencontent").fadeOut(150);
});

//open create container
$("#create").click(function() { 
    $(".showcreatecontainer").fadeIn(100);
});

//to close create container 
 $(".showcreatecontainer").click(function() { 
    $(".showcreatecontainer").fadeOut(100);
});

//to show emoji container 
$(".showemojisvg").click(function() { 
    $(".emojiS").show();
});

//to close emoji container 
$("#smileyy").click(function() { 
    $(".emojiS").hide();
});


//to close settings post container 
$("#wordInput").click(function() { 
    $("#htmlsetngs").hide();
});

//to show emoji container 
$("#openSVG").click(function() { 
    $("#htmlsetngs").show();
});

//to show post discard container 
$(".discardsvg").click(function() { 
    $("#discardcontainer").show();
});

//to hide discard container 
$("#dddiscard").click(function() { 
    $("#bz").hide();
    $(".showcreatecontainer").show();
});

//to hide discard container 
$("#cancelDiscard").click(function() { 
    $("#discardcontainer").hide();
    
});






//register
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $('#register').on('click', function () {
        Register();
    });

     
    $('#registrationForm').on('keypress', function (e) {
        if (e.which === 13) {  
            e.preventDefault(); 
            Register();
        }
    });

    function Register() {
        $('.text-danger').text('');

        var formData = {
            name: $('#name').val(),
            userName: $('#userName').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            confirmPassword: $('#confirmPassword').val()
        };

        var valid = true;

        if (!formData.name) {
            $('#nameError').text('The name field is required.');
            valid = false;
        }

        if (!formData.userName) {
            $('#usernameError').text('The userName field is required.');
            valid = false;
        }

        if (!formData.email) {
            $('#emailError').text('The email field is required.');
            valid = false;
        }

        if (!formData.password) {
            $('#passwordError').text('The password field is required.');
            valid = false;
        }

        if (!formData.confirmPassword) {
            $('#confirmPasswordError').text('The confirm password field is required.');
            valid = false;
        }

        if (formData.password !== formData.confirmPassword) {
            $('#confirmPasswordError').text('Passwords do not match');
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
                    }
                }
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    var response = xhr.responseJSON;
                    if (response) {
                        console.error('Registration Failed', response);
                        $('#emailError').text('The email has already been taken');
                    } else {
                        $('#emailError').text('The email has already been taken');
                    }
                } else {
                    $('#emailError').text('The email has already been taken');
                }
            }
        });
    }

    
    //login
    $('#login').on('click', function (e) {
        e.preventDefault();
        Login();
    });

    
    $('#loginForm').on('keypress', function (e) {
        if (e.which === 13) {  
            e.preventDefault(); 
            Login();
        }
    });

    function Login() {
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

                $('meta[name="csrf-token"]').attr('content', response.csrfToken);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': response.csrfToken
                    }
                });

               
                var url = response.userType === '1' ? '/admin' : '/home';                    
                window.history.pushState({}, '', url);

                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (content) {
                        $('body').html(content);

                        var newCsrfToken = $('meta[name="csrf-token"]').attr('content');
    
                        $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': newCsrfToken
                        }
                    });
                    },
                    error: function () {
                        alert('Failed to load content.');
                    }
                });
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
            }
        }
    });
}

    });

     
//logout
$(document).ready(function () {
       
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

     
       $('#logout').on('click', function () {
   
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: '/logout',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function (response) {
            if (response.status) {
                localStorage.removeItem('token');
                window.history.pushState({}, '', '/');

                
                $.ajax({
                    url: '/',
                    type: 'GET',
                    success: function (content) {
                        $('body').html(content);
                    },
                    error: function () {
                        alert('Failed to load content.');
                    }
                });
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


        
       if ((window.location.pathname === '/home' || window.location.pathname === '/profile' || window.location.pathname === '/edit' || window.location.pathname === '/posts' || window.location.pathname === '/admin') && !localStorage.getItem('token')) {
           window.location.href = '/';
       }
   });

 
 //to open profile page  
 $(document).ready(function(){
        $('#profile').click(function() {
             
            $.ajax({
                url: '/profile',
                type: 'GET',
                success: function(response) {
                   
                    $('body').html(response);

                 
                    window.history.pushState(null, null, '/profile');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
    }); 


//to open edit page
$(document).ready(function(){
        $('#edit').click(function() {
             
            $.ajax({
                url: '/edit',
                type: 'GET',
                success: function(response) {
                   
                    $('body').html(response);

                 
                    window.history.pushState(null, null, '/edit');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
    });    
    
 //to open home page  
 $(document).ready(function(){
        $('#home').click(function() {
             
            $.ajax({
                url: '/home',
                type: 'GET',
                success: function(response) {
                   
                    $('body').html(response);

                 
                    window.history.pushState(null, null, '/home');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
    }); 
    
    
    //to open post page 
 $(document).ready(function(){
        $('#posts').click(function() {
             
            $.ajax({
                url: '/posts',
                type: 'GET',
                success: function(response) {
                   
                    $('body').html(response);

                 
                    window.history.pushState(null, null, '/posts');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
    }); 


    //to upload user image 
    $(document).ready(function() {

    $('.uploadphoto').on('click', function(e) {
        if (e.target.tagName !== 'INPUT') { 
            $('#profileImageInput').click();  
        }
    });     

    $('.sharefirstphoto3').on('click', function(e) {
        if (e.target.tagName !== 'INPUT') { 
            $('#profileImageInput').click();  
        }
    });
    
        $('.profileclick1').on('click', function(e) {
        if (e.target.tagName !== 'INPUT') { 
            $('#profileImageInput').click();  
        }
    });
    
    $('.profileclick').on('click', function(e) {
        if (e.target.tagName !== 'INPUT') { 
            $('#profileImageInput').click();  
        }
    });

    
    $('#profileImageInput').on('change', function() {
        var formData = new FormData();
        formData.append('user_image', this.files[0]);

       
        $.ajax({
            url: '/upload-profile-image',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
            },
            success: function(response) {
                if (response.success) {
                                     
                    $('.profileclick1-large img').attr('src', response.image_path);
                    $('#profileclick1-small img').attr('src', response.image_path);
                    $('#ccolumn img').attr('src', response.image_path);
                    $('#hide').hide();
                    $(".profilehiddencontent").fadeOut(150);                   
                   
                } else {
                     
                }
            
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while uploading the image.');
            }
        });
    });
});

//to remove user image 
$('#removePhoto').click(function() {
        
            $.ajax({
                url: '{{ route('remove.image') }}', 
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'  
                },
                success: function(response) {
                    if (response.success) {
                      
                        $('.profileclick1-large img').attr('src', '');  
                        $('#profileclick1-small img').attr('src', '');
                        $('#ccolumn img').attr('src', '');
                    }
                },
                error: function(xhr) {
                    alert('An error occurred while removing the image.');
                }
            });
       
    });


//for user profile
$(document).ready(function() {
    $('.submitbtn').on('click', function(e) {
        e.preventDefault();  

        const bio = $('#bioInput').val();
        const gender = $('#bioInput2').val();
        const accountSuggestions = $('input[name="account_suggestions"]').is(':checked') ? 1 : 0;

        $.ajax({
            url: '/user-profile',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                bio: bio,
                gender: gender,
                account_suggestions: accountSuggestions,
            }),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),  
            },
            success: function(response) {
                if (response.message) {
                   
                    $('.profilesavedcontent').fadeIn().delay(3000).fadeOut();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});



//letter count
document.addEventListener('DOMContentLoaded', function() {
    const bioInput = document.getElementById('bioInput');
    const charCount = document.getElementById('charCount');

    if (bioInput && charCount) {
        bioInput.addEventListener('input', function() {
            const maxLength = 150;
            const currentLength = this.value.length;
            charCount.textContent = `${currentLength}/${maxLength}`;
        });
    }
});


//to store reel
$(document).ready(function() {
    $('.share-button').on('click', function(e) {
        e.preventDefault(); 

        let formData = new FormData();
        formData.append('caption', $('#wordInput').val());

        
        formData.append('hide_like', $('#hide_like').is(':checked') ? 1 : 0);  
        formData.append('hide_comments', $('#hide_comments').is(':checked') ? 1 : 0); 

         
        formData.append('file', $('#reelUploadInput').prop('files')[0]);

        $.ajax({
            url: '/reels',  
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                
                console.log(response);  
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    Object.values(errors).forEach(error => {
                        alert(error[0]);  
                    });
                }
            }
        });
    });
});

 
</script>
</body>