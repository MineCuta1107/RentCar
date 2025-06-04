<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Vehicles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        // Hitung total revenue dari transaksi completed
        $totalRevenue = Transaction::where('status', 'completed')
            ->join('vehicles', 'transactions.vehicle_id', '=', 'vehicles.id')
            ->selectRaw('SUM(DATEDIFF(transactions.return_date, transactions.borrow_date) * vehicles.price) as revenue')
            ->value('revenue');
        $totalRevenue = $totalRevenue ?? 0;

        return view('admin.dashboard', compact(
            'totalVehicles',
            'availableVehicles',
            'borrowedVehicles',
            'totalTransactions',
            'completedTransactions',
            'ongoingTransactions',
            'totalUsers',
            'recentTransactions',
            'monthlyStats',
            'totalRevenue'
        ));
    }
} 