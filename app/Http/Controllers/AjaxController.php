<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index(){
        $msg = "Ceci est le new message";
        return response()->json(array('msg' => $msg), 200);
    }

    public function edit_category(Request $request){
        $data = $request->validate([
            'name' => 'required | min:3',
            'on_menu' => 'nullable | digits_between:0,1'
        ]);
        $name = $request->input('name');
        $on_menu = $request->input('on_menu') ?? 0;
        if(\App\Category::updateOrCreate(['name'=>$name,'on_menu' => $on_menu]))
            return response()->json(['message' => 'Category modifiée','status' => 200],200);
        else
            return response()->json(['message' => 'Erreur lors de la modification', 'status' => 401],200);
        #return redirect('/categories')->with(['success' => 'Category enregistrée']);
    }

    public function ajout_category(Request $request){
        $data = $request->validate([
            'name' => 'required | min:3',
            'on_menu' => 'nullable | digits_between:0,1'
        ]);
        $category = new Category();
        $name = $request->input('name');
        $on_menu = $request->input('on_menu') ?? 0;
        if($saved = \App\Category::updateOrCreate(['name'=>$name,'on_menu' => $on_menu]))
            return response()->json([
                'message'   => 'Category modifiée',
                'data'   => ['id'=>$saved->id,'name'=>$name,'on_menu' => $on_menu],
                'status'    => 200,
                'errors'    => []
            ],
                200);
        else
            return response()->json(['message' => 'Erreur lors de la modification', 'status' => 401,'errors'=>$data->errors()->all()],200);
    }
}
