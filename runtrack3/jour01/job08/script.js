function sommenombrespremiers(x,y) {
    for (let j = 2; j < x; j++)
        if (x % j == 0)
            return false;
            for (let k = 2; k < y; k++)
                if (y % k == 0)
                    return false;

    return x + y;
}
document.write(sommenombrespremiers(2, 7));