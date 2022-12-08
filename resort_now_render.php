<?php 

function resort_now_render($content, $value){
    $block = resort_now_block_build($value );
   return  sprintf( "%s  %s ", $content,  $block  );

}

function resort_now_block_build($value){
    $blockcontent = <<<EOD

    
    <b>$value</b>
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
                <p id="rnb-wind">wind</p>
                    
                </div>
            </div>
            <div class="rnb-side">
                <div class="rnb-temperature">
                    23°
                </div>
                <div class="rnb-snow">
                <p class="dashicons dashicons-chart-line"></p>
                <p id="rnb-snow">
                snow
                </p>
                    
                </div>
            </div>
        </div>
        
    </div>
        
    
    EOD;

    return $blockcontent;
}

?>





