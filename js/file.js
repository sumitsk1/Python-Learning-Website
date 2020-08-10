function colorChange() {
  $( '.text-change' ).delay(100).fadeOut(1000,function(){
  $(this).text('Web Development');
  }).fadeIn(1000).delay(1000).fadeOut(1000,function(){
  $(this).text('Machine Learning');
  }).fadeIn(1000).delay(1000).fadeOut(1000,function(){
  $(this).text('Artificial Intelligence');
  }).fadeIn(1000).delay(1000).fadeOut(1000,function(){
  $(this).text('Robotics');
  }).fadeIn(1000).delay(1000).fadeOut(1000,function(){
  $(this).text(' Automation');
  }).fadeIn(1000);
  }

  $(document).ready(function(){
  var colorLooper = setInterval(function() {
  colorChange();
  }, 1000);
  });


// hover menu nav

  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

  // end hover menu nav
  // pointer
// $(document).mousemove(function(e) {
//       $('.pointer').css({left:e.pageX,top:e.pageY});
//     });



function SearchFieldCheck(){
    var searchdata = document.forms["SearchForm"]["Search"];  
    if (searchdata.value == ""){ 
        window.alert("Please enter Something to Search"); 
        searchdata.focus(); 
        return false; 
    } 
    return true; 
}
function SignUpFieldCheck(){
    var username = document.forms["SignUp"]["UserName"];  
    var email = document.forms["SignUp"]["Email"];  
    var password = document.forms["SignUp"]["Password"];  
    if (username.value == ""){ 
        window.alert("Please Enter Your Name"); 
        username.focus(); 
        return false; 
    } 
    if (email.value == ""){ 
        window.alert("Please Enter Your Email"); 
        email.focus(); 
        return false; 
    } 
    if (password.value == ""){ 
        window.alert("Please Enter Strong Password"); 
        password.focus(); 
        return false; 
    }
    if (password.value.length <4){ 
        window.alert("Password length must be > 3 "); 
        password.focus(); 
        return false; 
    } 
    return true; 
}


// var tl = new TimelineMax()

// tl.add(
//     TweenMax.to('.heading2', 3, {opacity:1,y:-200})
//   );



// const controller = new ScrollMagic.Controller();
// const scene = new ScrollMagic.Scene({
//   triggerElement:".pydiv",
//   duration:2000,
//   triggerHook:0.5
// });

// .setTween(tl);
// .addIndicators();
// .setPin('.heading2');
// .addTo(controller);