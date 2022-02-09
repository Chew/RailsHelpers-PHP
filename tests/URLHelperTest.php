<?php


use PHPUnit\Framework\TestCase;

class URLHelperTest extends TestCase {

    public function testURL() {
        $this->assertEquals("<a href=\"https://rory.cat\">Rory</a>", link_to("Rory", "https://rory.cat"));
        $this->assertEquals("<a href=\"https://rory.cat\" class=\"test\">Rory</a>", link_to("Rory", "https://rory.cat", ["class" => "test"]));
        $this->assertEquals("<a href=\"https://rory.cat\" class=\"test\" target=\"_blank\">Rory</a>", link_to("Rory", "https://rory.cat", ["class" => "test", "target" => "_blank"]));
    }

    public function testBlankBodies() {
        $this->assertEquals("<a href=\"https://rory.cat\"></a>", link_to(null, "https://rory.cat"));
        $this->assertEquals("<a href=\"https://rory.cat\" class=\"test\"></a>", link_to(null, "https://rory.cat", ["class" => "test"]));
        $this->assertEquals("<a href=\"https://rory.cat\" class=\"test\" target=\"_blank\"></a>", link_to(null, "https://rory.cat", ["class" => "test", "target" => "_blank"]));
    }
}
