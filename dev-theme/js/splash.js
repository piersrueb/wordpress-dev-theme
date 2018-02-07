//  splash js

var thisId = function(id){ return document.getElementById(id); };
window.addEventListener('resize', splashPos);
window.addEventListener('load', splashPos);

function splashPos(){
    var winHeight = window.innerHeight,
        splashHeight = thisId('flicker-logo').clientHeight,
        x = winHeight - splashHeight,
        margTop = x / 2;
    thisId('flicker-logo').style.marginTop =  margTop + 'px';
}
splashPos();

//  flicker

function flicker(){
    var myInterval = Math.floor(Math.random() * 1000) + 50;
    setTimeout(function(){
        thisId('flicker-holder').setAttribute('class', 'flicker-holder-on');
        setTimeout(function(){
            thisId('flicker-holder').setAttribute('class', '');
            flicker();
        }, 20);
    }, myInterval);
}
flicker();
