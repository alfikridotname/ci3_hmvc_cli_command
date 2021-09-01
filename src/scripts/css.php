<?php
$css_content = "<!-- Datatable -->
<link rel=\"stylesheet\" href=\"<?= assets('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>\">
<link rel=\"stylesheet\" href=\"<?= assets('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>\">
<!-- Select 2 -->
<link rel=\"stylesheet\" href=\"<?= assets('plugins/select2/css/select2.min.css'); ?>\">
<link rel=\"stylesheet\" href=\"<?= assets('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>\">
<!-- Style -->
<style>
    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        padding-left: 8px;
        padding-right: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding-top: -11px;
        margin-top: -11px;
    }

    .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow {
        position: absolute;
        top: -7%;
        right: 3px;
        width: 20px;
    }
</style>";
