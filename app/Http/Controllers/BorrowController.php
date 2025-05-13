<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Vehicles;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $hasActiveTransaction = false;

    if (auth()->user()->role === 'member') {
        $hasActiveTransaction = Transaction::where('user_id', auth()->id())
            ->whereIn('status', ['ongoing', 'pending'])
            ->exists();
        
        $availableVehicles = Vehicles::where('status', 'available')->get();
        $userTransactions = Transaction::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'ongoing'])
            ->get();

        return view('member.borrow.index', compact('availableVehicles', 'userTransactions', 'hasActiveTransaction'));
    }

    
    $transactions = Transaction::with(['user', 'vehicle'])->get();
    return view('admin.transactions.index', compact('transactions'));
}



    public function create()
    {
        $vehicles = Vehicles::where('status', 'available')->get();
        $users = User::where('role', 'member')->get();
        return view('admin.transactions.create', compact('vehicles', 'users'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        if (auth()->user()->role === 'member') {
            $hasActive = Transaction::where('user_id', auth()->id())
                ->whereIn('status', ['ongoing', 'pending'])
                ->exists();
            if ($hasActive) {
                return back()->with('error', 'Anda hanya boleh meminjam 1 kendaraan dalam satu waktu.');
            }
            $vehicle = Vehicles::findOrFail($validated['vehicle_id']);
            if ($vehicle->status !== 'available') {
                return back()->with('error', 'Kendaraan sudah tidak tersedia');
            }

            Transaction::create([
                'user_id' => auth()->id(),
                'vehicle_id' => $validated['vehicle_id'],
                'borrow_date' => now(),
                'return_date' => now()->addDay(),
                'status' => 'ongoing',
            ]);

            $vehicle->update(['status' => 'borrowed']);

            return redirect()->route('member.dashboard')->with('success', 'Kendaraan berhasil dipinjam');
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'status' => 'required|in:pending,ongoing,completed',
        ]);

        $vehicle = Vehicles::findOrFail($validated['vehicle_id']);
        if ($vehicle->status !== 'available') {
            return back()->with('error', 'Kendaraan tidak tersedia');
        }

        $transaction = Transaction::create($validated);
        $vehicle->update(['status' => 'borrowed']);

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan')
            ->with('newTransaction', $transaction);
    }

   
    public function show(Transaction $transaction)
    {
        $transaction->load(['user', 'vehicle']);
        if (auth()->user()->role === 'admin') {
            return view('admin.transactions.show', compact('transaction'));
        }

        return back();
    }

    
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,ongoing,completed',
        ]);

        if ($validated['status'] === 'completed') {
            $transaction->vehicle->update(['status' => 'available']);
        } elseif ($validated['status'] === 'ongoing') {
            $transaction->vehicle->update(['status' => 'borrowed']);
        }

        $transaction->update($validated);

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Status transaksi berhasil diupdate');
    }

   
    public function destroy(Transaction $transaction)
    {
        $transaction->vehicle->update(['status' => 'available']);
        $transaction->delete();

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}
