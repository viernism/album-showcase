@extends('layout.app', ['title' => 'free fire max makin hd'])

@section('content')
<div class="main-wrapper">
   <div class="title-bar-wrapper">
      <div class="title-bar-content">
         <span class="title" style="color: white">Gallery View</span>
         <div class="title-bar-btn-wrapper">
            <button class="title-bar-btn minimize">-</button>
            <button class="title-bar-btn close">x</button>
         </div>
      </div>
   </div>
   <div class="main-content-wrapper">
      <div class="col-6">
         <a href="#addDataModal" class="btn-1" data-bs-toggle="modal">
            <button class="btn-1">
               <span><u>A</u>dd&nbsp;New Data</span>
            </button>
         </a>
         <hr class="horizontal-line" style="width: 550px !important;">

         <!-- <a href="#deleteSelectedDataModal" class="btn-1" data-bs-toggle="modal">
            <button class="btn-1">
               <span><u>D</u>elete</span>
            </button>
         </a> -->
      </div>
      <div class="content" id="boxed">
         @foreach ($gallery as $item)
         <img id="boxed" class="gallery-image" src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}">
         <div class="text-wrapper">
            <div class="box-1">
               <h4 class="image-title">{{ $item->title }}</h4>
               <p class="image-description">{{ $item->desc }}</p>
            </div>
            <div class="button-wrapper">
              <!-- <a href="#deleteDataModal" class="" data-bs-toggle="modal">
            <button class="">
               <span><u>D</u>elete</span>
            </button>
            </a> -->

            <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editDataModal-{{ $item->id }}" data-gallery-id="{{ $item->id }}">
              <button>
                <span data-bs-toggle="tooltip" title="Edit"><u>E</u>dit</span>
              </button>  
            </a>
            </a>
            <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteDataModal" data-gallery-id="{{ $item->id }}">
              <button>
                <span data-bs-toggle="tooltip" title="Delete"><u>D</u>elete</span>
              </button>  
            </a>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
<!-- add modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
      @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addDataModalLabel">Make New Data</h5>
          <button type="button" class="title-bar-btn" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <div class="image-and-inputs">
            <div class="image-wrapper">
              <img src="https://64.media.tumblr.com/8a888939c27586ae45d2a35a7015a8f8/7f83443d0ec109a8-56/s540x810/10f8dd42251852a1290969424488420d91647c20.png" alt="" height="160" width="160">
            </div>
            <div class="inputs-wrapper">
              <div class="inputs-container">
                <div class="mb-3">
                  <label for="title" class="form-label"><u>T</u>itle</label>
                  <input type="text" class="" id="title" name="title">
                </div>
                <div class="mb-3">
                  <label for="desc" class="form-label"><u>D</u>escription</label>
                  <textarea class="" name="desc" id="desc" rows="2"></textarea>
                </div>
                <div class="mb-3">
                  <label for="usn" class="form-label"><u>O</u>pen</label>
                  <div class="input-with-background background-1">
                    <input type="file" class="" id="img" name="image" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn-2 btn-success">OK</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- edit -->
@foreach ($gallery as $item)
<div class="modal fade" id="editDataModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content text-white">
        <form method="POST" action="{{ url('/edit/'.$item->id) }}" class="edit-form">
           @csrf
           <div class="modal-header">
              <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
              <button type="button" class="title-bar-btn" data-bs-dismiss="modal" aria-label="Close">x</button>
           </div>
           <div class="modal-body">
              <div class="image-and-inputs">
                 <div class="image-wrapper">
                    <img src="https://64.media.tumblr.com/f6abaab4202042b936ba2f561b7f81dc/893c0b4e28579d50-b4/s540x810/ce8b799c067b49c6cd6402868129235e58f4ef75.pnj" width="160" height="160" alt="">
                 </div>
                 <div class="inputs-wrapper">
                    <div class="inputs-container">
                       <div class="mb-3">
                          <label for="edit-title" class="form-label"><u>T</u>itle</label>
                          <input type="text" class="" id="edit-title" name="title" value="{{ $item->title }}" required>
                       </div>
                       <div class="mb-3">
                          <label for="edit-desc" class="form-label"><u>D</u>escription</label>
                          <textarea type="text" class="" id="edit-desc" name="desc" rows="2" required>{{ $item->desc }}</textarea>
                       </div>
                       <div class="mb-3">
                          <label for="edit-photo" class="form-label"><u>O</u>pen</label>
                          <div class="input-with-background background-1">
                             <input type="file" class="" id="edit-photo" name="image" value="" required>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn-2 btn-primary">Save</button>
           </div>
        </form>
     </div>
  </div>
</div>
    @endforeach

<!-- delete -->
<div class="modal fade" id="deleteDataModal" tabindex="-1" aria-labelledby="deleteDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-white">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteDataModalLabel">WARNING</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="image-and-inputs">
                    <div class="image-wrapper">
                      <img src="https://64.media.tumblr.com/016da1fe17e4448ffe5dec8245bc6de2/a56aedd6feaabeea-69/s540x810/0396db374112ada8381638997a7b4ace003c9476.pnj" width="160" height="160" alt="">
                    </div>
                    <div class="inputs-wrapper">
                      <div class="inputs-container text-black-50">
                        <h5>WARNING!</h3>
                        <p>Are you sure you want to delete these records?</p>
                        <p><small>This action cannot be undone.</small></p>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="{{ route('gallery.delete', ':galleryId') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-2 btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection