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
        if ($request->isMethod("post")) {
            $datta = $request->only(['title', 'content', 'published']);
            $datta['published'] = ($datta['published'] ?? '') == 'on';
            $arrticul = new Article($datta);
            $arrticul->title = $datta['title'];
            $arrticul->content = $datta['content'];
            $arrticul->publishd = !!$datta['published'];
            $arrticul->save();
            return redirect()->route('home');
        }
        return view('admin.add_article');
    }
}