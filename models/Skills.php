<?php 
class Skills {

    private $id;
    private $EmsId;
    private $Name;
    private $type;

    public function __construct($id, $EmsId, $Name, $type) {
        $this->id = $id;
        $this->EmsId = $EmsId;
        $this->Name = $Name;
        $this->type = $type;
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
     * Get the value of EmsId
     */ 
    public function getEmsId()
    {
        return $this->EmsId;
    }

    /**
     * Set the value of EmsId
     *
     * @return  self
     */ 
    public function setEmsId($EmsId)
    {
        $this->EmsId = $EmsId;

        return $this;
    }

    /**
     * Get the value of Name
     */ 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    

    public static function fromJson($filePath)
    {
        $Skills = array();
        $skills = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Skills']);
        $index = 0;
        foreach ($skills as $key) {
            // skills id
            $SkillsId = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Skills/' . $index . '/Id']);
            foreach ($SkillsId as $key => $value) {
                $id =  $value;
            }

            // emsid
            $SkillsEmsId = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Skills/' . $index . '/EmsiId']);
            foreach ($SkillsEmsId as $key => $value) {
                $emsid =  $value;
            }
            // name
            $SkillsName = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Skills/' . $index . '/Name']);
            foreach ($SkillsName as $key => $value) {
                $name =  $value;
            }

            // type
            $SkillsType = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Skills/' . $index . '/Type']);
            foreach ($SkillsType as $key => $value) {
                $type =  $value;
            }

           
            array_push($Skills, new Skills($id, $emsid, $name, $type));

            $index++;
        }

        return $Skills;
    }
}


?>