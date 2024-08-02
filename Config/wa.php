<?php
function sendWhatsAppMessage($phoneNo, $message) {

    $apiUrl = 'http://localhost/sendwa/apiwa.php';
    $postData = [
        'method' => 'SEND_SISWA',
        'target' => $phoneNo,
        'description' => $message
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded'
    ));
    $output = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    // if ($output === false) {
    //     echo "Error sending WhatsApp message: " . $curlError;
    // } else {
    //     echo "WhatsApp message sent successfully: " . $output;
    // }
}
?>
