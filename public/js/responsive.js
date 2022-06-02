
let breakPoint = 1000

$(document).ready(() => {


    responsive()

    let market_list = $('#market-list')

    if (market_list.height() >= 400) {
        market_list.css('overflow-y', 'scroll').css('height', '400px')
    }

    mediaQuery()

    $(window).resize(function () {

        mediaQuery()

    })


    $('.filter-white').attr('style', 'filter: invert(100%) sepia(6%) saturate(25%) hue-rotate(264deg) brightness(106%) contrast(100%);')

    $('.filter-green').attr('style', 'filter: invert(28%) sepia(99%) saturate(1102%) hue-rotate(90deg) brightness(96%) contrast(104%);')

    $('.filter-red').attr('style', 'filter: invert(22%) sepia(98%) saturate(7344%) hue-rotate(0deg) brightness(95%) contrast(116%);')
})

function responsive() {
    let innerHW = window.innerHeight
    let innerHD = $('main').height()

    if (innerHW > innerHD) {
        $('#main-container').css('height', innerHW + 'px')
    }
}

function mediaQuery() {
    if (window.innerWidth < breakPoint) {

        breakpoint()

    } else {

        normal()

    }
}

function breakpoint() {
    //NAV STYLE 
    $('header').removeClass().addClass('resized')
    $('#nav-container').removeClass().addClass('navbar navbar-expand-md bg-dark ')
    $('#main-nav').removeClass().addClass('w-100 d-flex flex-row ')
    $('#navigation').removeClass().addClass('navbar-nav ml-auto nav-pills');
    $('#navigation #dropdown>div').removeClass('dropup')

    $('#nav-container #dropdown').addClass('ml-auto')

    //MAIN STYLE
    $('main').removeClass().addClass('main-resized bg-light')


    $('#main-nav').removeClass().addClass('collapse navbar-collapse')

    $('#nav-container .navbar-toggler').removeClass('d-none')

}

function normal() {
    //NAV STYLE 
    $('header').removeClass()
    $('#nav-container').removeClass().addClass('d-flex flex-column flex-shrink-0 p-3 bg-dark float-left fixed-top')
    $('#main-nav').removeClass().addClass("h-100 d-flex flex-column")
    $('#navigation').removeClass().addClass('nav nav-pills flex-column mb-auto');
    $('#nav-container #dropdown').removeClass()

    //MAIN STYLE
    $('main').removeClass().addClass('float-left bg-light main-normal')
   

    //BUTTON COLLAPSE
    $('#nav-container .navbar-toggler').addClass('d-none')
}

function confirmDialog(){
    $('#confirm-account-container').removeClass()
}

function cancelConfirm() {
    $('#confirm-account-container').addClass('d-none')
}

// function breakMD() {

//     //NAV STYLE
//     $('header').removeClass().addClass('resized')
//     $('#nav-container').removeClass().addClass('navbar navbar-expand-sm bg-dark ')
//     $('#main-nav').removeClass().addClass('w-100 d-flex flex-row ')
//     $('#navigation').removeClass().addClass('navbar-nav ml-auto nav-pills');
//     $('#navigation #dropdown>div').removeClass('dropup')

//     //MAIN STYLE
//     $('main').removeClass().addClass('main-resized bg-light')
//     $('#main-container').removeClass()



// }
