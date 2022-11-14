<?php
class ExampleAssertionTest extends \PHPUnit\Framework\TestCase{
    public function testThatStringsMatch(){
        $string1 = "test";;
        $string2 = "test";
        $this->assertSame($string1,$string2);
    }
}
?>