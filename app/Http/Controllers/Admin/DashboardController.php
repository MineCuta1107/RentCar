<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Vehicles;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicles = Vehicles::count();
        $availableVehicles = Vehicles::where('status', 'available')->count();
        $borrowedVehicles = Vehicles::where('status', 'borrowed')->count();
        
        $totalTransactions = Transaction::count();
        $completedTransactions = Transaction::where('status', 'completed')->count();
        $ongoingTransactions = Transaction::where('status', 'ongoing')->count();
        
        $totalUsers = User::where('role', 'member')->count();
        
        $recentTransactions = Transaction::with(['user', 'vehicle'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $monthlyStats = Transaction::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->get();

        return view('admin.dashboard', compact(
            'totalVehicles',
            'availableVehicles',
            'borrowedVehicles',
            'totalTransactions',
            'completedTransactions',
            'ongoingTransactions',
            'totalUsers',
            'recentTransactions',
            'monthlyStats'
        ));
    }
} 