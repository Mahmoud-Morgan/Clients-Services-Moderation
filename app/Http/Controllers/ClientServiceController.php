<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientService;
use App\ServiceName;

class ClientServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $data['client']   =Client::where('id',$id)->first();
        $data['services'] =ServiceName::all()->sortBy('service_name');
        return view('client_services.create',$data);
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
         $request->validate([ 'type' => 'required',
         'link'                      => 'required',
         'description'               => 'required',
         'service_name_id'           => 'required',
         'client_id'                 => 'required',
         ]);

        $client_service                  = new ClientService();
        $client_service->service_name_id = $request->service_name_id;
        $client_service->client_id       = $request->client_id;
        $client_service->type            = $request->type;
        $client_service->link            = $request->link;
        $client_service->description     = $request->description;
        $client_service->save();

        return redirect()->action('ClientServiceController@show',$client_service->client_id);
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
        $where                   = array('id' => $id);
        $data['client']          = Client::where($where)->first();
        
        $where                   = array('client_id' => $id);
        $data['client_services'] = ClientService::where($where)->join('service_names','service_name_id','=','id')
        ->get()->sortBy('service_name');
        
        return view('client_services.list',$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id1,$id2)
    {
        $where                  = array('client_id' => $id1,'service_name_id'=>$id2);
        $data['client_service'] = ClientService::where($where)->first();

        $where                  = array('id'=>$id2);
        $data['service_name']   =ServiceName::where($where)->first();
        return view('client_services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id1,$id2)
    {
        //
         $request->validate([ 'type' => 'required',
         'link'                      => 'required',
         'description'               => 'required',
         ]);
         
         $update                     = ['type' => $request->type,
         'link'                      => $request->link,
         'description'               => $request->description,
         ];

        $where  = array('client_id' => $id1,'service_name_id'=>$id2);
        ClientService::where($where)->update($update);
    
         return redirect()->action('ClientServiceController@show',$id1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1,$id2)
    {
        //
         $where  = array('client_id' => $id1,'service_name_id'=>$id2);
        ClientService::where($where)->delete();
        return redirect()->action('ClientServiceController@show',$id1);
    }
}
