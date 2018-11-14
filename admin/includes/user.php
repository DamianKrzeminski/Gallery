<?php
class User extends Db_obejct{
    
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'email', 'first_name', 'last_name', 'user_image', 'role');
    public $id;
    public $username;
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $user_image;
    public $role;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";
    
    public function verifyUser($username, $password){
        global $database;
        $username = $database->escapeString($username);
        $password = $database->escapeString($password);
        
        $found_username = $database->query("SELECT * FROM " . self::$db_table . " WHERE username = '$username' LIMIT 1");
        if(!empty($found_username)){
            while($row = mysqli_fetch_array($found_username)){
                
                $db_user_password = $row['password'];
                $id = $row['id'];
            }
            if(password_verify($password, $db_user_password)){
                return $id;
            }else{
                return -1;
            }
        }else{
            return -1;
        }
    }
    
    public function imagePathAndPlaceholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }
    
     public function uploadPhoto(){
        if(!empty($this->errors)){
            return false;
        }
        if(empty($this->user_image) || empty($this->tmp_path)){
            $this->errors[] = "The file was not avaliable";
            return false;
        }
        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
        if(file_exists($target_path)){
            $this->errors[] = "The file {$this->user_image} already exists";
            return false;
        }
        if(move_uploaded_file($this->tmp_path, $target_path)){
            unset($this->tmp_path);
            return true;
        }else{
            $this->errors[] = "The file directory probably does not have permission";
            return false;
        }
        $this->create();
    }
    
    public function ajaxSaveUserImage($user_image, $user_id){
        global $database;
        $user_image = $database->escapeString($user_image);
        $user_id = $database->escapeString($user_id);
        $this->user_image = $user_image;
        $this->id = $user_id;
        $sql = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' ";
        $sql .= "WHERE id={$this->id}";
        $update_image = $database->query($sql);
        echo $this->imagePathAndPlaceholder();
    }
    
    public function delete_photo(){
        if($this->delete()){
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;;
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }
    }
}
?>