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
 * 
 */

/*
 * Build Datos to update Query
 * 
 * // Output : CAMPO1 = 'Valor 1' ,CAMPO2 = 'Valor 2' ,CAMPO3 = 'Valor 3' 
 * 
 */

$larFields = array();
$larFields['CAMPO1'] = " 'Valor 1' ";
$larFields['CAMPO2'] = " 'Valor 2' ";
$larFields['CAMPO3'] = " 'Valor 3' ";

$lstUpdateQuery = DPManager::buildDatosToUpdate($larFields);

echo "<h1>Build Update Set Query</h1>";
echo $lstUpdateQuery;

/*
 * Select Query Query Example 1
 * inicializando todos los parametros
 * 
 * // Output : SELECT 'Valor 1' , 'Valor 2' , 'Valor 3' FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' LIMIT 0, 10
 * 
 */

$lstSelectQuery = DPManager::buildSelectQuery(
                implode(",", $larFields), "NOMBRE_TABLA", "CAMPO = 'cadena' ", false, false, false, "LIMIT 0, 10"
);

echo "<h1>Build Simple Select from correct params</h1>";
echo $lstSelectQuery;

/*
 * Select Query Query Example 2
 * con agrupamiento
 * 
 * // Output : SELECT sum(CAMPO) FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' GROUP BY CAMPO
 * 
 */

$lstSelectQuery2 = DPManager::buildSelectQuery(
                "sum(CAMPO)", "NOMBRE_TABLA", "CAMPO = 'cadena' ", "CAMPO"
);

echo "<h1>Build group Query From correct params</h1>";
echo $lstSelectQuery2;

/*
 * Select Query Query Example 3
 * con Ordenamiento
 * 
 * Output : SELECT 'Valor 1' , 'Valor 2' , 'Valor 3' FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' ORDER BY CAMPO DESC
 */

$lstSelectQuery3 = DPManager::buildSelectQuery(
                implode(",", $larFields), "NOMBRE_TABLA", "CAMPO = 'cadena' ", false, "CAMPO", "DESC"
);

echo "<h1>Build Simple Query From Order By Params</h1>";
echo $lstSelectQuery3;

/*
 * DELETE Query Example 1
 * 
 * Output : DELETE FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' 
 * 
 */

$lstDeleteQuery1 = DPManager::buildDeleteQuery("NOMBRE_TABLA", "CAMPO = 'cadena' ");

echo "<h1>Build Simple Delete Query From Params</h1>";
echo $lstDeleteQuery1;

/*
 * INSERT Query Example 1
 * 
 * Output : INSERT INTO NOMBRE_TABLA ( CAMPO1,CAMPO2,CAMPO3) VALUES ( 'Valor 1' , 'Valor 2' , 'Valor 3' )
 * 
 */

$lstInsertQuery1 = DPManager::buildInsertQuery($larFields, "NOMBRE_TABLA");

echo "<h1>Build Simple Insert Data From Params array type and table name</h1>";
echo $lstInsertQuery1;

/*
 * UPDATE Query Example 1
 * Para este ejemplo, necesitamos construir el SET con DPManager::buildDatosToUpdate($larFields);
 * 
 * Output : UPDATE NOMBRE_TABLA SET CAMPO1 = 'Valor 1' ,CAMPO2 = 'Valor 2' ,CAMPO3 = 'Valor 3' WHERE CAMPO = 'valor' 
 * 
 */

$lstUpdateQuery1 = DPManager::buildUpdateQuery("NOMBRE_TABLA", $lstUpdateQuery, "CAMPO = 'valor' ");

echo "<h1>Build Simple Update From Params array type, table name and condition to affect rows</h1>";
echo $lstUpdateQuery1;
