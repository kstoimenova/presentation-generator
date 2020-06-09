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
    <title>Presentation</title>
</head>
<body>
<table>
		<tr>
			<th>Заглавие</th>
			<th>Поредност</th>
			<th>Съдържание</th>
		</tr>
		<?php foreach($slides as $slide) {?>
		<tr>
			<td><?php echo $slide->getHeading(); ?></td>
			<td><?php echo $slide->getOrdering(); ?></td>
			<td><?php echo $slide->getHtmlLayout(); ?></td>
		</tr>
		<?php } ?>
</table>
    
</body>
</html>