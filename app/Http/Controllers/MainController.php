<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function namai()
    {
        return view('namai');
    }
    public function about()
    {
        return view('about');
    }
    public function review()
    {
        $reviews = new Contact();
       // dd($reviews->all());
        return view('review', ['reviews'=>$reviews->all()]);
    }
    
    public function review_check(Request $request)
    {
        //dd($request); isveda visu formoje pateikiamus duomenis
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500'
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('review');

    }
}