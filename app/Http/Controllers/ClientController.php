<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;


class ClientController extends Controller
{
  
    public function index(Request $request)
    {

     if($request->search){
        $clients = Client::where('name','like','%' . $request->search . '%' )->orwhere('address','like','%'.$request->search . '%')->latest()->paginate(PAGINATE_COUNT);
     }else{
        $clients =   Client::latest()->paginate(PAGINATE_COUNT);
     }
        return view('dashboard.clients.index', compact('clients'));
    }

 
    public function create()
    {
        return view('dashboard.clients.create');
        
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'phone' => 'required|min:1',
            'phone.0' => 'required',
            'address_en' => 'required',
            'address_ar' => 'required',
        ]);        
  
        $request_data['name'] = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
        $request_data['phone'] = array_filter($request->phone);
        $request_data['address'] = ['en'=>$request->address_en , 'ar'=>$request->address_ar];

        Client::create($request_data);

       

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('clients.index');

    }


  
    public function show($id)
    {
        //
    }

    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }


    public function update(Request $request, $id)
    {

        $client = Client::findOrFail($id); 
         
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'phone' => 'required|min:1',
            'phone.0' => 'required',
            'address_en' => 'required',
            'address_ar' => 'required',
        ]);        
  
        $request_data['name'] = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
        $request_data['phone'] = array_filter($request->phone);
        $request_data['address'] = ['en'=>$request->address_en , 'ar'=>$request->address_ar];

      
        $client->update($request_data);

       

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('clients.index');
    }

 
    public function destroy($id)
    {
         
        $client = Client::findOrFail($id);
        
        $client->delete($client);
         
        
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('clients.index');


    }
}
