<?php
$create_content = "<div class=\"row\">
    <div class=\"col-md-8 offset-md-2\">
        <div class=\"main-card mb-3 card\">
            <form id=\"form-" . $controller_name . "-create\" method=\"POST\">
                <div class='card-body'>
                    <input type=\"hidden\" name=\"status\" id=\"status\" value=\"add\">
                    <?= csrf(); ?>
                    <?= my_form_input('add', '', 'name dari input', 'Title input', 'placeholder'); ?>
                </div>
                <?= my_form_button('Store', '" . $module_name . "/" . $controller_name . "/'); ?>
            </form>
        </div>
    </div>
</div>";
