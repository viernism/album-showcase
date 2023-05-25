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
            <div class="content-wrapper">
                <div class="content">
                <img id="boxed" src="https://media.tenor.com/wuyEcsxrvQwAAAAM/club-penguin-ghosthy.gif" alt="">
                    <div class="box">
                        <h4>would be the image title lol</h4>
                        <p>
                            deskripsiton
                        </p>
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection