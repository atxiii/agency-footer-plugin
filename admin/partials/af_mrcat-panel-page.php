<?php

if( $image = wp_get_attachment_image_src( $image_id ) ) {
 
	echo '<a href="#" class="mrcat-upl"><img src="' . $image[0] . '" /></a>
	      <a href="#" class="mrcat-rmv">Remove image</a>
	      <input type="hidden" name="mrcat-img" value="' . $image_id . '">';
 
} else {
 
	echo '<a href="#" class="mrcat-upl">Upload image</a>
	      <a href="#" class="mrcat-rmv" style="display:none">Remove image</a>
	      <input type="hidden" name="mrcat-img" value="">';
 
}