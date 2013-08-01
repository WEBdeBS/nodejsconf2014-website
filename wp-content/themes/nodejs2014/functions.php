<?php

/* == abilito i menu di natcasesort(array)avigazione == */ 

register_nav_menus( array(
	'primary_menu' => 'Primary menu'
) );

function get_attachments_by_id($id) {

	return get_posts(array(
		"post_type" => "attachment",
		"post_parent" => $id
	));

}

add_image_size( 'gallery', 500, 375, true );

?>