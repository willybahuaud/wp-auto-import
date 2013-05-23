<?php 
/*
Plugin name: WP import
Plugin URI: http://wabeo.fr
Description: Importing new accomodations to rent or to buy
Version: 0.9
Author: Willy Bahuaud
Author URI: http://wabeo.fr/find-me/
License: cc-by
*//**
♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ 
♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ 

Description plugin et variables

♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ 
♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ ♥ 
*/

/**
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
Page d'administration
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
*/
add_action('admin_menu','ajout_page_admin');
	function ajout_page_admin(){
		add_menu_page('Importation de bien', 'Import de biens', 'manage_options', __FILE__, 'page_import_bien','',100);

	function page_import_bien(){
		?>
		<div class="wrap">
			<?php 
			// update_option('faux_flux',array('http://test.agence-moliere.com/youknowhowiambad.xml'));
			if(isset($_POST['nom_flux'])){
				check_admin_referer('url_to_parse-save', 'url_to_parse-nonce') ;

				function nettoyerrrr_balayyyyerrr_casa_toujours_pimpaaaaaannn($zoukmachine){
					return sanitize_text_field($zoukmachine);
				}
				function chicalicatan_chicalicatan($oheohe){
					return esc_url($oheohe);
				}

				$name_url = array_map("nettoyerrrr_balayyyyerrr_casa_toujours_pimpaaaaaannn", $_POST['nom_flux']);
				$flux_url = array_map("chicalicatan_chicalicatan", $_POST['url_flux']);
				update_option('name_url',$name_url);
				update_option('flux_url',$flux_url);
			}else{
				$name_url = get_option('name_url');
				$flux_url = get_option('flux_url');
			}
			screen_icon('edit'); ?>
			<h2>Importation de bien</h2>
			<form action="" method="POST">
				<table class="form-table">
				<tr>
					<th>
						<h3>Liste des urls a crawler</h3>
					</th>
				</tr>
				<tr valign="top">
					<td>
						<div id="fuckin_url_to_parse">
							<?php 
							if(!empty($name_url[0])):
							foreach($name_url as $k => $n): 
							?>
								<div class="one-url">
									<input type="text" class="nurl:text" placeholder="nom du flux" name="nom_flux[]" style="width:200px" value="<?php echo $n; ?>">
									<input type="url" class="url text" placeholder="URL du flux" name="url_flux[]" style="width:400px" value="<?php echo $flux_url[$k]; ?>">
									<button class="button-secondary fukin-bad-button">-</button>
								</div>
							<?php
							endforeach;
							else: ?>
							<div class="one-url">
								<input type="text" class="nurl:text" placeholder="nom du flux" name="nom_flux[]" style="width:200px">
								<input type="url" class="url text" placeholder="URL du flux" name="url_flux[]" style="width:400px">
								<button class="button-secondary fukin-bad-button">-</button>
							</div>
						<?php endif; ?>
						</div>
						<button class="button-secondary fukin-button">Sirus en veux plus !</button>
					</td>
				</tr>

				<tr valign="top">
					<td>
					<input type="submit" value="Enregistrer les URLs" class="button-primary" />
					</td>
				</tr>
				</table>
				<?php wp_nonce_field( 'url_to_parse-save', 'url_to_parse-nonce') ; ?>
			</form>
		</div>
		<style type="text/css">.one-url:first-of-type .fukin-bad-button{display:none;}</style>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$(document).on('click','.fukin-button',function(e){
				e.preventDefault();
				$('#fuckin_url_to_parse .one-url').last().clone().appendTo('#fuckin_url_to_parse').find('input').val('');
			});
			$(document).on('click','.fukin-bad-button',function(e){
				e.preventDefault();
				$(this).parent('.one-url').remove();
			});
		});
		</script>
		<?php
	}
}
/**
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
Mise en place du cron
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
*/
if(!wp_next_scheduled('split_my_fluxes'))
	wp_schedule_event(time(), 'daily', 'split_my_fluxes');


