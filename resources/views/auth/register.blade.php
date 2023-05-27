<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- local css -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.3.0/remixicon.css" integrity="sha512-0JEaZ1BDR+FsrPtq5Ap9o05MUwn8lKs2GiCcRVdOH0qDcUcCoMKi8fDVJ9gnG8VN1Mp/vuWw2sMO0SQom5th4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{ $title ?? 'app-name' }}</title>
</head>
<body>
<div class="container">
        <div class="login-wrapper">
            <div class="title-bar-wrapper">
                <div class="title-bar-content">
                    <span class="title" style="color: white">Forms</span>
                    <div class="title-bar-btn-wrapper">
                        <button class="title-bar-btn minimize">?</button>
                        <button class="title-bar-btn close">x</button>
                    </div>
                </div>
            </div>
            <div class="login-content">
                <div class="login-content-wrapper">
                    <div class="image-text-input">
                    <div class="input-wrapper">
                            <label for="name"><u>N</u>ame</label><br>
                            <input type="text" name="name" value=""><br>

                            <label for="username"><u>U</u>sername</label><br>
                            <input type="text" name="username" value=""><br>

                            <label for="email"><u>E</u>maiil</label><br>
                            <input type="email" name="email" value=""><br>

                            <label for="password"><u>P</u>assword</label><br>
                            <input type="password" name="password" value=""><br>

                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button type="button" class="btn-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <div class="button-spacer"></div>
                        <button type="submit" class="btn-2 btn-success">OK</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- local js -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>