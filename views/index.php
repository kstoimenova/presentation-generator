<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation Generator</title>
    <link href="../css/index.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-content">
            <h1 class="heading">Генератор на презентации</h1>
            <div class="introduction">
                <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla 
                    bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla 
                </p>
            </div>
            <a href="create-presentation.php" class="upload-btn">Качи презентация</a>
        </div>
    </header>

    <div class="categories">

    <?php
        mb_internal_encoding("UTF-8");

        include '../dao/CategoryDao.php';
        use dao\CategoryDao;
    
        $categoryDao = new CategoryDao();
     
        $categories = $categoryDao->getAllCategories();
        krsort($categories);

        include '../dao/PresentationDao.php';
        use dao\PresentationDao;
    
        $presentationDao = new PresentationDao();

        foreach($categories as $category) {
            echo '<button class="category" id="category' . $category->getId() . '">'
             . $category->getName() . '</button>
            <div class="presentations">';
            $presentations = $presentationDao->getPresentationByCategoryId($category->getId());
            foreach($presentations as $presentation) {
                echo '<a href="presentation-with-slides.php?id=' . $presentation->getId()
                 . '" id="presentation' . $presentation->getId() . '">' . $presentation->getName() . '</a>';
            }
            echo '</div>';
        }
    ?>

    </div>

    <footer>
        <div class="footer-content">
        <p>© Copyright 2020</p>
        <p>Deniza Topalova, Katrin Stoimenova, Maria Vardzhieva</p>
        <p>All Rights Reserved</p>
        </div>
    </footer>
        
</body>
</html>