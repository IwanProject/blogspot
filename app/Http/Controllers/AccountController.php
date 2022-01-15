<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.account.edit',[
            'title' => 'Edit Account Profile',
            'users'=> User::Where('id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255'
        ];


        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                $path = base_path() . "/public/post-image/" .  $request->oldImage;
                File::delete($path);
            }
            $image = $request->file('image');
            $extension = uniqid() ."." .  $image->getClientOriginalExtension();
            $images = $image->move(base_path() . "/public/post-image", $extension);
            $validateData['image'] = $extension;
        }



       User::where('id',$request->id)
                    ->update($validateData);
        return redirect('/dashboard/account/' . Auth()->user()->id . '/edit')->with('success','Account has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
