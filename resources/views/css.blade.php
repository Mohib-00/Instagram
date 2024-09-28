<style>
 

  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body{
    background-color: #fafafa;
  }
  
  main{
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .page{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-bottom: 30px;
  }
  
  
  .logo {
      font-family: 'Brush Script MT', 'Lucida Handwriting', cursive;
      font-weight: bolder;
      font-size: 55px;
  }
  
  
  /* header style */
  .page .header{
    text-align: center;
  }
  
  .page .header .logo, 
  .page .header p, 
  .page .header button{
    margin-bottom: 15px;
  }
  
  .page .header > p{
    font-weight: bold;
    color: #8e8e8e;
    font-size: 18px;
  }
  
  .page .header > button{
    width: inherit;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    background-color: #0095f6;
    color: #ffffff;
  }
  
  .page .header div{
    display: flex;
    flex-direction: row;
    align-items: center;
    color: #8e8e8e;
  }
  
  .page .header div p{
    padding: 0 20px;  
  }
  
  .page .header div hr{
    width: 200px;
    
  }
  
  /* container style*/
  .page .container{
    display: flex;
    flex-direction: column;
  }
  
  .page .container form, input{
    width: inherit;
  }
  
  .page .container form input{
    border: 1px solid #dbdbdb;
    background-color: #fafafa;
    padding: 10px 5px;
    margin: 5px 0;
  }
  
  .page .container form input:last-of-type{
    margin-bottom: 10px;  
  }
  
  .page .container form button{
    width: inherit;
    margin-bottom: 20px;
    padding: 7px 20px;
    border-radius: 5px;
    border: none;
    background-color: #0095f6;
    color: #ffffff;
  }
  
  .page .container ul{
    list-style: none;
    text-align: center;
    margin-bottom: 10px;
  }
  
  .page .container ul li{
    display: inline;
    color: #8e9096;
  }
  
  .page .container ul li a{
    text-decoration: none;
    font-weight: bold;
    color: #8e9096;
  }
  
  /* option style */
  .option p > a{
      text-decoration: none;
      color: #00a0f7;
  }
  
  /* otherapps style */
  .otherapps{
    text-align: center;
  }
  
  .otherapps p{
    margin-bottom: 15px;
  }
  
  .otherapps > button{
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: black;
    color: white;
    padding: 10px;
    font-size: 18px;
  }
  
  /* footer style */
  .footer{
    bottom: 0;
    height: 2.5rem;
    margin-top: 50px;
  }
  
  .footer ul{
    text-align: center;
  }
  .footer ul li{
    display: inline;
    margin-right: 5px;
  }
  .footer ul li a{
    text-decoration: none;
    font-size: 12px; 
    color: #00376b;
  }
  
  .footer p{
    margin: 10px 0;
    text-align: center;
    color: #8e9096;
    font-size: 14px;
  }
  
  
  
  /* Mobile Styles */
  
  @media only screen and (max-width: 400px) {
      body {
          font-family: Freight Sans
      }
    
    .page{
      width: 250px;
      background-color: #fafafa;
    }
    
    .page .header{
      width: inherit;
      margin-top: 10px;
    }
    
    .page .container{
      width: inherit;
    }
    
    .option{
      margin: 80px 0;
    }
    
    .page .container input{
      padding: 10px 5px;
      margin: 5px 0;
    }
    
    .page .footer{
      width: inherith
    }
  }
  
  .font{
    font-family: "Open Sans", system-ui;
     
  }
  
   

  @media only screen and (min-width: 401px){
      body {
          font-family: Neue Helvetica
      }

      .newpost{
        margin-left:35%
      }

      .profilehiddencontent{
        position: absolute;
        margin-left:270px;
        margin-top:150px;
        background: #262626;
        height:270px;
        border-radius:15px;
        padding:25px 0px 0px 125px;

      }

      .footeredit{
        margin-left:-180px
      }

      .marginleftt{
        margin-left:-50px;
        margin-top:-20px
      }
      .rowpadding{
        margin-left:40px;
        margin-top:30px
      }

      .hiddencontent{
        margin-top:-316px;
        margin-left:285px
      }

      .spandropdown{
        display: inline-block;
         transform: rotate(180deg);
         position: absolute;
          left: 920px;
           margin-top: -45px;
        
      }

      #charCount{
      position: absolute;
       left: 680px;
        top: 67%;
         transform: translateY(-50%);
          font-size: 14px;
           color: grey;
           
    }

       

      .marginleft{
         margin-top:40px;
        height:40px;
        width:fit-content;
      }
  
      .img1{
        width:1250%;
        height:34px;
        border-radius:50%;
        
       
      }
      .secondcolumn{
        border-left:1px solid #262626;
        height:915px;
        margin-left:320px;
        position:fixed;
        width:95%
      }

      .secondcolumnn{
        border-left:1px solid #262626;
        height:915px;
        margin-left:320px;
        position:fixed;
        width:82.3%;
        padding:50px 0px 0px 430px;
      }

      .ccolumn{
  height:70px;
  width:70px;
  border-radius:50%;
  background-color:grey;
 
  margin-left:30px;
  margin-top:20px
}


.ccolumnn{
  height:100px;
  width:76%;
  border-radius:15px;
  border:1px solid #313438;
  padding:25px 0px 20px 20px
   
}

      .fourthcolumn{
        border-left:1px solid #262626;
        height:915px;
        margin-left:320px;
        padding:50px 0px 0px 55px;
        position:fixed;
        width:721%
      }

      .metacontainer{
        margin-left:-30px;
        padding:20px 10px 0px 25px;
        
  
  background: #262626;
  border-radius:10px
      }

      

      .thirdcolumn{
        border-left:1px solid #262626;
        height:915px;
        margin-left:710px;
        position:fixed;
        width:63%;
        padding:50px 0px 0px 200px
      }  

    .page{
      border: 1px solid #dbdbdb;
      width: 450px;
      background-color: white;
      margin: 40px 40px 10px 40px;
    }
    
    .page .header{
      width: 270px;
      margin-top: 15px;
    }
    
    .page .container{
      width: 270px;
    }
    
    .option{
      border: 1px solid #dbdbdb;
      background-color: white;
      width: 450px;
      height: 70px;
      margin-top: 20px 0;
      display: flex; 
      align-items: center;
      justify-content: center;
      
    }
    
    .otherapps{
      margin: 20px 0px 0px 80px;
    }
    
    .otherapps button{
      margin-right: 5px;
    }
    
    .otherapps button:after-of-type{
      margin-right: none;
    }
    
    .page .footer{
      width: 100%;
    }
  
    .logohome {
      font-family: 'Brush Script MT', 'Lucida Handwriting', cursive;
      margin-top:35px;
      margin-left:30px;
  }
  .home {
    font-family: "Open Sans", sans-serif;
    font-weight: 700;
    margin-top:4px;
    margin-left:80px;
    position: fixed;
  }
  .homesvg{
     margin-left:30px;
  }
  .top{
    margin-top:55px;
  }
  .img{
    margin-left:-10px;
    margin-top:100px
  }
  
  
  .srch{
    margin-top:45px;
  }
  
  .explore{
    margin-top:45px;
  }
  
  .threads{
    margin-top:110px;
  }
  
  .settings {
       margin-left:30px;
  }
  
  .hoverdiv:hover:{
    background-color: gray;
  }
   .stsvg{
    margin-left:30px;
    margin-top:35px;
   }
   .Settingss{
    margin-left:70px;
    margin-top:-25px;
   }
  
   .profilesvg{
    margin-left:50px;
    margin-top:60px
   }

   
  
   .svgprofile{
    margin-left:13px;
    margin-top:18px;
   }
  
    
  
   .note{
    background: #363636;
    margin-left:40px;
    margin-top:-20px
   }

   .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:5%
   }

    
  
   .textnote{
    margin-left:10px;
    padding:12px 5px 5px 5px;
    color:#5e5e5e
   }

    
  
   .usernamesection{
    margin-left:12%;
   }
  
   .EditProfile{
    margin-left:5px;
    margin-top:10px
   }

   
  
   .editprofilesection{
    margin-top:-8px
   }
  
   .viewarchiveesection{
    margin-top:-8px;
    margin-left:10px;
   }
  
   .newhighlight{
    margin-top:70px;
    margin-left:-20px;
   }
  
  .pluscontainer{
    margin-left:-8px;
    margin-top:4.5px
  }
  
  .secondcontainer{
    margin-left:16%;
    margin-top:5%;
    width:fit-content;
  }
  .post1{
    margin-left:10px;
    width:32%
  }
  
  .settings {
      background-color: #262626;
      position: absolute;
      margin-top: -600px;
      height:525px;
      width: 340px;  
      border-radius:25px;
      display:none
  }
  
  .profileclick {
    height: 190px;
    width: 15%;
    background: #7d7d7d;
    border-radius: 55%;
   
  }

  .profileclick1 {
    height: 190px;
    width: 15%;
   margin-top:35px;
    border-radius: 55%;
   
  }
   

  .profileclickimg {
    height: 190px;
    width: 23%;
    border-radius: 55%;
  }

  .img{
    height: 190px;
    width:110%;
    border-radius:55%;
    margin-top:-50px
    
  }
  
  .PlusIcon{
  margin-left:20px;
  margin-top:17px;
  color:#737373
  }
  
  .newtext{
    margin-left:10px;
    margin-top:5px;
  }
  
  .fourthcontainer{
    margin-left:-85px;
    margin-top:65px;
  }
  
   
  .paragrph{
    width:fit-content
  }
   
  
  .Posts{
    margin-top:-5px
  }
  
  .posttext{
    margin-left:4px;
  }
  
  .postcolumn{
    margin-left:35%;
  }
  
  .postcamera{
    height:80px;
    width:80px;
    border-radius:50%;
    border:1px solid white;
    margin-left:35%;
     
   }

   

   .postcamerasvg{
    margin-left:21%;
    margin-top:18%
   }

   .sharephotostext{
    margin-left:32%;
    margin-top:5%
   }

   .sharephotostextfacebook{
    margin-left:20%;
    margin-top:5%
   }


   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    margin-left:25%;
    margin-top:5%
    
   }

   .sharefirstphoto3{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    margin-left:25%;
    margin-top:12%
   }

   .sharefirstphototext{
    font-weight:bolder;
    margin-top:5%
   }
   

     
  .POstCONtainer{
                border-left:10px solid #121212;
                border-right:10px solid #121212;
                height: 350px;
                margin-left:-70px;
                width:88%;
                margin-top:40px;
              }
   
  
  }
  
   
  @media (max-width: 1605px) {
    .profileclick {
      height: 190px;        
      width: 190px;        
      border-radius: 55%;  
    }

    .profileclick1 {
    height: 190px;
    width: 15%;
   margin-top:35px;
    border-radius: 55%;
   
  }

    .img{
    height: 190px;
    width:110%;
    border-radius:55%;
    margin-top:-50px
    
  }

    .sharephotostext{
    margin-left:32%;
    margin-top:5%
   }

   .sharephotostextfacebook{
    margin-left:20%;
    margin-top:5%
   }
    
   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    margin-left:25%;
    margin-top:5%
    
   }
  }
  
   
  @media (max-width: 1200px) {
    .profileclick {
      height: 190px;        
      width: 190px;        
      border-radius: 55%;   
    }
    .profileclick1 {
    height: 190px;
    width: 15%;
   margin-top:35px;
    border-radius: 55%;
   
  }

    .img{
    height: 190px;
    width:110%;
    border-radius:55%;
    margin-top:-50px
    
  }

    .sharephotostext{
    margin-left:32%;
    margin-top:5%
   }

   .sharephotostextfacebook{
    margin-left:20%;
    margin-top:5%
   }
    
   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    margin-left:25%;
     
    
   }

  }
  
   
  @media (max-width: 800px) {
    .profileclick {
      height: 190px;       
      width: 190px;         
      border-radius: 55%;   
    }
    .profileclick1 {
    height: 190px;
    width: 15%;
   margin-top:35px;
    border-radius: 55%;
   
  }

    .img{
    height: 190px;
    width:110%;
    border-radius:55%;
    margin-top:-50px
    
  }

    .sharephotostext{
    margin-left:32%;
    margin-top:5%
   }

   .sharephotostextfacebook{
    margin-left:20%;
    margin-top:5%
   }
    
   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    margin-left:25%;
    margin-top:5%
    
   }
  }
  
   
  @media (max-width: 480px) {
    .profileclick {
      height: 190px;       
      width: 190px;         
      border-radius: 55%;   
    }

    .profileclick1 {
    height: 190px;
    width: 15%;
   margin-top:35px;
    border-radius: 55%;
   
  }
    .img{
    height: 190px;
    width:110%;
    border-radius:55%;
    margin-top:-50px
    
  }

    .sharephotostext{
    margin-left:32%;
    margin-top:5%
   }

   .sharephotostextfacebook{
    margin-left:20%;
    margin-top:5%
   }
    
   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    margin-left:25%;
    margin-top:5%
    
   }

   .footercontainer{
  padding:100px 0px 100px 50px;
}
.paddingfooter{
  padding: 10px
}

