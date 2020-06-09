<?php
    mb_internal_encoding("UTF-8");

    include '../dao/PresentationDao.php';
    use dao\PresentationDao;

    include '../dao/SlideDao.php';
    use dao\SlideDao;

    include '../controllers/PresentationController.php';
    use controllers\PresentationController;

    $presentationDao = new PresentationDao();
    $slideDao = new SlideDao();
    $presentationController = new PresentationController();
 
    $presentation = $presentationDao->getPresentationById(1);
    $slides = $slideDao->getSlidesByPresentationId($presentation->getId());
    $presentationContent = $presentationController->constructPresentationContent($presentation->getId());
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/presentation-with-slides.css" />
    <title>Presentation</title>
</head>
<body>
    <h1 class="heading"><?php echo $presentation->getName(); ?></h1>
    <div class="presentation-nav">
        <ol>
        <?php foreach ($presentationContent as $title) {
			echo '<li>'. $title .'</li>';
        } ?>
        </ol>
    </div>

		<?php foreach ($slides as $slide) {?>
			<div><?php echo $slide->getHtmlLayout(); ?></div>
		<?php } ?>
    
</body>
</html>