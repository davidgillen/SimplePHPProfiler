<?
include("src/Timer.class.php");
include("src/PointInTime.class.php");

$t = new Timer("MyTimer");

for($i=0; $i < 10000; $i++)
{
	$x = 10 * $i;	
}
$t->wayPoint("one");

for($i=0; $i < 1700; $i++)
{
	$x = 10 * $i;	
}
$t->wayPoint("two");

for($i=0; $i < 2500000; $i++)
{
	$x = 10 * $i *$i;	
}
sleep(2);
$t->wayPoint("three");

for($i=0; $i < 1000; $i++)
{
	$x = 10 * $i;	
}
$t->finished();

echo $t->stringReport();
?>
Annnnnnnd, we're done.
