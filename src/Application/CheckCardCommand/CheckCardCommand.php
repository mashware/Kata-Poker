<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 14:31
 */

namespace Kata\Application\CheckCardCommand;

use Assert\Assertion;
use Kata\Domain\Model\Card\TypeCard;

class CheckCardCommand
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
        Assertion::string($type);
        Assertion::integer($identifier);
        Assertion::true(TypeCard::isType($type));

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