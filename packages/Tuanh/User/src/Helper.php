<?php
namespace Tuanh\User;

use Tuanh\User\Model\Menu;

class Helper{
    /** Cổng thực hiện chức năng
     * @param $action
     * @param array $data
     * @return array
     */
    public static $html = '';
    public function __construct()
    {
        $this->html = '';
    }

    public static function gateWayAction($action,array $data = null, $id = ''){
        switch ($action){
            case 'test':
                return self::test($data);
            case 'menuRecusiveAdd':
                return self::menuRecusiveAdd();
            case 'menuRecusiveEdit':
                return self::menuRecusiveEdit($id);
            default:
                $message="action không hợp lệ";
                return Response::response(Response::$successArray,$message);
        }
    }

    private static function test(array $data){
        return Response::response(Response::$successArray,'thành công');
    }
    private static function menuRecusiveAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            self::$html .= '<option value="' 
                        . $dataItem->id 
                        . '">' 
                        . $subMark 
                        . $dataItem->name 
                        . '</option>';
            self::menuRecusiveAdd($dataItem->id, $subMark . '-- ');
        }
        return self::$html;
    } 
    private static function menuRecusiveEdit($id, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if ($id == $dataItem->id) {
                self::$html .= '<option selected value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            } else {
                self::$html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            }
            self::menuRecusiveEdit($id, $dataItem->id, $subMark . '-- ');
        }
        return self::$html;
    } 

}
