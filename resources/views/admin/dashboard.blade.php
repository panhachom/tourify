<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
@include('layout.sidebar')
<div class="p-4 sm:ml-64">
        <h1 class="text-red-700">testing</h1>
        <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>

</div>
</body>
</html>

