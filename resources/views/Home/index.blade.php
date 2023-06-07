<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>File Sharing</title>
</head>
<body class="bg-dark text-white">
    <div class="container vh-100 w-100">
        <div class="row justify-content-center h-100">
            <div class="col-8 order-2 order-md-1 col-md-3 offset-md-1 my-md-auto">
                <form id="formUpload" action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input type="file" name="file" id="selectFile" class="form-control">
                </form>
            </div>
            <div class="col-md-6 order-md-2 my-auto mb-4 my-md-auto text-center">
                <img src="{{ asset('/images/logo.png') ?? '' }}" alt="">
                <p>File Sharing</p>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>