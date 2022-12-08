<?php


class FnuggHandler
{
    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function handle_request(){
        $search = $this->params->get_param('s');
        $gt_url = "https://api.fnugg.no/search?q=".$search;
        $fields = "&sourceFields=name,description,images.image_16_9_s,conditions.forecast.last_updated,conditions.forecast.today.top.temperature.value,conditions.forecast.today.top.wind.mps,conditions.forecast.today.top.symbol.name,conditions.forecast.today.top.snow.depth_slope";
        $response = wp_remote_get($gt_url.$fields);
        $result = new WP_REST_Response($response, 200);
        // Set cache.
        $result->set_headers(array('Cache-Control' => 'max-age=3600'));
        return $result;
    }
}