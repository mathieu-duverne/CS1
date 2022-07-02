function tri(numbers, order){
    console.log("oui");
    for(let a = 0;a <= numbers.length;a++)
    {
        if(order=="asc"){
        if(numbers[a+1] < numbers[a]){
            let order = "asc";
            let easy = numbers[a];
            numbers[a] = numbers[a+1];
            numbers[a+1] = easy;
            console.log(numbers[a]);
            tri(numbers , order);
        }
    }
    if(order=="desc"){
        if(numbers[a+1] > numbers[a]){
            let order = "desc";
            let easy = numbers[a];
            numbers[a] = numbers[a+1];
            numbers[a+1] = easy;
            tri(numbers, order);
        }
    }
}
    return numbers;
}
let numbers = [3,6,2,1,5];
let order = "asc";
document.write(tri(numbers, order)); 