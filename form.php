<?php
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");

$validate = true;

$subject = "Events RSVP";
$to = sanitize_email(get_option('admin_email'));

if (isset($_REQUEST) && !empty($_REQUEST)) {
    if (
        !isset($_REQUEST['name']) || empty($_REQUEST['name']) ||
        !isset($_REQUEST['email']) || empty($_REQUEST['email']) ||
        !isset($_REQUEST['id']) || empty($_REQUEST['id'])
    ) {
        $validate = false;
        echo "Missing fields. ";
    }

    //Use blade for forms
    $message = "<html>
    <head>
    <title>MTN Youth Programme</title>
    </head>
    <body>
    <table><ul>";

    $message .= '<li>';
    $message .= $_REQUEST['name'];
    $message .= '</li><li>';
    $message .= $_REQUEST['email'];
    $message .= '</li>';

    if ($validate) {
        // Headers
        $headers = array('MIME-Version: 1.0');
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Me <' . esc_html($to) . '>';

        $check_send = wp_mail($to, $subject, $message, $headers);
        if ($check_send) {
            wp_redirect(home_url('/success'));
            exit;
        } else {
            wp_die('Error: Unable to send email.', 'Email Error');
        }
    } else {
        echo "Submission failed.";
        die;
    }
}
