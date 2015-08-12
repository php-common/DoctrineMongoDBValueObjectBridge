<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Date\DateTime;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine DateTime type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class DateTimeType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value)
    {
        return new \MongoDate($value->getTimestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function closureToMongo()
    {
        return '$return = $value->getTimestamp();';
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value)
    {
        return new DateTime('@' . $value->sec);
    }

    /**
     * {@inheritdoc}
     */
    public function closureToPHP()
    {
        return '$return = new \Common\ValueObject\Date\DateTime(\'@\' . $value->sec);';
    }
}