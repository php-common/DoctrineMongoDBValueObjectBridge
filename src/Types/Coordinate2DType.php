<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Navigation\Coordinate2D;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine Coordinate2D type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class Coordinate2DType extends Type
{
    /**
     * @param Coordinate2D $value
     *
     * @return array|null
     */
    public function convertToDatabaseValue($value)
    {
        return $value !== null ? (object) ['x' => $value->getLongitude(), 'y' => $value->getLatitude()] : null;
    }

    public function closureToMongo()
    {
        return '$return = (object) [\'x\' => $value->getLongitude(), \'y\' => $value->getLatitude()];';
    }

    public function convertToPHPValue($value)
    {
        return $value !== null ? new Coordinate2D($value['y'], $value['x']) : null;
    }

    public function closureToPHP()
    {
        return '$return = new \Common\ValueObject\Navigation\Coordinate2D($value[\'y\'], $value[\'x\']);';
    }
}