/**
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
Déroulement du cron
* @param ajouté le 12/11/2012 pour alléger la charge serveur
* @param précédemment crawl_my_fukin_import_bot_hook appellait directement crawl_me_baby ...
* @param get_option('flux_url') a été sorti sorti de la fonction pour être découpé
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
*/
add_action('split_my_fluxes', 'take_my_fluxes');
function take_my_fluxes(){
	$flux_url = get_option('flux_url');
	//CRON
	$delay = 3600;
	$titi = $delay;
	foreach($flux_url as $num => $flux){
		$what_flux = array($num => $flux);
		wp_schedule_single_event(time()+$titi, 'crawl_my_fukin_import_bot_hook', array($flux));
		$titi+=$delay;
	}
}

function rapproche_cron( $hook, $time ) {
    $crons = _get_cron_array();
    // die(var_dump($crons));
    if ( empty( $crons ) ) {
        return;
    }
    foreach( $crons as $timestamp => $cron ) {
        if ( ! empty( $cron[$hook] ) )  {
        	$args = $cron[key($cron)]['args'];
        	// wp_schedule_event( $timestamp-$time, '', $hook, $args );
        	$crons[$timestamp-$time] = array( key($cron) => $cron[key($cron)] );
            unset( $crons[$timestamp][$hook] );
        }
    }
    ksort( $crons );
    // $crons = array();
    _set_cron_array( $crons );
}
// rapproche_cron( 'crawl_my_fukin_import_bot_hook', 200 );

