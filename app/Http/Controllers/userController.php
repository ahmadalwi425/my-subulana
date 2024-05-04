<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = [0];
        $data = User::whereNotIn('id',$id)->where('active',1)->get()->sortBy('name');
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = "";
        if(Auth::User()->id_level == 1){
            $data = level::get();
        }else{
            $id = [1];
            $data = level::whereNotIn('id_level',$id)->get()->sortByDesc('id_level');
        }
        return view('user.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->id_level = $request->id_level;
        $user->saldo = $request->nominal;
        $user->email = $request->email;
        $user->save();

        return redirect('user');

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
        $data = level::get();
        $user = User::findOrFail($id);
        return view('user.edit',compact('user','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        if(Auth::User()->id_level == 1){
            if($request->password != ""){
                $user->password = Hash::make($request->password);
            }
            $user->saldo = $request->nominal;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->id_level = $request->id_level;
            $user->email = $request->email;
        }else{
            $user->saldo = $request->nominal;
        }
        if($user->save()){
            return redirect('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
