<?php
declare(strict_types=1);

namespace Info;

class PhoneInfo extends BaseInfo
{
    /**
     * @inheritDoc
     */
    protected function getAdditionalInfo(): string
    {
        return "вбудована пам'ять: {$this->shopProduct->getMemory()}";
    }
}
