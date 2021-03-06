<?php
namespace Test\Hal\Halstead;

use Hal\McCabe\McCabe;
use Hal\McCabe\Result;

/**
 * @group mccaybe
 * @group metric
 */
class MacCaybe extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provideCCN
     */
    public function testICanCountComplexity($filename, $expectedCCN) {

        $loc = new McCabe();
        $r = $loc->calculate($filename);
        $this->assertEquals($expectedCCN, $r->getCyclomaticComplexityNumber());
    }

    public function provideCCN() {
        return array(
            array(__DIR__.'/../../resources/mccaybe/f1.php', 2)
            ,array(__DIR__.'/../../resources/mccaybe/f2.php', 3)
            ,array(__DIR__.'/../../resources/mccaybe/f3.php', 3)
        );
    }

    public function testMcCaybeResultCanBeConvertedToArray() {

        $result = new \Hal\McCabe\Result();
        $array = $result->asArray();

        $this->assertArrayHasKey('cyclomaticComplexity', $array);
    }
}