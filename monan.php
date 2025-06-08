<?php
    include("header2.php");
    $idmonan = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "123456", "nauan");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM congthuc WHERE idmonan = $idmonan"; 
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Không có dữ liệu.";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/monan.css">

  <title>Danh sách các món ăn </title>
</head>

<body>
<?php include("header2.php");
    $idmonan=$_GET['id'];
    $conn = mysqli_connect("localhost", "root", "123456", "nauan");

 ?>
  <!--==================== MAIN ====================-->
  <main class="main">
    <!--==================== HOME ====================-->
   
    <section class="home section" id="home">
        <div class="home__container container grid">
            <img src="https://i.ytimg.com/vi/Is-etD7K-r4/maxresdefault.jpg" style="border-radius: 40px;" alt="home image" class="home__img">

            <div class="home__data">
                <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        echo '<h1 class="home__title">' . $row['tenmonan'] . '</h1>';
                        echo '<p class="home__description">Chế biến và thưởng thức với những món ăn ngon nhất khắp mọi miền trên Tổ quốc</p>';
                    } else {
                        echo '<h1 class="home__title">Món ăn không tồn tại</h1>';
                    }
                ?>

                <div class="about__data">
                    <div class="recipe-icons">
                        <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                echo '<article>';
                                echo '<i class="fas fa-clock"></i>';
                                echo '<h5>Chuẩn bị</h5>';
                                echo '<p>' . $row['chuanbi'] . ' phút.</p>';
                                echo '</article>';
                                echo '<article>';
                                echo '<i class="far fa-clock"></i>';
                                echo '<h5>Chế biến</h5>';
                                echo '<p>' . $row['chebien'] . ' phút.</p>';
                                echo '</article>';
                                echo '<article>';
                                echo '<i class="fas fa-user-friends"></i>';
                                echo '<h5>Mức độ</h5>';
                                echo '<p>' . $row['mucdo'] . '</p>';
                                echo '</article>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========= các step==========-->
    <section class="popular section" id="popular">
      <span class="section__subtitle">
        Nguyên liệu
      </span>
      <div class="popular__container container grid">
        <article class="popular__card1">
        <?php
        $sql = "SELECT * FROM congthuc WHERE idmonan = 1"; 
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) 
            while ($row = mysqli_fetch_assoc($result)) {
            $nguyenlieu = $row['nguyenlieu'];
            $nguyenlieu_formatted = nl2br($nguyenlieu);
            echo '<h3 class="popular_name" style="text-align: left;">' . $nguyenlieu_formatted . '</h3>';
            }

        ?>



        </article>

    <!-- <section class="popular section" id="popular">
      <span class="section__subtitle">
        Các bước
      </span>
      <div class="popular__container container grid">
        <article class="popular__card">
          <img src="https://cdn.tgdd.vn/2021/02/CookRecipe/GalleryStep/so-che-ca-nuc-khong-tanh.jpg" style="border-radius: 60px;width: 170px;" alt="popular image"
            class="popular__img">
          Bước 1
          <h3 class="p"opular_name style="text-align: left;">Để sơ chế cá nục không tanh, sau khi mua về bạn rửa sạch, mổ bụng bỏ đi ruột cá.
            Dùng một muỗng canh muối chà sát trong ngoài để khử mùi tanh của cá.
            Sau đó, rửa cá lại với nước sạch 2 lần, rồi để ráo.
          </h3>
        </article>

        <article class="popular__card">
          <img src="https://cdn.tgdd.vn/2021/02/CookRecipe/GalleryStep/so-che-cac-nguyen-lieu-khac-412.jpg" alt="popular image" style="border-radius: 60px;width: 170px; height: 155px;"
          
          class="popular__img">

          Bước 2
          <h3 class="popular_name" style="text-align: left;">Bỏ vỏ tỏi, hành tím rồi dùng dao cắt nhỏ lại, ớt cắt thành từng miếng.
            Tiêu xanh rửa sạch, lấy 20gr vào trong cối giã dập, 40gr còn lại để nguyên vào nồi kho.
          </h3>
        </article>

        <article class="popular__card">
          <img src="https://cdn.tgdd.vn/2021/02/CookRecipe/GalleryStep/nau-sot-tieu-xanh-3.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image"
            class="popular__img">
          Bước 3
          <h3 class="popular_name" style="text-align: left;">Bắc nồi lên bếp, cho 2 muỗng canh dầu ăn, hành tím, tỏi, ớt băm nhỏ vào trong nồi, đảo đều khoảng 2 phút.
            Tiếp theo, thêm 2 chén nước, tiêu xanh, 1/3 muỗng canh hạt nêm, 1/3 muỗng canh bột ngọt, 1/2 muỗng canh đường, 3 muỗng canh sốt cà chua, 
            2 muỗng canh nước mắm, 1 muỗng canh tương ớt, 40gr tiêu xanh hột khuấy đều hỗn hợp lại với nhau.
          </h3>
        </article>
        <article class="popular__card">
          <img src="https://cdn.tgdd.vn/2021/02/CookRecipe/GalleryStep/kho-ca-nuc-tieu-xanh.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image"
            class="popular__img">
          Bước 4
          <h3 class="popular_name" style="text-align: left;">Cho cá nục vào nồi sốt kho, đậy nắp nồi rồi kho liu riu khoảng 50 đến 60 phút lửa nhỏ rồi để ra dĩa.
          </h3>
        </article>
        <article class="popular__card">
          <img src="https://cdn.tgdd.vn/2021/02/CookRecipe/GalleryStep/thanh-pham-891.jpg" style="border-radius: 60px;width: 170px; height: 155px;" alt="popular image"
            class="popular__img">
          Bước 5
          <h3 class="popular_name" style="text-align: left;">Cá nục kho tiêu sẽ là món ăn ngon đối với mỗi gia đình chúng ta. Cá nục béo bùi, tiêu hơi cay nhẹ, mang lại cảm giác ngon miệng cho người thưởng thức.
            Bạn ăn cá nục kho tiêu cùng với cơm trắng nóng hay chấm với rau củ luộc là ngon hết xảy.
          </h3>
        </article>

      </div>
    </section>-->
    <section class="popular section" id="popular">
    <span class="section__subtitle">
        Các bước
    </span>
    <div class="popular__container container grid">

        <?php
            $sql = "SELECT buoc1, buoc2, buoc3, buoc4, buoc5, buoc6 FROM buoclam WHERE idmonan = 1"; 
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                echo '<div class="popular__container container grid">';
                $i = 1; // Khởi tạo biến i

                while ($i <= 6) {
                  if (!empty($row['buoc' . $i])) {
                    echo '<article class="popular__card">';
                    // echo '<img src="' . $row['hinh_anh'] . '" style="border-radius: 60px;width: 170px;" alt="popular image" class="popular__img">';
                    echo 'Bước ' . $i;
                    echo '<h3 class="popular_name" style="text-align: left;">' . $row['buoc' . $i] . '</h3>';
                    echo '</article>';
                  }
                    $i++; // Tăng giá trị của biến i sau mỗi bước
                }
              }
        ?>

    </div>
</section>
    
     <section class="newsletter section">
      <div class="newsletter__container container">
          <div class="newsletter__content grid">
              <img src="https://cdn.pixabay.com/photo/2014/12/21/23/57/money-576443_1280.png" alt="newsletter image" class="newsletter__img">

              <div class="newsletter__data">
                  <span class="section__subtitle"> Donate</span>
                  <h2 class="section__title">
                      Ủng hộ để giúp chúng tôi phát triển hơn nữa<br>
                      
                  </h2>

                  <form action="" class="newsletter__form">
                      <input type="email" placeholder="$$$$$$" class="newsletter__input">

                      <button class="button newsletter__button">
                          Donate <i class="ri-send-plane-line"></i>
                      </button>
                  </form>
              </div>
          </div>

          <img src="assets/img/spinach-leaf.png" alt="newsletter__img" class="newsletter__spinach">
      </div>
      
  </section> 

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

      </div>
    </footer>

    <!--========== SCROLL UP ==========-->
    <div id="progress">
      <span id="progress-value">&#x1F815;</span>
  </div>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>