/**
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
Déroulement du cron
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
*/
add_action('crawl_my_fukin_import_bot_hook', 'crawl_me_baby');
function crawl_me_baby($flux){

	// ob_start();
	// var_dump($flux_url);
	// $monflux = ob_get_clean();
	// $savelog = fopen(dirname(__FILE__).'/logs/flux/fluxxml-'.sanitize_title(rand()).'-'.date('d-m-Y').'.log','w');
	// fwrite($savelog,$monflux);
	// fclose($savelog);
	/*
	Où sont les bieeeeeeeeeeeeeeens ?
	*/
	$fluxdujourbonjour = array();
	$output ='';
	$t_o  = array();
	// foreach($flux_url as $num => $flux):
		/**
		j'essaye
		*/
		// Try
		try{
			// On se connecte et on va regarder la ...
			$file = wp_remote_get(str_replace('&#038;','&',$flux),array('timeout' => 200));
			if(!is_wp_error( $file ) ) {
				$xml  = $file['body'];
				
				//LOGS
				$savelog = fopen(dirname(__FILE__).'/logs/flux/xml-'.sanitize_title($flux).'-'.date('d-m-Y').'.log','w');
				fwrite($savelog,$xml);
				fclose($savelog);
				
				$x    = new SimpleXMLElement($xml);	
				if($x->error_code != 1){ // Si le flux est indisponible
					$fluxdujourbonjour[] = $flux;
					// Pour chacun des biens, construisons une joli key de tableau
					foreach($x as $e):
						/**
						ADD KEY DERNIER UPDATE
						*/
						$update      = strtotime($e->updated_at);
						$ref         = (string) $e->reference;
						$faux_id     = (string) $e->attributes()->id;
						$prix        = (string) $e->price;
						$charges     = (string) $e->price_fees;
						$superficie  = (string) $e->area;
						$ville       = (string) $e->city;
						$code_postal = (string) $e->zipcode;
						$nb_room     = (int) $e->rooms;
						$style       = (string) $e->style;
						$type        = ($e->attributes()->type == 2) ? 'loc' : 'vente';
						switch($e->type){
							case 1:
								$genre = 'appartement';
								break;
							case 2:
								$genre = 'maison';
								break;
							case 3:
								$genre = 'commerce';
								break;
							case 4:
								$genre = 'parking';
								break;
							case 5:
								$genre = 'terrain';
								break;
							case 6:
								$genre = 'garage';
								break;
						}
						$genre_precis = (int) $e->type_specific;
						$genre_precis = qui_suis_je($genre_precis);

						$text_content = (string) $e->comments->comment[0];

							// Combien d'énergie nous reste-il ?
							foreach($e->diagnostics->diagnostic as $d): 
								if ((string) $d->type==1){
									$energie = calcul_energie((int) $d->value);
								}
							endforeach;

							// Charge moi les images, Anakin !
							$images = array();
							foreach($e->pictures->picture as $pict): 
								$faux_id_pict = (string) $pict->attributes()->id;
								$link_picture = (string) $pict->link;
								$images[$faux_id_pict] = $link_picture;
							endforeach;

							// Où te caches-tu ?
							$caracteristiques = array();
							/*$nb_room = 0;*/
							foreach($e->roomsList->room as $room){
								$superficie_p       = (string) $room->area;
								$superficie_piece   = ($superficie_p != '') ? ' de '.$superficie_p.'m²' : '';
								$type_room          = (int) $room->type;
								/*$nb_room            = (int) $room->number;*/
								$caracteristiques[] = $room->number. ' ' . cluedo( $type_room,$nb_room).$superficie_piece;
							}

						// Mais qu'ais-je donc fais ?
						$one_out = compact('ref','faux_id','type','genre','style','text_content','prix','charges','superficie','energie','ville','code_postal','images','caracteristiques','genre_precis','nb_room','flux','update');
						if(($type == 'vente') ||(($type == 'loc') && (str_replace('&#038;','&',$flux) == 'http://intranet.apimo.com/ws.php/estate/index?partner=171&key=9029be6cae523c689ed95a02022e0103c0d15f33&agency=2386'))) //4 == AGENCE MOLIERE
							$t_o[$faux_id]   = $one_out; 
					endforeach;
				}
			}
		/**
		ou pas...
		*/
		}catch(Exception $e){
			echo $e->getMessage();
		}
		// Catch
	// endforeach;

	global $wpdb;
	// $ids = $wpdb->get_results("SELECT post_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key='_faux_id'",ARRAY_A);
	$ids = $wpdb->get_results("
		SELECT p.post_id as post_id,
        p.meta_value as meta_value,
        p2.meta_value as flux,
        p3.meta_value as update_date

        FROM {$wpdb->postmeta} p,
             {$wpdb->postmeta} p2,
             {$wpdb->postmeta} p3

        WHERE p.meta_key = '_faux_id'
        AND p2.meta_key = '_flux_originel'
        AND p3.meta_key = '_update'
        AND p.post_id = p2.post_id
        AND p.post_id = p3.post_id",
	ARRAY_A);

	$to_del = array(); $id_presents = array();
	foreach($ids as $id){
		$id_presents[$id['meta_value']] = $id['update_date'];
		if((!array_key_exists($id['meta_value'],$t_o))&&(in_array($id['flux'],$fluxdujourbonjour)))
			$to_del[$id['meta_value']] = $id['post_id'];
	}
	//LOGS
	//dans base
	ob_start();
	var_dump($ids, $id_presents);
	$inbase = ob_get_clean();
	$savelog = fopen(dirname(__FILE__).'/logs/in-base-'.date('d-m-Y').'.log','a+');
	fwrite($savelog,'Dans la base :'."\r\n".$inbase."\r\n");
	fclose($savelog);

	//dans flux
	ob_start();
	var_dump(array_keys($t_o),$t_o);
	$influx = ob_get_clean();
	$savelog = fopen(dirname(__FILE__).'/logs/in-flux-'.date('d-m-Y').'.log','a+');
	fwrite($savelog,'Dans le flux :'."\r\n".$influx."\r\n");
	fclose($savelog);

	//a suprimmer
	ob_start();
	var_dump($to_del);
	$data = ob_get_clean();
	$savelog = fopen(dirname(__FILE__).'/logs/to-delete-'.date('d-m-Y').'.log','a+');
	fwrite($savelog,'À supprimer :'."\r\n".$data."\r\n");
	fclose($savelog);
	

	$to_add = array();
	//pour chaque bien du flux (k = faux_id)
	foreach($t_o as $k => $add){
		//si pas rien dans la base...
		if(!empty($ids)){
			//si le faux id n'est pas dans la base
			if( ! array_key_exists($k, $id_presents ) ) {
				//on l'ajoute dans le tableau des ajouts
				$add[ 'a_creation' ] = true;
				$to_add[$k] = $add;
			}elseif( array_key_exists($k, $id_presents )  && ( $add['update'] > $id_presents[ $k ] ) ) {
				$add[ 'must_be_updated' ] = true;
				$to_add[$k] = $add;
			}
		}else{ //si rien dans la base
			$to_add[$k] = $add;
		}
	}
	//LOGS
	ob_start();
	var_dump($to_add);
	$data = ob_get_clean();
	$savelog = fopen(dirname(__FILE__).'/logs/to-add-'.date('d-m-Y').'.log','a+');
	fwrite($savelog,'À ajouter :'."\r\n".$data."\r\n");
	fclose($savelog);

	// Tout en une fois
	//insert_my_post($to_add);

	//Schedule de Cron
	$t = 1; //Temporalité du Cron
	$h = 0; // Pour ce Cron
	$tt = 0;
	$to_add_once = array(); // Initialisation du talbeau
	foreach($to_add as $k => $add_me){
		$to_add_once[$k] = $add_me;
		$h++;
		$tt++;
		if($h==10||$tt==count($to_add)){ // On envoie le packet
			$to_send = array($to_add_once);
			wp_schedule_single_event(time()+(900*$t), 'insert_some_biens', $to_send);

				// TO SEND
				ob_start();
				var_dump($to_send);
				$data = ob_get_clean();
				$savelog = fopen(dirname(__FILE__).'/logs/packet-add-'.date('d-m-Y').'-'.$t.'.log','a+');
				fwrite($savelog,'Paquet '.$t.' :'."\r\n".$data."\r\n");
				fclose($savelog);

			$h = 0;
			$t++;
			$to_add_once = array();
		}
	}

	del_my_post($to_del);
	
}

