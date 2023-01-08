<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->latest()->get();
        return view('transaction.transactions', ['transactions' => $transactions]);
    }
    public function store(Request $request)
    {
        $request['confirmed'] = 0;
        Transaction::create($request->all());
        return redirect('/mytransaction');
    }
    public function accept(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $request['confirmed'] = '1';
        $transaction->update($request->all());

        return redirect('/transactions');
    }
    public function denied(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $request['confirmed'] = '2';
        $transaction->update($request->all());

        return redirect('/transactions');
    }
}
