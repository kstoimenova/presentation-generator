
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/import.css">
    <title>Грешка..</title>
</head>
<body>
<?php

include '../dao/PresentationDao.php';
use dao\PresentationDao;

include '../dao/SlideTypeDao.php';
use dao\SlideTypeDao;

include '../dao/SlideDao.php';
use dao\SlideDao;

include "upload.php";
include "importHelper.php";

if($_POST){
    $heading = $_POST['heading'];
    $categoryId = $_POST['category']; 
    $valid = array();
    $errors = array();
    
    $uploadedImagePath = substr(uploadFile($valid, $errors), 1);

    if(count($errors) == 0 ){
        $presentationDao = new PresentationDao();
        $presentationId = $presentationDao->save($heading, $categoryId, $uploadedImagePath);   
    
        $slideTypeDao = new SlideTypeDao();
        $slideDao = new SlideDao();
        $fileContents = file_get_contents(__DIR__ . $uploadedImagePath);
    
        $slides = json_decode($fileContents,true);
    
        $order = 0;
    
        foreach($slides as $slide){
            $order++;
            $slideHeading = $slide["heading"];
            $slideTypeId = $slideTypeDao->getSlideTypeIdByLayout($slide["type"]);
            $slideText = getValueByKeyInSlide("text", $slide);
            $slideCodeblock = getValueByKeyInSlide("codeblock", $slide);
            $slidePhoto = getValueByKeyInSlide("photo", $slide);
            $slideList = json_encode(getValueByKeyInSlide("list", $slide));  
            
            $slideDao->save($presentationId, $slideHeading, $slideText, $slideList, $slideCodeblock, $slidePhoto, $order, $slideTypeId);
        }
    
        header("Location:../views/presentation-with-slides.php?id=".$presentationId);
        exit();
    } else {
        echo("<div class=\"container\"> <p>");
        echo("! Warning ! Възникнаха грешки при запазването на информацията <br>");
    	echo("Грешки: <br>");
    
    	foreach($errors as $err) {
    		echo($err."<br>");
		}
		
        echo("<a href=\"../views/create-presentation.php\">Опитайте отново</a>");
        echo("</p></div>");
    }
}
?> 
</body>
</html>

