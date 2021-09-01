<?php
$api_content = "<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class " . ucfirst($controller_name) . " extends REST_Controller
{
    function __construct()
    {
        parent::__construct();

        \$this->methods['method_anda']['limit'] = 500;
    }

    public function method_anda_get()
    {
        \$this->response([
            'status' => FALSE,
            'message' => 'No users were found'
        ], REST_Controller::HTTP_NOT_FOUND);
    }
}";
