//Objet dongeon
// 0 = vide
// 1 = mur
// 2 = joueur
function dungeon(width, height) {
    this.width = width;
    this.height = height;
    this.grid = [];
    this.cellWidth = 32;
    this.cellHeight = 48;

    this.createDungeon = function() {
        //Parcours le tableau pour creer du vide
        for (i = 0; i < height; i++) {
            this.grid[i] = [];
            for (j = 0; j < width; j++) {
                this.grid[i][j] = 0;
            }
        }
        // Maze code here
    };

    this.drawDungeon = function(ctx) {
       sprGround = new Image();
       sprWall = new Image();
       sprPlayer = new Image();
       
       sprGround.src = "img/ground.png";
       sprWall.src = "img/wall.png";
       sprPlayer.src = "img/player.png";
        
       // Draws the overhead map
       for (i = 0; i < height; i++) {
            for (j = 0; j < width; j++) {
                if (this.grid[i][j] === 0) {
                    ctx.drawImage(sprGround, j * this.cellWidth, i * this.cellHeight, j * this.cellWidth + this.cellWidth, i * this.cellHeight + this.cellHeight);
                    console.log("Ground is drawn at x: " + j * this.cellWidth + " ; y : " + i * this.cellHeight);
                    console.log("Ground is drawn to x: " + (j * this.cellWidth + this.cellWidth) + " ; y : " + (i * this.cellHeight + this.cellHeight));
                }
                if (this.grid[i][j] === 1) {
                    ctx.drawImage(sprWall, j, i, j + this.cellWidth, i + this.cellHeight);
                }
                if (this.grid[i][j] === 2) {
                    ctx.drawImage(sprPlayer, j, i, j + this.cellWidth, i + this.cellHeight);
                }
            }
        } 
    };
}


/// On récupère le canvas
//On récupère les deux canvas
window.onload = function()
{
    var c = document.getElementById('myCanvas');
    if (!c) {
        alert("Impossible de récupérer le canvas");
        return;
    }

    var ctx = c.getContext('2d');
    if (!ctx) {
        alert("Impossible de récupérer le context du canvas");
        return;
    }
    
    //On crée un dongeon
    myDungeon = new dungeon(30, 20);
    myDungeon.createDungeon();
    myDungeon.drawDungeon(ctx);

};