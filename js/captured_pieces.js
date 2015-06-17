//rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR
function captured_pieces(fen) {

var new_fen = fen.split(" ");
 var new_fen = new_fen[0];

// Anzahl weiﬂe Bauern
var W_P = new_fen.split("P").length - 1;


var figur = '<div  style="position:absolute; left:0px;"> <img src="img/chesspieces/wP.png" width="40" height="40"></div>'
document.getElementById('captured_pieces').innerHTML = 'Captured pieces: Comming soon....'+figur;
}