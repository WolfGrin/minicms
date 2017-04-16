<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 27.03.2017
 * Time: 23:35
 */
class main extends ACore
{
    public function get_content() {

        $result = $this->m->get_main_content();
        return $result;

    }
}
