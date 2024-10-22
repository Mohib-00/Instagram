
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

{{--to show story html--}}
 
<script>
    document.getElementById('uploadstory').addEventListener('click', function () {
       document.getElementById('storyUploadInput').click();
   });
   
   document.getElementById('storyUploadInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('previewstoryContainer');
        const storyUploadSection = document.querySelector('.showstorycontainer');  
        const discardstorycontainer = document.getElementById('discardstorycontainer');  
        discardstorycontainer.style.display = 'none';   
   
        previewContainer.innerHTML = '';   
   
        if (file) {
           const fileType = file.type;
           const fileURL = URL.createObjectURL(file);
   
           storyUploadSection.style.display = 'block';  
           const bzContainer = document.getElementById('bzContainer');  
   
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
   
   document.querySelector('.discardstorysvg').addEventListener('click', function () {
       const discardstorycontainer = document.getElementById('discardstorycontainer');
       discardstorycontainer.style.display = 'block';   
   });
   
   document.getElementById('dddiscardstory').addEventListener('click', function () {
       const storyUploadSection = document.querySelector('.showstorycontainer');   
       const discardContainer = document.getElementById('discardcontainer');
       storyUploadSection.style.display = 'none';   
       discardContainer.style.display = 'none';  
   });
   
   document.getElementById('cancelstoryDiscard').addEventListener('click', function () {
       const discardContainer = document.getElementById('discardstorycontainer');
       discardContainer.style.display = 'none';   
   });
</script>



   


{{--to open or close model--}}
<script>
   
    var modal = document.getElementById('myModal');
    var notificationOpenDiv = document.querySelector('.v');
    var notificationCloseIcon = document.querySelector('.notificationssvg');
   
    function openModal() {
        modal.classList.add('modal-open');
    }
   
    function closeModal() {
        modal.classList.remove('modal-open');
    }

    notificationOpenDiv.addEventListener('click', openModal);
 
    notificationCloseIcon.addEventListener('click', closeModal);

    window.addEventListener('click', function(event) {
        if (!modal.contains(event.target) && !notificationOpenDiv.contains(event.target)) {
            closeModal();
        }
    });
</script>

<script>
 let isScrolling = false;  

const setupScrollListeners = () => {
    const reelsContainer = document.querySelector('.secondreelscolumnn');

   
    if (!reelsContainer) return;

    
    const scrollToReel = (nextReelIndex) => {
        const reels = Array.from(reelsContainer.querySelectorAll('.reel'));
        
      
        if (nextReelIndex < 0 || nextReelIndex >= reels.length) return;

        const nextReelTop = reels[nextReelIndex].offsetTop;

      
        reelsContainer.scrollTo({ top: nextReelTop, behavior: 'smooth' });

       
        isScrolling = true;

        
        setTimeout(() => {
            isScrolling = false;
        }, 600);  
    };

 
    const clearListeners = () => {
        reelsContainer.removeEventListener('wheel', handleWheel);
        document.removeEventListener('keydown', handleKeydown);
    };

    const handleWheel = (e) => {
        e.preventDefault();

        
        if (isScrolling) return;

     
        const reels = Array.from(reelsContainer.querySelectorAll('.reel'));
        const reelHeight = reels[0]?.offsetHeight || 0;  

      
        const currentScroll = reelsContainer.scrollTop;

        
        let nextReelIndex;

        if (e.deltaY > 0) {
           
            nextReelIndex = Math.min(Math.floor((currentScroll + reelHeight) / reelHeight), reels.length - 1);
        } else {
           
            nextReelIndex = Math.max(Math.floor((currentScroll - reelHeight) / reelHeight), 0);
        }

        scrollToReel(nextReelIndex);
    };

    const handleKeydown = (e) => {
        
        if (isScrolling) return;

        
        const reels = Array.from(reelsContainer.querySelectorAll('.reel'));
        const reelHeight = reels[0]?.offsetHeight || 0;

       
        const currentScroll = reelsContainer.scrollTop;
        let nextReelIndex;

        if (e.key === 'ArrowDown') {
          
            nextReelIndex = Math.min(Math.floor((currentScroll + reelHeight) / reelHeight), reels.length - 1);
        } else if (e.key === 'ArrowUp') {
           
            nextReelIndex = Math.max(Math.floor((currentScroll - reelHeight) / reelHeight), 0);
        } else {
            return;  
        }

        scrollToReel(nextReelIndex);
    };

 
    clearListeners();

   
    reelsContainer.addEventListener('wheel', handleWheel);
    document.addEventListener('keydown', handleKeydown);
};

 
setupScrollListeners();
 
</script>

  
   
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

 

//to hide comment section
$("#hidecommentsection").click(function() { 
    $("#showcommentsection").hide();  
});


//to show story discard container 
$(".discardstorysvg").click(function() { 
    $("#discardstorycontainer").show();
});

//to hide story discard container 
$("#dddiscardstory").click(function() { 
    $(".showstorycontainer").hide();
    $("#discardstorycontainer").hide();
});

//to hide story discard container 
$("#cancelstoryDiscard").click(function() { 
    $("#discardstorycontainer").hide();  
});

$(".profile-container").click(function() { 
$('#storiesContainer').show();
$('.whenshowstoryhide').hide();
});



$(".opnfrwrdcntnr").click(function() { 
$('#forwardcontainer').show();
});


$("#closeforwardcontainer").click(function() { 
$('#forwardcontainer').hide();
});




$(".flaggggg").click(function() { 
$('.show').show();
$('.hidwhenclkonimg').hide();
});

$(document).ready(function() {
        $('.user-image').on('click', function() {
            $(this).siblings('.tick-mark').toggle();
        });
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


        
       if ((window.location.pathname === '/home' || window.location.pathname === '/message' || window.location.pathname === '/seeallusers' || window.location.pathname === '/profile' || window.location.pathname === '/reelss' || window.location.pathname === '/edit' || window.location.pathname === '/posts' || window.location.pathname === '/admin') && !localStorage.getItem('token')) {
           window.location.href = '/';
       }
   });


    //to open seeallusers page  
 $(document).ready(function(){
        $('#seeallusers').click(function() {
             
            $.ajax({
                url: '/seeallusers',
                type: 'GET',
                success: function(response) {
                   
                    $('body').html(response);
                    window.history.pushState(null, null, '/seeallusers');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
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
                    var newCsrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                    'X-CSRF-TOKEN': newCsrfToken
                    }
                    });

                 
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
                    var newCsrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                    'X-CSRF-TOKEN': newCsrfToken
                    }
                    });

                 
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
                    var newCsrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                    'X-CSRF-TOKEN': newCsrfToken
                    }
                    });

                 
                    window.history.pushState(null, null, '/posts');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
    }); 

