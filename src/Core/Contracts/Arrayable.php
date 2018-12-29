<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午1:05
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Contracts;
use ArrayAccess;

interface Arrayable extends ArrayAccess
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}