
<?php
include("models/Education.php");
include("models/WorkExperience.php");
include("models/Occupation.php");
include("models/Location.php");
include("models/Dates.php");
include("models/Skills.php");
include("models/CvDetails.php");



function readFiles($folderPath) {
    $myfiles = scandir($folderPath);
    $folderResumes = array();
    foreach ($myfiles as $filePath) {
        array_push($folderResumes, readResume($filePath));
    }
    echo $myfiles;
    return $folderResumes;
}

function readAllResumes() {
    $cv1 = readResume('./data/cv1.json');
    $cv2 = readResume('./data/cv2.json');
    $cv3 = readResume('./data/cv3.json');
    $index = intval($_GET['index']);
    $list_of_cvs = array($cv1, $cv2, $cv3);
    return $list_of_cvs;
}
function readResume($filePath)
{
   

    $resumeObjective = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Objective']);
    $resumeLanguages = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Languages']);
    $resumeLanguageCodes = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/LanguageCodes']);
    $resumeSummary = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Summary']);
    $resumeTotalYearsExperience = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/TotalYearsExperience']);
    $resumeEducation = Education::fromJson($filePath);
    $resumeSkills = Skills::fromJson($filePath);
    $resumeLinkedin = JsonMachine\Items::fromFile($filePath, ['pointer' => '/Value/Data/Linkedin']);
    $resumeWorkExperience = WorkExperience::fromJson($filePath);
    $resumeCvDetails = CvDetails::fromJson($filePath);
    $personal_information = PersonalInformation::fromJson($filePath);

    // adding the technical information
    $technical_information = new TechnicalInformation(
        $resumeWorkExperience,
        $resumeEducation,
        $resumeLanguages,
        $resumeLanguageCodes,
        $resumeLinkedin,
        $resumeSkills,
        $resumeTotalYearsExperience,
    );

    $cv = new CvFile(
        $personal_information,
        $technical_information,
        $resumeSummary,
        $resumeObjective,
        $resumeCvDetails,
    );
    return $cv;
}
?>