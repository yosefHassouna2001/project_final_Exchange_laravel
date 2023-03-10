<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    // soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $prices = Price::onlyTrashed()->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.price.index' , compact('prices'));
    }

    //  function restore
    public function restore( $id)
    {
        $prices = Price::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prices= Price::orderBy('id' , 'desc');
        $currencies = Currency::all();

    if ($request->get('name')) {
        $prices = Price::where('name', 'like', '%' . $request->name . '%');
    }



    $prices = $prices->paginate(10);


    return response()->view('cms.price.index' , compact('prices' , 'currencies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::all();
        return response()->view('cms.price.create' , compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request  )
    {
        $validator = Validator($request->all() ,[
            'buy_price'=> 'required',
            'sale_price' => 'required',
            'currency_id' => 'required:prices',
        ],[
            'buy_price.required' =>"الرجاء ادخال سعر الشراء  !",
            'sale_price.required' =>"الرجاء ادخال سعر البيع  !",
            'currency_id.required' =>"الرجاء ادخال اسم العملة !",
        ]
        );

        if(! $validator->fails()){
            $prices = new Price();
            $prices->buy_price = $request->input('buy_price');
            $prices->sale_price = $request->get('sale_price');
            $prices->currency_id = $request->get('currency_id');

            $isSaved = $prices->save();

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

        $currencies = Currency::all();
        $prices = Price::withTrashed()->findOrFail($id);
        return response()->view('cms.price.show' , compact( 'currencies' , 'prices'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currencies = Currency::all();
        $prices = Price::findOrFail($id);
        return response()->view('cms.price.edit' , compact('currencies' , 'prices'));
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
            'buy_price'=> 'required',
            'sale_price' => 'required',
            'currency_id' => 'required:prices',
        ],[
            'buy_price.required' =>"الرجاء ادخال سعر الشراء  !",
            'sale_price.required' =>"الرجاء ادخال سعر البيع  !",
            'currency_id.required' =>"الرجاء ادخال اسم العملة !",
        ]
        );

        if(! $validator->fails()){
            $prices = Price::findOrFail($id);
            $prices->buy_price = $request->input('buy_price');
            $prices->sale_price = $request->get('sale_price');
            $prices->currency_id = $request->get('currency_id');

            $isUpdate = $prices->save();
            return ['redirect' => route('prices.index')];
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
        $prices= Price::withTrashed()->find($id);

    //  function destroy

        if($prices->deleted_at == null){
            $prices = Price::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($prices->deleted_at !== null){
            $prices->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
        }
    }
}
