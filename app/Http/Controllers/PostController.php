<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use APP\Models\Subscriber;
USE Illuminate\Support\Facades\Mail;

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
            Mail::raw($request->description, function($message) use($email,$request){
                $message->to($email)
                        ->subject($request->Str::title($value));
            });
        }
        return response()->json(['message'=>'Post all Created and Sent Emails!'], 200);
    }
}