<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f8fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    
        .login-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    
        .login-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }
    
        .form-group {
            margin-bottom: 16px;
            position: relative;
        }
    
        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 6px;
        }
    
        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            box-sizing: border-box; /* Memastikan padding tidak memengaruhi ukuran */
            background-color: #f9f9f9;
            transition: all 0.3s ease-in-out;
        }
    
        .form-group input:hover {
            background-color: #f1f1f1;
        }
    
        .form-group input:focus {
            border-color: #0d6efd;
            background-color: #ffffff;
            outline: none;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
        }
    
        .alert {
            margin-bottom: 16px;
            padding: 10px;
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            font-size: 14px;
        }
    
        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #0d6efd;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
    </head>
<body>
    <div class="login-container">
        <h3>Aplikasi Pemakaman Online</h3>

        @if(session()->has('loginError'))
            <div class="alert">
                {{ session('loginError') }}
            </div>
        @endif

        <form action="/login" method="post">
            @csrf
            <!-- Input for Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Input for NIK -->
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" placeholder="Enter your NIK" value="{{ old('nik') }}" required>
                @error('nik')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Submit Button -->
            <button type="submit">Log In</button>
        </form>
            </div>
</body>
</html>
