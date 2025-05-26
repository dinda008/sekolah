<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            background: linear-gradient(135deg, #007BFF 0%, #00c6ff 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-box {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            animation: slideUp 0.8s ease;
        }
        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .login-box h4 {
            color: #007BFF;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .login-box .form-control {
            border-radius: 12px;
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }
        .login-box .form-control:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0,123,255,0.4);
        }
        .login-box .btn-primary {
            background-color: #007BFF;
            border: none;
            border-radius: 12px;
            padding: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .login-box .btn-primary:hover {
            background-color: #0056b3;
        }
        .logo {
            width: 70px;
            height: auto;
            margin-bottom: 20px;
        }
        /* Buat button toggle password agar menyatu dengan input */
        .input-group .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>
<body>
    <div class="login-box text-center">
        <!-- Logo -->
        <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" width="300" />

        <h4>Admin SMPN 2 PRAJEKAN</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    required
                    autofocus
                />
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        required
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="button"
                        id="togglePassword"
                        tabindex="-1"
                        aria-label="Tampilkan Sandi"
                    >
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type =
                password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.innerHTML =
                type === 'password'
                    ? '<i class="fas fa-eye"></i>'
                    : '<i class="fas fa-eye-slash"></i>';
        });
    </script>
</body>
</html>
