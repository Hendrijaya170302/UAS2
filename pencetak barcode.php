<?php
require 'vendor/autoload.php'; // Assuming you installed from Composer

use AES256OCB\AES256OCB;
use SHA1\SHA1;

function generate_barcode($nomorPengiriman, $tanggalKirim, $kodeCabang) {
    // Combine the inputs into one string
    $combined = $nomorPengiriman . $tanggalKirim . $kodeCabang;

    // Encrypt the string with AES 256 OCB
    $aes = new AES256OCB('your-secret-key');
    $encrypted = $aes->encrypt($combined);

    // Hash the encrypted string with SHA1
    $hash = SHA1::hash($encrypted);

    // Encode the hash in base64
    $barcode = base64_encode($hash);

    return $barcode;
}

echo generate_barcode('1234567890', '2024-01-20', 'XYZ');
?>