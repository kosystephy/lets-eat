<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function getArticle(Request $request) {
        return response()->json([Article::where('id', $request["id"])->firstOrFail()]);
    }

    public function addArticle(Request $request){
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->thumbnailURL = $request->input('thumbnailURL');
        $article->mediaType = $request->input("mediaType");
        $article->mediaURL = $request->input("mediaURL");
        $article->leadStory = $request->input("leadStory");
        $article->save();
        return $article;
    }
    public function editArticle(Request $request,$id) {
        
        $article = Article::findOrFail($id);
        //$article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->thumbnailURL = $request->input('thumbnailURL');
        $article->mediaType = $request->input("mediaType");
        $article->mediaURL = $request->input("mediaURL");
        $article->leadStory = $request->input("leadStory");
        $article->save();
        return $article;
        //return response()->json([Article::where('id', $request["id"])->firstOrFail()]);
    }
    public function removeArticle($id) {
        return Article::findOrFail($id)->delete();
    }
    public function short($id){
        $article = Article::findOrFail($id);
        $article->content = "";
        $article->mediaURL ="";
        return $article;
    }
}
