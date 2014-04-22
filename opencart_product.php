<div id="carousel-wrapper">
	
				<div id="carousel">

                
 <?php $i=1; ?>               
        <?php foreach ($images as $image) { ?>        
			<span id="img_<?php echo $i;?>" class="<?php echo $image['custom_field'];?>">
            <img src="<?php echo $image['popup']; ?>" id="img_<?php echo $i;?>" data-zoom-image="<?php echo $image['popup']; ?>" /></span>
                    
                    <?php $i++; } ?>
</div></div>

<div id="thumbs-wrapper">
				<div id="thumbs">

 <?php 
 $j=1;
 foreach ($images as $image) { ?>

        <a href="#img_<?php echo $j;?>" title="<?php echo $product_id; ?>" class="<?php echo $image['custom_field'];?>"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
        <?php $j++;} ?>
        </div>
        <a id="prev" href="#"></a>
				<a id="next" href="#"></a>
        </div>
<!--carausal-->
</div><!-- batman -->
</div><!-- span 6-->

<div class="follows">
<li><a href="#"><img src="catalog/view/theme/dorktees/images/productfb.png" border="0px" /></a></li>
<li><a href="#"><img src="catalog/view/theme/dorktees/images/producttwitter.png" border="0px" /></a></li>
</div><!--follows-->


<!--hover-->
<div class="clothes">
<div class="nav1">
 <div class="tabbable"> 
 <ul class="nav nav-tabs">
 <?php 
 //print_r($options);
 $i=1;
 foreach($options as $option){
 ?>
 <li class="main-tab" maintabattr="<?php echo $option['product_option_id']; ?>" id="cust_tab_<?php echo $option['product_option_id']; ?>"><a><?php echo $option['name']; ?></a></li>

 
<?php $i++;}
?>
 </ul>
    
    </div>
</div><!--nav1-->


</div>
<!--hover-->

<div class="span2">
<p><?php echo $description; ?></p>
<div class="choose-size">
<p>Choose Size:</p>
<a class="sizingChart" href="#">See Sizing Chart</a>
</div>
<div class="followsize"><?php  ?>
<ul>
<?php foreach ($options as $option) { 
if ($option['type'] == 'radio') {
?>
 
<div class="instock <?php echo $option['name']; ?>" id="<?php echo $option['product_option_id']; ?>">
 <?php $i=1; 

 foreach ($option['option_value'] as $option_value) {?>
<li for="option-value-<?php echo $option_value['product_option_value_id']; ?>" class="size" id="size_<?php echo $i; ?>" data-id="<?php echo $option_value['product_option_value_id']; ?>"><a><?php echo $option_value['name']; ?></a></li>
          
          <?php if ($option_value['price']) { ?>
            <div class="itm-price_<?php echo $option_value['product_option_value_id']; ?>" style="display:none;" ><?php echo $option_value['price']; ?></div>
            <div class="itm-txt_<?php echo $option_value['product_option_value_id']; ?>" style="display:none;" ><?php echo $option_value['name']; ?></div>
            <?php } $i++;} ?>
          
         
<?php 
if($option['name']=='Men'){
$var = $option['option_value'][0]['price']; }
?>




</div>
<?php  }  } ?>

</ul>
<span><h2><?php echo $stock; ?></h2>
<h3 class="myelmnt"><?php if(!empty($option['option_value'][0]['price'])){ echo $var; }?></h3></span>
<?php  ?>
<?php if(!empty($option['option_value'][0]['name'])){ ?>
<div class="itm-text"><span id="item-name"><?php echo $options[0]['name'];?></span>&nbsp;
<span id="item-size"><?php echo $option['option_value'][0]['name']; ?></span></div>
<?php } ;?>
</div>



<script type="text/javascript">

//*************custom jquery for tabs *************
//on load these should be active or checked
$( ".tabbable li" ).first().addClass( "active" );
$( ".followsize div" ).first().addClass( "active" );
$(".size-radio input[type=radio]:first").attr('checked', 'checked');

// click function of option tab i.e. man, women etc
$( ".tabbable li" ).click(function() {
			
// remove active for class and add active for selected								   
	$( ".tabbable li" ).removeClass('active');
	$(this).addClass("active");
    var tab_id = $( this ).attr( "maintabattr" );// get id
	$('.instock').removeClass('active');    

//show size class for seleted option
	$('#'+tab_id).addClass( "active" );
	var tab_name = $(this).find('a').text();
	$('#item-name').html(tab_name);
	
/******* size radio selection process *****/		
	$(".size-radio input[type=radio]").removeAttr('checked'); 
	$(".size-radio input:radio[name='option["+tab_id+"]']").first().attr('checked', 'checked');

// carousal setingd	
	$('#carousel').trigger('slideTo', $('.'+tab_name).show() );
					$('#thumbs a').removeClass('selected'); 
	$('.'+tab_name).first().addClass( "selected" );
					return false;
					
	
  });

// size option click 
$( ".instock li" ).click(function() { 
	var	id= $(this).attr('data-id');
	var price= $( ".itm-price_"+id ).html();
	var text1= $( ".itm-txt_"+id ).html();
	$( ".instock li" ).removeClass('selected'); 
	$(this).addClass('selected');

// radio select disable first and checked perticular
	
	$('#option-value-'+id).attr('checked', 'checked');

// show size and price in div
	$('#item-size').html(text1);
	$('.myelmnt').html(price);
});
</script>
