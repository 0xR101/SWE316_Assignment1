<?php
class PersonalInformation
{
    private $name;
    private $phone_numbers = array();
    private $websites = array();
    private $emails = array();
    private $date_of_birth;
    private $location;
    public function __constructor($name, $phone_numbers, $websites, $emails, $date_of_birth, $location)
    {
        $this->name = $name;
        $this->phone_numbers = $phone_numbers;
        $this->websites = $websites;
        $this->emails = $emails;
        $this->date_of_birth = $date_of_birth;
        $this->location = $location;
    }

    /**
     * Get the value of phone_numbers
     */
    public function getPhone_numbers()
    {
        return $this->phone_numbers;
    }

    /**
     * Set the value of phone_numbers
     *
     * @return  self
     */
    public function setPhone_numbers($phone_numbers)
    {
        $this->phone_numbers = $phone_numbers;

        return $this;
    }

    /**
     * Get the value of websites
     */
    public function getWebsites()
    {
        return $this->websites;
    }

    /**
     * Set the value of websites
     *
     * @return  self
     */
    public function setWebsites($websites)
    {
        $this->websites = $websites;

        return $this;
    }

    /**
     * Get the value of emails
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Set the value of emails
     *
     * @return  self
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * Get the value of date_of_birth
     */
    public function getDate_of_birth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set the value of date_of_birth
     *
     * @return  self
     */
    public function setDate_of_birth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;

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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public static function fromJson($filePath)
    {

        //  $resumeName;
        $ResumeName = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Name/Raw']);
        foreach ($ResumeName as $name => $data) {
            $resumeName = $data;
        }
        $resumePhoneNumbers = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/PhoneNumbers']);
        $resumeWebsites = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Websites']);
        $ResumeEmails = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Emails/0']);
        foreach ($ResumeEmails as $name => $data) {
            $resumeEmails =  $data;
        }

        $resumeDateOfBirth = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/DateOfBirth']);
        $resumeLocation = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Location']);
        $personal_information = new PersonalInformation();
        $personal_information->setName($resumeName);
        $personal_information->setEmails($resumeEmails);
        $personal_information->setWebsites($resumeWebsites);
        $personal_information->setDate_of_birth($resumeDateOfBirth);
        $personal_information->setLocation($resumeLocation);
        return $personal_information;
    }

}

?>
