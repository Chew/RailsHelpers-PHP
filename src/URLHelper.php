<?php

if (!function_exists('link_to')) {
    /**
     * Creates a link to a specific page.
     *
     * @param string $body The text to display
     * @param string $url The destination href
     * @param array  $options Options for the link, passed as ["name" => "data"] to name="data"
     * @return string A completed tag
     */
    function link_to(string $body, string $url, array $options = []): string {
        return tag("a", $body, array_merge(["href" => $url], $options));
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
     * @return string A completed tag
     */
    function mail_to(string $email, string $body = null, array $options = []): string {
        return tag("a", $body ?? $email, array_merge(["href" => "mailto:$email"], $options));
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
     * @return string A completed tag
     */
    function phone_to(string $number, string $body = null, array $options = []): string {
        return tag("a", $body ?? $number, array_merge(["href" => "tel:$number"], $options));
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
     * @return string A completed tag
     */
    function sms_to(string $number, string $body = null, array $options = []): string {
        return tag("a", $body ?? $number, array_merge(["href" => "sms:$number"], $options));
    }
}

if (!function_exists('button_to')) {
    /**
     * Generates a form containing a single button that submits to the URL created by the set of options.
     *
     * @param string $name The text to display
     * @param string $href The destination URL
     * @param array  $options These are the options ot pass to the button. However, there are some exceptions:<br>
     *                        - method: If you pass "get" or "post" as the method, it will be used as the method
     *                          for the form. If you don't, the method will be "post".<br>
     *                        - disabled: If you pass true, the button will be disabled.<br>
     *                        - form: Passing things into form will modify the form's options, not the button's.<br>
     *                        - form_class: Modifies the form's class, not the button's.<br>
     *                        - params: If you pass an array of parameters, they will be added to the form as hidden.
     * @return string A completed tag
     */
    function button_to(string $name, string $href, array $options = []): string {
        $formOptions = [];
        // Take method from the $options and add it to $formOptions
        if (isset($options["method"])) {
            $formOptions["method"] = $options["method"];
            unset($options["method"]);
        } else {
            $formOptions["method"] = "post";
        }

        // Downcase the method
        $formOptions["method"] = strtolower($formOptions["method"]);

        // Ensure method is either Get or Post, otherwise throw an IllegalArgumentException
        if ($formOptions["method"] !== "get" && $formOptions["method"] !== "post") {
            throw new InvalidArgumentException("Method must be either 'get' or 'post'");
        }

        // Take any options from $options["form"] and add them to $formOptions
        if (isset($options["form"])) {
            $formOptions = array_merge($formOptions, $options["form"]);
            unset($options["form"]);
        }

        // Set the form's class option to $options["form_class"] then remove it from $options
        if (isset($options["form_class"])) {
            $formOptions["class"] = $options["form_class"];
            unset($options["form_class"]);
        }

        $fields = [];
        // iterate over each parameter and add it as a hidden input
        if (isset($options["params"])) {
            foreach ($options["params"] as $key => $value) {
                $fields[] = tag("input", null, ["type" => "hidden", "name" => $key, "value" => $value]);
            }
            unset($options["params"]);
        }

        // Set the form action to the $href
        $formOptions["action"] = $href;

        $button = tag("input", null, array_merge(["type" => "submit", "value" => $name], $options));

        return tag("form", $button . implode("", $fields), $formOptions);
    }
}
