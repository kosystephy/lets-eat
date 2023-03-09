<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function article(Request $request) {
        return response()->json([Article::where('id', $request["id"])->firstOrFail()]);
    }
}
