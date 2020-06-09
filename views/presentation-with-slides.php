<?php
    mb_internal_encoding("UTF-8");

    include '../dao/PresentationDao.php';
    use dao\PresentationDao;

    include '../dao/SlideDao.php';
    use dao\SlideDao;

    $presentationDao = new PresentationDao();
    $slideDao = new SlideDao();
 
    $presentation = $presentationDao->getPresentationById(1);
    $slides = $slideDao->getSlidesByPresentationId(1);
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
    <h1><?php echo $presentation->getName(); ?></h1>

		<?php foreach ($slides as $slide) {?>
			<div><?php echo $slide->getHtmlLayout(); ?></div>
		<?php } ?>
</table>
    
</body>
</html>