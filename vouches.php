<!DOCTYPE html>
<html>
  <head>
    <title>Psyo - Vouches</title>
    <?php include 'headerinclude.php' ?>
  </head>
  <body class="bg_primary color_primary">
   <div class="bg_gradient"></div>
   <div class="bg_container position_relative">
    <?php include 'header.php' ?>


 <?php include 'cache/scrape_vouches.php' ?>
<section class="">
   <div class="container pt p_6 mt_12">
     <div class="mb_6 text_large align_center weight_semibold">Vouches</div>
	    <div class="grid_vouches_container">
		<?php 
	        foreach($feedbacks as $feedback) {
			      $dateTime = new DateTime($feedback['createdAt']);


$formattedDateTime = $dateTime->format('Y-m-d H:i:s');


			?>
			
			  <div class="p_4 radius_medium m_2 bg_secondary">
			     <?= $formattedDateTime; ?> <span class="float_right"><?= $feedback['rating']; ?> / 5</span>
			      
				<div class="mt2_2">
			    <?= $feedback['comment']; ?>
				</div>
				  </div>
			 
			<?php 
			
			}
			
			?>



	 </div>  
</section>

   
    <?php include 'footer.php' ?>
  </body>
</html>
