<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'roles' => ['required'],
            ]);
            $role = new Role($request->all());
            $role->save();
            if ($role->id) {
                return response()->json(['message' => 'Role created', 'data' => $role]);
            } else {
                return response()->json(['message' => 'Role creation failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Role creation failed: ' . $e->getMessage()], 500);
        }
    }
    

    public function show($id)
    {
        $role = Role::find($id);
    
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        return response()->json($role);
    }
    

    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            // Jika ID tidak ditemukan, kembalikan pesan kesalahan.
            return response()->json(['message' => 'Role not found'], 404);
        }

        try {
            $validatedData = $request->validate([
                'roles' => ['required'],
                // Tambahkan validasi lain sesuai kebutuhan.
            ]);

            $role->update($request->all());

            // Periksa apakah ada perubahan saat melakukan pembaruan
            if ($role->wasChanged()) {
                // Jika ada perubahan, kembalikan pesan sukses.
                return response()->json(['message' => 'Role edited', 'data' => $role]);
            } else {
                // Jika tidak ada perubahan, kembalikan pesan bahwa tidak ada perubahan yang dilakukan.
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            // Tangkap pengecualian jika ada kesalahan saat mengedit peran.
            return response()->json(['message' => 'Role edit failed: ' . $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            // Jika ID tidak ditemukan, kembalikan pesan kesalahan.
            return response()->json(['message' => 'Role not found'], 404);
        }
        try {
            // Hapus semua user dengan rolesId yang sama
            User::where('roleId', $id)->delete();

            $role->delete();

            // Pastikan role telah dihapus dengan berhasil.
            $existingRole = Role::find($id);
            if (!$existingRole) {
                return response()->json(['message' => 'Role and associated users deleted']);
            } else {
                return response()->json(['message' => 'Role deletion failed'], 500);
            }
        } catch (\Exception $e) {
            // Tangkap pengecualian jika ada kesalahan saat menghapus role.
            return response()->json(['message' => 'Role deletion failed: ' . $e->getMessage()], 500);
        }
    }

}


