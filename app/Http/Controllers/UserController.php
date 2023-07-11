<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
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
    public function create()
    {
        //
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
    }

    public function getEditForm(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        $id = $request->get('id');
        // $dataUser = DB::select(DB::raw("SELECT * FROM users WHERE id=2"));
        $dataUser = User::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.datapembeli.getEditForm', compact('dataUser'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        try{
            $id = $request->get('id');
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->address = $request->get('address');
            
            $user->save();
    
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Sukses mengubah data user'
            ), 200);
        } 
        catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal mengubah data user'
            ), 200);
        }
    }
}
