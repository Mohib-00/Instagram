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

  .font{
    font-family: "Open Sans", system-ui;
     
  }
    </style>

    @include('css')

</head>
<body>

    <div class="container-fluid  " style="background-color:black;height:922px">
        <div class="row">
          
          @include('sidebar')
            
           @include('editcolumn')
           
             

            <div class="  thirdcolumn scrollbar" style="overflow: auto;height:905px" >
                <h1 class="font" style="font-weight:bolder;font-size:25px">Edit profile</h1>

                <div class="col-12 vcolumn mt-5" >
                    <div class="row">

                        <div class="col-1 ccolumn" id="ccolumn" >
                            <img class="img2" src="{{ asset('images/' . auth()->user()->user_image) }}">  
                        </div>

                        <div class="col-7  " style="margin-top:35px;margin-left:10px" >
                            
                            <h5 class="font">{{ $userName }} </h5>
                            <p style="color: #8ca8a8">{{ $Name }}</p>

                        </div>

                        <div  class="col-1 marginleft" style=" background-color:#0093f5;border-radius:10px; ">
                            <p class="font mt-2 mx-2 " style="font-weight:bolder;">Change photo</p>
                            <input type="file" id="profileImageInput" style="display: none;" accept="image/*">  
                        </div>

                        <div class="col-5 profilehiddencontent" style="display: none">
                            <h4 style="font-weight: lighter;padding:10px 0px 10px 0px" class="font">Change profile photo</h4>
                            <hr style="margin-left:-125px">


                            <h6 style="font-weight: bolder;color:#0093f5;margin-top:25px;margin-left:50px" class="font uploadphoto">Upload photo</h6>
                            <hr style="margin-left:-125px">

                            <h6 id="removePhoto" style="font-weight: bolder;color:#ed4a57;margin-top:25px;margin-left:15px" class="font">Remove current photo</h6>
                            <hr style="margin-left:-125px">

                            <h6 style="font-weight: bolder;color:#ed4a57;margin-top:25px;margin-left:75px" class="font cancel">Cancel</h6>
                        </div>
                        

                                             
                    </div>
                </div>

                <div class="col-10 margintop"  >
                    <h5 class="font" style="font-weight:bolder;font-size:20px;margin-left:5px">Website</h5>
                </div>

                <div class="col-10 vcolumnn mt-4" >
                    <h5 class="font" style=" font-size:20px; color:#a8a8a8;padding:15px ">Website</h5>
                </div>

                <div class="col-10" style="margin-top:10px;margin-left:6px">
                    <p class="font" style="color:#a8a8a8;font-size:14.4px ">Editing your links is only available on mobile. Visit the Instagram app and edit your profile to change the websites<br> in your bio.</p>
                </div>


                <form>

                    <div class="col-1" style="margin-top:50px; " >
                        <h5 class="font" style="font-weight:bolder; font-size:20px; margin-left:5px;">Bio</h5>
                        <div style="position: relative; margin-left:5px;">
                            <input type="text" name="bio" value="{{$bio}}" id="bioInput"  class="form-control font" maxlength="150" placeholder="Bio"
                                style="border-radius:15px; margin-top:10px; background-color: transparent; border: 1px solid #313438; color: white;">
                            <span style="font-weight:bolder" id="charCount">0/150</span>
                        </div>
                    </div>
                    

                    @include('checkbox')

                    <div   class="col-1  " style="margin-top:50px; ">
                        <h5 class="font" style="font-weight:bolder; font-size:20px; margin-left:5px">Gender</h5>
                        <div  style="  margin-left:5px;">

                            <input type="text" name="gender" value="{{$gender}}" id="bioInput2" class="form-control font iNput" maxlength="150">
                                           
                            <span class="spandropdown"  >
                                <svg class="minus" aria-label="Down chevron" fill="currentColor" height="12" role="img" viewBox="0 0 24 24" width="12">
                                    <title>Down chevron</title>
                                    <path d="M21 17.502a.997.997 0 0 1-.707-.293L12 8.913l-8.293 8.296a1 1 0 1 1-1.414-1.414l9-9.004a1.03 1.03 0 0 1 1.414 0l9 9.004A1 1 0 0 1 21 17.502Z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="col-10" style="margin-top:5px;margin-left:7px;wid ">
                        <p class="font" style="color:#a8a8a8;font-size:14.4px; ">This won’t be part of your public profile.</p>
                    </div>


                    <h3 class="font" style="font-weight:bolder;font-size:20px;margin-top:50px; ">Show account suggestions on profiles</h3>
                    <div class="col-6 ccolumnn">
                        <p class="font" style=" font-size:18px;  ">Show account suggestions on profiles</p>
                        <div class="row">

                            <div class="col-11" style="margin-top:-16px">
                                <p cass="font" style="color:grey">Choose whether people can see similar account suggestions on your profile, and whether your<br> account can be suggested on other profiles.</p>
                            </div>

                            <div class="col-1  marginleftt" >
                                
                                <label class="toggle-switch">
                                    <input type="checkbox" name="account_suggestions" id="accountSuggestions" 
                                           {{ $user ? 'checked' : '' }} />
                                    <div class="toggle-switch-background">
                                        <div class="toggle-switch-handle"></div>
                                    </div>
                                </label>
                                

                            </div>

                        </div>
                    </div>


                    <div class="col-3 submitbtn">
                        <h4>Submit</h4>
                    </div>
                     
                

                </form>

                

                <div class="footeredit">
                @include('footer')
                </div>

            </div>


            

        </div>
    </div>


    @include('more')
    <div class="profilesavedcontent" style="display:none">
        <h4 class="mt-2 mx-2">Profile saved</h4>
    </div>
     
    
    @include('ajax')
</body>
</html>