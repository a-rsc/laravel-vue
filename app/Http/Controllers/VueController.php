<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VueController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($page = 2)
    {
        if ($page == 1)
        {
            return redirect('http://jsfiddle.net/a_rsc/eg76axmy/4/');
        }
        else if (view()->exists("lessons.{$page}"))
        {
            return view("lessons.{$page}");
        }

        return redirect('lessons/2');
    }
}
