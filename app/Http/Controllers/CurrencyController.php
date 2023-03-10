<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

// soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $currencies = Currency::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.currency.index' , compact('currencies'));
    }

    //  function restore
    public function restore( $id)
    {
        $currencies = Currency::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $currencies = Currency::withCount('prices')->orderBy('id' ,'desc');
        $currencies = Currency::orderBy('id' ,'desc');

        if ($request->get('name')) {
            $currencies = Currency::where('name', 'like', '%' . $request->name . '%');
        }


        $currencies = $currencies->paginate(5);

        return response()->view('cms.currency.index' , compact('currencies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.currency.create');
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
            'name' => 'required',
        ] , [
            'name.required' => 'هذا الحقل مطلوب' ,

        ]);

        if(! $validator->fails()){

            $currencies = new Currency();
            $currencies->name = $request->get('name');
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/currency', $imageName);

                $currencies->image = $imageName;
                }

            $isSaved = $currencies->save();

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
        $currencies = Currency::withTrashed()->findOrFail($id);
        return response()->view('cms.currency.show' , compact( 'currencies' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currencies = Currency::findOrFail($id);
        return response()->view('cms.currency.edit' , compact('currencies'));
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
            'name' => 'required',
        ] , [
            'name.required' => 'هذا الحقل مطلوب' ,

        ]);

        if (! $validator->fails()){

            $currencies = Currency::findOrFail($id);
            $currencies->name = $request->get('name');
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/currency', $imageName);

                $currencies->image = $imageName;
                }

            $isUpdated = $currencies->save();
            return ['redirect' => route('currencies.index')];

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
        $currencies= Currency::withTrashed()->find($id);

    //  function destroy

        if($currencies->deleted_at == null){
            $currencies = Currency::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($currencies->deleted_at !== null){
            $currencies->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
        }
    }
}
