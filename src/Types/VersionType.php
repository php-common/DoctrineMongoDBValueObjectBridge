<?php

namespace Common\ValueObject\Doctrine\ODM\MongoDB\Types;

use Common\ValueObject\Software\Version;
use Doctrine\ODM\MongoDB\Types\Type;

/**
 * Doctrine Version type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class VersionType extends Type
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
        return $value !== null ? Version::fromString($value) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function closureToPHP()
    {
        return '$return = \Common\ValueObject\Software\Version::fromString($value);';
    }
}