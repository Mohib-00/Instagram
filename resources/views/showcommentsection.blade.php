<div class="col-4" >
    <div class="row" id="showcommentsection" style="display:none" >
        <input type="hidden" id="reelIdInput">

        <div style="height:440px;background:#262626;margin-top:10%; border-radius:15px 15px 0px 0px;position:fixed;width:20%;margin-left:15px">
            <div class="row">

                <div class="col-4" style="margin-left:30px;margin-top:30px">
                    <svg id="hidecommentsection" aria-label="Close" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="17" role="img" viewBox="0 0 24 24" width="17"><title>Close</title><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="3" y2="21"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="21" y2="3"></line></svg>
                </div>

                <div class="col-7" style=" margin-top:30px">
                    <p class="font" style="font-weight:bolder">Comments</p>
                </div>

    
                <div class="col-11 scrollbar" id="commentsSection" style="margin-left:30px;overflow:auto;height:350px">
                                                           
                </div>

                
            </div>
        </div>


         

        <div class="hideinput" style="background-color:#262626;height:80px;border-radius:0px 0px 15px 15px;margin-top:32.5%;margin-left:15px;width:20%;position:fixed;">
            
            <form id="commentForm">
                <div class="col-10" style=" display: flex; align-items: center;  ">
                    <div style="position: relative; display: inline-block;">
                        <img 
                            style="height: 40px; width: 40px; border-radius: 50%; position: absolute; left: 25px; top: 50%; transform: translateY(-50%); z-index: 1;" 
                            src="{{ asset('images/' . auth()->user()->user_image) }}"
                            alt="User Image"
                        >  
                        <input
                            id="commentInput"
                            style="background-color: black; color: white; width: 110%; padding: 14px 0px 14px 60px; margin-left: 20px; border-radius: 20px; padding-right: 40px;margin-top:10px" 
                            type="text" 
                            class="form-control form" 
                            placeholder="Add a comment..."
                            name="comment"
                        />
            
                        <svg 
                            class="sendComment" 
                            style="position: absolute; left: 300px; top: 50%; transform: translateY(-50%); z-index: 1;" 
                            xmlns="http://www.w3.org/2000/svg" 
                            width="18" 
                            height="18" 
                            fill="currentColor" 
                            class="bi bi-send" 
                            viewBox="0 0 16 16"
                            id="sendCommentButton"
                        >
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                        </svg>
                    </div>
                </div>
            </form>
            
        </div>





        <div class="showreplyinput" style="background-color:#262626;height:80px;border-radius:0px 0px 15px 15px;margin-top:32.5%;margin-left:15px;width:20%;position:fixed;display:none">
            <form id="replycommentForm">
                <input type="hidden" id="comment_id" name="comment_id" value="" />  
                <div class="col-10" style="display: flex; align-items: center;">
                    <div style="position: relative; display: inline-block;">
                        <img 
                            style="height: 40px; width: 40px; border-radius: 50%; position: absolute; left: 25px; top: 60%; transform: translateY(-50%); z-index: 1;" 
                            src="{{ asset('images/' . auth()->user()->user_image) }}" 
                            alt="User Image"
                        >
                        <input
                            id="replycommentInput"
                            style="background-color: black; color: white; width: 110%; padding: 14px 0px 14px 60px; margin-left: 20px; border-radius: 20px; padding-right: 40px;margin-top:10px" 
                            type="text" 
                            class="form-control form" 
                            placeholder="Reply..."
                            name="reply_comment"
                        />
                        <svg 
                            class="sendreplyComment" 
                            style="position: absolute; left: 300px; top: 60%; transform: translateY(-50%); z-index: 1;" 
                            xmlns="http://www.w3.org/2000/svg" 
                            width="20" 
                            height="20" 
                            fill="currentColor" 
                            viewBox="0 0 16 16" 
                            id="sendreplyCommentButton"
                        >
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                        </svg>
                    </div>
                </div>
            </form>
        </div>
        
         

    </div>
</div>