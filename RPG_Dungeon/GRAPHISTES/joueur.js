/* 
 * AUTEUR      : Haury, De Biasi, Salvi, Bartiban, Panniz
 * DATE        : 05.11.2015
 * VERSION     : 1.0
 * DESCIRPTION : Classe joueur - contient la this.direction du joueur, et permet de
 *               dessiner la vue, via les informations de la classe niveau.
 */


//Constructeur de la classe joueur
function joueur()
{
    //this.direction = this.direction donnée par les architèctes
    this.direction = "NORD";
    this.distanceVue = 4;
    this.joueurX;
    this.joueurY;

    this.vueJoueur = [
        [99, 99, 99, 99, 99],
        [99, 99, 99, 99, 99],
        [99, 99, 99, 99, 99],
        [99, 99, 99, 99, 99],
        [99, 99, 99, 99, 99]
    ];

    this.setPositionJoueur = function (carte) {
        for (var x = 0; x < carte[0].length; x++) {
            for (var y = 0; y < carte.length; y++) {
                if (carte[y][x] === 2) {
                    this.joueurX = x;
                    this.joueurY = y;
                }

            }
        }
    };

    //formule pour créer le tableau de la vue du joueur
    this.InitialisationTableauVue = function (carte) {
        var indexTableau = this.distanceVue;
        switch (this.direction) {
            case "NORD":
                for (var y = this.distanceVue; y >= 0; y--) {
                    if (this.joueurY < carte.length) {
                        if (this.joueurY - y >= 0) {
                            if (this.joueurX < carte[0].length) {
                                if (this.joueurX > 0) {
                                    this.vueJoueur[indexTableau][0] = carte[this.joueurY - y][this.joueurX - 2];
                                    this.vueJoueur[indexTableau][1] = carte[this.joueurY - y][this.joueurX - 1];
                                    this.vueJoueur[indexTableau][2] = carte[this.joueurY - y][this.joueurX];
                                    this.vueJoueur[indexTableau][3] = carte[this.joueurY - y][this.joueurX + 1];
                                    this.vueJoueur[indexTableau][4] = carte[this.joueurY - y][this.joueurX + 2];
                                }
                            }
                        }
                    }
                    indexTableau--;
                }
                console.log(this.vueJoueur);
                break;
            case "SUD":
                for (var y = this.distanceVue; y >= 0; y--) {
                    if (this.joueurY + y < carte.length) {
                        if (this.joueurY > 0) {
                            if (this.joueurX < carte[0].length) {
                                if (this.joueurX > 0) {
                                    this.vueJoueur[indexTableau][4] = carte[this.joueurY + y][this.joueurX - 2];
                                    this.vueJoueur[indexTableau][3] = carte[this.joueurY + y][this.joueurX - 1];
                                    this.vueJoueur[indexTableau][2] = carte[this.joueurY + y][this.joueurX];
                                    this.vueJoueur[indexTableau][1] = carte[this.joueurY + y][this.joueurX + 1];
                                    this.vueJoueur[indexTableau][0] = carte[this.joueurY + y][this.joueurX + 2];
                                }
                            }
                        }
                    }
                    indexTableau--;
                }
                console.log(this.vueJoueur);
                break;
            case "EST":
                for (var y = this.distanceVue; y >= 0; y--) {
                    if (this.joueurY < carte.length) {
                        if (this.joueurY > 0) {
                            if (this.joueurX + y < carte[0].length) {
                                if (this.joueurX > 0) {
                                    this.vueJoueur[indexTableau][0] = carte[this.joueurY - 2][this.joueurX + y];
                                    this.vueJoueur[indexTableau][1] = carte[this.joueurY - 1][this.joueurX + y];
                                    this.vueJoueur[indexTableau][2] = carte[this.joueurY][this.joueurX + y];
                                    this.vueJoueur[indexTableau][3] = carte[this.joueurY + 1][this.joueurX + y];
                                    this.vueJoueur[indexTableau][4] = carte[this.joueurY + 2][this.joueurX + y];
                                }
                            }
                        }
                    }
                    indexTableau--;
                }
                console.log(this.vueJoueur);
                break;
            case "OUEST":
                for (var y = this.distanceVue; y >= 0; y--) {
                    if (this.joueurY < carte.length) {
                        if (this.joueurY > 0) {
                            if (this.joueurX < carte[0].length) {
                                if (this.joueurX - y >= 0) {
                                    this.vueJoueur[indexTableau][4] = carte[this.joueurY - 2][this.joueurX - y];
                                    this.vueJoueur[indexTableau][3] = carte[this.joueurY - 1][this.joueurX - y];
                                    this.vueJoueur[indexTableau][2] = carte[this.joueurY][this.joueurX - y];
                                    this.vueJoueur[indexTableau][1] = carte[this.joueurY + 1][this.joueurX - y];
                                    this.vueJoueur[indexTableau][0] = carte[this.joueurY + 2][this.joueurX - y];
                                }
                            }
                        }
                    }
                    indexTableau--;
                }
                console.log(this.vueJoueur);
                break;
        }
    };

    //créer la vue du joueur
    this.creationDeLaVue = function (canvas, ctx) {
        this.centerX = canvas.width / 2;
        this.centerY = canvas.height / 2.5;

        ctx.beginPath();
        ctx.moveTo(this.centerX, this.centerY);
        ctx.lineTo(0, 0);
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(this.centerX, this.centerY);
        ctx.lineTo(canvas.width, 0);
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(this.centerX, this.centerY);
        ctx.lineTo(canvas.width, canvas.height);
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(this.centerX, this.centerY);
        ctx.lineTo(0, canvas.height);
        ctx.stroke();

        for (var i = 150; i < 800; i += 200) {
            this.tailleTile = i;
            this.posX = this.tailleTile / 2;
            this.posY = (this.posX / 5) * 4;

            ctx.rect(this.centerX - this.posX, this.centerY - this.posY, this.tailleTile, this.tailleTile);
            if (i < 160) {
                ctx.fill();
            } else {
                ctx.stroke();
            }
        }
    };
}
