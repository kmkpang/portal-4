(function(){
             
var background = {"state":{"normal":{"required_opacity":false,"opacity":0,"required_transition":true,"transition":0.3,"type":"classic","properties":{"size":"cover","color":"","src":"","parallax_method":"css","position":"center","blend":"normal","parallax":false,"required_parallax":true,"repeat":"no-repeat"}},"hover":{"required_opacity":false,"opacity":0,"required_transition":true,"transition":0.3,"type":"classic","properties":{"size":"cover","color":"","src":"","parallax_method":"css","position":"center","blend":"normal","parallax":false,"required_parallax":true,"repeat":"no-repeat"}}}}

if( !_.isEmpty(background) ) {
  if( background.state.normal.type == "video" ) {
    if(!background.state.normal.properties.url.media){
      var source = background.state.normal.properties.url.url;
    }else{
      var source = FILE_MANAGER_ROOT_URL + background.state.normal.properties.url.media.video
    }
    
    if( ! jQuery("script#backgroundjs").length ) {
      var inlineScript = document.createElement("script");

      inlineScript.src = QUIX_ROOT_URL + "libraries/quix/assets/js/background.js";
      inlineScript.id = "backgroundjs"
      document.head.appendChild(inlineScript);

      var link = document.createElement('link');
      link.href = QUIX_ROOT_URL + "libraries/quix/assets/css/background.css";
      link.rel = "stylesheet";

      document.head.appendChild(link);

      setTimeout(function() {
        jQuery("#qx-section-692 .qx-background-video-container").background({
          source: {
                        poster: "",
            mp4: source
          }
        });
      }, 500)
    } else {
      jQuery("#qx-section-692 .qx-background-video-container").background({
        source: {
                    poster: "",
          mp4: source
        }
      });
    }
  }
}

// loading children ( ROW ) script...
   // loading children ( COLUMN ) script...
   // loading children ( ELEMENT ) script...
  
  
  
  
            }());