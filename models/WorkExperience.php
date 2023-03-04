<?php 
class WorkExperience {
    private $id;
    private $job_title;
    private $organization;
    private $job_description;
    private $end_date;
    private $occupation;

    private $location;

    public function __construct($id, $job_title, $organization, $job_description, $end_date, $occupation, $location) {
        $this->id = $id;
        $this->job_title = $job_title;
        $this->organization = $organization;
        $this->job_description = $job_description;
        $this->end_date = $end_date;
        $this->occupation = $occupation;
        $this->location = $location;

    }

   
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of job_title
     */ 
    public function getJob_title()
    {
        return $this->job_title;
    }

    /**
     * Set the value of job_title
     *
     * @return  self
     */ 
    public function setJob_title($job_title)
    {
        $this->job_title = $job_title;

        return $this;
    }

    /**
     * Get the value of organization
     */ 
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set the value of organization
     *
     * @return  self
     */ 
    public function setOrganization($organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get the value of job_description
     */ 
    public function getJob_description()
    {
        return $this->job_description;
    }

    /**
     * Set the value of job_description
     *
     * @return  self
     */ 
    public function setJob_description($job_description)
    {
        $this->job_description = $job_description;

        return $this;
    }

    /**
     * Get the value of end_date
     */ 
    public function getEnd_date()
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */ 
    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Get the value of occupation
     */ 
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set the value of occupation
     *
     * @return  self
     */ 
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }
    public static function fromJson($filePath)
    {
        $Experiences = array();
        $experiences = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/WorkExperience']);
        $index = 0;
        foreach ($experiences as $key) {
            // experience id
            $ExperienceId = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/WorkExperience/' . $index . '/Id']);
            foreach ($ExperienceId as $key => $value) {
                $id =  $value;
            }

            // jobtitle
            $ExperienceJobTitle = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/WorkExperience/' . $index . '/JobTitle']);
            foreach ($ExperienceJobTitle as $key => $value) {
                $job_title =  $value;
            }
            // organization
            $ExperienceOrganization = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/WorkExperience/' . $index . '/Organization']);
            foreach ($ExperienceOrganization as $key => $value) {
                $organization =  $value;
            }

            // job_description
            $ExperienceJobDescription = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/WorkExperience/' . $index . '/JobDescription']);
            foreach ($ExperienceJobDescription as $key => $value) {
                $job_description =  $value;
            }

            // end_date
            $ExperienceEndDate = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/WorkExperience/' . $index . '/Dates/EndDate']);
            foreach ($ExperienceEndDate as $key => $value) {
                $end_date =  $value;
            }

            
            // location
            $location =  Location::fromJson($filePath, '/Value/Data/WorkExperience/'.$index.'/Location');


            // occupation
            $occupation =  Occupation::fromJson($filePath, '/Value/Data/WorkExperience/'.$index.'/Occupation');
            array_push($Experiences, new WorkExperience($id, $job_title, $organization, $job_description, $end_date, $occupation, $location));


            $index++;
        }

        return $Experiences;
    }


    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }
}


?>