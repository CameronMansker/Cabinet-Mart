
<?php
/**
 * Custom Menu Walkers
 */

// Primary Menu Walker
class Walker_Nav_Menu_Custom extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-link';
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= '<a href="' . esc_url($item->url) . '"' . $class_names . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
}

// Mobile Menu Walker
class Walker_Nav_Menu_Mobile extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        $output .= '<a href="' . esc_url($item->url) . '" class="py-2 border-b border-gray-100">';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
}

// Footer Menu Walker
class Walker_Nav_Menu_Footer extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li>';
        $output .= '<a href="' . esc_url($item->url) . '" class="text-muted-foreground text-sm hover:text-copper transition-colors duration-200">';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
        $output .= '</li>';
    }
}
