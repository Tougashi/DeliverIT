<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Service;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Dashboard()
    {
       
        $transactions = Transaction::selectRaw('YEAR(created_at) as year, DATE_FORMAT(created_at, "%M") as month, SUM(cost) as totalCost')
        ->groupBy('year', 'month')
        ->get();

        $services = Service::count();

        $mostUsedServiceId = Transaction::select('serviceId')
        ->groupBy('serviceId')
        ->orderByRaw('COUNT(*) DESC')
        ->first();
        $mostUsedVehicle = Service::where('id', $mostUsedServiceId->serviceId)->value('vehicle');
        $mostActiveUserRoleId2 = User::select('id', 'firstName')
        ->where('roleId', 2)
        ->orderByDesc(
            Transaction::selectRaw('COUNT(*)')
                ->whereColumn('userId', 'users.id')
        )
        ->first();
        $mostActiveUserRoleId2TransactionCount = Transaction::where('userId', $mostActiveUserRoleId2->id)->count();
        $mostActiveUserRoleId3 = User::select('id', 'firstName')
            ->where('roleId', 3)
            ->orderByDesc(
                Transaction::selectRaw('COUNT(*)')
                    ->whereColumn('userId', 'users.id')
            )
            ->first();
        $mostActiveUserRoleId3TransactionCount = Transaction::where('userId', $mostActiveUserRoleId3->id)->count();




        return view('Dashboard.index', compact('transactions', 'mostUsedVehicle', 'mostActiveUserRoleId2', 'mostActiveUserRoleId2TransactionCount', 'mostActiveUserRoleId3', 'mostActiveUserRoleId3TransactionCount'), [
            'title' => 'Dashboard',
            'transactions' => $transactions,
            'services' => $services ,
            'mostUsedVehicle' => $mostUsedVehicle,
            'mostActiveUserRoleId2' => $mostActiveUserRoleId2,
            'mostActiveUserRoleId2TransactionCount' => $mostActiveUserRoleId2TransactionCount,
            'mostActiveUserRoleId3' => $mostActiveUserRoleId3,
            'mostActiveUserRoleId3TransactionCount' => $mostActiveUserRoleId3TransactionCount,
        ]);
    }

}
