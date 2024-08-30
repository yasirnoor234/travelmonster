(function($){
    GettingStartedThemeAdmin = {
        init: function(){
            this._bind();
        },

        _bind: function(){
            $( document ).on('click','.install-now', GettingStartedThemeAdmin._installNow );
            $( document ).on('click','.activate-now', GettingStartedThemeAdmin._activatePlugin);
            $( document ).on('click' , '.deactivate-now', GettingStartedThemeAdmin._deactivatePlugin);
            $( document ).on('wp-plugin-install-error'   , GettingStartedThemeAdmin._installError);
            $( document ).on('wp-plugin-install-success' , GettingStartedThemeAdmin._activatePlugin);
            $( document ).on('wp-plugin-installing', GettingStartedThemeAdmin._pluginInstalling);
        },

        /**
         * Plugin Installation Error.
         */
        _installError: function( event, response ) {

            var $card = jQuery( '.install-now' );

            $card
                .removeClass( 'button-primary' )
                .addClass( 'disabled' )
                .html( wp.updates.l10n.installFailedShort );
        },

        /**
         * Installing Plugin
         */
        _pluginInstalling: function(event, args) {
            event.preventDefault();

            var slug = args.slug;

            var $card = jQuery( '.install-now' );
            var activatingText = gs_page.ActivatingText;


            $card.each(function( index, element ) {
                element = jQuery( element );
                if ( element.data('slug') === slug ) {
                    element.addClass('updating-message');
                    element.html( activatingText );
                }
            });

        },

        /**
         * Activate Success
         */
        _activatePlugin: function( event, response ) {

            event.preventDefault();

            var $message = jQuery(event.target);
            var $init = $message.data('init');
            var activatedSlug; 

            if (typeof $init === 'undefined') {
                var $message = jQuery('.install-now[data-slug=' + response.slug + ']');
                activatedSlug = response.slug;
            } else {
                activatedSlug = $init;
            }

            // Transform the 'Install' button into an 'Activate' button.
            var $init            = $message.data('init');
            var activatingText   = gs_page.ActivatingText;
            var deactivateText   = gs_page.PluginDeactivateText;
            var settingsLink     = $message.data('settings-link');
            var settingsLinkText = gs_page.SettingsText;
            var browseText       = gs_page.BrowseTemplates;

            $message.removeClass( 'install-now installed button-disabled updated-message' )
                .addClass('updating-message')
                .html( activatingText );

            // WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
            setTimeout( function() {

                $.ajax({
                    url: gs_page.ajaxUrl,
                    type: 'POST',
                    data: {
                        'action'            : 'gs-sites-plugin-activate',
                        'init'              : $init,
                    },
                })
                .done(function (result) {
                    
                    if( result.success ) {
                        var output = '<a href="#" class="deactivate-now button" data-init="'+ $init +'" data-settings-link="'+ settingsLink +'" data-settings-link-text="'+ deactivateText +'" aria-label="'+ deactivateText +'">'+ deactivateText +'</a>';
                        output += ( typeof settingsLink === 'string' && settingsLink !== '' ) ? '<a class="gs-recommended-plugin-links button" href="' + settingsLink +'" aria-label="'+ settingsLinkText +'">' + settingsLinkText +' </a>' : '';
                        outputDemo = ( typeof settingsLink === 'string' && settingsLink !== '' ) ? '<a class="gs-recommended-plugin-links button" href="' + settingsLink +'" aria-label="'+ browseText +'">' + browseText +' </a>' : '';
                        $message.removeClass( 'activate-now install-now button button-primary updating-message' );
                        $message.parent('.gs-recommended-plugin').parent('.button-now').addClass('active');
                        $message.parents('.gs-recommended-plugin').html( output );
                        $message.parents('.gs-demo-import-plugin').html( outputDemo );
                    } else {
                        $message.removeClass( 'updating-message' );
                    }

                });

            }, 1200 );

        },

        /**
         * Deactivate Success
         */
        _deactivatePlugin: function( event, response ) {

            event.preventDefault();

            var $message = jQuery(event.target);

            var $init = $message.data('init');

            if (typeof $init === 'undefined') {
                var $message = jQuery('.install-now[data-slug=' + response.slug + ']');
            }
            // Transform the 'Install' button into an 'Activate' button.
            var $init            = $message.data('init');
            var deactivatingText = $message.data('deactivating-text') || gs_page.DeactivatingText;
            var activateText     = gs_page.PluginActivateText;
            var settingsLink     = $message.data('settings-link');

            $message.removeClass( 'install-now installed button-disabled updated-message' )
                .addClass('updating-message')
                .html( deactivatingText );

            // WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
            setTimeout( function() {

                $.ajax({
                    url: gs_page.ajaxUrl,
                    type: 'POST',
                    data: {
                        'action'            : 'gs-sites-plugin-deactivate',
                        'init'              : $init,
                    },
                })
                .done(function (result) {
                    if( result.success ) {
                        var output = '<a href="#" class="activate-now button" data-init="'+ $init +'" data-settings-link="'+ settingsLink +'" data-settings-link-text="'+ activateText +'" aria-label="'+ activateText +'">'+ activateText +'</a>';
                        $message.removeClass( 'activate-now install-now button button-primary install-now activate-now updating-message' );
                        $message.parent('.gs-recommended-plugin').parent('.button-now').removeClass('active');
                        $message.parents('.gs-recommended-plugin').html( output );
                        $message.parents('.gs-demo-import-plugin').html( output );
                    } else {
                        $message.removeClass( 'updating-message' );
                    }
                });

            }, 1200 );

        },

        /**
         * Install Now
         */
        _installNow: function(event)
        {
            event.preventDefault();

            var $button = jQuery( event.target );
            $document   = jQuery(document);
            if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
                return;
            }
            if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
                wp.updates.requestFilesystemCredentials( event );

                $document.on( 'credential-modal-cancel', function() {
                    var $message = $( '.install-now.updating-message' );

                    $message
                        .addClass('activate-now')
                        .removeClass( 'updating-message install-now' )
                        .text( wp.updates.l10n.installNow );

                    wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
                } );
            }
            wp.updates.installPlugin( {
                slug: $button.data( 'slug' )
            });
        },
    }
    /**
     * Initialize GettingStartedThemeAdmin
     */
    $(function(){
        GettingStartedThemeAdmin.init();
    });
})(jQuery);