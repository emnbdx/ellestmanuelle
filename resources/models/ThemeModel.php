<?php

    class Theme
    {
        public function __construct($data = null)
        {
            if (is_array($data)) {
                if (isset($data['id'])) $this->id = $data['id'];
                
                $this->name = $data['name'];
            }
        }

        public $id;
        public $name;
    }

?>