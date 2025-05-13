{{-- resources/views/member/borrow/index.blade.php --}}
@extends('layouts.member')

@section('title', 'Peminjaman Kendaraan')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Peminjaman Kendaraan
                </h2>
                <p class="mt-1 text-gray-600">
                    Pilih kendaraan yang tersedia untuk dipinjam.
                </p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse($availableVehicles as $vehicle)
                <div class="rounded-xl shadow-md border border-gray-100 bg-gradient-to-br from-blue-50 to-white p-5 flex flex-col hover:shadow-xl transition">
                    <div class="text-left mb-2 space-y-1">
                        <div>
                            <span class="font-semibold text-gray-700">Nama Kendaraan:</span>
                            <span class="text-gray-900">{{ $vehicle->name }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Merek:</span>
                            <span class="text-gray-900">{{ $vehicle->brand }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Tahun:</span>
                            <span class="text-gray-900">{{ $vehicle->year }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Plat Nomor:</span>
                            <span class="text-gray-900">{{ $vehicle->plate_number }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Tahun Produksi:</span>
                            <span class="text-gray-900">{{ $vehicle->production_year ?? $vehicle->year }}</span>
                        </div>
                    </div>
                    <form action="{{ route('member.borrow.store') }}" method="POST" class="w-full mt-4">
                                        @csrf
                                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 px-4 rounded-lg font-semibold text-white shadow-md transition bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed" {{ $hasActiveTransaction ? 'disabled' : '' }}>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                                            Pinjam
                                        </button>
                                    </form>
                </div>
                            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                                    Tidak ada kendaraan yang tersedia saat ini
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
