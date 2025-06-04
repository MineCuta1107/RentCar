@extends('layouts.member')

@section('title', 'Kebijakan Privasi')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-8 mt-8 mb-12">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Kebijakan Privasi</h1>
    <p class="mb-6 text-gray-700">
        Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, melindungi, dan membagikan informasi pribadi Anda saat menggunakan layanan rental kendaraan kami.
    </p>
    <ol class="list-decimal list-inside text-gray-800 space-y-3">
        <li>
            <strong>Informasi yang Kami Kumpulkan</strong>
            <ul class="list-disc list-inside ml-6 mt-1 text-gray-700">
                <li>Data identitas: nama, NIK, SIM, alamat, email, nomor telepon.</li>
                <li>Data transaksi: riwayat peminjaman, pembayaran, dan pengembalian kendaraan.</li>
                <li>Data penggunaan: aktivitas Anda di aplikasi/website rental kendaraan.</li>
            </ul>
        </li>
        <li>
            <strong>Penggunaan Informasi</strong>
            <ul class="list-disc list-inside ml-6 mt-1 text-gray-700">
                <li>Memproses pemesanan dan pengelolaan transaksi rental kendaraan.</li>
                <li>Menghubungi Anda terkait konfirmasi, pengingat, atau layanan pelanggan.</li>
                <li>Meningkatkan kualitas layanan dan keamanan sistem.</li>
            </ul>
        </li>
        <li>
            <strong>Perlindungan Data</strong>
            <ul class="list-disc list-inside ml-6 mt-1 text-gray-700">
                <li>Kami menjaga kerahasiaan data Anda dengan sistem keamanan yang memadai.</li>
                <li>Data tidak akan dibagikan ke pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum.</li>
            </ul>
        </li>
        <li>
            <strong>Hak Pengguna</strong>
            <ul class="list-disc list-inside ml-6 mt-1 text-gray-700">
                <li>Anda dapat meminta akses, perubahan, atau penghapusan data pribadi Anda dengan menghubungi layanan pelanggan kami.</li>
            </ul>
        </li>
        <li>
            <strong>Cookies</strong>
            <ul class="list-disc list-inside ml-6 mt-1 text-gray-700">
                <li>Website kami menggunakan cookies untuk meningkatkan pengalaman pengguna dan keamanan.</li>
            </ul>
        </li>
        <li>
            <strong>Perubahan Kebijakan</strong>
            <ul class="list-disc list-inside ml-6 mt-1 text-gray-700">
                <li>Kebijakan privasi ini dapat diperbarui sewaktu-waktu. Perubahan akan diinformasikan melalui website/aplikasi.</li>
            </ul>
        </li>
    </ol>
    <div class="mt-8 text-gray-600 text-sm">
        Jika Anda memiliki pertanyaan atau permintaan terkait privasi, silakan hubungi layanan pelanggan kami.
    </div>
</div>
@endsection 