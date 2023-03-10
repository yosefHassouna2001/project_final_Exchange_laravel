<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roles = Role::withCount('permissions')->orderBy('id' ,'desc');

        if ($request->get('name')) {
            $roles = Role::where('name', 'like', '%' . $request->name . '%');
        }

        $roles = $roles->paginate(5);

        return response()->view('cms.spaity.role.index' , compact('roles'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.spaity.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required',
            ] , [
            'name.required' => 'الرجاء اضافة اسم الدور' ,
        ]);

        if(! $validator->fails()){
            $roles = new Role();
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');

            $isSaved = $roles->save();

            if($isSaved){
                return response()->json(['icon' => $isSaved ? 'success' : 'error' , 'title' => $isSaved ? "تمت عملية الاضافة بنجاح" : "فشلت عملية الاضافة"] , $isSaved ? 200 : 400);


            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title'=>$validator->getMessageBag()->first()], 400);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::destroy($id);

        // $roles= Role::withTrashed()->find($id);

    //  function destroy

    //     if($roles->deleted_at == null){
    //         $roles = Role::destroy($id);

    //         return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
    //     }

    // //  function forceDelete

    //     if($roles->deleted_at !== null){
    //         $roles->forceDelete();

    //         return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);
    //     }
    }
}
