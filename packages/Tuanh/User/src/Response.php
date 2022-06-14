<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2/7/17
 * Time: 3:08 PM
 */
namespace Tuanh\User;

class Response{
    // MÃ LỖI CHUNG
    public static $errorArray=array(
        "code"=>"",
        "status"=>"error",
        "message"=>"Hệ thống đang bảo trì bạn vui lòng thử lại sau ít phút. Hoặc liên hệ nhân viên chăm sóc khách hàng để được hỗ trợ",
        "data"=>[],
    );
    // MÃ THÀNH CÔNG CHUNG
    public static $successArray=array(
        "code"=>"",
        "status"=>"success",
        "message"=>"Thành công",
        "data"=>[],
    );

    /** Hàm response
     * @param array $arrayResponse : array response được cấu hình trong model respnse
     * @param $message : nội dung
     * @param bool $die : true : response die | false : response ko die
     * @return array
     */
    public static function response(array $arrayResponse,$message='',$die=false, array $data = null){
        $response=$arrayResponse;
        if($message!="")$response['message']=$message;
        if($data)$response['data']=$data;
        if($die===true){
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
        return $response;
    }
}
