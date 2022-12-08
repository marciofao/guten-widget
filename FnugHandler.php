<?php


class FnugHandler
{
    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function handle_request(){
        $search =$this->params->get_param('s');
        $gt_url = "https://api.fnugg.no/suggest/autocomplete/?q=".$search;
        $response = wp_remote_get($gt_url);
        $result = new WP_REST_Response($response, 200);
        // Set cache.
        $result->set_headers(array('Cache-Control' => 'max-age=3600'));
        return $result;
    }
}