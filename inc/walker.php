<?php

	/*

		wp_nav_menu();

		<div class="menu-container">
			<ul> // start_lvl()

				<li>
					<a>
						<span>
							// start_el();
							Link item
						</span>
					</a>
				</li> // end_el();

				<li><a>Link item</a></li>
				<li><a>Link item</a></li>
				<li><a>Link item</a></li>

			</ul> // end_lvl()
		</div>

	*/


class Walker_Nav_Primary extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ){
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0)? ' submenu': '';
		$output .= "\n$indent<ul class=\"dropdown-menu depth_$depth\">\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){

		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$li_attributes 	= '';
		$class_names	= $value = '';

		$classes 	= empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] 	= ($args->walker->has_children) ? 'dropdown' : ''; 
		$classes[]	= ($item->current || $item->current_item_anchestor) ? 'active' : '';
		$classes[]	= 'menu-item-'. $item->ID;
		if($depth && $args->walker->has_children) {
			$classes[] = 'dropdown-menu';
		}

		$class_names 	= join(' ', apply_filters( 'nav_menu_css_class', array_filter($classes), $item, $args ));
		$class_names	= ($class_names) ? 'class="'. esc_attr( $class_names ) .'"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="'. esc_attr($id) .'"': '';

		$output .= '<li'. $id . $value . $class_names . $li_attributes . '>';
 
		$attributes = !empty($item->attr_title) ? ' title="'. esc_attr( $item->attr_title ).'"': ''; 
		$attributes .= !empty($item->target) ? ' target="'. esc_attr( $item->target ).'"': ''; 
		$attributes .= !empty($item->xfn) ? ' rel="'. esc_attr( $item->xfn ).'"': ''; 
		$attributes .= !empty($item->url) ? ' href="'. esc_attr( $item->url ).'"': ''; 
		$attributes .= ( $depth == 0 ) ? ' class="nav-link"': 'class="dropdown-item"'; 
		$attributes .= ($args->walker->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"': '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . '>';
		$item_output .= $link->before . apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= ($depth == 0 && $args->walker->has_children) ? '<b class="caret"></b></a>': '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

	}


	public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){

		$output .= "</li>\n";
		
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ){

		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";

	}
	
}