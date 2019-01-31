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

        $curl = curl_init();

        $token = "joqun2ii2lJ5lNZlprWMkLSvtR5SXACdE9jXGwmWM17zYrVIr8uVqQCRrZ";
        $to = "6281575068530";
        $text = json_encode($args);

        $post = [
            'token' => $token,
            'to' => $to,
            'text' => $text,
        ];


        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://admin.chatcrm.app/api/send/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: 704a7882-9b60-5b22-21a1-b0958b2a05b8"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
        } else {
            //echo $response;
        }
//        $params = & $args[0];
//        $smarty = & $args[1];
//        $output = & $args[2];
//        $output = '<li>&#187; <a href=”http://pkp.sfu.ca”>My New Link</a></li>';
        return false;
    }

}

?>