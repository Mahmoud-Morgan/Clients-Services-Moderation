<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceName;

class ServicesNamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $service['services']= ServiceName::all()->sortBy('service_name');
        return view('services_provieding.list',$service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services_provieding.create');
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
        $request->validate([ 'service_name' => 'required' ]);
        $service  =new ServiceName();
        $service->service_name = $request->service_name;
        $service->save();

        return redirect('servicename');
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
        $where = array('id' => $id);
        $data['service'] = ServiceName::where($where)->first();
 
        return view('services_provieding.edit', $data);
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
        $request->validate([ 'service_name' => 'required' ]);
        $update = ['service_name' => $request->service_name];
        ServiceName::where('id',$id)->update($update);
        return redirect('servicename');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //can't delete used service
        ServiceName::where('id',$id)->delete();
        return redirect('servicename');

    }
}
