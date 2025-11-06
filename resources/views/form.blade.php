<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$company}} AB</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container d-flex flex-column align-items-center py-4">

    <h1 class="mb-4">{{$company}} AB</h1>

    <!-- POST form -->
    <form method="POST" 
          action="{{route('generateQR',[$company,$driver])}}"
          class="bg-white p-4 rounded shadow-sm"
          style="max-width: 400px; width: 100%;">
      
      @csrf

      <input type="number" id="payee" name="payee"
             value="1230163089" hidden required readonly>

      <div class="mb-3">
        <label for="amount" class="form-label fw-bold">Amount (SEK):</label>
        <input type="number" id="amount" name="amount" 
               class="form-control" min="1" required>
      </div>

      <input type="text" id="message" name="message"
             value="{{$driver}}" hidden maxlength="50" readonly>

      <button type="submit" class="btn btn-primary w-100">
        Generate QR
      </button>
    </form>

    <div id="qr-container" class="text-center mt-4">
      @if(isset($qrCodeUrl))
        <h3>Generated Swish QR Code:</h3>
        <img src="{{ $qrCodeUrl }}" alt="Swish QR Code" 
             class="img-thumbnail mt-2" width="300" height="300">
      @endif
    </div>

  </div>

  <!-- Bootstrap JS (optional for interactivity) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
