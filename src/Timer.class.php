<?php
class Timer
{
    var $tag; // To identify the Timer
    var $startTime;
    var $wayPoints;

    /**
     * Constructor
     */
    function __construct($tag)
    {
        $this->tag = $tag;
        $this->startTime = new PointInTime("START");
        $this->wayPoints[] = $this->startTime;
    }
    
    /**
     * Add a new waypoint to our profiling
     *
     * @param $str String Name for the waypoint
     */
    function wayPoint($str = "")
    {
        if (strlen($str) == 0) {
            $str = "WAYPOINT " . (count($this->wayPoints) + 1);
        }
        $this->wayPoints[] = new PointInTime($str);
    }
    
    /**
     * Finish up profiling and add a final Point.
     */
    function finished()
    {
        $this->wayPoint("FINISHED");
    }
    
    /**
     * Generate output which can be hidden in a webpage
     *
     * @return String
     */
    function htmlReport()
    {
        return "<!--\n" . $this->stringReport() . "-->\n";
    }
    
    /**
     * Generate output report
     *
     * @return String
     */
    function stringReport()
    {
        $report = "";
        $numWayPoints = count($this->wayPoints);
        for ($i = 1; $i < $numWayPoints; $i++) {
            $wp =& $this->wayPoints[$i];
            $prev =& $this->wayPoints[$i-1];
            $report .= "[ $prev->tag -> $wp->tag ] " . $wp->differenceTo($prev) . "\n";
        }
        $report .= "[Start -> End] ".$wp->differenceTo($this->wayPoints[0])."\n";
        return $report;
    }
    
    /**
     * Calculate the total time taken.
     */
    function totalTime()
    {
        $numWayPoints = count($this->wayPoints);
        $wp =& $this->wayPoints[ $numWayPoints - 1 ];
        $totalTime = $wp->differenceTo($this->wayPoints[0]);
        return $totalTime;
    }
}
