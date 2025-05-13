<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kendaraan</title>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        .sidebar .nav-link.active {
            background: #4f46e5 !important;
            color: #fff !important;
            font-weight: 600;
        }

        .sidebar .nav-link.active i {
            color: #fff !important;
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

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-top: 1rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: var(--bg-light);
            color: var(--text);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #e5e7eb;
        }

        .table tbody tr:hover {
            background-color: var(--bg-light);
        }

        .alert {
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: capitalize;
        }

        .badge i {
            font-size: 0.75rem;
        }

        .badge-available {
            background: #d1fae5;
            color: #059669;
            border: 1px solid #6ee7b7;
            font-weight: 600;
            opacity: 1 !important;
        }

        .badge-borrowed {
            background: #fef3c7;
            color: #b45309;
            border: 1px solid #fde68a;
            font-weight: 600;
            opacity: 1 !important;
        }

        .badge-maintenance {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fca5a5;
            font-weight: 600;
            opacity: 1 !important;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.show {
                width: 280px;
                transform: translateX(0);
            }

            .table-responsive {
                margin: 0 -1.5rem;
            }
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
                <a class="nav-link active" href="/admin/vehicles">
                    <i class="fas fa-car"></i>
                    Kelola Kendaraan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/transactions">
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
            <h1>Kelola Kendaraan</h1>
            <div class="d-flex gap-2">
                <a href="#" class="btn-action btn-primary btn-create-vehicle">
                    <i class="fas fa-plus"></i>
                    Tambah Kendaraan
                </a>
                <a href="{{ route('admin.dashboard') }}" class="btn-action btn-danger">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="table-container">
            <div class="table-responsive">
                <table class="table">
            <thead>
                <tr>
                            <th>ID</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Merek</th>
                            <th>Plat Nomor</th>
                    <th>Tahun</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                        @foreach($vehicles as $vehicle)
                    <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->vehicle_code }}</td>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->brand }}</td>
                                <td>{{ $vehicle->plate_number }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>
                                    <span class="badge badge-{{ $vehicle->status }}">
                                        @if($vehicle->status === 'available')
                                            <i class="fas fa-check-circle"></i>
                                        @elseif($vehicle->status === 'borrowed')
                                            <i class="fas fa-car"></i>
                                        @else
                                            <i class="fas fa-tools"></i>
                                        @endif
                                        {{ ucfirst($vehicle->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action btn-warning btn-sm btn-edit-vehicle" data-id="{{ $vehicle->id }}">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                            <button type="submit" class="btn-action btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                            </form>
                                    </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        </div>
    </div>

    <!-- Modal Edit Vehicle -->
    <div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVehicleModalLabel">Edit Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editVehicleModalBody">
                    <div class="text-center text-secondary py-5">
                        <div class="spinner-border" role="status"></div>
                        <div>Memuat data...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Vehicle -->
    <div class="modal fade" id="createVehicleModal" tabindex="-1" aria-labelledby="createVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createVehicleModalLabel">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Kendaraan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="createVehicleModalBody">
                    <form action="{{ route('admin.vehicles.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="vehicle_code" class="form-label">Kode Kendaraan</label>
                                <input type="text" class="form-control @error('vehicle_code') is-invalid @enderror" 
                                    id="vehicle_code" name="vehicle_code" value="{{ old('vehicle_code') }}" required>
                                @error('vehicle_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="brand" class="form-label">Merek Kendaraan</label>
                                <input type="text" class="form-control @error('brand') is-invalid @enderror" 
                                    id="brand" name="brand" value="{{ old('brand') }}" required>
                                @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama Kendaraan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="plate_number" class="form-label">Nomor Plat</label>
                                <input type="text" class="form-control @error('plate_number') is-invalid @enderror" 
                                    id="plate_number" name="plate_number" value="{{ old('plate_number') }}" required>
                                @error('plate_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="year" class="form-label">Tahun</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" 
                                    id="year" name="year" value="{{ old('year') }}" required>
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="borrowed" {{ old('status') == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn-action btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                Batal
                            </button>
                            <button type="submit" class="btn-action btn-primary">
                                <i class="fas fa-save"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = new bootstrap.Modal(document.getElementById('editVehicleModal'));
            const createModal = new bootstrap.Modal(document.getElementById('createVehicleModal'));
            const editModalBody = document.getElementById('editVehicleModalBody');
            const editModalTitle = document.getElementById('editVehicleModalLabel');

            // Edit Vehicle
            document.querySelectorAll('.btn-edit-vehicle').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const vehicleId = this.getAttribute('data-id');
                    editModalTitle.textContent = 'Edit Kendaraan';
                    editModalBody.innerHTML = `<div class='text-center text-secondary py-5'><div class='spinner-border' role='status'></div><div>Memuat data...</div></div>`;
                    editModal.show();
                    fetch(`/admin/vehicles/${vehicleId}/edit`)
                        .then(res => res.text())
                        .then(html => {
                            editModalBody.innerHTML = html;
                        })
                        .catch(() => {
                            editModalBody.innerHTML = '<div class="text-danger">Gagal memuat data.</div>';
                        });
                });
            });

            // Create Vehicle
            document.querySelector('.btn-create-vehicle').addEventListener('click', function(e) {
                e.preventDefault();
                createModal.show();
            });

            // Refresh page when any modal is closed
            const modals = [document.getElementById('editVehicleModal'), document.getElementById('createVehicleModal')];
            modals.forEach(function(modalEl) {
                modalEl.addEventListener('hidden.bs.modal', function () {
                    window.location.reload();
                });
            });
        });
    </script>
</body>
</html>
