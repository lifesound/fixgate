<?php

namespace App\Http\Controllers;

use App\Location;
use App\Material;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materials.index');
    }

    /**
     * Display a listing of materials.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $cols = ['id', 'name', 'type', 'price', 'soh', 'location'];
        $materials = Material::select($cols);

        return Datatables::of($materials)
            ->editColumn('name', function ($material) {
                return '<a href="/materials/' . $material->id . '"class="">' . str_limit($material->name, 50) . '</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('materials.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'required|in:material,asset',
            'name'=>'required|min:3|max:200',
            'description'=>'max:1000',
            'width'=>'numeric',
            'length'=>'numeric',
            'height'=>'numeric',
            'soh'=>'required|numeric',
            'price'=>'required|numeric',
            'location'=>'required|exists:locations,id',
            'sub_location'=>'max:225',
        ]);

        $request['created_by'] = 8888;

        $inserted = (new Material)->create($request->all());

        \Session::flash('message', 'Thanks , Your Material or Asset with Name (' . $inserted->name . ')
                                               has been Successfully added');

        return redirect('/materials/'.$inserted->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        return view('materials.show',compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        $locations = Location::all();
        return view('materials.edit',compact('locations','material'));
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
        $this->validate($request,[
            'type'=>'required|in:material,asset',
            'name'=>'required|min:3|max:200',
            'description'=>'max:1000',
            'width'=>'numeric',
            'length'=>'numeric',
            'height'=>'numeric',
            'soh'=>'required|numeric',
            'price'=>'required|numeric',
            'location'=>'required|exists:locations,id',
            'sub_location'=>'max:225',
        ]);

        //add user to the request;

        Material::find($id)->update($request->all());

        \Session::flash('success', 'Thanks , The Material  has been Successfully updated');

        return redirect('/materials/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::find($id)->delete();

        \Session::flash('success', 'Thanks , The Material  has been Successfully deleted');

        return redirect('/materials');

    }
}
