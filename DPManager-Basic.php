<?php

class DPManager {

    private static $recordSet;
    private static $row;
    private static $field;
    private static $affectedRows;
    private static $Insert_ID;
    private static $query;

    public static function buildDatosToUpdate($parModelo) {
        $lstCampos = array();
        foreach ($parModelo as $k => $field) {
            array_push($lstCampos, $k . ' = ' . $field);
        }

        return implode(",", $lstCampos);
    }

    public static function buildSelectQuery($fields, $table, $where = false
    , $groupBy = false, $orderBy = false, $order = false, $limit = false) {
        self::$query = 'SELECT ' . $fields . ' FROM ' . $table;
        if (isset($where) && $where != '')
            self::$query .= ' WHERE ' . $where;
        if (isset($groupBy) && $groupBy != '')
            self::$query .= ' GROUP BY ' . $groupBy;
        if (isset($orderBy) && $orderBy != '')
            self::$query .= ' ORDER BY ' . $orderBy;
        if (isset($order) && $order != '')
            self::$query .= ' ' . $order;
        if (isset($limit) && $limit != '')
            self::$query .= $limit;

        return self::$query;
    }

    public static function buildDeleteQuery($table, $where = false) {
        self::$query = 'DELETE FROM ' . $table;
        if (isset($where) && $where != '')
            self::$query .= ' WHERE ' . $where;
        return self::$query;
    }

    public static function buildInsertQuery($fields, $table) {
        self::$query = 'INSERT INTO ' . $table . ' ( ' . implode(',', array_keys($fields)) . ') VALUES (' . implode(",", array_values($fields)) . ')';
        return utf8_decode(self::$query);
    }

    public static function buildUpdateQuery($table, $fields, $where) {
        self::$query = 'UPDATE ' . $table . ' SET ' . $fields . ' WHERE ' . $where;
        return utf8_decode(self::$query);
    }

    public static function getAllRows($lobCon, $query) {
        self::$recordSet = $lobCon->Execute($query);

        return self::$recordSet;
    }

    public static function getRow($lobCon, $query) {
        self::$row = $lobCon->GetRow($query);
        return self::$row;
    }

    public static function getField($lobCon, $query) {
        self::$field = $lobCon->GetOne($query);
        return self::$field;
    }

    public static function insert($lobCon, $query) {

        if ($lobCon->Execute($query) === false) {
            return 0;
        } else {
            self::$Insert_ID = $lobCon->Insert_ID();
            return self::$Insert_ID;
        }
    }

    public static function update($lobCon, $query) {
        if ($lobCon->Execute($query) === false) {
            return 0;
        } else {
            self::$affectedRows = $lobCon->Affected_Rows();
            return self::$affectedRows;
        }
    }

    public static function delete($lobCon, $query) {

        if ($lobCon->Execute($query) === false) {
            return 0;
        } else {
            self::$affectedRows = $lobCon->Affected_Rows();
            return self::$affectedRows;
        }
    }

}
