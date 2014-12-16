Web GUI for stockfish chess
===========================
Demo:
[http://netreal.de/bot-chess/index.php](http://netreal.de/bot-chess/index.php)

It is based on: chessboard.js
https://github.com/oakmac/chessboardjs

1. Install stockfish
https://stockfishchess.org/
sudo apt-get install git g++
git clone https://github.com/mcostalba/Stockfish.git
cd Stockfish/src
make help

make profile-build ARCH=x86-64
make profile-build ARCH=x86-32

./stockfish
go infinite

2. Edit bot.php: $sf  = "C:/xampp/htdocs/netreal/Stockfish/src/stockfish.exe";

3. Program upload

That is all!

enjoy it
