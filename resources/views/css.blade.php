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
  
  
  @media only screen and (min-width: 401px){
      body {
          font-family: Neue Helvetica
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

      .fourthcolumn{
        border-left:1px solid #262626;
        height:915px;
        margin-left:320px;
        padding:50px 0px 0px 55px;
        position:fixed;
        width:95%
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
        width:95%
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
      margin: 20px 0px 0px 180px;
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
    margin-top:80px;
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
                                      .scrollbar{
                                        overflow: auto;
                                      }
                      
                                      .scrollbar::-webkit-scrollbar-track {
                                          background-color:transparent;  
                                      }
                      
                                      .scrollbar::-webkit-scrollbar-thumb {
                                          background-color: #374045;  
                                          border-radius: 5px;  
                                           
                                      }
                      
                                      .scrollbar::-webkit-scrollbar-thumb:hover {
                                          background-color: #374045;  
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
    width: 400px;  
  }
}

 
@media only screen and (min-width: 701px) and (max-width: 800px) {
  .metacontainer {
    width: 400px;  
  }
}

 
@media only screen and (min-width: 801px) and (max-width: 900px) {
  .metacontainer {
    width: 410px;  
  }
}

 
@media only screen and (min-width: 901px) and (max-width: 1000px) {
  .metacontainer {
    width: 390px;  
  }
}

 
@media only screen and (min-width: 1001px) and (max-width: 1100px) {
  .metacontainer {
    width: 380px;  
  }
}


@media only screen and (min-width: 1101px) and (max-width: 1200px) {
  .metacontainer {
    width: 360px;  
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
  </style>