<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --text: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f3f4f6;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text);
        }
        .sidebar {
            height: 100vh;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 280px;
            transition: all 0.3s ease;
        }
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .sidebar-header h5 {
            color: var(--primary);
            font-weight: 600;
            margin: 0;
        }
        .nav-link {
            padding: 0.8rem 1.5rem;
            color: var(--text);
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0.3rem 1rem;
        }
        .nav-link i {
            width: 24px;
            margin-right: 0.8rem;
            font-size: 1.1rem;
        }
        .nav-link:hover {
            background: var(--bg-light);
            color: var(--primary);
        }
        .nav-link.active {
            background: var(--primary);
            color: white;
        }
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
        }
        .content-header {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text);
            margin: 0;
        }
        .btn-action {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none !important;
        }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
        .btn-danger { background: var(--danger); color: white; }
        .btn-danger:hover { background: #dc2626; transform: translateY(-1px); }
        .btn-warning { background: var(--warning); color: white; }
        .btn-warning:hover { background: #d97706; transform: translateY(-1px); }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border: none;
            margin-bottom: 2rem;
        }
        .card-header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem;
            border-radius: 12px 12px 0 0 !important;
        }
        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text);
            margin: 0;
        }
        .card-body {
            padding: 1.5rem;
        }
        .info-section {
            background: var(--bg-light);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .info-section h5 {
            color: var(--text);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        .info-item {
            display: flex;
            margin-bottom: 0.8rem;
        }
        .info-label {
            width: 120px;
            color: var(--text-light);
            font-weight: 500;
        }
        .info-value {
            color: var(--text);
            font-weight: 500;
        }
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
        }
        .form-select {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 1px solid #e5e7eb;
            font-weight: 500;
        }
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
        }
        @media (max-width: 768px) {
            .sidebar { width: 0; transform: translateX(-100%); }
            .main-content { margin-left: 0; }
            .sidebar.show { width: 280px; transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Admin Dashboard</h5>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/vehicles">
                    <i class="fas fa-car"></i>
                    Kelola Kendaraan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/transactions">
                    <i class="fas fa-exchange-alt"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/users">
                    <i class="fas fa-users"></i>
                    Kelola Anggota
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="content-header">
            <h1>Detail Transaksi #{{ $transaction->id }}</h1>
            <a href="{{ route('admin.transactions.index') }}" class="btn-action btn-danger">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-section">
                            <h5><i class="fas fa-user me-2"></i>Informasi Anggota</h5>
                            <div class="info-item">
                                <span class="info-label">Nama</span>
                                <span class="info-value">{{ $transaction->user->name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">NIK</span>
                                <span class="info-value">{{ $transaction->user->nik }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Jabatan</span>
                                <span class="info-value">{{ $transaction->user->position }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">No. Telp</span>
                                <span class="info-value">{{ $transaction->user->phone }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-section">
                            <h5><i class="fas fa-car me-2"></i>Informasi Kendaraan</h5>
                            <div class="info-item">
                                <span class="info-label">Nama</span>
                                <span class="info-value">{{ $transaction->vehicle->name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Merek</span>
                                <span class="info-value">{{ $transaction->vehicle->brand }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Plat Nomor</span>
                                <span class="info-value">{{ $transaction->vehicle->plate_number }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tahun</span>
                                <span class="info-value">{{ $transaction->vehicle->year }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <h5><i class="fas fa-info-circle me-2"></i>Informasi Transaksi</h5>
                    <div class="info-item">
                        <span class="info-label">Tanggal Pinjam</span>
                        <span class="info-value">{{ $transaction->borrow_date }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tanggal Kembali</span>
                        <span class="info-value">{{ $transaction->return_date }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status</span>
                            <span class="badge {{ $transaction->status === 'completed' ? 'bg-success' : ($transaction->status === 'ongoing' ? 'bg-primary' : 'bg-warning') }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                    </div>
                </div>

                <form action="{{ route('admin.transactions.update', $transaction) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <label class="form-label">Update Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $transaction->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="ongoing" {{ $transaction->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ $transaction->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn-action btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Update Status
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>