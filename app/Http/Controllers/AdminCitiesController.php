<?php

namespace App\Http\Controllers;
use App\Country;
use App\City;
use Illuminate\Http\Request;

class AdminCitiesController extends Controller
{

    public function index()
    {
        $cities = City::paginate(4);
        return view('admin.cities.index', compact('cities'));
    }
    public function create()
    {
        $countries = Country::pluck('name','id')->all();
        return view('admin.cities.create',compact('countries'));
    }
    public function store(Request $request)
    {

        $city = new City();
        $country = $request->all()['country_id'];
        $city ->name = $request->input('name');
        $city ->postal_code = $request->input('postal_code');
        $city ->country_id = $country;
        $city ->save();
        return redirect('/admin/cities');

    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $city= City::findOrFail($id);
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.cities.edit', compact('city', 'countries'));
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $city = City::findOrFail($id);
        $city->update($input);
        return redirect('/admin/cities');

    }
    public function destroy($id)
    {
        $city = City::findOrFail($id);//record uit database halen
        $city->delete();
        return redirect('/admin/cities');
    }
}
