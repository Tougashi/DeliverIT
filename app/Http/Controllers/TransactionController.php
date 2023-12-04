<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  
    public function Transaction()
    {
        $transactions = Transaction::with('user')
        ->latest('created_at')
        ->get();
        return view('Transaction.index', [
            'title' => "Transaction",
            'transactions' => $transactions, // Menambahkan data transaksi ke dalam array
        ]);
    }
    


// API CONTROLLER TRANSACTION
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json(['message' => 'All Transactions found', 'data' => $transactions]);
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json(['message' => 'Transaction found', 'data' => $transaction]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'userId' => ['required'],
                'items' => ['required'],
                'weight' => ['required'],
                'distance' => ['required'],
                'cost' => ['required'],
                'serviceId' => ['required'],
            ]);
    
            // Generate orderCode dengan format "PCKP" + huruf dan nomor acak
            $orderCode = 'PCKP' . strtoupper(Str::random(mt_rand(4, 8)));
    
            // Menambahkan orderCode ke data request
            $request->merge(['orderCode' => $orderCode]);
    
            $transaction = new Transaction($request->all());
            $transaction->save();
    
            if ($transaction->id) {
                return response()->json(['message' => 'Transaction created', 'data' => $transaction]);
            } else {
                return response()->json(['message' => 'Transaction creation failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Transaction creation failed: ' . $e->getMessage()], 500);
        }
    }
    

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        try {
            $validatedData = $request->validate([
                'userId' => ['required'],
                'items' => ['required'],
                'weight' => ['required'],
                'distance' => ['required'],
                'cost' => ['required'],
                'serviceId' => ['required'],
            ]);

            $transaction->update($request->all());

            if ($transaction->wasChanged()) {
                return response()->json(['message' => 'Transaction edited', 'data' => $transaction]);
            } else {
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Transaction edit failed: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        try {
            $transaction->delete();

            $existingTransaction = Transaction::find($id);

            if (!$existingTransaction) {
                return response()->json(['message' => 'Transaction deleted']);
            } else {
                return response()->json(['message' => 'Transaction deletion failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Transaction deletion failed: ' . $e->getMessage()], 500);
        }
    }
}
    

