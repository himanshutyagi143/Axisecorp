<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        setTimeout(function(){
            window.location.href = '{{ url('/') }}';
        }, 3000);
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .error-container {
            text-align: center;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .error-title {
            font-size: 48px;
            color: #333;
        }
        .error-message {
            font-size: 24px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <img src="{{ asset('/frontend/img/others/logo-blue.png') }}" alt="Logo" class="logo">
        <h1 class="error-title">404 - Page Not Found</h1>
        <p class="error-message">The page you are looking for does not exist.</p>
    </div>
</body>
</html>
