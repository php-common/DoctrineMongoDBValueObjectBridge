<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Navigation\Direction;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine Direction type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class DirectionType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value)
    {
        return $value !== null ? $value->getAngle() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToMongo()
    {
        return '$return = $value->getAngle();';
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value)
    {
        return $value !== null ? new Direction((float) $value) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToPHP()
    {
        return '$return = new \Common\ValueObject\Navigation\Direction((float) $value);';
    }
}