.paddingfooter2{
  margin-left:30%
}
  }
  
  
   
  .profilesvg {
    height: 70px;
    width: 40%;
    background: #878787;
    border-radius: 55%;
  }
  
   
  @media (max-width: 1605px) {
    .profilesvg {
      height: 70px;
      width: 40%;       
      border-radius: 55%;  
    }

    .footercontainer{
  padding:100px 0px 100px 50px;
}
.paddingfooter{
  padding: 10px
}

.paddingfooter2{
  margin-left:30%
}
  }
  
   
  @media (max-width: 1200px) {
    .profilesvg {
      height: 70px;
      width: 40%;        
      border-radius: 55%;   
    }
    
  }
  
   
  @media (max-width: 800px) {
    .profilesvg {
      height: 70px;
      width: 40%;         
      border-radius: 55%;   
    }
  }
  
   
  @media (max-width: 480px) {
    .profilesvg {
      height: 70px;
      width: 40%;         
      border-radius: 55%;   
    }
  }
  
   
  .note{
    height: 50px;
    width: 50%;  
    border-radius:15px     
         
  }

  .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:5%
   }
  
  
  @media (max-width: 1605px) {
    .note {
      height: 50px;
    width: 50%;  
    border-radius:15px   
    }

    .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:5%
   }
  }
  
   
  @media (max-width: 1200px) {
    .note {
      height: 50px;
    width: 50%;  
    border-radius:15px    
    }

    .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:5%
   }
  }
  
   
  @media (max-width: 800px) {
    .note {
      height: 50px;
      width: 50%;  
    border-radius:15px    
    }

    .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:5%
   }
  }
  
   
  @media (max-width: 480px) {
    .note {
      height: 50px;
    width: 50%;  
    border-radius:15px     
    }

    .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:5%
   }
  }
  
   
  
  .editprofilesection{
    height: 45px;
    width: fit-content;  
    border-radius:10px ;
    background: #363636;   
     
         
  }
  
  
  @media (max-width: 1605px) {
    .editprofilesection {
      height: 45px;
      width: fit-content;  
    border-radius:10px ;  
    }
  }
  
   
  @media (max-width: 1200px) {
    .editprofilesection {
      height: 45px;
      width: fit-content; 
    border-radius:10px ;  
    }
  }
  
   
  @media (max-width: 800px) {
    .editprofilesection {
      height: 45px;
      width: fit-content;   
    border-radius:10px ;   
    }
  }
  
   
  @media (max-width: 480px) {
    .editprofilesection {
      height: 45px;
      width: fit-content;   
    border-radius:10px ;   
    }
  }
  
   
  .viewarchiveesection{
    height: 45px;
    width: fit-content;  
    border-radius:10px ;
    background: #363636;    
         
  }
  
  
  @media (max-width: 1605px) {
    .viewarchiveesection {
      height: 45px;
      width: fit-content;   
    border-radius:10px ;  
    }
  }
  
   
  @media (max-width: 1200px) {
    .viewarchiveesection {
      height: 45px;
      width: fit-content;   
    border-radius:10px ;  
    }
  }
  
   
  @media (max-width: 800px) {
    .viewarchiveesection {
      height: 45px;
      width: fit-content;  
    border-radius:10px ;   
    }
  }
  
   
  @media (max-width: 480px) {
    .viewarchiveesection {
      height: 45px;
      width: fit-content;   
    border-radius:10px ;   
    }
  }
  
  .editprofilesection:hover{
    background:#262626;
  }
  
  .viewarchiveesection:hover{
    background:#262626;
  }
  
   
  .newhighlight{
    height:120px;
    width:120px;
    border-radius:50%;
    border:1px solid #333333
  }
  
  
  @media (max-width: 1605px) {
    .newhighlight{
      height:120px;
      width:120px;
    border-radius:50%;
    border:1px solid #333333
  }
  }
  
   
  @media (max-width: 1200px) {
    .newhighlight{
      height:120px;
      width:120px;
    border-radius:50%;
    border:1px solid #333333
  }
  }
  
   
  @media (max-width: 800px) {
    .newhighlight{
      height:120px;
      width:120px;
    border-radius:50%;
    border:1px solid #333333
  }
  }
  
   
  @media (max-width: 480px) {
    .newhighlight{
      height:120px;
      width:120px;
    border-radius:50%;
    border:1px solid #333333
  }
  }
  
  
  .pluscontainer{
    height:110px;
    width:110px;
    border-radius:50%;
    background: #121212;
  }
  
  
  @media (max-width: 1605px) {
    .pluscontainer{
    height:110px;
    width:110px;
    border-radius:50%;
    background: #121212;
  }
  }
  
   
  @media (max-width: 1200px) {
    .pluscontainer{
    height:110px;
    width:110px;
    border-radius:50%;
    background: #121212;
  }
  }
  
   
  @media (max-width: 800px) {
    .pluscontainer{
    height:110px;
    width:110px;
    border-radius:50%;
    background: #121212;
  }
  }
  
   
  @media (max-width: 480px) {
    .pluscontainer{
    height:110px;
    width:110px;
    border-radius:50%;
    background: #121212;
  }
  }
  
  
  .fourthcontainer{
    width:90%
  }
  
  
  
  
  
  
  
  
  
  .scrollbar::-webkit-scrollbar {
                                          width: 10px;  
                                      }
                                     
                      
                                      .scrollbar::-webkit-scrollbar-track {
                                        background-color:#424242;  
                                      }
                      
                                      .scrollbar::-webkit-scrollbar-thumb {
                                        background-color: #696969;  
                                        border-radius: 5px;   
                                           
                                      }
                      
                                      .scrollbar::-webkit-scrollbar-thumb:hover {
                                        background-color: #696969;   
                                      } 
  
  
  .secondcontainer{
    margin-left:16%;
    margin-top:5%;
    width:100% 
   }
  
   
  @media (max-width: 1605px) {
   
  .secondcontainer{
    margin-left:16%;
    margin-top:5%;
    width:fit-content
   }

 

   .post1{
    margin-left:10px;
    width:32%
  }

  .postcamera{
    height:80px;
    width:80px;
    border-radius:50%;
    border:1px solid white
   }

   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    
   }
  }
  
   
  @media (max-width: 1200px) {
   
  .secondcontainer{
    margin-left:16%;
    margin-top:5%;
    width:fit-content
   }

  

   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    
   }

   .post1{
    margin-left:10px;
    width:32%
  }

  .postcamera{
    height:80px;
    width:80px;
    border-radius:50%;
    border:1px solid white
   }
  }
  
   
  @media (max-width: 800px) {
   
  .secondcontainer{
    margin-left:16%;
    margin-top:5%;
    width:fit-content
   }

  

   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    
   }

   .post1{
    margin-left:10px;
    width:32%
  }

  .postcamera{
    height:80px;
    width:80px;
    border-radius:50%;
    border:1px solid white
   }
  }
  
   
  @media (max-width: 480px) {
   
  .secondcontainer{
    margin-left:16%;
    margin-top:5%;
    width:fit-content
   }

   
   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    
   }

   .post1{
    margin-left:10px;
    width:32%
  }

  .postcamera{
    height:80px;
    width:80px;
    border-radius:50%;
    border:1px solid white
   }
  }
   

  .POstCONtainer{
                border-left:10px solid #121212;
                border-right:10px solid #121212;
                height: 350px;
                margin-left:-70px;
                width:88%;
                margin-top:40px;
              }


   .post1{
    height:300px;
    border-radius:5px; 
    border:1px solid #262626
   }       
   
   
   .postcamera{
    height:80px;
    width:80px;
    border-radius:50%;
    border:1px solid white
   }


   .sharefirstphoto{
    background-color:#0093f5;
    padding:10px;
    width:fit-content;
    border-radius: 10px;
    
   }


   @media only screen and (min-width: 1354px) and (max-width: 1354px) {
    .c {
        margin-top: 35px;  
    }

    .a{
      margin-top: 33px;  
    }

    .b{
      margin-top: 10px;  
    }

    

    .img{
    height: 190px;
    width:140%;
    border-radius:55%;
    margin-top:-50px
    
  }

  .note1{
    background: #363636;
    margin-left:40px;
    margin-top:-75px;
    position:absolute;
    border-radius:15px;
    width:7%
   }
    

    .footercontainer{
  padding:100px 0px 100px 50px;
}
.paddingfooter{
  padding: 10px
}

.footercontainer{
  padding:100px 0px 100px 50px;
}
.paddingfooter{
  padding: 10px
}

.paddingfooter2{
  margin-left:3%
}
     
}

