<?php 
require_once '../Controller.php';
require_once '../AuthController.php';
require_once '../../model/Admin.php';
require_once '../../model/User.php';

class RegisterController extends AuthController{

    public function __construct($m)
    {
        $this->chechRoute($m);
    }

    public function chechRoute($m){
        switch($m){
            case 'admin' :
                $this->AuthAdmin();
            break;
            case 'user' :
                $this->AuthUser();
            
            break;
           
        }
    }

    public function AuthAdmin()
    {


        if(
            !is_null($this->dataReq()->name)&&
            !is_null($this->dataReq()->email)&&
            !is_null($this->dataReq()->password)
        ){
            $name = $this->dataReq()->name;
            $email = $this->dataReq()->email;
            $password = $this->dataReq()->password;
            $status = $_POST['status'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $token = trim($this->getToken());
            
            $admin = new Admin();
            $isSave = $admin->insert("name,email,password,status,title,description,token ",
            "$name,$email,$password,$status,$title,$description,$token");
            
            $this->api($isSave,[
                "name"=>$name,
                "email"=>$email,
                "status"=>$status,
                "title"=>$title,
                "description"=>$description,
                "token"=>$token
            ]);
            
        }else{
            print_r(json_encode(["msg"=>"All Input is reqierd (name , email , password )"]));
        }
    }

    public function AuthUser()
    {
        # code...
        if(
            !is_null($this->dataReq()->name)&&
            !is_null($this->dataReq()->email)&&
            !is_null($this->dataReq()->password)
            ){
                $name = $this->dataReq()->name;
                $email = $this->dataReq()->email;
                $password = $this->dataReq()->password;
                $token = trim($this->getToken());
                $user = new User();
                $isSave = $user->insert("name,email,password,token ",
                "$name,$email,$password,$token");
            
            $this->api($isSave,[
                "name"=>$name,
                "email"=>$email,
                "token"=>$token
            ]);
        }
      

    }


}

if(!empty($_GET['m'])){
    $method = $_GET['m'];
}else{
    throw new Exception("Bad Call Method Controller !");
}

// if(!empty($_GET['id'])){
//     $id = $_GET['id'];
// }else{
//     $id = null;
// }
new RegisterController($method);