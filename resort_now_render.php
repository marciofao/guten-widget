<?php 

function resort_now_render($content, $value){
    $block = resort_now_block_build($value );
   return  sprintf( "%s  %s ", $content,  $block  );

}

function resort_now_block_build($value){
    $blockcontent = <<<EOD

    
    <b>$value</b>
    
    
    EOD;

    return $blockcontent;
}

