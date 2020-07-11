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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<!-- presentation content -->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ol>
        <?php echo $presentationContent ?>
    </ol>
</div>

<!-- presentation -->
<div id="main">

    <!-- navbar -->
    <nav>
      <ul>
        <li><a class="homeBtn" href="./index.php"><span><img src="./static/images/favicon-32x32.png"></span></a></li>
        <li><button class="openBtn" onclick="openNav()">☰ Съдържание</button></li>
        <li><a class="exportBtn" href="../utils/export.php?presentationId=<?php echo $presentationId?>" target="_blank">Свали в PDF формат</a></li>
        <li class="tooltip"><a id="fullscreenBtn"><img src="./static/images/toggle-full-screen.png"></a><span class="tooltiptext">Toggle full screen</span></li>
      </ul>
    </nav>

    <!-- content -->
    <div class="content">
    <h1 class="heading"><?php echo $presentation->getName(); ?></h1>
    <?php if (count($slides) == 0) echo 'This presentation has no slides.'; ?>
	<?php foreach ($slides as $slide) {?>
        <div><?php echo $slide->getHtmlLayout(); ?></div>
    <?php } ?>
    </div>

</div>

    <script src="./static/js/content-sidebar.js"></script>
    <script src="./static/js/toggle-fullscreen.js"></script>
</body>
</html>