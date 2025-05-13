<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Models\Transaction;
use Carbon\Carbon;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        $activeTransactions = Transaction::where('user_id', auth()->id())
            ->whereIn('status', ['ongoing'])
            ->with(['vehicle'])
            ->get()
            ->map(function ($transaction) {
                $transaction->borrow_date = Carbon::parse($transaction->borrow_date);
                return $transaction;
            });

        $completedTransactions = Transaction::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->with(['vehicle'])
            ->orderBy('updated_at', 'desc')
            ->paginate(3);

        $totalCompleted = Transaction::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->count();

        $totalOngoing = Transaction::where('user_id', auth()->id())
            ->where('status', 'ongoing')
            ->count();

        return view('member.dashboard', compact(
            'activeTransactions',
            'completedTransactions',
            'totalCompleted',
            'totalOngoing'
        ));
    }
}
