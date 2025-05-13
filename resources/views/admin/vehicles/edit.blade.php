<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="vehicle_code" class="form-label">Kode Kendaraan</label>
                <input type="text" class="form-control" id="vehicle_code" name="vehicle_code" value="{{ $vehicle->vehicle_code }}" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Merek Kendaraan</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $vehicle->brand }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kendaraan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $vehicle->name }}" required>
            </div>
            <div class="mb-3">
                <label for="plate_number" class="form-label">Nomor Plat</label>
                <input type="text" class="form-control" id="plate_number" name="plate_number" value="{{ $vehicle->plate_number }}" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $vehicle->year }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available" {{ $vehicle->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="borrowed" {{ $vehicle->status == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="maintenance" {{ $vehicle->status == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
