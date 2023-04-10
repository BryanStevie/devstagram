<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        //attach = agrega el registro y los campos foraneos
        $user->followers()->attach(auth()->user()->id);

        return back();
    }

    public function destroy(User $user)
    {
        //detach = elimina los datos del registro y sus claves foraneas
        $user->followers()->detach(auth()->user()->id);

        return back();
    }
}
