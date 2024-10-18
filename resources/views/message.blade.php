<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font family links --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <style>
        body, html {
            color: white;
        }

        .srchdiv:hover {
            color: #007bff;  
            transition: color 0.3s ease;  
        }
        button {
            cursor: pointer;
            background-color: #f0f0f0;
            border: none;
            border-radius: 50%;
            padding: 5px 8px;
            font-size: 10px;
        }

        button:hover {
            background-color: #ddd;
        }


       
        .note-container {
            position: relative;
            display: inline-block;
        }
        .flag {
            width: 100px;
            height: 100px;
            border-radius: 50%;
           
            background-size: cover;
            margin-bottom: 5px;
        }
        .note-text {
            color:white;
            font-size: 14px;
            margin-left:15px
        }
        .note-bubble {
            position: absolute;
            top: -30px;
            left: 7px;
            background-color: #363636;
            color: white;
            padding: 15px;
            border-radius: 15px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .note-arrow {
            margin-left: 10px;
            font-size: 10px;
        }


        .roww {
            display: flex;
            align-items: center;
           
            padding: 10px;
            border-radius: 5px;
            color: white;
        }

        .roww:hover{
            background-color: #2d2d2d;
        }
        .profile-img {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            
            background-size: cover;
            margin-right: 10px;
        }
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            
            background-size: cover;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            flex-direction: column;
        }
        .user-info h5 {
           
            font-size: 16px;
        }
        .reply-info {
            font-size: 12px;
            color: #cccccc;
        }
        .reply-info span {
            margin-left: 5px;
        }

        .profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            
            background-size: cover;
            margin-right: 10px;
        }

        .profile-imagee {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            
            background-size: cover;
            margin-right: 10px;
        }

    </style>

    @include('css')

