<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Article;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home(){
        $categories = Category::where('status' , 'active')->take(3)->get();
        $sliders = Slider::take(3)->get();
        $articles = Article::orderBy('created_at' , 'desc')->take(3)->get();
        return view('news.index' , compact('categories' , 'sliders' , 'articles'));
    }

    public function all($id){
        $categories= Category::findOrFail($id);
        $articles = Article::where('category_id' , $id)->orderBy('updated_at' , 'desc')->paginate('4');
        return response()->view('news.all-news' , compact('categories' , 'articles'));
    }
    // public function all($id){

    //     $categories = Category::findOrFail($id);
    //     $articles = Article::where('category_id' , $id)->orderBy('created_at' , 'desc')->paginate(4);
    //     return view('news.all-news' , compact('categories' , 'articles'));
    // }

    public function det($id){
        $articles = Article::find($id);
        return response()->view('news.newsdetailes' , compact('articles'));

    }

    public function contact(){
        return response()->view('news.contact');
    }

    public function storeContact(Request $request){

        $validator = Validator($request->all() ,[

        ]);

        if( ! $validator->fails()){
            $contacts = new Contact();
            $contacts->name = $request->get('name');
            $contacts->email = $request->get('email');
            $contacts->mobile = $request->get('mobile');
            $contacts->message = $request->get('message');

            $isSaved = $contacts->save();

            return response()->json(['icon' => $isSaved ? "success" : 'error' , 'title' => $isSaved ? "Created is Successfully" : 'Contact error'] , $isSaved ? 200 : 400);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator::getMessageBag()->first()] , 400);
        }
    }
}
