$(document).ready(function() {
    active(); asideMenu(); inboxAside(); dropdowns();

    popShow('#otpPopTrig');

    $(window).resize(function() {
        active();

        popShow('#otpPopTrig');
    });
});

function inboxAside() {
    var scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
    var windowWidth    = $(window).width();
    var headerHGT     = $('.dHeader').outerHeight();

    var inboxBar = $('.inbox-side-col'),
    inboxIcon = $('.inbox-menuIcon');

    // var inboxOff = $('.inbox-panel').offset().top;
    //
    // inboxIcon.css({
    //     top : inboxOff - 58
    // });

    inboxIcon.on("click", function() {
        event.stopPropagation();
        inboxBar.toggleClass("active");
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.inbox-side-col').length) {
            inboxBar.removeClass("active");
            $('html').removeAttr('style');
        }
    });

    var x = false;
    inboxIcon.click(function() {
        if (x == false) {
            $('html').css({
                'overflow'      : 'hidden',
                'padding-right' : scrollbarWidth
            });
            x = true;

        } else {
            $('html').removeAttr('style');
            x = false;
        }
    });
}

function asideMenu() {
    var scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
    var windowWidth    = $(window).width();
    var headerHGT     = $('.dHeader').outerHeight();

    var navBar = $('.daside'),
    headerLogo = $('.dlogo a'),
    menuLines = $('.dMenuTrig');

    if (windowWidth <= 1199) {
        navBar.css({
            'top'   : headerHGT
        });
    } else {
        navBar.removeAttr("style");
    }

    menuLines.on("click", function() {
        event.stopPropagation();
        navBar.toggleClass("asideActive");
        headerLogo.toggleClass("active");
        $('.dRow').toggleClass("active");
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.daside').length) {
            navBar.removeClass("asideActive");
            $('.dRow').removeClass("active");
            $('.dbody').removeClass("max-w-100");
            $('html').removeAttr('style');
        }
    });
}

function popShow(popName) {
    var scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

    $(popName).click(function() {
        $('html').css({
            'overflow'      : 'hidden',
            'padding-right' : scrollbarWidth
        });

        $('.popup-modal').removeClass('active');
        $('#'+$(this).data('id')).addClass('active');
    });

    $('.popup-background, .popup-close').click(function() {
        $('html').removeAttr('style');
        $(popName).removeClass('active');
        $('.popup-modal').removeClass('active');
    });
}

function headerScroll() {
    var headerSticky = $('header');

    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if ( scrollTop ) {
            headerSticky.addClass('sticky');
        } else {
            headerSticky.removeClass('sticky');
        }
    });
}

function tabs(dataTab, dataId) {
    $(dataTab).click(function(){
        var tab_id = $(this).attr('data-tab');

        $(dataTab).removeClass('active');
        $(dataId).removeClass('active');

        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
    });
}

function active() {
    $(function($) {
        let url = window.location.href;
        $('.daside-panel .daside-item a').each(function() {
            if (this.href === url) {
                $(this).closest('.daside-item').addClass('active');
            }
        });
    });
}

function dropdowns() {
    $(".dUser-profile").click(function(){
      $(".dUser-popup").toggleClass("active");
    });

    $(document).click(function(event) {
      if (!$(event.target).closest(".dUser-popup, .dUser-profile").length) {
        $("body").find(".dUser-popup").removeClass("active");
      }
    });

    $(".dNotify").click(function(){
      $(".dNotify-popup").toggleClass("active");
    });

    $(document).click(function(event) {
      if (!$(event.target).closest(".dNotify-popup, .dNotify").length) {
        $("body").find(".dNotify-popup").removeClass("active");
      }
    });
}

$(document).ready(function() {
    activeSidebar();
});



function activeSidebar() { 
    $(function($) { 
        let url = window.location.href;
        let temp = 0;
        if(url.indexOf('?') != -1){
            url     = url.substring(0, url.indexOf('?')); 
        }
        url     = url.split("/");
        
        url     = url.splice(0, 6).join("/");

        console.log(url);
        
        $('.daside .daside-item a').each(function() {
           
            if(url.indexOf('kitchens/orders') > -1 ){
                temp = 1;
                $(this).parents('.kitchen').addClass('active');
            }else if (this.href === url) {
                $(this).closest('.daside-item').addClass('active');
                $(this).parent('li').addClass('active');
            }
        });
        
        //Admin if tow level child menu then
        $('.daside .daside-item  > ul li a ').each(function() {

            if(url.indexOf('approval-request/approved') > -1 || url.indexOf('approval-request/pending') > -1  || url.indexOf('approval-request/hold') > -1   || url.indexOf('approval-request/rejected') > -1){

                $('.approval_parent').addClass('active').addClass('selected');
                $('.approval_child').addClass('active').css('display','block');
                $('.approval_child_1').addClass('active');

            }if(url.indexOf('approval-request-assigned/approved') > -1 || url.indexOf('approval-request-assigned/pending') > -1  || url.indexOf('approval-request-assigned/hold') > -1   || url.indexOf('approval-request-assigned/rejected') > -1){

                $('.approval_parent').addClass('active').addClass('selected');
                $('.approval_child').addClass('active').css('display','block');
                $('.approval_child_2').addClass('active');

            }else if (this.href === url) {
                
                $(this).closest('.has-child').addClass('selected');
                $(this).closest('.dropdown-menu').addClass('active').css('display','block');

            }
        });

        //Front if tow level child menu then
        
        if(temp == 0){
            $('.daside .daside-item > ul li a ').each(function() {
                url    = url.split("/");
                url    = url.splice(0, 5).join("/");
                
               if (this.href === url) {
                    
                    $(this).closest('.has-child').addClass('selected');
                    $(this).closest('.dropdown-menu').addClass('active').css('display','block');

                }
            });
        }
        
        
    });

}
