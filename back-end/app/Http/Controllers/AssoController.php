<?php

namespace App\Http\Controllers;

use App\Models\asso;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssoController extends Controller
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

    public function login(Request $request)
    {
        $response=['token'=>null];
        if(Auth::guard('asso')->attempt(['email' => $request->email, 'password' =>$request->password])){
            $user=Auth::guard('asso')->user();
            $token=$user->createToken('token',['asso'])->plainTextToken;
            $response=['token'=>$token];
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asso =new asso();
        $asso->nom=$request->input('nom');
        $asso->prenom=$request->input('prenom');
        $asso->image=$request->input('image');
        $asso->tele=$request->input('tele');
        $asso->niveau=$request->input('niveau');
        $asso->description=$request->input('description');
        $asso->email=$request->input('email');
        $asso->password=$request->input('password');
        $asso->tele=$request->input('tele');
        $asso->save();
        return ["response"=>"success"];
    }


    /**
     * Display the specified resource.
     */
    public function show(asso $asso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asso $asso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, asso $asso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asso $asso)
    {
        //
    }
}
