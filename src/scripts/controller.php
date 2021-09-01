<?php
$controller_content = "<?php
defined('BASEPATH') or exit('No direct script access allowed');

class " . ucfirst($controller_name) . " extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        \$this->load->model([
            '" . $module_name . "/" . strtolower($controller_name) . "_model' => '" . strtolower($controller_name) . "_model'
        ]);
    }
}";
