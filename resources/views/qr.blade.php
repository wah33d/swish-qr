<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column align-items-center min-vh-100">

    <h1 class="mt-4">{{ $company }} AB</h1>

    <img src="data:image/png;base64,{{ $qrImage }}" 
         alt="QR Code"
         class="img-fluid mt-4 mb-3"
         style="max-width: 300px;">

    <h2 class="text-success m-0">SEK {{ $amountValue }}</h2>
    <br>
    <h4 class="fst-italic">🚕 {{ $driver }} 🚕</h4>

    <a href="{{ route('form', [$company,$driver]) }}" class="mt-2">
        <button class="btn btn-danger px-4 py-2">
            ♻️ Generate New ♻️
        </button>
    </a>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
