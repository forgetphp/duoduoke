<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/28
 * Time: 下午4:43
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Exception;


class RuntimeException extends \Exception
{
    /**
     * @method string errorMessage()
     * @return string
     */
    public function errorMessage(){
        return $this->getMessage();
    }
}