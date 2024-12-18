<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stasiun - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2C2563; /* Warna latar belakang ungu */
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-orange {
            background-color: #E85B2D; /* Warna tombol oranye */
            color: white;
            font-weight: bold;
        }
        .btn-orange:hover {
            background-color: #d14e24;
        }
        .card-title {
            font-size: 1.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <div class="card-body">
            <!-- Judul -->
            <h1 class="card-title text-center mb-2">Manajemen Stasiun</h1>
            <p class="text-center text-muted mb-4">Silahkan masuk sebagai administrator</p>

            <!-- Form Login -->
            <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-orange">MASUK</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\iivan\OneDrive\Documents\Tugas_Kuliah\Tingkat 4\capstot\Capstone-PIDS\Manajemen-Stasiun\resources\views/login.blade.php ENDPATH**/ ?>