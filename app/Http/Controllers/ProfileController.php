<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


class ProfileController extends Controller
{

    public function show(){
        return view('profile.view');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // dd($request->user());
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function infoedit(Request $request):RedirectResponse{
        // dd($request);
        //   dd('Form ishladi!', $request->all());

        $request->validate([
            'name'=>'required|min:3|max:200',
            'phone'=>'required|min:12|max:12',
            'bio'=>'required|max:200',
            'location'=>'required|max:200',
            'class'=>'required|min:1|max:2',
               'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // $request->user()->fill($request->validated());
       $user = auth()->user();
       $id=$user->id;
       $users=User::findOrFail($id);


        $users->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'location' => $request->location,
            'edu' => $request->class


        ]);


    // 1. Eski faylni o‘chirish
    if ($users->avatar) {
        Storage::disk('public')->delete('avatars/' . $users->avatar);
    }

    // 2. Yangi faylni o‘qish va crop qilish
    $image = Image::read($request->file('avatar'))
        ->cover(300, 300); // markazdan crop qiladi

    // 3. Fayl nomi va saqlash
    $filename = uniqid() . '.jpg';
    $path = 'avatars/' . $filename;

    $image->toJpeg(90)->save(storage_path('app/public/' . $path));

    // 4. Bazaga yozish
    $users->avatar = $filename;
    $users->save();

          return redirect()->back()->with('success','success');
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
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