//to open reels page 
$(document).ready(function(){
     
    $('#reelss').click(function() {
        $.ajax({
            url: '/reelss',  
            type: 'GET',
            success: function(response) {
                
                $('body').html(response);

              
                var newCsrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': newCsrfToken
                    }
                });

               
                window.history.pushState(null, null, '/reelss');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', status, error);
            }
        });
    });

});


//to open message page 
$(document).ready(function(){
     
     $('#message').click(function() {
         $.ajax({
             url: '/message',  
             type: 'GET',
             success: function(response) {
        
                 window.location.href = '/message';
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
        $('.animation').show();
        $(".showcreatecontainer").hide(); 
        $("#bz").hide();

        $.ajax({
            url: '/reels',  
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('.animation').hide();
                $('.postshared').show().delay(3000).fadeOut();
              
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


$(".commentsvg").click(function() { 

    var reelId = $(this).data('reel-id');  
    $("#showcommentsection").show();
    
    $("#showcommentsection").data('reel-id', reelId);  
    $("#reelIdInput").val(reelId);
    
});



//to save comment on reels
$(document).ready(function() {
    $('#sendCommentButton').click(function(e) {
        e.preventDefault();  

        const reelId = $("#reelIdInput").val();  
        const comment = $('#commentInput').val();

        $.ajax({
            url: '{{ route("comments.store") }}',  
            method: 'POST',
            data: {
                reel_id: reelId,
                comment: comment,
                _token: '{{ csrf_token() }}'  
            },
            success: function(response) {
                console.log("AJAX Response:", response);
                
                if (response.comment && response.comment.user_image && response.comment.user_name && response.comment.comment_text) {
                    const userImage = response.comment.user_image; 
                    const userName = response.comment.user_name;   
                    const commentText = response.comment.comment_text;  

                    
                    const newCommentHtml = createCommentHtml(userName, userImage, commentText);                 
                    $('#commentsSection').append(newCommentHtml);
                    
                    
                    const commentsContainer = $('#commentsSection');
                    commentsContainer.scrollTop(commentsContainer[0].scrollHeight);

                     
                    $('#commentInput').val('');

                    
                    const commentCountElement = $(`.comment-count[data-reel-id="${reelId}"]`);

                   
                    let currentCount = parseInt(commentCountElement.text()) || 0;
                    commentCountElement.text(currentCount + 1);   

                } else {
                    console.error("Missing data in response:", response);
                }
            },
            error: function(xhr) {
                console.error("AJAX Error:", xhr.responseText);
            }
        });
    });
});



//to get comment    
    $(document).ready(function() {
    $('.commentsvg').click(function(e) {
        e.preventDefault();

        const reelId = $("#reelIdInput").val();  

        
        $.ajax({
            url: `/reels/${reelId}/comments`,
            method: 'GET',
            success: function(response) {
                console.log(response);

                 
                const comments = response.comments;

                
                $('#commentsSection').empty();

                
                comments.forEach(function(comment) {
                    const commentHtml = createCommentHtml(
                        comment.user.name, 
                        comment.user.user_image, 
                        comment.comment, 
                        comment.id
                        
                    );
                    $('#commentsSection').append(commentHtml);
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });

}); 

function createCommentHtml(name, userImage, comment, commentId) {
        return `
        <div style="display: flex; align-items: center;" data-comment-id="${commentId}">
               
            <img style="height:40px; width:40px; border-radius:50%;" src="/images/${userImage}" alt="${name}'s image">
                             
                <h6 class="font" style="margin-left:15px; margin-top:50px;">
                    ${name}
                    
                    <svg style="margin-left:20px" aria-label="Notifications" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="16" role="img" viewBox="0 0 24 24" width="16">
                    <title>Notifications</title>
                    <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
                   </svg>

                        <br>
                      <span style="font-weight:lighter">${comment}</span>
                        <br><br>
                    <span style="font-weight:lighter;font-size:14px">
                    4 likes 
                    <span data-comment-id="${commentId}" class="mx-3 reply">Reply</span>
                    <span data-comment-id="${commentId}" class="mx-3 view">View</span>
                    </span>                    
                </h6>                  
                
            </div>

             
        `;
    } 

$(document).ready(function() {
    $(document).on('click', '.reply', function(event) {
        const commentId = $(this).data('comment-id');
        console.log('Clicked Reply Button. Comment ID:', commentId);
        $('#comment_id').val(commentId);
        $(".showreplyinput").show();
        $(".hideinput").hide();
    });


    $('#sendreplyCommentButton').on('click', function(e) {
        e.preventDefault();  
        const commentId = $('#comment_id').val(); 
        const replyComment = $('#replycommentInput').val();  
        console.log('Sending Reply. Comment ID:', commentId, 'Reply Comment:', replyComment);
        $.ajax({
            url: 'reply-comments', 
            method: 'POST',
            data: {
                comment_id: commentId,
                reply_comment: replyComment,
                _token: $('meta[name="csrf-token"]').attr('content'), 
            },
            success: function(response) {
                if (response.success) {
                    $('#replycommentInput').val('');  
                    $('.showreplyinput').hide();  
                    $(".hideinput").show();
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});


    
$(".likesvg").click(function() { 

var reelId = $(this).data('reel-id');  
$("#showlikesection").show();

$("#showlikesection").data('reel-id', reelId);  
$("#reelIdInput").val(reelId);

});
$(document).ready(function() {
    $('.likesvg').click(function(e) {
        e.preventDefault();

        const reelId = $(this).data('reel-id');  
        const userId = "{{ Auth::id() }}";  

        if (!reelId) {
            console.error("Reel ID is undefined or missing.");
            return;  
        }

        console.log("Reel ID:", reelId);  

        
        if ($(this).hasClass('liked')) {
            
            $.ajax({
                url: '{{ route("likes.destroy") }}',   
                method: 'POST',
                data: {
                    reel_id: reelId,
                    user_id: userId,
                    _method: 'DELETE',   
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Like removed successfully');

                       
                        const likeCountElement = $(`.like-count[data-reel-id="${reelId}"]`);
                        let currentCount = parseInt(likeCountElement.text()) || 0;
                        likeCountElement.text(currentCount - 1);  

                         
                        $(`svg[data-reel-id="${reelId}"]`).removeClass('liked');
                    } else {
                        console.error('Error removing like:', response.error);
                    }
                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.responseText);
                }
            });
        } else {
            
            $.ajax({
                url: '{{ route("likes.store") }}',  
                method: 'POST',
                data: {
                    reel_id: reelId,
                    user_id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Like saved successfully');
 
                        const likeCountElement = $(`.like-count[data-reel-id="${reelId}"]`);
                        let currentCount = parseInt(likeCountElement.text()) || 0;
                        likeCountElement.text(currentCount + 1);  

                      
                        $(`svg[data-reel-id="${reelId}"]`).addClass('liked');
                    } else {
                        console.error('Error saving like:', response.error);
                    }
                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.responseText);
                }
            });
        }
    });
});

//to follow user
$(document).ready(function() {

$('.follow-btn').click(function(e) {
    e.preventDefault();

    const followingId = $(this).data('user-id');  
    const button = $(this);   


    if (button.text().trim() === 'Follow') {
        
        $.ajax({
            url: '/follow',   
            method: 'POST',
            data: {
                following_id: followingId,   
                _token: '{{ csrf_token() }}'   
            },
            success: function(response) {
                if (response.success) {
                    button.text('Requested');  
                    
                    console.log(response.message);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    } else if (button.text().trim() === 'Requested') {
         
        $.ajax({
            url: '/unfollow',   
            method: 'POST',
            data: {
                following_id: followingId,   
                _token: '{{ csrf_token() }}'  
            },
            success: function(response) {
                if (response.success) {
                    button.text('Follow');    
                    button.css('background-color', '');   
                    console.log(response.message);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    }
});
});

//to confirm request
$(document).ready(function() {
     
    $(document).on('click', '.confirmhover', function(e) {
        e.preventDefault();

        const requestId = $(this).data('request-id');
        const button = $(this);
        const followingId = $(this).data('user-id');  

       
        if (button.find('p').text().trim() === 'Confirm') {
            $.ajax({
                url: '/confirm-request/' + requestId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        button.find('p').text('Follow Back');  
                        console.log(response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        } else if (button.find('p').text().trim() === 'Follow Back') {
            
            $.ajax({
                url: '/follow',
                method: 'POST',
                data: {
                    following_id: followingId,  
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        button.find('p').text('Requested');  
                        console.log(response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    });
});

//to delete request
$(document).ready(function() {
    $('.deletehover').click(function(e) {
        e.preventDefault();

        const requestId = $(this).data('request-id');   
        const button = $(this);     

        $.ajax({
            url: '/delete-request/' + requestId,    
            method: 'DELETE',                     
            data: {
                _token: '{{ csrf_token() }}'       
            },
            success: function(response) {
                if (response.success) {
                    button.closest('.hoverrequested').remove();    
                    console.log(response.message);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    });
});

//to store story
$(document).ready(function() {
    $('#shareStoryButton').click(function() {
        const storyCaption = $('#storyInput').val();
        const fileInput = $('#storyUploadInput')[0];
        const file = fileInput.files[0];  

        const formData = new FormData();
        formData.append('story_caption', storyCaption);
        
        if (file) {
            formData.append('story_file', file);
        }

        const userId = "{{ Auth::id() }}"; 
        formData.append('user_id', userId);

        $('.showstorycontainer').hide();  
        $.ajax({
            url: '/save-story',
            type: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(data) {
                if (data.success) {
                  
                    $('.showstorycontainer').hide();  
                    $('#previewstoryContainer').empty();  
                    $('#storyInput').val('');  
                } else {
                   
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
                alert('An error occurred while sharing the story.');
            }
        });
    });
});


//to get story
$(document).ready(function() {
    
    $('.profile-container').on('click', function() {
        const userId = $(this).data('user-id');

        $.ajax({
            url: `/user-stories/${userId}`,
            type: 'GET',
            success: function(response) {
                if (response && response.user && response.stories) {
                    const clickedUser = {
                        name: response.user.name || 'Unknown User',
                        image: response.user.user_image || 'default.png'
                    };

                    stories = response.stories;   
                    storiesLength = stories.length;

                    if (storiesLength > 0) {
                        const storiesHtml = storyHTML(stories, clickedUser);
                        $('#storiesContainer').html(storiesHtml);

                        
                        currentStoryIndex = 0;  
                        loadStory(currentStoryIndex);  
                    } else {
                        console.log('No stories available for this user.');
                    }
                } else {
                    console.log('No stories or user data found.');
                }
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: ", error);
            }
        });
    });

    let currentStoryIndex = 0;
    let stories = [];
    let storiesLength = 0;
    let isVideo = false;
    let videoDuration = 0;

   
    function startStoryProgress(storyIndex) {
        if (storyIndex >= storiesLength || !stories[storyIndex]) {
            console.error("Invalid story index or story is undefined.");
            return;
        }

        const story = stories[storyIndex];
        const $progressBarInner = $('.progress-bar-inner');

        
        isVideo = !!story.story_video;

        if (isVideo) {
           
            const $video = document.querySelector('video');
            $video.onloadedmetadata = function() {
                videoDuration = $video.duration * 1000; 
                updateProgressBar(videoDuration, storyIndex);
            };

            $video.play();
        } else if (story.story_image) {
           
            updateProgressBar(6000, storyIndex);
        } else {
            console.error("Story does not have a valid video or image.");
        }
    }

   
    function updateProgressBar(duration, storyIndex) {
        const $progressBarInner = $('.progress-bar-inner');

        $progressBarInner.css('width', '0');
        $progressBarInner.animate({ width: '100%' }, duration, 'linear', function() {
            
            currentStoryIndex++;

            if (currentStoryIndex < storiesLength) {
                
                loadStory(currentStoryIndex);
            } else {
               
                $('#storiesContainer').hide();
                $('.whenshowstoryhide').show();
            }
        });
    }

    
    function loadStory(storyIndex) {
        if (storyIndex >= storiesLength || !stories[storyIndex]) {
            console.error("Invalid story index or story is undefined.");
            return;
        }

        $('#carouselExample').carousel(storyIndex);
        startStoryProgress(storyIndex);
    }

     
    $(document).ready(function() {
        startStoryProgress(currentStoryIndex);

        
        $('#carouselExample').on('slide.bs.carousel', function (e) {
            currentStoryIndex = $(e.relatedTarget).index();

            if (currentStoryIndex < storiesLength) {
                startStoryProgress(currentStoryIndex);
            } else {
                $('#storiesContainer').hide();
                $('.whenshowstoryhide').show();
            }
        });
    });

     
    $(document).on('click', '#storiesContainerhide', function () {
        $('#storiesContainer').hide();
        $('.whenshowstoryhide').show();
    });


    $(document).on('click', '#pausesvg', function () {
        $('#pausesvg').hide();
        $('#playsvg').show();
        
    });

    $(document).on('click', '#playsvg', function () {
 
    $('#pausesvg').show();  
    $('#playsvg').hide();  
    
});

   function timeAgo(createdTime) {
    const now = new Date();
    const storyTime = new Date(createdTime);
    const timeDifference = Math.abs(now - storyTime);
    const seconds = Math.floor(timeDifference / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);

    if (days > 0) {
        return `${days}d`;  
    } else if (hours > 0) {
        return `${hours}h`;  
    } else if (minutes > 0) {
        return `${minutes}m`;  
    } else {
        return 'Just now';  
    }
}


     
function storyHTML(stories, clickedUser) {

return `
<div class="row">
<div class="col-4">
<h1 class="logohomee">Instagram</h1>
</div>

<div class="col-4" style="padding:30px 0px 0px 0px">
<div class="col-9 prgrs" style="background-color:#1f1f1f;height:860px;border-radius:10px;margin-left:25px;width:80%">
<div class="row" style="padding:0px 0px 0px 15px">

<div class="col-12 mt-3">
  <div class="progress-bar">
    <div class="progress-bar-inner"></div>
  </div>
</div>

<div class="col-12">
  <div class="row">

    <div class="col-1">
      <img style="margin-top:20px;margin-left:2px" class="img1" src="/images/${clickedUser.image || 'default.png'}">
    </div>

    <div class="col-1" style="margin-top:20px;margin-left:2px;width:fit-content">
      <p class="font" style="font-weight: bolder">${clickedUser.name}</p>
    </div>

    <div class="col-5">
      <p class="font" style="font-weight: bolder;color:gray;margin-top:20px; ">${timeAgo(stories[0].created_at)}</p>
    </div>

    <div id="pausesvg" class="col-1" style="margin-top:20px;">   
    <svg id="pausesvg" aria-label="Pause" class="x1lliihq x1n2onr6 xq3z1fi" fill="currentColor" height="20" role="img" viewBox="0 0 48 48" width="20"><title>Pause</title><path d="M15 1c-3.3 0-6 1.3-6 3v40c0 1.7 2.7 3 6 3s6-1.3 6-3V4c0-1.7-2.7-3-6-3zm18 0c-3.3 0-6 1.3-6 3v40c0 1.7 2.7 3 6 3s6-1.3 6-3V4c0-1.7-2.7-3-6-3z"></path></svg>
    </div>

    <div id="playsvg" class="col-1" style="margin-top:20px;display:none">        
      <svg id="playsvg"     aria-label="Play" class="x1lliihq x1n2onr6 xq3z1fi" fill="currentColor" height="20" role="img" viewBox="0 0 24 24" width="29">
        <title>Play</title>
        <path d="M5.888 22.5a3.46 3.46 0 0 1-1.721-.46l-.003-.002a3.451 3.451 0 0 1-1.72-2.982V4.943a3.445 3.445 0 0 1 5.163-2.987l12.226 7.059a3.444 3.444 0 0 1-.001 5.967l-12.22 7.056a3.462 3.462 0 0 1-1.724.462Z"></path>
      </svg>
    </div>

    <div class="col-1" style="margin-top:20px;">
      <svg aria-label="Menu" class="x1lliihq x1n2onr6 x1g9anri" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
        <title>Menu</title>
        <circle cx="12" cy="12" r="2.75"></circle>
        <circle cx="19.5" cy="12" r="2.75"></circle>
        <circle cx="4.5" cy="12" r="2.75"></circle>
      </svg>
    </div>

  </div>

  <div class="col-11">
 <div id="carouselExample" class="carousel slide">
                          <div class="carousel-inner">
                              ${stories.map((story, index) => {
                                 
                                  const activeClass = index === 0 ? 'active' : '';
                                   
                                  return `
                                      <div class="carousel-item ${activeClass}">
                                          <div class="col-12" style="height:700px;background:gray;border-radius:5px;">
                                              ${story.story_image ? 
                                                  `<img src="/${story.story_image}" style="width:100%; height:700px; border-radius:5px;" alt="Story Image">` :
                                                  story.story_video ?
                                                  `<video src="/${story.story_video}" style="width:100%; height:700px; border-radius:5px;object-fit:cover" autoplay loop></video>` : ''
                                              }
                                          </div>
                                      </div>
                                  `;
                              }).join('')}
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                          </button>
                      </div>

  </div>

  <div class="col-12">
    <div class="row">

      <div class="col-8">
        <input style="background:transparent;margin-left:8px;margin-top:15px;height:50px;border-radius:20px;color:white" type="text" class="form-control story" placeholder="Reply to..." />
      </div>
      <div class="col-1">
        <svg class="mt-4 mx-3" aria-label="Like" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
          <title>Like</title>
          <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
        </svg>
      </div>
      <div class="col-1">
        <svg class="mt-4 mx-4" aria-label="Direct" class="x1lliihq x1n2onr6 x1g9anri" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
          <title>Direct</title>
          <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line>
          <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
        </svg>
      </div>

    </div>
  </div>

</div>

</div>
</div>
</div>

<div class="col-4">
<svg id="storiesContainerhide" style="margin-left: 90%;margin-top:3%" aria-label="Close" class="x1lliihq x1n2onr6 x9bdzbf" fill="currentColor" height="40" role="img" viewBox="0 0 24 24" width="40">
<title>Close</title>
<path d="M12 10.586l4.243-4.243 1.414 1.414L13.414 12l4.243 4.243-1.414 1.414L12 13.414l-4.243 4.243-1.414-1.414L10.586 12 6.343 7.757l1.414-1.414z"></path>
</svg>
</div>
</div>
`;   

}

});

$(document).ready(function() {
    let selectedUsers = [];

    $('.flaggggg').click(function() {
        const userId = $(this).data('user-id');

        if (selectedUsers.includes(userId)) {
            selectedUsers = selectedUsers.filter(id => id !== userId); 
            $(this).find('.tick-mark').hide();  
        } else {
            selectedUsers.push(userId); 
            $(this).find('.tick-mark').show(); 
        }
    });

    $('.opnfrwrdcntnr').click(function() {
        const reelId = $(this).data('reel-id');
        let reelImage = null;
        let reelVideo = null;

        const reelElement = $(`[data-reel-id=${reelId}]`);
        if (reelElement.find('img').length) {
            reelImage = reelElement.find('img').attr('src');  
        } else if (reelElement.find('video').length) {
            reelVideo = reelElement.find('video source').attr('src');  
        }

        $('#forwardcontainer').show();

        $('.font').click(function() {
            const message = $('input[name="message"]').val();

            
            if (reelImage) {
                reelImage = reelImage.replace(/^.*[\\\/]/, ''); 
                reelImage = `images/${reelImage}`; 
            }
            if (reelVideo) {
                reelVideo = reelVideo.replace(/^.*[\\\/]/, ''); 
                reelVideo = `videos/${reelVideo}`; 
            }

            $.ajax({
                url: "{{ route('forward.reel') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    sender_id: "{{ Auth::id() }}",   
                    receiver_ids: selectedUsers,  
                    message: message,
                    reel_image: reelImage,
                    reel_video: reelVideo,
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('#forwardcontainer').hide();  
                    }
                },
                error: function(xhr) {
                    alert('Error forwarding reel');
                }
            });
        });
    });
});


</script>
</body>
