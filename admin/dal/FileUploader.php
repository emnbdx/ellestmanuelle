<?php

    include_once("../../config.php");

    class FileUploader
    {
    
        private $file;
        private $target_file;
        private $imageFileType;

        public function __construct($file)
        {
            $this->file = $file;
            $this->target_file = Config::$UPLOADFOLDER . basename($this->file["name"]);
            $this->imageFileType = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
        }

        public function upload()
        {
            $uploadOk = 1;
            
            // Check if image file is a actual image or fake image
            $check = getimagesize($this->file["tmp_name"]);
            if($check === false)
            {
                return "File is not an image.";
                $uploadOk = 0;
            }
            
            // Check if file already exists
            if (file_exists($this->target_file))
            {
                return "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($this->file["size"] > Config::$UPLOADMAXSIZE)
            {
                return "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($this->imageFileType != "jpg" && 
                $this->imageFileType != "png" && 
                $this->imageFileType != "jpeg" &&
                $this->imageFileType != "gif" )
            {
                return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                return "Sorry, your file was not uploaded.";
            
            }
            else // if everything is ok, try to upload file
            {
                echo "move ".$this->file["tmp_name"]." to ".$this->target_file;
                if (move_uploaded_file($this->file["tmp_name"], $this->target_file))
                {
                    return "";
                }
                else
                {
                    return "Sorry, there was an error uploading your file.";
                }
            }
        }    
    }
    
?>