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
    .popular__button {
        background-color: #ccc; /* Màu nhạt khi chưa được chọn */
        border: 2px solid #f0f0f0; /* Màu đường viền tương ứng */
        border-radius: 50%;
        padding: 8px;
        cursor: pointer;
    }

    .popular__button.active {
        background-color: red;
        border: 2px solid red;
    }
</style>

<script>
    function toggleFavorite(button) {
        button.classList.toggle("active");
    }
</script>
        </style>
    </head>
    <body>
    <?php
    include("header.php");
    ?>

        <!--==================== MAIN ====================-->
        <main class="main">
            

            <!--==================== POPULAR ====================-->
            <section class="popular section" id="popular">
                <span class="section__subtitle">
                    Thức ăn ngon nhất
                </span>
                <?php
                    $conn= mysqli_connect("localhost","root","123456","nauan");
                    $sql = "SELECT * FROM congthuc WHERE tenmonan LIKE '%$noidung%' ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $counter = 0;

                        echo '<div class="popular__container container grid">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<article class="popular__card">';
                            echo '<img src="anh/' . $row['anh'] . '" style="border-radius: 60px;width: 170px;" alt="popular image" class="popular__img">';
                            echo '<h3 class="popular name">' . $row['tenmonan'] . '</h3>';
                            echo '<span class="popular__description">' . $row['diadanh'] . '</span>';
                            
                            // Chuyển hướng đến trang monan.php với ID của món ăn được chọn
                            echo '<a class="popular__price" style="font-size: 18px;" href="monan.php?id=' . $row['idmonan'] . '">Xem hướng dẫn</a>';
                            
                            echo' <button class="popular__button" onclick="toggleFavorite(this)">';
                            echo '<i class="ri-heart-line"></i>';
                        echo '</button>';
                            echo '</article>';
                        
                            $counter++;
                            if ($counter % 4 == 0) {
                                echo '</div>';
                                echo '<div class="popular__container container grid">';
                            }
                        }
                        echo '</div>';
                    }
                        ?>
            </section>

            <!-- ==================== DRINKS ====================
                <section class="popular section" id="drinks">
                    <span class="section__subtitle">
                        Nước ép trái cây
                    </span>
    
                    <div class="popular__container container grid">
                        <article class="popular__card">
                            <img src="assets/img/tradao.jpg" style="border-radius: 60px;width: 170px;height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Trà đào</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
    
                        <article class="popular__card">
                            <img src="assets/img/traman.jpg" alt="popular image" style="border-radius: 60px;width: 170px; height: 155px;" class="popular__img">
    
                            <h3 class="popular name">Trà mận </h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
    
                        <article class="popular__card">
                            <img src="assets/img/mangcau.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Trà mãng cầu</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>

                        <article class="popular__card">
                            <img src="https://cdn.tgdd.vn/Files/2019/11/06/1215973/cach-lam-sinh-to-ca-rot-ngon-don-gian-bang-may-xay-tai-nha-201911060908001999.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Sinh tố cà rốt</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
                    </div>

                    <div class="popular__container container grid">
                        <article class="popular__card">
                            <img src="https://amthucnamchau.org/wp-content/uploads/2017/05/cach-lam-sua-chua-thom-ngon-sanh-min-tai-nha.jpg" style="border-radius: 60px;width: 170px;height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Sữa chua</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
    
                        <article class="popular__card">
                            <img src="https://inlysugiare.vn/wp-content/uploads/2020/05/ly-ca-phe-bac-xiu-da.jpg" alt="popular image" style="border-radius: 60px;width: 170px; height: 155px;" class="popular__img">
    
                            <h3 class="popular name">Bạc xỉu </h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
    
                        <article class="popular__card">
                            <img src="https://blog.dktcdn.net/files/cafe-trung-2.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Cà phê trứng</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>

                        <article class="popular__card">
                            <img src="https://www.huongnghiepaau.com/wp-content/uploads/2020/08/sua-chua-uong-trai-cay.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Yaourt bạc hà</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
                    </div>

                    <div class="popular__container container grid">
                        <article class="popular__card">
                            <img src="https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/2/19/cach-lam-nuoc-cam-ep-ngon-va-thom-ket-hop-voi-le-va-gung-5-1645248090817401855254.jpg" style="border-radius: 60px;width: 170px;height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Nước ép cam</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
    
                        <article class="popular__card">
                            <img src="https://cdn.tgdd.vn/Files/2019/07/14/1179531/nuoc-ep-tao-co-tac-dung-gi-ma-ai-cung-thi-nhau-uong-201907142251530613.jpg" alt="popular image" style="border-radius: 60px;width: 170px; height: 155px;" class="popular__img">
    
                            <h3 class="popular name">Nước ép táo</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
    
                        <article class="popular__card">
                            <img src="https://barona.vn/storage/meo-vat/183/cach-lam-sinh-to-bo.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Sinh tố bơ</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>

                        <article class="popular__card">
                            <img src="https://trivietphat.net/wp-content/uploads/2023/03/cach-lam-tra-dau-kinh-doanh.webp" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image" class="popular__img">
    
                            <h3 class="popular name">Trà dâu</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem hướng dẫn</a> 
                                    <button class="popular__button">
                                        <i class="ri-heart-2-fill"></i>
                                    </button>
                        </article>
                    </div>
                </section>

                <img src="assets/img/leaf-branch-2.png" alt="recently image" class="recently__leaf-1">
                <img src="assets/img/leaf-branch-3.png" alt="recently image" class="recently__leaf-2"> -->

            <!-- ==================== Mẹo&Kỹ thuật nấu ăn ==================== -->
            <!-- <section class="popular section" id="tips">
                <span class="section__subtitle">
                    Mẹo & Kỹ thuật nấu ăn
                </span>
                <h2 class="section__title">
                    
                </h2>

                <div class="popular__container container grid">
                    <article class="popular__card">
                        <img src="https://www.simplyrecipes.com/thmb/SoPVYyBOiIQu9YmyZT43m5ojpgs=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Simply-Recipes-Raw-Ground-Beef-That-Is-Brown-LEAD-ec4034a00987422aa04db441e39bbd62.jpg" style="border-radius: 60px;width: 170px;height: 140px;" alt="popular image" class="popular__img">

                        <h3 class="popular name" style="font-size: 14px;">Thịt bò xay sống chuyển sang màu nâu có còn an toàn để sử dụng không?</h3><br>
                        <a class="popular__price" style="font-size: 18px; "href="">Xem chi tiết</a> 
                        <button class="popular__button">
                                    <i class="ri-information-fill"></i>
                                </button>
                    </article>

                    <article class="popular__card">
                        <img src="https://www.simplyrecipes.com/thmb/86JOVDYGvTtqdLJjKgz84qDGm1o=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2014__11__perfect-mashed-potatoes-horiz-a-1600-bd77df421c114f94a53e8cfbf69d5873.jpg" alt="popular image" style="border-radius: 60px;width: 170px; height: 140px;" class="popular__img">

                        <h3 class="popular name" style="font-size: 14px;">Cách làm dày khoai tây nghiền: 3 cách hoàn hảo &#160;&#160;&#160;&#160;&#160;&#160;&#160;</h3><br>
                        <a class="popular__price" style="font-size: 18px; "href="">Xem chi tiết</a> 
                        <button class="popular__button">
                                    <i class="ri-information-fill"></i>
                                </button>
                    </article>

                    <article class="popular__card">
                        <img src="https://www.simplyrecipes.com/thmb/wl7tsry_YoT7gqT0dABnVAJSyiM=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Simply-Recipes-Baking-Powder-LEAD-13bb3ceecb8146ae99fd5d351b1f9330.jpg" style="border-radius: 60px;width: 170px; height: 140px;" alt="popular image" class="popular__img">

                        <h3 class="popular name" style="font-size: 14px;">Sự khác biệt giữa bột nở tác dụng kép và tác dụng đơn là gì? &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</h3>
                        <a class="popular__price" style="font-size: 18px; "href="">Xem chi tiết</a> 
                        <button class="popular__button">
                                    <i class="ri-information-fill"></i>
                                </button>
                    </article>

                    <article class="popular__card">
                        <img src="https://www.simplyrecipes.com/thmb/TTn84sTsboNJZb3DxjQw_QcOG-Q=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Simply-Recipes-Parchment-Circles-GIF-119-50d7c2c3881443cea177f716bc44d38a.jpg" style="border-radius: 60px;width: 170px; height: 140px;" alt="popular image" class="popular__img">

                        <h3 class="popular name" style="font-size: 14px;">10 loại thực phẩm bạn không bao giờ nên cho vào nồi chiên không khí<br><br> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</h3>
                        <a class="popular__price" style="font-size: 18px; "href="">Xem chi tiết</a> 
                        <button class="popular__button">
                                    <i class="ri-information-fill"></i>
                                </button>
                    </article>

                    <article class="popular__card">
                        <img src="https://www.simplyrecipes.com/thmb/azygPQFhTtDITFS2vSHIr85NAH8=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Simply-Recipes-Scratched-Skillet-LEAD-01-b4ce97b15a994f2eacbb729aa4d99bc7.jpg" style="border-radius: 60px;width: 170px; height: 140px;" alt="popular image" class="popular__img">

                        <h3 class="popular name" style="font-size: 14px;">Sử dụng chảo chống dính bị trầy xước có an toàn không? Đây là những gì các chuyên gia nói. &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</h3>
                        <a class="popular__price" style="font-size: 18px; "href="">Xem chi tiết</a> 
                        <button class="popular__button">
                                    <i class="ri-information-fill"></i>
                                </button>
                    </article>

                    <article class="popular__card">
                        <img src="https://www.simplyrecipes.com/thmb/7VjmqGpdu1qr4DEpBvLuguLPGIc=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/SRE_Edit_CleanKitchenWithLemon_Final-0493e491ba9040009eacd5f779c53953.jpg" style="border-radius: 60px;width: 170px; height: 140px;" alt="popular image" class="popular__img">

                        <h3 class="popular name" style="font-size: 14px;">7 thứ trong nhà bếp bạn nên làm sạch bằng chanh. <br><br><br> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</h3>
                            <a class="popular__price" style="font-size: 18px; "href="">Xem chi tiết</a> 
                                <button class="popular__button">
                                    <i class="ri-information-fill"></i>
                                </button>
                    </article>
                </div>
            </section> -->

            <!--==================== NEWSLETTER ====================-->
            
            <section class="newsletter section">
                <div class="newsletter__container container">
                    <div class="newsletter__content grid">
                        <img src="assets/img/newsletter-sushi.png" alt="newsletter image" class="newsletter__img">

                        <div class="newsletter__data">
                            <span class="section__subtitle"> Newsletter</span>
                            <h2 class="section__title">
                                Subscribe For <br>
                                Offer Updates
                            </h2>

                            <form action="" class="newsletter__form">
                                <input type="email" placeholder="Enter email" class="newsletter__input">

                                <button class="button newsletter__button">
                                    Subscribe <i class="ri-send-plane-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <img src="assets/img/spinach-leaf.png" alt="newsletter__img" class="newsletter__spinach">
                </div>
                
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__container container grid">
                <div>
                    <a href="#" class="footer__logo">
                        <img src="assets/img/favicon.ico" alt="logo image">
                        Simply Recipes
                    </a>

                    <p class="footer__description">
                        Thức ăn cho cơ thể là<br>
                        không đủ. Phải có thức <br>
                        ăn cho tâm hồn.
                    </p>
                </div>

                <div class="footer__content">
                    <div>
                        <h3 class="footer__title">Main Menu</h3>
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Menus</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Offer</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Events</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Information</h3>
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Contact</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Order & Returns</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Videos</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Reservation</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Address</h3>
                        <ul class="footer__links">
                            <li class="footer__information">
                                Av. Hacienda 1234 <br>
                                Kiambu rd.&nbsp; Kenya.
                            </li>
                            <li class="footer__information">
                                9AM - 11PM
                            </li>
                           
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Social Media</h3>
                        <ul class="footer__social">
                           <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class="ri-facebook-box-fill"></i>
                           </a> 

                           <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class="ri-instagram-fill"></i>
                           </a> 

                           <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class="ri-twitter-fill"></i>
                           </a> 

                        </ul>
                    </div>
                </div>

                <img src="assets/img/spring-onion.png" alt="footer image" class="footer__onion">
                <img src="assets/img/spring-onion.png" alt="footer image" class="footer__onion-1">
                <img src="assets/img/spinach-leaf.png" alt="footer image" class="footer__spinach">
                <img src="assets/img/spinach-leaf.png" alt="footer image" class="footer__spinach-1">
                <img src="assets/img/leaf-branch-4.png" alt="footer image" class="footer__leaf">

            </div>

            <div class="footer__info container">
                <div class="footer__card">
                    <img src="assets/img/footer-card-1.png" alt="footer image">
                    <img src="assets/img/footer-card-2.png" alt="footer image">
                    <img src="assets/img/footer-card-3.png" alt="footer image">
                    <img src="assets/img/footer-card-4.png" alt="footer image">
                </div>

                <span class="footer__copy">
                    &#169; Copyright Kooya3. All rights reserved
                </span>
            </div>
        </footer>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
           <i class="ri-arrow-up-line"></i>
        </a>

        <!--=============== SCROLLREVEAL ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>