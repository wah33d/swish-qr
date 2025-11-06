<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center; /* horizontal centering */
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            min-height: 100vh;
        }
        img {
            max-width: 300px;
            margin-top: 40px; /* push QR down from top */
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center; /* center form content horizontally */
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        h2 {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <img src="data:image/png;base64,{{ $qrImage }}" alt="QR Code">
        <h2>SEK {{ $amountValue }}</h2>
        <h2>{{ $driver }}</h2>
        <a href="{{ route('form', [$company,$driver]) }}"><button type="submit">Generate New</button></a>
</body>
</html>
