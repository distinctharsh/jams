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

if (!function_exists('get_default_password')) {
    function get_default_password(): string
    {
        return 'jams@2026';
    }
}

if (!function_exists('get_default_password_hash')) {
    function get_default_password_hash(): string
    {
        return password_hash(get_default_password(), PASSWORD_DEFAULT);
    }
}