<?php
// session_start();

include('models/CvFile.php');
include('models/PersonalInformation.php');
include('models/TechnicalInformation.php');
include('filesReading.php');
// $list_of_cvs = $_SESSION['list_of_cvs'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>XYZ Company</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    // importing json library
    spl_autoload_register(require 'vendor\halaxa\json-machine\src\autoloader.php');

    // making the resumes
    // $cv1 = readResume('./data/cv1.json');
    // $cv2 = readResume('./data/cv2.json');
    // $cv3 = readResume('./data/cv3.json');
    // $index = intval($_GET['index']);
    $list_of_cvs = readAllResumes();


    ?>
    <div class="page">


        <div class="main-div">
            <!-- Adding the list view -->
            <div class="resume-select">
                <label>Resumes</label>
                <div class="list-group">
                    <?php for ($i = 0; $i < sizeof($list_of_cvs); $i++) {  ?>
                    <a href="/work/SWE316/page2.php?index=<?php echo $i; ?>"
                        class="list-group-item list-group-item-action"><?php echo $list_of_cvs[$i]->getPersonal_information()->getName() ?><a>

                            <?php } ?>
                </div>
            </div>

            <!-- Adding the form control -->
            <div class="resume-output">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"
                            disabled><?php echo $list_of_cvs[$index]->getPersonal_information()->getName(); ?></textarea>
                        <label for="exampleFormControlInput1">Email address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"
                            disabled><?php echo $list_of_cvs[$index]->getPersonal_information()->getEmails(); ?></textarea>
                        <label for="exampleFormControlInput1">Education</label>
                        <textarea style="align-content:center; overflow:auto;" class="form-control"
                            id="exampleFormControlTextarea1" rows="10" disabled>
                        <?php $educations = $list_of_cvs[$index]->getTechnical_information()->getEducations();?>
                        <?php for ($i=0; $i < sizeof($educations); $i++) { ?>
                            <?php echo $educations[$i]->getId(); ?> &#13;
                            <?php echo $educations[$i]->getOrganization(); ?>&#13;
                            <?php echo $educations[$i]->getLocation()->getState(); ?>&#13;
                            <?php echo $educations[$i]->getLocation()->getDetails(); ?>&#13;
                            <?php echo $educations[$i]->getAccrediation(); ?>     
                            <?php echo $educations[$i]->getGrade(); ?> &#13;
                       <?php }?>
                        </textarea>
                        <!-- WorkExperience -->
                        <label for="exampleFormControlInput1">Work Experience</label>
                        <textarea style="align-content:center; overflow:auto;" class="form-control"
                            id="exampleFormControlTextarea1" rows="10" disabled>
                        <?php $experiences = $list_of_cvs[$index]->getTechnical_information()->getWork_experiences();?>
                        <?php for ($i=0; $i < sizeof($experiences); $i++) { ?>
                            <?php echo $experiences[$i]->getId(); ?> &#13;
                            <?php echo $experiences[$i]->getJob_title(); ?>&#13;
                            <?php echo $experiences[$i]->getJob_description(); ?>&#13;
                            <?php echo $experiences[$i]->getEnd_date(); ?>&#13;
                       <?php }?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <!-- Certificates -->
                        <label for="exampleFormControlInput1">Certificates</label>
                        <textarea style="align-content:center; overflow:auto;" class="form-control"
                            id="exampleFormControlTextarea1" rows="10" disabled>
                        <?php $certificates = $list_of_cvs[$index]->getCvDetails()->getCertifications();?>
                        <?php for ($i=0; $i < sizeof($experiences); $i++) { ?>
                            <?php echo $certificates[$i]; ?> &#13;
                       <?php }?>
                        </textarea>
                        <!-- Skills -->
                        <label for="exampleFormControlInput1">Skills</label>
                        <textarea style="align-content:center; overflow:auto;" class="form-control"
                            id="exampleFormControlTextarea1" rows="10" disabled>
                        <?php $skills = $list_of_cvs[$index]->getTechnical_information()->getSkills();?>
                        <?php for ($i=0; $i < sizeof($skills); $i++) { ?>
                            <?php echo $skills[$i]->getId(); ?> &#13;
                            <?php echo $skills[$i]->getName(); ?>&#13;
                            <?php echo $skills[$i]->getType(); ?>&#13;
                       <?php }?>
                        </textarea>
                    </div>
                </form>
            </div>


        </div>
    </div>
</body>

</html>