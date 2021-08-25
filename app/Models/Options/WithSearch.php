<?php

namespace App\Models\Options;

use Illuminate\Support\Facades\DB;

/**
 *
 */
trait WithSearch
{
    public static function search(?string $text)
    {
        if (empty($text)) return self::query();

        $fields         =   self::$searchFields;
        $text           =   strtoupper($text);
        $fieldsLength   =   count($fields) - 1;

        foreach ($fields as $index => $field) {

            $query = self::orWhere(DB::raw("upper({$field})"), 'like', "%{$text}%");
            // nếu row > 0 hoặc vòng for cuối thì trả về $query
            if ($query->count() || $index === $fieldsLength) return $query;
        }
    }
}
