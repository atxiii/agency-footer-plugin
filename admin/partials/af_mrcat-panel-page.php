<?php

?>


<h1>General Setting</h1><br>
<form action="options.php" method="post">
    <?php
        settings_fields('af_mrcat_setting');
        do_settings_sections('af_mrcat_setting');
    ?>

    <input type="text" name="af_mrcat_text" value="<?php echo get_option('af_mrcat_text'); ?>" placehoder="Add your text here" />
    

    <?php if(get_option('af_mrcat_logo')){
                printf( '<a href="#" class="mrcat-upl"><img src="%s" /></a>
                <a href="#" class="mrcat-rmv">Remove image</a>
                <input type="hidden" name="mrcat-img" value="%s">', $image[0],$image_id  );
            }else{
                printf('<a href="#" class="mrcat-upl">Upload image</a>
                <a href="#" class="mrcat-rmv" style="display:none">Remove image</a>
                <input type="hidden" id="af_mrcat_logo" name="af_mrcat_logo" value="%s">' , get_option('af_mrcat_logo') );
            }    
    ?>
    
    <input type="text" name="logo" value="<?php echo get_option('name'); ?>" placehoder="Add your url here" />
    <button type="submit" name="submit">Save</button>
    
</form>


