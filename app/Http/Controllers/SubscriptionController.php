<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
         $request->validate([
            'email'=>'required|email',
            'website'=>'required|website',
         ]);
         Subscriber::create($request->all());
         return response()->json(['message'=>'Subscribed successfully!'],200);
    }
}
