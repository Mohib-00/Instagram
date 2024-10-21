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
    if (conversation.reel_image) {
        messageHtml += `
            <div id="message-${conversation.id}" class="message-content" style="${conversation.user_id == user_id ? 'margin-left: 83%;width:15%;' : ''};">         
                <div class="col-12" style="height:50px">
                    <strong>${conversation.username || 'Unknown User'}</strong>
                </div>  
                <div class="col-12">
                    <img style="${conversation.user_id == user_id ? 'object-fit:cover;height:250px;width:105%;background:white; ' : 'object-fit:cover;height:250px;width:15%;background:white; '};" src="{{ asset('${conversation.reel_image.trim()}') }}">
                </div>
                <div class="col-12" style="height:50px">
                    <svg class="mt-3" aria-label="Clip" class="x1lliihq x1n2onr6 x9bdzbf" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Clip</title><path d="m12.823 1 2.974 5.002h-5.58l-2.65-4.971c.206-.013.419-.022.642-.027L8.55 1Zm2.327 0h.298c3.06 0 4.468.754 5.64 1.887a6.007 6.007 0 0 1 1.596 2.82l.07.295h-4.629L15.15 1Zm-9.667.377L7.95 6.002H1.244a6.01 6.01 0 0 1 3.942-4.53Zm9.735 12.834-4.545-2.624a.909.909 0 0 0-1.356.668l-.008.12v5.248a.91.91 0 0 0 1.255.84l.109-.053 4.545-2.624a.909.909 0 0 0 .1-1.507l-.1-.068-4.545-2.624Zm-14.2-6.209h21.964l.015.36.003.189v6.899c0 3.061-.755 4.469-1.888 5.64-1.151 1.114-2.5 1.856-5.33 1.909l-.334.003H8.551c-3.06 0-4.467-.755-5.64-1.889-1.114-1.15-1.854-2.498-1.908-5.33L1 15.45V8.551l.003-.189Z" fill-rule="evenodd"></path></svg>
                </div>
             </div>  
        `;
    }
    
    
    if (conversation.reel_video) {
        messageHtml += `
            <div id="message-${conversation.id}" class="message-content" style="${conversation.user_id == user_id ? 'margin-left: 83%;width:15%;' : ''};">           
                <div class="col-12" style="height:50px">
                    <strong>${conversation.username || 'Unknown User'}</strong>
                </div>  
                <div class="col-12">
                <video controls style="${conversation.user_id == user_id ? 'width:110%;height:300px;object-fit:cover; ' : 'width:16%;height:300px;object-fit:cover '}" autoplay muted loop>
                    <source src="{{ asset('${conversation.reel_video.trim()}') }}">
                </video>                
                </div>
                <div class="col-12" style="height:50px">
                    <svg class="mt-3" aria-label="Clip" class="x1lliihq x1n2onr6 x9bdzbf" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Clip</title><path d="m12.823 1 2.974 5.002h-5.58l-2.65-4.971c.206-.013.419-.022.642-.027L8.55 1Zm2.327 0h.298c3.06 0 4.468.754 5.64 1.887a6.007 6.007 0 0 1 1.596 2.82l.07.295h-4.629L15.15 1Zm-9.667.377L7.95 6.002H1.244a6.01 6.01 0 0 1 3.942-4.53Zm9.735 12.834-4.545-2.624a.909.909 0 0 0-1.356.668l-.008.12v5.248a.91.91 0 0 0 1.255.84l.109-.053 4.545-2.624a.909.909 0 0 0 .1-1.507l-.1-.068-4.545-2.624Zm-14.2-6.209h21.964l.015.36.003.189v6.899c0 3.061-.755 4.469-1.888 5.64-1.151 1.114-2.5 1.856-5.33 1.909l-.334.003H8.551c-3.06 0-4.467-.755-5.64-1.889-1.114-1.15-1.854-2.498-1.908-5.33L1 15.45V8.551l.003-.189Z" fill-rule="evenodd"></path></svg>
                </div>
                
            </div>  
        `;
    }

    
    if (conversation.video) {
        
        messageHtml += `
        <div id="message-${conversation.id}" class="message-content" style="${conversation.user_id == user_id ? 'margin-left: 73%;width:15%;' : ''};">           
          <video controls style="${conversation.user_id == user_id ? 'width:180%;height:170px;object-fit:cover;border-radius:20px' : 'width:28.5%;height:170px;object-fit:cover;border-radius:20px'}"  autoplay muted loop>
             <source src="{{ asset('${conversation.video.trim()}') }} ">
           </video>
        </div>  
        `;

    } else if (conversation.image) {

        messageHtml += `
        <div id="message-${conversation.id}" class="message-content" style="${conversation.user_id == user_id ? 'margin-left: 83.5%;width:15%;' : ''};">
            <img style="${conversation.user_id == user_id ? 'object-fit:cover;height:300px;width:110%;background:white;border-radius:20px' : 'object-fit:cover;height:300px;width:17%;background:white;border-radius:20px'};" src="{{ asset('${conversation.image.trim()}') }}">
        </div>
        `;

    } else if (conversation.message) {

        messageHtml += `
        <div id="message-${conversation.id}" class="message-container" style="display: flex; flex-direction: column; width: 100%;">
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

    
    function scrollToBottom() {
    const chatContainer = $('#chat-container'); 
    chatContainer.scrollTop(chatContainer[0].scrollHeight);  
}

    function getMessages(userId) {
        $.ajax({
            url: `/message/${userId}`,  
            type: 'GET',
            success: function(response) {
                scrollToBottom();
                const messages = response.messages || [];   
                console.log('Messages received:', messages);  
                $('#chat-container').empty();  

                if (Array.isArray(messages) && messages.length > 0) {
                    messages.forEach(function(conversation) {
                        var messageHtml = Html(conversation, user_id);  
                        $('#chat-container').append(messageHtml);  
                    });
                } else {
                      
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
                    $('.chatUserNamee').text(userResponse.userName);
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

function scrollToBottomm() {
        var chatContainer = $('#chat-container');
        chatContainer.scrollTop(chatContainer[0].scrollHeight);
    }
 
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
            scrollToBottomm();
        },
        error: function(xhr) {
            alert('Error sending message: ' + xhr.responseJSON.message);
        }
    });
}



var lastCheckedTimestamp = null;
$(document).ready(function() {
     

    getLastCheckedTimestamp(false);

    function scrollToBottom() {
        var chatContainer = $('#chat-container');
        chatContainer.scrollTop(chatContainer[0].scrollHeight);
    }

     
var fetchConversationsPollingFlag = true;  
var loadingMessages = false;   

function getLastCheckedTimestamp() {
    return localStorage.getItem('lastCheckedTimestamp');
}

function fetchConversations() {
    if (!fetchConversationsPollingFlag || loadingMessages) {
        return;  
    }

    fetchConversationsPollingFlag = false;  
    loadingMessages = true;   

    var lastCheckedTimestamp = getLastCheckedTimestamp() || 0;
    var receiver_id = $('[name="receiver_id"]').val();  
    var user_id = "{{ Auth::user()->id }}";  
    var csrfToken = $('meta[name="csrf-token"]').attr('content');  

    $.ajax({
        url: "{{ route('getConversations') }}", 
        method: "get",  
        data: {
            lastCheckedUniqueTimestamp: lastCheckedTimestamp,
            receiver_id: receiver_id, 
            _token: csrfToken,  
        },
        success: function(response) {
            if (response && Array.isArray(response.conversations)) {
                var conversations = response.conversations;
                var updatedConversations = response.updatedConversations;

                
                if (lastCheckedTimestamp === 0) {
                    $('#chat-container').empty();
                }

              
                if (conversations.length > 0 || updatedConversations.length > 0) {
                    conversations.forEach(function(conversation) {
                        var messageHtml = Html(conversation, user_id);
                        $('#chat-container').append(messageHtml);
                        lastCheckedTimestamp = conversation.uniquetimestamp;
                    });

                  
                    if (updatedConversations.length > 0) {
                        updatedConversations.forEach(function(updatedConversation) {
                            var messageHtml = Html(updatedConversation, user_id);
                            $('#chat-container > #message-' + updatedConversation.id).replaceWith(messageHtml);

                            if (lastCheckedTimestamp < updatedConversation.updatedtimestamp) {
                                lastCheckedTimestamp = updatedConversation.updatedtimestamp;
                            }
                        });
                    }

                   
                    localStorage.setItem('lastCheckedTimestamp', lastCheckedTimestamp);
                    scrollToBottom();
                }
            }

            loadingMessages = false;  
            fetchConversationsPollingFlag = true;  
        },
        error: function(xhr, status, error) {
            console.error('Error fetching conversations:', error);
            loadingMessages = false;
            fetchConversationsPollingFlag = true;  
        }
    });
}

 
setTimeout(fetchConversations, 1000);   

 
setInterval(function() {
    if (fetchConversationsPollingFlag && !loadingMessages) {
        fetchConversations();
    }
}, 2000);  

    
});
 


</script>
</body>