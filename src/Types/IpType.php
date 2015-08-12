<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Internet\Ip;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine IP type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class IpType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value)
    {
        return $value !== null ? (string) $value : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToMongo()
    {
        return '$return = (string) $value;';
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value)
    {
        return $value !== null ? Ip::fromString($value) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToPHP()
    {
        return '$return = \Common\ValueObject\Internet\Ip::fromString($value);';
    }
}