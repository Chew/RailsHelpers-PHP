<?php

if (!function_exists('tag')) {
    /**
     * Builds a simple tag with given arguments.
     *
     * @param string      $tag The tag to create
     * @param string|null $name The data to put inside the tag if not a void element
     * @param array       $options The optional data to put in the tag, notated as ["name" => "value"] for name="value"
     * @return string A completed tag
     */
    function tag(string $tag, ?string $name, array $options = []): string {
        // These have no closing tag
        $voidElements = ["area", "base", "br", "col", "embed", "hr", "img", "input", "keygen", "link", "meta", "param",
            "source", "track", "wbr"];

        $data = [];
        foreach ($options as $name => $value) {
            array_push($data, "$name=\"$value\"");
        }
        $data = join(" ", $data);

        if (in_array($tag, $voidElements)) {
            return "<$tag $data />";
        } else {
            return "<$tag $data>$name</$tag>";
        }
    }
}
