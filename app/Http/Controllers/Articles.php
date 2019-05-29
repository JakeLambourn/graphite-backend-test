<?php

namespace App\Http\Controllers;

use App\Models\Article;

/**
 * Class Articles
 * @package App\Http\Controllers
 *
 * Methods to handle articles listing and single display
 */
class Articles extends Controller
{
    /**
     * Index route for the Articles
     *
     * This shows all published articles in the database to the end user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Load published articles
        $articles = Article::where('published', true)->get();

        return view('index', ['articles' => $articles]);
    }

    /**
     * Single full article view
     *
     * Allows the end user to view an article in its entirety
     *
     * @param int $id The ID of the article to display
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // TODO View single article, 404 if not present

        return view('article');
    }
}
