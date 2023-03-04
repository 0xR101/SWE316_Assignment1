<?php
class Location
{

    private $state;
    private $details;
    public function __construct($state, $details)
    {
        $this->state=$state;
        $this->details=$details;
    }
    public static function fromJson($filePath, $pointer)
    {
        $Location = JsonMachine\Items::fromFile($filePath, ['pointer' => $pointer]);
        foreach ($Location as $key => $value) {
            if(!is_null($value)) {
                $EducationLocationFormated = JsonMachine\Items::fromFile($filePath, ['pointer' => $pointer.'/Formatted']);
                foreach ($EducationLocationFormated as $key => $value) {
                    $formatted =  $value;
                }
                $EducationLocationState = JsonMachine\Items::fromFile($filePath, ['pointer' => $pointer.'/State']);
                foreach ($EducationLocationState as $key => $value) {
                    $state =  $value;
                }
            }else{
                $state = "No State Given";
                $formatted = "No Address Given";
            }
            
        }
        return new Location($state, $formatted);

    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of details
     */ 
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set the value of details
     *
     * @return  self
     */ 
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }
}

?>
