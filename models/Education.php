<?php
class Education
{
    private $id;
    private $organization;
    private $accrediation;
    private $grade;
    private $location;
    private $dates;

    public function __construct($id, $organization, $accrediation, $grade, $location, $dates)
    {
        $this->id = $id;
        $this->organization = $organization;
        $this->grade = $grade;
        $this->accrediation = $accrediation;
        $this->location = $location;
        $this->dates = $dates;
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
     * Get the value of accrediation
     */
    public function getAccrediation()
    {
        return $this->accrediation;
    }

    /**
     * Set the value of accrediation
     *
     * @return  self
     */
    public function setAccrediation($accrediation)
    {
        $this->accrediation = $accrediation;

        return $this;
    }

    /**
     * Get the value of grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
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

    /**
     * Get the value of dates
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Set the value of dates
     *
     * @return  self
     */
    public function setDates($dates)
    {
        $this->dates = $dates;

        return $this;
    }

    public static function fromJson($filePath)
    {
        $Educations = array();
        $educations = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Education']);
        $index = 0;
        foreach ($educations as $key) {
            // education id
            $EducationId = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Education/' . $index . '/Id']);
            foreach ($EducationId as $key => $value) {
                $id =  $value;
            }

            // organization
            $EducationOrganization = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Education/' . $index . '/Organization']);
            foreach ($EducationOrganization as $key => $value) {
                $organization =  $value;
            }
            // accrediation
            $EducationAccreditation = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Education/' . $index . '/Accreditation/Education']);
            if (!is_null($EducationAccreditation)) {

                foreach ($EducationAccreditation as $key => $value) {
                    $Accreditation =  $value;
                }
            }
            // grade
            $GradeCheck = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Education/' . $index . '/Grade']);
            foreach ($GradeCheck as $key => $value) {
                if (!is_null($value)) {
                    $Grade = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Education/' . $index . '/Grade/Raw']);
                    foreach ($Grade as $key => $value) {
                        $grade =  $value;
                    }
                } else {
                    $grade = "No Available Grade";
                }
            }

            // location
            $location =  Location::fromJson($filePath, '/Value/Data/Education/'.$index.'/Location');

            // dates
            $dates = Dates::fromJson($filePath);
            array_push($Educations, new Education($id, $organization, $Accreditation, $grade, $location, $dates));

            $index++;
        }

        return $Educations;
    }
}

?>
