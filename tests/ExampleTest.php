<?php
use PHPUnit\Framework\TestCase;

// This class will be autoloaded
// require_once('./src/Example.php');

class ExampleTest extends TestCase {
  const ARR = [1, 2, 3, 4];

  /**
   * @test
   **/
  public function arraySize() {
    $this->assertCount(4, SELF::ARR);
  }

  /**
   * @test
   **/
  public function addFunction() {
    $sum = Example::sum(4.5, 4);
    $this->assertEquals(8.5, $sum);
    $this->assertNotEquals(10.5, $sum);
  }

  /**
   * @test
   **/
  public function subFunction() {
    $sub = Example::sub(4.5, 4);
    $this->assertEquals(0.5, $sub);
    $this->assertNotEquals(12.5, $sub);
  }

  /**
   * @test
   **/
  public function emptyArray() {
    $stack = [];
    $this->assertEmpty($stack);
  }
}
