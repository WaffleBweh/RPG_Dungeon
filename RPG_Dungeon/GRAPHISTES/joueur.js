/* 
 * AUTEUR      : Haury, De Biasi, Salvi, Bartiban, Panniz
 * DATE        : 05.11.2015
 * VERSION     : 1.0
 * DESCIRPTION : Classe joueur - contient la direction du joueur, et permet de
 *               dessiner la vue, via les informations de la classe niveau.
 */


//Constructeur de la classe joueur
function joueur()
{
    this.direction = "NORD"; //valeurs possibles : NORD-SUD-EST-OUEST
    //direction = direction donnée par les architèctes
    
    this.distanceVue = 4;
    
    this.joueurX;
    this.joueurY;
    
    this.vueJoueur = [
        [1,1,1,1,1],
        [1,1,1,1,1],
        [1,1,1,1,1],
        [1,1,1,1,1],
        [1,NULL,1,1,1]
    ];

    //formule pour calculer les plans


    //créer la vue du joueur
    this.creationDeLaVue = function(canvas, ctx) {
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
            if (i < 160){
                ctx.fill();
            } else {
                ctx.stroke();
            }
        }
    };
}
