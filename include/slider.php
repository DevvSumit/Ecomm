<?php
include("database.php");
$query = "SELECT * FROM addslider";
$queryResult = mysqli_query($conn, $query);
?>

<section class="slider">
  <div class="slider-elements">

    <?php
    $slideNumber = 1;
    while ($row = mysqli_fetch_assoc($queryResult)) {
      $image = $row['image'];
    ?>
      <div class="slider-item fade">
        <img src="admin/upload/<?php echo $image; ?>" class="img-fluid" alt="Slide <?php echo $slideNumber; ?>">
        <div class="container">
          <p class="slider-title"><?php echo $row['slider_tittle']; ?></p>
          <h2 class="slider-heading"><?php echo $row['slider_heading']; ?></h2>
          <a href="../shop.php" class="btn btn-lg btn-primary">Explore Now</a>
        </div>
      </div>
    <?php
      $slideNumber++;
    }
    ?>

    <!-- Slider buttons -->
    <div class="slider-buttons">
      <button onclick="plusSlide(-1)"><i class="bi bi-chevron-left"></i></button>
      <button onclick="plusSlide(1)"><i class="bi bi-chevron-right"></i></button>
    </div>

    <!-- Slider dots -->
    <div class="slider-dots">
      <?php for ($i = 1; $i < $slideNumber; $i++) { ?>
        <button class="slider-dot <?php echo $i == 1 ? 'active' : ''; ?>" onclick="currentSlide(<?php echo $i; ?>)">
          <span></span>
        </button>
      <?php } ?>
    </div>

  </div>
</section>

<style>
  .slider {
    position: relative;
    max-width: 100%;
    overflow: hidden;
  }

  .slider-item {
    display: none;
    position: relative;
  }

  .slider-item img {
    width: 100%;
    height: auto;
    display: block;
  }

  .slider-item .container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
  }

  .slider-buttons {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
  }

  .slider-buttons button {
    background: rgba(0, 0, 0, 0.6);
    border: none;
    color: #fff;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 50%;
  }

  .slider-dots {
    text-align: center;
    margin-top: 10px;
  }

  .slider-dot {
    border: none;
    background: #ddd;
    border-radius: 50%;
    width: 12px;
    height: 12px;
    margin: 5px;
    cursor: pointer;
  }

  .slider-dot.active {
    background: #333;
  }
</style>

<script>
  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlide(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slider-item");
    let dots = document.getElementsByClassName("slider-dot");

    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }

    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].classList.remove("active");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].classList.add("active");
  }

  // Auto slide (optional)
  setInterval(() => {
    plusSlide(1);
  }, 5000);
</script>