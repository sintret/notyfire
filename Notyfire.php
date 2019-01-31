<?php

import('classes.plugins.GenericPlugin');

class Notifire extends GenericPlugin {

    function register($category, $path) {
        if (parent::register($category, $path)) {
            HookRegistry::register(
                    'Mail::​send', array(&$this, 'callback')
            );
            return true;
        }
        return false;
    }

    function getName() {
        return 'Notifire';
    }

    function getDisplayName() {
        return 'Notifire Plugin';
    }

    function getDescription() {
        return 'A Notifire of this plugin';
    }

    /*
     * &$mail, &$recipients, &$subject, &$mailBody, &$headers, &$additionalParameters
     */
    function callback($hookName, $args) {
//        $params = & $args[0];
//        $smarty = & $args[1];
//        $output = & $args[2];
//        $output = '<li>&#187; <a href=”http://pkp.sfu.ca”>My New Link</a></li>';
        return false;
    }

}

?>