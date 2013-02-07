<?php
require_once("../src/Timer.class.php");
require_once("../src/PointInTime.class.php");
class TimerTest extends PHPUnit_Framework_TestCase
{
	public function testTimer()
	{
		$t = new Timer("start");
		$this->assertEquals('start', $t->tag);//Check tag set
		$this->assertEquals(1, count($t->wayPoints) ); // Check first way point added

		$t->wayPoint("test waypoint");
		$t->wayPoint();
		$this->assertEquals(3, count($t->wayPoints) ); // Check first way point added
		$this->assertEquals("WAYPOINT 3", $t->wayPoints[2]->tag);

		$t->finished();
		$this->assertEquals(4, count($t->wayPoints) ); // Check first way point added
		$this->assertEquals("FINISHED", $t->wayPoints[3]->tag);

		$this->assertGreaterThan($t->wayPoints[0]->time, $t->wayPoints[3]->time);
		
	}
}
