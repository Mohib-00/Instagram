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
    const messageInput = document.getElementById('messageInput');
    const voiceClip = document.getElementById('voiceClip');
    const addPhoto = document.getElementById('addPhoto');
    const like = document.getElementById('like');
    const send = document.getElementById('send');

    messageInput.addEventListener('input', function() {
        if (messageInput.value.trim() !== '') {
           
            voiceClip.style.display = 'none';
            addPhoto.style.display = 'none';
            like.style.display = 'none';
            send.style.display = 'inline'; 
        } else {
             
            voiceClip.style.display = 'inline';
            addPhoto.style.display = 'inline';
            like.style.display = 'inline';
            send.style.display = 'none'; 
        }
    });
</script>
 

<script>

    //open logout
$("#openlogout").click(function() { 
    $("#showlogout").fadeIn(150);
});

//close logout
$("#closelogout").click(function() { 
    $("#showlogout").fadeOut(150);
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
 let lastMessageDate = null;  

function Html(conversation, user_id) {
    let messageHtml = '';

    const messageDateObj = new Date(conversation.created_at);
    
    
    const messageDay = messageDateObj.toLocaleDateString('en-US', { weekday: 'short' }); 
    const messageTime = messageDateObj.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });  

     
    const messageDate = `${messageDay} ${messageTime}`;

    
    if (lastMessageDate !== messageDay) {
        
        messageHtml += `
            <div class="col-6" style="align-items: center; margin-top: 20px; margin-left: 45%;">
                <p class="font" style="font-weight: bolder;">${messageDate}</p>
            </div>
        `;
        lastMessageDate = messageDay;  
    }

    
    if (conversation.video) {
        messageHtml += `
            <div class="message">
                <video controls>
                    <source src="/videos/${conversation.video}" type="video/mp4">
                </video>
            </div>
        `;
    } else if (conversation.image) {
        messageHtml += `
            <div class="message">
                <img src="/images/${conversation.image}" alt="Image message">
            </div>
        `;
    } else if (conversation.message) {
        messageHtml += `
            <div class="message-container" style="display: flex; flex-direction: column; width: 100%;">
                <div class="message-content" style="font-size: 17px; background: ${conversation.user_id == user_id ? '#3796f0' : '#262626'}; padding: 10px 10px 5px 10px; border-radius: 20px; color: #dfe3e6; margin: 5px 0; width: fit-content; ${conversation.user_id == user_id ? 'margin-left: auto;' : ''}; letter-spacing: 1px;">
                    <p class="font">${conversation.message}</p>
                </div>
            </div>
        `;
    }

    return messageHtml;
}


 
$(document).ready(function() {
    var user_id = "{{ Auth::user()->id }}";  
    const path = window.location.pathname;  
    const userIdMatch = path.match(/\/message\/(\d+)/);   

     
    if (userIdMatch && userIdMatch[1]) {
        const userId = userIdMatch[1];
        $('#receiverId').val(userId);   
        getMessages(userId);  
        updateUserInfo(userId);   
    }

     
    $('.select-user').on('click', function() {
        const userId = $(this).data('user-id');  
        $('#receiverId').val(userId);   
        getMessages(userId);  
        updateUserInfo(userId); 
        window.history.pushState(null, '', `/message/${userId}`);   
    });

    
    function getMessages(userId) {
        $.ajax({
            url: `/message/${userId}`,  
            type: 'GET',
            success: function(response) {
                const messages = response.messages || [];   
                console.log('Messages received:', messages);  
                $('#chat-container').empty();  

                if (Array.isArray(messages) && messages.length > 0) {
                    messages.forEach(function(conversation) {
                        var messageHtml = Html(conversation, user_id);  
                        $('#chat-container').append(messageHtml);  
                    });
                } else {
                    $('#chat-container').append('<p>No messages found.</p>');  
                }
            },
            error: function(xhr) {
                console.error('Error fetching messages:', xhr);  
                alert('Error fetching messages: ' + xhr.responseJSON.message);  
            }
        });
    }

    
    function updateUserInfo(userId) {
         
        $.ajax({
            url: `/user/${userId}`,   
            type: 'GET',
            success: function(response) {
                const userResponse = response.user;  
                if (userResponse) {
                    $('.chatUserImage').attr('src', userResponse.user_image);   
                    $('.chatUserName').text(userResponse.userName); 
                    $('.chatusername').text(userResponse.name + '.instagram');  
                }
            },
            error: function(xhr) {
                console.error('Error fetching user info:', xhr);   
            }
        });
    }
});

    $(document).ready(function() {
   
    const url = window.location.pathname;
    
    const receiverIdFromUrl = url.split('/').pop();
  
    if (receiverIdFromUrl && !isNaN(receiverIdFromUrl)) {
        $('#receiverId').val(receiverIdFromUrl);
    }
});

$(document).ready(function() {  
    $('#addPhoto').on('click', function() {
        $('#mediaInput').click();  
    });

    $('#mediaInput').on('change', function() {
        const file = this.files[0];  
        sendMessage(file);  
    });
});


$('#send').click(function(e) {
    e.preventDefault();
    sendMessage();
});
 
function sendMessage(file = null) {
    const messageInput = $('#messageInput').val();
    const senderId = "{{ Auth::user()->id }}";
    const receiverId = $('#receiverId').val();
    const userId = "{{ Auth::user()->id }}";

    if (!messageInput && !file) {
        alert('Please enter a message or select a file.');
        return;
    }

    if (!receiverId) {
        alert('Receiver ID not found.');
        return;
    }

     
    const formData = new FormData();
    formData.append('sender_id', senderId);
    formData.append('receiver_id', receiverId);
    formData.append('user_id', userId);
    formData.append('message', messageInput || '');   
    if (file) {
        formData.append('media', file);   
    }

    $.ajax({
        url: '/send-message',
        type: 'POST',
        processData: false,   
        contentType: false,   
        data: formData,
        success: function(response) {
            if (response.success) {
                $('#messageInput').val('');  
                $('#mediaInput').val('');   
            }
        },
        error: function(xhr) {
            alert('Error sending message: ' + xhr.responseJSON.message);
        }
    });
}

 

</script>
</body>