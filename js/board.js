 /* Web-GUI-for-stockfish-chess
https://github.com/antiproton/Web-GUI-for-stockfish-chess
    Version vom 19.5.2015
    Autor: Dr. Urban */
z_schwarz = 0;
z_weiss = 0;
content = 1;
halbzuege = 0;

var init = function() {
//--- start example JS ---

document.getElementById('zeit_weiss').innerHTML = z_weiss;
document.getElementById('zeit_schwarz').innerHTML = z_schwarz;
document.getElementById('halbzuege').innerHTML = halbzuege;
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
z_schwarz = 0;
z_weiss = 0;
halbzuege = 0;
document.getElementById('zeit_weiss').innerHTML = z_weiss;
document.getElementById('zeit_schwarz').innerHTML = z_schwarz;
document.getElementById('halbzuege').innerHTML = halbzuege;
window.clearInterval(Weiss_zeit);
window.clearInterval(Schwarz_zeit);

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


