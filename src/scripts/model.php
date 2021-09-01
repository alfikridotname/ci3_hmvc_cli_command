<?php
$model_content = "<?php
defined('BASEPATH') or exit('No direct script access allowed');

class " . ucfirst($model_name) . " extends MY_Model
{
    public \$table = '';
    public \$column = [
        'col' => [

        ]
    ];
    public \$column_order = [];
    public \$column_search = [];
    public \$order = [];
    public \$edit_url = '" . $module_name . "/" . $controller_name . "/edit';
    public \$delete_url = '" . $module_name . "/" . $controller_name . "/destroy';

    public function set_datatable()
    {
        \$this->db->select(\"\")
            ->from(\$this->table);
    }

    public function detail(\$id)
    {
        \$data = \$this->db->get_where(\$this->table, [
            'id' => encrypt_decrypt(\$id, 'D')
        ]);

        if (\$data->num_rows() > 0) :
            return \$data->row();
        endif;

        redirect('" . $module_name . "/" . $controller_name . "');
    }

    public function save()
    {
        \$data = [
        ];

        \$this->db->insert(\$this->table, \$data);
        return \$this->db->affected_rows();
    }

    public function update()
    {
        \$primary = [
            'id' => encrypt_decrypt(post('id'), 'D')
        ];

        \$data    = [
        ];

        \$this->db->update(\$this->table, \$data, \$primary);
        return \$this->db->affected_rows();
    }

    public function delete(\$id)
    {
        \$proses = \$this->db->delete(\$this->table, [
            'id' => encrypt_decrypt(\$id, 'D')
        ]);

        if (!\$proses) :
            return \$this->db->error()['code'];
        endif;

        return \$this->db->affected_rows();
    }
}";
