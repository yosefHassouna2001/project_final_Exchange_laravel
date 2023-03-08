<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

// soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.article.index' , compact('articles'));
    }

    //  function restore
    public function restore( $id)
    {
        $articles = Article::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $articles = Article::orderBy('id' ,'desc');


        if ($request->get('title')) {
            $articles = Article::where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->get('short_description')) {
            $articles = Article::where('short_description', 'like', '%' . $request->short_description . '%');
        }

        $articles = $articles->paginate(5);

        return response()->view('cms.article.index' , compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.article.create');
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
            'title' => 'required',
            'short_description' => 'required',
            'full_description' => 'nullable',
            'image' => 'required',

        ] , [
            'title.required' => 'الرجاء اضافة قيمة للعنوان' ,
            'short_description.required' => ' الرجاء اضافة قيمة للوصف ' ,
            'image.required' => ' الرجاء اضافة صورة  ' ,
        ]);

        if(! $validator->fails()){

            $articles = new Article();
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');


            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
                }

            $isSaved = $articles->save();

            return response()->json(['icon' => $isSaved ? 'success' : 'error' , 'title' => $isSaved ? "تمت عملية الاضافة بنجاح" : "فشلت عملية الاضافة"] , $isSaved ? 200 : 400);

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
        $articles = Article::withTrashed()->findOrFail($id);
        return response()->view('cms.article.show' , compact('articles' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);
        return response()->view('cms.article.edit' , compact( 'articles' ));
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
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'required',


        ] , [
            'title.required' => 'الرجاء اضافة قيمة للعنوان' ,
            'short_description.required' => ' الرجاء اضافة قيمة للوصف ' ,
            'image.required' => ' الرجاء اضافة صورة  ' ,

        ]);

        if(! $validator->fails()){

            $articles = Article::findOrFail($id);
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
                }

            $isUpdate = $articles->save();
            return ['redirect'=>route('articles.index')];

            return response()->json(['icon' => $isUpdate ? 'success' : 'error' , 'title' => $isUpdate ? "تمت عملية التعديل بنجاح" : "فشلت عملية التعديل"] , $isUpdate ? 200 : 400);

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
        $articles= Article::withTrashed()->find($id);

        //  function destroy

            if($articles->deleted_at == null){
                $articles = Article::destroy($id);

                return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
            }

        //  function forceDelete

            if($articles->deleted_at !== null){
                $articles->forceDelete();

                return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
            }
        }
    }
