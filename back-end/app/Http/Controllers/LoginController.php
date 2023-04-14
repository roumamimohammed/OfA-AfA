<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asso;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function details(){
        $asso=Auth::user()->only('id','image','nom','prenom','email');
        return response()->json(['data'=>$asso]);
    }
}
