<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Peminjaman Kendaraan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #06b6d4;
            --accent: #f59e0b;
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
            min-height: 100vh;
            background: var(--bg-light);
            color: var(--text);
            overflow-x: hidden;
        }

        .register-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        .register-illustration {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .register-illustration::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            /* background: url('https://img.icons8.com/fluency/240/000000/car.png') no-repeat center; */
            opacity: 0.1;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        .illustration-content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            max-width: 500px;
        }

        .illustration-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .illustration-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .register-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: white;
            overflow-y: auto;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header img {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .form-header h2 {
            color: var(--text);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: color 0.3s;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: var(--bg-light);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .form-control:focus + i {
            color: var(--primary);
        }

        .form-select {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: var(--bg-light);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
        }

        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .btn-register {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: 0.5s;
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-light);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: var(--primary-dark);
        }

        .alert {
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }

        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }

        .alert-danger {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #16a34a;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }

            .register-illustration {
                display: none;
            }

            .register-form {
                padding: 1.5rem;
            }

            .form-container {
                max-width: 100%;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }

        .help-text {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-top: -0.5rem;
            margin-left: 0.5rem;
            display: none;
        }

        .help-text.show {
            display: block;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-illustration">
            <div class="illustration-content">
                <h1>Buat Akun Baru</h1>
                <p>Nikmati kemudahan dan kenyamanan dalam peminjaman kendaraan melalui layanan kami.</p>
            </div>
        </div>
        <div class="register-form">
            <div class="form-container">
                <div class="form-header">
                    <!-- <img src="https://img.icons8.com/fluency/96/000000/car.png" alt="Logo"> -->
                    <h2>Daftar Akun Baru</h2>
                    <p>Isi data diri Anda dengan lengkap</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                        <i class="fas fa-id-card"></i>
                    </div>

                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="input-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <i class="fas fa-at"></i>
                    </div>

                    <div class="input-group">
                        <select name="position" class="form-select" required>
                            <option value="" selected disabled>Pilih Jabatan</option>
                            <option value="Guru">Guru</option>
                            <option value="TPA">TPA</option>
                            <option value="Kepala Urusan">Kepala Urusan</option>
                        </select>
                        <i class="fas fa-briefcase"></i>
                    </div>

                    <div class="input-group">
                        <input type="tel" name="number_phone" class="form-control" placeholder="Nomor Telepon" required>
                        <i class="fas fa-phone"></i>
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required id="password">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="help-text" id="passwordHelp">Minimal 6 karakter</div>

                    <button type="submit" class="btn-register">
                        Daftar
                    </button>

                    <div class="login-link">
                        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const passwordHelp = document.getElementById('passwordHelp');

        passwordInput.addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 6) {
                passwordHelp.classList.add('show');
            } else {
                passwordHelp.classList.remove('show');
            }
        });
    </script>
</body>
</html>