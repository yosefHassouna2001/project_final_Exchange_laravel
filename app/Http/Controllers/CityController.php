<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;

use Illuminate\Http\Request;

class CityController extends Controller
{
    // soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $cities = City::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.city.index' , compact('cities'));
    }

    //  function restore
    public function restore( $id)
    {
        $cities = City::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities= City::with('country')->orderBy('id' , 'desc');

    if ($request->get('name')) {
        $cities = City::where('name', 'like', '%' . $request->name . '%');
    }
    if ($request->get('street')) {
        $cities = City::where('street', 'like', '%' . $request->street . '%');
    }


    $cities = $cities->paginate(10);


    return response()->view('cms.city.index' , compact('cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create' , compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[
            'name'=> 'required|string|min:3|max:20',
            'street' => 'required',
            'country_id' => 'required:cities',
        ],[
            'name.required' =>"الرجاء ادخال اسم المدينة !",
            'name.min' =>"لا يقبل اسم المدينة اقل من 3 حروف !",
            'name.max' =>"لا يقبل اسم المدينة اكثر من 30 حروف !",
            'street.required' =>"الرجاء ادخال اسم الشارع !",
            'country_id.required' =>"الرجاء ادخال اسم الدول !",
        ]

        );

        if(! $validator->fails()){
            $cities = new City();
            $cities->name = $request->input('name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');

            $isSaved = $cities->save();

            return response()->json(['icon' => $isSaved ? 'success' : 'error' , 'title' => $isSaved ? "تمت عملية الاضافة بنجاح" : "فشلت عملية الاضافة"] , $isSaved ? 200 : 400);

        }

        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
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

        $countries = Country::all();
        $cities = City::withTrashed()->findOrFail($id);
        return response()->view('cms.city.show' , compact( 'countries' , 'cities'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $cities = City::findOrFail($id);
        return response()->view('cms.city.edit' , compact('countries' , 'cities'));
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
        $validator = Validator($request->all() ,[
            'name'=> 'required|string|min:3|max:20',
            'street' => 'required',
            'country_id' => 'required:cities',
        ],[
            'name.required' =>"الرجاء ادخال اسم المدينة !",
            'name.min' =>"لا يقبل اسم المدينة اقل من 3 حروف !",
            'name.max' =>"لا يقبل اسم المدينة اكثر من 30 حروف !",
            'street.required' =>"الرجاء ادخال اسم الشارع !",
            'country_id.required' =>"الرجاء ادخال اسم الدول !",
        ]
        );

        if(! $validator->fails()){
            $cities = City::findOrFail($id);
            $cities->name = $request->input('name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');

            $isUpdate = $cities->save();
            return ['redirect' => route('cities.index')];
            return response()->json(['icon' => $isUpdate ? 'success' : 'error' , 'title' => $isUpdate ? "تمت عملية التعديل بنجاح" : "فشلت عملية التعديل"] , $isUpdate ? 200 : 400);

        }

        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
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
        $cities= City::withTrashed()->find($id);

    //  function destroy

        if($cities->deleted_at == null){
            $cities = City::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($cities->deleted_at !== null){
            $cities->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
        }
    }
}
