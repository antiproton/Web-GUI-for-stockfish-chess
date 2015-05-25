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
-->
</style></head>
<body>


<!--  Copyright (c) Dr. R. Urban    --->
<table width="100%"  border="0">
  <tr>
    <td width="33%" rowspan="10"><div id="board" style="width: 450px"></div></td>
    <td width="67%">
 
  </td>
  </tr>
  <tr>
    <td align="left" valign="top"><h1>Web GUI for Stockfish Chess</h1>
    <p>by. Dr. R. Urban</p></td>
  </tr>
  <tr>
    <td>Sound:
      <input type="checkbox" id="soundcheck" onClick="soundcheck()" value="checkbox" checked>      <br />
	  <input type="button" id="whiteOrientationBtn" value="White orientation" />
  <input type="button" id="blackOrientationBtn" value="Black orientation" />
  <input type="button" id="flipOrientationBtn" value="Flip orientation" />
	  
	
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>
        <input type="button" id="move" value="MOVE" /> 
        </p>
      <p><br>   
      </p>
      <form name="form1" method="post" action="">
      <input type="submit" name="Submit" value="INIT">
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
</table>








<!-- Copyright (c) Dr. R. Urban --->
<script src="js/chess.js"></script>
<script src="js/json3.min.js"></script>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/chessboard.js"></script>
<script src="js/ajax.js"></script>
<script src="js/ajax.js"></script>
<script src="js/board.js"></script>

 <div id="hideme">
 <span id="sound"></span>
</div>


</body>
</html>