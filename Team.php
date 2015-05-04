
<?php
/*
Plugin Name:  Mitarbeiter
Plugin URI: http://intermac.de/
Description: Team Plugin.
Version: 1.0
Author: Intermac Systems
Author URI: http://intermac.de/
License: GPLv2
*/


//      CUSTOM POST TYPE 1
add_action('init', 'ootb_team_mitarbeiter_register');

    function ootb_team_mitarbeiter_register() {
        $labels = array(
            'name' => _x('Team', 'post type general name'),
            'singular_name' => _x('Team', 'post type singular name'),
            'add_new' => _x('Mitarbeiter hinzufuegen', 'team_mitarbeiter'),
            'add_new_item' => __('neuen Mitarbeiter hinzufuegen'),
            'edit_item' => __('Edit Mitarbeiter'),
            'new_item' => __('Neuer Mitarbeiter'),
            'view_item' => __('View Mitarbeiter'),
            'search_items' => __('Suche Mitarbeiter'),
            'not_found' =>  __('Keine Mitarbeiter gefunden'),
            'parent_item_colon' => ''
        );

        $args = array(
            'label' => __('Team'),
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'rewrite' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
        );

        register_post_type( 'team_mitarbeiter' , $args );

        register_taxonomy("business", array("team_mitarbeiter"), array(
            "hierarchical" => true, 
            "label" => "Business Type",
            "singular_label" => "Business", 
            "rewrite" => true)
        );
    }

add_action("add_meta_boxes", "ootb_admin_init");
add_action('save_post', 'ootb_save_team_mitarbeiter_options');

function ootb_admin_init(){
    add_meta_box("gallerymeta", "team_mitarbeiter Directory Data", "ootb_team_mitarbeiter_meta_options", "team_mitarbeiter", "normal", "low");
}


