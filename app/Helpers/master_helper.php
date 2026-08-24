<?php

if (! function_exists('getMasterValue')) {
    function getMasterValue(
        string $table,
        $id,
        string $column = 'name',
        string $idColumn = 'id'
    ): string {
        if (empty($table) || empty($id)) {
            return '';
        }

        $db = \Config\Database::connect();

        $result = $db->table($table)
            ->select($column)
            ->where($idColumn, $id)
            ->get()
            ->getRowArray();

        return $result[$column] ?? '';
    }
}