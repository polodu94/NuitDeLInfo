(function($){

	// Si on veut appeller sans le sÃ©lecteur :)
	$.notif = function(options){
		$('body').notif(options);
	}

	$.fn.notif = function(options){

		/**
		* ParamÃ¨tres par dÃ©faut
		**/
		var settings = {
			html : '<div class="notification {{cls}}">\
          <div class="left">\
          	{{#icon}}\
            <div class="icon">\
              {{{icon}}}\
            </div>\
            {{/icon}}\
            {{#img}}\
            <div class="img" style="background-image:url({{img}});"></div>\
            {{/img}}\
          </div>\
          <div class="right">\
            <h2>{{title}}</h2>\
            <p>{{content}}</p>\
          </div>\
        </div>',
        	icon : '&#953;',
        	timeout:3000
		}

		// Icons par dÃ©faut si on a success ou error
		if(options.cls == 'error'){
			settings.icon = '&#10007;'
		}
		if(options.cls == 'success'){
			settings.icon = '&#10003;'
		}

		// On fusionne les paramÃ¨tres par dÃ©faut et les options de la fonctions
		var options = $.extend(settings, options);

		return this.each(function(){
			var $this = $(this);
			var $notifs = $('> .notifications', this);
			var $notif = $(Mustache.render(options.html, options));

			// On a dÃ©jÃ  notre conteneur .notifications ?
			if($notifs.length == 0){
				$notifs = $('<div class="notifications"/>');
				$this.append($notifs);
			}


			$notifs.append($notif);
			if(options.timeout){
				setTimeout(function(){
					$notif.trigger('click');
				},options.timeout)
			}
			$notif.click(function(event){
				event.preventDefault();
				$notif.addClass('out').delay(500).slideUp(300, function(){
					if($notif.siblings().length == 0){
						$notifs.remove();
					}
					$notif.remove();
				});
			})

		})

	}


})(jQuery);