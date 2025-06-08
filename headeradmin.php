<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles1.css">
    
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

        /* Centering Admin text */
        .nav__admin {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #333;
            font-size: 30px;
            font-weight: bold;
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

            <!-- Centered Admin text -->
            <div class="nav__admin">Admin</div>
        
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
