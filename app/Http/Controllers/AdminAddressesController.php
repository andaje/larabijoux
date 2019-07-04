<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use Illuminate\Http\Request;

class AdminAddressesController extends Controller
{

    public function index()
    {
        //
        $addresses = Address::all();
        return view('admin.addresses.index', compact('addresses'));

    }

    public function create()
    {
        $cities = City::pluck('name','id')->all();
        return view('admin.addresses.create',compact('cities'));

    }

    public function store(Request $request)
    {
        $address = new Address();
        $city = $request->all()['city_id'];
        $address ->street = $request->input('street');
        $address ->house_nr = $request->input('house_nr');
        $address ->bus = $request->input('bus');
        $address ->city_id = $city;
        $address ->save();
        return redirect('/admin/addresses');

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $address= Address::findOrFail($id);
        $cities = City::pluck('name','id')->all();

        return view('admin.addresses.edit', compact('address', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        //dd($input);
;        $address = Address::findOrFail($id);
        $address->update($input);
        //dd($address);
        return redirect('/admin/addresses');
    }
    public function destroy($id)
    {
        $address = Address::findOrFail($id);//record uit database halen
        $address->delete();
        return redirect('/admin/addresses');
    }
}
