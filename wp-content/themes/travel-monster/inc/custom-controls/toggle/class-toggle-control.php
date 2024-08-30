<?php
/**
 * Travel Monster Customizer Toggle Control.
 * 
 * @package Travel_Monster
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Travel_Monster_Toggle_Control' ) ){
	/**
	 * Toggle control (modified checkbox).
    */
	class Travel_Monster_Toggle_Control extends WP_Customize_Control{
		public $type = 'toggle';
        
        public $tooltip = '';

		public $group;
		public $collapsed = true;
        
        public function to_json() {
			parent::to_json();
			
            if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			} else {
				$this->json['default'] = $this->setting->default;
			}
			
            $this->json['value']     = $this->value();
            $this->json['link']      = $this->get_link();
            $this->json['id']        = $this->id;
            $this->json['tooltip']   = $this->tooltip;
            $this->json['group']     = $this->group;
            $this->json['collapsed'] = $this->collapsed;
						
            $this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}
		}
        
        public function enqueue() {      
			// Use minified libraries if SCRIPT_DEBUG is false
			$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
			wp_enqueue_style( 'travel-monster-toggle', get_template_directory_uri() . '/inc/custom-controls/toggle' . $build . '/toggle' . $suffix . '.css', null );
			wp_enqueue_script( 'travel-monster-toggle', get_template_directory_uri() . '/inc/custom-controls/toggle' . $build . '/toggle' . $suffix . '.js', array( 'jquery' ), false, true ); //for toggle        
		}
        
		protected function content_template() {
			?>
			<div class="<# if ( ! data.collapsed ) { #>is-active<# } #><# if ( data.group ) { #>_{{ data.group }}<# } #>">
			<# if ( data.tooltip ) { #>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
			<# } #>
				<label for="toggle_{{ data.id }}">
					<span class="customize-control-title">
						{{{ data.label }}}
					</span>
					<# if ( data.description ) { #>
						<span class="description customize-control-description">{{{ data.description }}}</span>
					<# } #>
					<input {{{ data.inputAttrs }}} name="toggle_{{ data.id }}" id="toggle_{{ data.id }}" type="checkbox" value="{{ data.value }}" {{{ data.link }}}<# if ( '1' == data.value ) { #> checked<# } #> hidden />
					<span class="switch"></span>
				</label>
			</div>
			<?php
		}
	}
}