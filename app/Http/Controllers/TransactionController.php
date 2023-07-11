<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('checkmember');

        $user = Auth::user();
        $listtransactions = Transaction::where('user_id',$user->id)->get();
        $count = DB::select(DB::raw("SELECT COUNT(*) AS count FROM transactions WHERE user_id = $user->id"));
        return view('transaksi.riwayattransaksi',compact('listtransactions','count'));
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($transaction)
    {
        $this->authorize('checkmember');
        $transactiondata = Transaction::find($transaction);
        return view('transaksi.detailtransaksi', compact('transactiondata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function form_submit_front()
    {
        $this->authorize('checkmember');
        return view('cart.checkout');
    }

    public function submit_front()
    {
        $this->authorize('checkmember');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction();
        $t->user_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totalharga = $t->insertProduct($cart, $user);
        $t->total = $totalharga;
        $t->save();

        session()->forget('cart');
        return redirect('/');
    }

    public function showAllBuyer()
    {
        $this->authorize('admin-dashboard-permission');
        $listpembeli = DB::select(DB::raw("SELECT * FROM users where role='User'"));
        return view('admin.datapembeli.index', compact('listpembeli'));
    }

    public function showAllBuyerTransactions($id)
    {
        $this->authorize('admin-dashboard-permission');
        $listtransactions = Transaction::where('user_id',$id)->get();
        $count = DB::select(DB::raw("SELECT COUNT(*) AS count FROM transactions where user_id=$id"));
        // dd($count);
        $user = DB::select(DB::raw("SELECT * FROM users where id=$id"));

        return view('admin.datapembeli.riwayattransaksi', compact('listtransactions','user', 'count'));
    }

    public function showDetailBuyerTransactions($idtransaksi)
    {
        $this->authorize('admin-dashboard-permission');
        $transactiondata = Transaction::find($idtransaksi);
        $iduser = $transactiondata->user_id;
        $user = DB::select(DB::raw("SELECT * FROM users where id=$iduser"));
        return view('admin.datapembeli.detailtransaksi', compact('transactiondata','user'));
    }

    public function generateReport()
    {
        $this->authorize('admin-dashboard-permission');
        $rTop5Medicine = DB::select(DB::raw("SELECT m.id, m.generic_name, m.price, SUM(mt.quantity) AS jumlahterjual FROM medicines m INNER JOIN medicine_transactions mt ON m.id = mt.medicine_id GROUP BY m.id, m.generic_name, m.price ORDER BY jumlahterjual DESC LIMIT 5"));

        $rTop3BuyerCustomer = DB::select(DB::raw("SELECT u.id, u.name, u.address, u.email, SUM(t.total) AS nominalpembelian FROM transactions t INNER JOIN users u ON t.user_id = u.id GROUP BY u.id, u.name, u.address, u.email ORDER BY nominalpembelian DESC LIMIT 3"));

        // dd($rTop5Medicine);
        // dd($rTop3BuyerCustomer);
        return view('admin.report.index', compact('rTop5Medicine','rTop3BuyerCustomer'));
    }
}
