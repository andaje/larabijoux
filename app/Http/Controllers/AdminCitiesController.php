<?php

namespace App\Http\Controllers;
use App\Country;
use App\City;
use Illuminate\Http\Request;

class AdminCitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::pluck('name','id')->all();
        return view('admin.cities.create',compact('countries'));
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
        $country = Country::firstOrCreate(['name'=> $request->get('country_name') ]);
        City::create(['name'=>$request->get('name'),'postal_code'=>$request->get('postal_code'),'country_id'=>$country->id]);

        return redirect('/admin/cities');

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

        $city= City::findOrFail($id);
        $countries = Country::pluck('name', 'id')->all();



        return view('admin.cities.edit', compact('city', 'countries'));
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
        $city = City::findOrFail($id);
        $country = Country::firstOrCreate(['name' => request('country_name')]);
        $city->update(['name'=>$request->get('name'),'postal_code'=>$request->get('postal_code'),'country_id'=>$country->id]);
        return redirect('/admin/cities');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $city = City::findOrFail($id);//record uit database halen
        $city->delete();
        return redirect('/admin/cities');
    }
}
