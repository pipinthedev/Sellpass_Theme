<!DOCTYPE html>
<html lang="en">

<head>


  <?php include 'includes/headerinclude.php' ?>



  <?php
  $shop_name = "psyo";
  function getRandomNumber($min, $max)
  {
    return rand($min, $max);
  }

  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="index.css">
</head>

<body class="bg-gradient-to-b from-gray-900 to-black text-white font-sans">

  <?php include 'includes/header.php'; ?>

  <div class="blurred-image-container">
    <div class="blurred-image"></div>
    <div class="content text-center py-12">
      <h1 class="text-5xl font-bold mb-3 mt-4">
        <span class="border-pink" id="part1"></span><span id="part2"></span><span id="part3"></span>
        <span id="part4"></span><span id="part5"></span><span class="border-blue" id="part6"></span><span
          id="cursor">|..</span>
      </h1>
      <p class="text-xl gradient-text mb-6" id="typer">PROVIDING THE MOST HQ & CHEAPEST ACCOUNTS IN THE MARKET</p> <br>
      <div class="gradient-borders inline-block">
        <button class="rounded-full font-bold text-lg"><a href="#prodcs">PRODUCTS</a></button>
      </div>
    </div>
  </div>

  <?php include 'server/scrape.php'; ?>


  <div class="outer-container">
    <div class="masking-div-left"></div>
    <div class="scrolling-container">
      <div class="scrolling-content">
        <?php foreach ($products as $product) {
          $display_name = strlen($product['product']['title']) > 50 ? substr($product['product']['title'], 0, 47) . '...' : $product['product']['title'];
          echo "<div class='product-name'>{$display_name}</div>";
        } ?>
      </div>
    </div>
    <div class="masking-div-right"></div> <!-- Right masking div for styling -->
  </div>


  <?php include ('vouches.php'); ?>

  <section class="px-4 py-12 mt-3 relative" id="prodcs">
    <div class="container mx-auto">

      <div class="search_form ml_auto mr_auto align_center mb_8 flex_persistent" data-width="100%">
        <div class="content-description">
          <span class="main-title" style="color: #0ad9ea;">What do we provide?</span>
          <div class="sub-title">
            <span>The High Quality </span><span id="dynamic-content" class="dynamic-part"
              style="color:  #de0ab1;">Support</span>
          </div>
        </div>


        <div style="border: 1px solid #0ad9ea"
          class="bg_secondary button_outlined flex_container border_neutral position_relative mb_8 p_3  color_neutral radius_medium button_outlined border_neutral">


          <input type="text" id="product" name="product" value="" placeholder="Search for products" data-width="70%"
            class="p_0 pl_8 bg_none">
        </div>
        <div class="category_buttons">
          <button class="category_button active" data-category="all">All</button>
          <?php foreach ($categories as $category): ?>
            <?php if (strtolower($category['name']) !== 'all'): ?>
              <button class="category_button" data-category="<?= $category['id']; ?>">
                <?= htmlspecialchars(ucwords(strtolower($category['name']))); ?>
              </button>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>


        <div id="no-products-message" class="text-center text-lg font-bold"
          style="display: none; margin-top: 30px !important;">
          No Products Found
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4"
          data-aos="fade-up" id="products">
          <?php foreach ($products as $product): ?>
            <?php
            $category_ids = [];
            foreach ($categories as $category) {
              if (in_array($product['id'], $category['listingIds'])) {
                $category_ids[] = $category['id'];
              }
            }
            ?>
            <div
              class="product flex flex-col justify-between bg-gray-800 rounded-lg overflow-hidden transition-shadow duration-300 hover:shadow-lg h-full"
              data-category-ids="<?= implode(',', $category_ids); ?>">
              <div class="p-4 flex justify-center">
                <img class="object-cover w-full h-36" style="border-radius: 10px !important;"
                  src="https://imagedelivery.net/<?= htmlspecialchars($product['product']['thumbnailCfImageId']); ?>/productCard"
                  alt="<?= htmlspecialchars($product['product']['title']); ?>">
              </div>
              <div class="p-4 text-center">
                <p class="text-lg font-semibold text-white"><?= htmlspecialchars($product['product']['title']); ?></p>
                <p class="text-sm text-gray-400"><?= htmlspecialchars($product['product']['shortDescription'] ?? ''); ?>
                </p>
              </div>
              <div class="px-4 pb-4 mt-auto">
                <button data-width="100%" data-sellpass-product-path="<?= $product['path']; ?>"
                  data-sellpass-domain="<?php echo $shop_name; ?>.sellpass.io" href="#"
                  class="block w-full hover:bg-purple-500 text-center text-white font-bold py-2 rounded-lg"
                  style="background-color:  #130ade ;">Buy Now |
                  <?= $product['minPriceDetails']['currency'] . ' ' . number_format($product['minPriceDetails']['amount'], 2); ?></button>
              </div>
            </div>
          <?php endforeach; ?>



        </div>
      </div>
    </div>
  </section>
  <footer class="text-center py-5 text-xs">
    <p>&copy; Testing shop</p>
  </footer>
  <?php include 'includes/footer.php' ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>


    document.addEventListener('DOMContentLoaded', function () {
      const scrollContainer = document.querySelector('.scrolling-content');
      let scrollPosition = 0;
      const speed = 2;
      let animationFrameId;

      const items = document.querySelectorAll('.product-name');
      const gap = 30;

      let totalWidth = 0;
      items.forEach((item, index) => {
        totalWidth += item.offsetWidth;
        if (index < items.length - 1) {
          totalWidth += gap;
          item.style.marginRight = gap + 'px';
        }
      });
      scrollContainer.style.width = totalWidth + 'px';

      function moveContent() {
        scrollPosition -= speed;
        if (Math.abs(scrollPosition) >= totalWidth) {
          scrollPosition = window.innerWidth;
        }
        scrollContainer.style.transform = `translateX(${scrollPosition}px)`;

        animationFrameId = requestAnimationFrame(moveContent);
      }

      function stopAnimation() {
        cancelAnimationFrame(animationFrameId);
      }

      function startAnimation() {
        moveContent();
      }

      scrollContainer.addEventListener('mouseenter', stopAnimation);
      scrollContainer.addEventListener('mouseleave', startAnimation);

      moveContent();
    });




    $(document).ready(function () {
      var filterProducts = function () {
        var searchText = $("#product").val().toLowerCase();
        var selectedCategory = $(".category_button.active").data("category");
        var productFound = false;

        $(".product").each(function () {
          var productName = $(this).find(".text-lg").text().toLowerCase();
          var categories = $(this).data("category-ids").toString().split(",");
          var isCategoryMatch =
            selectedCategory === "all" ||
            categories.includes(selectedCategory.toString());
          var isSearchMatch = productName.includes(searchText);

          if (isCategoryMatch && isSearchMatch) {
            $(this).show();
            productFound = true;
          } else {
            $(this).hide();
          }
        });

        $("#no-products-message").toggle(!productFound);
      };

      $(".category_button").on("click", function () {
        $(".category_button").removeClass("active");
        $(this).addClass("active");
        filterProducts();
      });

      $("#product").on("input", filterProducts);

      filterProducts();
    });



    document.addEventListener('DOMContentLoaded', function () {
      const dynamicContents = ["Replacement", "Accounts", "drops", "Discounts", "Logs"];
      let index = 0;

      setInterval(() => {
        document.getElementById('dynamic-content').style.animation = 'none';
        setTimeout(() => {
          document.getElementById('dynamic-content').innerHTML = dynamicContents[index];
          document.getElementById('dynamic-content').style.animation = 'slideUp 1s ease-in-out';
          index = (index + 1) % dynamicContents.length;
        }, 50);
      }, 3000);
    });


    document.addEventListener('DOMContentLoaded', function () {
      const dynamicContents = ["Support", "Stocks", "Hits"];
      let index = 0;

      setInterval(() => {
        document.getElementById('dynamic-content2').style.animation = 'none';
        setTimeout(() => {
          document.getElementById('dynamic-content2').innerHTML = dynamicContents[index];
          document.getElementById('dynamic-content2').style.animation = 'slideUp 1s ease-in-out';
          index = (index + 1) % dynamicContents.length;
        }, 50);
      }, 3000);
    });

    document.addEventListener('DOMContentLoaded', function () {
      const baseSpeed = 3000;
      const isMobile = window.innerWidth <= 768;
      const speedAdjustment = isMobile ? 1.5 : 1;

      setInterval(() => {
      }, baseSpeed * speedAdjustment);
    });


  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const partsText = ["EXP", "LOR", "E THE HIGH ", "QUAL", "ITY ", "PRODUCTS"];
      const partsElements = partsText.map((_, i) => document.getElementById(`part${i + 1}`));
      let currentPart = 0;
      let partIndex = 0;

      function type() {
        if (currentPart < partsElements.length) {
          if (partIndex < partsText[currentPart].length) {
            partsElements[currentPart].textContent += partsText[currentPart][partIndex];
            partIndex++;
            setTimeout(type, 100); // Speed of typing
          } else {
            partIndex = 0;
            currentPart++;
            setTimeout(type, 250); // Delay before next part starts
          }
        } else {
          document.getElementById('cursor').style.animation = 'none';
          document.getElementById('cursor').style.opacity = 0; // Optionally remove cursor after completion
        }
      }

      type();
    });


    document.addEventListener('DOMContentLoaded', function () {
      const scrollContent = document.querySelector('.scrolling-content');
      let totalWidth = 0;

      document.querySelectorAll('.product-name').forEach(item => {
        totalWidth += item.offsetWidth + parseFloat(window.getComputedStyle(item).marginLeft) + parseFloat(window.getComputedStyle(item).marginRight);
      });

      const speed = totalWidth / window.innerWidth;
      scrollContent.style.animationDuration = `${speed * 3}s`;

      const container = document.querySelector('.scrolling-container');
      container.addEventListener('mouseenter', () => {
        scrollContent.style.animationPlayState = 'paused';
      });
      container.addEventListener('mouseleave', () => {
        scrollContent.style.animationPlayState = 'running';
      });
    });


  </script>



</body>

</html>