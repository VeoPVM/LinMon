<?php

class custom_mysqli extends mysqli {
    public function __construct($host, $user, $pass, $db, $compress) {
        parent::init();

        if ($compress == TRUE) {
            parent::real_connect($host, $user, $pass, $db, NULL, NULL, MYSQLI_CLIENT_COMPRESS);
        } else {
            parent::real_connect($host, $user, $pass, $db);
        }
    }

}
?>