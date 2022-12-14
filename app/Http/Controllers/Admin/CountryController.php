<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\Currency;
use App\Http\Requests\CountryRequest;
use Alert;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries  = Country::active()->get();
        $currencies = Currency::active()->get();
        return view('admin.settings.countries.index',compact('countries','currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {

        try {
            $image='';
            if ($request->has('image')) {
                $image = uploadImage('countries', $request->image);
            }      
            Country::create([
                'name'        => $request->name,
                'image'       => $image,
                'currency_id' => $request->currency_id,
                'is_active'   => 1,
            ]);

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('countries.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('countries.index');
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
    public function update(CountryRequest $request, $id)
    {
        try {
            $data = $request->only(['name','currency_id']);
            $country = Country::where('id', $id)->first();
            if ($request->has('image')) {
                $data['image'] = uploadImage('countries', $request->image);
            }
            $country->update($data);
            Alert::success(' تم التعديل بنجاح ');
            return redirect()->route('countries.index');            
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('countries.index');
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
        // $country = Country::find($id);
        // if($country)
        // {
        //     $country->update([
        //         'is_active' => false,
        //     ]);
        //     Alert::success('تم الحذف بنجاح');
        // }
        // else
        //     Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
        //     return redirect()->route('countries.index');
    }
}
