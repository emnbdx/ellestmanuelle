<?php
    
namespace Models
{
    class CreationModel
    {
        public function __construct($data = null)
        {
            if (is_array($data)) {
                if (isset($data['id'])) $this->id = $data['id'];
                
                $this->name = $data['name'];
                $this->description = $data['description'];
                $this->picture = $data['picture'];
                $this->picture2 = $data['picture2'];
            }
        }

        public $id;
        public $name;
        public $description;
        public $picture;
        public $picture2;
    }
}

?>