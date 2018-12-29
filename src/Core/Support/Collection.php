<?php
/**
 * Created by PhpStorm.
 * User: chenhong
 * Date: 18/12/29
 * Time: 下午1:01
 * @author chenhong <747825455@qq.com>
 */

namespace DuoDuoKe\Core\Support;

use ArrayAccess;
use Countable;
use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;
use Serializable;
use DuoDuoKe\Core\Contracts\Arrayable;
use Traversable;

class Collection implements  ArrayAccess, Countable, IteratorAggregate, JsonSerializable, Serializable, Arrayable
{
    /**
     * the collection data.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Collection constructor.
     *
     * @param array $items
     */
    public function __construct( array $items )
    {
        foreach ( $items as $key => $item ) {
            $this->set($key,$item);
        }
    }

    /**
     * Return all items.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->all();
    }

    /**
     * Retrieve an external iterator
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Whether a offset exists
     * @link  http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists( $offset )
    {
        return $this->has($offset);
    }

    /**
     * To determine Whether the specified element exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        return !is_null(Arr::get($this->items, $key));
    }


    /**
     * Offset to retrieve
     * @link  http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet( $offset )
    {
        return $this->offsetExists($offset) ? $this->get($offset) : null;
    }

    /**
     * Offset to set
     * @link  http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet( $offset , $value )
    {
        $this->set($offset, $value);
    }

    /**
     * Offset to unset
     * @link  http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset( $offset )
    {
        if ($this->offsetExists($offset)) {
            $this->forget($offset);
        }
    }

    /**
     * String representation of object
     * @link  http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize($this->items);
    }

    /**
     * Constructs the object
     * @link  http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function unserialize( $serialized )
    {
        return $this->items = unserialize($serialized);
    }

    /**
     * Count elements of an object
     * @link  http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return $this->items;
    }


    /**
     * Set the item value.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        Arr::set($this->items, $key, $value);
    }

    /**
     * Retrieve item from Collection.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Arr::get($this->items, $key, $default);
    }

    /**
     * Remove item form Collection.
     *
     * @param string $key
     */
    public function forget($key)
    {
        Arr::forget($this->items, $key);
    }

}