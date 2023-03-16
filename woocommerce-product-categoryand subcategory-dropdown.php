


<?php
  $args = array(
          'taxonomy' => 'product_cat',
          'hide_empty' => false,
          'parent'   => 0
      );
  $product_cat = get_terms( $args );
  $termID="";

	if(is_product_category()){
		$cat = get_queried_object();
		$parent_cat_id = $cat->parent;
		$termID=get_queried_object_id();	
	}



echo'<ul class="sidebar_list">';
  foreach ($product_cat as $parent_product_cat)
  {
	  $class="";
	  $classChild="";
	  if($termID==$parent_product_cat->term_id){
		  $class="active";
	  }
	  
	  
	  if($parent_product_cat->term_id==$cat->parent){
		  $class="active";
	  }
	  

  echo '
      
        <li class="category_list '.$class .'" id="'.$parent_product_cat->term_id.'"><span class="toggle_category"></span><a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'</a>
        <ul class="sub-category">';
  $child_args = array(
              'taxonomy' => 'product_cat',
              'hide_empty' => false,
              'parent'   => $parent_product_cat->term_id
          );
  $child_product_cats = get_terms( $child_args );
  foreach ($child_product_cats as $child_product_cat)
  {
	  if($termID==$child_product_cat->term_id){
		  $classChild="active";
	  }
    echo '<li class="category_list '.$classChild.'" id="'.$child_product_cat->term_id.'"><a href="'.get_term_link($child_product_cat->term_id).'">'.$child_product_cat->name.'</a></li>';
  }

  echo '</ul>
      </li>
    ';
  }
echo '</ul>';



?>