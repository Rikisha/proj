    window.onload = function(){
    /*var pageScroll = function(id){
      $("#" + id).click(function() {
              $(".nav li").removeClass("active");
              $("." + id).ScrollTo({
                easing: 'linear',
              });
              $(".nav #" + id).parent().addClass("active");
            });
    };
    pageScroll("home");
    pageScroll("services");
    pageScroll("portfolio");
    pageScroll("welcome");
    pageScroll("prices");
    pageScroll("contact");
    var toHome = function(cl){
      $("." + cl).click(function(){
        $(".nav li").removeClass("active");
        $(".home").ScrollTo(); 
        $("#home").parent().addClass("active");
      });
    };
    toHome("navbar-brand");
    toHome("back");

    document.querySelector(".services").browserlocationchange   = function(){
      console.log("Usługi");
    };*/
    /* ==========================================================================
       Scrolling
       ========================================================================== */
    
    var offsetHeight = 120; 
    $('.navbar li a').click(function(event) {
      event.preventDefault();
      $($(this).attr('href'))[0].scrollIntoView();
      scrollBy(0, -offsetHeight);
    });

  


    $('body').scrollspy({ target: '.navbar-collapse', offset: offsetHeight,  });   
    /* ==========================================================================
       Carousel
       ========================================================================== */
    $('.carousel').carousel({
        interval: 4000
      })

    /* ==========================================================================
       Portfolio filters
       ========================================================================== */
    $(document).ready(function() {

  // get the action filter option item on page load
  var $filterType = $('#filterOptions li.active a').attr('class');
  
  // get and assign the ourHolder element to the
  // $holder varible for use later
  var $holder = $('ul.ourHolder');

  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();

  // attempt to call Quicksand when a filter option
  // item is clicked
  $('#filterOptions li a').click(function(e) {
    // reset the active class on all the buttons
    $('#filterOptions li').removeClass('active');
    
    // assign the class of the clicked filter option
    // element to our $filterType variable
    var $filterType = $(this).attr('class');
    $(this).parent().addClass('active');
    
    if ($filterType == 'all') {
      // assign all li items to the $filteredData var when
      // the 'All' filter option is clicked
      var $filteredData = $data.find('li div');
    } 
    else {
      // find all li elements that have our required $filterType
      // values for the data-type element
      var $filteredData = $data.find('li div[data-type=' + $filterType + ']');
    }
  
    // call quicksand and assign transition parameters
    $holder.quicksand($filteredData, {
      duration: 1000,
      easing: "easeInQuad"
    });
    return false;
  });
});
/* ==========================================================================
   Validate email
   ========================================================================== */
   $("#commentForm").validate({
    submitHandler: function(form) {
    $(".send_mail").hide();
    $(".cmxform").hide();
    $(".contact").css({"height": "290px"});
    $(".send_text").append('Dziękujemy, wiadomość wysłana');
    //form.submit();
        $.ajax({
          type: "POST",
          url: "/mailer/send.php",
          data: {
            name: $("#cname").val(),
            email: $("#cemail").val(),
            text: $("#ccomment").val()
          },
          success: function(data){
              console.log(data);
              if(data.status == "success"){
                // komunikat o wyslaniu maila
              } else if(data.status == "fail"){
                //komunikat o błędach
              } else {
                //fail
              }
          },
          dataType: 'json'
        });
    }
   });

   /* ==========================================================================
      Services carousel
      ========================================================================== */
    var service = $( ".service" );
    service.click(function(){
    for(var i=0; i <service.length; i++){
      service[i].className = "service";
    }
    this.className = "active";
    
   });

   /* ==========================================================================
         Service info
         ========================================================================== */
     $(".tworzenie-stron").click(function(){
      $.getJSON( "data.json", function( data ) {
        console.log(data);
      });
     });
     

}