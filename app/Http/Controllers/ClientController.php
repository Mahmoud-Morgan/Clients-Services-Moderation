<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\ClientService;
use App\ServiceName;


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
        $data['clients']= Client::all()->sortBy('titel');
        
        return view ('clients.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['services']=ServiceName::all()->sortBy('service_name');
        return view('clients.create',$data);
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
        $request->validate([ 'titel' => 'required',
        'description'                => 'required',
        'status'                     => 'required',
        'contact_phone'              => 'required',
        'start_contract_date'        => 'required',
        'end_contract_date'          => 'required'
        ]);


        $exist_service= false;// to check if any service assigned or not

        //start transaction
        DB::beginTransaction();
        try{

            $client                      =new Client();
            $client->titel               = $request->titel;
            $client->description         = $request->description;
            $client->status              = $request->status;
            $client->contact_phone       = $request->contact_phone;
            $client->start_contract_date = $request->start_contract_date;
            $client->end_contract_date   = $request->end_contract_date;

            $client->save();
            $client_id= $client->id;


            foreach ($request->service as $service) {
               
               if (isset($service['type']) && isset($service['link']) && isset($service['description'])) {
                 
                $client_service                  = new ClientService();
                $client_service->service_name_id = $service['id'];
                $client_service->client_id       = $client_id;
                $client_service->type            = $service['type'];
                $client_service->link            = $service['link'];
                $client_service->description     = $service['description'];
                $client_service->save();
                $exist_service= true;// to check if any service assigned or not
               }
            }

            
            if($exist_service==true){
                DB::commit();
            }else{
                DB::rollback();
            }
                
        } catch (\Exception $e) {
                // Rollback Transaction
                DB::rollback();
             }


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
        $where          = array('id' => $id);
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
        $where          = array('id' => $id);
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
        ClientService::where('client_id',$id)->delete();
        Client::where('id',$id)->delete();


        return redirect('client');
    }


}
