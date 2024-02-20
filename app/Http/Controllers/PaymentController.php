<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Type;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::all();
      
        return view('payments.index', [
            'payments' => $payments,
        ]);
        
    }

    public function create(){
        $types = Type::all();
        return view('payments.create', ['types' => $types]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'payment_id' => 'required|string',
            'type_id' => 'required|exists:types,type_id', // Validate type existence
            'date' => 'required|date',
            'total' => 'required|numeric',
            'fee' => 'nullable',
        ]);

        // Inisialisasi variabel
        $remainingTotal = $data['total'];
        $payments = [];

        if ($remainingTotal <= 100000) 
        {
            if ($x = $data['type_id'] === 'TYPE2' && $remainingTotal > 20000) 
            { 
                $data['type_id'] = 'TYPE2';
                $data['fee']    = min($data['total'], 20000);
                $data['total'] -= $data['fee'];
            }
            $data['type_id'] = $x ? $data['type_id'] : 'TYPE1';
             Payment::create($data);
        }
        // Check if total exceeds maximum
        else {
            $remainingTotal = $data['total'];
            
            $payments = array_fill(0, ceil($remainingTotal / 100000), [
                'payment_id' => $data['payment_id'],
                'type_id' => $data['type_id'],
                'date' => $data['date'],
            ]);

            foreach ($payments as &$payment) {
                $payment['total'] = min($remainingTotal, 100000);

                if ($data['type_id'] === 'TYPE2') {
                    $payment['fee'] = min($payment['total'], 20000);
                    $payment['total'] -= $payment['fee'];

                    // Sisa total untuk baris kedua
                    $excess = $payment['total'];
                    
                    // Hitung fee dan total untuk baris kedua (TYPE2)
                    if ($excess > 100000) {
                        $excessPayment['fee'] = min($excess, 20000);
                        $excessPayment['total'] = $excess - ($excessPayment['fee'] + $data['total']);
                        $excessPayment['payment_id'] = $data['payment_id'];
                        $excessPayment['type_id'] = $data['type_id'];
                        $excessPayment['date'] = $data['date'];
                    }
                }
                
                // Kurangi total yang tersisa
                $remainingTotal -= $payment['total'];
            }
            // dd($payments);

            Payment::insert($payments);

            // if ($data['type_id'] === 'TYPE2') {
            //     // Perhitungan fee dan total untuk baris pertama (TYPE2)
            //     $data['fee'] = min($data['total'], 20000);
            //     $data['total'] -= $data['fee'];
            //     // Sisa total untuk baris kedua
            //     $excess = $data['total'];
                
            //     // Penyesuaian data baris pertama (TYPE2)
            //     $data['total'] = 100000;
                
            //     // Hitung fee dan total untuk baris kedua (TYPE2)
            //     if ($excess > 100000) {
            //         $excessPayment['fee'] = min($excess, 20000);
            //         $excessPayment['total'] = $excess - ($excessPayment['fee'] + $data['total']);
            //     }
            //     if ($excess > 100000) {
            //         $excessPayment['payment_id'] = $data['payment_id'];
            //         $excessPayment['type_id'] = $data['type_id'];
            //         $excessPayment['date'] = $data['date'];
            //     }
            //     dd($data, $excessPayment);
            //     // Buat baris data pertama dan kedua (TYPE2)
            //     Payment::create($data);
            //     Payment::create($excessPayment);
            // } else {
            //     // Sisa total untuk baris kedua
            //     $excess = $data['total'];

            //     // Penyesuaian data baris pertama (TYPE1)
            //     $data['total'] = 100000;

            //     // Buat baris data kedua (TYPE1)
            //     if ($excess > 0) {
            //         $excessPayment['payment_id'] = $data['payment_id'];
            //         $excessPayment['type_id'] = $data['type_id'];
            //         $excessPayment['date'] = $data['date'];
            //         $excessPayment['total'] = $excess - $data['total'];
            //     }
                
            //     // Buat baris data pertama (TYPE1)
            //     Payment::create($data);
            //     Payment::create($excessPayment);
            // }
        }
        
        return redirect(route('payment.index'))->with('success', 'Payment created successfully!');

    }

    public function edit(Payment $payment){
        return view('payments.edit', ['payment' => $payment]);
    }

    public function update(Payment $payment, Request $request){
        $data = $request->validate([
            'type_id' => 'required',
            'date'    => 'required',
            'total'   => 'required|numeric',
        ]);

        $payment->update($data);

        return redirect(route('payment.index'))->with('success', 'Payment Updated Succesffully');

    }

    public function destroy(Payment $payment){
        $payment->delete();
        return redirect(route('payment.index'))->with('success', 'Payment deleted Succesffully');
    }
}
