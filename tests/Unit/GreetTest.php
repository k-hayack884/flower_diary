<?php

use PHPUnit\Framework\TestCase;
use App\Greet;
class GreetTest extends TestCase
{
    /**
     * @test
     */
    public function testMultiple()
    {
        // require_once "flower_diary/vendor/autoload.php";
        // require_once('../../app/Greet.php');
        $greet = new Greet();
        $expected = "hello";
        $this->assertEquals($expected, $greet->sayHello());
    }
}