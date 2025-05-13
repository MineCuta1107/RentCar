<aside class="fixed inset-y-0 left-0 w-64 bg-gray-800">
    <div class="flex h-16 items-center justify-center bg-gray-900">
        <span class="text-xl font-bold text-white">Rental Kendaraan</span>
    </div>

    <nav class="mt-6">
        <div class="space-y-1 px-2">
            <a href="{{ route('admin.dashboard') }}" 
               class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-white hover:bg-gray-700">
                Dashboard
            </a>

            <a href="{{ route('admin.vehicles.index') }}" 
               class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-white hover:bg-gray-700">
                Kelola Kendaraan
            </a>

            <a href="{{ route('admin.transactions.index') }}" 
               class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-white hover:bg-gray-700">
                Transaksi
            </a>

            <a href="{{ route('admin.users.index') }}" 
               class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-white hover:bg-gray-700">
                Kelola Anggota
            </a>
        </div>
    </nav>