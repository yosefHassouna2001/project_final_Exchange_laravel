<?php

namespace App\Http\Controllers;

use App\Models\Seeder as ModelsSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SeederController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seeders =ModelsSeeder::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.seeder.index' , compact('seeders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->view('cms.seeder.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  $users->actor()->associate($Authors);

     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[
            'titel' => 'required|string',
            'descreption' => 'required|string',
            'image' => 'required|string',
        ]);
        if(! $validator->fails()){
            $seeders = new ModelsSeeder();
            $seeders->titel = $request->get('titel');
            $seeders->descreption = Hash::make($request->get('descreption'));
            $isSaved = $seeders->save();
            if($isSaved){
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/seeder', $imageName);

                    $seeders->image = $imageName;
                    }


                }
                else{

                };
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seeders = ModelsSeeder::findOrFail($id);

        return response()->view('cms.seeder.edit' , compact('seeders'));
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
            'title' => 'nullable',
        ]);

        if(! $validator->fails()){
            $seeders = ModelsSeeder::findOrFail($id);
            $seeders->titel = $request->get('titel');
            $seeders->descreption = $request->get('descreption');
            $isSaved = $seeders->save();
            if($isSaved){

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/seeder', $imageName);

                    $seeders->image = $imageName;
                    }
            }
           else{

           };
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seeders = ModelsSeeder::destroy($id);
    }
}
