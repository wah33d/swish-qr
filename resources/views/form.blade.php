<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{$company}} AB</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem;
    }
    form {
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
      width: 320px;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    label { font-weight: bold; }
    input { padding: 0.5rem; font-size: 1rem; width: 100%; }
    button {
      background-color: #007bff; color: white; padding: 0.6rem;
      border: none; border-radius: 5px; cursor: pointer; font-size: 1rem;
    }
    button:hover { background-color: #0056b3; }
    #qr-container { margin-top: 1.5rem; text-align: center; }
    img { margin-top: 10px; border: 2px solid #ddd; border-radius: 6px; }
    pre { background: #eee; padding: 1rem; border-radius: 6px; overflow-x: auto; }
  </style>
</head>
<body>
  <h1>{{$company}} AB</h1>

  <!-- POST form -->
  <form method="POST" action="{{route('generateQR',[$company,$driver])}}">
    @csrf
    <div>
      <input type="number" id="payee" name="payee" value="1230163089" hidden required readonly/>
    </div>
    <div>
      <label for="amount">Amount (SEK):</label><br />
      <input type="number" id="amount" name="amount" value="" min="1" required />
    </div>
    <div>
      <input type="text" id="message" name="message" value="{{$driver}}" maxlength="50" hidden readonly/>
    </div>
    <button type="submit">Generate QR</button>
  </form>

  <div id="qr-container">
    @if(isset($qrCodeUrl))
      <h3>Generated Swish QR Code:</h3>
      <img src="{{ $qrCodeUrl }}" alt="Swish QR Code" width="300" height="300" />
    @endif
  </div>
</body>
</html>
