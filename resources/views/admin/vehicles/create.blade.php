<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
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
        .modal-content {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .modal-header {
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem;
            border-radius: 12px 12px 0 0;
        }
        .modal-title {
            font-weight: 600;
            color: var(--text);
            font-size: 1.25rem;
        }
        .modal-body {
            padding: 1.5rem;
        }
        .form-label {
            font-weight: 500;
            color: var(--text);
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 1px solid #e5e7eb;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
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
        .btn-action {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
        .btn-secondary { background: var(--text-light); color: white; }
        .btn-secondary:hover { background: #4b5563; transform: translateY(-1px); }
        .invalid-feedback {
            font-size: 0.875rem;
            color: var(--danger);
        }
        .alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
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
                <div class="modal-body">
        @include('admin.vehicles._form', ['action' => route('admin.vehicles.store'), 'method' => 'POST'])
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const yearInput = document.getElementById('year');
            const usiaPreview = document.getElementById('usiaKendaraanPreview');
            function updateUsia() {
                const year = parseInt(yearInput.value);
                const now = new Date().getFullYear();
                if (year && year <= now) {
                    usiaPreview.textContent = `Usia Kendaraan: ${now - year} tahun`;
                } else {
                    usiaPreview.textContent = 'Usia Kendaraan: - tahun';
                }
            }
            yearInput.addEventListener('input', updateUsia);
            updateUsia();
            // Insurance icon toggle
            const insuranceInput = document.getElementById('insurance');
            const insuranceIcon = document.getElementById('insuranceIcon');
            insuranceInput.addEventListener('change', function() {
                if (this.checked) {
                    insuranceIcon.innerHTML = '<i class="fas fa-check text-success"></i>';
                } else {
                    insuranceIcon.innerHTML = '<i class="fas fa-times text-danger"></i>';
                }
            });

            // Reset form & error saat modal dibuka
            const createVehicleModal = document.getElementById('createVehicleModal');
            if (createVehicleModal) {
                createVehicleModal.addEventListener('show.bs.modal', function () {
                    const form = createVehicleModal.querySelector('form');
                    if (form) form.reset();
                    const alert = createVehicleModal.querySelector('.alert-danger');
                    if (alert) alert.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>