@media screen and (min-width: 1604px) {
  .footercontainer {
    padding: 100px 0px 100px 50px;
  }
  
  .paddingfooter {
    padding: 10px;
  }
  
  .paddingfooter2 {
    margin-left: 30%;
  }

  .profileclick1 {
    height: 190px;
    width: 15%;
   margin-top:35px;
    border-radius: 55%;
   
  }
}
.imgprofile{
  height: 190px;
    width: 290%;
    background: #7d7d7d;
    border-radius: 55%;
}
 
.metacontainer {
  height: 300px;
  width: 480px;  
  background: #262626;
  border-radius: 10px;
}

 
@media only screen and (max-width: 600px) {
  .metacontainer {
    width: 430px;  
  }
}

 
@media only screen and (min-width: 601px) and (max-width: 700px) {
  .metacontainer {
    width: 370px;  
  }
}

 
@media only screen and (min-width: 701px) and (max-width: 800px) {
  .metacontainer {
    width: 350px;  
  }
}

 
@media only screen and (min-width: 801px) and (max-width: 900px) {
  .metacontainer {
    width: 350px;  
  }
}

 
@media only screen and (min-width: 901px) and (max-width: 1000px) {
  .metacontainer {
    width: 347px;  
  }
}

 
@media only screen and (min-width: 1001px) and (max-width: 1100px) {
  .metacontainer {
    width: 345px;  
  }
}


