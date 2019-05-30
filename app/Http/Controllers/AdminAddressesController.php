<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use Illuminate\Http\Request;

class AdminAddressesController extends Controller
{
    /**
     * Display a listing of the resource.

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $addresses = Address::all();
        return view('admin.addresses.index', compact('addresses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $cities = City::pluck('name','postal_code','id')->all();
        $countries = Country::pluck('name','id')->all();

        return view('admin.addresses.create',compact('cities', 'countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


       /* $city = City::firstOrCreate(['name'=> $request->get('city_name'),'postal_code'=> $request->get('city_postal_code')]);
        Address::create(['street'=>$request->get('street'),'city_id'=>$city->id]);*/

       $country = Country::firstOrCreate(['name' => request('country_name')]);
       $city = City::firstOrCreate(['name' => request('city_name'), 'postal_code' => request('city_postal_code'),'country_id'=> $country->id ]);
       Address::create(['street' => request('street'), 'city_id' => $city->id]);



        return redirect('/admin/addresses');

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

        $address= Address::findOrFail($id);
        $cities = City::pluck('name','postal_code','id')->all();
        return view('admin.addresses.edit', compact('address', 'cities'));
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
        $address = Address::findOrFail($id);
        $country = Country::firstOrCreate(['name' => request('country_name')]);
        $city = City::firstOrCreate(['name' => request('city_name'), 'postal_code' => request('city_postal_code'),'country_id'=> $country->id ]);
        $address->update(['street' => request('street'), 'city_id' => $city->id]);

        return redirect('/admin/addresses');
    }

    /**```''~^_\\```
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $address = Address::findOrFail($id);//record uit database halen
        $address->delete();
        return redirect('/admin/addresses');
    }
}
