<?php
$index_content = "<div class=\"main-card mb-2 card\">
    <div class=\"card-body\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"<?= site_url('" . $module_name . "/" . $controller_name . "/create'); ?>\" class=\"mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-primary\">
                    <i class=\"pe-7s-tools\"> </i>
                    Tambah Data
                </a>
            </div>
        </div>

    </div>
</div>
<div class=\"main-card mb-3 card\">
    <div class=\"card-body\">
        <?= csrf(); ?>
        <table style=\"width: 100%;\" id=\"table-" . $controller_name . "\" class=\"table table-hover table-striped table-bordered\">
            <thead>
                <tr>
                    <th>No</th>
                </tr>
            </thead>
        </table>
    </div>
</div>";
