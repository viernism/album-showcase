<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.user-profile', compact('user'));
    }

    public function EditProfile(EditProfileRequest $request)
    {
        $user = auth()->user();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            
            // store original
            $imagePath = $image->storeAs('profile_images/original', $imageName, 'public');
            
            // crop image to 300x300
            $croppedImage = Image::make(public_path('storage/' . $imagePath))
                ->fit(300, 300)
                ->encode($image->getClientOriginalExtension(), 75);
            
            // generate cropped image name
            $croppedImageName = 'cropped_' . $imageName;
            
            // store the cropped image
            Storage::disk('public')->put('profile_images/cropped/' . $croppedImageName, $croppedImage);
            
            $user->photo= 'profile_images/cropped/' . $croppedImageName;
        }
        
        $user->save();
        
        return redirect()->back();
    }


    // i cant get the fucking image intervention to work bro gd2 missing library my fuckibng ass
    // public function EditProfile(EditProfileRequest $request)
    // {
    //     $user = auth()->user();
    //     $user->username = $request->input('username');
    //     $user->email = $request->input('email');
    //     $user->bio = $request->input('bio');

    //     if ($request->hasFile('photo')) {
    //         $image = $request->file('photo');
    //         $imageName = time().'.'.$image->getClientOriginalExtension();

    //         // store original image
    //         $imagePath = $image->storeAs('profile_images/original', $imageName, 'public');

    //         // update user's photo with the original image path
    //         $user->photo = $imagePath;
    //     }

    //     $user->save();

    //     return redirect()->back();
    // }
}
