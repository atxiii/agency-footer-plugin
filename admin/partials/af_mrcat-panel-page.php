<?php

?>


<h1>General Setting</h1><br>
<form action="options.php" method="post" class="af_mrcat_form">
    <?php
        settings_fields('af_mrcat_setting');
        do_settings_sections('af_mrcat_setting');
        $image = get_option('af_mrcat_logo') ? get_option('af_mrcat_logo') : 'https://via.placeholder.com/300/555555/FFFFFF/?text=Upload%20your%20logo';
    ?>
    <label for="af_mrcat_text">Your text footer</label>
    <input type="text" name="af_mrcat_text" id="af_mrcat_text" value="<?php echo get_option('af_mrcat_text'); ?>" placehoder="Add your text here" />
    <div class="af_image">
        <a href="#" class="mrcat-upl"><img src="<?php echo $image; ?>" ?></a>
        <a href="#" class="mrcat-rmv">X</a>
        <input type="hidden" id="af_mrcat_logo" name="af_mrcat_logo" value="<?php echo get_option('af_mrcat_logo'); ?>">
    </div>
    <div>
        <label for="af_mrcat_sites">Allow CROS policy for:<span>Add site to per line</span></label>
        <textarea name="af_mrcat_sites" id="af_mrcat_sites" cols="30" rows="10"></textarea> 
    </div>
    <button type="submit" name="submit">Save</button>
</form>


