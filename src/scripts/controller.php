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

    public function index()
    {
        \$this->template('Master " . ucfirst($controller_name) . "', '" . $controller_name . "/index');
    }

    public function create()
    {
        \$data = [
        ];

        \$this->template('Create " . ucfirst($controller_name) . "', '" . $controller_name . "/create', \$data);
    }

    public function store()
    {
        if (!\$this->input->is_ajax_request()) :
            show_404();
        else :
            \$this->proses_validation('save');
        endif;
    }

    public function save_proses()
    {
        \$proses = \$this->" . $controller_name . "_model->save();
        if (\$proses) :
            \$this->results = [
                'code'       => 200,
                'messages'   => [
                    'Success' => 'Data berhasil disimpan'
                ]
            ];
        endif;
    }

    public function table()
    {
        if (!\$this->input->is_ajax_request()) :
            show_404();
        else :
            \$lists = \$this->" . $controller_name . "_model->get_datatables();
            echo json_encode(\$lists);
        endif;
    }

    public function edit(\$id)
    {
        \$data = [
        ];

        \$this->template('Edit " . ucfirst($controller_name) . "', '" . $controller_name . "/edit', \$data);
    }

    public function update()
    {
        if (!\$this->input->is_ajax_request()) :
            show_404();
        else :
            \$this->proses_validation('update');
        endif;
    }

    public function update_proses()
    {
        \$proses = \$this->" . $controller_name . "_model->update();
        if (\$proses) :
            \$this->results = [
                'code'       => 200,
                'message'    => [
                    'Success' => 'Data berhasil diupdate'
                ]
            ];
        endif;
    }

    public function destroy(\$id)
    {
        \$proses = \$this->" . $controller_name . "_model->delete(\$id);
        if (\$proses) :
            redirect('" . $module_name . "/" . $controller_name . "');
        endif;
    }
}";
