<?php

    class Theme
    {
        public function __construct($data = null)
        {
            if (is_array($data)) {
                if (isset($data['id'])) $this->id = $data['id'];
                
                $this->name = $data['name'];
                $this->nb = $data['nb'];
            }
        }

        public $id;
        public $name;
        public $nb;
    }

?>