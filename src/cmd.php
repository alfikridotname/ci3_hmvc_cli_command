<?php

/**
 * author : Alfikri
 * primary e-mail   : alfikri.name@gmail.com
 * secondary e-mail : klinik.code@gmail.com
 * blog             : https://klinikcode.com
 * description      : CodeIgniter 3 HMVC CLI Command
 */

namespace alfikridotname\ci3_hmvc_cli_command;

class Cmd
{
    public $results = [
        'status'  => false,
        'message' => ''
    ];

    public $color = [
        'hijau' => "\e[38;5;82m",
        'putih' => "\e[39m"
    ];

    public function index()
    {
        echo "@author alfikri <alfikri.name@gmail.com><https://klinikcode.com>\n";
        echo "{$this->color['hijau']}Welcome to CI3 HMVC CLI Command\n\n";
        echo "{$this->color['hijau']}HMVC Modular\n";
        echo "  {$this->color['putih']}module module_name\tMake Module\n";
    }

    public function create_module($module_name)
    {
        $current_dir = getcwd() . '/modules/';
        if (!$this->folder_exist($current_dir)) {
            mkdir($current_dir, 0700, true);
        }

        chdir($current_dir);
        if (FALSE !== ($current_dir = $this->folder_exist($module_name))) {
            exit("Module {$this->color['hijau']}{$module_name} {$this->color['putih']}exist !");
        } else {
            $make_dir = mkdir("./" . strtolower($module_name), 0700, true);
            if ($make_dir) {
                chdir($module_name);
                mkdir("./configs", 0700, true);
                mkdir("./controllers", 0700, true);
                mkdir("./models", 0700, true);
                mkdir("./views", 0700, true);
                return true;
            }
        }
    }

    protected function folder_exist($folder)
    {
        $path = realpath($folder);
        return ($path !== false and is_dir($path)) ? $path : false;
    }

    function dd($var)
    {
        echo "<pre style='background-color:black;color:white'>";
        print_r($var);
        echo "</pre>";
        die();
    }

    public function create_module_component($module_name, $name, $type = 'web')
    {
        $controller_name = $name;
        $model_name = $name . '_model';
        $curdir = getcwd();
        chdir($curdir . '/configs');
        $file_config = fopen(ucfirst($controller_name) . ".php", "w");
        require_once(__DIR__ . "/scripts/config.php");
        fwrite($file_config, $config_content);
        fclose($file_config);

        if ($type == 'API') :
            chdir($curdir . '/controllers');
            $file_api = fopen(ucfirst($controller_name) . ".php", "w");
            require_once(__DIR__ . "/scripts/api.php");
            fwrite($file_api, $api_content);
            fclose($file_api);

            chdir($curdir . '/models');
            $file_model = fopen(ucfirst($model_name) . ".php", "w");
            require_once(__DIR__ . "/scripts/model_api.php");
            fwrite($file_model, $model_api_content);
            fclose($file_model);
        else :
            chdir($curdir . '/controllers');
            $file_controller = fopen(ucfirst($controller_name) . ".php", "w");
            require_once(__DIR__ . "/scripts/controller.php");
            fwrite($file_controller, $controller_content);
            fclose($file_controller);
            chdir($curdir . '/views');
            mkdir("./" . $controller_name, 0700, true);
            chdir($curdir . "/views/" . $controller_name);
            $file_css = fopen("css.php", "w");
            $file_js = fopen("js.php", "w");
            $file_index = fopen("index.php", "w");
            $file_modal = fopen("modal.php", "w");
            require_once(__DIR__ . "/scripts/css.php");
            require_once(__DIR__ . "/scripts/js.php");
            require_once(__DIR__ . "/scripts/index.php");
            require_once(__DIR__ . "/scripts/modal.php");
            fwrite($file_css, $css_content);
            fwrite($file_js, $js_content);
            fwrite($file_index, $index_content);
            fwrite($file_modal, "");
            fclose($file_css);
            fclose($file_js);
            fclose($file_index);
            fclose($file_modal);

            chdir($curdir . '/models');
            $file_model = fopen(ucfirst($model_name) . ".php", "w");
            require_once(__DIR__ . "/scripts/model.php");
            fwrite($file_model, $model_content);
            fclose($file_model);
        endif;

        return true;
    }
}
