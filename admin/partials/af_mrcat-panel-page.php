<?php

?>


<h1>General Setting</h1><br>
<form action="options.php" method="post">
    <?php
        settings_fields('af_mrcat_setting');
        do_settings_section('af_mrcat_setting');
    ?>

    <input type="text" name="text" value="<?php echo get_option('text'); ?>" placehoder="Add your text here" />
    <input type="text" name="logo" value="<?php echo get_option('name'); ?>" placehoder="Add your url here" />
    <button type="submit" name="submit">Save</button>
    
</form>



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