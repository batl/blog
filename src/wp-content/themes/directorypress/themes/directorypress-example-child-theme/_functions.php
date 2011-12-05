<?php

// THIS IS AN EXAMPLE CHILD THEME FUNCTIONS FILE

function example_function_name($filename=""){

	$string ="";
	
	if($filename != ""){
	
		$string .= "This page is loaded using the file: <b>".$filename."</b><br />";
	}
	 
	$string .= "<div style='background:red; padding:10px; color:white; margin-bottom:20px;'>This is an example function call text displayed at the top of child theme files. This function is found within the file: _functions.php</div>";
	return $string;
}


   	register_taxonomy( 'example_tax_', 'example_tax_type', array( 	
	 
	'labels' => array(
		'name' => 'example_tax_ Categories' ,
		'singular_name' => _x( 'example_tax_ Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search example_tax_ Categorys' ),
		'popular_items' => __( 'Popular example_tax_ Categorys' ),
		'all_items' => __( 'All example_tax_ Categorys' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit example_tax_ Category' ), 
		'update_item' => __( 'Update example_tax_ Category' ),
		'add_new_item' => __( 'Add example_tax_ Category' ),
		'new_item_name' => __( 'New example_tax_ Category Name' ),
		'separate_items_with_commas' => __( 'Separate example_tax_ Categorys with commas' ),
		'add_or_remove_items' => __( 'Add or remove example_tax_ Categorys' ),
		'choose_from_most_used' => __( 'Choose from the most used example_tax_ Categorys' )
		) , 
	'hierarchical' => true,	
	'query_var' => true,
	'show_ui' => true,
	'rewrite' => array('slug' => 'example_tax_-category') ) );
	
	
	
	register_post_type( 'example_tax_type',
		array(
		  'labels' => array('name' => 'example_tax_ Manager', 'singular_name' => 'example_tax_s' ), 
      	  'rewrite' =>  array('slug' => 'example_tax_'),
		  'public' => true,
		  'supports' => array ( 'title', 'editor','author', 'revisions', 'post-formats', 'trackbacks', 'comments','excerpt' ) 
		)
	  ); 

?>