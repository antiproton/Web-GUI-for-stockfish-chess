<?php
#------------------------------------------------------------------------------------------#
#  Copyright (c) Dr. R. Urban                                                              #
#  10.12.2014                                                                              #
#  Released under the MIT license                                                          #
#  https://github.com/antiproton                                                           #
#------------------------------------------------------------------------------------------#
session_start();
include "config.php";
$code = $_SESSION['code'];

if ($code !== $security_code){echo "Web GUI for Stockfish Chess by Dr. R. Urban"; exit;}

#------------------------------------------------------------------------------------------#

$fen = $_POST['Daten'];
if ($fen == ""){echo "Web GUI for Stockfish Chess by Dr. R. Urban - Stockfish 061214 by Tord Romstad, Marco Costalba and Joona Kiiski ";exit;}

#if ("localhost" != $_SERVER["HTTP_HOST"]){echo "no"; exit;}


$time = microtime(1);
$cwd='./';


$sf  = $pfad_stockfish;
#$sf  = "/kunden/q/38/d375266227/htdocs/q/Stockfish/src/stockfish";




$descriptorspec = array(
0 => array("pipe","r"),
1 => array("pipe","w"),
) ;

$other_options = array('bypass_shell' => 'true');

$process = proc_open($sf, $descriptorspec, $pipes, $cwd, null, $other_options) ;

if (is_resource($process)) {
fwrite($pipes[0], "uci\n");
fwrite($pipes[0], "ucinewgame\n");
fwrite($pipes[0], "isready\n");

fwrite($pipes[0], "position fen $fen\n");
fwrite($pipes[0], "go movetime $thinking_time\n");

$str="";

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str .= $s;
if(strpos(' '.$s,'bestmove')){
break;
}
}

#echo $s;
$teile = explode(" ", $s);

$zug = $teile[1];



#echo $zug;

$str = $zug;


  for ($i=0; $i < 4; $i++)
  {
    $str[$i];
  }


fclose($pipes[0]);
fclose($pipes[1]);
proc_close($process);

}


echo $str[0].$str[1]."-".$str[2].$str[3];
exit;
#echo "<br>";
#echo microtime(1)-$time;

?>