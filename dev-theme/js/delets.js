//  js document

var thisId = function(id){ return document.getElementById(id); },
    imageHolders = document.getElementsByClassName('images');

//  infScroll stuff

var elem = document.querySelector('#main');
var infScroll = new InfiniteScroll( elem, {
    path: '.pagination__next',
    append: '.post',
    history: false,
});

var infScroll = new InfiniteScroll( '#main', {
    // options
});

//  infScroll events

infScroll.on( 'request', function( path ) {  //  request
    thisId('loader-1').style.opacity = "1";
})

infScroll.on( 'append', function( response, path, items ) {  //  append
    defineLayouts();
    setTimeout(function(){
        thisId('loader-1').style.opacity = "0";
    }, 1000);
});

//  image layout

// function defineLayouts(){
//     for (i = 0; i < imageHolders.length; i++){
//         var imgSet = imageHolders[i].getElementsByTagName("img"),
//             imgSetTotal = imageHolders[i].getElementsByTagName("img").length;
//         if(imgSetTotal == 2){  //  2 images
//             imgSet[0].setAttribute('class', 'imgs-2-opt-1');
//             imgSet[1].setAttribute('class', 'imgs-2-opt-2');
//         } else if(imgSetTotal == 3){  //  3 images
//             imgSet[0].setAttribute('class', 'imgs-3-opt-1');
//             imgSet[1].setAttribute('class', 'imgs-3-opt-2');
//             imgSet[2].setAttribute('class', 'imgs-3-opt-3');
//         } else if(imgSetTotal == 4){  //  4 images
//             imgSet[0].setAttribute('class', 'imgs-4-opt-1');
//             imgSet[1].setAttribute('class', 'imgs-4-opt-2');
//             imgSet[2].setAttribute('class', 'imgs-4-opt-3');
//             imgSet[3].setAttribute('class', 'imgs-4-opt-4');
//         } else if(imgSetTotal == 5){  //  5 images
//             imgSet[0].setAttribute('class', 'imgs-5-opt-1');
//             imgSet[1].setAttribute('class', 'imgs-5-opt-2');
//             imgSet[2].setAttribute('class', 'imgs-5-opt-3');
//             imgSet[3].setAttribute('class', 'imgs-5-opt-4');
//             imgSet[4].setAttribute('class', 'imgs-5-opt-5');
//         } else if(imgSetTotal == 6){  //  6 images
//             imgSet[0].setAttribute('class', 'imgs-6-opt-1');
//             imgSet[1].setAttribute('class', 'imgs-6-opt-2');
//             imgSet[2].setAttribute('class', 'imgs-6-opt-3');
//             imgSet[3].setAttribute('class', 'imgs-6-opt-4');
//             imgSet[4].setAttribute('class', 'imgs-6-opt-5');
//             imgSet[5].setAttribute('class', 'imgs-6-opt-6');
//         } else if(imgSetTotal == 7){  //  7 images
//             imgSet[0].setAttribute('class', 'imgs-7-opt-1');
//             imgSet[1].setAttribute('class', 'imgs-7-opt-2');
//             imgSet[2].setAttribute('class', 'imgs-7-opt-3');
//             imgSet[3].setAttribute('class', 'imgs-7-opt-4');
//             imgSet[4].setAttribute('class', 'imgs-7-opt-5');
//             imgSet[5].setAttribute('class', 'imgs-7-opt-6');
//             imgSet[6].setAttribute('class', 'imgs-7-opt-7');
//         }
//     }
// }

function defineLayouts(){
    for (i = 0; i < imageHolders.length; i++){
        var imgSet = imageHolders[i].getElementsByTagName("img"),
            imgSetTotal = imageHolders[i].getElementsByTagName("img").length;
        for (j = 1; j < imgSetTotal + 1; j++){
            var imgClass = 'imgs-' + imgSetTotal + '-opt-' + j +'',
                imgNum = j - 1;
            imgSet[imgNum].setAttribute('class', imgClass);
        }
    }
}

defineLayouts();
