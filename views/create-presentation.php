<?php
	mb_internal_encoding("UTF-8");

	include '../dao/CategoryDao.php';
	use dao\CategoryDao;

    $categoryDao = new CategoryDao();
 
    $categories = $categoryDao->getAllCategories();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Създай презентация</title>
    <link rel="stylesheet" href="../css/create-presentation.css">
</head>

<body>
    <form action="" id="form" method="POST" class="form">
        <h1 class="heading">Създай презентация</h1>
        <input type="text" id="username" name="username" placeholder="Заглавие" required>
        <br>
        <select name="category" id="category">
            <option value="category" disabled selected  >Категория</option>
            <?php
					 foreach ($categories as $category) {
							 ?>
							 <option value="<?php echo $category->getId(); ?>"> <?= $category->getName() ?> </option>
							 <?php
					}
                ?>
        </select>
        <br>
        <input type="file" id="file-upload" name="file-upload" placeholder="Файл с презентация">
        <br>
        <input type="submit" value="Submit" class="btn">
    </form>

</body>

</html>