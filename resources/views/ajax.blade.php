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
     function slowScrollTo(target, duration) {
            const container = document.getElementById('scrollableContainer');
            const start = container.scrollLeft;
            const change = target - start;
            const startTime = performance.now();

            function animateScroll() {
                const currentTime = performance.now() - startTime;
                const progress = Math.min(currentTime / duration, 1); // Calculate progress
                const easeInOutQuad = progress < 0.5 ? 
                    2 * progress * progress : 
                    -1 + (4 - 2 * progress) * progress; // Easing function

                container.scrollLeft = start + change * easeInOutQuad; // Update scroll position

                if (progress < 1) {
                    requestAnimationFrame(animateScroll); // Continue animating
                } else {
                    updateButtonVisibility(); // Update button visibility after scroll
                }
            }

            requestAnimationFrame(animateScroll); // Start the animation
        }

        function updateButtonVisibility() {
            const container = document.getElementById('scrollableContainer');
            const scrollLeftButton = document.getElementById('scrollLeft');
            const scrollRightButton = document.getElementById('scrollRight');

            // Show/hide buttons based on scroll position
            scrollLeftButton.style.display = container.scrollLeft > 0 ? 'inline-block' : 'none';
            scrollRightButton.style.display = container.scrollLeft < container.scrollWidth - container.clientWidth ? 'inline-block' : 'none';

            // Ensure the left button is shown if at the left end and the right button if at the right end
            if (container.scrollLeft <= 0) {
                scrollLeftButton.style.display = 'none';
            }
            if (container.scrollLeft >= container.scrollWidth - container.clientWidth) {
                scrollRightButton.style.display = 'none';
            }
        }

        document.getElementById('scrollLeft').addEventListener('click', function() {
            slowScrollTo(0, 800); // Scroll to the leftmost position over 800 milliseconds
        });

        document.getElementById('scrollRight').addEventListener('click', function() {
            const container = document.getElementById('scrollableContainer');
            const target = container.scrollLeft + container.clientWidth; // Scroll to the right by the width of the container
            slowScrollTo(target, 800); // Scroll to the rightmost position over 800 milliseconds
        });

        // Initialize button visibility on load
        document.addEventListener('DOMContentLoaded', updateButtonVisibility);
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
    function toggleSound() {
        var video = document.getElementById("customVideo");
        var soundOnIcon = document.getElementById("soundon");
        var soundOffIcon = document.getElementById("soundoff");

        if (video) {
            if (video.muted) {
                video.muted = false;
                soundOnIcon.style.display = "block";
                soundOffIcon.style.display = "none";
            } else {
                video.muted = true;
                soundOnIcon.style.display = "none";
                soundOffIcon.style.display = "block";
            }
        }
    }

    window.onload = function() {
        var video = document.getElementById("customVideo");
        var soundOnIcon = document.getElementById("soundon");
        var soundOffIcon = document.getElementById("soundoff");

        if (video) {
            if (video.muted) {
                soundOnIcon.style.display = "none";
                soundOffIcon.style.display = "block";
            } else {
                soundOnIcon.style.display = "block";
                soundOffIcon.style.display = "none";
            }

            soundOnIcon.parentNode.onclick = toggleSound;
            soundOffIcon.parentNode.onclick = toggleSound;
        }
    };
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


        
       if ((window.location.pathname === '/home' || window.location.pathname === '/profile' || window.location.pathname === '/reelss' || window.location.pathname === '/edit' || window.location.pathname === '/posts' || window.location.pathname === '/admin') && !localStorage.getItem('token')) {
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

function createCommentHtml(name, userImage, text, likes) {
        return `
            <div style="display: flex; align-items: center; ">
               
                    <img style="height:40px; width:40px; border-radius:50%;" src="/images/${userImage}" alt="${name}'s image">
                             
                    <h6 class="font" style="margin-left:15px; margin-top:50px;">
                        ${name}
                        <svg style="margin-left:20px" aria-label="Notifications" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="16" role="img" viewBox="0 0 24 24" width="16">
                    <title>Notifications</title>
                    <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
                   </svg>
                        <br>
                        <span style="font-weight:lighter">${text}</span>
                        <br><br>
                         <span style="font-weight:lighter;font-size:14px">4 likes <span class="mx-3">Reply</span></span>
                    </h6>                  
                
            </div>

             
        `;
    } 

    
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


</script>
</body>