/**
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
Import des biens
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
*/
/***
testcds
*/
add_action('insert_some_biens', 'insert_my_post');
function insert_my_post($to_insert){
	global $wpdb;

	$log_des_insertions = array();
	// Boucle
	foreach ($to_insert as $key => $add) {
	// Récuparation des objets
		$apparence_esthetique = ( isset( $add['style'] ) ) ? ' ' . $add['style'] : '';
		$titre = $add['genre_precis'] . $apparence_esthetique . ' à '. $add['ville'];
	// Create post object
		$my_post = array(
			'post_title'    => $titre,
			'post_content'  => $add['text_content'],
			'post_status'   => 'publish',
			'post_type' 	=> $add['type'],
			'post_author'   => 1
		);

	// Insert the post into the database
		if( isset( $add[ 'must_be_updated' ] ) ) {
			$realid = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_faux_id' AND meta_value = '" . $add['faux_id'] . "' " );
			$my_post[ 'ID' ] = $realid;
		}
		if( isset( $add[ 'must_be_updated' ] ) )
			$post_ID = wp_update_post( $my_post, true );
		else
			$post_ID = wp_insert_post( $my_post, true );
		//log
		$log_des_insertions[] = $post_ID;

	

	// Insert medias and metadatas
		if(!$term = term_exists( $add['genre_precis'], 'type_bien'))
			$term = wp_insert_term($add['genre_precis'], 'type_bien');
		wp_set_post_terms( $post_ID, $term['term_id'], 'type_bien', true );

	// Flux
		update_post_meta($post_ID, '_flux_originel', $add['flux']);
	// Faux id
		update_post_meta($post_ID, '_faux_id', $add['faux_id']);
	// Update time
		update_post_meta($post_ID, '_update', $add['update']);
	// Nombre de pièces
		update_post_meta($post_ID, '_nb_pieces', $add['nb_room']);
	// Référence
		update_post_meta($post_ID, '_ref', sanitize_text_field($add['ref']));
	// Prix
		update_post_meta($post_ID, '_prix_bien', $add['prix']);
	// Charges
		update_post_meta($post_ID, '_charge_bien', $add['charges']);
	// Caractéristiques
		if( isset( $add[ 'must_be_updated' ] ) )
			delete_post_meta( $post_ID, '_caracteristiques_bien' );
		foreach( $add[ 'caracteristiques' ] as $c )
			add_post_meta($post_ID, '_caracteristiques_bien', $c);
	// Ville
		$ville = strtoupper(str_replace('-', ' ', $add['ville']));
		update_post_meta($post_ID, '_bien_ville', $ville);
		$adresse = $ville . ' ' . $add[ 'code_postal' ];
	// Département
		$dep = $wpdb->get_var("SELECT id_departement FROM ville WHERE CP='".$add['code_postal']."'");
		update_post_meta($post_ID, '_bien_departement', $dep);

	// GPS
		update_post_meta($post_ID,'_defined_coords',0);
		$coords = get_my_fk_coords($adresse);
		if($coords!='')
			update_post_meta($post_ID,'_bien_coords',$coords);

	// Superficie
		update_post_meta($post_ID, '_superficie', intval($add['superficie']));
	// Diagnostic
		update_post_meta($post_ID, '_conso_bien', $add['energie']);

	// ♪ CONTACT DE L'ANNONCE
		update_post_meta($post_ID, '_contact', 28);

	// Insert images
		$nb_images = 0;
		foreach($add['images'] as $img){
			if($nb_images < 7){ //Je n'ai que 6 places, il faudra se montrer persuasive...

				// Chopper l'image et la mettre sur le serveur
				$imageurl         = stripslashes($img);
				$uploads          = wp_upload_dir();
				preg_match('/^(.*)\.(jpg|png|gif|jpeg)$/',basename($imageurl),$fuuuuuuu);
				$lolname          = str_replace('.','',$fuuuuuuu[1]).'.'.$fuuuuuuu[2];
				/**
				L'IMAGE EXISTE T'ELLE
				*/
				if( file_exists( $uploads['path'] . $lolname ) && true === $add[ 'must_be_updated' ] ){
					$attach_id = $wpdb->get_var( "SELECT id FROM $wpdb->post WHERE guid = '" . $uploads['path'] . $lolname . "'" );
				}else{
				/**

				*/
					$filename         = wp_unique_filename( $uploads['path'], $lolname );
					$wp_filetype      = wp_check_filetype($filename, null );
					$fullpathfilename = $uploads['path'] . "/" . $filename;
					$image_string     = file_get_contents($imageurl);
					$fileSaved        = file_put_contents($uploads['path'] . "/" . $filename, $image_string);

					// L'enregistrer et la lier au bien	
					$attachment = array(
						'guid'           => $uploads['url'] .'/'. _wp_relative_upload_path($filename), 
						'post_mime_type' => $wp_filetype['type'],
						'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
						'post_content'   => '',
						'post_status'    => 'inherit'
					);
					$attach_id = wp_insert_attachment( $attachment, $filename, $post_ID );
				}
				// Régénère metadata pour l'attachment
				insert_att_metadata($attach_id, $uploads['path'] .'/'. $filename);

				//j'associe l'image
				if($nb_images==0){ // Toi tu es la guest star
					set_post_thumbnail($post_ID, $attach_id);
				}else{ // Toi tu es un second rôle
					update_post_meta($post_ID, '_image'.$nb_images, $attach_id);
				}

				$nb_images++;
			}
		}

	// LAUNCHING RABBI JACRON !! RUNS YOU !!! FOOLS
		do_action('rabbi_jacron',$post_ID);
	}

	//Loggons
	ob_start();
	var_dump($log_des_insertions);
	$data = ob_get_clean();
	$savelog = fopen(dirname(__FILE__).'/logs/insert-'.date('d-m-Y').'.log','a+');
	fwrite($savelog,'Ont été ajoutés (ou pas) :'."\r\n".$data."\r\n");
	fclose($savelog);
}

