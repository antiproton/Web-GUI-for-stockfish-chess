<?php
#------------------------------------------------------------------------------------------#
#  Copyright (c) Dr. R. Urban                                                              #
#  10.12.2014                                                                              #
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
  <title>Dr. R. Urban - Bot Chess</title>


  <link rel="stylesheet" href="css/chessboard.css" />
  <link rel="stylesheet" href="css/style.css" />
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>




<script src="js/chess.js"></script>
<script src="js/ajax.js"></script>
<script src="js/json3.min.js"></script>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/chessboard.js"></script>
<script src="js/board.js"></script>




 <table width="100%"  border="0">
   <tr>
     <td width="40%" rowspan="9"><!-- Version vom 19.5.2015
    Autor: Dr. Urban --->

<div id="board" style="width: 500px"></div>
</td>
     <td width="0" align="left" valign="top"><h1>Web GUI for Stockfish Chess</h1>
     <h6>by Dr. R. Urban </h6></td>
   </tr>
   <tr>
     <td align="left" valign="top"><div id="Zeitweiss">
       <div id="ZeitAnzeige">Black: <span id="zeit_weiss"></span></div>
     </div></td>
   </tr>
   <tr>
     <td align="left" valign="top">  <div id="Zeitweiss">
       <div id="ZeitAnzeige">White: <span id="zeit_schwarz"></span></div>
     </div></td>
   </tr>
   <tr>
     <td align="left" valign="top"><a href="https://github.com/antiproton/Web-GUI-for-stockfish-chess" target="_blank">https://github.com/antiproton/Web-GUI-for-stockfish-chess</a></td>
   </tr>
   <tr>
     <td align="left" valign="top">
 FEN =  <span id="fen"></span><br>
 BOT =  <span id="zug"></span><br>
 PGN =  <span id="pgn"></span><br>
 Halfmoves = <span id="halbzuege"></span><br>
 Engine moved: =  <span id="content"></span><br>
 STATUS = <span id="status"></span>
 </td>
   </tr>
   <tr>
     <td align="left" valign="top">  <input type="button" class="black-3c85d" id="flipOrientationBtn" value="Flip orientation" />
     </td>
   </tr>
   <tr>
     <td align="left" valign="top">&nbsp;</td>
   </tr>
   <tr>
     <td align="left" valign="top"><input type="button" class="black-3c85d" onclick="init_neu()" value="init" /></td>
   </tr>
   <tr>
     <td align="left" valign="top">&nbsp;</td>
   </tr>
</table>
<p>Dr. R. Urban - dr.urban@netreal.de</p>

  <div id="hideme">
 <span id="sound"></span>
</div>
</body>
</html>