<?php

?>


<h1>General Setting</h1><br>
<form action="options.php" method="post" class="af_mrcat_form">
    <div class="af_text">
        <?php
            settings_fields('af_mrcat_setting');
            do_settings_sections('af_mrcat_setting');
            $image = get_option('af_mrcat_logo') ? get_option('af_mrcat_logo') : 'https://via.placeholder.com/320x90/555555/FFFFFF/?text=Upload%20your%20logo';
        ?>
        
        <label for="af_mrcat_text">Your text footer</label>
        <input type="text" name="af_mrcat_text" id="af_mrcat_text" value="<?php echo get_option('af_mrcat_text'); ?>" placehoder="Add your text here" />
    </div>

    <div class="af_image">
        <a href="#" class="mrcat-upl"><img src="<?php echo $image; ?>" ></a>
        <a href="#" class="mrcat-rmv dashicons-before dashicons-remove"></a>
        <input type="hidden" id="af_mrcat_logo" name="af_mrcat_logo" value="<?php echo get_option('af_mrcat_logo'); ?>">

    </div>
    <div class="image-details">
    
        <label for="af_mrcat_width_image">Width:(px, %)</label>
        <input type="text" id="af_mrcat_width_image" name="af_mrcat_width_image">

        
        <label for="af_mrcat_alt_image">Alt of image</label>
        <input type="text" id="af_mrcat_alt_image" name="af_mrcat_alt_image">

    </div>

    <div class="rel">
        <label for="af_mrcat_rel">Relation:(defualt: nofollow)</label>
        <input type="text" id="af_mrcat_rel" name="af_mrcat_rel">
    </div>

    <div class="target">
        <label for="af_mrcat_target">Target:(defualt: blank)</label>
        <input type="text" id="af_mrcat_target" name="af_mrcat_target">
    </div>

    <div class="af_sites">
        <label for="af_mrcat_sites">Allow CROS policy for:<br><span>Add site to per line</span></label>
        <textarea name="af_mrcat_sites" id="af_mrcat_sites" cols="30" rows="10" ><?php echo get_option('af_mrcat_sites'); ?></textarea> 
    </div>

    <button type="submit" name="submit">Save</button>
</form>


