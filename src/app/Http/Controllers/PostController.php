<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Picture;
use App\Models\post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use PHPUnit\Framework\Constraint\IsEmpty;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::
        with(['Picture','Comment.Employee'])->where('company_id',Auth::user()->employee->company_id)->latest()->get();
        
        return view('home', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'post' => ['required', 'string'],
        ]);

        $post = post::create([

            'content' => $attributes['post'],
            'employee_id' => Auth::user()->employee->id,
            'company_id' => Auth::user()->employee->company_id
        ]);

        if (!empty($request->images)) {
            foreach ($request->images as $image) {
                $imagespath = $image->store('post');

                $post->Picture()->create([
                    'url' => $imagespath,
                ]);
            }
        }

        return redirect('/home');
    }
}
