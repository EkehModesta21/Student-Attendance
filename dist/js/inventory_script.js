function Inventory(){
    let slideArrow1 = document.querySelector('#slideArrow1');
    let slideArrow2 = document.querySelector('#slideArrow2');
    let leftSlide = document.querySelector('#leftSlide');

    slideArrow1.addEventListener('click', function(){
        leftSlide.classList = 'left-bar-switch';
    })
    slideArrow2.addEventListener('click', function(){
        leftSlide.classList = 'left-bar';
    })

    this.constructor = function(){
        // hanDler.formVal();
        // hanDler.circleF();
    }
}
let hanDler = new Inventory();
hanDler.constructor();