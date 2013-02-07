<?php
class PointInTime
{
    var $tag;
    var $time;
    
    /**
     * Constructor
     */
    function __construct($tag, $time = null)
    {
        $this->tag = $tag;
        if ($time == null) {
            $this->time = $this->microtime_float();
        } else {
            $this->time = $time;
        }        
    }

    /**
     * Get the difference between $this and another PointInTime
     *
     * @param $pit PointInTime
     *
     * @return float
     */    
    function differenceTo($pit)
    {
        return abs($this->timeDifference($this, $pit));    
    }
    
    /**
     * Get the difference between two PointInTime instances
     *
     * @param $end   PointInTime The later point
     * @param $start PointInTime Earlier poitn, defaults to $this
     *
     * @return float
     */
    function timeDifference($end, $start = null)
    {
        if ($start == null) {
            $start = $this;
        }
        
        return $end->time - $start->time;
    }
   
    /**
     * Get the time with microseconds
     *
     * @return float
     */ 
    function microtime_float()
    {
       list($usec, $sec) = explode(" ", microtime());
       return ((float)$usec + (float)$sec);
    }
}
