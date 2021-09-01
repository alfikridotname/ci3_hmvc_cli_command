<?php
$js_content = "<!-- DataTables -->
<script src=\"<?= assets('plugins/datatables/jquery.dataTables.min.js'); ?>\"></script>
<script src=\"<?= assets('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>\"></script>
<script src=\"<?= assets('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>\"></script>
<script src=\"<?= assets('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>\"></script>
<!-- Select2 -->
<script src=\"<?= assets('plugins/select2/js/select2.full.min.js'); ?>\"></script>
<!-- JQuery Validation -->
<script src=\"<?= assets('plugins/jquery-validation/jquery.validate.min.js'); ?>\"></script>
<script src=\"<?= assets('plugins/jquery-validation/additional-methods.min.js'); ?>\"></script>
<script src=\"<?= assets('app/js/jquery.validation.config.js'); ?>\"></script>
<script src=\"<?= assets('app/js/rules.js'); ?>\"></script>
<!-- blockUI -->
<script src=\"<?= assets('plugins/blockUI/js/jquery.blockUI.js'); ?>\"></script>
<script src=\"<?= assets('app/js/jquery.blockUI.config.js'); ?>\"></script>
<!-- Sweet Alert -->
<script src=\"<?= assets('plugins/sweetalert/sweetalert.min.js'); ?>\"></script>
<script>
    const formActive = '';
    const tableId = '';
    const status = $('#status').val();
    const actionUrl = status == 'add' ? baseUrl('" . $module_name . "/" . $controller_name . "/store') : baseUrl('" . $module_name . "/" . $controller_name . "/update');

    showSelect('', '', 0);

    const table = $(tableId).DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        stateSave: false,
        filter: true,
        ajax: {
            url: baseUrl('" . $module_name . "/" . $controller_name . "/table/'),
            type: \"POST\",
            data: {
                \"csrf_token_app\": $('input[name=csrf_token_app]').val()
            },
            data: function(data) {
                data.csrf_token_app = $('input[name=csrf_token_app]').val();
            },
            dataSrc: function(response) {
                $('input[name=csrf_token_app]').val(response.csrf_token_app);
                return response.data;
            }
        },
        columnDefs: [{
            targets: ['all'],
            orderable: false,
        }, {
            width: \"1%\",
            targets: [],
        }, {
            className: \"text-center\",
            targets: []
        }, {
            className: \"text-nowrap\",
            targets: [],
        }]
    });

    datatableFilter(table);

    $(formActive).validate({
        rules: status == 'add' ? " . $module_name . ucfirst($controller_name) . "Create : " . $module_name . ucfirst($controller_name) . "Edit,
        submitHandler: function(form, event) {
            event.preventDefault();
            showBlockUI(formActive);
            let formData = new FormData(form);

            $.ajax({
                url: actionUrl,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                data: formData,
                success: function(res) {
                    window.location.href = baseUrl('" . $module_name . "/" . $controller_name . "');
                },
                error: function(xhr, status, error) {}
            });
        },
        invalidHandler: function(event, validator) {
            let errors = validator.numberOfInvalids();
            if (errors > 0) {
                showNotif('danger', 'fa fa-question-circle', 'Maaf, formulir belum lengkap !');
            }
        }
    });
</script>";
