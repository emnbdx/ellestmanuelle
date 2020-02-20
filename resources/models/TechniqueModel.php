<?php

    class Technique
    {
        public function __construct($data = null)
        {
            if (is_array($data)) {
                if (isset($data['id'])) $this->id = $data['id'];
                
                $this->kind = $data['kind'];
                $this->name = $data['name'];
            }
        }

        public $id;
        public $kind;
        public $name;
    }

?>