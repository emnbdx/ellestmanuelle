<?php
    class Config {
        // DB
        static $DBURL = getenv('DATABASE_HOST');
        static $DBNAME = getenv('DATABASE_NAME');
        static $DBUSER = getenv('DATABASE_USERNAME');
        static $DBPASSWORD = getenv('DATABASE_PASSWORD');
    
        // FILE
        static $UPLOADFOLDER = __DIR__ . "/images/uploads/";
        static $UPLOADMAXSIZE = 10000000;

        // MAIL
        static $MAIL_HOST = "ssl0.ovh.net";
        static $MAIL_PORT = 465;
        static $MAIL_LOGIN = "contact@ellestmanuelle.fr";
        static $MAIL_PASSWORD = getenv('MAIL_PASSWORD');

        // ADMIN
        static $ADMIN_USER = "emmanuelle";
        static $ADMIN_PASSWORD = getenv('ADMIN_PASSWORD');
    }
?>
