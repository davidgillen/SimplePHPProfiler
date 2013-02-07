<?php
require_once("../src/PointInTime.class.php");
class PointInTimeTest extends PHPUnit_Framework_TestCase
{
	public function testPointInTime()
	{
		$pit = new PointInTime("test");
		$this->assertEquals('test', $pit->tag);
		$this->assertTrue( is_numeric( $pit->time ) );
	}

	public function testdifferenceTo()
	{
		$pit1 = new PointInTime("test2", 1.11111111);
		$pit2 = new PointInTime("test2", 3.33333333);
		$this->assertEquals( 2.22222222, $pit1->differenceTo( $pit2 ) );
	}
}
