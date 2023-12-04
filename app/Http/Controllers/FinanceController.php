<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function User()
    {
        return view('Financial.User.index', [
            'title' => "User Balance"
        ]);
    }

    Public function Courier()
    {
        return view('Financial.Courier.index', [
            'title' => "Courier Balance"
        ]);
    }


    public function index()
    {
        $finances = Finance::all();
        return response()->json($finances);
    }

    public function show($id)
    {
        $finance = Finance::with('user')->find($id);
    
        if (!$finance) {
            return response()->json(['message' => 'Finance not found'], 404);
        }
    
        return response()->json(['message' => 'Finance and User have been found', 'data' => $finance]);
    }
    

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                // 'userId' => ['required'],
                'balance' => ['required'],
            ]);

            $finance = new Finance($request->all());
            $finance->save();

            if ($finance->id) {
                return response()->json(['message' => 'Balance Added', 'data' => $finance]);
            } else {
                return response()->json(['message' => 'Balance Added failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Balance Added failed: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $finance = Finance::find($id);

        if (!$finance) {
            return response()->json(['message' => 'Finance not found'], 404);
        }

        try {
            $validatedData = $request->validate([
                // 'userId' => ['required'],
                'balance' => ['required'],
            ]);

            $finance->update($request->all());

            if ($finance->wasChanged()) {
                return response()->json(['message' => 'Balance edited', 'data' => $finance]);
            } else {
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Balance edit failed: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $finance = Finance::find($id);

        if (!$finance) {
            return response()->json(['message' => 'Finance not found'], 404);
        }

        try {
            $finance->delete();

            $existingFinance = Finance::find($id);

            if (!$existingFinance) {
                return response()->json(['message' => 'Balance deleted']);
            } else {
                return response()->json(['message' => 'Balance deletion failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Balance deletion failed: ' . $e->getMessage()], 500);
        }
    }
}
    
