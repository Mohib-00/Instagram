
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--font family links--}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


    <style>
        body, html {
            color:white;
             
        }         
        

  .srchdiv:hover {
    color: #007bff;  
    transition: color 0.3s ease;  
  }
  .flag {
            width: 100px;
            height: 100px;
            border-radius: 50%;
           
            background-size: cover;
            margin-bottom: 5px;
        }
    </style>

    @include('css')

</head>
<body>

    <div class="container-fluid" style="background-color:black;height:922px">
        <div class="row">
          
          @include('sidebar')
            
    
         
            <div class="col-10 secondreelscolumnn scrollbarr mt-3" style="overflow: auto" >
                   <div class="row">

                    <div class="col-4">
                        

                        <div id="showlikecontainer" style="height:440px;background:#262626;margin-top:10%; border-radius:15px 15px 0px 0px;position:fixed;width:20%;margin-left:15px;display:none">
                            <input type="hidden" id="reelIdinput">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row">



                         @foreach($reels as $reel)
                        <div class="col-11 mt-4" style="height:830px;">
                             
                            

                        @if($reel->image_path)
                        <div class="col-12 reel" style="margin-left:-12px;width:110%" id="im" data-reel-id="{{ $reel->id }}">
                            <img style="height:830px;width:95.4%" class="img-fluid" src="{{ asset($reel->image_path) }}" alt="Reel Image">
                        </div>
                    @elseif($reel->video_path)
                        <div class="col-12 reel" style="margin-left:-12px;width:105.2%;" id="videoshow" data-reel-id="{{ $reel->id }}">
                            <video style="height: 830px; object-fit: cover;" id="customVideo" class="img-fluid" autoplay muted loop>
                                <source src="{{ asset($reel->video_path) }}" type="video/mp4">
                            </video>
                        </div>
                        <h5 style="position: absolute;margin-left:28%;display: none"   >
                            <svg class="mt-1" id="soundon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-volume-down-fill" viewBox="0 0 16 16">
                                <path d="M9 4a.5.5 0 0 0-.812-.39L5.825 5.5H3.5A.5.5 0 0 0 3 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 9 12zm3.025 4a4.5 4.5 0 0 1-1.318 3.182L10 10.475A3.5 3.5 0 0 0 11.025 8 3.5 3.5 0 0 0 10 5.525l.707-.707A4.5 4.5 0 0 1 12.025 8"/>
                              </svg>
                               
                        </h5>
                       
                        <h5 style="position: absolute;margin-left:28%;margin-top:-53%;display: none"  >
                        <svg class="mt-1" id="soundoff" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-volume-mute" viewBox="0 0 16 16">
                            <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06M6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0"/>
                        </svg>
                        </h5>
                        @endif

                         
                        
                        <div class="row" style="position: absolute;margin-top:-10%" >
                            
                            <div class="col-1">
                                <img  style="height:40px;width:40px;border-radius:50%" src="{{ asset('images/' . $reel->user->user_image) }}" alt="User Image">  
                            </div>
                            <div class="col-1" style="margin-left:11%;width:fit-content; height:30px;margin-top:-6%">
                                <h5 class="font" >{{ $reel->user->name }}<span style=" font-weight:bolder;font-size:40px;margin-left:5px">.</span></h5>
                            </div>
                            <div class="col-1" style="height:40px;border:1px solid #827d74;width:fit-content;border-radius:5px; ">
                                <p class="mt-1">Follow</p>
                                <br>
                                 
                            </div>
                                                       
                         </div>

                         <h5 style="position: absolute;margin-top:-6%;margin-left:10px">{{ $reel->caption }}</h5>

                              
                        </div> 
                        <div class="col-1" style="margin-top:105%">
                        @php
                            $userLikedReel = in_array(Auth::id(), $reel->likes()->pluck('user_id')->toArray());
                        @endphp
                        
                        <svg data-reel-id="{{ $reel->id }}" class="mt-2 likesvg {{ $userLikedReel ? 'liked' : '' }}" aria-label="Like" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                            <title>Like</title>
                            <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
                        </svg>
                        
                        
                        
                        
                            <p style="margin-left:12px;font-weight:bolder" class="like-count" data-reel-id="{{ $reel->id }}">{{ $likeCounts[$reel->id] ?? 0 }}</p>
                             <span>
                                <svg  data-reel-id="{{ $reel->id }}"  class="mt-2 commentsvg" aria-label="Comment" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Comment</title><path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path></svg>
                                <p style="margin-left:12px;font-weight:bolder" class=" comment-count" data-reel-id="{{ $reel->id }}">{{ $commentCounts[$reel->id] ?? 0 }}</p>
                             </span>

                             <span>
                                <svg data-reel-id="{{ $reel->id }}"   class="mt-2 opnfrwrdcntnr" aria-label="Share" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Share</title><line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line><polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                             </span>

                             <span  >
                                <svg class="mt-4" aria-label="Save" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Save</title><polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                             </span>

                             <span>
                                <svg class="mt-4" aria-label="More" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="32" role="img" viewBox="0 0 24 24" width="32"><title>More</title><circle cx="12" cy="12" r="1.5"></circle><circle cx="6" cy="12" r="1.5"></circle><circle cx="18" cy="12" r="1.5"></circle></svg>
                             </span>
                        </div>  
                        @endforeach
                         
                    </div>
                    </div>
                    @include('showcommentsection')

                    
                   </div>
            </div>
 
             @include('forwardhtml')

            @include('createhtml')
         
        </div>
    </div>


    @include('more')
     
    
    @include('ajax')
</body>
</html>
