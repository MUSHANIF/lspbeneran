<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\validation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function validasi(Request $request)
    {
        $data = $request->all();
        $model = new validation;
      
        $model->userid = $request->userid;
        $model->image = $request->image;
        $model->nik = $request->nik;
        if($request->visa){
            $model->visa = $request->visa;
        }else{
            $model->visa = 'tidak ada visa';
        }
        $model->no_hp = $request->no_hp;
        $model->alamat = $request->alamat;
     
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/profile';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }


        $validasi = Validator::make($data, [
            'nik' => 'required|max:16|unique:validations',
           
            'no_hp' => 'required|max:15',
            'alamat' => 'required|max:30',
          
     

        ]);
        if ($validasi->fails()) {
            return Redirect::back()->withInput()->withErrors($validasi);
        }
       
        $model->save();

        toastr()->success('Berhasil di buat!', 'Sukses');
        return Redirect::back();
    }
}
