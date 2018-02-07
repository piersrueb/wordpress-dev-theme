//  single page js

//  image layouts

var thisId = function(id){ return document.getElementById(id); },
    imageHolders = document.getElementsByClassName('images');

function defineLayouts(){
    for (i = 0; i < imageHolders.length; i++){
        var imgSet = imageHolders[i].getElementsByTagName('img'),
            imgSetTotal = imageHolders[i].getElementsByTagName('img').length;
        for (j = 1; j < imgSetTotal + 1; j++){
            var imgClass = 'imgs-' + imgSetTotal + '-opt-' + j +'',
                imgNum = j - 1;
            imgSet[imgNum].setAttribute('class', imgClass);
        }
    }
}
defineLayouts();
