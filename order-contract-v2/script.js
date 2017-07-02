$(document).ready(function(){
    $('#service-categories').on('change', function() {
      if ( this.value == 'standard-beauty')
      {
        $("#standard-beauty-services").show();
      }
      else
      {
        $("#standard-beauty-services").hide();
      }
    });
    $('#service-categories').on('change', function() {
      if ( this.value == 'bridal')
      {
        $("#bridal-services").show();
      }
      else
      {
        $("#bridal-services").hide();
      }
    });
    $('#service-categories').on('change', function() {
      if ( this.value == 'photoshoots')
      {
        $("#photoshoot-services").show();
      }
      else
      {
        $("#photoshoot-services").hide();
      }
    });
    $('#service-categories').on('change', function() {
      if ( this.value == 'mortuary')
      {
        $("#mortuary-makeup").show();
      }
      else
      {
        $("#mortuary-makeup").hide();
      }
    });
    $("#submit").click(function(){
        $("#iframe").show();
        $("#iframe-2, #iframe-3, #iframe-4").hide();
    });
    $("#submit").click(function(){
        $("#contract").show();
    });

    $("#submit-2").click(function(){
        $("#iframe-2").show();
        $("#iframe, #iframe-3, #iframe-4").hide();
    });
    $("#submit-2").click(function(){
        $("#contract").show();
    });

    $("#submit-3").click(function(){
        $("#iframe-3").show();
        $("#iframe, #iframe-2, #iframe-4").hide();
    });
    $("#submit-3").click(function(){
        $("#contract").show();
    });

    $("#submit-4").click(function(){
        $("#iframe-4").show();
        $("#iframe, #iframe-2, #iframe-3").hide();
    });
    $("#submit-4").click(function(){
        $("#contract").show();
    });

    
});

