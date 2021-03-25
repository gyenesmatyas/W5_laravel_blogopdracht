<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //De index laat een lijst van een resource zien
    public function index(){

        //ALS ER EEN TAG IN URL ZIT
        if(\request('tag'))
        {
            $articles= Tag::where('name',\request('tag'))->firstOrFail()->articles;
            return view('articles.index',['articles'=>$articles]);
        }
        //ALS ER GEEN TAG IN DE URL ZIT
        $articles= Article::latest()->get();
        return view('articles.index',['articles'=>$articles]);
    }

    //shows a single resource
    public function show(Article $article){
        return view('articles.show',['article'=>$article]);
    }

    //shows a view to create a new resource
    public function create(){
        return view('articles.create',[
            'tags'=>Tag::all()
        ]);
    }

    //handle the submit van de create
    public function store(){
        $article = new Article($this->validateArticle());
        $article->user_id=1;
        $article->save();

        $article->tags()->attach(\request('tags'));

        return redirect(route('articles.index'));
    }

    //show a view to edit an existing resource
    public function edit(Article $article){
        return view('articles.edit',compact('article'));
    }

    //handle the edit, so update it
    public function update(Article $article){
         $article->update($this->validateArticle());
        return redirect($article->path());
    }

    //destroy or delete an existing resource
    public function destroy(Article $article){
        $article->delete();
        return redirect(route('articles.index'));
    }

    /*De functie validateArticle, omdat we deze op twee plaatsen gebruiken*/
    protected function validateArticle()
    {
        return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            'tags'=> 'exists:tags,id'
        ]);
    }




}
