<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Article;
use App\Models\Price;
use App\Models\Question;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home(){
        // $services = Service::take(6)->get();

        $prices = Price::orderBy('created_at' , 'asc')->take(4)->get();

        return view('front.home' , compact('prices') );
    }

    public function about(){
        return view('front.about' );
    }

    public function services(){
        // $services = Service::orderBy('created_at' , 'desc');
        // return view('front.services' ,compact('services') );

        return view('front.services' );


    }
    public function currencies(){

        $prices = Price::orderBy('created_at' , 'desc')->first()->paginate('10');
        return view('front.currencies' ,compact('prices' ) );

    }

    public function archive(){
        // $prices = Price::all();
        // $archives = Archive::orderBy('created_at' , 'desc')->paginate('4');
        // return view('front.archive' ,compact('archives') );

        return view('front.archive'  );

    }
    public function news(){
        $articles = Article::orderBy('created_at' , 'desc')->paginate('4');
        return view('front.news' ,compact('articles') );
    }

    public function question(){
        $questions = Question::orderBy('created_at' , 'asc')->get();
        return view('front.questions' ,compact('questions') );

    }

    public function contact(){
        // $branchs = Branch::all();
        // return view('front.contactUs' ,compact('branchs') );

        return response()->view('front.contactUs');
    }


    public function storeContact(Request $request){

        $validator = Validator($request->all() ,[

        ]);

        if( ! $validator->fails()){
            $contacts = new Contact();
            $contacts->name = $request->get('name');
            $contacts->email = $request->get('email');
            $contacts->title = $request->get('title');
            $contacts->message = $request->get('message');

            $isSaved = $contacts->save();

            return response()->json(['icon' => $isSaved ? "success" : 'error' , 'title' => $isSaved ? "تم ارسال الرسالة بنجاح" : 'فشلت عملبة الارسال '] , $isSaved ? 200 : 400);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator::getMessageBag()->first()] , 400);
        }
    }
}
