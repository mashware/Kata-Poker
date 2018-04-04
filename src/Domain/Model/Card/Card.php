<?php
namespace Kata\Domain\Model\Card;

use Assert\Assertion;

class Card
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $identifier;

    /**
     * Card constructor.
     * @param string $type
     * @param int $identifier
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function __construct(string $type, int $identifier)
    {
        $this->type = $type;
        $this->identifier = $identifier;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getIdentifier():int
    {
        return $this->identifier;
    }
}
