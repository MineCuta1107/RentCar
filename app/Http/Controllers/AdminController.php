<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Vehicles;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalVehicles = Vehicles::count();
        $availableVehicles = Vehicles::where('status', 'available')->count();
        $borrowedVehicles = Vehicles::where('status', 'borrowed')->count();
        
        \Log::info('Vehicle Statistics:', [
            'total' => $totalVehicles,
            'available' => $availableVehicles,
            'borrowed' => $borrowedVehicles
        ]);
        
        $totalTransactions = Transaction::count();
        $completedTransactions = Transaction::where('status', 'completed')->count();
        $ongoingTransactions = Transaction::where('status', 'ongoing')->count();
        
        $totalUsers = User::where('role', 'member')->count();

        return view('admin.dashboard', compact(
            'totalVehicles',
            'availableVehicles',
            'borrowedVehicles',
            'totalTransactions',
            'completedTransactions',
            'ongoingTransactions',
            'totalUsers'
        ));
    }
}