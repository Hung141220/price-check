<?php
namespace Tuanh\Asset;

use Tuanh\User\Response;

class Helper{
    /** Cổng thực hiện chức năng
     * @param $action
     * @param array $data
     * @return array
     */
    public static function gateWayAction($action,array $data){
        switch ($action){
            case 'test':
                return self::test($data);
            default:
                $message="action không hợp lệ";
                return Response::response(Response::$successArray,$message);
        }
    }

    private static function test(array $data){
        return Response::response(Response::$successArray,'thành công');
    }
}
