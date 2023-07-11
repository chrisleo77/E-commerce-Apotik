<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-dashboard-permission');
        try {
            $listMedicines = Medicine::all();
            $listCategories = Category::all();
            // dd($listMedicines);
            return view('admin.obat.index', compact('listMedicines','listCategories'));
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
            $data = new Medicine();
            $data->generic_name = $request->get('generic_name');
            $data->form = $request->get('form');
            $data->restriction_formula = $request->get('restricition_formula');
            $data->price = $request->get('price');
            $data->description = $request->get('description');

            // image
            $file = $request->file('image');
            $imgFolder = 'images';
            $imgFile = time()."_".$file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $data->image = $imgFile;

            $data->faskes_tk1 = $request->get('faskes1');
            $data->faskes_tk2 = $request->get('faskes2');
            $data->faskes_tk3 = $request->get('faskes3');
            $data->category_id = $request->get('category');
            $data->save();
            return redirect('/admin/obat')->with('status', 'Berhasil menambah medicine.');
        } catch (\PDOException $e) {
            $msg = "Gagal menambah data medicine.";
            return redirect('/admin/obat')->with('status', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }

    public function getData()
    {
        $this->authorize('admin-dashboard-permission');
        try {
            $TotalMedicines = Medicine::count();
            $TotalCategories = Category::count();
            $TotalTransactions = Transaction::count();
            $TotalUsers = DB::select(DB::raw("select count(*) AS TotalUsers from users where role='User'"));
            return view('admin.dashboard', compact('TotalMedicines', 'TotalCategories', 'TotalTransactions', 'TotalUsers'));
        } catch (\PDOException $e) {
            return view('index');
        }
        
    }

    public function getDataMedicines()
    {
        
        $listMedicines = Medicine::all();
        // dd($listMedicines);
        return view('index', compact('listMedicines'));
    }

    public function getDetailMedicines($id)
    {
        $medicine = Medicine::find($id);
        // dd($medicine);
        return view('detail', compact('medicine'));
    }

    public function getEditForm(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        $id = $request->get('id');
        $dataMedicine = Medicine::find($id);
        $listCategories = DB::select(DB::raw("select * from categories"));
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.obat.getEditForm', compact('dataMedicine','listCategories'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        try{
            $id = $request->get('id');
            $medicine = Medicine::find($id);
            $medicine->generic_name = $request->get('generic_name');
            $medicine->form = $request->get('form');
            $medicine->restriction_formula = $request->get('restricition_formula');
            $medicine->price = $request->get('price');
            $medicine->description = $request->get('description');
            $medicine->faskes_tk1 = $request->get('faskes1');
            $medicine->faskes_tk2 = $request->get('faskes2');
            $medicine->faskes_tk3 = $request->get('faskes3');
            $medicine->category_id = $request->get('category');
            $medicine->save();
    
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Sukses mengubah data medicine'
            ), 200);
        } 
        catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Gagal mengubah data medicine'
            ), 200);
        }
    }

    public function deleteData(Request $request)
    {
        $this->authorize('admin-dashboard-permission');
        try {
            $id = $request->get('id');
            $data = Medicine::find($id);
            $data->delete();
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Sukses menghapus data medicine'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'gagal',
                'msg' => 'Gagal menghapus data medicine, Pastikan data child sudah hilang atau tidak berhubungan'
            ), 200);
        }

        // $data = Medicine::find($medicine);
        // try {
        //     $data->delete();
        //     return redirect()->route('obat.index')->with('status', 'Data Medicine dengan id ' . $data->id . ' berhasil dihapus');
        // } catch (\PDOException $e) {
        //     $msg = "Data Gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
        //     return redirect()->route('obat.index')->with('error', $msg);
        // }
    }

    public function addToCart($id)
    {
        $this->authorize('checkmember');
        $medicine = Medicine::find($id);
        $cart = session()->get('cart');
        if(!isset($cart[$id]))
        {
            $cart[$id]=[
                "name" => $medicine->generic_name,
                "quantity" => 1,
                "price" => $medicine->price,
                "photo" => $medicine->image
            ];
        } 
        else {
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('status', 'Berhasil menambah obat ke keranjang!');
    }

    public function removeCartItem($id)
    {
        $this->authorize('checkmember');
        $cart = session()->pull('cart', []); // Second argument is a default value
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function cart()
    {
        $this->authorize('checkmember');
        return view('cart.cart');
    }
}
