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
                        <div class="file-container">
                            <br>
                            <label id="file-upload-label" for="file-upload" class="custom-file-upload">
                                <input id="file-upload" type="file" name="fileToUpload" required>
                                Качи файл
                            </label>
                            <span id="file-name">Не е избран файл</span>
                        </div>
                        <br>
                        <input type="submit" value="Генерирай" class="btn">

                    </div>   
                </form>
                <!-- <div class="img-container">
                    <img src="static/images/add-presentation.jpg" alt="">
                    <div class="bottom-right">Presentations made easy.</div>
                </div> -->
            </div>
            <div class="column-right">
                <div class="code-container">
                    <h2 class="code-heading">Как да създадем презентация?</h2>                    
                    <!-- <p class="info">Поредността на слайдовете в .json файла се запазва при генерирането на презентацията.</p> -->
                    <div class="code-highlights">
                    <pre class="code">
                            <code>
                                [
        {
            "heading": "Solid",
            "type": "withText",
            "text": "blablabla"
        },
        {
            "heading": "scrum",
            "type": "withText",
            "text": "bla."
        },
        {
            "heading": "scrum",
            "type": "withCodeblock",
            "codeblock": "console.log() \n console.log()"
        },
        {
            "heading": "scrum",
            "type": "withList",                 
            "list": [
                "This is very long",
                "description",
                "Yeah, life is hard \n very hard"
                ]
            }
            ]
        </code>
    </pre>
                        <div class="code-comments">
                            <h2 class="code-heading">Легенда</h2>
                            <p class="comment">
*heading - заглавие на слайда
                            </p>
                            <p class="comment">
*type - тип на слайда,  
 под <br> формата на 
 текст, лист или код
                            </p>
                            <p class="comment">
                                *text - стринг
                            </p>
                            <p class="comment">
                                *codeblock - стринг
                            </p>
                            <p class="comment">
                                *list - масив от стрингове
                            </p>
                        </div>

                                   
</div>
                </div>    

            </div>      
    </div>
</div>

    

<script src="./static/js/create-presentation.js"></script>    
</body>

</html>