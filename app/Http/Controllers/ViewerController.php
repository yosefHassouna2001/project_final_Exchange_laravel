<?php

namespace App\Http\Controllers;

use App\Models\Viewer;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewers = Viewer::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.viewer.index', compact('viewers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return response()->view('cms.viewer.create' , compact('cities'));
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
            'email' => 'required|email',

        ]);
        if(! $validator->fails()){
            $viewers = new Viewer();
            $viewers->email = $request->get('email');
            $viewers->password = Hash::make($request->get('password'));
            $isSaved = $viewers->save();
            if($isSaved){
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/Viewer', $imageName);

                    $users->image = $imageName;
                    }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->address = $request->get('address');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->DOB = $request->get('DOB');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($viewers);

                $isSaved = $users->save();

                return response()->json(['icon' => 'success' , 'title' => 'Created is Successfully'] , 200);

            }
        }else{
                return response()->json(['icon' => 'error' , 'title'=>$validator->getMessageBag()->first()] , 400);
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
        //
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
        $viewers = Viewer::findOrFail($id);
        return response()->view('cms.viewer.edit' , compact('viewers' , 'cities'));
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
            'password' => 'nullable',
        ]);

        if(! $validator->fails()){
            $viewers = Viewer::findOrFail($id);
            $viewers->email = $request->get('email');
            $isUpdated = $viewers->save();
            if($isUpdated){
                $users = $viewers->user;

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/Viewer', $imageName);

                    $users->image = $imageName;
                    }
                    $users->first_name = $request->get('first_name');
                    $users->last_name = $request->get('last_name');
                    $users->mobile = $request->get('mobile');
                    $users->address = $request->get('address');
                    $users->gender = $request->get('gender');
                    $users->status = $request->get('status');
                    $users->DOB = $request->get('DOB');
                    $users->city_id = $request->get('city_id');
                    $users->actor()->associate($viewers);

                $isUpdated = $users->save();

                return ['redirect'=>route('viewers.index')];

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] ,400);
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
        $viewers = Viewer::destroy($id);
    }
}