<?php

/** @noinspection HtmlRequiredAltAttribute */

use PHPUnit\Framework\TestCase;

class TagHelperTest extends TestCase {

    public function testVoidElements() {
        $this->assertEquals("<hr />", tag("hr"));
        $this->assertEquals("<img src=\"https://i.rory.cat/OIJYZJLT.webp\" />", tag("img", null, ["src" => "https://i.rory.cat/OIJYZJLT.webp"]));
    }

    public function testTagsWithNoBodies() {
        $this->assertEquals("<table></table>", tag("table"));
        $this->assertEquals("<td></td>", tag("td"));
    }

    public function testNestedElements() {
        $this->assertEquals("<table><tr></tr></table>", tag("table", tag("tr")));
        $this->assertEquals("<table><tr><td></td></tr></table>", tag("table", tag("tr", tag("td"))));
    }

    public function testAttributes() {
        $this->assertEquals("<a href=\"https://www.google.com\">Google</a>", tag("a", "Google", ["href" => "https://www.google.com"]));
        $this->assertEquals("<a href=\"https://www.google.com\" target=\"_blank\">Google</a>", tag("a", "Google", ["href" => "https://www.google.com", "target" => "_blank"]));
        $this->assertEquals("<a href=\"https://www.google.com\" target=\"_blank\" rel=\"noopener noreferrer\">Google</a>", tag("a", "Google", ["href" => "https://www.google.com", "target" => "_blank", "rel" => "noopener noreferrer"]));
    }
}
