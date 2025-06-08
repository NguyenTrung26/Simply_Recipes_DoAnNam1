<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles1.css">
    <link rel="stylesheet" href="assets/css/monan.css">


    <title>Simply Recipes</title>
    <style>
        .nav__search {
    position: relative;
}

.nav__search-input {
    width: 300px;
    border: none;
    border-radius: 4px;
    padding: 10px;
    font-size: 16px;
    color: #666;
}

.nav__search-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 20px;
    color: #666;
}
    </style>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="" class="nav__logo">
                <img src="assets/img/favicon.ico" alt="logo image">
                Simply Recipes
            </a>
            <div class="nav__search">
                <input type="search" placeholder="Search recipes..." class="nav__search-input">
            <i class="ri-search-line nav__search-icon"></i>
        </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.html" class="nav__link active-link">Home</a>
                    </li>

                    <li class="nav__item">
                        <a href="#popular" class="nav__link">Food</a>
                    </li>

                    <li class="nav__item">
                        <a href="#drinks" class="nav__link">Drinks</a>
                    </li> 
                    
                    <li class="nav__item">
                        <a href="#tips" class="nav__link">Tips</a>
                    </li>
                </ul>

                <!-- Close Button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>

                <img src="assets/img/leaf-branch-4.png" alt="nav image" class="nav__img-1">
                <img src="assets/img/leaf-branch-3.png" alt="nav image" class="nav__img-2">

            </div>

            <div class="nav__buttons">
                <!-- Theme Change Button -->
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-apps-2-line"></i>
                </div>
            </div>
        </nav>
        
        <!-- Horizontal Rule -->
        <hr class="header-line">

    </header>
</body>
</html>
