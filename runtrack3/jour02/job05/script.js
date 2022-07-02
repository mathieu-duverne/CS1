let scroll = document.querySelector('#scroll');
document.addEventListener("scroll", function scroller(length){
        let percent = (window.scrollY / 3495) * 100;
        const colorBase = chroma.hcl(40, percent, 100).hex()
        //change id scrool footer ici style background par colorBase
        // console.log(window.scrollY);
        scroll.style.background = colorBase;
})
