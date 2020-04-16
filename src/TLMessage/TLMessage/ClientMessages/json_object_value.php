<?php

declare(strict_types=1);

namespace TelegramOSINT\TLMessage\TLMessage\ClientMessages;

use TelegramOSINT\TLMessage\TLMessage\Packer;
use TelegramOSINT\TLMessage\TLMessage\TLClientMessage;

/**
 * @see https://core.telegram.org/type/JSONObjectValue
 */
class json_object_value implements TLClientMessage
{
    private const CONSTRUCTOR = 0xc0de1bd9;

    /** @var string */
    private $key;
    /** @var json_value */
    private $value;

    public function __construct(string $key, json_value $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getName(): string
    {
        return 'jsonObjectValue';
    }

    public function toBinary(): string
    {
        return Packer::packConstructor(self::CONSTRUCTOR).
            Packer::packString($this->key).
            Packer::packBytes($this->value->toBinary());
    }
}
