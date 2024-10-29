<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use APP\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendPostEmailJob;

class PostController extends Controller
{
    //declaring function
    public function newPost(Request $request)
    {
        $request->validate([
            'website'=>'required|string',
            'title'=>'required|string',
            'descrition'=>'required|string',

        ]);
        $post = Post::create($request->all());
        $subscribers = Subscriber::where('website', $request->website)->pluck('email');
        foreach($subscribers as $email){
            dispatch(new SendPostEmailJob($email, $request->title, $request->description));
        }
    
        return response()->json(['message'=>'Post all Created and Sent Emails!'], 200);
    }
}