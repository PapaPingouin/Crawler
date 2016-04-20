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

$from = sql_totab('SELECT u.ID,u.url,l.type FROM urls as u,links as l WHERE l.to='.$center['ID'].' AND l.from=u.ID');
$to   = sql_totab('SELECT u.ID,u.url,l.type FROM urls as u,links as l WHERE l.from='.$center['ID'].' AND l.to=u.ID');






?>
<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   version="1.1"
   id="svg"
  viewBox="0 0 1000 500" width="100%" height="100%" 
  type='image/svg+xml'
  >
	<style type="text/css" >
      <![CDATA[
		text{
			fill: red;
			
		}
      ]]>
    </style>
	<g>
		
		<text x='450' y='250' ><?php echo $url; ?></text>
	</g>
	<g>
<?php
foreach( $from as $n=>$u )
{
	echo "\t\t<text x='10' y='".(($n+1)*15)."' >".$u['url']."</text>\n";
}
?>	
	</g>
	<g>
<?php
foreach( $to as $n=>$u )
{
	echo "\t\t<text x='800' y='".(($n+1)*15)."' >".$u['url']."</text>\n";
}
?>	
	</g>
	
</svg>
