<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Pengaduan Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Login siswa</h3>
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger small"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('auth/proses_login_siswa') ?>" method="post">
                        <div class="mb-3">
                            <label>Nomor Induk Siswa (NIS)</label>
                            <input type="number" name="nis" class="form-control" placeholder="Contoh: 12345" required>
                        </div>

                        <div class="mb-3">
                            <label>kelas</label>
                            <input type="text" name="kelas" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                       <div class="mt-3 text-center">
                        <a href="<?= base_url('login') ?>" class="small">Login sebagai Admin</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

