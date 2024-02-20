<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::all();
        $transactionb = Transaction::with('product')
        ->get()
        ->groupBy('transaction_id');
      
        // dd($transactions->map(function($groupedTransactions) {
        //     $total = $groupedTransactions->sum('subtotal');

        //     return $groupedTransactions->first()->setTotalAttribute($total);
        // })->toArray());

        // Calculate totals for each transaction group
        $transactionb = $transactionb->map(function($groupedTransactions) {
            $total = $groupedTransactions->sum('subtotal');
            // dd($groupedTransactions->first()->setTotalAttribute($total));
            return $groupedTransactions->first()->setTotalAttribute($total);
        });
        // dd($transactionb->toArray());
        return view('transactions.index', [
            'transactions' => $transactions,  // Pass the modified transactions
            'transactionb' => $transactionb,  // Pass the modified transactions
        ]);
        
    }

    public function create(){
        $products = Product::all();
        return view('transactions.create', ['products' => $products]);
    }

    public function store(Request $request){
        // dd($request->toArray());
        $data = $request->validate([
            'transaction_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $newTransaction = Transaction::create($data);

        return redirect(route('transaction.index'));

    }

    public function edit(Transaction $transaction){
        return view('transactions.edit', ['transaction' => $transaction]);
    }

    public function update(Transaction $transaction, Request $request){
        $data = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $transaction->update($data);

        return redirect(route('transaction.index'))->with('success', 'Transaction Updated Succesffully');

    }

    public function destroy(Transaction $transaction){
        $transaction->delete();
        return redirect(route('transaction.index'))->with('success', 'Transaction deleted Succesffully');
    }
}
