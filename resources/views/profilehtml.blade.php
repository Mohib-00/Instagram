<div class="col-12">
    <div class="row">

       

        @if(auth()->user()->user_image)

        <div class="col-4 profileclick1 profileclick1-large">
            <div class="note1"  >
                <h5 class="textnote">Note...</h5>
            </div>
             
            
                @if(auth()->user()->user_image)
                
                    <img class="img" src="{{ asset('images/' . auth()->user()->user_image) }}" alt="User Image">
                @else
                
                    <svg class="svgprofile" viewBox="0 0 24 24" width="44" height="44" fill="currentColor" class="x14ctfv xtzzx4i x10l6tqk xwa60dl x11lhmoz">
                        <path d="M12 9.652a3.54 3.54 0 1 0 3.54 3.539A3.543 3.543 0 0 0 12 9.65zm6.59-5.187h-.52a1.107 1.107 0 0 1-1.032-.762 3.103 3.103 0 0 0-3.127-1.961H10.09a3.103 3.103 0 0 0-3.127 1.96 1.107 1.107 0 0 1-1.032.763h-.52A4.414 4.414 0 0 0 1 8.874v9.092a4.413 4.413 0 0 0 4.408 4.408h13.184A4.413 4.413 0 0 0 23 17.966V8.874a4.414 4.414 0 0 0-4.41-4.41zM12 18.73a5.54 5.54 0 1 1 5.54-5.54A5.545 5.545 0 0 1 12 18.73z"></path>
                    </svg>
                @endif
               
            <input type="file" id="profileImageInput" style="display: none;" accept="image/*">                          
        </div>
        
        
         

         
       
    @else
        
        <div class="col-4 profileclick">
            <div class="note">
                <h5 class="textnote">Note...</h5>
            </div>
            <div class="col-5 profilesvg">
                <svg class="svgprofile" viewBox="0 0 24 24" width="44" height="44" fill="currentColor" class="x14ctfv xtzzx4i x10l6tqk xwa60dl x11lhmoz">
                    <path d="M12 9.652a3.54 3.54 0 1 0 3.54 3.539A3.543 3.543 0 0 0 12 9.65zm6.59-5.187h-.52a1.107 1.107 0 0 1-1.032-.762 3.103 3.103 0 0 0-3.127-1.961H10.09a3.103 3.103 0 0 0-3.127 1.96 1.107 1.107 0 0 1-1.032.763h-.52A4.414 4.414 0 0 0 1 8.874v9.092a4.413 4.413 0 0 0 4.408 4.408h13.184A4.413 4.413 0 0 0 23 17.966V8.874a4.414 4.414 0 0 0-4.41-4.41zM12 18.73a5.54 5.54 0 1 1 5.54-5.54A5.545 5.545 0 0 1 12 18.73z"></path>
                </svg>
            </div>    
            <input type="file" id="profileImageInput" style="display: none;" accept="image/*">                          
        </div>
    @endif
    

        


        <div class="col-8 usernamesection">
            <div class="row">

                <div class="col-3">
                    <h4>{{ $userName }}</h4>
                </div>

                <div class="col-3 editprofilesection" id="edit">
                      <h5 class="EditProfile">Edit Profile</h5>
                </div>

                <div class="col-3 viewarchiveesection">
                    <h5 class="EditProfile">View archive</h5>
                </div>

                <div class="col-4">
                    <svg aria-label="Options" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Options</title><circle cx="12" cy="12" fill="none" r="8.635" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle><path d="M14.232 3.656a1.269 1.269 0 0 1-.796-.66L12.93 2h-1.86l-.505.996a1.269 1.269 0 0 1-.796.66m-.001 16.688a1.269 1.269 0 0 1 .796.66l.505.996h1.862l.505-.996a1.269 1.269 0 0 1 .796-.66M3.656 9.768a1.269 1.269 0 0 1-.66.796L2 11.07v1.862l.996.505a1.269 1.269 0 0 1 .66.796m16.688-.001a1.269 1.269 0 0 1 .66-.796L22 12.93v-1.86l-.996-.505a1.269 1.269 0 0 1-.66-.796M7.678 4.522a1.269 1.269 0 0 1-1.03.096l-1.06-.348L4.27 5.587l.348 1.062a1.269 1.269 0 0 1-.096 1.03m11.8 11.799a1.269 1.269 0 0 1 1.03-.096l1.06.348 1.318-1.317-.348-1.062a1.269 1.269 0 0 1 .096-1.03m-14.956.001a1.269 1.269 0 0 1 .096 1.03l-.348 1.06 1.317 1.318 1.062-.348a1.269 1.269 0 0 1 1.03.096m11.799-11.8a1.269 1.269 0 0 1-.096-1.03l.348-1.06-1.317-1.318-1.062.348a1.269 1.269 0 0 1-1.03-.096" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>

               

                <div class="col-2 mt-4">
                    <h5> 0 Posts</h5>
                </div>

                <div class="col-2 mt-4">
                    <h5> 0 followers</h5>
                </div>

                <div class="col-8 mt-4">
                    <h5> 0 following</h5>
                </div>

                <div class="col-12 mt-4">
                    <h5>{{ $userName }}</h5>
                </div>

                 

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-12 newhighlight">
            <div class="col-10 pluscontainer">
                <svg class="PlusIcon" aria-label="Plus icon" class="x1lliihq x1n2onr6 x10xgr34" fill="currentColor" height="74" role="img" viewBox="0 0 24 24" width="74"><title>Plus icon</title><path d="M21 11.3h-8.2V3c0-.4-.3-.8-.8-.8s-.8.4-.8.8v8.2H3c-.4 0-.8.3-.8.8s.3.8.8.8h8.2V21c0 .4.3.8.8.8s.8-.3.8-.8v-8.2H21c.4 0 .8-.3.8-.8s-.4-.7-.8-.7z"></path></svg>
            </div>
        </div>

        <div class="col-12">
            <h5 class="newtext">New</h5>
        </div>

    </div>
</div>