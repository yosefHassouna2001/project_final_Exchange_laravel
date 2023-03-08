<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\City;
use Illuminate\Http\Request;

class BranchController extends Controller
{
     // soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $branches = Branch::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.branch.index' , compact('branches'));
    }

    //  function restore
    public function restore( $id)
    {
        $branches = Branch::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branches= Branch::with('city')->orderBy('id' , 'desc');

        if ($request->get('address')) {
            $branches = Branch::where('address', 'like', '%' . $request->address . '%');
        }
        if ($request->get('email')) {
            $branches = Branch::where('email', 'like', '%' . $request->email . '%');
        }


        $branches = $branches->paginate(10);


        return response()->view('cms.branch.index' , compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return response()->view('cms.branch.create' , compact('cities'));
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
            'address'=> 'required',
            'phone' => 'required',
            'email' => 'required',
        ],[
            'address.required' =>"الرجاء ادخال العنوان !",
            'phone.required' =>"الرجاء ادخال رقم الموقع !",
            'email.required' =>"الرجاء ادخال الايميل  !",
        ]

        );

        if(! $validator->fails()){
            $branches = new Branch();
            $branches->address = $request->input('address');
            $branches->phone = $request->get('phone');
            $branches->email = $request->get('email');
            $branches->city_id = $request->get('city_id');

            $isSaved = $branches->save();

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
        $cities = City::all();
        $branches = Branch::withTrashed()->findOrFail($id);
        return response()->view('cms.branch.show' , compact( 'cities' , 'branches'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $branches = Branch::findOrFail($id);
        return response()->view('cms.branch.edit' , compact('cities' , 'branches'));
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
            'address'=> 'required',
            'phone' => 'required',
            'email' => 'required',
        ],[
            'address.required' =>"الرجاء ادخال العنوان !",
            'phone.required' =>"الرجاء ادخال رقم الموقع !",
            'email.required' =>"الرجاء ادخال الايميل  !",
        ]
        );

        if(! $validator->fails()){
            $branches = Branch::findOrFail($id);
            $branches->address = $request->input('address');
            $branches->phone = $request->get('phone');
            $branches->email = $request->get('email');
            $branches->city_id = $request->get('city_id');

            $isUpdate = $branches->save();
            return ['redirect' => route('branches.index')];
            return response()->json(['icon' => $isUpdate ? 'success' : 'error' , 'title' => $isUpdate ? "تمت عملية الاضافة بنجاح" : "فشلت عملية الاضافة"] , $isUpdate ? 200 : 400);

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
        $branches= Branch::withTrashed()->find($id);

    //  function destroy

        if($branches->deleted_at == null){
            $branches = Branch::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($branches->deleted_at !== null){
            $branches->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
        }
    }
}
