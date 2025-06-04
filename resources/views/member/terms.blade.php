@extends('layouts.member')

@section('title', 'Syarat dan Ketentuan')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-8 mt-8 mb-12">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Syarat dan Ketentuan Rental Kendaraan</h1>
    <ol class="list-decimal list-inside text-gray-800 space-y-3">
        <li>Setiap penyewa wajib memiliki e-KTP dan SIM yang masih berlaku.</li>
        <li>Kendaraan hanya boleh digunakan untuk keperluan yang sah dan tidak melanggar hukum.</li>
        <li>Penyewa bertanggung jawab atas segala kerusakan atau kehilangan selama masa sewa, kecuali yang tercakup asuransi.</li>
        <li>Biaya sewa belum termasuk biaya pengantaran dan pengambilan kendaraan.</li>
        <li>Penyewa tidak dapat memilih nomor plat ganjil/genap secara spesifik.</li>
        <li>Pembatalan sewa dapat dilakukan secara gratis sebelum kendaraan diterima.</li>
        <li>Jika terjadi kerusakan, penyewa berhak mendapatkan kendaraan pengganti sesuai ketersediaan.</li>
        <li>Layanan darurat 24 jam tersedia untuk semua penyewa.</li>
        <li>Segala bentuk pelanggaran akan dikenakan sanksi sesuai ketentuan yang berlaku.</li>
    </ol>
    <div class="mt-8 text-gray-600 text-sm">
        Untuk informasi lebih lanjut, silakan hubungi layanan pelanggan kami.
    </div>
</div>
@endsection 