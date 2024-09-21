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
           
             

            <div class="col-10 thirdcolumn"  >
                <h1>Edit</h1>
            </div>


            

        </div>
    </div>


    @include('more')
     
    
    @include('ajax')
</body>
</html>