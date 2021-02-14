<?php

?>


<h1>General Setting</h1><br>
<form action="options.php" method="post">
    <?php
        settings_fields('af_mrcat_setting');
        do_settings_sections('af_mrcat_setting');
        $image = get_option('af_mrcat_logo') ?? 'https://via.placeholder.com/300/555555/FFFFFF/?text=Upload%20your%20logo';
    ?>

    <input type="text" name="af_mrcat_text" value="<?php echo get_option('af_mrcat_text'); ?>" placehoder="Add your text here" />
    <a href="#" class="mrcat-upl"><img src="<?php echo $image; ?>" ?></a>

    <input type="hidden" id="af_mrcat_logo" name="af_mrcat_logo" value="<?php echo get_option('af_mrcat_logo'); ?>">
    <button type="submit" name="submit">Save</button>
    
</form>


