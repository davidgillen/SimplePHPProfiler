<?php
class Timer
{
    var $tag; // To identify the Timer
    var $startTime;
    var $endTime;
    var $wayPoints;

    function Timer($tag)
    {
        $this->tag = $tag;
        $this->startTime = new PointInTime("START");
        $this->wayPoints[] = $this->startTime;
    }
    
    /**
     * 
     */
    function wayPoint($str = "")
    {
        if (strlen($str) == 0) {
            $str = "WAYPOINT " . (count($this->wayPoints) + 1);
        }
        $this->wayPoints[] = new PointInTime($str);
    }
    
    function finished()
    {
        $this->endTime = new PointInTime("FINISHED");
        $this->wayPoints[] = $this->endTime;
    }
    
    function htmlReport()
    {
        echo "<!--\n" . $this->stringReport() . "-->\n";
    }
    
    function stringReport()
    {
        $numWayPoints = count($this->wayPoints);
        for ($i = 1; $i < $numWayPoints; $i++) {
            $wp =& $this->wayPoints[$i];
            $prev =& $this->wayPoints[$i-1];
            $report .= "[ $prev->tag -> $wp->tag ] " . $wp->differenceTo($prev) . "\n";
        }
        $report .= "[Start -> End] ".$wp->differenceTo($this->wayPoints[0])."\n";
        return $report;
    }
    
    function totalTime()
    {
        $numWayPoints = count($this->wayPoints);
        $wp =& $this->wayPoints[ $numWayPoints - 1 ];
        $totalTime = $wp->differenceTo($this->wayPoints[0]);
        return $totalTime;
    }
}
