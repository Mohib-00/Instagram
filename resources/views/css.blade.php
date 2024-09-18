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

    .img{
      width:1250%;
      border-radius:50%;
     
    }
    .secondcolumn{
      border-left:1px solid #262626;
      height:915px;
      margin-left:320px;
      position:fixed
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


</style>