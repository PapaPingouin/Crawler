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

header("Content-Type: text/html");

if( !isset( $_REQUEST['url'] ) )
	die('You need to choose a know url ?url=....');

$url = $_REQUEST['url'];

$center = sql_data("SELECT * FROM urls WHERE url='".mysql_escape_string($url)."'");

$from = sql_totab('SELECT u.ID,u.url,l.type FROM urls as u,links as l WHERE l.to='.$center['ID'].' AND l.from=u.ID AND l.distance>0');
$to   = sql_totab('SELECT u.ID,u.url,l.type FROM urls as u,links as l WHERE l.from='.$center['ID'].' AND l.to=u.ID AND l.distance>0');




echo "<table>
<tr>";

echo "<td>";
echo "<ul>";
foreach( $from as $n=>$u )
{
	echo "\t\t<li><a href='?url=$u[url]'>$u[url]</a></li>\n";
}
echo "</ul>";
echo "</td><td>".$center['url']."</td><td>";
echo "<ul>";
foreach( $to as $n=>$u )
{
	echo "\t\t<li><a href='?url=$u[url]'>$u[url]</a></li>\n";
}
echo "</ul>";
echo "</td></tr></table>";
