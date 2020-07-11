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

    $presentationId = $presentationController->getParamFromUrl('presentationId');
    $slideId = $presentationController->getParamFromUrl('id');
    $slide = $slideDao->getSlideById($slideId);
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/presentation-with-slides.css" />
    <link rel="stylesheet" href="../css/create-presentation.css">
    <title>Edit Slide</title>
    <link rel="shortcut icon" href="static/images/favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<!-- presentation -->
<div id="main">

    <!-- navbar -->
    <nav>
      <ul>
        <li><a class="homeBtn" href="./index.php"><span><img src="./static/images/favicon-32x32.png"></span></a></li>
        <li><a class="exportBtn" href="./presentation-with-slides.php?id=<?php echo $presentationId?>#<?php echo $slideId?>" target="_blank">Назад</a></li>
      </ul>
    </nav>

    <div class="frame edit-form">
        <!-- <div class="row"> -->
            <!-- <div class="column-left"> -->
                <form action="../utils/edit-slide.php?id=<?php echo $slideId?>&presentationId=<?php echo $presentationId?>" id="form" method="POST" enctype="multipart/form-data">
                    <h1 class="heading">Редактирай слайд</h1>
                    <input type="text" id="heading" value="<?php echo $slide->getHeading()?>" name="heading" placeholder="Заглавие" required>
                    <br>
                    <textarea id="content" name="content" placeholder="Съдържание" required><?php echo $slide->getText()?></textarea>
                    <br>
                    <input type="submit" value="Запази" class="btn">   
                </form>
                
            <!-- </div> -->
            <!-- <div class="column-right">
                <div class="img-container">
                    <img src="static/images/add-presentation.jpg" alt="">
                    <div class="bottom-right">Presentations made easy.</div>
                </div> -->

            <!-- </div> -->
        
    </div>
    </div>
</div>

</div>

    <script src="./static/js/content-sidebar.js"></script>
</body>
</html>