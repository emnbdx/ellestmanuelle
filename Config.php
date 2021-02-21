<?php
    class Config {
        // DB
        static $DBURL = "127.0.0.1";
        static $DBNAME = "ellestmanuelle";
        static $DBUSER = "root";
        static $DBPASSWORD = null;
    
        // FILE
        static $UPLOADFOLDER = __DIR__ . "/images/uploads/";
        static $UPLOADMAXSIZE = 5000000;

        // MAIL
        static $MAIL_HOST = "ssl0.ovh.net";
        static $MAIL_PORT = 465;
        static $MAIL_LOGIN = "contact@ellestmanuelle.fr";
        static $MAIL_PASSWORD = "";

        // ADMIN
        static $ADMIN_USER = "user";
        static $ADMIN_PASSWORD = "password";
    }
?>