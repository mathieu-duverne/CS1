function jourtravaille(ladates){
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const joursferie = [
        new Date (2020,0,1),
        new Date(2020,3,14),
        new Date(2020, 4,1),
        new Date(2020, 4,8),
        new Date(2020, 4,21),
        new Date(2020, 5,1),
        new Date(2020, 6,14),
        new Date(2020,7,15),
        new Date(2020,10,1),
        new Date(2020,10,11),
        new Date (2020,11,25)
    ];
    for(let i = 0; i <=joursferie.length;i++){
        if(joursferie[i].getTime() === ladates.getTime())
            document.write( " " +  new Intl.DateTimeFormat('fr-FR', options).format(ladates)  + " " + ' est un jours ferié');
        else if(ladates.getDay()==0 || ladates.getDay()==6)
            document.write("Non " + new Intl.DateTimeFormat('fr-FR', options).format(ladates) + "Jour de week-end");
        else
            document.write("Le " +  new Intl.DateTimeFormat('fr-FR', options).format(ladates)  + " Jour de Travaille");
        break;
    }

}
var ladates = new Date(2020, 0, 1);
jourtravaille(ladates);