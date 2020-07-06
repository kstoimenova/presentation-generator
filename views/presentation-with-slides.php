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
    <link rel="shortcut icon" href="static/images/favicon-32x32.png">
</head>
<body>

<!-- presentation content -->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ol>
        <?php echo $presentationContent ?>
    </ol>
</div>

<!-- navbar -->
<nav>
  <ul>
    <li><a href="./index.php"><i class="fa fa-home" aria-hidden="true"></i>Начална страница</a></li>
    <li style="float:right"><a href="../utils/export.php?presentationId=<?php echo $presentationId?>" target="_blank">Свали PDF</a></li>
    <li style="float:right"><button class="openbtn" onclick="openNav()">☰ Съдържание</button></li>
  </ul>
</nav>

<!-- presentation -->
<div id="main">

    <div class="content">
    <h1 class="heading"><?php echo $presentation->getName(); ?></h1>
    <?php if (count($slides) == 0) echo 'This presentation has no slides.'; ?>
	<?php foreach ($slides as $slide) {?>
        <div><?php echo $slide->getHtmlLayout(); ?></div>
    <?php } ?>
    </div>

</div>

    <script src="./static/js/content-sidebar.js"></script>
</body>
</html>