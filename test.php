<?php

include "./DPManager-Basic.php";

$cliente = array();

// Arreglo asociativo
$cliente['id_cliente'] = 1;
$cliente['nombre'] = "'Héctor'";
$cliente['paterno'] = "'Hérnandez'";
$cliente['materno'] = "'Rivera'";

// UPDATE tabla SET [campo = '1'[, campo2 = '2']]
$lstGetSetToUpdate = DPManager::buildDatosToUpdate($cliente);

echo "<hr />";
echo $lstGetSetToUpdate;
echo "<hr />";

// UPDATE tabla SET campo = '1', campo2 = '2', campo3 = '4' 
//  WHERE campo1 = 'x'

$lstUpdateQuery = DPManager::buildUpdateQuery("tabla"
                , $lstGetSetToUpdate
                , "id_cliente = 3");

echo "<hr />";
echo $lstUpdateQuery;
echo "<hr />";

$lstInsertQuery = DPManager::buildInsertQuery($cliente
                , "tabla");

echo "<hr />";
echo $lstInsertQuery;
echo "<hr />";

// select * from tabla order by nombre desc
$lstSelectQuery = DPManager::buildSelectQuery(
                "nombre, paterno"
                . ", concat_ws(',', nombre, paterno) as completo"
                , "tabla", false, false
                , "nombre", "asc");

echo "<hr />";
echo $lstSelectQuery;
echo "<hr />";

// select * from tabla order by nombre desc
$lstSelectGroupQuery = DPManager::buildSelectQuery(
                "count(*)", "tabla", " nombre like '%i%' ");

echo "<hr />";
echo $lstSelectGroupQuery;
echo "<hr />";

// DELETE FROM tabla WHERE id_cliente = 4

$lstDeleteQuery = DPManager::buildDeleteQuery("tabla"
                , " id_cliente = 10");

echo "<hr />";
echo $lstDeleteQuery;
echo "<hr />";

/*
 * OutPut
 * 
 * id_cliente = 1,nombre = 'H?ctor',paterno = 'H?rnandez',materno = 'Rivera'UPDATE tabla SET id_cliente = 1,nombre = 'H?ctor',paterno = 'H?rnandez',materno = 'Rivera' WHERE id_cliente = 3INSERT INTO tabla ( id_cliente,nombre,paterno,materno) VALUES (1,'H?ctor','H?rnandez','Rivera')SELECT nombre, paterno, concat_ws(',', nombre, paterno) as completo FROM tabla ORDER BY nombre ascSELECT count(*) FROM tabla WHERE nombre like '%i%' 
 */