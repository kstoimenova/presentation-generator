<?php
	mb_internal_encoding("UTF-8");

	include '../dao/PresentationDao.php';
	use dao\PresentationDao;

    $presentationDao = new PresentationDao();
 
    $presentation = $presentationDao->getPresentationById(1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation</title>
</head>
<body>
	<?php var_dump($presentation) ?>
    
</body>
</html>