function ootb_team_mitarbeiter_meta_options(){
    global $post;
    $custom = get_post_custom($post->ID);
    $position = $custom["position"][0];
    $firstname = $custom["firstname"][0];
    $lastname = $custom["lastname"][0];
    $phone_mobile = $custom["phone_mobile"][0];
    $fax = $custom["fax"][0];
    $shortdesc = $custom["shortdesc"][0];
    $user_organization = $custom["user_organization"][0];
    $email = $custom["email"][0];
    $twitter = $custom["twitter"][0];
    $xing = $custom["xing"][0];
    $facebook = $custom["facebook"][0];
    $smallpictureurl = $custom["smallpictureurl"][0];
    $landlinephone = $custom["landlinephone"][0];
    $phone_mobile = $custom["phone_mobile"][0];
    $largepictureurl = $custom["largepictureurl"][0];
    $picturealttag = $custom["picturealttag"][0];

?>

<div class="form-wrap">


<h2>Vcard Generator</h2>

    <div class="form-field">
        <label for="firstname">Name:</label>
        <input name="firstname" value="<?php echo $firstname; ?>"/>
        <p>Vorname</p>
    </div>

    <div class="form-field">
        <label for="lastname">Nachname:</label>
        <input name="lastname" value="<?php echo $lastname; ?>"/>
        <p>Nachname</p>
    </div>

    <div class="form-field">
        <label for="user_organization">Firma :</label>
        <input name="user_organization" value="<?php echo $user_organization; ?>"/>
        <p>Firma: Steuerberater ..... </p>
    </div>

    <div class="form-field">
        <label for="email">E-mail Adresse :</label>
        <input name="email" value="<?php echo $email; ?>" />
        <p>Email Adresse.</p>
    </div>

    <div class="form-field">    
        <label for="position">Position :</label>
        <input name="position" value="<?php echo $position; ?>" />
        <p>Position bzw. Ausbildung</p>
    </div>

    <div class="form-field">
        <label for="landlinephone">Telefon Nummer :</label>
        <input name="landlinephone" value="<?php echo $landlinephone; ?>" />
        <p>Telefon Nummer ( +49 XXXXXXXX )</p>
    </div>
    
    <div class="form-field">
        <label for="fax">Fax Nummer :</label>
        <input name="fax" value="<?php echo $fax; ?>" />
        <p>Fax Nummer ( +49 XXXXXXXX )</p>
    </div>
    
    <div class="form-field">
        <label for="phone_mobile">Mobile Nummer :</label>
        <input name="phone_mobile" value="<?php echo $phone_mobile; ?>" />
        <p>Mobile Nummer ( +49 XXXXXXXX )</p>
    </div>


    <div class="form-field">
        <label for="shortdesc">Kurze Beschreibung :</label>
        <textarea name="shortdesc"><?php echo $shortdesc; ?></textarea>
        <p>Kurze Beschreibung ( Lebenslauf / Ausbildung / Uni / etc. )</p>
    </div>

<h2>Zus&auml;tzliche Infos</h2>

    <div class="form-field">
        <label for="twitter">Twitter Profil :</label>
        <input name="twitter" value="<?php echo $twitter; ?>" />
        <p>Twitter Domain Profil ( inkl. http://www.  ) </p>
    </div>

    <div class="form-field">
        <label for="facebook">Facebook Profil :</label>
        <input name="facebook" value="<?php echo $facebook; ?>" />
        <p>Facebook Domain Profil ( inkl. http://www.  )</p>
    </div>
    
    <div class="form-field">
        <label for="xing">Xing Profil :</label>
        <input name="xing" value="<?php echo $xing; ?>" />
        <p>Profil Domain Profil ( inkl. http://www.  )</p>
    </div>

    <div class="form-field">
        <label for="smallpictureurl">Kleines Bild :</label>
        <input name="smallpictureurl" value="<?php echo $smallpictureurl; ?>" />
        <p>250 x 250 Bild URL</p>
    </div>

    <div class="form-field">
        <label for="largepictureurl">Grosses Bild URL :</label>
        <input name="largepictureurl" value="<?php echo $largepictureurl; ?>" />
        <p>500 x 500 Bild URL</p>
    </div>

    <div class="form-field">
        <label for="picturealttag">Alt Tag fuer Bild:</label>
        <input name="picturealttag" value="<?php echo $picturealttag; ?>" />
        <p>Alt Tag fuer beide Bild.</p>
    </div>


</div>



<?php

    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'wpse28341' );

}


function ootb_save_team_mitarbeiter_options( $post_id ) {
    global $post;   

    //skip auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // Use nonce for verification
    if ( !wp_verify_nonce( $_POST['wpse28341'], plugin_basename( __FILE__ ) ) )
        return;

    //check for you post type only
    if( $post->post_type == "team_mitarbeiter" ) {
            if( isset($_POST['position']) ) { update_post_meta( $post->ID, 'position', $_POST['position'] );}
            if( isset($_POST['firstname']) ) { update_post_meta( $post->ID, 'firstname', $_POST['firstname'] );}
            if( isset($_POST['lastname']) ) { update_post_meta( $post->ID, 'lastname', $_POST['lastname'] );}
            if( isset($_POST['user_organization']) ) { update_post_meta( $post->ID, 'user_organization', $_POST['user_organization'] );}
            if( isset($_POST['shortdesc']) ) { update_post_meta( $post->ID, 'shortdesc', $_POST['shortdesc'] );}
            if( isset($_POST['email']) ) { update_post_meta( $post->ID, 'email', $_POST['email'] );}
            if( isset($_POST['twitter']) ) { update_post_meta( $post->ID, 'twitter', $_POST['twitter'] );}
            if( isset($_POST['xing']) ) { update_post_meta( $post->ID, 'xing', $_POST['xing'] );}
            if( isset($_POST['facebook']) ) { update_post_meta( $post->ID, 'facebook', $_POST['facebook'] );}
            if( isset($_POST['smallpictureurl']) ) { update_post_meta( $post->ID, 'smallpictureurl', $_POST['smallpictureurl'] );}
			if( isset($_POST['phone_mobile']) ) { update_post_meta( $post->ID, 'phone_mobile', $_POST['phone_mobile'] );}
            if( isset($_POST['landlinephone']) ) { update_post_meta( $post->ID, 'landlinephone', $_POST['landlinephone'] );}
            if( isset($_POST['fax']) ) { update_post_meta( $post->ID, 'fax', $_POST['fax'] );}
            if( isset($_POST['largepictureurl']) ) { update_post_meta( $post->ID, 'largepictureurl', $_POST['largepictureurl'] );}
            if( isset($_POST['picturealttag']) ) { update_post_meta( $post->ID, 'picturealttag', $_POST['picturealttag'] );}
    }





// Future testing

$firstname = '';
$firstname = get_post_meta( get_the_ID(), 'firstname', true );

$lastname = '';
$lastname = get_post_meta( get_the_ID(), 'lastname', true );

$user_organization = '';
$user_organization = get_post_meta( get_the_ID(), 'user_organization', true );

$shortdesc = '';
$shortdesc = get_post_meta( get_the_ID(), 'shortdesc', true );

$landlinephone = '';
$landlinephone = get_post_meta( get_the_ID(), 'landlinephone', true );

$fax = '';
$fax = get_post_meta( get_the_ID(), 'fax', true );

$email = '';
$email = get_post_meta( get_the_ID(), 'email', true );

$user_street_address_line_1 = '';
$user_street_address_line_1 = get_post_meta( get_the_ID(), 'user_street_address_line_1', true );

$user_street_address_line_2 = '';
$user_street_address_line_2 = get_post_meta( get_the_ID(), 'user_street_address_line_2', true );

$phone_mobile = '';
$phone_mobile = get_post_meta( get_the_ID(), 'phone_mobile', true );

$position = '';
$position = get_post_meta( get_the_ID(), 'position', true );



// Generate the vCard and save as a file
// Generate the vCard and save as a file
$fileContents = 'BEGIN:VCARD
VERSION:3.0
N:' . (!empty($lastname) ? $lastname : '') . ';' . (!empty($firstname) ? $firstname : '') . ';
FN:' . $firstname . '  ' . $lastname . '
URL;TYPE=WORK:' . (!empty($custom->user_url) ? $custom->user_url : '');

			if (function_exists('curl_init')) { // cURL is installed on the server so use this preferably
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_URL, $custom->user_photourl);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$base64Photo = base64_encode(curl_exec($ch));
				curl_close($ch);
			} else { // try using file_get_contents, though this causes some issues on some servers
				$base64Photo = base64_encode(file_get_contents($custom->user_photourl, true));
			}

			$fileContents .= '
PHOTO;ENCODING=b;TYPE=JPEG:' . (!empty($custom->user_photourl) ? $base64Photo : '') . '
ORG:' . (!empty($user_organization) ? $user_organization : '') . '
NOTE:' . (!empty($shortdesc) ? $shortdesc : '') . '
TITLE:' . (!empty($position) ? $position : '') . '
TEL;TYPE=WORK,VOICE:' . (!empty($landlinephone) ? $landlinephone : '') . '
TEL;TYPE=WORK,FAX:' . (!empty($fax) ? $fax : '') . '
TEL;TYPE=CELL,VOICE:' . (!empty($phone_mobile) ? $phone_mobile : '') . '
EMAIL;TYPE=PREF,INTERNET:' . (!empty($email) ? $email : '') . '
ADR;TYPE=WORK:;;' . (!empty($user_street_address_line_1) ? $user_street_address_line_1 : '')  . (!empty($user_street_address_line_2) ? ' ' . $user_street_address_line_2 : '') . ';' .
(!empty($user_city) ? $user_city : '') . ';' .
(!empty($user_region) ? $user_region : '') . ';' .
(!empty($user_postcode) ? $user_postcode : '') . ';' .
(!empty($user_country) ? $user_country : '') . '' . '
END:VCARD';

			$upload_dir = wp_upload_dir();
			$userVCF = $upload_dir['basedir'] . '/' . 
				$firstname . $phone_mobile . '.vcf';
						
			if (is_writable($upload_dir['basedir'] . '/')) {
				$vcfFile = fopen($userVCF, "w");
				fwrite($vcfFile, $fileContents);
				fclose($vcfFile);
				$html .= '
				<div class="vcard_button">
					<a href="' . $upload_dir['baseurl'] . '/' . 
					$firstname . $phone_mobile . '.vcf">vCard</a>
				</div>';
			} else {
				
				echo "ERROR: Please ensure the MP vCard generator plugin directory is writable
				<pre>" . print_r($upload_dir['basedir'],true) . "</pre>
				<pre>" . print_r(pathinfo(__FILE__)) . "</pre>";
			}
// end vCard and save as a file			
// end vCard and save as a file			
// end vCard and save as a file			



};





