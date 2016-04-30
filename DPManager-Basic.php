<?php

/**
 * DropsizeMVCf - extension of the SlimFramework and others tools
 *
 * @author      Isaac Trenado <isaac.trenado@codigolimpio.com>
 * @copyright   2013 Isaac Trenado
 * @link        http://dropsize.codigolimpio.com
 * @license     http://dropsize.codigolimpio.com/license.txt
 * @version     3.0.1
 * @package     DropsizeMVCf
 *
 * DropsizeMVCf - Web publishing software
 * Copyright 2015 by the contributors
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * This program incorporates work covered by the following copyright and
 * permission notices:
 * 
 * DropsizeMVCf is (c) 2013, 2015 
 * Isaac Trenado - isaac.trenado@codigolimpio.com -
 * http://www.codigolimpio.com
 * 
 * Wherever third party code has been used, credit has been given in the code's comments.
 *
 * DropsizeMVCf is released under the GPL
 * 
 */

/**
 * Manejador de Querys, Construye querys a partir de parametros
 * 
 * @package com.dropsizemvcf
 * @author  Isaac Trenado
 * @since   1.0.0
 */
class DPManager {

    private static $recordSet;
    private static $row;
    private static $field;
    private static $affectedRows;
    private static $Insert_ID;
    private static $query;
    private static $rows;
    private static $iteratorMode = array("object" => "self::iteraObject"
        , "array" => "self::iteraArray");
    
    /**
     * 
     * @param object $object arreglo dimensional
     * @param string $function metodo estatico
     * @return array
     */

    private static function iteraObject($object, $function) {

        $regreso = array();
        if ($object->EOF) {
            while (!$object->EOF) {
                $v = $object->fields;
                if (is_callable($function))
                    $result = call_user_func_array($function, $v);
                else
                    $result = $v;

                array_push($regreso, $result);
            }
        }
        return $regreso;
    }
    
    /**
     * 
     * @param array $object arreglo dimensional
     * @param string $function metodo estatico
     * @return array
     */

    private static function iteraArray($object, $function) {
        
        $regreso = array();
        foreach ($object as $v) {
            if (is_callable($function))
                $result = call_user_func_array($function, $v);
            else
                $result = $v;

            array_push($regreso, $result);
        }

        return $regreso;
    }

    /**
     * Metodo encargado de iterar un recordsetDADO aplicando metodo dado
     * 
     * @param object $object recordset
     * @param function $function
     * @return array
     */
    public static function iteraRecord($object, $function) {

        $regreso = array();

        $tipo = gettype($object);

        if (array_key_exists($tipo, self::$iteratorMode)) {
            $iterator = self::$iteratorMode[$tipo];
            $regreso = call_user_func_array($iterator, array($object, $function));
        }

        return $regreso;
    }

    /**
     * Metodo encargado de construir la relación campo = valor para un SET
     * 
     * @param array $parModelo Contiene la información del modelo, index, alias, etc
     * @return type
     */
    public static function buildDatosToUpdate($parModelo) {
        $lstCampos = array();
        foreach ($parModelo as $k => $field) {
            array_push($lstCampos, $k . ' = ' . $field);
        }

        return implode(",", $lstCampos);
    }

    /**
     * Metodo encargado de armar consultas tipo SELECT
     * 
     * @param string $fields campos a consultar
     * @param string $table nombre de las tabla(s)
     * @param string $where condición puede contener OR AND HAVE, etc
     * @param string $groupBy si la consulta requiere agrupación
     * @param string $orderBy ordenamiento por campos
     * @param string $order ASC, DESC
     * @param string $limit si es requerido limitar la consulta 0,10
     * 
     * @return string consulta armada según para parametros 
     */
    public static function buildSelectQuery($fields, $table, $where = ''
    , $groupBy = '', $orderBy = '', $order = '', $limit = '') {
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

    /**
     * Metodo devuelve la cadena de eliminación
     * 
     * @param string $table Nombre de la tabla afectada
     * @param string $where Condición para eliminar
     * @return string query DELETE FROM
     */
    public static function buildDeleteQuery($table, $where = false) {
        self::$query = 'DELETE FROM ' . $table;
        if (isset($where) && $where != '')
            self::$query .= ' WHERE ' . $where;
        return self::$query;
    }

    /**
     * Metodo encargado a generar la cadena INSERT
     * 
     * @param array $arFields campos
     * @param string $table
     * @return string
     */
    public static function buildInsertQuery($arFields, $table) {
        self::$query = 'INSERT INTO ' . $table . ' ( '
                . implode(',', array_keys($arFields)) . ') VALUES ('
                . implode(",", array_values($arFields)) . ')';
        return utf8_decode(self::$query);
    }

    /**
     * Metodo encargado de generar la cadena de Actualización UPDATE
     * 
     * @param string $table Tabla afectar
     * @param string $fields campos en composición campo = valor
     * @param string $where condición para afectar
     * @return string
     */
    public static function buildUpdateQuery($table, $fields, $where) {
        self::$query = 'UPDATE ' . $table . ' SET ' . $fields
                . ' WHERE ' . $where;
        return utf8_decode(self::$query);
    }

    /**
     * Metodo que devuelve todos los registros que la consulta obtiene
     * 
     * @param object $lobCon Objeto de conexión
     * @param string $query consulta nativa, DELETE UPDATE SELECT INSERT, CRUD
     * @return object
     */
    public static function getAllRows($lobCon, $query) {
        self::$recordSet = $lobCon->Execute($query);

        return self::$recordSet;
    }

    /**
     * Metodo que obtiene el primer registro en un arreglo asociativo
     * 
     * @param object $lobCon Objeto de conexión
     * @param string $query consulta nativa tipo SELECT
     * @return array
     */
    public static function getRow($lobCon, $query) {
        self::$row = $lobCon->GetRow($query);
        return self::$row;
    }

    /**
     * Metodo que devuelve el resultado en un solo campo tipo STRING
     * 
     * @param object $lobCon Objeto de conexión
     * @param string $query consulta nativa tipo SELECT
     * @return string
     */
    public static function getField($lobCon, $query) {
        self::$field = $lobCon->GetOne($query);
        return self::$field;
    }

    /**
     * Metodo que ejecuta una consulta tipo INSERT
     * Almacena el ID del último valor insertado (MYSQL)
     * 
     * @param object $lobCon Objeto de conexión
     * @param string $query
     * @return int
     */
    public static function insert($lobCon, $query) {

        if ($lobCon->Execute($query) === false) {
            return 0;
        } else {
            self::$Insert_ID = $lobCon->Insert_ID();
            return self::$Insert_ID;
        }
    }

    /**
     * Metodo que ejecuta una consulta tipo UPDATE
     * Devolviendo los registros afectados (MYSQL)
     * 
     * @param object $lobCon Objeto de conexión
     * @param string $query
     * @return int
     */
    public static function update($lobCon, $query) {
        if ($lobCon->Execute($query) === false) {
            return 0;
        } else {
            self::$affectedRows = $lobCon->Affected_Rows();
            return self::$affectedRows;
        }
    }

    /**
     * Metodo que elimina registros dados según la consulta construida
     * 
     * @param object $lobCon Objeto de conexión
     * @param string $query consulta
     * @return int
     */
    public static function delete($lobCon, $query) {

        if ($lobCon->Execute($query) === false) {
            return 0;
        } else {
            self::$affectedRows = $lobCon->Affected_Rows();
            return self::$affectedRows;
        }
    }

}
