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
 * Ejemplo 1 Interactura con DPManager
 * 
 * @package com.dropsizemvcf
 * @author  Isaac Trenado
 * @since   1.0.0
 */
include "./DPManager-Basic.php";

/*
 * Ejemplos
 * 
 * buildDatosToUpdate   Construye cadena    CAMPO = '$valor', CAMPO = '$valor'
 * buildSelectQuery     Construye cadena    SELECT CAMPO, CAMPO FROM 
 *                                          TABLA WHERE CAMPO = '$cadena' 
 *                                          GROUP BY CAMPO ORDER BY CAMPO
 * buildDeleteQuery     Construye cadena    DELETE FROM TABLA WHERE CAMPO = '%cadena'
 * buildInsertQuery     Construye cadena    INSERT INTO TABLA (CAMPO, CAMPO) VALUES ('$cadena', '$cadena');
 * buildUpdateQuery     Construye cadena    UPDATE TABLA SET CAMPO = '%s', CAMPO = '%s'
 *                                          WHERE CAMPO = '%s'
 * 
 */

$larFields = array();
$larFields['CAMPO1'] = " 'Valor 1' ";
$larFields['CAMPO2'] = " 'Valor 2' ";
$larFields['CAMPO3'] = " 'Valor 3' ";

$lstUpdateQuery = DPManager::buildDatosToUpdate($larFields);

echo $lstUpdateQuery;

/*
 * Resultado
 * 
 * CAMPO1 = 'Valor 1' ,CAMPO2 = 'Valor 2' ,CAMPO3 = 'Valor 3' 
 */

/*
 * Select Query Query Example 1
 * inicializando todos los parametros
 */

$lstSelectQuery = DPManager::buildSelectQuery(
                implode(",", $larFields), "NOMBRE_TABLA", "CAMPO = 'cadena' ", false, false, false, "LIMIT 0, 10"
);

echo "<br />";
echo $lstSelectQuery;

/*
 * Select Query Query Example 2
 * con agrupamiento
 */

$lstSelectQuery2 = DPManager::buildSelectQuery(
                "sum(CAMPO)", "NOMBRE_TABLA", "CAMPO = 'cadena' ", "CAMPO"
);

echo "<br />";
echo $lstSelectQuery2;

/*
 * Select Query Query Example 3
 * con Ordenamiento
 */

$lstSelectQuery3 = DPManager::buildSelectQuery(
                implode(",", $larFields), "NOMBRE_TABLA", "CAMPO = 'cadena' ", false, "CAMPO", "DESC"
);

echo "<br />";
echo $lstSelectQuery3;

/*
 * DELETE Query Example 1
 */

$lstDeleteQuery1 = DPManager::buildDeleteQuery("NOMBRE_TABLA", "CAMPO = 'cadena' ");

echo "<br />";
echo $lstDeleteQuery1;

/*
 * INSERT Query Example 1
 */

$lstInsertQuery1 = DPManager::buildInsertQuery($larFields, "NOMBRE_TABLA");

echo "<br />";
echo $lstInsertQuery1;

/*
 * UPDATE Query Example 1
 * Para este ejemplo, necesitamos construir el SET con DPManager::buildDatosToUpdate($larFields);
 */

$lstUpdateQuery1 = DPManager::buildUpdateQuery("NOMBRE_TABLA", $lstUpdateQuery, "CAMPO = 'valor' ");

echo "<br />";
echo $lstUpdateQuery1;
