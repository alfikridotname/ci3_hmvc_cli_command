<?php
$config_content = "<?php

function config_validation(\$param)
{
    \$config = array(
        '' => array(
            array(
                'field' => '',
                'label' => '',
                'rules' => ''
            )
        )
    );

    return empty(\$config[\$param]) ? '' : \$config[\$param];
}";
