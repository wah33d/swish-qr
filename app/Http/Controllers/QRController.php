<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class QRController extends Controller
{
    public function form($company, $driver)
    {
        return view('form')->with([
            'company' => $company,
            'driver' => $driver
        ]);
    }

    public function generateQR(Request $request, $company, $driver)
    {
        $format = 'png';
        $payeeValue = $request->input('payee');
        $amountValue = $request->input('amount');
        $messageValue = $request->input('message');
        $size = 600;

        if (!$payeeValue && !$amountValue && !$messageValue) {
            abort(400, 'You must provide at least one of payee, amount, or message.');
        }

        $payload = [
            'format' => $format,
            'size' => (int)$size,
            'payee' => ['value' => (string)$payeeValue, 'editable' => false],
            'amount' => ['value' => (float)$amountValue, 'editable' => false],
            'message' => ['value' => (string)$messageValue, 'editable' => false],
        ];

        $swishApiUrl = 'https://mpc.getswish.net/qrg-swish/api/v1/prefilled';
        $verifySsl = app()->environment('production');

        $response = Http::withOptions(['verify' => $verifySsl])
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($swishApiUrl, $payload);

        // Convert raw PNG to base64
        $qrImage = base64_encode($response->body());

        // Return view with QR image
        return view('qr')->with([
            'company' => $company,
            'driver' => $driver,
            'qrImage' => $qrImage,
            'amountValue' => $amountValue
        ]);
    }
}
