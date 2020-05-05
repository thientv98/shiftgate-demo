<?php

namespace App\Models\Traits;

trait TableModel {
    /**
	 * Static method to get table name of Model
	 * @return table name
	 */
	public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public static function isJoined($query, $table)
    {
        $joins = $query->getQuery()->joins;
        if($joins == null) {
            return false;
        }
        foreach ($joins as $join) {
            if ($join->table == $table) {
                return true;
            }
        }
        return false;
    }
}