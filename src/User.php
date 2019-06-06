<?php
class User {
  public $firstName;
  public $lastName;

  public function __construct(string $firstName = '', string $lastName = '') {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function getFullName() : string {
    $fullName = !empty($this->firstName) && !empty($this->firstName) ?
      "{$this->firstName} {$this->lastName}" : '';
    return trim($fullName);
  }
}
