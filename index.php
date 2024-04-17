<!DOCTYPE html>
<html>
  <head>
    <title>Psyo.io</title>
    <?php include 'headerinclude.php' ?>
  </head>
  <body class=" color_primary bg_primary">
  <div class="bg_gradient"></div>
   <div class="bg_container position_relative">

    <?php include 'header.php';
    $shop_name = "spadone";
    function getRandomNumber($min, $max) {
         return rand($min, $max);
    }

	?>


<section class="hero px_5 pt_22 pb_22 pl_4 pr_4 position_relative">
 
    
    <div class="flex_container container aos-init aos-animate" data-aos="fade-left">
      <div>
         <div class="text_4xlarge weight_bold mb_4 theme_text_gradient">Welcome to Psyo.io</div>
         <div class="mb_8 color_neutral">Your destination for affordible and high-quality products without breaking the bank. Immerse yourself in a curated collection of high-quality accounts. Experience not only the allure of our offers but also the comfort of our reliable support team, always ready to assist you.
     </div>
		  </div>
	  <div data-width="600px" class=" ">
	  
           <div class="hero_image position_relative"></div>


	  </div>
    </div>
  
</section>



<section class="aos-init aos-animate" data-aos="zoom-in-up">
   <div class="container pt_12 pt_12">
       <div class="flex_container flex_wrap -m_4">
         <div class="flex_rows_4 p_4 align_center bg_transparent m_2 radius_small">
		   
			
			<div class="mb_3 text_large  weight_semibold">
                Daily
            </div>      
              
            <div class=""> 
                Updates
            </div>
			
         </div>

  <div class="flex_rows_4 p_4  align_center bg_transparent m_2 radius_small">
		   
			
			<div class="mb_3 text_2xlarge  weight_semibold">
                50+  
            </div>      
              
            <div class=""> 
                Products
            </div>
			
         </div>
		 
		   <div class="flex_rows_4 p_4  align_center bg_transparent m_2 radius_small">
		   
			
			<div class="mb_3 text_2xlarge  weight_semibold">
                200+
            </div>      
              
            <div class=""> 
                Orders
            </div>
			
         </div>
		 
		   <div class="flex_rows_4 p_4  align_center bg_transparent m_2 radius_small">
		   
			
			<div class="mb_3 text_2xlarge  weight_semibold">
                Quick 
            </div>      
              
            <div class=""> 
                Support
            </div>
			
         </div>


        
       </div>
   </div>
</section>
</div>

<?php include 'cache/scrape.php' ?>
<section class="pl_4 pb_4 pt_12 pr_4 mt_12 position_relative">
        <div class="container">
            <div class="text_xlarge align_center mb_2 weight_semibold">Explore Products</div>
            <div class="align_center mb_8 color_neutral">Check out the variety of products that we provide.</div>
            <div class="grid_container" data-aos="fade-up" id="products">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $id => $product) : ?>
                        <?php 
                        if (isset($product['minPriceDetails']['amount']) && $product['minPriceDetails']['amount'] > 0 && isset($product['product'])) : 
                            $price = $product['minPriceDetails']['amount'];
                            $price_parts = explode('.', $price);
                            if (strpos($price, '.') === false) {
                                $price .= '.00';
                            } elseif (count($price_parts) == 2 && strlen($price_parts[1]) == 1) {
                                $price .= '0';  // Ensure two decimal places
                            }
                        ?>
                            <div id="<?php echo htmlspecialchars($product['id']); ?>" data-product-id="<?php echo htmlspecialchars($product['id']); ?>" class="active_items p_4 radius_medium product bg_secondary mb_4 flex_rows_4">
                                <div class="">
                                    <div class="product_image" data-src="https://imagedelivery.net/<?= htmlspecialchars($product['product']['thumbnailCfImageId']); ?>/productCard"></div>
                                </div>
                                <div class="product_info">
                                    <div class="product_title weight_semibold vmiddle theme_text_gradient"><?= htmlspecialchars($product['product']['title']); ?></div>
                                    <div class="pt_2 pb_2 text_small mb_8 none" data-height="40px"><?= htmlspecialchars($product['product']['shortDescription'] ?? ''); ?></div>
                                    <div class="mb_8"><?= htmlspecialchars($product['minPriceDetails']['currency']); ?> <?= htmlspecialchars($price); ?></div>
                                    <button data-width="100%" data-sellpass-product-path="<?= htmlspecialchars($product['path']); ?>" data-sellpass-domain="<?php echo htmlspecialchars($shop_name); ?>.sellpass.io" href="#" class="ml_auto mr_auto radius_medium weight_semibold mt_4 block pl_4 pr_4 pb_3 pt_3 align_center button_solid">
                                        Purchase
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No products found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>




  
  
    <?php include 'footer.php' ?>
	
	
	
	
	  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>


$(document).ready(function() {
  const productInput = $('#product');
  const searchBtn = $('#search');
  const categorySelect = $('select');
  const products = $('.product');

  categorySelect.on('change', function() {
    const selectedValue = categorySelect.val().split(',');

    products.each(function() {
      const productId = $(this).attr('data-product-id');
         
      if (selectedValue.includes(productId)) {
	      
        $(this).addClass("active_items").show();
      } else {
	   
        $(this).removeClass("active_items").hide();
      }
    });
  });

 $('[name=product]').on('input', function() {
    const searchText = productInput.val().toLowerCase();

    products.each(function() {
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
 
	
  </body>
</html>
