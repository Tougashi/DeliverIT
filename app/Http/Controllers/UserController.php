<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Finance;
use App\Models\Credibility;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    
    public function User()
    {
        $database = Firebase::database();
        $reference = $database->getReference('users');
    
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();
        $total = count($data);
        return view('User.index', [
            'title' => "Users List",
            'userData' => $data,
            'totalUsers' => $total
        ]);
    }

    public function delete($userId)
    {
        // Path ke data pengguna yang akan dihapus
        $path = 'users/' . $userId;
    
        try {
            // Hapus data dari Firebase Realtime Database
            Firebase::database()->getReference($path)->remove();
    
            return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }




    // API MYSQL
    public function index()
    {
        
         $users = User::all();
         return response()->json(['message' => 'All Users Found', 'data' => $users]);
    }
    
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'firstName' => ['required'],
                'lastName' => ['required'],
                'birthDate' => ['required'],
                'adress' => ['required'],
                'email' => ['required', 'unique:users'],
                'password' => ['required', 'custom_password'],
            ]);
    
            // Buat pengguna baru
            $user = User::create(array_merge($request->all(), ['roleId' => 2], ['statusId' => 1]));
    
            // Buat catatan keuangan untuk pengguna baru dengan saldo awal 0
            $finance = new Finance(['userId' => $user->id, 'balance' => 0]);
            $finance->save();
            $credibility = new Credibility(['userId' => $user->id, 'credibility' => 0]);
            $credibility->save();
    
            return response()->json(['message' => 'User Created', 'data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User creation failed: ' . $e->getMessage()], 500);
        }
    }

    public function Edit()
    {
        return view('User.edit', [
            'title' => "User Edit"
        ]);
    }

    public function show($id)
    {
        try {
            $user = User::select('id', 'firstName', 'lastName', 'birthDate', 'adress', 'email', 'roleId', 'statusId')
                ->with(['status:id,status', 'role:id,role', 'finance:userId,balance', 'complain:userId,detail', 'credibilities:userId,credibility', 'transaction'])
                ->findOrFail($id);
    
            return response()->json(['message' => 'User Found', 'data' => $user]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to fetch user data: ' . $e->getMessage()], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'firstName' => ['required'],
                // 'lastName' => ['required'],
                // 'birthDate' => ['required'],            
                'adress' => ['required'],            
                'email' => ['required'],            
                // 'password' => ['required'],                    
            ]);
    
            $user = User::find($id);
    
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $user->update($request->all()); 
            if ($user->wasChanged()) {
                return response()->json(['message' => 'User edited', 'data' => $user]);
            } else {
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'User update failed: ' . $e->getMessage()], 500);
        }
    }
    
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $user->delete();
            return response()->json(['message' => 'All data execpt transaction deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User deletion failed: ' . $e->getMessage()], 500);
        }
    }


    public function History()
    {
        return view('User.History.index', [
            'title' => "History Orders"
        ]);
    }
    
    public function Order()
    {
        return view('User.History.edit', [
            'title' => "Edit Order History"
        ]);
    }
}
