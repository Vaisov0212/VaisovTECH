<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
           // dd($request);
        $request->validate([
            'name'=>'required|min:3|max:200',
            'phone'=>'required|min:12|max:12',
            'bio'=>'required|max:200',
            'location'=>'required|max:200',
            'class'=>'required|min:1|max:2'
        ]);

        // $request->user()->fill($request->validated());
        $id=$request->id;
        $user= User::findOrFail($id);
        $user->name=$request->get('name');
        $user->phone=$request->get('phone');
        $user->bio=$request->get('bio');
        $user->location=$request->get('location');
        $user->class=$request->get('class');

          return redirect()->back()->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
