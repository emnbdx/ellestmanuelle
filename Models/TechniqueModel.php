<?php

namespace Models
{
    class TechniqueModel
    {
        public function __construct($data = null)
        {
            if (is_array($data)) {
                if (isset($data['id'])) $this->id = $data['id'];
                
                $this->kind = $data['kind'];
                $this->name = $data['name'];
                $this->name = $data['nb'];
            }
        }

        public $id;
        public $kind;
        public $name;
        public $nb;
    }
}

?>