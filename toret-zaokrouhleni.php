/**
 * Plugin Name:       Toret Zaokrouhlení
 * Plugin URI:        https://toret.cz
 * Description:       Plugin řeší problém s korunovým zaokrouhlením. Kredit: Pavel Hejn - České Služby
 * Version:           1.0
 * Author:            Vladislav Musílek
 * Author URI:        http://toret.cz
 * Text Domain:       toret-zaokrouhleni
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( !function_exists( 'toret_zmena_kalkulace_dani' ) ){

	add_filter( 'woocommerce_calc_tax', 'toret_zmena_kalkulace_dani' );
	function toret_zmena_kalkulace_dani( $in ) {
  		return round( $in, wc_get_price_decimals() );
	}

}

if( !function_exists( 'toret_zmena_zaokrouhlovani_dani' ) ){
	
	add_filter( 'woocommerce_tax_round', 'toret_zmena_zaokrouhlovani_dani' );
	function toret_zmena_zaokrouhlovani_dani( $taxes ) {
  		$taxes = array_map( 'toret_sluzby_rounding', $taxes );
  		return $taxes;
	};
	function toret_sluzby_rounding( $in ) {
  		return round( $in, wc_get_price_decimals() );
	} 

}
