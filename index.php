<?php
#------------------------------------------------------------------------------------------#
#  Copyright (c) Dr. R. Urban                                                              #
#  25.5.2015                                                                              #
#  Released under the MIT license                                                          #
#  https://github.com/antiproton                                                           #
#  http://www.genialschach.de/                                                             #
#------------------------------------------------------------------------------------------#
session_start();
include "config.php";
$_SESSION['code'] = $security_code;
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Web GUI for stockfish chess  Example</title>


  <link rel="stylesheet" href="css/chessboard.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
#hideme {display: none;}
.Stil1 {font-size: 12px}
.Stil2 {font-size: 12}
.Stil3 {color: #FFFFFF}
.Stil4 {font-size: 12px; color: #FFFFFF; }
-->
</style>
<script src="js/chess.js"></script>
<script src="js/json3.min.js"></script>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/chessboard.js"></script>
<script src="js/ajax.js"></script>
<script src="js/board.js"></script>
<script src="js/captured_pieces.js"></script>


</head>
<body>


<!--  Copyright (c) Dr. R. Urban    --->
<table width="100%"  border="0">
  <tr>
    <td width="38%" rowspan="8" valign="top"><div id="board" style="width: 450px"></div>
	  <p><span id="captured_pieces_w"></span><br><br>
      </p>
	        <span id="captured_pieces_b"></span>
	    
      <hr align="left" width="450" size="1" /> </td>
    <td width="62%">
 
  </td>
  </tr>
  <tr>
    <td align="left" valign="top"><h1>Web GUI for Stockfish Chess</h1>
    <p><em><strong>by. Dr. R. Urban</strong></em><br>
      <span class="Stil2"><span class="Stil3"><span class="Stil1"><a href="https://github.com/antiproton/Web-GUI-for-stockfish-chess" target="_blank" class="Stil1">https://github.com/antiproton/Web-GUI-for-stockfish-chess</a></span></span></span></p>
    <p class="Stil4"><a href="http://chessboardjs.com/" target="_blank">http://chessboardjs.com/</a></p>
    <p><span class="Stil4"><a href="https://stockfishchess.org/" target="_blank">https://stockfishchess.org/</a></span></p></td>
  </tr>
  <tr>
    <td><p>Sound:
        <input type="checkbox" id="soundcheck" onClick="soundcheck()" value="checkbox" checked>      
      Stockfish vs. Stockfish:<span id="result_box" class="short_text" lang="en"> </span>
      <input type="checkbox" id="stockfcheck" onClick="stockfcheck()" value="checkbox">
      </p>
      <p><strong>Thinktime: <?php echo $thinking_time ?> milliseconds</strong></p>
      <p><strong> Movetime: 2 seconds</strong></p>
      <p><br />
        <input type="button" id="whiteOrientationBtn" value="White orientation" />
        <input type="button" id="blackOrientationBtn" value="Black orientation" />
        <input type="button" id="flipOrientationBtn" value="Flip orientation" />
      </p></td>
  </tr>
  <tr>
    <td height="0" valign="top"><p>
        <input type="button" id="move" value="MOVE" /> 
        </p>
      <form name="form1" method="post" action="">
      <input type="submit" name="Submit" value="INIT">
    </form></td>
  </tr>
  <tr>
    <td>Engine moved: 
    <span  id="content"></span></td>
  </tr>
  <tr>
    <td height="0">Status: <span id="status"></span></td>
  </tr>
  <tr>
    <td height="0">FEN: <span id="fen"></span></td>
  </tr>
  <tr>
    <td>PGN: <span id="pgn"></span></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
  </tr>
</table>

 <div id="hideme">
 <span id="sound"></span>
</div>


</body>
</html>