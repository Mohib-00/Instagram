<div class="container POstCONtainer"  >
    <div class="col-12">
        <div class="row">
            <h4>Getting started</h4>
        </div>
    </div>


    <div class="col-12">
        <div class="row">

            <div class="col-3 post1">
                <div class="row">

                    <div class="col-12 ">
                        <div class="col-5 mt-3  postcamera">
                            <svg class="postcamerasvg" xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                              </svg>
                        </div> 
                    </div>



                     <div class="col-12">
                        <h5 class="sharephotostext">Share Photos</h5>
                     </div>

                     <div class="col-12">
                        <p class="paragrph" style="color:#6e9999">When you share photos, they will appear on your profile.</p>
                     </div>


                     <div class="col-9 sharefirstphoto a"  >
                        <h6 class="sharefirstphototext">Share Your First Photo</h6>
                     </div>



                </div>
            </div>

            <div class="col-3 post1">
                <div class="row">

                    <div class="col-12 ">
                        <div class="col-5 mt-3  postcamera"  >
                            
                            <svg class="postcamerasvg" xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                              </svg>
                        </div> 
                    </div>



                     <div class="col-12">
                        <h5 class="sharephotostextfacebook">Find facebook friends</h5>
                     </div>

                     <div class="col-12">
                        <p style="color:#6e9999">You choose which friends to follow. We'll never post to Facebook without your permission.</p>
                     </div>


                     <div class="col-9 sharefirstphoto b"  >
                        <h6 class="sharefirstphototext">Connect to facebook</h6>
                     </div>



                </div>
            </div>

            
@if (!auth()->user()->user_image)
<div class="col-3 post1" id="hide">
    <div class="row">
        <div class="col-12">
            <div class="col-5 mt-3 postcamera">
                <svg class="postcamerasvg" xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                    <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                    <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                </svg>
            </div> 
        </div>

        <div class="col-12">
            <h5 class="sharephotostext">Add profile photo</h5>
        </div>

        <div class="col-12">
            <p style="color:#6e9999">Add a profile photo so your friends know it's you.</p>
        </div>

        <div class="col-9 sharefirstphoto3 c ">
            <h6   class="sharefirstphototext">Add profile photo</h6>
        </div>
    </div>
</div>
@endif



        </div>
    </div>

    @include('footer')

    

    
 </div>