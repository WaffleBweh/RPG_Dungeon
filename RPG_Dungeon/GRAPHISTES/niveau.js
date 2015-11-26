/* 
 * AUTEUR      : Haury, De Biasi, Salvi, Bartiban, Panniz
 * DATE        : 5.11.2015
 * VERSION     : 1.0
 * DESCIRPTION : Classe niveau - permet de stocker toutes les informations relatives
 *               au niveau.
 */


    var carte = [
        [1,1,1,1,1,1],
        [1,1,0,0,0,0],
        [0,0,2,1,1,1],
        [1,1,0,1,1,1],
        [1,1,1,1,1,1]
    ];    
    var faces = [];

//constructeur de la classe niveau
function niveau()
{
    //carte = tableau donné par les architectes
    this.carte = [
        [1,1,1,1,1,1],
        [1,0,0,0,1,1],
        [1,0,2,1,1,1],
        [1,1,0,1,0,1],
        [1,1,1,1,1,1]
    ];
    
    this.faces = [

        "Sol1.png",
        "Sol2.png",
        "Sol3.png",
        "Sol4.png",
        
        "Plafond1.png",
        "Plafond2.png",
        "Plafond3.png",
        "Plafond4.png",
        
        "MurFace1.png",
        "MurFace2.png",
        "MurFace3.png",
        "MurFace4.png",
        
        "MurCoteD1.png",
        "MurCoteD2.png",
        "MurCoteD3.png",
        "MurCoteD4.png",
        
        "MurCoteG1.png",
        "MurCoteG2.png",
        "MurCoteG3.png",
        "MurCoteG4.png"
    ];
    
}
/* 
 * AUTEUR      : Haury, De Biasi, Salvi, Bartiban, Panniz
 * DATE        : 5.11.2015
 * VERSION     : 1.0
 * DESCIRPTION : Classe niveau - permet de stocker toutes les informations relatives
 *               au niveau.
 */

//constructeur de la classe niveau
function niveau()
{
    //carte = tableau donné par les architectes
    this.carte = [
        [1,1,1,1,1,1],
        [1,0,0,0,1,1],
        [1,0,2,1,1,1],
        [1,1,0,1,0,1],
        [1,1,1,1,1,1]
    ];
    
    this.faces = [
        "Sol1.png",
        "Sol2.png",
        "Sol3.png",
        "Sol4.png",
        
        "Plafond1.png",
        "Plafond2.png",
        "Plafond3.png",
        "Plafond4.png",
        
        "MurFace1.png",
        "MurFace2.png",
        "MurFace3.png",
        "MurFace4.png",
        
        "MurCoteD1.png",
        "MurCoteD2.png",
        "MurCoteD3.png",
        "MurCoteD4.png",
        
        "MurCoteG1.png",
        "MurCoteG2.png",
        "MurCoteG3.png",
        "MurCoteG4.png"
    ];
    
}
// Creations de divers fichiers 	+ joueur.js - ajout de la distance de la vue (propriété) 	+ joueur.js - initialisation du tableau de la vue du joueur à 99 (99 -> vide) 	+ TEMP.html - correction d'un bug pour trouver la position du joueur 	+ TEMP.html - commencement de la fonction de création de la vue en fonction de la direction (InitialisationTableauValue)[Manque EST/OUEST]
