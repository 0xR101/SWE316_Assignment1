<?php

class CvFile
{
    private $personal_information;

    private $technical_information;
    private $summary;
    private $objective;
    private $CvDetails;


    function __construct($personal_information, $technical_information, $summary, $objective, $CvDetails)
    {
        $this->personal_information = $personal_information;
        $this->technical_information = $technical_information;
        $this->summary = $summary;
        $this->objective = $objective;
        $this->CvDetails = $CvDetails;
    }

    /**
     * Get the value of technical_information
     */
    public function getTechnical_information()
    {
        return $this->technical_information;
    }

    /**
     * Set the value of technical_information
     *
     * @return  self
     */
    public function setTechnical_information($technical_information)
    {
        $this->technical_information = $technical_information;

        return $this;
    }

    /**
     * Get the value of summary
     */
    public function getSummary()
    {
        foreach ($this->summary as $name => $data) {
            return $data;
        }
    }

    /**
     * Set the value of summary
     *
     * @return  self
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get the value of objective
     */
    public function getObjective()
    {
        return $this->objective;
    }

    /**
     * Set the value of objective
     *
     * @return  self
     */
    public function setObjective($objective)
    {
        $this->objective = $objective;

        return $this;
    }

    /**
     * Get the value of personal_information
     */
    public function getPersonal_information()
    {
        return $this->personal_information;
    }

    /**
     * Set the value of personal_information
     *
     * @return  self
     */
    public function setPersonal_information($personal_information)
    {
        $this->personal_information = $personal_information;

        return $this;
    }

   

    /**
     * Get the value of CvDetails
     */ 
    public function getCvDetails()
    {
        return $this->CvDetails;
    }

    /**
     * Set the value of CvDetails
     *
     * @return  self
     */ 
    public function setCvDetails($CvDetails)
    {
        $this->CvDetails = $CvDetails;

        return $this;
    }
}
