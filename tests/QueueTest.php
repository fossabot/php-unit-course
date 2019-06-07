<?php
use PHPUnit\Framework\TestCase;

// This class will be autoloaded
// require_once('./src/Queue.php');

class QueueTest extends TestCase {
  public $queue;
  
  protected function setUp() : void {
    echo 'Set Up';
    $this->queue = new Queue();
  }

  protected function tearDown() : void {
    echo 'Tear Down';
    unset($this->queue);
  }

  public static function setUpBeforeClass() : void {
    echo 'Set Up Before Class';
  }

  public static function tearDownAfterClass() : void {
    echo 'Tear Down After Class';
  }

  /**
   * @test
   **/
  public function initializeQueueEmpty() {
    $this->assertEquals(0, $this->queue->getCount());
    return $this->queue; // return Queue to dependents methods
  }

  /**
   * @test
   * @depends initializeQueueEmpty
   **/
  public function pushItem(Queue $queue) {
    $queue->push('blue');
    $this->assertEquals(1, $queue->getCount());
    $queue->pop();
    return $queue; // return Queue to dependents methods
  }

  /**
   * @test
   * @depends pushItem
   **/
  public function popItem(Queue $queue) {
    $queue->push('blue');
    $item = $queue->pop();
    $this->assertEquals(0, $queue->getCount());
    $this->assertEquals($item, 'blue');
    return $queue; // return Queue to dependents methods
  }

  /**
   * @test
   * @depends popItem
   **/
  public function countItems(Queue $queue) {
    $queue->push('green');
    $queue->pop();
    $this->assertEquals(0, $queue->getCount());
    return $queue; // return Queue to dependents methods
  }

  /**
   * @test
   * @depends popItem
   **/
  public function removeItemFromStartOfQueue(Queue $queue) {
    $queue->push('first');
    $queue->push('second');
    
    $item = $queue->pop();
    $this->assertEquals(1, $queue->getCount());
    $this->assertEquals($item, 'first');

    $item = $queue->pop();
    $this->assertEquals(0, $queue->getCount());
    $this->assertEquals($item, 'second');
    return $queue; // return Queue to dependents methods
  }

  /**
   * @test
   * @depends removeItemFromStartOfQueue
   **/
  public function addMaxAmountOfItemsToQueue(Queue $queue) {
    for ($i = 0; $i < $queue::MAX_ITEMS; $i ++) {
      $queue->push($i);
    }

    $this->assertEquals($queue::MAX_ITEMS, $queue->getCount());
    return $queue; // return Queue to dependents methods
  }

  /**
   * @test
   * @depends addMaxAmountOfItemsToQueue
   **/
  public function exceedMaxItemsToQueue(Queue $queue) {
    $this->expectException(QueueException::class);
    
    $queue->push(5);

    return $queue; // return Queue to dependents methods
  }

}
