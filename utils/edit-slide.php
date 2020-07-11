<?php
include '../dao/PresentationDao.php';
use dao\PresentationDao;

include '../dao/SlideDao.php';
use dao\SlideDao;

include '../controllers/PresentationController.php';
use controllers\PresentationController;

$presentationController = new PresentationController();
$slideDao = new SlideDao();

$slideId = $presentationController->getParamFromUrl('id');
$presentationId = $presentationController->getParamFromUrl('presentationId');


if($_POST){
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    echo $slideId;

    echo $heading;
    echo $content;
    
    $slideDao->updateSlide($slideId, $heading, $content);


    header("Location:../views/presentation-with-slides.php?id=".$presentationId."#".$slideId);
    exit();
} else {
    echo("<div class=\"container\"> <p>");
    echo("! Warning ! Възникнаха грешки при запазването на информацията <br>");
}