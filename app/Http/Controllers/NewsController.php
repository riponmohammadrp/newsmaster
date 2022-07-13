<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('id','DESC')->limit(8)->get();
        return view('index')
            ->with([
                'news'=>$news
            ]);
    }

    public function addNews(){
        return view('admin.add');
    }

    public function insertNews(Request $req){
        $this->validate($req, [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $news = new News;
        $news->title = $req->title;
        $news->category = $req->category;
        $news->description = $req->description;

        $filename = $req->file('image')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $actual_filename = $genID . "_" . $filename;
        $req->file('image')->storeAs('public', $actual_filename);

        $news->image = $actual_filename;
        $news->save();

        return redirect('home')->with('msg','Successfully Added');
    }

    public function deleteNews($id){
        News::find($id)->delete();
        return redirect('home')->with('msg','Successfully Deleted');
    }

    public function categorySearch($category){
        $news = News::where('category', $category)->get();
        return view('index', compact('news'));
    }

    public function newsDetail($id){
        $news = News::find($id);
        return view('details', compact('news'));
    }

    public function loadNews(){
        return News::all();
    }
}
