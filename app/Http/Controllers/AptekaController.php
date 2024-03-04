<?php

namespace App\Http\Controllers;

use App\Models\apteka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AptekaController extends Controller
{
    public function indexApt(){
       return $apt = apteka::all();
    }

    public function createApt(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'price'=>'required',
            'count'=>'required',
        ]);

        if(!$validator->fails()){
            $apt = apteka::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'count'=>$request->count,
            ]);
            return response()->json([
                'messaga'=>'Drug create'
            ]);
        }else{
            return $validator->errors();
        }
    }


    public function updateApt(Request $request, $id){
        $apt = apteka::findorFails($id);
        if($apt){
        $request->validate([
          $apt->name = $request->name,
          $apt->price => $request->price,
          $apt-> count=>$request->count,
          $apt->update(),
          $apt->save()
        ]);
    }
    }

    public function deleteApt(Request $request, $id){
        $apt = apteka::findorFails($id);
        if($apt){
            $apt->delete();
        }
    }

}
