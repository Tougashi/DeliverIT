<?php

namespace App\Http\Controllers;

use App\Models\Credibility;
use Illuminate\Http\Request;

class CredibilityController extends Controller
{
    public function User()
    {
        return view('Credibility.User.index', [
            'title' => "Credibility User"
        ]);
    }

    public function Courier()
    {
        return view('Credibility.Courier.index', [
            'title' => "Credibility Courier"
        ]);
    }

    public function index()
    {
        $credibilities = Credibility::all();
        return response()->json($credibilities);
    }

    public function show($id)
    {
        $credibility = Credibility::find($id);

        if (!$credibility) {
            return response()->json(['message' => 'Credibility not found'], 404);
        }

        return response()->json(['message' => 'Credibility found', 'data' => $credibility]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                // 'userId' => ['required'],
                'credibility' => ['required', 'numeric', 'in:1,2,3,4,5,6,7,8,9,10'],
            ]);

            $credibility = new Credibility($request->all());
            $credibility->save();

            if ($credibility->id) {
                return response()->json(['message' => 'Credibility created', 'data' => $credibility]);
            } else {
                return response()->json(['message' => 'Credibility creation failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Credibility creation failed: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $credibility = Credibility::find($request->id);

        if (!$credibility) {
            return response()->json(['message' => 'Credibility not found'], 404);
        }

        try {
            $validatedData = $request->validate([
                // 'userId' => ['required'],
                'credibility' => ['required'],
            ]);

            $credibility->update($request->all());

            if ($credibility->wasChanged()) {
                return response()->json(['message' => 'Credibility edited', 'data' => $credibility]);
            } else {
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Credibility edit failed: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $credibility = Credibility::find($id);

        if (!$credibility) {
            return response()->json(['message' => 'Credibility not found'], 404);
        }

        try {
            $credibility->delete();

            $existingCredibility = Credibility::find($id);

            if (!$existingCredibility) {
                return response()->json(['message' => 'Credibility deleted']);
            } else {
                return response()->json(['message' => 'Credibility deletion failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Credibility deletion failed: ' . $e->getMessage()], 500);
        }
    }
}
    

