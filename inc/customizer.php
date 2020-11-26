<?php
// estilos del wpadminmenubar y adminmenu
function change_bar_color() {
	?>
	<style>
		/* background and text color :
		gold #BF8E4E gold1 #CDA673 gold2 #DABE99 gold3 #E8D6BE gold -2 #7B592C
		aubergine #402634 auber1 #60394E auber2 #804C68 auber3 #A05F82 auber-1 #2B1923
		sand #D9BD9C sand1 #E2CDB5 sand2 #ECDECD sand3 #F5EEE6
		cuivre #805440 cuivre1 #A26A51 cuivre2 #B7856F cuivre3 #C8A291
		green #5A7358 green1 #71906E green2 #8DA68B green3 #A9BCA8
		*/
		
		/* areas principales: auber */
		#adminmenuback, #adminmenuwrap, div.wp-menu-name, #collapse-button button, li.hide-if-no-js, body.wp-admin li.hide-if-no-customize, body.wp-admin ul.wp-submenu, #adminmenu, #adminmenu .wp-submenu,
		#adminmenu li.wp-menu-separator, div.separator, body.wp-admin ul.wp-submenu li.wp-first-item, body.wp-admin ul.wp-submenu-wrap li.hide-if-no-customize
		#adminmenu li.wp-has-current-submenu a.wp-has-submenu.wp-has-current-submenu.wp-menu-open.menu-top, 
		#adminmenu li.current.menu-top a.current.menu-top, #wpadminbar ul.ab-submenu li.ab-sub-secondary, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
		#adminmenu div.wp-menu-arrow div:focus, #adminmenu div.wp-menu-arrow div:hover, #adminmenu div.wp-menu-arrow div, #adminmenu div.wp-menu-arrow div:active,
		#adminmenu .wp-menu-arrow div:focus, #adminmenu .wp-menu-arrow div:hover, #adminmenu .wp-menu-arrow div, #adminmenu .wp-menu-arrow div:active,
		#adminmenu div.wp-menu-arrow:focus, #adminmenu div.wp-menu-arrow:hover, #adminmenu div.wp-menu-arrow, #adminmenu div.wp-menu-arrow:active {
			background-color: #402634;
			background: #402634;
		}
		#wpadminbar, #wpadminbar ul.ab-submenu {
			background: #402634;
			color: #D9BD9C;
		}
		/* menu mobile en clic gold */
		.wp-responsive-open #wpadminbar #wp-admin-bar-menu-toggle .ab-icon:before, #wpadminbar.mobile .quicklinks .hover .ab-item:before {
			color: #BF8E4E;
		}
		/* menu mobile sand */
		#wpadminbar.mobile .quicklinks .ab-icon:before, #wpadminbar.mobile .quicklinks .ab-item:before, #wpadminbar .quicklinks .menupop ul li a {
			color: rgba(217, 189, 156, 1);
			color: #D9BD9C;
		}
		@media screen and (max-width: 782px) {
			.wp-responsive-open #wpadminbar #wp-admin-bar-menu-toggle a {
				background-color: #402634;
				background: #402634;
			}
		}
		/* iconos y texto menus: sand */
		#adminmenu a, #collapse-button:focus, #adminmenu div.wp-menu-image:before, #collapse-button {
			color: #D9BD9C;
		}
		#wpadminbar .ab-empty-item, #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon, #wpadminbar #adminbarsearch:before, #wpadminbar .ab-icon:before, #wpadminbar .ab-item:before {
			color: #D9BD9C;
		}
		#wpadminbar #wp-admin-bar-my-account.with-avatar>a img, #wpadminbar #wp-admin-bar-my-account.with-avatar>.ab-empty-item img {
			background: #D9BD9C;
			border: 1px solid #D9BD9C;
			color: rgba(217, 189, 156, 1);
		}
		/* texto menu seleccionado: gold */
		#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #collapse-button:hover, #adminmenu li.current a.menu-top, 
		#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
			color: #BF8E4E;
		}
		/* texto: (gold) y fondo: (auber1) menus mientras hover */
		#adminmenu li.menu-top:hover, li.hide-if-no-js:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus, div.wp-menu-name:hover, div.wp-menu-name:active, #adminmenu a:active, #adminmenu a:focus, #adminmenu a:hover,
		body.wp-admin ul.wp-submenu li.wp-first-item.current:hover, body.wp-admin ul.wp-submenu-wrap li:hover, body.wp-admin ul.wp-submenu-wrap li.hide-if-no-customize:hover, #adminmenu li.menu-top:hover {
			background-color: #60394E;
			background: #60394E;
			color: #BF8E4E;
		}
		/* adminbar */
		#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label, #wpadminbar .ab-top-menu>li.hover>.ab-item, 
		#wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {
			background: #60394E;
			color: #BF8E4E;
		}
		/* texto de submenus: gold */
		#adminmenu .wp-submenu a {
			color: #BF8E4E;
		}
		/* texto principal en submenu: gold3 */
		#adminmenu .opensub .wp-submenu li.current a, #adminmenu .wp-submenu li.current, #adminmenu .wp-submenu li.current a, #adminmenu .wp-submenu li.current a:focus, 
		#adminmenu .wp-submenu li.current a:hover, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu li.current a, #adminmenu .wp-submenu .wp-submenu-head {
			color: #E8D6BE;
		}
		/* texo de submenu en hover: gold2 */
		#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
			color: #DABE99;
		}
		/* icono en un menu seleccionado: gold */
		#adminmenu .current div.wp-menu-image:before, #adminmenu .wp-has-current-submenu div.wp-menu-image:before, #adminmenu a.current:hover div.wp-menu-image:before, #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, 
		#adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before {
			color: #BF8E4E;
		}
		/* iconos durante hover y clic: gold */
		#adminmenu li a:active, #adminmenu li a:hover, #adminmenu li a:focus, div.wp-menu-image:before, #adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
			color: #BF8E4E;
		}
		#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a, #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, 
		#wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus, 
		#wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover, #wpadminbar li #adminbarsearch.adminbar-focused:before, #wpadminbar li .ab-item:focus .ab-icon:before, #wpadminbar li .ab-item:focus:before, 
		#wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, 
		#wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover {
			color: #BF8E4E;
		}
		/* MENU REPLEGADO */
		/* fondo menu replegado seleccionado: auber-1 */
		#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu li.current a.menu-top, 
		.folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu, .folded #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .folded #adminmenu .wp-has-current-submenu .wp-submenu, 
		#adminmenu .wp-has-current-submenu .wp-submenu, body.wp-admin ul.wp-submenu-wrap li.wp-first-item.current, body.wp-admin ul.wp-submenu.wp-submenu-wrap li.hide-if-no-customize,
		#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu {
			background: #2B1923;
		}
		/* Personalizador Front End */
		.customize-partial-edit-shortcut button, .customize-partial-edit-shortcut button, .widget .customize-partial-edit-shortcut button {
			background: #BF8E4E !important;
			color: #E8D6BE;
			text-shadow: 0 -1px 1px #7B592C, 1px 0 1px #7B592C, 0 1px 1px #7B592C, -1px 0 1px #7B592C;
			border: 2px solid #E8D6BE;
		}
		.customize-partial-edit-shortcut button svg {
			fill: #E8D6BE;
		}
/* FALTA:
* las flechitas arrow, los submenus seleccionados en auber1, el icono del user, el submenu wP de la barra superior en fondo auber, 
* los textos y los hover de los submenus barra superior, submenu "apariencia" cuando no current,
* y al final: testear cada categoria para ver si no es superflua */

	</style>
	<?php
}
add_action('wp_head', 'change_bar_color');
add_action('admin_head', 'change_bar_color');