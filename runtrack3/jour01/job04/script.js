
function bisextile(annee){

    var s = annee % 4;
    if(s==0)
        s = annee % 100;
    else
        return false
    if(s==0)
        s = annee % 400;
    else
        return false
    if(s==0)
        return true;
    else
        return false
}
console.log(bisextile(2000));
