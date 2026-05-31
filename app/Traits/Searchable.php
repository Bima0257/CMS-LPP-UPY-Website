<?php

namespace App\Traits;

use App\Helpers\SearchDateHelper;

trait Searchable
{
    public function scopeSearch($query, $keyword)
    {
        if (!$keyword) return $query;

        $keywordNormalized = preg_replace('/[\s\-_]+/', '', strtolower($keyword));

        // Tentukan kolom yang mau di-search
        $columns = ['title', $this->searchBody ?? 'content'];

        return $query->where(function ($q) use ($columns, $keyword, $keywordNormalized) {

            foreach ($columns as $col) {
                // Basic LIKE
                $q->orWhere($col, 'like', "%{$keyword}%");

                // Flexible search (hapus spasi, dash, underscore)
                $q->orWhereRaw("
                    REPLACE(REPLACE(REPLACE(LOWER($col), ' ', ''), '-', ''), '_', '') like ?
                ", ["%{$keywordNormalized}%"]);
            }

            // ===== DATE SEARCH =====
            $dateFilter = SearchDateHelper::detectDate($keyword);

            if ($dateFilter) {
                [$method, $value] = $dateFilter;

                // method = 'date' | 'month' | 'year'
                match ($method) {
                    'date'  => $q->orWhereDate('date', $value),
                    'month' => $q->orWhereMonth('date', $value),
                    'year'  => $q->orWhereYear('date', $value),
                    'month_year' => $q
                        ->orWhereMonth('date', $value['month'])
                        ->whereYear('date', $value['year']),
                };
            }
        });
    }
}
