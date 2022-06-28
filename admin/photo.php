<?php

class Photo extends User {
    protected static $db_table = "photos";
    protected $table_cols = array("id", "book_id", "file");

    public $id;
    public $book_id;
    public $file;


    
    public static function validate_photo($file) {
        $allowed_image_extension  = array("png","jpg","jpeg");
         $fileEx = pathinfo($file["name"],PATHINFO_EXTENSION);
         if(in_array($fileEx, $allowed_image_extension)) {
            return true;
         }else{
            return false;;
         }
    }

   public  function upload_img($file)
   {
      $photo_quality = 60;
      $imgName = uniqid() . $file["name"];
      $uploadTo = 'C:\xampp\htdocs\bookreview\public\img\\';
      if (!is_dir($uploadTo)) {
         mkdir($$uploadTo);
      }
      $tempPath = $file["tmp_name"];
      $originalPath = $uploadTo . $imgName;
      if (self::compress_img($tempPath, $originalPath, $photo_quality)) {
         $this->file = $imgName;
      } else {
         echo "failed to upload img";
      }
   }


   private function compress_img($tempPath, $originalPath, $quality)
   {
      // Get image info 
      $imgInfo = getimagesize($tempPath);
      $mime = $imgInfo['mime'];

      // Create a new image from file 
      switch ($mime) {
         case 'image/jpeg':
            $image = imagecreatefromjpeg($tempPath);
            break;
         case 'image/png':
            $image = imagecreatefrompng($tempPath);
            break;
         case 'image/gif':
            $image = imagecreatefromgif($tempPath);
            break;
         default:
            $image = imagecreatefromjpeg($tempPath);
      }

      // Save image 
      if (imagejpeg($image, $originalPath, $quality)) {
         return true;
      } else {
         return false;
      }
   }

   public function img_src() {
      $src = "/bookreview/public/img/";
      return ((empty($this->file) || is_null($this->file)) ? "https://picsum.photos/seed/picsum/200" : $src .$this->file);
   }


}



?>