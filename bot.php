<?php
$fen = $_POST['Daten'];
if ($fen == ""){$fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";}
$time = microtime(1);
$cwd='./';


$sf  = "C:/xampp/htdocs/netreal/Stockfish/src/stockfish.exe";
#$sf  = "/kunden/homepages/38/xxxxxxx/htdocs/xxxxx/Stockfish/src/stockfish";




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
fwrite($pipes[0], "go movetime 50\n");

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