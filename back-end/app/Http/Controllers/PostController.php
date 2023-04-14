<?php

namespace App\Http\Controllers;
use App\Models\asso;
use App\Models\post;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //get product with creator
        return post::with('Categorie')->where('active',1)->get();
    }

    public function active()
    {
         //get product with creator
        return post::with('Categorie')->where('active',0)->get();
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
        $post =new post();
        $post->title=$request->input('title');
        $post->categorie_id=$request->input('Categorie_id');
        $post->subtitle=$request->input('subtitle');
        $post->image=$request->input('image');
        $post->tele=$request->input('tele');
        $post->email=$request->input('email');
        $post->localisation=$request->input('localisation');
        $post->active=0;
        $post->user_id=$request->user_id;
        $post->save();
        return ["response"=>"success"];
    }
 
    public function post(string $id)
    {
        return post::where('id', $id)->get();
        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return post::where('user_id', $id)->get();
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function activated(string $id)
    {
       
        return post::where('id', $id)->update(['active' => 1]);

    }
    public function desactivated(string $id)
    {
       
        return post::where('id', $id)->update(['active' => 0]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        //
     
        $post = post::findOrFail($user_id);
        
        $post->title = $request->title;
        $post->subtitle = $request->input('subtitle');
        
        $post->save();
        
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $post = Post::findOrFail($id);
       $userId = $post->user_id;
       $post->delete();
       $user = User::findOrFail($userId);
       $user->delete();
    }
    

    public function getpostbycategory(string $category_id)
    {
        $post=post::with('category'); 
        return $post;
    }
    

}
