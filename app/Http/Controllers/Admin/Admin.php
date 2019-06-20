<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function add(Request $request)
    {
        //this code is self explanatory
        // Update, spelling mistakes fixed
        if ($request->isMethod("post")) {
            $data = $request->only(['title', 'content', 'published']);
            $data['published'] = ($data['published'] ?? '') == 'on';
            $article = new Article($data);
            $article->title = $data['title'];
            $article->content = $data['content'];
            $article->published = !!$data['published'];
            $article->save();
            return redirect()->route('home');
        }

        return view('admin.add_article');
    }
}
