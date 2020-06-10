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

    $presentationId = $presentationController->getPresentationIdFromUrl();
 
    $presentation = $presentationDao->getPresentationById($presentationId);
    $slides = $slideDao->getSlidesByPresentationId($presentationId);
    $presentationContent = $presentationController->constructPresentationContent($presentationId);
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
<!-- presentation content -->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ol>
        <?php echo $presentationContent ?>
    </ol>
</div>

<div id="main">
<!-- navbar -->
    <?php
    require_once "./navbar.html";
    ?>

    <h1 class="heading"><?php echo $presentation->getName(); ?></h1>

	<?php foreach ($slides as $slide) {?>
        <div><?php echo $slide->getHtmlLayout(); ?></div>
    <?php } ?>
</div>
    <script src="./static/js/content-sidebar.js"></script>
</body>
</html>