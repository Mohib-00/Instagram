 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="admin-container">
        <button
            type="button"
            style="border-radius: 20px; border: 1px solid green; transition: background-color 0.5s ease, color 0.3s ease;"
            class="registerbtn p-2"
            id="logout">
            <h3>Admin Logout</h3>
            <h1>Welcome, {{ $userName }}</h1>
        </button>
    </div>
    @include('ajax')
</body>
</html>
