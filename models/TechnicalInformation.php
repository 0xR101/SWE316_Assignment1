<?php
class TechnicalInformation
{
    private $work_experiences = array();
    private $educations = array();
    private $languages = array();
    private $languageCodes = array();
    private $linkedin;
    private $skills = array();

    private $total_years_experience;

    function __construct($work_experiences, $educations, $languages, $languageCodes, $linkedin, $skills, $total_years_experience)
    {
        $this->work_experiences=$work_experiences;
        $this->educations=$educations;
        $this->languages=$languages;
        $this->languageCodes=$languageCodes;
        $this->linkedin=$linkedin;
        $this->skills = $skills;
        $this->total_years_experience = $total_years_experience;
    }

    /**
     * Get the value of work_experiences
     */ 
    public function getWork_experiences()
    {
        return $this->work_experiences;
    }

    /**
     * Set the value of work_experiences
     *
     * @return  self
     */ 
    public function setWork_experiences($work_experiences)
    {
        $this->work_experiences = $work_experiences;

        return $this;
    }

   

    /**
     * Get the value of languages
     */ 
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set the value of languages
     *
     * @return  self
     */ 
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get the value of languageCodes
     */ 
    public function getLanguageCodes()
    {
        return $this->languageCodes;
    }

    /**
     * Set the value of languageCodes
     *
     * @return  self
     */ 
    public function setLanguageCodes($languageCodes)
    {
        $this->languageCodes = $languageCodes;

        return $this;
    }

    /**
     * Get the value of linkedin
     */ 
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set the value of linkedin
     *
     * @return  self
     */ 
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get the value of educations
     */ 
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * Set the value of educations
     *
     * @return  self
     */ 
    public function setEducations($educations)
    {
        $this->educations = $educations;

        return $this;
    }

    /**
     * Get the value of skills
     */ 
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set the value of skills
     *
     * @return  self
     */ 
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get the value of total_years_experience
     */ 
    public function getTotal_years_experience()
    {
        return $this->total_years_experience;
    }

    /**
     * Set the value of total_years_experience
     *
     * @return  self
     */ 
    public function setTotal_years_experience($total_years_experience)
    {
        $this->total_years_experience = $total_years_experience;

        return $this;
    }
}
?>