<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * インデックスページの表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('translation.index');
    }
    
    public function image_share()
    {
        return view('translation.image_share');
    }
}
