
<div id="forwardcontainer" class="container"  style="display:none">
    <div class="createforwardcolumn">

        <div class="col-12 mt-4">
          <div class="row">

            <div class="col-11">
                <h5 class="font" style="font-weight:bolder;margin-left:50%">Share</h5>
            </div>
            <div class="col-1">
                <svg id="closeforwardcontainer" aria-label="Close" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="20" role="img" viewBox="0 0 24 24" width="20"><title>Close</title><polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line></svg>
            </div>

          </div>
        </div>
        <hr>

        <div class="container">
            <div class="col-12 position-relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-search position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.742 1.656a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
                </svg>
                <input type="text" class="form-control forward font" placeholder="Search" aria-label="Search" 
                    style="background: #121212; border:none; padding-left: 40px; color: white;height:50px;border-radius:10px">
            </div>

            
            <div class="col-12" style="height:400px">
                <div class="row">
                    @foreach ($followingUsers as $user)
                    <div class="col-3 mt-5">
                        <div data-user-id="{{ $user->id }}" class="flag position-relative flaggggg" style="position: relative; display: inline-block;">
                            <img data-user-id="{{ $user->id }}" 
                                 data-user-name="{{ $user->name }}" 
                                 data-user-userName="{{ $user->userName }}" 
                                 data-user-image="{{ $user->userName }}" 
                                 class="flag mx-2 user-image" 
                                 src="{{ asset('images/' . $user->user_image) }}" 
                                 style="border-radius: 50%; cursor: pointer;">  
                            
                            <div class="tick-mark position-absolute" 
                                 style="background-color: #3796f0; border-radius: 50%; padding: 4px; position: absolute; bottom: 0; right: 0; width: 20px; height: 20px; display: none;">
                                <svg style="margin-top:-10px;margin-left:-4px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-4.5 5.5a.75.75 0 0 1-1.08.02l-2.5-2.5a.75.75 0 1 1 1.06-1.06L7 9.44l3.97-4.47z"/>
                                </svg>
                            </div>
                        </div>
                        <h5 class="font mx-4">{{ $user->userName }}</h5>
                    </div>
                    @endforeach
                </div>
            </div>
            <hr>

            <div class="col-12 scrollbarstory hidwhenclkonimg" style="overflow: auto;height:110px; ">
                <div class="row">

                    <div class="col-2">
                    <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                        <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                            <title>Copy link</title>
                            <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                        </svg>
                    </div>
                    <h6 class="font mt-1 mx-1">Copy link</h6>
                    </div>

                    <div class="col-2">
                        <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                            <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                <title>Copy link</title>
                                <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                            </svg>
                        </div>
                        <h6 class="font mt-1 mx-1">Copy link</h6>
                        </div>


                        <div class="col-2">
                            <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                                <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                    <title>Copy link</title>
                                    <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                                </svg>
                            </div>
                            <h6 class="font mt-1 mx-1">Copy link</h6>
                            </div>


                            <div class="col-2">
                                <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                                    <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                        <title>Copy link</title>
                                        <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                                    </svg>
                                </div>
                                <h6 class="font mt-1 mx-1">Copy link</h6>
                                </div>


                                <div class="col-2">
                                    <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                                        <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                            <title>Copy link</title>
                                            <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                                        </svg>
                                    </div>
                                    <h6 class="font mt-1 mx-1">Copy link</h6>
                                    </div>


                                    <div class="col-2">
                                        <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                                            <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                                <title>Copy link</title>
                                                <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                                            </svg>
                                        </div>
                                        <h6 class="font mt-1 mx-1">Copy link</h6>
                                        </div>


                                        <div class="col-2">
                                            <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                                                <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                                    <title>Copy link</title>
                                                    <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                                                </svg>
                                            </div>
                                            <h6 class="font mt-1 mx-1">Copy link</h6>
                                            </div>


                                            <div class="col-2">
                                                <div class="col-1" style="width: 70px; height: 70px; border-radius: 50%; background: #121212; display: flex; justify-content: center; align-items: center;">
                                                    <svg aria-label="Copy link" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                                        <title>Copy link</title>
                                                        <path d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                                                    </svg>
                                                </div>
                                                <h6 class="font mt-1 mx-1">Copy link</h6>
                                                </div>
                    

                </div>
            </div>

            <form>
            <div class="show" style="display:none">
            <div class="col-12  "  >
                <input   style="border:none; background:transparent; outline:none;color:white" type="text" name="message" placeholder="Write a message..."/>
            </div>
            <div class="col-12 mt-4  " style="background:#0093f5;height:45px;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                <h5 style="font-weight:bolder" class="font">Send</h5>
            </div>
            </div>
            <form>
            
            
        </div>
        
        

    </div>  
</div>
