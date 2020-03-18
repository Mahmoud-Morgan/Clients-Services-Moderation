<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ServiceName;
use APP\ClientService;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $client['clients']= Client::all()->sortBy('titel');
        
        return view ('clients.list',$client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $service['services']=ServiceName::all()->sortBy('service_name');
        return view('clients.create',$service);
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



      


        

        // $request->validate([ 'titel' => 'required',
        // 'description'                => 'required',
        // 'status'                     => 'required',
        // 'contact_phone'              => 'required',
        // 'start_contract_date'        => 'required',
        // 'end_contract_date'          => 'required'
        // ]);

        // foreach ($request->service as $service) {

        //    //$client_service->service_id= print_var_name($service);
        //    $client_service->service_id->type= $service['type'];
        //    $client_service->service_id->link= $service['link'];
        //    $client_service->service_id->description= $service['description'];


        // }

        dd($request);


        // $client                      =new Client();
        // $client->titel               = $request->titel;
        // $client->description         = $request->description;
        // $client->status              = $request->status;
        // $client->contact_phone       = $request->contact_phone;
        // $client->start_contract_date = $request->start_contract_date;
        // $client->end_contract_date   = $request->end_contract_date;

        //$client->save();
        //$client_id= $client->id;

        return redirect('client');
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
        $where = array('id' => $id);
        $data['client'] = Client::where($where)->first();
 
        return view('clients.details', $data);
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
        $data['client'] = Client::where($where)->first();
 
        return view('clients.edit', $data);
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
         $request->validate([ 'titel' => 'required',
         'description'                => 'required',
         'status'                     => 'required',
         'contact_phone'              => 'required',
         'start_contract_date'        => 'required',
         'end_contract_date'          => 'required'
         ]);
         
         $update               = ['titel' => $request->titel,
         'description'         => $request->description,
         'status'              => $request->status,
         'contact_phone'       => $request->contact_phone,
         'start_contract_date' => $request->start_contract_date,
         'end_contract_date'   => $request->end_contract_date,
         ];
         Client::where('id',$id)->update($update);
         return redirect('client');
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
        Client::where('id',$id)->delete();
        return redirect('client');
    }

    private function print_var_name($var) {
        foreach($GLOBALS as $var_name => $value) {
           if ($value === $var) {
                return $var_name;
                }
            }
            return false;
        }
}
