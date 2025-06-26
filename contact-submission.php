<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $secretKey = 'YOUR_SECRET_KEY_HERE';
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify the reCAPTCHA response
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse"
    );
    $responseKeys = json_decode($response, true);

    if(intval($responseKeys["success"]) !== 1) {
        echo 'reCAPTCHA verification failed. Please try again.';
    } else {
        // Proceed with form handling (e.g., save data or send email)
        echo 'reCAPTCHA verified successfully. Form submitted!';
    }
}
?>