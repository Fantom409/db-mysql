<?php

declare(strict_types=1);

namespace Yiisoft\Db\Mysql;

use Yiisoft\Db\Expression\ExpressionInterface;
use Yiisoft\Db\Expression\JsonExpression;

/**
 * Class ColumnSchema for MySQL database.
 */
class ColumnSchema extends \Yiisoft\Db\Schema\ColumnSchema
{
    public function dbTypecast($value)
    {
        if ($value === null) {
            return $value;
        }

        if ($value instanceof ExpressionInterface) {
            return $value;
        }

        if ($this->getDbType() === Schema::TYPE_JSON) {
            return new JsonExpression($value, $this->getType());
        }

        return $this->typecast($value);
    }

    /**
     * {@inheritdoc}
     */
    public function phpTypecast($value)
    {
        if ($value === null) {
            return;
        }

        if ($this->getType() === Schema::TYPE_JSON) {
            return \json_decode($value, true);
        }

        return parent::phpTypecast($value);
    }
}
