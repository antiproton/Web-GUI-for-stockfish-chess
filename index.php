<?php
#------------------------------------------------------------------------------------------#
#  Copyright (c) Dr. R. Urban                                                              #
#  10.12.2014                                                                              #
#  Released under the MIT license                                                          #
#  https://github.com/antiproton                                                           #
#------------------------------------------------------------------------------------------#
session_start();



   $_SESSION['code'] = "1234";



?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dr. R. Urban - Bot Chess</title>


  <link rel="stylesheet" href="css/chessboard.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #666666;
}
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<body>




<script src="js/chess.js"></script>
<script src="js/ajax.js"></script>
<script src="js/json3.min.js"></script>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/chessboard.js"></script>
<script>
z_schwarz = 0;
z_weiss = 0;
content = 1;
halbzuege = 0;

var init = function() {
//--- start example JS ---

document.getElementById('zeit_weiss').innerHTML = z_weiss;
document.getElementById('zeit_schwarz').innerHTML = z_schwarz;
var board,
  game = new Chess();

// do not pick up pieces if the game is over
// only pick up pieces for White
var onDragStart = function(source, piece, position, orientation) {
  if (game.in_checkmate() === true || game.in_draw() === true ||
    piece.search(/^b/) !== -1) {
    return false;
  }
};


var makeMove = function() {

document.getElementById('fen').innerHTML = game.fen();
document.getElementById('content').innerHTML = content;
if(content == 0){setRequest(game.fen());window.setTimeout(makeMove, 6000);}


 var zug_bot =  content.split("-");
   var zug_von = zug_bot[0];
     var  zug_nach = zug_bot[1];


	 document.getElementById('zug').innerHTML = zug_von+"-"+zug_nach;


  var possibleMoves = game.moves();

  // game over
  if (possibleMoves.length === 0) return;



  game.move({
    from: zug_von,
    to: zug_nach,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  });
sound();
 
  board.position(game.fen());
   pgn=game.pgn();
  document.getElementById('pgn').innerHTML = pgn;

  updateStatus();
   content = 0;
 // Zeit  
 window.clearInterval(Schwarz_zeit);
  Weiss_zeit = window.setInterval('ZeitAnzeigen_weiss()', 1000)
halbzuege++;
	document.getElementById('halbzuege').innerHTML = halbzuege;
};

var onDrop = function(source, target) {
  // see if the move is legal
  var move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  });

  // illegal move
  if (move === null) return 'snapback';

  // make  legal move for black
  // PGN wird ermittelt
   // Fen würd übertragen
  pgn=game.pgn();
  document.getElementById('pgn').innerHTML = pgn;
    updateStatus();
	//is (Black to move)
sound();
	document.getElementById('content').innerHTML = content;
	
	halbzuege++;
	document.getElementById('halbzuege').innerHTML = halbzuege;
	 // Zeit  
if (halbzuege > 2) {window.clearInterval(Weiss_zeit);}
	Schwarz_zeit = window.setInterval('ZeitAnzeigen_schwarz()', 1000)
  setRequest(game.fen());
  window.setTimeout(makeMove, 4000);
};

// update the board position after the piece snap
// for castling, en passant, pawn promotion
var onSnapEnd = function() {
  board.position(game.fen());
};

var updateStatus = function() {
  var status = '';

  var moveColor = 'White';
  if (game.turn() === 'b') {
    moveColor = 'Black';
  }

  // checkmate?
  if (game.in_checkmate() === true) {
    status = 'Game over, ' + moveColor + ' is in checkmate.';
  }

  // draw?
  else if (game.in_draw() === true) {
    status = 'Game over, drawn position';
  }

  // game still on
  else {
    status = moveColor + ' to move';

    // check?
    if (game.in_check() === true) {
      status += ', ' + moveColor + ' is in check';
    }


  }
document.getElementById('status').innerHTML = status;

  }

var cfg = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onSnapEnd: onSnapEnd
};
board = new ChessBoard('board', cfg);
//--- end example JS ---
init_neu = function() {

board = new ChessBoard('board', cfg);
$(document).ready(init);



};
}; // end init()



$(document).ready(init);
//---------------------------------------------------------------------
function sound(){
	document.getElementById('sound').innerHTML = '<audio autoplay preload controls> <source src="sound/move.wav" type="audio/wav" /> </audio>';}
//---------------------------------------------------------------------

// Zeit Schwarz

function ZeitAnzeigen_schwarz(){
z_schwarz++;
document.getElementById('zeit_schwarz').innerHTML = z_schwarz;
}

// Zeit Weiss
function ZeitAnzeigen_weiss(){
z_weiss++;
document.getElementById('zeit_weiss').innerHTML = z_weiss;
}

</script>




 <table width="100%"  border="0">
   <tr>
     <td width="40%" rowspan="9"><!-- start example HTML --->

<div id="board" style="width: 500px"></div>
<!-- end example HTML ---></td>
     <td width="0" align="left" valign="top"><h1>Web GUI for Stockfish Chess</h1>
     <h6>by Dr. R. Urban </h6></td>
   </tr>
   <tr>
     <td align="left" valign="top">Zeit Wei&szlig;: <span id="zeit_weiss"></span></td>
   </tr>
   <tr>
     <td align="left" valign="top">Zeit Schwarz: <span id="zeit_schwarz"></span></td>
   </tr>
   <tr>
     <td align="left" valign="top"><a href="https://github.com/antiproton/Web-GUI-for-stockfish-chess" target="_blank">https://github.com/antiproton/Web-GUI-for-stockfish-chess</a></td>
   </tr>
   <tr>
     <td align="left" valign="top">
 FEN =  <span id="fen"></span><br>
 BOT =  <span id="zug"></span><br>
 PGN =  <span id="pgn"></span><br><br>
 Halbzuege = <span id="halbzuege"></span><br><br>
Content =  <span id="content"></span><br>

 </td>
   </tr>
   <tr>
     <td align="left" valign="top">STATUS =  <span id="status"></span><br></td>
   </tr>
   <tr>
     <td align="left" valign="top">&nbsp;</td>
   </tr>
   <tr>
     <td align="left" valign="top"><input type="button" onclick="init_neu()" value="init" /></td>
   </tr>
   <tr>
     <td align="left" valign="top"><a href="bot.php" target="_blank">Bot</a></td>
   </tr>
</table>
<p>Dr. R. Urban - dr.urban@netreal.de</p>

  <span id="sound"></span>
</body>
</html>