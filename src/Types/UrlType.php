<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Internet\Url;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine URL type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class UrlType extends Type
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
        return $value !== null ? Url::fromString($value) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToPHP()
    {
        return '$return = \Common\ValueObject\Internet\Url::fromString($value);';
    }
}