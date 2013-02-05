<?php
class PointInTime
{
    var $tag;
    var $time;
    
    function PointInTime($tag, $time = null)
    {
        $this->tag = $tag;
        if ($time == null) {
            $this->time = $this->microtime_float();
        } else {
            $this->time = $time;
        }        
    }
    
    function differenceTo($pit)
    {
        return abs($this->timeDifference($this, $pit));    
    }
    
    function timeDifference($end, $start = null)
    {
        if ($start == null) {
            $start = $this;
        }
        
        return $end->time - $start->time;
    }
    
    function microtime_float()
    {
       list($usec, $sec) = explode(" ", microtime());
       return ((float)$usec + (float)$sec);
    }
}
