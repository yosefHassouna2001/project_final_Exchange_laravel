<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Mail\AdminEmail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    // soft delete

    //  function restoreindex
    public function restoreindex()
    {
        $admins = Admin::onlyTrashed()->with('user')->orderBy('deleted_at' , 'desc')->paginate(10);
        return response()->view('cms.admin.index' , compact('admins'));
    }

    //  function restore
    public function restore( $id)
    {
        $admins = Admin::onlyTrashed()->findOrfail($id)->restore();
        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins= Admin::with('user')->orderBy('id' , 'desc');
        // $this->authorize('viewAny' , Admin::class);

        if ($request->get('email')) {
            $admins = Admin::where('email', 'like', '%' . $request->email . '%');
        }

        $admins = $admins->paginate(10);

        return response()->view('cms.admin.index' , compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name' , 'admin')->get();
        // $this->authorize('create' , Admin::class);

        return response()->view('cms.admin.create' , compact('cities' , 'roles' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  $users->actor()->associate($admins);

     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[

            'first_name'=> 'required',
            'last_name'=> 'required',
            'status'=> 'required',
            'gender'=> 'required',
            'date'=> 'required',
            'city_id'=> 'required',
            'address'=> 'required',
            'address'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'password' => 'required',
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

        ],[
            'email.required' =>"الرجاء ادخال الايميل  !",
            'email.unique' =>"الايميل موجود مسبقا ",
            'password.required' =>"الرجاء ادخال كلمة السر  !",
            'image.required' => ' الرجاء اضافة صورة  ' ,
            'image.image' => ' الرجاء اضافة صورة  ' ,
        ]

        );
        if(! $validator->fails()){
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $isSaved = $admins->save();
            if($isSaved){
                $users = new User();
                 $roles = Role::findOrFail($request->get('role_id'));
                 $admins->assignRole($roles->name);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                    }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->date = $request->get('date');
                $users->city_id = $request->get('city_id');
                $users->address = $request->get('address');
                $users->mobile = $request->get('mobile');
                $users->actor()->associate($admins);

                $isSaved = $users->save();

                    // Mail::to($admins->email)->send(new AdminEmail($admins->email));

                return response()->json(['icon' => $isSaved ? 'success' : 'error' , 'title' => $isSaved ? "تمت عملية الاضافة بنجاح" : "فشلت عملية الاضافة"] , $isSaved ? 200 : 400);

            }
        }
        else{
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
        $cities = City::all();
        $admins = Admin::withTrashed()->findOrFail($id);

        return response()->view('cms.admin.show' , compact('admins' , 'cities' ));
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
        $admins = Admin::findOrFail($id);
        $roles = Role::where('guard_name' , 'admin')->get();
        // $this->authorize('update' , Admin::class);

        return response()->view('cms.admin.edit' , compact('admins' , 'cities' , 'roles'));
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
            'first_name'=> 'required',
            'last_name'=> 'required',
            'status'=> 'required',
            'gender'=> 'required',
            'date'=> 'required',
            'city_id'=> 'required',
            'address'=> 'required',
            'address'=> 'required',
            'mobile'=> 'required',
            'password' => 'required',
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

        ],[
            'email.required' =>"الرجاء ادخال الايميل  !",
            'password.required' =>"الرجاء ادخال كلمة السر  !",
            'image.required' => ' الرجاء اضافة صورة  ' ,
            'image.image' => ' الرجاء اضافة صورة  ' ,
        ]

        );

        if(! $validator->fails()){
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $isUpdate = $admins->save();

            if($isUpdate){
                $users = $admins->user;
                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                    }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->date = $request->get('date');
                $users->city_id = $request->get('city_id');
                $users->address = $request->get('address');
                $users->mobile = $request->get('mobile');
                $users->actor()->associate($admins);

                $isUpdate = $users->save();

                return ['redirect'=>route('admins.index')];
                return response()->json(['icon' => $isUpdate ? 'success' : 'error' , 'title' => $isUpdate ? "تمت عملية التعديل بنجاح" : "فشلت عملية التعديل"] , $isUpdate ? 200 : 400);


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
        $admins= Admin::withTrashed()->find($id);

        if($admins->deleted_at == null){
            $admins = Admin::destroy($id);
            // $this->authorize('delete' , Admin::class);
            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف بنجاح"] , 200);
        }

    //  function forceDelete

        if($admins->deleted_at !== null){
            $admins->forceDelete();
            return response()->json(['icon' => 'success' , 'title' => "تمت عملية الحذف النهائي بنجاح"] , 200);

        }

    }

    // public function changeStatus(Request $request)
    // {
    //     $admins = Admin::with('user')->find($request->id);
    //     $admins->user->status = $request->get('unit_toggle_value');
    //     $isSave = $admins->save();
    //     return response()->json(['icon' => 'success', 'title' => 'تم التعديل  بنجاح'], $isSave ? 200 : 400);
    // }
}
