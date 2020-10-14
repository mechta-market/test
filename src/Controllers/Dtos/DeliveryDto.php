<?php

namespace App\Controllers\Dtos;

class DeliveryDto
{
    /** @var string */
    public $type;

    /** @var string */
    public $city;

    /** @var double */
    public $price;

    /** @var bool */
    public $available;

    /**
     * DeliveryDto constructor.
     * @param string $type
     * @param string $city
     * @param float  $price
     * @param bool   $available
     */
    public function __construct(string $type, string $city, float $price, bool $available)
    {
        $this->type = $type;
        $this->city = $city;
        $this->price = $price;
        $this->available = $available;
    }

}
