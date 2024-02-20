<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('types.index', ['types' => $types]);
    }

    public function create(){
        return view('types.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'type_id' => 'required',
            'name' => 'required',
        ]);

        $newType = Type::create($data);

        return redirect(route('type.index'));
    }

    public function edit(Type $type){
        return view('types.edit', ['type' => $type]);
    }

    public function update(Type $type, Request $request){
        $data = $request->validate([
            'type_id' => 'required',
            'name' => 'required',
        ]);

        $type->update($data);

        return redirect(route('type.index'))->with('success', 'Type Updated Succesffully');

    }

    public function destroy(Type $type){
        $type->delete();
        return redirect(route('type.index'))->with('success', 'Type deleted Succesffully');
    }
}
