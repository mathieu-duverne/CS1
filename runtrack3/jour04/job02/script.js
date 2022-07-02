var json = {name: 'Smith',address: '3 rue de la rotonde',city: 'Marseille',}
function jsonValueKey(json, key){
document.write(key);
}
let key = json.city;
jsonValueKey(json, key);