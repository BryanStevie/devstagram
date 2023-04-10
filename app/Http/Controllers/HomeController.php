<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Metodo se manda a llamar automaticamente como un constructor
    public function __invoke()
    {
        //Obtener a quienes seguimos
        //->toArray() = convierte el objeto a un arreglo
        //->pluck('id') = Solo el campo que deseamos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
