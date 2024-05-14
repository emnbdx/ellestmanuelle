<?php
    class Config {
        private static $_instance = null;

        // DB
        public $DBURL;
        public $DBNAME;
        public $DBUSER;
        public $DBPASSWORD;
    
        // FILE
        public $UPLOADFOLDER;
        public $UPLOADMAXSIZE;

        // MAIL
        public $MAIL_HOST;
        public $MAIL_PORT;
        public $MAIL_LOGIN;
        public $MAIL_PASSWORD;

        // ADMIN
        public $ADMIN_USER;
        public $ADMIN_PASSWORD;
        
        private function __construct()
        {
            $this->DBURL = getenv('DATABASE_HOST');
            $this->DBNAME = getenv('DATABASE_NAME');
            $this->DBUSER = getenv('DATABASE_USERNAME');
            $this->DBPASSWORD = getenv('DATABASE_PASSWORD');
            
            $this->UPLOADFOLDER = __DIR__ . "/images/uploads/";
            $this->UPLOADMAXSIZE = 10000000;
            
            $this->MAIL_HOST = "ssl0.ovh.net";
            $this->MAIL_PORT = 465;
            $this->MAIL_LOGIN = "contact@ellestmanuelle.fr";
            $this->MAIL_PASSWORD = getenv('MAIL_PASSWORD');
            
            $this->ADMIN_USER = "emmanuelle";
            $this->ADMIN_PASSWORD = getenv('ADMIN_PASSWORD');
        }

        public static function getInstance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new Config();
            }
    
            return self::$_instance;
        }
    }
?>
