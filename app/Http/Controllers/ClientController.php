<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(){
       return  $client = Client::with(['transaction','sklad'])->get(); 
       }
   
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'familyasi'=>'required',
            'ismi'=>'required',
            'yili'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'comment'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=>'error'
            ]);
        }else{

            $client = $request->only(['familyasi', 'ismi', 'yili', 'phone', 'address', 'comment']);
            $existingClient = Client::where('familyasi', $client['familyasi'])
            ->where('ismi',    $client['ismi'])
            ->where('yili',    $client['yili'])
            ->where('phone',   $client['phone'])
            ->where('address', $client['address'])
            ->where('comment', $client['comment'])
            ->first();

        if (!$existingClient) {
      
            $client = Client::create([
                'familyasi'=>$request->familyasi,
                'ismi'=>$request->ismi,
                'yili'=>$request->yili,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'comment'=>$request->comment,
                
            ]);
            return response()->json([
                'message'=>'succsessfull'
            ]);
        }
      }
    }

    public function update(Request $request,$id){
        $client = Client::findOrFail($id);
        
        if($client){
            $client->familyasi = $request->familyasi ? $request->familyasi: $client->familyasi;
            $client->ismi = $request->ismi ? $request->ismi: $client->ismi;
            $client->yili = $request->yili ? $request->yili: $client->yili;
            $client->phone = $request->phone ? $request->phone: $client->phone;
            $client->address = $request->address ? $request->address: $client->address;
            $client->comment = $request->comment ? $request->comment: $client->comment;

            return response()->json([
                'message'=>'Succsessfull update'
            ]);
        }else{
            return response()->json([
                'message'=>'Error update'
            ]); 
        }
       
    }

    public function delete(Request $request,$id){
        $client = Client::find($id);
        if($client){
            $client->delete($id);
            return response()->json([
                'message'=>'delete succsessfull !'
            ]);
        }else{
            return response()->json([
                'message'=>'client not found!'
            ]);
        }
    }
   
}