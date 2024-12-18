<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stasiun - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2C2563; /* Warna ungu latar belakang */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }
        .login-card h1 {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
        .login-card p {
            text-align: center;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        .btn-orange {
            background-color: #E85B2D;
            color: #fff;
            font-weight: bold;
            border: none;
        }
        .btn-orange:hover {
            background-color: #d14e24;
        }
    </style>
</head>
<body>
    <!-- Kontainer Login -->
    <div class="login-card">
        <h1>Manajemen Stasiun</h1>
        <p>Silahkan masuk sebagai administrator</p>

        <!-- Form Login -->
        <form method="POST" action="<?php echo e(route('admin.login')); ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-orange">MASUK</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\iivan\OneDrive\Documents\Tugas_Kuliah\Tingkat 4\capstot\Capstone-PIDS\Manajemen-Stasiun\resources\views\login.blade.php ENDPATH**/ ?>