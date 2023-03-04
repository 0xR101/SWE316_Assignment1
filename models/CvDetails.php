<?php
class CvDetails
{
    private $certifications = array();
    private $publications = array();
    private $sections = array();

    public function __construct($certifications, $publications, $sections)
    {
        $this->certifications = $certifications;
        $this->publications = $publications;
        $this->sections = $sections;
    }

    public static function fromJson($filePath)
    {

        // certifications
        $certifications = array();
        $Certifications = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Certifications']);
        foreach ($Certifications as $key => $value) {
            array_push($certifications, $value);
        }
        // publications
        $publications = array();
        $Publications = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Publications']);
        foreach ($Publications as $key => $value) {
            array_push($certifications, $value);
        }
        // sections
        $sections = array();
        $Sections = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Sections']);
        foreach ($Sections as $key => $value) {
            array_push($sections, $key);
        }


        return new CvDetails(certifications: $certifications, publications: $publications, sections: $sections);
    }

    /**
     * Get the value of certifications
     */
    public function getCertifications()
    {
        return $this->certifications;
    }

    /**
     * Set the value of certifications
     *
     * @return  self
     */
    public function setCertifications($certifications)
    {
        $this->certifications = $certifications;

        return $this;
    }

    /**
     * Get the value of publications
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * Set the value of publications
     *
     * @return  self
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;

        return $this;
    }

    /**
     * Get the value of sections
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Set the value of sections
     *
     * @return  self
     */
    public function setSections($sections)
    {
        $this->sections = $sections;

        return $this;
    }
}

?>