@media only screen and (min-width: 1101px) and (max-width: 1200px) {
  .metacontainer {
    width: 340px;  
  }
}

 
@media only screen and (min-width: 1201px) {
  .metacontainer {
    width: 340px; 
  }
}

.greybg{
  background: #262626;
  width:90%;
  padding:10px;
  border-radius: 10px
}

.greybg1{
  
  width:90%;
  padding:10px;
  border-radius: 10px
}

.greybg:hover{
  background: #292929;
}

.greybg1:hover{
  background: #292929;
 
}

.metacontainer:hover{
  background: #292929;
}





.img1{
        width:1.8%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }

 
@media only screen and (max-width: 600px) {
  

  .img1{
        width:6%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

 
@media only screen and (min-width: 601px) and (max-width: 700px) {
 

  .img1{
        width:5%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

 
@media only screen and (min-width: 701px) and (max-width: 800px) {
  

  .img1{
        width:5%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

 
@media only screen and (min-width: 801px) and (max-width: 900px) {
 

  .img1{
    width:4%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

 
@media only screen and (min-width: 901px) and (max-width: 1000px) {
  

  .img1{
    width:3.5%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

 
@media only screen and (min-width: 1001px) and (max-width: 1100px) {
  

  .img1{
    width:3%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}


@media only screen and (min-width: 1101px) and (max-width: 1200px) {
  

  .img1{
    width:2.8%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
 
}

 
@media only screen and (min-width: 1201px) and (max-width: 1300px) {
 

  .img1{
    width:2.7%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

@media only screen and (min-width: 1301px) and (max-width: 1400px) {
  

  .img1{
    width:2.5%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

@media only screen and (min-width: 1401px) and (max-width: 1500px) {
  

  .img1{
    width:2.5%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }
}

@media only screen and (min-width: 1501px) and (max-width: 1600px) {
  

  .img1{
    width:2.3%;
        height:34px;
        border-radius:50%;
        position: fixed
        
       
      }

      .vcolumn{
        width:55%
      }
}

@media only screen and (min-width: 1601px) and (max-width: 1700px) {
  

  .img1{
    width:2.3%;
        height:34px;
        border-radius:50%;
        position: fixed;      
      }

      .vcolumn{
        width:45%
      }


      
}


.vcolumnn:hover {
  cursor: not-allowed;
}



.vcolumn{
  background-color:#262626;
  height:120px;
  width:76%;
  border-radius:30px;
  
}

.vcolumnn{
  background-color:#262626;
  height:60px;
  width:76%;
  border-radius:15px;
  
}

.ccolumn{
  height:80px;
  width:80px;
  border-radius:50%;
  background-color:grey;
   
}


.ccolumnn{
  height:100px;
  width:76%;
  border-radius:15px;
  border:1px solid #313438;
  padding:25px 0px 90px 20px
   
}

@media only screen and (min-width: 890px) and (max-width: 1139px) {
  .marginleft{
   
    margin-left:-40px
  
   
}
}

.marginleft{
         margin-top:40px;
        height:40px;
        width:fit-content;
      }

      @media only screen and (min-width: 1601px) and (max-width: 1700px) {
  

        .marginleft{
       margin-left:-20px
      }    
}


@media only screen and (min-width: 1501px) and (max-width: 1600px) {
  

  .marginleft{
 margin-left:-20px
}    
}

@media only screen and (min-width: 860px) and (max-width: 1500px) {
  

  .marginleft{
 display: none
}    
}


 


      

.img2{
        width:142%;
        height:81px;
        border-radius:50%;
        margin-left:-11px
       
      }

.margintop{
  margin-top: 60px;
   
}

#bioInput::placeholder {
        color: #606770;
        
    }

    #bioInput2::placeholder {
        color: white;
        font-size:20px
        
    }

    #bioInput3::placeholder {
        color: white;
        font-size:20px
        
    }

    

  
    #bioInput{
      width:960%;
      height:80px
    }

    #bioInput2{
      width:960%;
      height:80px;
      color:white;
      background: transparent
    }

    #bioInput3{
      width:117%;
      height:60px;
      color:white;
      background: black
    }

    


    
    #bioInput2:hover {
        background-color: #262626;
    }

     
    #bioInput2 {
        transition: background-color 0.3s ease;
    }

    .iNput{
      border-radius:15px; 
      margin-top:10px; 
      background-color: transparent; 
      border: 1px solid #313438; 
      color: white; 
      padding-right: 30px;
    }

    .hiddencontent{
      height:400px;
      width:480px;
      position: absolute;
      background:#262626; 
      border-radius:25px;
    }


    .custom-checkbox {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
}

.custom-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 30px;
    width: 30px;
    background-color: transparent;
    border: 1px solid white;
    border-radius: 50%;
}

.custom-checkbox input:checked + .checkmark {
    background-color: white;
}

 
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.custom-checkbox input:checked + .checkmark:after {
    display: block;
}

.custom-checkbox .checkmark:after {
    left: 12.3px;
    top: 5px;
    width: 5px;
    height: 15px;
    border: solid black;  
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

/* From Uiverse.io by hahuy95 */ 
.toggle-switchh {
  position: relative;
  display: inline-block;
  width: 80px;
  height: 40px;
  cursor: pointer;
}

.toggle-switchh input[type="checkbox"] {
  display: none;
}

.toggle-switchh .toggle-switchh-background:hover {
  box-shadow: inset 0 0 0 2px #a9b1bf;
  transition: all 0.2s ease-in-out;
}

.toggle-switchh .toggle-switchh-handle:hover {
  transition: all 0.2s ease-in-out;
}

.toggle-switchh-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ddd;
  border-radius: 12px;
  box-shadow: inset 0 0 0 2px #ccc;
  transition: background-color 0.3s ease-in-out;
}

.toggle-switchh-handle {
  position: absolute;
  top: 5px;
  left: 5px;
  width: 30px;
  height: 30px;
  background-color: black;
  border-radius: 22%;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out;
}

.toggle-switchh::before {
  content: "";
  position: absolute;
  top: -25px;
  right: -35px;
  font-size: 12px;
  font-weight: bold;
  color: #aaa;
  text-shadow: 1px 1px #fff;
  transition: color 0.3s ease-in-out;
}

.toggle-switchh input[type="checkbox"]:checked + .toggle-switchh-handle {
  transform: translateX(45px);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 3px #12b76a;
}

.toggle-switchh input[type="checkbox"]:checked + .toggle-switchh-background {
  background-color: #12b76a;
  box-shadow: inset 0 0 0 2px #039855;
}

.toggle-switchh input[type="checkbox"]:checked + .toggle-switchh:before {
  content: "On";
  color: #12b76a;
  right: -15px;
}

.toggle-switchh
  input[type="checkbox"]:checked
  + .toggle-switchh-background
  .toggle-switchh-handle {
  transform: translateX(40px);
}




.toggle-checkbox {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  display: none;
}

.toggle-switch {
  background-color: gray;
  width: 78px;
  height: 32px;
  border-radius: 16px;
  position: relative;
  transition: 0.3s;
  cursor: pointer;
}

.toggle-switch::before {
  content: "";
  font-weight: 900;
  background-color: white;
  width: 24px;
  height: 24px;
  position: absolute;
  border-radius: 50%;
  top: 4px;
  left: 4px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #ddd;
  transition: 0.3s;
}

.toggle-checkbox:checked+.toggle-switch {
  background-color: #0075ff;
}

.toggle-checkbox:checked+.toggle-switch::before {
  content: "";
  left: 50px;
  color: #0075ff;
}*/
ChatGPT said:
ChatGPT
It looks like you have a CSS snippet for a toggle switch that is currently commented out. If you'd like to enable this toggle switch and customize it further, you can follow the steps below to set it up in your HTML and CSS.

HTML Setup
Here’s how you








 .submitbtn{
  background: #0093f5;
  height:50px;
   border-radius:10px;
  margin-top:30px;
  padding:10px 30px 10px 80px
 }

 .submitbtn:hover{
  background: white;
  color: black;
   
 }

 .profilesavedcontent{
  position: absolute;
  background-color:#262626;
  margin-top:-52px;
  width:99.5%;
  height:50px
 }


 
 .img9{
        width:118%;
        height:60px;
        border-radius:50%;
               
      }

  @media screen and (min-width: 1601px) and (max-width: 1607px) {
    .img9 {
        width: 168%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 1501px) and (max-width: 1600px) {
    .img9 {
        width: 182%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 1401px) and (max-width: 1500px) {
    .img9 {
        width: 200%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 1301px) and (max-width: 1400px) {
    .img9 {
        width: 270%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 1201px) and (max-width: 1300px) {
    .img9 {
        width: 350%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 1101px) and (max-width: 1200px) {
    .img9 {
        width: 470%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 1001px) and (max-width: 1100px) {
    .img9 {
        width: 900%;
        height: 60px;
        border-radius: 50%;
    }
}


@media screen and (min-width: 901px) and (max-width: 1000px) {
    .img9 {
        width: 3000%;
        height: 60px;
        border-radius: 50%;
    }
}

@media screen and (min-width: 801px) and (max-width: 900px) {
    .img9 {
        width: 5000%;
        height: 60px;
        border-radius: 50%;
    }
}

.homecolumN{
  margin-top:-0.7%;
}


 

     
@media screen and (min-width: 1601px) and (max-width: 1607px) {
  .homecolumN{
  margin-left:2%;
  
}
}

@media screen and (min-width: 1501px) and (max-width: 1600px) {
  .homecolumN{
  margin-left:3%;
   
}
}


@media screen and (min-width: 1401px) and (max-width: 1500px) {
  .homecolumN{
  margin-left:4%;
  
}
}

@media screen and (min-width: 1301px) and (max-width: 1400px) {
  .homecolumN{
  margin-left:5%;
   
}
}


@media screen and (min-width: 1201px) and (max-width: 1300px) {
  .homecolumN{
  margin-left:6%;
 
}
}

@media screen and (min-width: 1101px) and (max-width: 1200px) {
  .homecolumN{
  margin-left:7%;
  
}
}

@media screen and (min-width: 1001px) and (max-width: 1100px) {
  .homecolumN{
  margin-left:12%;
  
}
}

@media screen and (min-width: 901px) and (max-width: 1000px) {
  .homecolumN{
  margin-left:14%;

}
}

@media screen and (min-width: 801px) and (max-width: 900px) {
  .homecolumN{
  margin-left:10%;
   
}
}

.bghover:hover{
  background:#262626
}

.bghover{
  margin-left:-10%;
  background:#0093f5;
  border-radius:10px;
  height:40px;
  width:fit-content
}
.createcolumn{
  margin-top:-790px;
  margin-left:630px;
  position: absolute;
  background:black;
  border-radius:0px 0px 20px 20px ;
  height:700px;
  
}


.sharecolumn{
  margin-top:-790px;
  margin-left:400px;
  position: absolute;
  background:#262626;
  border-radius:0px 0px 20px 20px ;
  height:660px;
  
}

@media (min-width: 900px) and (max-width: 1000px) {
    .createcolumn {
        margin-left: 630px;  
        
    }
}

.postsecondcolumn{
  height:660px;
  background:#262626;
  border-radius:0px 0px 20px 20px;
 
}

.hsvg1{
  margin-top:40%;
  margin-left:40%;
}

.contentcreate{
 
  height:600px;
  border-radius: 0px 0px 0px 20px;
  background-color:grey
}

.img11{
    width:670%;
        height:46px;
        border-radius:50%;
           
      }

      .showemojis {
    font-size: 25px;
}
 

.spinner {
    margin: 0 auto;
    border: 3px solid #f3f3f3;
    border-top: 3px solid pink; 
    border-radius: 50%;
    width: 150px;
    height: 150px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .tick-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.checkmarkk {
    width: 150px;
    height: 150px;
    display: block;
    stroke-width: 2;
    stroke-miterlimit: 10;
    
}

.checkmark__circle {
    stroke-width: 2;  
    stroke-miterlimit: 10;
    fill: none;
    stroke: url(#gradient);  
}

.checkmark__check {
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    stroke: #4CAF50;  
    stroke-width: 2;  
    animation: tickAnimation 0.4s cubic-bezier(0.65, 0, 0.45, 1) 0.5s forwards;  
}

 
@keyframes tickAnimation {
    100% {
        stroke-dashoffset: 0;
    }
}


  </style>

 