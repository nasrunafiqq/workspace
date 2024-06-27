<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
         'comment' => ['required','string']   
        ]);

        comment::create([
        'post_id' => $request['post_id'],
        'comment' => $request['comment'],
        'employee_id' => Auth::user()->employee->id
        ]);

        return redirect('/home');
    }
}
