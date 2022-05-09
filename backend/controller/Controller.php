<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token");
abstract Class Controller{

    abstract public function chechRoute($m,$id = null);
    abstract public function index();
    abstract public function show($id);
    abstract public function store();
    abstract public function update($id);
    abstract public function delete($id);

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

    public function uploadFile($inputName)
    {
        # code...
        $target_dir = '../../media/';
        $target_file = $target_dir . time() .basename($_FILES[$inputName]["name"]);
        $isUpload = move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file);
        return [
            'name' => 'media/'. time() .basename($_FILES[$inputName]["name"]),
            'status' => $isUpload
        ];
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