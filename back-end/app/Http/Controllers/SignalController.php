<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use App\Models\Signal;
use Illuminate\Http\Request;

class SignalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Signal::with('post','User')->get();
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
        // $signal =new Signal();
        // $signal->name=$request->input('name');
        // $signal->description=$request->input('description');
        // $signal->post_id=$request->input('post_id');
        // $signal->user_id=$request->user_id;
        // $signal->save();
        // return ["response"=>"success"];
    }

    public function signaler(Request $request){

        $signal =new Signal();
        $signal->name=$request->input('name');
        $signal->description=$request->input('description');
        $signal->post_id=$request->input('post_id');
        $signal->user_id=$request->user_id;
        $signal->save();
        return ["response"=>"success"];
    }

    /**
     * Display the specified resource.
     */
    public function show(Signal $signal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signal $signal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Signal $signal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signal $signal)
    {
        //
    }
}
