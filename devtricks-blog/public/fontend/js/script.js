const WEIGHTS = {
  MIN: 100,
  MAX: 900,
};
const SLANT = {
  MIN: 1,
  MAX: 12,
}
const WIDTH = {
  MIN: 75,
  MAX: 100,
}
let offset = 0;
Splitting();

const letters = document.querySelectorAll('.char');
let numLetters = letters.length;

// letters.forEach((letter, index) => {
//   const indexNorm = index / letters.length;
//   const weight = map(indexNorm, 0, 1, WEIGHTS.MIN, WEIGHTS.MAX);
//   letter.style.setProperty('--text-weight', weight);
// });

window.requestAnimationFrame(loop);

function loop() {
  letters.forEach((letter, index) => {
    let offsetIndex = (index + offset) % numLetters;
    let indexNorm = offsetIndex / numLetters;
    indexNorm = mirror(indexNorm);
    const weight = map(indexNorm, 0, 1, WEIGHTS.MIN, WEIGHTS.MAX);
    const slant = map(indexNorm, 0, 1, SLANT.MIN, SLANT.MAX);
    const width = map(indexNorm, 0, 1, WIDTH.MIN, WIDTH.MAX);
    const hue = map(indexNorm, 0, 1, 0, 255);
    const glowSize = map(indexNorm, 0, 1, 0, 100);
    letter.style.setProperty('--text-weight', weight);
    letter.style.setProperty('--text-slant', slant);
    letter.style.setProperty('--text-width', width);
    letter.style.setProperty('--glow-hue', hue);
    letter.style.setProperty('--glow-size', glowSize);
  });
  offset += 0.125;
  requestAnimationFrame(loop);
}

// HELPERS
function map(value, min1, max1, min2, max2) {
  return (value - min1) * (max2 - min2) / (max1 - min1) + min2;
}
function mirror(val) {
  return Math.abs(val * 2 - 1) * -1 + 1;
}


(function($) {
$.fn.menumaker = function(options) {
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) {
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);



$(document).ready(function() {

    var counters = $(".bar");
    var countersQuantity = counters.length;
    var counter = [];

    for (i = 0; i < countersQuantity; i++) {
        counter[i] = parseInt(counters[i].innerHTML);
    }

    var count = function(start, value, id) {
        var localStart = start;
        setInterval(function() {
            if (localStart < value) {
                localStart++;
                counters[id].innerHTML = localStart;
            }
        }, 40);
    };

    for (j = 0; j < countersQuantity; j++) {
        count(0, counter[j], j);
    }
});
function setCookie(data) {
  let cname = data.name;
   let cvalue = data.value;
   let exdays = data.day;
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
setCookie({
    name:'backbround',
    value:'#333',
    day:1
})
console.log(getCookie('backbround'));
function configBackground() {
    let dom =  $(".list-config li a");
    $(dom).click(function () {
        let objects = $(this);
        let href = objects.attr('href');
        if (!objects.hasClass('active')){
            objects.addClass('active');
            if (href.includes("#moon") == true) {
                //.panel,.card,.card-header
                $('.panel').addClass('dark');
                $('.card').addClass('dark');
                $('.card-header').addClass('dark');
                $("#app").css({
                    'background':'#333',
                })
                $(".site-footer").css({
                    'background':'#333',
                })
            }
            else{
                $('.panel').removeClass('dark');
                $('.card').removeClass('dark');
                $('.card-header').removeClass('dark');
            }
        }
        else{
            dom.removeClass('active');
        }

    })
}
configBackground();
