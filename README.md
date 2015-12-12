# <h1>DPManager</h1>

<h3>ClassAbstractToManagerQuerysFromMysql</h3>

<pre style='color:#000000;background:#ffffff;'><span style='color:#5f5035; background:#ffffe8; '>&lt;?php</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#c0bd92; background:#ffffe8; '>/*</span><span style='color:#3f5fbf; background:#ffffe8; '>*</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* DropsizeMVCf - extension of the SlimFramework and others tools</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;*</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@author</span><span style='color:#3f5fbf; background:#ffffe8; '>      Isaac Trenado </span><span style='color:#0000e6; background:#ffffe8; '>&lt;</span><span style='color:#7144c4; background:#ffffe8; '>isaac.trenado@codigolimpio.com</span><span style='color:#0000e6; background:#ffffe8; '>></span><span style='color:#3f5fbf; background:#ffffe8; '></span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@copyright</span><span style='color:#3f5fbf; background:#ffffe8; '>   2013 Isaac Trenado</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@link</span><span style='color:#3f5fbf; background:#ffffe8; '>        </span><span style='color:#5555dd; background:#ffffe8; '>http://dropsize.codigolimpio.com</span><span style='color:#3f5fbf; background:#ffffe8; '></span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@license</span><span style='color:#3f5fbf; background:#ffffe8; '>     </span><span style='color:#5555dd; background:#ffffe8; '>http://dropsize.codigolimpio.com/license.txt</span><span style='color:#3f5fbf; background:#ffffe8; '></span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@version</span><span style='color:#3f5fbf; background:#ffffe8; '>     3.0.1</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@package</span><span style='color:#3f5fbf; background:#ffffe8; '>     DropsizeMVCf</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;*</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* DropsizeMVCf - Web publishing software</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* Copyright 2015 by the contributors</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* This program is free software; you can redistribute it and/or modify</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* it under the terms of the GNU General Public License as published by</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* the Free Software Foundation; either version 2 of the License, or</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* (at your option) any later version.</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* This program is distributed in the hope that it will be useful,</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* but WITHOUT ANY WARRANTY; without even the implied warranty of</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* GNU General Public License for more details.</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* You should have received a copy of the GNU General Public License</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* along with this program; if not, write to the Free Software</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* This program incorporates work covered by the following copyright and</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* permission notices:</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* DropsizeMVCf is (c) 2013, 2015 </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* Isaac Trenado - </span><span style='color:#7144c4; background:#ffffe8; '>isaac.trenado@codigolimpio.com</span><span style='color:#3f5fbf; background:#ffffe8; '> -</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#5555dd; background:#ffffe8; '>http://www.codigolimpio.com</span><span style='color:#3f5fbf; background:#ffffe8; '></span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* Wherever third party code has been used, credit has been given in the code's comments.</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;*</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* DropsizeMVCf is released under the GPL</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;</span><span style='color:#c0bd92; background:#ffffe8; '>*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#c0bd92; background:#ffffe8; '>/*</span><span style='color:#3f5fbf; background:#ffffe8; '>*</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* Ejemplo 1 Interactura con DPManager</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@package</span><span style='color:#3f5fbf; background:#ffffe8; '> com.dropsizemvcf</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@author</span><span style='color:#3f5fbf; background:#ffffe8; '>  Isaac Trenado</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;* </span><span style='color:#005fd2; background:#ffffe8; '>@since</span><span style='color:#3f5fbf; background:#ffffe8; '>   1.0.0</span>
<span style='color:#3f5fbf; background:#ffffe8; '>&#xa0;</span><span style='color:#c0bd92; background:#ffffe8; '>*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>include</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"./DPManager-Basic.php"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Ejemplos</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* buildDatosToUpdate   Construye cadena    CAMPO = '$valor', CAMPO = '$valor'</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* buildSelectQuery     Construye cadena    SELECT CAMPO, CAMPO FROM </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*                                          TABLA WHERE CAMPO = '$cadena' </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*                                          GROUP BY CAMPO ORDER BY CAMPO</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* buildDeleteQuery     Construye cadena    DELETE FROM TABLA WHERE CAMPO = '%cadena'</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* buildInsertQuery     Construye cadena    INSERT INTO TABLA (CAMPO, CAMPO) VALUES ('$cadena', '$cadena');</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* buildUpdateQuery     Construye cadena    UPDATE TABLA SET CAMPO = '%s', CAMPO = '%s'</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*                                          WHERE CAMPO = '%s'</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Build Datos to update Query</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* // Output : CAMPO1 = 'Valor 1' ,CAMPO2 = 'Valor 2' ,CAMPO3 = 'Valor 3' </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#800000; background:#ffffe8; font-weight:bold; '>array</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>[</span><span style='color:#0000e6; background:#ffffe8; '>'CAMPO1'</span><span style='color:#808030; background:#ffffe8; '>]</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>" 'Valor 1' "</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>[</span><span style='color:#0000e6; background:#ffffe8; '>'CAMPO2'</span><span style='color:#808030; background:#ffffe8; '>]</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>" 'Valor 2' "</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>[</span><span style='color:#0000e6; background:#ffffe8; '>'CAMPO3'</span><span style='color:#808030; background:#ffffe8; '>]</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>" 'Valor 3' "</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstUpdateQuery</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildDatosToUpdate</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build Update Set Query&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstUpdateQuery</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Select Query Query Example 1</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* inicializando todos los parametros</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* // Output : SELECT 'Valor 1' , 'Valor 2' , 'Valor 3' FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' LIMIT 0, 10</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstSelectQuery</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildSelectQuery</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;</span><span style='color:#400000; background:#ffffe8; '>implode</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#0000e6; background:#ffffe8; '>","</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"NOMBRE_TABLA"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO = 'cadena' "</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0f4d75; background:#ffffe8; '>false</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0f4d75; background:#ffffe8; '>false</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0f4d75; background:#ffffe8; '>false</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"LIMIT 0, 10"</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build Simple Select from correct params&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstSelectQuery</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Select Query Query Example 2</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* con agrupamiento</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* // Output : SELECT sum(CAMPO) FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' GROUP BY CAMPO</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstSelectQuery2</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildSelectQuery</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;</span><span style='color:#0000e6; background:#ffffe8; '>"sum(CAMPO)"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"NOMBRE_TABLA"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO = 'cadena' "</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO"</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build group Query From correct params&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstSelectQuery2</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Select Query Query Example 3</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* con Ordenamiento</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Output : SELECT 'Valor 1' , 'Valor 2' , 'Valor 3' FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' ORDER BY CAMPO DESC</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstSelectQuery3</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildSelectQuery</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;</span><span style='color:#400000; background:#ffffe8; '>implode</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#0000e6; background:#ffffe8; '>","</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"NOMBRE_TABLA"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO = 'cadena' "</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0f4d75; background:#ffffe8; '>false</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"DESC"</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build Simple Query From Order By Params&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstSelectQuery3</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* DELETE Query Example 1</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Output : DELETE FROM NOMBRE_TABLA WHERE CAMPO = 'cadena' </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstDeleteQuery1</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildDeleteQuery</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#0000e6; background:#ffffe8; '>"NOMBRE_TABLA"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO = 'cadena' "</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build Simple Delete Query From Params&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstDeleteQuery1</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* INSERT Query Example 1</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Output : INSERT INTO NOMBRE_TABLA ( CAMPO1,CAMPO2,CAMPO3) VALUES ( 'Valor 1' , 'Valor 2' , 'Valor 3' )</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstInsertQuery1</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildInsertQuery</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#797997; background:#ffffe8; '>$larFields</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"NOMBRE_TABLA"</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build Simple Insert Data From Params array type and table name&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstInsertQuery1</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#696969; background:#ffffe8; '>/*</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* UPDATE Query Example 1</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Para este ejemplo, necesitamos construir el SET con DPManager::buildDatosToUpdate($larFields);</span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* Output : UPDATE NOMBRE_TABLA SET CAMPO1 = 'Valor 1' ,CAMPO2 = 'Valor 2' ,CAMPO3 = 'Valor 3' WHERE CAMPO = 'valor' </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;* </span>
<span style='color:#696969; background:#ffffe8; '>&#xa0;*/</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#797997; background:#ffffe8; '>$lstUpdateQuery1</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#808030; background:#ffffe8; '>=</span><span style='color:#000000; background:#ffffe8; '> DPManager</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#800080; background:#ffffe8; '>:</span><span style='color:#000000; background:#ffffe8; '>buildUpdateQuery</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#0000e6; background:#ffffe8; '>"NOMBRE_TABLA"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstUpdateQuery</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"CAMPO = 'valor' "</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>"&lt;h1>Build Simple Update From Params array type, table name and condition to affect rows&lt;/h1>"</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
<span style='color:#800000; background:#ffffe8; font-weight:bold; '>echo</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#797997; background:#ffffe8; '>$lstUpdateQuery1</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span>
</pre>
