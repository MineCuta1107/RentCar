<form action="{{ $action }}" method="POST">
    @csrf
    @if(isset($method) && strtoupper($method) === 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="vehicle_code" class="form-label">Kode Kendaraan</label>
            <input type="text" class="form-control @error('vehicle_code') is-invalid @enderror" id="vehicle_code" name="vehicle_code" value="{{ isset($vehicle) ? old('vehicle_code', $vehicle->vehicle_code) : '' }}" required>
            @error('vehicle_code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="brand" class="form-label">Merek Kendaraan</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ isset($vehicle) ? old('brand', $vehicle->brand) : '' }}" required>
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nama Kendaraan</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($vehicle) ? old('name', $vehicle->name) : '' }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="plate_number" class="form-label">Nomor Plat</label>
            <input type="text" class="form-control @error('plate_number') is-invalid @enderror" id="plate_number" name="plate_number" value="{{ isset($vehicle) ? old('plate_number', $vehicle->plate_number) : '' }}" required>
            @error('plate_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ isset($vehicle) ? old('year', $vehicle->year) : '' }}" required min="1900" max="2099" maxlength="4">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text mt-1" id="usiaKendaraanPreview">Usia Kendaraan: - tahun</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="available" {{ isset($vehicle) && old('status', $vehicle->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="borrowed" {{ isset($vehicle) && old('status', $vehicle->status) == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                <option value="maintenance" {{ isset($vehicle) && old('status', $vehicle->status) == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="seats" class="form-label">Kursi</label>
            <input type="number" class="form-control @error('seats') is-invalid @enderror" id="seats" name="seats" value="{{ isset($vehicle) ? old('seats', $vehicle->seats) : '' }}" min="1" required>
            @error('seats')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="luggage" class="form-label">Koper</label>
            <input type="number" class="form-control @error('luggage') is-invalid @enderror" id="luggage" name="luggage" value="{{ isset($vehicle) ? old('luggage', $vehicle->luggage) : '' }}" min="0" required>
            @error('luggage')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="price" class="form-label">Harga per Hari (Rp)</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ isset($vehicle) ? old('price', $vehicle->price) : '' }}" min="0" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Asuransi</label>
            <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" id="insurance" name="insurance" value="1" {{ isset($vehicle) && old('insurance', $vehicle->insurance) ? 'checked' : '' }}>
                <label class="form-check-label" for="insurance">
                    <span id="insuranceIcon">
                        @if(isset($vehicle) && old('insurance', $vehicle->insurance))
                            <i class="fas fa-check text-success"></i>
                        @else
                            <i class="fas fa-times text-danger"></i>
                        @endif
                    </span>
                </label>
            </div>
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
    });
</script> 