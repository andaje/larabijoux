<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name','id')->all();
        $cit = City::pluck('postal_code', 'id')->all();
        $cities = City::pluck('name','id')->all();
        $addresses = Address::pluck('street','id')->all();
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles','addresses', 'cities', 'cit', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function store(UsersRequest $request)
    {
        User::create([
             'first_name'=> $request['first_name'],
             'last_name'=> $request['last_name'],
             'email'=> $request['email'],
             'role_id' => $request['role_id'],
             'is_active'=> $request['is_active'],
             'address_id'=> $request['address_id'],
             'password' => bcrypt($request['password']),
        ]);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] =Hash::make($request['password']);
        User::create($input);

        return redirect('/admin/users');
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
        //$users = User::with('podcasts')->get();
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        $addresses= Address::pluck('street', 'id');
        $countries = Country::pluck('name')->all();
        $cit = City::pluck('postal_code')->all();
        $cities = City::pluck('name','id')->all();



        return view('admin.users.edit', compact('user','roles', 'addresses', 'countries','cit', 'cities'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        //$request->password
        //$request['password']
        //$request->get('password')
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $input['password'] = Hash::make($request['password']);
            $input = $request->all();
        }
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('admin/users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        unlink(public_path() . $user->photo->file);
        Session::flash('deleted_user', 'The user is deleted');
        return redirect('/admin/users');
    }
}
