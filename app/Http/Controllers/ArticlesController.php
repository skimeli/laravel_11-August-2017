<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function index() {
//        $articles = Articles::all();
//        return response()->json($articles);$articles = Cache::remember('articles', 22*60, function() {
        $articles = Cache::remember('articles', 22*60, function() {
            return Article::all();
        });
        return response()->json($articles);

   }
}