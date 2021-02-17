<?php
define('AF_MRCAT_TEXT_DOMAIN','af_mrcat');
?>


<h1><?php _e('General Setting',AF_MRCAT_TEXT_DOMAIN) ; ?></h1><br>

<div class="af_mrcat_wrap">
<form action="options.php" method="post" class="af_mrcat_form">
    <div class="af_text">
        <?php
            settings_fields('af_mrcat_setting');
            do_settings_sections('af_mrcat_setting');
            $image = get_option('af_mrcat_logo') ? get_option('af_mrcat_logo') : 'https://via.placeholder.com/320x90/555555/FFFFFF/?text=Upload%20your%20logo';
        ?>
        
        <label for="af_mrcat_text"><?php _e('Footer Text',AF_MRCAT_TEXT_DOMAIN);  ?></label>
        <input type="text" name="af_mrcat_text" id="af_mrcat_text" value="<?php echo get_option('af_mrcat_text'); ?>" placehoder="Add your text here" />
    </div>

    <div class="af_image">
        <a href="#" class="mrcat-upl"><img src="<?php echo $image; ?>" ></a>
        <a href="#" class="mrcat-rmv dashicons-before dashicons-remove"></a>
        <input type="hidden" id="af_mrcat_logo" name="af_mrcat_logo" value="<?php echo get_option('af_mrcat_logo'); ?>">

    </div>
    <div class="image-details">
        <div class="inner-flex">
            <label for="af_mrcat_width_image"><?php _e('Width:',AF_MRCAT_TEXT_DOMAIN); ?><span><?php _e('px, % (default: 100px)',AF_MRCAT_TEXT_DOMAIN) ?></span></label>
            <input type="text" id="af_mrcat_width_image" value="<?php echo get_option('af_mrcat_width_image')?>" name="af_mrcat_width_image">
        </div>
        <div class="inner-flex">
            <label for="af_mrcat_alt_image"><?php _e('Alt of image',AF_MRCAT_TEXT_DOMAIN); ?></label>
            <input type="text" id="af_mrcat_alt_image" value="<?php echo get_option('af_mrcat_alt_image')?>" name="af_mrcat_alt_image">
        </div>
    </div>

    <div class="rel">
        <label for="af_mrcat_rel"><?php _e('Relation:',AF_MRCAT_TEXT_DOMAIN); ?><span><?php _e('default: nofollow',AF_MRCAT_TEXT_DOMAIN); ?></span></label>
        <input type="text" id="af_mrcat_rel" value="<?php echo get_option('af_mrcat_rel')?>" name="af_mrcat_rel">
    </div>

    <div class="target">
        <label for="af_mrcat_target"><?php _e('Target:',AF_MRCAT_TEXT_DOMAIN); ?><span><?php _e('default: blank',AF_MRCAT_TEXT_DOMAIN); ?></span></label>
        <input type="text" id="af_mrcat_target" value="<?php echo get_option('af_mrcat_target')?>" name="af_mrcat_target">
    </div>

    <div class="delay">
        <label for="af_mrcat_delay"><?php _e('Trigger Delay:',AF_MRCAT_TEXT_DOMAIN) ?><span><?php _e('default: 3000ms',AF_MRCAT_TEXT_DOMAIN) ?></span></label>
        <input type="text" id="af_mrcat_delay" value="<?php echo get_option('af_mrcat_delay')?>" name="af_mrcat_delay">
    </div>

    <div class="af_sites">
        <div class="inner-flex">
            <label for=""><?php _e('CORS HEADER',AF_MRCAT_TEXT_DOMAIN); ?><span><?php _e('Allow the server to indicate any other origins if you have error CORS policy in client\'s site.',AF_MRCAT_TEXT_DOMAIN); ?></span></label>
            <div>
                <input type="radio" name="af_mrcat_cors" value="af_mrcat_cors_all" id="af_mrcat_cors_all" <?php if(get_option('af_mrcat_cors')=='af_mrcat_cors_all') echo 'checked'; ?> >
                <label for="af_mrcat_cors_all"><?php _e('All',AF_MRCAT_TEXT_DOMAIN); ?></label>
                
                <input type="radio" name="af_mrcat_cors" value="af_mrcat_cors_custom" id="af_mrcat_cors_custom" <?php if(get_option('af_mrcat_cors')=='af_mrcat_cors_custom') echo 'checked'; ?>>
                <label for="af_mrcat_cors_custom"><?php _e('Custom',AF_MRCAT_TEXT_DOMAIN); ?></label>
            </div>
        </div>
        <div class="inner-flex">
            <label for="af_mrcat_sites"><?php _e('Allow CROS policy for:',AF_MRCAT_TEXT_DOMAIN); ?><br><span><?php _e('Add site to per line',AF_MRCAT_TEXT_DOMAIN); ?></span></label>
            <textarea name="af_mrcat_sites" id="af_mrcat_sites" cols="30" rows="10" ><?php echo get_option('af_mrcat_sites'); ?></textarea> 
        </div>
    </div>


    <button type="submit" name="submit">Save</button>
</form>

<div class="output">
   <h2><?php _e('Please copy the code in client\'s site',AF_MRCAT_TEXT_DOMAIN); ?> </h2> 
   <textarea id="af_mrcat_js_code" cols="30" rows="10">  
      <?php 
      $delay = get_option('af_mrcat_delay') ?  get_option('af_mrcat_delay') : "3000";
      printf ('&ltscript&gt
      const data = {"action": "af_mrcat_data"};
      setTimeout(function(){
                  jQuery.post("%s", data, function(response) {
                  const agencyDiv = document.createElement("div");
                  agencyDiv.className = "digitalwind-agency-container";
                  agencyDiv.style.textAlign = "center";
                  let html =  `&lta href="${response.domain}" class="digitalwind-link" rel="${response.rel}" title="${response.altOfImage}" target="${response.target}"&gt&ltp class="digitalwind-agency-text" style="text-align:center;margin:0px auto;font-size:14px"&gt${response.text}&lt/p&gt`;
                  
                  if(response.logo){
                      html += `&ltimg class="digitalwind-agency-img" src="${response.logo}" width="${response.widthOfImage}" style="margin: 0px auto;" alt="${response.altOfImage}" /&gt&lt/a&lt`;
                  }else{
                      html += "&lt/a&gt";
                  }
                  agencyDiv.innerHTML = html;
                  document.body.append(agencyDiv);
      });
      },%d);
  &lt/script&gt',admin_url('admin-ajax.php'), $delay);
  ?>
    </textarea>
    <button id="af_mrcat_copy">Copy</button>

</div>

</div>
