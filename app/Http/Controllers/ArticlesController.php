<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index(){
    //     return "This is article page from controller";
    // }

    // public function show($id){
    //     return "This is article page for ID " . $id;
    // }

    public function index(){
        //$articles = Article::all();
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id){
        $article = Article::find($id);
        if(empty($article))
            abort(404);
        return view('articles.show', compact('article'));
    }

    public function create(){
        //Fetch ข้อมูล tag มาให้เลือก
      
        //http://laravel.io/forum/01-08-2016-call-to-undefined-method-illuminatedatabasequerybuilderlists
        // -> lists ใช้ไม่ได้แล้ว
        //$tag_list = Tag::lists('name', 'id');
        $tag_list = Tag::pluck('name', 'id');
        //โดยข้อมูลไปที่ View
        return view('articles.create', compact('tag_list'));
    }

    // public function store(ArticleRequest $Request){
    //     // $input = Request::all();
    //     // Article::create($input);
    //     // Return redirect('articles');

    //     $article = new Article($request->all());
    //     Auth::user()->articles()->save($article);
    //     return redirect('articles');
    // }

    public function store(ArticleRequest $request){
        // $article = new Article($request->all());
        // Auth::user()->articles()->save($article);
        // $tagsId = $request->input('tag_list');
        // if(!empty($tagsId))
        //     //http://stackoverflow.com/questions/23968415/laravel-eloquent-attach-vs-sync
        //     $article->tags()->sync($tagsId);
        // return redirect('articles');


        $article = new Article($request->all());
        if($request->hasFile('image')){
            $image_filename = $request->file('image')->getClientOriginalName();
            $image_name = date('Ymd-His-').$image_filename;
            $public_path = 'images/articles/';
            $destination = base_path() . "/public/" . $public_path;
            $request->file('image')->move($destination, $image_name);
            $article->image = $public_path . $image_name;
        }
        Auth::user()->articles()->save($article);
        $tagsId = $request->input('tag_list');
        if(!empty($tagsId))
            //http://stackoverflow.com/questions/23968415/laravel-eloquent-attach-vs-sync
            $article->tags()->sync($tagsId);
        return redirect('articles');
    }

    // public function edit($id){
    //     $article = Article::find($id);
    //     if(empty($article))
    //         abort(404);
    //     return view('articles.edit', compact('article'));
    // }

    public function edit($id){
        $article = Article::find($id);
        $tag_list = Tag::pluck('name', 'id');
        //dd($article->tags->toArray());
        $array = array(100, 200, 300);
        //dd($array);
        //dd($article->tags->pluck('id')->toArray());
        
        if(empty($article))
            abort(404);
        return view('articles.edit', compact('article', 'tag_list'));
    }

    // public function update($id, ArticleRequest $request){
    //     $article = Article::findOrFail($id);
    //     $article->update($request->all());
    //     session()->flash('flash_message', 'Edit Article Complete');
    //     return redirect('articles');
    // }

    public function update($id, ArticleRequest $request){
        // $article = Article::findOrFail($id);
        // $article->update($request->all());
        // $tagsId = $request->input('tag_list');
        // if(!empty($tagsId))
        //     $article->tags()->sync($tagsId);
        // else
        //     $article->tags()->detach();
        // session()->flash('flash_message', 'Edit Article Complete');
        // return redirect('articles');

        $article = Article::findOrFail($id);
        $article->update($request->all());
        if($request->hasFile('image')){
            $image_filename = $request->file('image')->getClientOriginalName();
            $image_name = date('Ymd-His-').$image_filename;
            $public_path = 'images/articles/';
            $destination = base_path() . "/public/" . $public_path;
            $request->file('image')->move($destination, $image_name);
            $article->image = $public_path . $image_name;
            $article->save();
        }
        $tagsId = $request->input('tag_list');
        if(!empty($tagsId))
            $article->tags()->sync($tagsId);
        else
            $article->tags()->detach();
        session()->flash('flash_message', 'Edit Article Complete');
        return redirect('articles');
    }
}
