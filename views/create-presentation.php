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
<div class="frame">
        <div class="row">
            <div class="column-left">
                <form action="../utils/import.php" id="form" method="POST" enctype="multipart/form-data">
                    <h1 class="heading">Създай презентация</h1>
                    <input type="text" id="heading" name="heading" placeholder="Заглавие" required>
                    <br>
                    <select name="category" id="category" required>
                        <option value="" disabled selected hidden>Категория</option>
                        <?php
                                foreach ($categories as $category) {
                                        ?>
                                        <option value="<?php echo $category->getId(); ?>"> <?= $category->getName() ?> </option>
                                        <?php
                                }
                            ?>
                    </select>
                    <div class="row">
                        <div class="column-left">
                            <br>
                            <input type="file" id="file" name="fileToUpload" placeholder="Файл с презентация" required>
                        </div>
                        <div class="column-right">
                        <br>
                        <input type="submit" value="Генерирай" class="btn">

                        </div>

                    </div>   
                </form>
                
            </div>
            <div class="column-right">
                <div class="img-container">
                    <img src="static/images/add-presentation.jpg" alt="">
                    <div class="bottom-right">Presentations made easy.</div>
                </div>

            </div>
        
    </div>
    </div>

    

    
</body>

</html>