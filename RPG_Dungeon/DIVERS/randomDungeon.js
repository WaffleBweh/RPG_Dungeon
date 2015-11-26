//Objet dongeon
// 0 = vide
// 1 = mur
// 2 = joueur
function dungeon(width, height) {
    this.width = width;
    this.height = height;
    this.grid = [];
    this.cellWidth = 32;
    this.cellHeight = 32;

    this.isFilled = function(array) {
        for (i = 0; i < array.length; i++) {
            for (j = 0; j < array[i].length; j++) {
                if (array[i][j] === 0) {
                    return true;
                }
            }
        }
        return false;
    };

    this.returnRandomWall = function(array, arrWidth, arrHeight) {
        var randX = Math.round(Math.random() * arrWidth);
        var randY = Math.round(Math.random() * arrHeight);
        var arrayAnswer = [];

        while (array[randX][randY] === 0) {
            // On recupère une nouvelle valeur aléatoire
            randX = Math.round(Math.random() * arrWidth);
            randY = Math.round(Math.random() * arrHeight);
        }

        arrayAnswer[0] = randY;
        arrayAnswer[1] = randX;

        return arrayAnswer;
    };

    this.createDungeon = function() {
        //Parcours le tableau pour creer des murs
        for (i = 0; i < height; i++) {
            this.grid[i] = [];
            for (j = 0; j < width; j++) {
                this.grid[i][j] = 1;
            }
        }

        var visitedCells = [];
        for (i = 0; i < height; i++) {
            visitedCells[i] = [];
            for (j = 0; j < width; j++) {
                visitedCells[i][j] = 0;
            }
        }

        var wallsGrid = [];
        for (i = 0; i < height; i++) {
            wallsGrid[i] = [];
            for (j = 0; j < width; j++) {
                wallsGrid[i][j] = 0;
            }
        }

        // Code labirynthe here
        // On pose la première cellule aléatoirement
        var controllerX = Math.abs(Math.round(Math.random() * width - 1));
        var controllerY = Math.abs(Math.round(Math.random() * height - 1));
        var randomDirection = 0; // 0 = NORTH, 1 = EAST, 2 = SOUTH, 3 = WEST
        var randomWallArray = [];
        randomWallArray[0] = 0;
        randomWallArray[1] = 0;

        this.grid[controllerY][controllerX] = 2;
        //On ajoute les murs adjacent de la cellule dans un tableau
        if (controllerY < height - 1) {
            if (this.grid[controllerY + 1][controllerX] === 1) {
                wallsGrid[controllerY + 1][controllerX] = 1;
            }
        }
        if (controllerY > 0) {
            if (this.grid[controllerY - 1][controllerX] === 1) {
                wallsGrid[controllerY - 1][controllerX] = 1;
            }
        }
        if (controllerX < width - 1) {
            if (this.grid[controllerY][controllerX + 1] === 1) {
                wallsGrid[controllerY][controllerX + 1] = 1;
            }
        }
        if (controllerX > 0) {
            if (this.grid[controllerY][controllerX - 1] === 1) {
                wallsGrid[controllerY][controllerX - 1] = 1;
            }
        }
        var i;
        
        // Tant qu'il y a des murs dans l'array
        while (this.isFilled(wallsGrid)) {
            //Break out after 500 runs to prevent infinte looping while debugging
            i++;
            if (i > 20) {
                break;
            }

            randomWallArray = this.returnRandomWall(wallsGrid, width - 1, height - 1);

            // On récupère les coordonées du mur
            controllerX = randomWallArray[0];
            controllerY = randomWallArray[1];
            // On prends une direction aléatoire
            randomDirection = Math.round(Math.random() * 4);

            // On creuse du mur vers une cellule adgacent qui fait partie du labyrinthe
            switch (randomDirection) {
                // Nord
                case 0 :
                    if (this.grid[controllerY + 1][controllerX] === 1) {
                        this.grid[controllerY][controllerY] = 0;
                    }
                    break;
                    // Est
                case 1 :
                    if (this.grid[controllerY][controllerX - 1] === 1) {
                        this.grid[controllerY][controllerY] = 0;
                    }
                    break;
                    // Sud
                case 2 :
                    if (this.grid[controllerY - 1][controllerX] === 1) {
                        this.grid[controllerY][controllerY] = 0;
                    }
                    break;
                    // Ouest
                case 3 :
                    if (this.grid[controllerY][controllerX + 1] === 1) {
                        this.grid[controllerY][controllerY] = 0;
                    }
                    break;
            }
            // On marque les murs de la cellule creusée
            if (controllerY < height - 1) {
                if (this.grid[controllerY + 1][controllerX] === 1) {
                    wallsGrid[controllerY + 1][controllerX] = 1;
                }
            }
            if (controllerY > 0) {
                if (this.grid[controllerY - 1][controllerX] === 1) {
                    wallsGrid[controllerY - 1][controllerX] = 1;
                }
            }
            if (controllerX < width - 1) {
                if (this.grid[controllerY][controllerX + 1] === 1) {
                    wallsGrid[controllerY][controllerX + 1] = 1;
                }
            }
            if (controllerX > 0) {
                if (this.grid[controllerY][controllerX - 1] === 1) {
                    wallsGrid[controllerY][controllerX - 1] = 1;
                }
            }
            // On retire le mur du tableau
            wallsGrid[controllerY][controllerY] = 0;
        }
        console.log(wallsGrid);
    }
    ;

    this.drawDungeon = function(ctx) {
        //We get the variables
        var currentGrid = this.grid;
        var cellWidth = this.cellWidth;
        var cellHeight = this.cellHeight;

        sprGround = new Image(cellWidth, cellHeight);
        sprWall = new Image(cellWidth, cellHeight);
        sprPlayer = new Image(cellWidth, cellHeight);

        sprGround.src = "img/ground.png";
        sprWall.src = "img/wall.png";
        sprPlayer.src = "img/player.png";

        setTimeout(function() {
            // Dessine la vue du labyrinthe
            for (i = 0; i < height; i++) {
                for (j = 0; j < width; j++) {
                    if (currentGrid[i][j] === 0) {
                        ctx.drawImage(sprGround, j * cellWidth, i * cellHeight);
                    }
                    if (currentGrid[i][j] === 1) {
                        ctx.drawImage(sprWall, j * cellWidth, i * cellHeight);
                    }
                    if (currentGrid[i][j] === 2) {
                        ctx.drawImage(sprPlayer, j * cellWidth, i * cellHeight);
                    }
                }
            }
        }, 500);
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

    myDungeon = new dungeon(20, 20);
    myDungeon.createDungeon();
    myDungeon.drawDungeon(ctx);
};