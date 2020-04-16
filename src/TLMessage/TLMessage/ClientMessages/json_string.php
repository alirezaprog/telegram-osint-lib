<?php

declare(strict_types=1);

namespace TelegramOSINT\TLMessage\TLMessage\ClientMessages;

use TelegramOSINT\TLMessage\TLMessage\Packer;

/**
 * @see https://core.telegram.org/constructor/jsonString
 */
class json_string extends json_value
{
    private const CONSTRUCTOR = 0xb71e767a;

    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getName(): string
    {
        return 'jsonString';
    }

    public function toBinary(): string
    {
        return Packer::packConstructor(self::CONSTRUCTOR).
            Packer::packString($this->value);
    }
}
