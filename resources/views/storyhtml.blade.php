<div class="showstorycontainer" style="display: none">
    <form>
    <div class="col-7 sharestorycolumn">
        <div class="row" style="background: black;padding:10px 0px 10px 0px">

            <div class="col-5 mt-2">
                <svg  class="mx-4 discardsvg" aria-label="Back" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30"><title>Back</title><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="2.909" x2="22.001" y1="12.004" y2="12.004"></line><polyline fill="none" points="9.276 4.726 2.001 12.004 9.276 19.274" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline></svg>
            </div>

            <div class="col-6 mt-2">
                <h6  style="font-weight:bolder" class="font mx-4">New Story</h6>
             </div>

             <div class="col-1 mt-2">
                <h6  style="font-weight:lighter;color:#0093f5" class="font mx-1  sharestory">Share</h6>
             </div>


        </div>


        <div class="row">
            
            <div class="col-8 contentstorycreate">

                <div id="previewstoryContainer"></div>
                 
                    <div id="discardstorycontainer" class="col-5" style="position:absolute;height:250px;background:#262626;margin-top:-35%;margin-left:15%;border-radius:15px;padding:0px 0px 250px 0px; ">
                        <h3 style="font-weight:lighter;margin-left:32%;margin-top:10%" class="font">Discard post?</h3>
                        <p class="font" style="color:#a8a8a8;font-weight:lighter;margin-left:20%">If you leave, your edits won't be saved.</p>
                          
                        <hr style="margin-top:7%">
                        <h6 id="dddiscardstory" style="font-weight:bolder;margin-left:42%;margin-top:5%;color:#ed4a57" class="font">Discard</h6>
                        <hr>
                        <h6 id="cancelstoryDiscard" style="font-weight:lighter;margin-left:43%;margin-top:1%;" class="font">Cancel</h6>

                </div>
              

            </div>

            <div class="col-4">
                <div class="row scrollbar" style="overflow: auto;height:600px">

                    <div class="col-1 mt-3"  >
                        <img   class="img11 mx-3" src="{{ asset('images/' . auth()->user()->user_image) }}"> 
                    </div>

                    <div class="col-11">
                        <p style="margin-left:45px;margin-top:20px" class="font ">{{$Name}}</p>

                        <textarea name="storycaption" id="storyInput" style="background: transparent; height:500px; color:white; margin-left:-15px; padding:10px; border:none; width:100%;" class="form-control font mt-4"></textarea>
                        <input type="file" id="storyUploadInput" accept="image/*,video/*" style="display: none;">

                    </div>

                                                              
                </div>                     
                </div>

            </div>

        </div>

    </div>