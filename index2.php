<!DOCTYPE html>
<html lang="en">

<head>


  <?php include 'headerinclude.php' ?>



  <?php include 'header.php';
  $shop_name = "hqlogs";
  function getRandomNumber($min, $max)
  {
    return rand($min, $max);
  }

  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Product Grid</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .border-gradient {
      background: linear-gradient(to right, #7F00FF, #E100FF);
      border-radius: 9999px;
      padding: 1px;
    }

    .border-gradient input {
      background: #4C0070;
      border-radius: 9999px;
    }

    .search-icon {
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="%239F7AEA"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 11-2 0 1 1 0 012 0zm-1 9a5 5 0 114-5 5 5 0 01-4 5z" clip-rule="evenodd" /></svg>');
      width: 20px;
      height: 20px;
      margin-right: 16px;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 2.5rem;
      pointer-events: none;
    }

    .gradient-border {
      background: linear-gradient(to right, #01ECEA, #E100FF);
      border-radius: 0.5rem;
      padding: 1px;
    }

    .navbar-inner {
      background: #1F2937;
      border-radius: calc(0.5rem - 1px);
      padding: 1rem;
    }

    @media (min-width: 768px) {
      .navbar-inner {
        padding: 1rem 2rem;
      }
    }


    .nav-link {
      font-size: 1.125rem;
      font-weight: 700;
      letter-spacing: 0.05em;
    }

    .login-button {
      background-color: #AB0AB9;
      padding: 12px 24px;
      border-radius: 0.375rem;
      font-size: 1.125rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .login-icon {
      display: inline-block;
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      width: 1.5em;
      height: 1.5em;
      content: "";
    }


    .blurred-image {
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 50%;
      background: url('removed.png') no-repeat;
      background-size: 150%;
      background-position: left center;
      filter: blur(1000px);
      z-index: -1;
    }

    .border-pink {
      -webkit-text-stroke: 1px #d70498;
    }

    .border-blue {
      -webkit-text-stroke: 1px #01ECEA;
    }

    .border-split {
      background: linear-gradient(to right, #d70498 50%, #01ECEA 50%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      -webkit-text-stroke: 1px transparent;
    }

    .gradient-text {
      font-size: 3rem;
      /* Adjust the font size as needed */
      font-weight: bold;
      background: linear-gradient(to right, #d70498, #01ECEA);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: inline-block;
      /* Required for -webkit-background-clip */
      text-shadow:
        0 0 2px rgba(215, 4, 152, 0.5),
        0 0 5px rgba(6, 6, 218, 0.5),
        0 0 10px rgba(215, 4, 152, 0.5),
        /* Blur and spread out the pink color */
        0 0 15px rgba(6, 6, 218, 0.5);
      /* Blur and spread out the blue color */
      -webkit-text-stroke: 1px transparent;
      /* Required to create the border effect */
    }


    .gradient-text::after {
      content: attr(data-text);
      /* Use the text from data-text attribute */
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: -1;
      background: linear-gradient(to right, #d70498, #01ECEA);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      filter: blur(1px);
      /* Apply blur to the border */
      opacity: 0.2;
      /* You can adjust the opacity for the blur effect */
    }

    .gradient-borders {
      background: linear-gradient(to right, #d70498, #01ECEA);
      padding: 3px;
      border-radius: 0.5rem;
    }

    .gradient-borders button {
      background-color: transparent;
      color: white;
      border: none;
      padding: 0.75rem 2rem;
    }

    .product-button {
      padding: 0;
      /* Remove padding to make the button full width */
    }

    .btn-product {
      background-color: #6D28D9;
      /* Primary purple */
      color: white;
      font-weight: bold;
      padding: 10px 0;
      /* Y padding 10px, X padding 0 for full width */
      display: block;
      /* Makes the anchor tag behave like a block element */
      text-align: center;
      /* Centers the text inside the button */
      text-decoration: none;
      /* Removes underline from anchor tag */
      border: 1px solid transparent;
      /* Transparent border to maintain button size */
      outline: none;
      /* Removes outline */
      cursor: pointer;
      /* Changes cursor to pointer */
      border-radius: 5px;
      /* 5px border radius */
      transition: background-color 300ms, transform 300ms, border-color 300ms;
      /* Smooth transition for hover effects */
      width: 100%;
      /* Full width */
      margin: auto;
      /* Centers the button in case there's any margin issue */
    }

    .btn-product:hover {
      background-color: transparent;
      /* Transparent background on hover */
      color: white;
      /* Keep text color white */
      border-color: #5B21B6;
      /* Purple border color on hover */
      transform: none;
      /* Removes scale effect */
    }
  </style>
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

  <?php include 'cache/scrape.php'; ?>
  <section class="pl_4 pb_4 pt_12 pr_4 mt_12 position_relative">
    <div class="container">

      <div class="text_xlarge align_center mb_2 weight_semibold">Explore Products</div>
      <div class="align_center mb_8 color_neutral">Check out the variety of products that we provide.</div>


      <div class="search_form ml_auto mr_auto align_center  mb_8   flex_persistent" data-width="100%">

        <div
          class=" bg_secondary button_outlined flex_container border_neutral position_relative mb_8 p_3  color_neutral radius_medium button_outlined border_neutral">


          <input type="text" id="product" name="product" value="" placeholder="Search for products" data-width="70%"
            class="p_0 pl_8 bg_none">

          <select name="categories" id="categories" class="border border_left border_neutral ml_3 p_0 pl_8 bg_none"
            data-width="30%">


            <?php

            foreach ($cat_data as $cat_name => $ids) {

              ?>
              <option value="<?php echo $ids; ?>"><?php echo ucwords(strtolower($cat_name)); ?></option>

            <?php } ?>


          </select>


        </div>

      </div>
  </section>

  <?php include 'cache/scrape.php'; ?>
  <section class="px-4 py-12 mt-12 relative">
    <div class="container mx-auto">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" data-aos="fade-up"
        id="products">
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $id => $product): ?>
            <?php if (isset($product['minPriceDetails']['amount']) && $product['minPriceDetails']['amount'] > 0 && isset($product['product'])):
              $price = number_format($product['minPriceDetails']['amount'], 2, '.', '');
              ?>
              <div id="<?php echo htmlspecialchars($product['id']); ?>"
                class="flex flex-col justify-between bg-gray-800 rounded-lg overflow-hidden transition-shadow duration-300 hover:shadow-lg h-full">
                <div>
                  <div class="p-4 flex justify-center">
                    <img class="object-cover w-full h-36" style="max-width: 500px; max-height: 142px; border-radius: 10px !important;"
                      src="https://imagedelivery.net/<?php echo htmlspecialchars($product['product']['thumbnailCfImageId']); ?>/productCard"
                      alt="<?php echo htmlspecialchars($product['product']['title']); ?>">
                  </div>
                  <div class="p-4 text-center">
                    <p class="text-lg font-semibold text-white"><?php echo htmlspecialchars($product['product']['title']); ?>
                    </p>
                   
                    <p class="text-sm text-gray-400">
                      <?php echo htmlspecialchars($product['product']['shortDescription'] ?? ''); ?></p>
                  </div>
                </div>
                <div class="px-4 pb-4 mt-auto">
                  <button data-width="100%" data-sellpass-product-path="<?= $product['path']; ?>"
                  data-sellpass-domain="<?php echo $shop_name; ?>.sellpass.io" href="#"
                    class="block w-full hover:bg-purple-500 text-center text-white font-bold py-2 rounded-lg transition-all duration-300" style="background-color: #AB0AB9 !important; color: #FFFFFF !important">
                    Buy Now | <?php echo htmlspecialchars($product['minPriceDetails']['currency']); ?>       <?php echo $price; ?>
                  </button>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center text-white">No products found.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>













  <!-- Footer -->
  <footer class="text-center py-5 text-xs">
    <p>&copy; Your Company. All rights reserved.</p>
  </footer>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script>


    $(document).ready(function () {
      const productInput = $('#product');
      const searchBtn = $('#search');
      const categorySelect = $('select');
      const products = $('.product');

      categorySelect.on('change', function () {
        const selectedValue = categorySelect.val().split(',');

        products.each(function () {
          const productId = $(this).attr('data-product-id');

          if (selectedValue.includes(productId)) {

            $(this).addClass("active_items").show();
          } else {

            $(this).removeClass("active_items").hide();
          }
        });
      });

      $('[name=product]').on('input', function () {
        const searchText = productInput.val().toLowerCase();

        products.each(function () {
          if ($(this).is('.active_items')) {



            const productName = $(this).find('.product_title').text().toLowerCase();

            if (productName.includes(searchText)) {
              $(this).show();
            } else {
              $(this).hide();
            }
          }
        });
      });
    });


    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const target = entry.target;
          const url = target.getAttribute('data-src');
          target.style.backgroundImage = `url(${url})`;
          observer.unobserve(target);
        }
      });
    });

    const targets = document.querySelectorAll('.product_image');
    targets.forEach(target => {
      observer.observe(target);
    });




  </script>

  <?php include 'footer.php' ?>

</body>

</html>