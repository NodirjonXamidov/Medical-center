<?php

namespace App\Http\Controllers;

use App\Models\Muolaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MuolajaController extends Controller
{
    public function indexMuolaja(){
      return $muolaja = Muolaja::all();
    }

    public function createMuolaja(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
         
            'price'=>'required',
            
        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>'error creating'
            ]);
        }else{
            $muolaja = Muolaja::create([
                'name'=>$request->name,
            
                'price'=>$request->price,
                
            ]);
                return response()->json([
                    'message'=>'create succsess'
                ]);
        }
    }

    public function updateMuolaja(Request $request,$id){
        $muolaja = Muolaja::find($id);
        if($muolaja){
            
            $muolaja->name = $request->name ? $request->name : $muolaja->name;
            $muolaja->price = $request->price ? $request->price : $muolaja->price;

            return response()->json([
                'message'=>'Muolaja updating'
            ]);
        }else{
            return response()->json([
                'message'=>'Muolaja not found!'
            ]);
        }
    }

    public function deleteMuolaja(Request $request,$id){
        $muolaja = Muolaja::find($id);
        if($muolaja){
            $muolaja->delete($id);
            return response()->json([
                'message'=>'Succsessfull delete'
            ]);
        }else{
            return response()->json([
                'message'=>'Muolaja not found!'
            ]);
        }
    }
}
