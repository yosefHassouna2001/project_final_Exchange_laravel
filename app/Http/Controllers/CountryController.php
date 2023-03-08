<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

// soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $countries = Country::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.country.index' , compact('countries'));
    }

    //  function restore
    public function restore( $id)
    {
        $countries = Country::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $countries = Country::withCount('cities')->orderBy('id' ,'desc');

        if ($request->get('name')) {
            $countries = Country::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('code')) {
            $countries = Country::where('code', 'like', '%' . $request->code . '%');
        }

        $countries = $countries->paginate(5);

        return response()->view('cms.country.index' , compact('countries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
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
            'name' => 'required|string|min:3|max:20',
            'code' => 'required|numeric|digits:3',
        ] , [
            'name.required' => 'هذا الحقل مطلوب' ,
            'name.min' => 'لا يمكن اضافة اقل من 3 حروف' ,
            'name.max' => 'لا يمكن أضافة اكثر من 20 حرف' ,
            'name.string' => 'لا يمكن أضافة اكثر من 20 حرف' ,
            'code.required' => 'هذا الحقل مطلوب' ,
            'code.numeric' => 'يرجى كتابة الكود رقم' ,
            'code.digits' => 'لا يمكن أضافة اكثر من 3 ارقام' ,

        ]);

        if(! $validator->fails()){

            $countries = new Country();
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');

            $isSaved = $countries->save();

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
        $countries = Country::withTrashed()->findOrFail($id);
        return response()->view('cms.country.show' , compact( 'countries' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit' , compact('countries'));
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
            'name' => 'required|string|min:3|max:20',
            'code' => 'required|numeric|digits:3',
        ] , [
            'name.required' => 'هذا الحقل مطلوب' ,
            'name.min' => 'لا يمكن اضافة اقل من 3 حروف' ,
            'name.max' => 'لا يمكن أضافة اكثر من 20 حرف' ,
            'name.string' => 'لا يمكن أضافة اكثر من 20 حرف' ,
            'code.required' => 'هذا الحقل مطلوب' ,
            'code.numeric' => 'يرجى كتابة الكود رقم' ,
            'code.digits' => 'لا يمكن أضافة اكثر من 3 ارقام' ,

        ]);

        if (! $validator->fails()){

            $countries = Country::findOrFail($id);
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');

            $isUpdated = $countries->save();
            return ['redirect' => route('countries.index')];
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
        $countries= Country::withTrashed()->find($id);

    //  function destroy

        if($countries->deleted_at == null){
            $countries = Country::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($countries->deleted_at !== null){
            $countries->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
        }
    }
}
