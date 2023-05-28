<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- local css -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

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
                    <span class="title" style="color: white">Enter Windows Password</span>
                    <div class="title-bar-btn-wrapper">
                        <button class="title-bar-btn minimize">?</button>
                        <button class="title-bar-btn close">x</button>
                    </div>
                </div>
            </div>
            <div class="login-content">
                <div class="image-text-input">
                    <div class="image-wrapper">
                    <img src="https://64.media.tumblr.com/fea224ab1bbbd524fde942407a1fde80/3539788757590a63-16/s540x810/4e4b8027b88b8e0c15ad7272e548a9d02d4079aa.pnj" height="120" width="120" alt="">
                    </div>
                    <div class="text-wrapper">
                        <p>Type a name to identify yourself to Windows. Enter a password if you want to.</p>
                        <p></p> <br>
                        <p>Tip: If you don't enter a password. you won't get into the Windows</p>
                        <p></p>
                        <div class="input-wrapper">
                            <div class="input-title-wrapper">
                                <label for="email" class="form-label"><u>E</u>mail</label><br>
                                <label for="password"><u>P</u>assword</label>
                            </div>
                            <div class="input-content-wrapper">
                                <input type="email" name="email" value=""><br>
                                <input type="password" name="password" value=""><br>
                            </div>
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
   
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- local js -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>