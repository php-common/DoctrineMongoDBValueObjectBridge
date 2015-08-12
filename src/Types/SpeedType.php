<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Navigation\Speed;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine Speed type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class SpeedType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value)
    {
        return $value !== null ? $value->getValue() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToMongo()
    {
        return '$return = $value->getValue();';
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value)
    {
        return $value !== null ? new Speed((float) $value) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToPHP()
    {
        return '$return = new \Common\ValueObject\Navigation\Speed((float) $value);';
    }
}