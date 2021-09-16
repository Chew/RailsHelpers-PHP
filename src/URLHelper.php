<?php

if (!function_exists('link_to')) {
    /**
     * Creates a link to a specific page.
     *
     * @param string $body The text to display
     * @param string $url The destination href
     * @param array  $options Options for the link, passed as ["name" => "data"] to name="data"
     */
    function link_to(string $body, string $url, array $options = []) {
        tag("a", $body, array_merge(["href" => $url], $options));
    }
}

if (!function_exists('mail_to')) {
    /**
     * Creates a mailto link tag to the specified email_address,
     * which is also used as the name of the link unless name is specified.
     *
     * @param string      $email The destination email
     * @param string|null $body The text to display, or null to use $email
     * @param array       $options Options for the link, passed as ["name" => "data"] to name="data"
     */
    function mail_to(string $email, string $body = null, array $options = []) {
        tag("a", $body ?? $email, array_merge(["href" => "mailto:$email"], $options));
    }
}

if (!function_exists('phone_to')) {
    /**
     * Creates a TEL anchor link tag to the specified phone_number,
     * which is also used as the name of the link unless name is specified.
     *
     * @param string      $number The destination number
     * @param string|null $body The text to display, or null to use $number
     * @param array       $options Options for the link, passed as ["name" => "data"] to name="data"
     */
    function phone_to(string $number, string $body = null, array $options = []) {
        tag("a", $body ?? $number, array_merge(["href" => "tel:$number"], $options));
    }
}

if (!function_exists('sms_to')) {
    /**
     * Creates an SMS anchor link tag to the specified phone_number,
     * which is also used as the name of the link unless name is specified.
     *
     * @param string      $number The destination number
     * @param string|null $body The text to display, or null to use $number
     * @param array       $options Options for the link, passed as ["name" => "data"] to name="data"
     */
    function sms_to(string $number, string $body = null, array $options = []) {
        tag("a", $body ?? $number, array_merge(["href" => "sms:$number"], $options));
    }
}