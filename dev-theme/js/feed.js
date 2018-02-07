//  feed js document

var thisId = function(id){ return document.getElementById(id); },
imageHolders = document.getElementsByClassName('images');

//  infScroll stuff

var elem = document.querySelector('#main'),
infScroll = new InfiniteScroll( elem, {
    path: '.pagination__next',
    append: '.post',
    history: 'push',
    hideNav: '.pagination__next'
});

var infScroll = new InfiniteScroll( '#main', {
    // options
});

//  infScroll events

infScroll.on( 'request', function( path ) {  //  request
    thisId('loader-1').style.opacity = '1';
})

infScroll.on( 'append', function( response, path, items ) {  //  append
    //defineLayouts();
    setTimeout(function(){
        thisId('loader-1').style.opacity = '0';
    }, 200);
});

infScroll.on( 'last', function( response, path ) {  //  last posts
    pbDetect();
});

//  detect page bottom

function pbDetect(){
    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            thisId('arrow-up').style.display = 'block';
            thisId('arrow-up').style.opacity = '1';
        }
    };
}

//  scroll to top

function scrollToTop(){
    window.scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
    });
    setTimeout(function(){ thisId('arrow-up').style.opacity = '0'; }, 2000);
    setTimeout(function(){ thisId('arrow-up').style.display = 'none'; }, 3000);
}
thisId('arrow-up').addEventListener('click', scrollToTop);
