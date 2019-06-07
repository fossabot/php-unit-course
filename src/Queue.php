<?php
// A first-in, first-out Data Structure
class Queue {
  public const MAX_ITEMS = 5;
  protected $items = [];

  public function push($item) : void {
    if ($this->getCount() == static::MAX_ITEMS) {
      throw new QueueException("Queue full");
    }
    array_push($this->items, $item);
  }

  public function pop() {
    // return array_pop($this->items); // remove item from end of array
    return array_shift($this->items); // remove item from begin of array
  }

  public function getCount() : int {
    return count($this->items);
  }

  public function clear() : void {
    $this->items = [];
  }
}