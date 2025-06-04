{{-- resources/views/borrow/index.blade.php --}}
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
            <form id="daysForm" class="mb-6 flex items-center gap-3">
                <label for="days" class="font-semibold text-gray-700">Lama Pinjam:</label>
                <input type="number" min="1" value="1" id="days" name="days" class="w-20 px-2 py-1 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                <span class="text-gray-500">hari</span>
            </form>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($availableVehicles as $vehicle)
                <div class="rounded-xl shadow-md border border-gray-100 bg-gradient-to-br from-blue-50 to-white p-5 flex flex-col hover:shadow-xl transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-car-side fa-2x text-blue-500"></i>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-gray-900">{{ $vehicle->brand }} {{ $vehicle->name }}</div>
                        </div>
                    </div>
                    <ul class="mb-4 space-y-2">
                        <li class="flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-6 h-6 bg-blue-100 text-blue-600 rounded-full"><i class="fas fa-chair"></i></span>
                            <span class="font-semibold">{{ $vehicle->seats ?? '-' }}</span> Kursi
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-6 h-6 bg-yellow-100 text-yellow-600 rounded-full"><i class="fa-solid fa-suitcase"></i></span>
                            <span class="font-semibold">{{ $vehicle->luggage ?? '-' }}</span> Koper
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-6 h-6 bg-green-100 text-green-600 rounded-full">
                                @if($vehicle->insurance)
                                    <i class="fas fa-check text-green-600"></i>
                                @else
                                    <i class="fas fa-times text-red-600"></i>
                                @endif
                            </span>
                            <span class="font-semibold">Asuransi</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-6 h-6 bg-gray-100 text-gray-600 rounded-full"><i class="fas fa-calendar-alt"></i></span>
                            <span class="font-semibold usia-kendaraan" data-year="{{ $vehicle->year }}">Usia kendaraan {{ now()->year - $vehicle->year }} tahun</span>
                        </li>
                    </ul>
                    <div class="mb-4">
                        <span class="text-gray-500 text-sm">Harga</span>
                        <div class="text-2xl font-bold text-orange-600">
                            Rp <span class="harga-per-hari">{{ number_format($vehicle->price, 0, ',', '.') }}</span>
                            <span class="text-base font-normal text-gray-500">/ hari</span>
                        </div>
                        <div class="text-sm text-gray-700 mt-1">Total: <span class="total-harga font-semibold">Rp {{ number_format($vehicle->price, 0, ',', '.') }}</span></div>
                    </div>
                    <form action="{{ route('member.borrow.store') }}" method="POST" class="w-full mt-auto">
                        @csrf
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                        <input type="hidden" name="days" class="input-days" value="1">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 px-4 rounded-lg font-semibold text-white shadow-md transition bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed">
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
<div id="confirmModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-lg font-bold mb-4">Konfirmasi Peminjaman</h3>
        <div class="mb-2">Lama Pinjam: <span id="modalDays" class="font-semibold"></span> hari</div>
        <div class="mb-2">Harga Perhari: <span id="modalPrice" class="font-semibold"></span></div>
        <div class="mb-2">Harga Total: <span id="modalTotal" class="font-semibold"></span></div>
        <div class="mb-2">Tanggal Pengembalian: <span id="modalReturnDate" class="font-semibold"></span></div>
        <hr class="my-4">
        <div class="mb-3">
            <div class="font-semibold text-base mb-2 flex items-center gap-2"><i class="fas fa-info-circle text-blue-700"></i> Informasi Layanan</div>
            <ul class="text-sm text-gray-700 space-y-2">
                <li class="flex items-center gap-2"><i class="fas fa-clock text-blue-700"></i> 24 jam layanan darurat</li>
                <li class="flex items-center gap-2"><i class="fas fa-car-crash text-blue-700"></i> Pengganti mobil rusak</li>
                <li class="flex items-center gap-2"><i class="fas fa-shield-alt text-blue-700"></i> Asuransi</li>
                <li class="flex items-center gap-2"><i class="fas fa-money-bill-wave text-blue-700"></i> Pembatalan bayar 10x lipat</li>
            </ul>
        </div>
        <div class="mb-3">
            <div class="font-semibold text-base mb-2 flex items-center gap-2"><i class="fas fa-list text-orange-600"></i> Syarat dan Ketentuan</div>
            <ul class="text-sm text-gray-700 space-y-2">
                <li class="flex items-center gap-2"><i class="fas fa-id-card text-orange-600"></i> Diperlukan e-KTP & SIM</li>
                <li class="flex items-center gap-2"><i class="fas fa-truck text-orange-600"></i> Belum termasuk biaya pengantaran mobil</li>
                <li class="flex items-center gap-2"><i class="fas fa-car-side text-orange-600"></i> Tidak dapat memilih nomor plat ganjil/genap</li>
            </ul>
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <button id="modalNo" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">No</button>
            <button id="modalYes" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Yes</button>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/4e8e2e6e5b.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const daysInput = document.getElementById('days');
        daysInput.addEventListener('input', updateTotalHarga);
        daysInput.addEventListener('input', function() {
            allowSubmit = false;
        });
        function updateTotalHarga() {
            let days = parseInt(daysInput.value) || 1;
            document.querySelectorAll('.input-days').forEach(input => input.value = days);
            document.querySelectorAll('.harga-per-hari').forEach((el, idx) => {
                let harga = parseInt(el.textContent.replace(/\D/g, ''));
                let total = harga * days;
                let totalStr = 'Rp ' + total.toLocaleString('id-ID');
                document.querySelectorAll('.total-harga')[idx].textContent = totalStr;
            });
        }
        updateTotalHarga();

        let currentForm = null;
        let allowSubmit = false;
        document.querySelectorAll('.grid form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!allowSubmit) {
                    e.preventDefault();
                    currentForm = form;
                    const days = parseInt(form.querySelector('.input-days').value) || 1;
                    const price = parseInt(form.closest('.rounded-xl').querySelector('.harga-per-hari').textContent.replace(/\D/g, ''));
                    const total = price * days;
                    const today = new Date();
                    const returnDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + days);
                    const returnDateStr = returnDate.toLocaleDateString('id-ID');
                    document.getElementById('modalDays').textContent = days;
                    document.getElementById('modalPrice').textContent = 'Rp ' + price.toLocaleString('id-ID');
                    document.getElementById('modalTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
                    document.getElementById('modalReturnDate').textContent = returnDateStr;
                    document.getElementById('confirmModal').classList.remove('hidden');
                } else {
                    allowSubmit = false;
                }
            });
        });
        document.getElementById('modalNo').onclick = function() {
            document.getElementById('confirmModal').classList.add('hidden');
            currentForm = null;
            allowSubmit = false;
        };
        document.getElementById('modalYes').onclick = function() {
            if(currentForm) {
                allowSubmit = true;
                currentForm.submit();
            }
        };
    });
</script>
@endsection
