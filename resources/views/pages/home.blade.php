@extends('layout.app', ['title' => 'free fire max makin hd'])

@section('content')
<div class="main-wrapper">
        <div class="main">
            <div class="title-bar-wrapper">
                <div class="title-bar-content">
                    <span class="title" style="color: white">Gallery View</span>
                    <div class="title-bar-btn-wrapper">
                        <button class="title-bar-btn minimize">-</button>
                        <button class="title-bar-btn close">x</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <a href="#addDataModal" class="btn-1" data-bs-toggle="modal">
                    <button class="btn-1">
                        <span>
                            <u>A</u>dd&nbsp;New Data
                        </span>
                    </button>
                </a>
                <a href="#deleteSelectedDataModal" class="btn-1" data-bs-toggle="modal">
                    <button class="btn-1">
                        <span>
                            <u>D</u>elete
                        </span>
                    </button>
                </a>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <img id="boxed" class="gallery-image" src="https://media.tenor.com/wuyEcsxrvQwAAAAM/club-penguin-ghosthy.gif" alt="">
                    <div class="box">
                        <h4 class="image-title">would be the image title lol</h4>
                        <p class="image-description">
                            deskripsiton
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="addDataModalLabel">Add User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="mb-3">
                        <label for="usn" class="form-label">Username</label>
                        <input type="text" class="form-control" id="usn" name="username" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-success">Add</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection