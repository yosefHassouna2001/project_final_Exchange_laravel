<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id' , 'desc')->get();
        return response()->json([
            'status' => true ,
            'message' => 'Data of City' ,
            'data' => $cities

        ]);
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
            'name' => 'required'
        ]);

        if(! $validator->fails()){
            $cities = new City();
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');

            $isSaved = $cities->save();

            if($isSaved){
                return response()->json([
                    'status' => true ,
                    'message' => "Created is Successfully",
                    'response' => 200 ,
    
    
                ]);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => "Created is Failed",
                    'response' => 400 ,
    
    
                ]);
            }
         
        }
        else{
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
                'response' => 400 ,

            ] );
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
        $cities = City::find($id);
        return response()->json([
            'status' => true ,
            'message' => "Data of Spcifyied city" ,
            'data' => $cities
        ]);
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

        ]);

        if(! $validator->fails()){
            $cities = City::find($id);
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');

            $isUpdated = $cities->save();

            if($isUpdated){
                return response()->json([
                    'status' => true ,
                    'message' => "Updated is Successfully",
                    'response' => 200 ,
                ]);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => "Updated is Failed",
                    'response' => 400 ,
                ]);
            }
         
        }
        else{
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
                'response' => 400 ,

            ] );
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
        $cities = City::destroy($id);
        return response()->json([
            'status' => true ,
            'message' => 'Deletes is Successfully',
            'response' => 200,
        ]);
    }
}