/**
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
Suppression des biens ▼
☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼ ☼
*/
function del_my_post($to_del){
	// Mettre à la corbeille
	foreach($to_del as $del){
		wp_trash_post($del);
	}
}

/**
× × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × ×
Remove attachments ▼
× × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × × ×
*/
add_action('before_delete_post ','delete_images_biens');
function delete_images_biens($id){
	$type = get_post_type($id);
	if($type == 'loc' || $type == 'vente'){
		
		$img_une = get_post_meta($id, '_thumbnail_id', true);
		$img_1   = get_post_meta($id, '_image1', true);
		$img_2   = get_post_meta($id, '_image2', true);
		$img_3   = get_post_meta($id, '_image3', true);
		$img_4   = get_post_meta($id, '_image4', true);
		$img_5   = get_post_meta($id, '_image5', true);
		$img_6   = get_post_meta($id, '_image6', true);

		$att_to_del = array();
		if($img_une) $att_to_del[] = $img_une;
		if($img_1) $att_to_del[]   = $img_1;
		if($img_2) $att_to_del[]   = $img_2;
		if($img_3) $att_to_del[]   = $img_3;
		if($img_4) $att_to_del[]   = $img_4;
		if($img_5) $att_to_del[]   = $img_5;
		if($img_6) $att_to_del[]   = $img_6;

		foreach($att_to_del as $img)
			wp_delete_attachment($img);
	}
}

