<?php

namespace application\lib;
class Tpl {
    function __construct() {
        global $config, $tpl_dir;
        $tpl_dir = 'application/views/layouts/';
    }

    function load($a_file) {
        debug($a_file);
        global $a_cur_file, $a_tpl_dir;
        $file = $a_tpl_dir.$a_file;
        if(isset($file)) {
            ///debug($file);
            $_tplf = fopen($file, 'r');
            if ($_tplf) {
                while (!feof($_tplf)) {
                    $a_cur_file .= fgets($_tplf, 100);
                }
                fclose($_tplf);
            } else {
                die('<br>Шаблон не найден!<br>');
            }
        }
    }


    function set($tag, $target) {
        global $a_cur_file;
        $a_cur_file = str_replace($tag, $target, $a_cur_file);
    }

    function loadnset($file_tag, $a_pl_file) {
        global $a_cur_file, $a_tpl_dir;
        $file = $a_tpl_dir.$a_pl_file;
        if(isset($file)) {
            $_tplf = fopen($file, 'r');
            if ($_tplf) {
                while (!feof($_tplf)) {
                    $a_add_file .= fgets($_tplf, 100);
                }
                fclose($_tplf);
            } else {
                die('<br>Шаблон не найден!<br>');
            }
        }
        $a_cur_file = str_replace($file_tag, $a_add_file, $a_cur_file);
    }

    function get() {
        global $a_cur_file;
        return $a_cur_file;
    }

}