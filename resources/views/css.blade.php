<style>
.register {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    padding: 3%;
}

#register:hover {
    background-color: black;
    color: white;
  }

  #login:hover {
    background-color: black;
    color: white;
  }

.register-left {
    text-align: center;
    color: #fff;
    margin-top: 4%;
}

.register-left input {
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}

.register-right {
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}

.register-left img {
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite alternate;
    animation: mover 1s infinite alternate;
}

@-webkit-keyframes mover {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-20px);
    }
}

@keyframes mover {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-20px);
    }
}

.register-left p {
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}

.register .register-form {
    padding: 10%;
    margin-top: 10%;
}

.btnRegister {
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}

.register .nav-tabs {
    margin-top: 3%;
    border: none;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}

.register .nav-tabs .nav-link {
    padding: 2%;
    font-weight: 600;
    border-radius: 1.5rem;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.register .nav-tabs .nav-link:hover {
    border: none;
}

.register .nav-tabs .nav-link.active {
    border-radius: 1.5rem;
}

 
#home-tab, #profile-tab {
    background-color: white;
    color: black;
}

 
.nav-link.active {
    background-color: #0062cc !important;
    color: white !important;
}

 
.nav-link.inactive {
    background-color: white;
    color: black;
}


 
.nav-link {
    background-color: white;
    color: black;
    transition: background-color 0.3s ease, color 0.3s ease;
    text-decoration: none;
}

 
.nav-link.active1 {
    background-color: #0062cc !important;
    color: white !important;
    text-decoration: none;
}

 
.nav-link.inactive {
    background-color: white;
    color: black;
}





</style>