<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    
    public function Complain()
    {
        return view('Complain.index', [
            'title' => "Complain"
        ]);
    }








   // API CONTROLLER 
    public function Edit()
    {
        return view('Complain.edit', [
            'title' => "Edit Complain"
        ]);
    }
    public function index()
    {
        try {
            $complains = Complain::all();
            return response()->json($complains);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $complain = Complain::find($id);

            if (!$complain) {
                return response()->json(['message' => 'Complain not found'], 404);
            }

            return response()->json($complain);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                // 'userId' => ['required'],
                'detail' => ['required'],
                'status' => ['required'],
            ]);

            $complain = Complain::create($request->all());

            return response()->json(['message' => 'Complain created', 'data' => $complain]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Complain create failed ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $complain = Complain::find($id);

            if (!$complain) {
                return response()->json(['message' => 'Complain not found'], 404);
            }

            $validatedData = $request->validate([
                // 'userId' => ['required'],
                'detail' => ['required'],
                'status' => ['required'],
            ]);

            $complain->update($request->all());

            if ($complain->wasChanged()) {
                return response()->json(['message' => 'Complain edited', 'data' => $complain]);
            } else {
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Complain edit failed: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $complain = Complain::find($id);

            if (!$complain) {
                return response()->json(['message' => 'Complain not found'], 404);
            }

            $complain->delete();

            return response()->json(['message' => 'Complain deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Complain delete failed : ' . $e->getMessage()], 500);
        }
    }
}
