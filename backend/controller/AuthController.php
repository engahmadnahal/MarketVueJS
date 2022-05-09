<?php 
header("Content-type: application/json");
header('Access-Control-Allow-Origin: *');
header('Accept: application/json');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token");
class AuthController{

    public function dataReq(){
        $dataRequset = json_decode(file_get_contents("php://input"));
        return $dataRequset;
    }

    public function api($status,$data){
        $array = [
            'status' => $status,
            'msg' => $status ? "Success Get Data" : "Error Get Data",
            'data' => $status ? $data : "Opss !"
        ];
        print_r(json_encode($array));
    }

    public function getToken()
    {
        $serial = "ABCDEFGKLMNOBQRSTUVWXYZabcdefghilavuwqmh[lcxno83/*2rrt123355468";
        $result = "";

        for($i = 0; $i < 30 ; $i++){
            $result .= $serial[rand(0,strlen($serial) - 1)];
        }
        return "eRt".$result."sTkl8R";
    }



    public function unAuth()
    {
        # code...
        $array = [
            'status' => false,
            'msg'=>"Un Authonticated this user",
        ];
        return print_r(json_encode($array));
    }

        public function errPassword()
    {
        # code...
        $array = [
            'status' => false,
            'msg'=>"Password is not correct !",
        ];
        return print_r(json_encode($array));
    }



        public function requiredInput()
    {
        # code...
        $array = [
            'status' => false,
            'msg'=>"Input All is requird !",
        ];
        return print_r(json_encode($array));
    }
}
