<?php 

function resort_now_render($content, $value){
    $block = resort_now_block_build($value );
   return  sprintf( "%s  %s ", $content,  $block  );

}

function resort_now_block_build($value){
    $endpoint = get_option('siteurl').'/wp-json/wp/v2/guten-widget?s=';
    $blockcontent = <<<EOD

    
    
    <div class="resort-now-block">
        <div class="rnb-title">
            title
        </div>
        <div class="rnb-image">
        
            <div class="rnb-desc">
                <p>
                    Last Updated 
                </p>
                <p class="rnb-date">
                --/--/--
                </p>
            </div>
        </div>
        <div class="rnb-details">
            <div class="rnb-side">
                <div class="rnb-weather">
                    <p class="dashicons dashicons-cloud"></p>
                    <p id="rnb-wheater-info"> clouds</p>
                </div>
                <div class="rnb-wind">
                <p class="dashicons dashicons-arrow-up-alt2"></p>
                <p id="rnb-wind">
                <span class="value"></span>
                <span>mps</span>
                </p>
                    
                </div>
            </div>
            <div class="rnb-side">
                <div class="rnb-temperature">
                    <span class="value"></span>
                    <span>°</span>
                </div>
                <div class="rnb-snow">
                <p class="dashicons dashicons-chart-line"></p>
                <p class="value">
                
                </p>
                    
                </div>
            </div>
        </div>
        
    </div>
    <script> 
    rnb_fetch('$value', '$endpoint')
    </script>
        
    
    EOD;

    return $blockcontent;
}

?>





