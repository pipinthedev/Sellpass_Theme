<!DOCTYPE html>
<html lang="en">

<head>


  <?php include 'includes/headerinclude.php' ?>



  <?php include 'includes/header.php';
  $shop_name = "psyo";
  function getRandomNumber($min, $max)
  {
    return rand($min, $max);
  }

  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-gray-900 to-black text-white font-sans">

  <div class="gradient-border my-4 mx-auto max-w-screen-xl rounded-lg overflow-hidden">
    <nav class="navbar-inner flex justify-between items-center p-4">
      <a href="#" class="flex items-center">
        <span class="text-2xl font-bold">LOGO</span>
      </a>

      <div class="hidden md:flex space-x-10">
        <a href="#" class="nav-link hover:text-gray-300">HOME</a>
        <a href="#" class="nav-link hover:text-gray-300">FAQ</a>
        <a href="#" class="nav-link hover:text-gray-300">SUPPORT</a>
      </div>

      <a href="#" class="login-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101 101" class="w-6 h-6 mr-2 fill-current" id="user">
          <path
            d="M50.4 54.5c10.1 0 18.2-8.2 18.2-18.2S60.5 18 50.4 18s-18.2 8.2-18.2 18.2 8.1 18.3 18.2 18.3zm0-31.7c7.4 0 13.4 6 13.4 13.4s-6 13.4-13.4 13.4S37 43.7 37 36.3s6-13.5 13.4-13.5zM18.8 83h63.4c1.3 0 2.4-1.1 2.4-2.4 0-12.6-10.3-22.9-22.9-22.9H39.3c-12.6 0-22.9 10.3-22.9 22.9 0 1.3 1.1 2.4 2.4 2.4zm20.5-20.5h22.4c9.2 0 16.7 6.8 17.9 15.7H21.4c1.2-8.9 8.7-15.7 17.9-15.7z">
          </path>
        </svg>
        <span>Login</span>
      </a>
    </nav>
  </div>

  <div class="blurred-image-container">
    <div class="blurred-image"></div>
    <div class="content text-center py-12">
      <h1 class="text-5xl font-bold mb-3 mt-4">
        <span class="border-pink">EXP</span><span>LOR</span><span>E THE HIGH </span><span>QUAL</span><span>ITY</span>
        <span>PROD</span><span class="border-blue">UCTS</span>
      </h1>
      <p class="text-xl gradient-text mb-6">PROVIDING THE MOST HQ & CHEAPEST ACCOUNTS IN THE MARKET</p> <br>
      <div class="gradient-borders inline-block">
        <button class="rounded-full font-bold text-lg">PRODUCTS</button>
      </div>
    </div>
  </div>

  <?php include 'server/scrape.php'; ?>

  <section class="px-4 py-12 mt-12 relative">
    <div class="container mx-auto">
      <div class="search_form ml_auto mr_auto align_center mb_8 flex_persistent" data-width="100%">
        <div style="border: 1px solid #AB0AB9"
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
                  style="background-color: #AB0AB9;">Buy Now |
                  <?= $product['minPriceDetails']['currency'] . ' ' . number_format($product['minPriceDetails']['amount'], 2); ?></button>
              </div>
            </div>
          <?php endforeach; ?>



        </div>
      </div>
    </div>
  </section>







  <footer class="text-center py-5 text-xs">
    <p>&copy; Your Company. All rights reserved.</p>
  </footer>
  <?php include 'includes/footer.php' ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

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

</script>
</body>
</html>