/**
♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫
Fonctions utiles ▼
♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫ ♫
*/
function insert_att_metadata($id,$fn){
	wp_mail('w.bahuaud@gmail.com','plop','plop');
	global $wpdb;
	include_once( ABSPATH . 'wp-admin/includes/image.php' );
	$ad = wp_generate_attachment_metadata( $id, $fn );
	wp_update_attachment_metadata($id,$ad);
	$wpdb->update(
		$wpdb->postmeta,
		array('meta_value' => $fn),
		array(
			'post_id'  =>$id,
			'meta_key' =>'_wp_attached_file'
		)
	);
}
function calcul_energie($n){
	switch($n){
		case ($n<=50):
			return 'a';
			break;
		case ($n<=90):
			return 'b';
			break;
		case ($n<=150):
			return 'c';
			break;
		case ($n<=230):
			return 'd';
			break;
		case ($n<=330):	
			return 'e';
			break;
		case ($n<=450):
			return 'f';
			break;
		case ($n>450):
			return 'g';
			break;
	}
}
function cluedo($quelpiece,$combien){

	$multi = ($combien>1) ? true : false;
	switch ($quelpiece) {
		case 1	:
			if(!$multi)
				return 'Chambre';
			else
				return 'Chambres';
			break;
		case 2	:
			if(!$multi)
				return 'Salon';
			else
				return 'Salons';
			break;
		case 3	:
			if(!$multi)
				return 'Cuisine';
			else
				return 'Cuisines';
			break;
		case 4	:
			if(!$multi)
				return 'Garage';
			else
				return 'Garages';
			break;
		case 5	:
			if(!$multi)
				return 'Parking';
			else
				return 'Parkings';
			break;
		case 6	:
			if(!$multi)
				return 'Cave';
			else
				return 'Caves';
			break;
		case 7	:
			if(!$multi)
				return 'Abri de jardin';
			else
				return 'Abris de jardin';
			break;
		case 8	:
			if(!$multi)
				return 'Salle de bains';
			else
				return 'Salles de bains';
			break;
		case 9	:
			if(!$multi)
				return 'Buanderie';
			else
				return 'Buanderies';
			break;
		case 10:
			if(!$multi)
				return 'Bureau';
			else
				return 'Bureaux';
			break;
		case 11:
			if(!$multi)
				return 'Couloir';
			else
				return 'Couloirs';
			break;
		case 12:
			if(!$multi)
				return 'Dégagement';
			else
				return 'Dégagements';
			break;
		case 13:
			if(!$multi)
				return 'Salle de douche';
			else
				return 'Salles de douche';
			break;
		case 14:
			if(!$multi)
				return 'Dressing';
			else
				return 'Dressings';
			break;
		case 15:
			if(!$multi)
				return 'Entrée';
			else
				return 'Entrées';
			break;
		case 16:
			if(!$multi)
				return 'Toilettes';
			else
				return 'Toilettes';
			break;
		case 17:
			if(!$multi)
				return 'Véranda';
			else
				return 'Vérandas';
			break;
		case 18:
			if(!$multi)
				return 'Terrasse';
			else
				return 'Terrasses';
			break;
		case 19:
			if(!$multi)
				return 'Solarium';
			else
				return 'Solariums';
			break;
		case 20:
			if(!$multi)
				return 'Séjour';
			else
				return 'Séjours';
			break;
		case 21:
			if(!$multi)
				return 'Salle de jeux';
			else
				return 'Salles de jeux';
			break;
		case 22:
			if(!$multi)
				return 'Salle à manger';
			else
				return 'Salles à manger';
			break;
		case 23:
			if(!$multi)
				return 'Pool house';
			else
				return 'Pool houses';
			break;
		case 24:
			if(!$multi)
				return 'Placard';
			else
				return 'Placards';
			break;
		case 25:
			if(!$multi)
				return 'Non exploité';
			else
				return 'Non exploités';
			break;
		case 26:
			if(!$multi)
				return 'Loggia';
			else
				return 'Loggias';
			break;
		case 27:
			if(!$multi)
				return 'Grenier';
			else
				return 'Greniers';
			break;
		case 28:
			if(!$multi)
				return 'Autre';
			else
				return 'Autres';
			break;
		case 29:
			if(!$multi)
				return 'Mezzanine';
			else
				return 'Mezzanines';
			break;
		case 30:
			if(!$multi)
				return 'Cellier';
			else
				return 'Celliers';
			break;
		case 31:
			if(!$multi)
				return 'Local technique';
			else
				return 'Locaux techniques';
			break;
		case 32:
			if(!$multi)
				return 'Atelier';
			else
				return 'Ateliers';
			break;
		case 33:
			if(!$multi)
				return 'Studio';
			else
				return 'Studios';
			break;
		case 34:
			if(!$multi)
				return 'Loft';
			else
				return 'Lofts';
			break;
		case 35:
			if(!$multi)
				return 'Bibliothèque';
			else
				return 'Bibliothèques';
			break;
		case 36:
			if(!$multi)
				return 'Penderie';
			else
				return 'Penderies';
			break;
		case 37:
			if(!$multi)
				return 'Cour';
			else
				return 'Cours';
			break;
		case 38:
			if(!$multi)
				return 'Palier';
			else
				return 'Paliers';
			break;
		case 39:
			if(!$multi)
				return 'Lingerie';
			else
				return 'Lingeries';
			break;
		case 40:
			if(!$multi)
				return 'Sous-sol';
			else
				return 'Sous-sols';
			break;
		case 41:
			if(!$multi)
				return 'Salle de bains / toilettes';
			else
				return 'Salles de bains / toilettes';
			break;
		case 42:
			if(!$multi)
				return 'Salle de douche / toilettes';
			else
				return 'Salles de douche / toilettes';
			break;
		case 43:
			if(!$multi)
				return 'Balcon';
			else
				return 'Balcons';
			break;
		case 44:
			if(!$multi)
				return 'Salle de sport';
			else
				return 'Salles de sport';
			break;
		case 45:
			if(!$multi)
				return 'Boîte de nuit';
			else
				return 'Boîtes de nuit';
			break;
		case 46:
			if(!$multi)
				return 'Cinéma';
			else
				return 'Cinémas';
			break;
		case 47:
			if(!$multi)
				return 'Salle de réception';
			else
				return 'Salles de réception';
			break;
		case 48:
			if(!$multi)
				return 'Débarras';
			else
				return 'Débarras';
			break;
		case 49:
			if(!$multi)
				return 'Jardin';
			else
				return 'Jardins';
			break;
		case 50:
			if(!$multi)
				return 'Parc';
			else
				return 'Parcs';
			break;
		case 51:
			if(!$multi)
				return 'Terrain';
			else
				return 'Terrains';
			break;
		case 52:
			if(!$multi)
				return 'Grenier';
			else
				return 'Greniers';
			break;
		case 53:
			if(!$multi)
				return 'Chambre de maître';
			else
				return 'Chambres de maître';
			break;
		case 54:
			if(!$multi)
				return 'Suite';
			else
				return 'Suites';
			break;
		case 55:
			if(!$multi)
				return 'Remise';
			else
				return 'Remises';
			break;
		case 56:
			if(!$multi)
				return 'Appartement';
			else
				return 'Appartements';
			break;
		case 57:
			if(!$multi)
				return 'Cabine';
			else
				return 'Cabines';
			break;
	}
}
function qui_suis_je($derrieremonloup){
	switch($derrieremonloup){
		case 1:
			return 'Triplex';
			break;
		case 2:
			return 'Terrain constructible';
			break;
		case 3:
			return 'Terrain inconstructible';
			break;
		case 4:
			return 'Villa sur toit';
			break;
		case 5:
			return 'Appartement';
			break;
		case 6:
			return 'Studio';
			break;
		case 7:
			return 'Château';
			break;
		case 8:
			return 'Commerce';
			break;
		case 9:
			return 'Duplex';
			break;
		case 10:
			return 'F1';
			break;
		case 11:
			return 'Ferme';
			break;
		case 12:
			return 'Loft';
			break;
		case 13:
			return 'Maison de village';
			break;
		case 14:
			return 'Villa';
			break;
		case 15:
			return 'Appartement villa';
			break;
		case 16:
			return 'Grange';
			break;
		case 17:
			return 'Ruine';
			break;
		case 18:
			return 'Maison';
			break;
		case 19:
			return 'Propriété';
			break;
		case 20:
			return 'Ensemble immobilier';
			break;
		case 21:
			return 'Moulin';
			break;
		case 22:
			return 'Garage';
			break;
		case 23:
			return 'Fermette';
			break;
		case 24:
			return 'Immeuble';
			break;
		case 25:
			return 'F2';
			break;
		case 26:
			return 'F3';
			break;
		case 27:
			return 'F4';
			break;
		case 28:
			return 'Chambre';
			break;
		case 29:
			return 'Hangar';
			break;
		case 30:
			return 'Mas';
			break;
		case 31:
			return 'Local';
			break;
		case 32:
			return 'Chalet';
			break;
		case 33:
			return 'Local commercial';
			break;
		case 34:
			return 'Fonds de commerce';
			break;
		case 35:
			return 'Droit au bail';
			break;
		case 36:
			return 'Bureau';
			break;
		case 37:
			return 'Hôtel particulier';
			break;
		case 38:
			return 'Gérance';
			break;
		case 39:
			return 'Exploitation agricole';
			break;
		case 40:
			return 'Cave';
			break;
		case 41:
			return 'Entrepôt';
			break;
		case 42:
			return 'Remise';
			break;
		case 43:
			return 'Parking';
			break;
		case 44:
			return 'Hôtel';
			break;
		case 45:
			return 'Haras';
			break;
		case 46:
			return 'Terrain';
			break;
		case 47:
			return 'Bastide';
			break;
		case 48:
			return 'Bastidon';
			break;
		case 49:
			return 'Mazet';
			break;
		case 50:
			return 'Propriété viticole';
			break;
		case 51:
			return 'Yacht';
			break;
		case 52:
			return 'Péniche';
			break;
		case 53:
			return 'Voilier';
			break;
		case 54:
			return 'Catamaran';
			break;
		case 55:
			return 'Domaine équestre';
			break;
		case 56:
			return 'Maison d\'hôtes';
			break;
		case 57:
			return 'Gîte';
			break;
	}
}

// function curl_my_pict($url){
// 	$ch = curl_init();
// 	curl_setopt($ch, CURLOPT_URL, $url);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 	$image = curl_exec($ch);
// 	curl_close($ch);
// 	return $image;

// 	/**


// 	*/

// }

function get_my_fk_coords($a){
	$map_url = 'http://maps.google.com/maps/api/geocode/json?address='.urlencode($a).'&sensor=false';
	$request = wp_remote_get($map_url);
	$json = wp_remote_retrieve_body($request);

	if(empty($json))
		return false;

	$json = json_decode($json);
	$lat = $json->results[0]->geometry->location->lat;
	$long = $json->results[0]->geometry->location->lng;
	return compact('lat','long');
}
?>