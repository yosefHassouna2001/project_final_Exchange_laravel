<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

// soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $questions = Question::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.question.index' , compact('questions'));
    }

    //  function restore
    public function restore( $id)
    {
        $questions = Question::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $questions = Question::orderBy('id' ,'desc');

        if ($request->get('title')) {
            $questions = Question::where('name', 'like', '%' . $request->name . '%');
        }

        $questions = $questions->paginate(5);

        return response()->view('cms.question.index' , compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.question.create');
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
            'description' => 'required',
        ] , [
            'title.required' => 'هذا الحقل مطلوب' ,
            'description.required' => 'هذا الحقل مطلوب' ,


        ]);

        if(! $validator->fails()){

            $questions = new Question();
            $questions->title = $request->get('title');
            $questions->description = $request->get('description');

            $isSaved = $questions->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "تمت عملية الاضافة بنجاح"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "فشلت عملية الاضافة"] , 400);
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
        $questions = Question::withTrashed()->findOrFail($id);
        return response()->view('cms.question.show' , compact( 'questions' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::findOrFail($id);
        return response()->view('cms.question.edit' , compact('questions'));
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
            'description' => 'required',
        ] , [
            'title.required' => 'هذا الحقل مطلوب' ,
            'description.required' => 'هذا الحقل مطلوب' ,


        ]);

        if (! $validator->fails()){

            $questions = Question::findOrFail($id);
            $questions->title = $request->get('title');
            $questions->description = $request->get('description');

            $isUpdated = $questions->save();
            return ['redirect' => route('questions.index')];

            if($isUpdated){
                return response()->json(['icon' => 'success' , 'title' => "تمت عملية التعديل بنجاح"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "فشلت عملية التعديل"] , 400);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $questions= Question::withTrashed()->find($id);

    //  function destroy

        if($questions->deleted_at == null){
            $questions = Question::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($questions->deleted_at !== null){
            $questions->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
        }
    }
}