</head>
<body>

   <div class="container-fluid " style="background-color:black;height:922px">
     <div class="row">

        <div class="col-1" style="border-right: 1px solid #262626;width:5%;height:918px">
            <div class="row" style="padding:30px 0px 0px 10px">

                <div class="col-10 padng" id="home">
                    <svg aria-label="Instagram" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Instagram</title><path d="M12 2.982c2.937 0 3.285.011 4.445.064a6.087 6.087 0 0 1 2.042.379 3.408 3.408 0 0 1 1.265.823 3.408 3.408 0 0 1 .823 1.265 6.087 6.087 0 0 1 .379 2.042c.053 1.16.064 1.508.064 4.445s-.011 3.285-.064 4.445a6.087 6.087 0 0 1-.379 2.042 3.643 3.643 0 0 1-2.088 2.088 6.087 6.087 0 0 1-2.042.379c-1.16.053-1.508.064-4.445.064s-3.285-.011-4.445-.064a6.087 6.087 0 0 1-2.043-.379 3.408 3.408 0 0 1-1.264-.823 3.408 3.408 0 0 1-.823-1.265 6.087 6.087 0 0 1-.379-2.042c-.053-1.16-.064-1.508-.064-4.445s.011-3.285.064-4.445a6.087 6.087 0 0 1 .379-2.042 3.408 3.408 0 0 1 .823-1.265 3.408 3.408 0 0 1 1.265-.823 6.087 6.087 0 0 1 2.042-.379c1.16-.053 1.508-.064 4.445-.064M12 1c-2.987 0-3.362.013-4.535.066a8.074 8.074 0 0 0-2.67.511 5.392 5.392 0 0 0-1.949 1.27 5.392 5.392 0 0 0-1.269 1.948 8.074 8.074 0 0 0-.51 2.67C1.012 8.638 1 9.013 1 12s.013 3.362.066 4.535a8.074 8.074 0 0 0 .511 2.67 5.392 5.392 0 0 0 1.27 1.949 5.392 5.392 0 0 0 1.948 1.269 8.074 8.074 0 0 0 2.67.51C8.638 22.988 9.013 23 12 23s3.362-.013 4.535-.066a8.074 8.074 0 0 0 2.67-.511 5.625 5.625 0 0 0 3.218-3.218 8.074 8.074 0 0 0 .51-2.67C22.988 15.362 23 14.987 23 12s-.013-3.362-.066-4.535a8.074 8.074 0 0 0-.511-2.67 5.392 5.392 0 0 0-1.27-1.949 5.392 5.392 0 0 0-1.948-1.269 8.074 8.074 0 0 0-2.67-.51C15.362 1.012 14.987 1 12 1Zm0 5.351A5.649 5.649 0 1 0 17.649 12 5.649 5.649 0 0 0 12 6.351Zm0 9.316A3.667 3.667 0 1 1 15.667 12 3.667 3.667 0 0 1 12 15.667Zm5.872-10.859a1.32 1.32 0 1 0 1.32 1.32 1.32 1.32 0 0 0-1.32-1.32Z"></path></svg>
                </div>

                <div class="col-10 padng" style="margin-top:35px">
                    <svg aria-label="Home" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Home</title><path d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <svg  id="searchSvg" aria-label="Search" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                        <title>Search</title>
                        <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22" y1="16.511" y2="22"></line>
                    </svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <svg   id="exploreSvg" aria-label="Explore" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                        <title>Explore</title>
                        <polygon fill="none" points="13.941 13.953 7.581 16.424 10.06 10.056 16.42 7.585 13.941 13.953" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                        <circle cx="12.001" cy="12.005" fill="none" r="10.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                    </svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <svg   aria-label="Reels" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Reels</title><line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="2.049" x2="21.95" y1="7.002" y2="7.002"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="13.504" x2="16.362" y1="2.001" y2="7.002"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="7.207" x2="10.002" y1="2.11" y2="7.002"></line><path d="M2 12.001v3.449c0 2.849.698 4.006 1.606 4.945.94.908 2.098 1.607 4.946 1.607h6.896c2.848 0 4.006-.699 4.946-1.607.908-.939 1.606-2.096 1.606-4.945V8.552c0-2.848-.698-4.006-1.606-4.945C19.454 2.699 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.546 2 5.704 2 8.552Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><path d="M9.763 17.664a.908.908 0 0 1-.454-.787V11.63a.909.909 0 0 1 1.364-.788l4.545 2.624a.909.909 0 0 1 0 1.575l-4.545 2.624a.91.91 0 0 1-.91 0Z" fill-rule="evenodd"></path></svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <svg aria-label="Messenger" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Messenger</title><path d="M12.003 1.131a10.487 10.487 0 0 0-10.87 10.57 10.194 10.194 0 0 0 3.412 7.771l.054 1.78a1.67 1.67 0 0 0 2.342 1.476l1.935-.872a11.767 11.767 0 0 0 3.127.416 10.488 10.488 0 0 0 10.87-10.57 10.487 10.487 0 0 0-10.87-10.57Zm5.786 9.001-2.566 3.983a1.577 1.577 0 0 1-2.278.42l-2.452-1.84a.63.63 0 0 0-.759.002l-2.556 2.049a.659.659 0 0 1-.96-.874L8.783 9.89a1.576 1.576 0 0 1 2.277-.42l2.453 1.84a.63.63 0 0 0 .758-.003l2.556-2.05a.659.659 0 0 1 .961.874Z"></path></svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <svg aria-label="Notifications" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Notifications</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <svg  aria-label="New post" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>New post</title><path d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455" y1="12.001" y2="12.001"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003" y1="6.545" y2="17.455"></line></svg>
                </div>

                <div class="col-10 padng" style="margin-top:5px">
                    <img class="img1" src="{{ asset('images/' . auth()->user()->user_image) }}">
                </div>

                <div class="col-10 padng" style="margin-top:107px" id="closelogout">
                    <svg  aria-label="" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 192 192" width="30"><title></title><path class="xcslo1z" d="M141.537 88.9883C140.71 88.5919 139.87 88.2104 139.019 87.8451C137.537 60.5382 122.616 44.905 97.5619 44.745C97.4484 44.7443 97.3355 44.7443 97.222 44.7443C82.2364 44.7443 69.7731 51.1409 62.102 62.7807L75.881 72.2328C81.6116 63.5383 90.6052 61.6848 97.2286 61.6848C97.3051 61.6848 97.3819 61.6848 97.4576 61.6855C105.707 61.7381 111.932 64.1366 115.961 68.814C118.893 72.2193 120.854 76.925 121.825 82.8638C114.511 81.6207 106.601 81.2385 98.145 81.7233C74.3247 83.0954 59.0111 96.9879 60.0396 116.292C60.5615 126.084 65.4397 134.508 73.775 140.011C80.8224 144.663 89.899 146.938 99.3323 146.423C111.79 145.74 121.563 140.987 128.381 132.296C133.559 125.696 136.834 117.143 138.28 106.366C144.217 109.949 148.617 114.664 151.047 120.332C155.179 129.967 155.42 145.8 142.501 158.708C131.182 170.016 117.576 174.908 97.0135 175.059C74.2042 174.89 56.9538 167.575 45.7381 153.317C35.2355 139.966 29.8077 120.682 29.6052 96C29.8077 71.3178 35.2355 52.0336 45.7381 38.6827C56.9538 24.4249 74.2039 17.11 97.0132 16.9405C119.988 17.1113 137.539 24.4614 149.184 38.788C154.894 45.8136 159.199 54.6488 162.037 64.9503L178.184 60.6422C174.744 47.9622 169.331 37.0357 161.965 27.974C147.036 9.60668 125.202 0.195148 97.0695 0H96.9569C68.8816 0.19447 47.2921 9.6418 32.7883 28.0793C19.8819 44.4864 13.2244 67.3157 13.0007 95.9325L13 96L13.0007 96.0675C13.2244 124.684 19.8819 147.514 32.7883 163.921C47.2921 182.358 68.8816 191.806 96.9569 192H97.0695C122.03 191.827 139.624 185.292 154.118 170.811C173.081 151.866 172.51 128.119 166.26 113.541C161.776 103.087 153.227 94.5962 141.537 88.9883ZM98.4405 129.507C88.0005 130.095 77.1544 125.409 76.6196 115.372C76.2232 107.93 81.9158 99.626 99.0812 98.6368C101.047 98.5234 102.976 98.468 104.871 98.468C111.106 98.468 116.939 99.0737 122.242 100.233C120.264 124.935 108.662 128.946 98.4405 129.507Z"></path></svg>  
                </div>

                <div class="col-10 padng" style="margin-top:5px" id="openlogout">
                    <svg   aria-label="Settings" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Settings</title><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="3" x2="21" y1="4" y2="4"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="3" x2="21" y1="12" y2="12"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="3" x2="21" y1="20" y2="20"></line></svg>
                </div>

            </div>
        </div>

        <div class="mx-2" id="fixed-width-div" style=" border-right:8px solid #424242">
            <div class="row">

                <div class="col-10" style="margin-top:45px">
                    <h4 class="font">{{ Auth::user()->name }}</h4>
                </div>

                <div class="col-1" style="margin-top:45px">
                    <svg aria-label="New message" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>New message</title><path d="M12.202 3.203H5.25a3 3 0 0 0-3 3V18.75a3 3 0 0 0 3 3h12.547a3 3 0 0 0 3-3v-6.952" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><path d="M10.002 17.226H6.774v-3.228L18.607 2.165a1.417 1.417 0 0 1 2.004 0l1.224 1.225a1.417 1.417 0 0 1 0 2.004Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="16.848" x2="20.076" y1="3.924" y2="7.153"></line></svg>
                </div>

                <div class="col-12" style="margin-top:65px">
                    <div class="note-container">
                        <div class="note-bubble font">
                            Note...
                            <span class="note-arrow">&#x25BC;</span>
                        </div>
                        <div class="flag">
                            <img class="flag"   src="{{ asset('images/' . auth()->user()->user_image) }}">
                        </div>
                        <div class="note-text font">Your note</div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                <div class="row">

                <div class="col-9">
                    <h5 class="font" style="font-weight:bolder">Messages</h5>
                </div>

                <div class="col-1">
                    <h6 class="font" style="font-weight:bolder;color:gray">Requests</h6>
                </div>

                </div>
                </div>


                <div class="col-12 scrollbar" style="overflow: auto;height:550px">

                    @foreach ($followingUsers as $user)
                    <div id="selected-user-name" class="row roww mt-3 select-user" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" data-user-userName="{{ $user->userName }}" data-user-image="{{ $user->userName }}">
                        <div class="col-2">
                            <div class="profile-img">
                                <img class="profile-img" src="{{ asset('images/' . $user->user_image) }}">
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="user-info">
                                <h5 class="font">{{ $user->userName }}</h5>
                                <div class="reply-info font">
                                    You: Reply test
                                    <span>· 2m</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                 
                <input type="hidden" id="receiverId" name="receiver_id" value="">
                
                 
                
                
                   
                </div>

            </div>
        </div>

        <div class="col-8" style="display: none">
            <div class="row" style="margin-top:25%;margin-left:40%">

                <h5>
                <svg style="margin-left:50px" aria-label="" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="106" role="img" viewBox="0 0 96 96" width="106"><title></title><path d="M48 0C21.532 0 0 21.533 0 48s21.532 48 48 48 48-21.532 48-48S74.468 0 48 0Zm0 94C22.636 94 2 73.364 2 48S22.636 2 48 2s46 20.636 46 46-20.636 46-46 46Zm12.227-53.284-7.257 5.507c-.49.37-1.166.375-1.661.005l-5.373-4.031a3.453 3.453 0 0 0-4.989.921l-6.756 10.718c-.653 1.027.615 2.189 1.582 1.453l7.257-5.507a1.382 1.382 0 0 1 1.661-.005l5.373 4.031a3.453 3.453 0 0 0 4.989-.92l6.756-10.719c.653-1.027-.615-2.189-1.582-1.453ZM48 25c-12.958 0-23 9.492-23 22.31 0 6.706 2.749 12.5 7.224 16.503.375.338.602.806.62 1.31l.125 4.091a1.845 1.845 0 0 0 2.582 1.629l4.563-2.013a1.844 1.844 0 0 1 1.227-.093c2.096.579 4.331.884 6.659.884 12.958 0 23-9.491 23-22.31S60.958 25 48 25Zm0 42.621c-2.114 0-4.175-.273-6.133-.813a3.834 3.834 0 0 0-2.56.192l-4.346 1.917-.118-3.867a3.833 3.833 0 0 0-1.286-2.727C29.33 58.54 27 53.209 27 47.31 27 35.73 36.028 27 48 27s21 8.73 21 20.31-9.028 20.31-21 20.31Z"></path></svg>
                </h5>
                <h5 style="margin-left:30px" class="font">Your Messages</h5>
                <p class="font" style="color:gray">Send a message to start a chat</p>
                <div style="background:#0093f5;width:fit-content;height:30px;border-radius:10px;padding:10px 25px 35px 25px;margin-left:40px">
                    <span class="font">Send message</span>
                </div>
            </div>
        </div>


        <div id="responsive-div">
            <div class="row mt-3">

                <div class="col-1 profile-image">
                    <img class="profile-image chatUserImage"    >
                </div>
                <div class="col-9 font">
                    <h5 style="font-weight: bolder;margin-top:15px" class="chatUserNamee"></h5>
                </div>

                <div class="col-2" style="position: fixed; margin-left:1130px;">
                    <div class="row" >

                        <div class="col-2 mt-3" >
                            <svg aria-label="Audio call" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Audio call</title><path d="M18.227 22.912c-4.913 0-9.286-3.627-11.486-5.828C4.486 14.83.731 10.291.921 5.231a3.289 3.289 0 0 1 .908-2.138 17.116 17.116 0 0 1 1.865-1.71 2.307 2.307 0 0 1 3.004.174 13.283 13.283 0 0 1 3.658 5.325 2.551 2.551 0 0 1-.19 1.941l-.455.853a.463.463 0 0 0-.024.387 7.57 7.57 0 0 0 4.077 4.075.455.455 0 0 0 .386-.024l.853-.455a2.548 2.548 0 0 1 1.94-.19 13.278 13.278 0 0 1 5.326 3.658 2.309 2.309 0 0 1 .174 3.003 17.319 17.319 0 0 1-1.71 1.866 3.29 3.29 0 0 1-2.138.91 10.27 10.27 0 0 1-.368.006Zm-13.144-20a.27.27 0 0 0-.167.054A15.121 15.121 0 0 0 3.28 4.47a1.289 1.289 0 0 0-.36.836c-.161 4.301 3.21 8.34 5.235 10.364s6.06 5.403 10.366 5.236a1.284 1.284 0 0 0 .835-.36 15.217 15.217 0 0 0 1.504-1.637.324.324 0 0 0-.047-.41 11.62 11.62 0 0 0-4.457-3.119.545.545 0 0 0-.411.044l-.854.455a2.452 2.452 0 0 1-2.071.116 9.571 9.571 0 0 1-5.189-5.188 2.457 2.457 0 0 1 .115-2.071l.456-.855a.544.544 0 0 0 .043-.41 11.629 11.629 0 0 0-3.118-4.458.36.36 0 0 0-.244-.1Z"></path></svg>
                        </div>
                        <div class="col-2 mt-3 "  >
                            <svg   aria-label="Video call" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Video call</title><rect fill="none" height="18" rx="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="16.999" x="1" y="3"></rect><path d="m17.999 9.146 2.495-2.256A1.5 1.5 0 0 1 23 8.003v7.994a1.5 1.5 0 0 1-2.506 1.113L18 14.854" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>                        
                        </div>
                        <div class="col-2 mt-3" >
                            <svg   aria-label="Conversation information" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Conversation information</title><circle cx="12.001" cy="12.005" fill="none" r="10.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle><circle cx="11.819" cy="7.709" r="1.25"></circle><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="10.569" x2="13.432" y1="16.777" y2="16.777"></line><polyline fill="none" points="10.569 11.05 12 11.05 12 16.777" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline></svg>
                        </div>

                    </div>
                </div>

                

            </div>
            <hr style="border-color: 1px solid #262626;margin-left:-15px;width:106%">

            <div  class="col-12 scrollbar" style=" overflow:auto;height:680px;width:105%">
                <div class="col-1 profile-imagee mt-5" style="margin-left:45%;">
                    <img class="profile-imagee chatUserImage"  >
                </div>
                <div class="col-5 mt-3" style="width:fit-content;margin-left:45%;">
                    <h5 class="font chatUserName"  ></h5>
                    <h6 class="font chatusername"  ></h6>
                </div>
                <div class="col-1 mt-4" style="background:#363636;width:fit-content;height:30px;border-radius:10px;padding:10px 25px 35px 25px;margin-left:45%;">
                    <span class="font">View profile</span>
                </div>
                <div class="col-6" style="align-items: center;margin-top:250px;margin-left:47%;">
                    <p class="font" style="font-weight:bolder"></p>
                </div>  
                
                <div id="chat-container" class="col-12">
                    
                </div>
            </div>

            
            <div class="col-12 mt-5" style="width:103%">
                <form>
                <div  style="display: flex; align-items: center; justify-content: space-between; background-color: #000; padding: 14px; border-radius: 25px; width: 101%; border: 1px solid #fff;">
                   
                    <div style="display: flex; align-items: center; width: 100%;">
                       
                        <svg aria-label="Choose an emoji" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Choose an emoji</title><path d="M15.83 10.997a1.167 1.167 0 1 0 1.167 1.167 1.167 1.167 0 0 0-1.167-1.167Zm-6.5 1.167a1.167 1.167 0 1 0-1.166 1.167 1.167 1.167 0 0 0 1.166-1.167Zm5.163 3.24a3.406 3.406 0 0 1-4.982.007 1 1 0 1 0-1.557 1.256 5.397 5.397 0 0 0 8.09 0 1 1 0 0 0-1.55-1.263ZM12 .503a11.5 11.5 0 1 0 11.5 11.5A11.513 11.513 0 0 0 12 .503Zm0 21a9.5 9.5 0 1 1 9.5-9.5 9.51 9.51 0 0 1-9.5 9.5Z"></path></svg>
                        
                        <input id="messageInput" type="text" name="message" placeholder="Message..." style="background: none; border: none; outline: none; color: white; margin-left: 10px; font-size: 16px;">
                    </div>
            
                    
                    <div style="display: flex; align-items: center;">
                        <span id="voiceClip" style="color: white; font-size: 20px; margin: 0 10px; cursor: pointer;">
                            <svg aria-label="Voice Clip" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Voice Clip</title><path d="M19.5 10.671v.897a7.5 7.5 0 0 1-15 0v-.897" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19.068" y2="22"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.706" x2="15.104" y1="22" y2="22"></line><path d="M12 15.745a4 4 0 0 1-4-4V6a4 4 0 0 1 8 0v5.745a4 4 0 0 1-4 4Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </span>
                        <span id="addPhoto" style="color: white; font-size: 20px; margin: 0 10px; cursor: pointer;">
                            <svg aria-label="Add Photo or Video" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Add Photo or Video</title><path d="M6.549 5.013A1.557 1.557 0 1 0 8.106 6.57a1.557 1.557 0 0 0-1.557-1.557Z" fill-rule="evenodd"></path><path d="m2 18.605 3.901-3.9a.908.908 0 0 1 1.284 0l2.807 2.806a.908.908 0 0 0 1.283 0l5.534-5.534a.908.908 0 0 1 1.283 0l3.905 3.905" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path><path d="M18.44 2.004A3.56 3.56 0 0 1 22 5.564h0v12.873a3.56 3.56 0 0 1-3.56 3.56H5.568a3.56 3.56 0 0 1-3.56-3.56V5.563a3.56 3.56 0 0 1 3.56-3.56Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </span>
                        <input type="file" id="mediaInput" style="display: none;" accept="image/*,video/*">
                        <span id="like" style="color: white; font-size: 20px; margin: 0 10px; cursor: pointer;">
                            <svg aria-label="Like" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                        </span>
                        <span id="send" style="color: white; font-size: 20px; margin: 0 10px; cursor: pointer;display:none">
                            <span id="send">Send</span>
                         </span>
                         
                    </div>
                </div>
                </form>
            </div>
            
            
             

        </div>


        </div>
     </div>

     @include('more')
    @include('ajaxmessage')

</body>
</html>
