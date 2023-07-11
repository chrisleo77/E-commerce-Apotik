<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-dashboard-permission');
        try {
            $listCategories = Category::all();
            // dd($listMedicines);
            return view('admin.kategoriobat.index', compact('listCategories'));
        } catch (\PDOException $e) {
            return view('index');
        }
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
        $this->authorize('admin-dashboard-permission');
        try {
            $data = new Category();
            $data->name = $request->get('namaCategory');
            $data->description = $request->get('deskripsiCategory');
            $data->save();
            return redirect('/admin/kategoriobat')->with('status', 'Berhasil menambah Kategori Obat.');
        } catch (\PDOException $e) {
            $msg = "Gagal menambah data Kategori.";
            return redirect('/admin/kategoriobat')->with('status', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function getEditForm(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        $id = $request->get('id');
        $dataCategory = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.kategoriobat.getEditForm', compact('dataCategory'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        try{
            $id = $request->get('id');
            $category = Category::find($id);
            $category->name = $request->get('name');
            $category->description = $request->get('description');
            
            $category->save();
    
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Sukses mengubah data Category'
            ), 200);
        } 
        catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal mengubah data Category'
            ), 200);
        }
    }

    public function deleteData(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        try {
            $id = $request->get('id');
            $data = Category::find($id);
            $data->delete();
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Sukses menghapus data Category'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'gagal',
                'msg' => 'Gagal menghapus data Category'
            ), 200);
        }
    }
}
