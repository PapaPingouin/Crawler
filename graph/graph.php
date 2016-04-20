<?php
/**
 * 
 * Graph visualisation
 *
 */


/**
 * Call necesary include files
 */
if( !file_exists( '../config.php' ) ) 
	die("config.php file not found. Please copy the sample and customize.");
	
require('../config.php');
require('../includes/functions.php');
require('../includes/mysql_functions.php');

header("Content-type: application/graphml");

$urls = sql_totab('SELECT ID,url FROM urls','ID');
$links = sql_totab('SELECT * FROM links');

echo 
'<?xml version="1.0" encoding="UTF-8"?>
<graphml xmlns="http://graphml.graphdrawing.org/xmlns"  
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xmlns:y="http://www.yworks.com/xml/graphml"
      xsi:schemaLocation="http://graphml.graphdrawing.org/xmlns 
        http://graphml.graphdrawing.org/xmlns/1.0/graphml.xsd">
  <key for="node" id="d6" yfiles.type="nodegraphics"/>
  <key id="d0" for="node" attr.name="color" attr.type="string">
    <default>yellow</default>
  </key>
  <key id="d1" for="edge" attr.name="weight" attr.type="double"/>
  <graph id="G" edgedefault="directed">
';
foreach( $urls as $id=>$data)
{
	echo "\t<node id='n$id'><data key='d6'><y:ShapeNode><y:NodeLabel >".str_replace("&","_",html_entity_decode($data[url]))."</y:NodeLabel></y:ShapeNode></data></node>\n";
}

$n=0;
foreach( $links as $link )
{
	$n++;
	echo "\t<edge id='e$n' source='n$link[from]' target='n$link[to]' />\n";
}


echo "</graph>
</graphml>";
  
  
  
?>  
