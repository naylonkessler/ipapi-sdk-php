<?php

namespace IpApi;

/**
 * Class Response.
 *
 * The abstraction of a response fetched from IpApi api.
 *
 * @package IpApi
 */
class Response implements \JsonSerializable
{
    /**
     * Response attributes collection.
     *
     * @var mixed[]
     */
    protected $attributes = [];

    /**
     * Creates a new response object and initializes its state.
     *
     * @param mixed[] $data
     */
    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

    /**
     * Fill the response with received key => values.
     *
     * @param mixed[] $attributes
     */
    protected function fill(array $attributes)
    {
        array_map(function ($value, $name) {
            $this->{$name} = $value;
        }, $attributes, array_keys($attributes));
    }

    /**
     * Returns the jsonable representation of object.
     *
     * @return mixed[]
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Converts the object to array.
     *
     * @return mixed[]
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Bridge getter to attributes.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    /**
     * Bridge setter to attributes.
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
}
