<?php

namespace App\Http\Controllers;

use App\Repositories\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(protected Post $post)
    {
        //
    }

    public function index(): View
    {
        $posts = $this->post->getPosts();

        return view('home', $this->post->sortByType($posts));
    }
}
