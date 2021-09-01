<?php
$edit_content = "<div class=\"row\">
    <div class=\"col-md-8 offset-md-2\">
        <div class=\"main-card mb-3 card\">
            <form id=\"form-" . $controller_name . "-create\" method=\"POST\">
                <div class='card-body'>
                    <input type=\"hidden\" name=\"status\" id=\"status\" value=\"edit\">
                    <?= csrf(); ?>
                    <input type=\"hidden\" name=\"id\" id=\"id\" value=\"<?= encrypt_decrypt(\$" . $controller_name . "->id); ?>\">
                    <?= my_form_input('edit', \$" . $controller_name . "->title, '" . $controller_name . "_title', 'Title', 'Input " . $controller_name . " title'); ?>
                </div>
                <?= my_form_button('', '" . $module_name . "/" . $controller_name . "/'); ?>
            </form>
        </div>
    </div>
</div>";
