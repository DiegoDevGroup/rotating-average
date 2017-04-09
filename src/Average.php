<?php namespace DiegoDevGroup\RotatingAverage;

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author John Congdon
*/
class Average extends \DiegoDevGroup\RotatingBase\Base
{
    protected $values = [];

    public function addValue($value)
    {
        array_push($this->values, $value);
        if (count($this->values) > $this->count) {
            array_shift($this->values);
        }
    }

    public function assertAverageAbove($average)
    {
        if (count($this->values) < $this->count) {
            return null;
        }

        if ($this->getAverage() < $average)
        {
            throw new \Exception("Not above $average");
        }

        return true;
    }

    public function getAverage()
    {
        $total = array_sum($this->values);
        return $total / count($this->values);
    }
}