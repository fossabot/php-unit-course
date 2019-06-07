<?php
use PHPUnit\Framework\TestCase;

// This class will be autoloaded
// require_once('./src/User.php');

class UserTest extends TestCase {
  /**
   * @test
   **/
  public function getFullName() {
    $user = new User('Julio', 'Cesar');
    $this->assertEquals('Julio Cesar', $user->getFullName());
  }

  /**
   * @test
   **/
  public function getFullNameDefaultEmpty() {
    $user = new User();
    $this->assertEquals('', $user->getFullName());
  }
}
