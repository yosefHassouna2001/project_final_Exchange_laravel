<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexArticle($id)
    {
        //
        $articles = Article::where('author_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.article.index', compact('articles','id'));
    }

    public function createArticle($id)
    {
        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();
        return response()->view('cms.article.create' , compact('categories' , 'authors' , 'id'));
    }
    public function index()
    {
        $articles = Article::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.article.indexAll' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();
        return response()->view('cms.article.create' , compact('categories' , 'authors' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() , [
            'title' => 'required|string|min:3|max:20',
            
        ] , [
            // 'name.required' => 'هذا الحقل مطلوب' ,
            // 'name.min' => 'لا يمكن اضافة اقل من 3 حروف' ,
            // 'name.max' => 'لا يمكن أضافة اكثر من 20 حرف'

        ]);

        if(! $validator->fails()){

            $articles = new Article();
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');

            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
                }

            $isSaved = $articles->save();
    
            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "Created is Failed"] , 400);
            }
        }
        else{
            return response()->json(['icon'=>'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }   
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $authors = Author::all();
        $articles = Article::findOrFail($id);
        return response()->view('cms.article.show' , compact('categories' , 'authors' , 'articles' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();
        $articles = Article::findOrFail($id);
        return response()->view('cms.article.edit' , compact('categories' , 'authors' , 'articles' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all() , [
            'title' => 'required|string|min:3|max:20',
            
        ] , [
           
        ]);

        if(! $validator->fails()){

            $articles = Article::findOrFail($id);
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
                }

            $isUpdate = $articles->save();
            return ['redirect'=>route('articles.index')];

            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "Created is Failed"] , 400);
            }
        }
        else{
            return response()->json(['icon'=>'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }   
     }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::destroy($id);
    }
}
