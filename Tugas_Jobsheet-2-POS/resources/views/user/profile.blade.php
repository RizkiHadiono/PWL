<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow border-0" style="width: 25rem;">
        <div class="card-header bg-primary text-white text-center py-3">
            <h4 class="mb-0">Profil Pengguna</h4>
        </div>
        <div class="card-body text-center p-4">
            <div class="mb-4">
                <img src="https://ui-avatars.com/api/?name={{ $name }}&background=0D6EFD&color=fff&size=128" class="rounded-circle shadow" alt="User Avatar">
            </div>
            <h3 class="fw-bold">{{ $name }}</h3>
            <p class="text-muted mb-4">User ID: {{ $id }}</p>
            <div class="d-grid">
                <a href="/" class="btn btn-outline-secondary">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>