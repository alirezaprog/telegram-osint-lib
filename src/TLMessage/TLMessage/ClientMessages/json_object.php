<?php

declare(strict_types=1);

namespace TelegramOSINT\TLMessage\TLMessage\ClientMessages;

use TelegramOSINT\TLMessage\TLMessage\Packer;

/**
 * @see https://core.telegram.org/constructor/jsonObject
 */
class json_object extends json_value
{
    private const CONSTRUCTOR = 0x99c1d49d;

    /** @var json_object_value[] */
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function getName(): string
    {
        return 'jsonObject';
    }

    private function getElementGenerator(): callable
    {
        return function (json_object_value $item) {
            return $item->toBinary();
        };
    }

    public function toBinary(): string
    {
        return Packer::packConstructor(self::CONSTRUCTOR).
            Packer::packVector($this->values, $this->getElementGenerator());
    }
}
