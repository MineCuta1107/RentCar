<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota</title>
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
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-top: 1rem;
        }
        .table { margin-bottom: 0; }
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
        .table tbody tr:hover { background-color: var(--bg-light); }
        .alert {
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-sm { padding: 0.4rem 0.8rem; font-size: 0.875rem; }
        .action-buttons { display: flex; gap: 0.5rem; }
        @media (max-width: 768px) {
            .sidebar { width: 0; transform: translateX(-100%); }
            .main-content { margin-left: 0; }
            .sidebar.show { width: 280px; transform: translateX(0); }
            .table-responsive { margin: 0 -1.5rem; }
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
                <a class="nav-link" href="/admin/transactions">
                    <i class="fas fa-exchange-alt"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/users">
                    <i class="fas fa-users"></i>
                    Kelola Anggota
                </a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="content-header">
            <h1>Kelola Anggota</h1>
            <div class="d-flex gap-2">
                <a href="#" class="btn-action btn-primary btn-create-user">
                    <i class="fas fa-user-plus"></i>
                    Tambah Anggota
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Role</th>
                            <th>No Telp</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->number_phone }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action btn-warning btn-sm btn-edit-user" data-id="{{ $user->id }}">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Edit Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="editUserModalBody">
            <div class="text-center text-secondary py-5">
              <div class="spinner-border" role="status"></div>
              <div>Memuat data...</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
        const modalBody = document.getElementById('editUserModalBody');
        const modalTitle = document.getElementById('editUserModalLabel');
        // Edit
        document.querySelectorAll('.btn-edit-user').forEach(function(btn) {
          btn.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-id');
            modalTitle.textContent = 'Edit Anggota';
            modalBody.innerHTML = `<div class='text-center text-secondary py-5'><div class='spinner-border' role='status'></div><div>Memuat data...</div></div>`;
            editModal.show();
            fetch(`/admin/users/${userId}/edit`)
              .then(res => res.text())
              .then(html => {
                modalBody.innerHTML = html;
              })
              .catch(() => {
                modalBody.innerHTML = '<div class="text-danger">Gagal memuat data.</div>';
              });
          });
        });
        // Create
        document.querySelector('.btn-create-user').addEventListener('click', function(e) {
          e.preventDefault();
          modalTitle.textContent = 'Tambah Anggota';
          modalBody.innerHTML = `<div class='text-center text-secondary py-5'><div class='spinner-border' role='status'></div><div>Memuat data...</div></div>`;
          editModal.show();
          fetch(`/admin/users/create`)
            .then(res => res.text())
            .then(html => {
              modalBody.innerHTML = html;
            })
            .catch(() => {
              modalBody.innerHTML = '<div class="text-danger">Gagal memuat data.</div>';
            });
        });
      });
    </script>
</body>
</html>
