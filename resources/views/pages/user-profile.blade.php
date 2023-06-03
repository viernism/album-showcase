@extends('layout.app', ['title' => 'free fire max makin hd'])

@section('content')
<div class="profile-main-wrapper">
    <div class="title-bar-wrapper">
        <div class="title-bar-content">
            <span class="title" style="color: white">libir profile</span>
            <div class="title-bar-btn-wrapper">
                <button class="title-bar-btn minimize">-</button>
                <button class="title-bar-btn close">x</button>
            </div>
        </div>
    </div>
    <div class="main-content-wrapper">
            <div class="profile-wrapper">
                <div class="profile-name">
                    <h3>{{ Auth::user()->username }}</h3>
                </div>
                <div class="profile-info">
                    <div class="profile-image" id="boxed">
                        <img src="{{{ asset('storage/' . $user->photo) }}}" alt="">
                    </div>
                    <div class="profile-data">
                        <div class="profile-row">
                            <div class="bio">
                                <div class="bio-header">
                                    <div class="mb-3">
                                    Bio:
                                    </div>
                                </div>
                                <div class="bio-content">
                                    {{ Auth::user()->bio }}
                                </div>  
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal-line">
                </div>
                <div class="profile-button">
                    <button type="button" class="btn-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="position-relative"></i>
                        <span class="btn-text">Edit Profile</span>
                    </button>
                </div>
            </div>
        </div>
</div>

<!-- edit profile lol-->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="title-bar-btn" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="image-and-inputs">
                    <div class="image-wrapper">
                        <img src="https://64.media.tumblr.com/f6abaab4202042b936ba2f561b7f81dc/893c0b4e28579d50-b4/s540x810/ce8b799c067b49c6cd6402868129235e58f4ef75.pnj" width="160" height="160" alt="">
                    </div>
                    <div class="inputs-wrapper">
                        <form action="{{ route('edit.profile') }}" method="post" enctype="multipart/form-data">>
                            @csrf
                            @method('PUT')
                        <div class="inputs-container">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username"
                                        value="{{ Auth::user()->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="bio" class="form-label">About</label>
                                    <textarea name="bio" id="bio" rows="1">{{ Auth::user()->bio }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label"><u>O</u>pen</label>
                                    <div class="input-with-background background-1">
                                       <input type="file" class="" id="photo" name="photo" value="">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn-2 btn-primary">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection