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
    </style>

    @include('css')

</head>
<body>

    <div class="container-fluid" style="background-color:black;height:922px">
        <div class="row">
          
            @include('sidebar')

            <div class="col-12 secondcolumn scrollbar" style="overflow: auto">
                <div class="row" style="padding:30px 0px 0px 180px">

                    <div class="col-6" style="width:55.5%">
 
                            
                                    <div class="col-10">
                                     
{{--<div class="button" style="position: absolute;margin-top:20px">
    <button id="scrollLeft" style=" color:grey">&#9664;</button>
    <button id="scrollRight" style=" color:grey">&#9654;</button>
</div>--}}

<div id="uploadstory" style="position: absolute; margin-left: 45px; margin-top: 50px; height: 35px; width: 35px; background: blue; border-radius: 50%; border: 4px solid black; cursor: pointer;">
    <svg style="color: white; font-weight: bolder; margin-top: -2px; margin-left: -2px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg>
</div>

<input type="file" id="storyFileInput" accept="image/*,video/*" style="display: none;">

                                    <div class="row flex-nowrap scrollbarstory" id="scrollableContainer" style="overflow-x: auto;">
                                       

                                            <div class="col-1 mx-2" style="height:80px;width:80px;border-radius:50%;border:1px solid grey;padding:4px">
                                                <div class="col-6" style="height:70px;width:70px;border-radius:50%;background:white">
                                                    <img style="height:70px;width:70px;border-radius:50%;"   src="{{ asset('images/' . auth()->user()->user_image) }}">

                                                </div>
                                            </div>
                                            @php
                                            $groupedStories = $stories->groupBy('user_id');
                                            @endphp

                                            
                                            @foreach($groupedStories as $userId => $userStories)
                                            @php
                                            $user = \App\Models\User::find($userId);  
                                            @endphp
                                    
                                                <div class="col-1 mx-2" style="height:80px;width:80px;border-radius:50%;border:1px solid grey;padding:4px">
                                                    <div class="col-6" style="height:70px;width:70px;border-radius:50%;background:white">
                                                        <img src="{{ asset('images/' . $user->user_image) }}"   style="height:70px;width:70px;border-radius:50%;">
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>

                                     
                    

                                    @foreach($reels as $reel)

                                     

                                    <div class="col-9 mt-5" >
                                        <div class="row" style="padding:30px 0px 0px 100px">

                                            <div class="col-1 mx-2">
                                                <img style="height:45px;width:45px;border-radius:50%; "  src="{{ asset('images/' . $reel->user->user_image) }}">
                                            </div>

                                            <div class="col-9">
                                                <h5 class="font" style="font-weight:bolder">
                                                    {{ $reel->user->name }} <span style="color:grey;font-size:25px">.</span> 
                                                    <span style="color:grey">
                                                        @php
                                                            $created = $reel->created_at;
                                                            $now = \Carbon\Carbon::now();
                                    
                                                            
                                                            if ($created->diffInSeconds($now) < 60) {
                                                                echo intval($created->diffInSeconds($now)) . ' sec';
                                                            } elseif ($created->diffInMinutes($now) < 60) {
                                                                echo intval($created->diffInMinutes($now)) . ' min';
                                                            } elseif ($created->diffInHours($now) < 24) {
                                                                echo intval($created->diffInHours($now)) . ' h';
                                                            } else {
                                                                echo intval($created->diffInDays($now)) . ' d';
                                                            }
                                                        @endphp
                                                    </span>
                                            </div>
                                             
                                            <div class="col-1">
                                                <svg aria-label="More options" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>More options</title><circle cx="12" cy="12" r="1.5"></circle><circle cx="6" cy="12" r="1.5"></circle><circle cx="18" cy="12" r="1.5"></circle></svg>
                                            </div>

                                            
                                            <div class="col-11 mt-3 mx-3" style="height:700px;border:1px solid #262626">
                                                @if($reel->image_path)
                                                <div class="col-12 reel" style="margin-left:-9px;width:108%" id="im" data-reel-id="{{ $reel->id }}">
                                                <img style="height:693px;width:95.4%;margin-top:2px" class="img-fluid" src="{{ asset($reel->image_path) }}" alt="Reel Image">
                                                </div>
                                                 
                                                @elseif($reel->video_path)
                                                <div class="col-12 reel" style="margin-left:-9px;width:103%" id="videoshow" data-reel-id="{{ $reel->id }}">
                                                <video style="height: 693px; object-fit: cover;margin-top:2px" id="customVideo" class="img-fluid" autoplay muted loop>
                                                    <source src="{{ asset($reel->video_path) }}" type="video/mp4">
                                                </video>
                                                </div>
                                                @endif
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="col-1">
                                                            @php
                                                            $userLikedReel = in_array(Auth::id(), $reel->likes()->pluck('user_id')->toArray());
                                                        @endphp
                                                        
                                                        <svg data-reel-id="{{ $reel->id }}" class="mt-2 likesvg {{ $userLikedReel ? 'liked' : '' }}" aria-label="Like" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                                            <title>Like</title>
                                                            <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
                                                        </svg>
                                                                                                
                                                        </div>

                                                        <div class="col-1">
                                                            <span>
                                                                <svg  data-reel-id="{{ $reel->id }}"  class="mt-2 commentsvg mx-1" aria-label="Comment" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Comment</title><path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path></svg>
                                                              </span>
                                                        </div>

                                                        <div class="col-8">
                                                            <span>
                                                                <svg style="margin-top:10px" aria-label="Share" class="x1lliihq x1n2onr6 xyb1xck mx-2" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Share</title><line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line><polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                                                             </span>
                                                        </div>


                                                        <div class="col-1">
                                                            <span>
                                                                <svg style="margin-top:10px" aria-label="Save" class="x1lliihq x1n2onr6 x5n08af mx-5" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Save</title><polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                                                              </span>
                                                        </div>

                                                         


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                                     
                         




                    </div>

                    <div class="col-4" style="margin-top:40px">
                        <div class="row">

                            <div class="col-1">
                                <img  style="height:50px;width:50px;border-radius:50%" src="{{ asset('images/' . auth()->user()->user_image) }}">
                            </div>
                            <div class="col-6">
                                <h6 class="font mx-3 mt-2">{{auth()->user()->name}}</h6>
                            </div>
                            <div class="col-1">
                                <h6 class="font mt-2" style="color:#0074bd;font-weight:bolder">Switch</h6>
                            </div>


                            <div class="col-12 mt-5" >

                                <h6 class="font">Suggested for you <span id="seeallusers" style="margin-left:36%">See All</span></h6>
                                @foreach($users as $user)
                                <div class="col-10" style="padding:10px;">
                                    <div class="row">
                            
                                        <div class="col-1">
                                            <img style="width:50px;height:50px;border-radius:50%"  src="{{ asset('images/' . $user->user_image) }}">
                                        </div>
                            
                                        <div class="col-8 homecolumN">
                                            <span class="font mx-4" style="font-weight:bolder">{{ $user->name }}</span><br>
                                            <span style="font-weight:lighter;color:#a8a8a8" class="font mx-4">{{ $user->userName }}</span><br>
                                            <span style="font-weight:lighter;font-size:13px;color:#a8a8a8" class="font mx-4">Suggested for you</span>
                                        </div>
                            
                                        <div class="col-3 bghover">
                                            <h5 class="font follow-btn" data-user-id="{{ $user->id }}" style="padding:10px 10px 60px 10px;">
                                                @php
                                                    
                                                    $isFollowing = Auth::user()->following->contains($user->id);
                                        
                                                     
                                                    $followRequest = \App\Models\Follow::where('following_id', $user->id)
                                                                                        ->where('follow_id', Auth::id())
                                                                                        ->first();
                                                @endphp
                                        
                                                @if($isFollowing)
                                                    @if($followRequest && $followRequest->confirm_status == 1)
                                                        Following
                                                    @else
                                                        Requested
                                                    @endif
                                                @else
                                                    Follow
                                                @endif
                                            </h5>
                                        </div>
                                                             
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12 mx-3 mt-3">
                                <div class="row">

                                    <div class="col-12" style="border: 1px soli white">
                                        <p class="font" style="color:#737373">
                                            <span>About<span style=" margin-left:5px">.</span></span>
                                            <span>Help<span style=" margin-left:5px">.</span></span>
                                            <span>Press<span style=" margin-left:5px">.</span></span>
                                            <span>Api<span style=" ;margin-left:5px">.</span></span>
                                            <span>Jobs<span style=" margin-left:5px">.</span></span>
                                            <span>Privacy<span style=" margin-left:5px">.</span></span>
                                            <span>Terms<span style=" margin-left:5px">.</span></span>
                                        </p>

                                        <p class="font" style="color:#737373">
                                            <span>Location<span style=" margin-left:5px">.</span></span>
                                            <span>Language<span style=" margin-left:5px">.</span></span>
                                            <span>Meta Verified<span style=" margin-left:5px">.</span></span>
                                        </p>

                                        <p class="font" style="color:#737373">
                                        <span>© 2024 Instagram from Meta</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
            
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            @include('createhtml')
            @include('storyhtml')

        </div>
    </div>

    @include('more')

    @include('ajax')

    
</body>
</html>
