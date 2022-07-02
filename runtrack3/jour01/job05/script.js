function afficherjourssemaines(){
var jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
// jours.forEach(element => document.write(element));
for(var i = 0; i < jours.length;i++){
    document.write(" ");
    document.write(jours[i]);
    }
}
afficherjourssemaines();