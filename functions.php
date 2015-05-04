
/* vcf file*/
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	return $existing_mimes;
}


//  -------------> 		#################### 	<-------------
//  -------------> 		  Futurewave Team		<-------------
//  -------------> 		#################### 	<-------------

function section_team_shortcode($atts) {

// EXAMPLE USAGE:
// [loop_shortcode the_query="showposts=100&post_type=page&post_parent=453"]

   // Defaults
   extract(shortcode_atts(array(
      "the_query" => ''
   ), $atts));

   // de-funkify query
   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);

   // query is made               
   query_posts($the_query);

   // Reset and setup variables
   $output_2 = '';
   $member_facebook = '';
   $member_email = '';
   $firstname = '';
   $phone_mobile = '';
   $member_twitter = '';
   $member_xing = '';
   $member_linkedin = '';
   $member_position = '';
   $member_landlinephone = '';
   $member_fax = '';
   $test_id = '';
   $image_path ='';
   $upload_dir= '';
   $userVCF= '';

   // the loop
   if (have_posts()) : while (have_posts()) : the_post();
      $test_id_2 = $post->ID;
      $test_title = get_the_title($post->ID);
      $test_link = get_permalink($post->ID);
      $test_datetime = get_the_date($post->ID);
      $test_authorname = get_the_author($post->ID);
      $test_content = get_the_excerpt($post->ID);
      $image_path = site_url();
      //$test_ex = get_the_excerpt();
        if ( has_post_thumbnail() ) {
        $test_thumb = get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-circle'));
        } else {
        $test_thumb = ' <img class="img-circle" src="' . $image_path . '/wp-content/uploads/blog/blog-image.jpg' . '"> ';
        }

// seems to work 

	$member_email = get_post_meta( get_the_ID(), 'email', true );
    if ($member_email == '') {
        $member_email = '&nbsp;';
    } else {
        $member_email = '<div class="email-member" itemprop="email"><a class="member-email" href="mailto:' . $member_email . '">Email</a></div>' ;
    }

    
	$member_landlinephone = get_post_meta( get_the_ID(), 'landlinephone', true );
    if ($member_landlinephone == '') {
        $member_landlinephone = '&nbsp;';
    } else {
        $member_landlinephone = '<div class="member-phone" itemprop="telephone"><a class="phone-member phone-space" href="tel:' . $member_landlinephone . '">' . $member_landlinephone . '</a></div>' ;
    }

	$member_fax = get_post_meta( get_the_ID(), 'fax', true );
    if ($member_fax == '') {
        $member_fax = '&nbsp;';
    } else {
        $member_fax = '<div class="member-fax" itemprop="faxNumber"><a class="fax-member phone-space" href="' . $member_fax . '">' . $member_fax . '</a></div>' ;
    }

	$member_position = get_post_meta( get_the_ID(), 'position', true );
    if ($member_position == '') {
        $member_position = '&nbsp;';
    } else {
        $member_position = '<div class="position-member" itemprop="jobtitle">' . $member_position . '</div>' ;
    }
    
    $firstname = get_post_meta( get_the_ID(), 'firstname', true );
    $phone_mobile = get_post_meta( get_the_ID(), 'phone_mobile', true );

    
	$upload_dir = wp_upload_dir(); 
	$userVCF = $upload_dir['baseurl'] . '/' . $firstname . $phone_mobile . '.vcf';



// Social Media

	$member_facebook = get_post_meta( get_the_ID(), 'facebook', true );
    if ($member_facebook == '') {
        $member_facebook = '&nbsp;';
    } else {
        $member_facebook = '<div class="facebook-member"><a class="member-facebook" href="' . $member_facebook . '"><i class="fa fa-facebook"></i></a></div>' ;
    }

	$member_twitter = get_post_meta( get_the_ID(), 'twitter', true );
    if ($member_twitter == '') {
        $member_twitter = '&nbsp;';
    } else {
        $member_twitter = '<div class="twitter-member"><a class="member-twitter" href="' . $member_twitter . '"><i class="fa fa-twitter"></i></a></div>' ;
    }

	$member_xing = get_post_meta( get_the_ID(), 'xing', true );
    if ($member_xing == '') {
        $member_xing = '&nbsp;';
    } else {
        $member_xing = '<div class="xing-member"><a class="member-xing" href="' . $member_xing . '"><i class="fa fa-xing"></i></a></div>' ;
    }

	$member_linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
    if ($member_linkedin == '') {
        $member_linkedin = '&nbsp;';
    } else {
        $member_linkedin = '<div class="linkedin-member"><a class="member-linkedin" href="' . $member_linkedin . '"><i class="fa fa-linkedin"></i></a></div>' ;
    }
    

    

// output all findings -

//<header>
//        <div class='member-name' >
//		<h3><a href='$test_title' itemprop='name'>$test_title</a></h3>
//		</div>
//	</header>

$output_2 .= "
<div class='team-member span4 member-slider item-team' itemscope itemtype='http://schema.org/Person'>
     
 	<div class='team-member-title'>
	<h3 itemprop='name'>$test_title</h3>
		$member_position
	</div>

    
<div class='team team-style-1'> 
   <div class='team-avatar'>
     $test_thumb
   	
   	<div class='post-mask-content'>
   		<div class='centered'>
   		<div class='member-contact-top'>
   			
   				<div class='member-contact'>
    $member_landlinephone
    $member_fax
	$member_email
   	</div>    

   			
   		</div>
   		</div>
   	</div>
   	

</div></div>
     
	    
    <div class='member-vcard'>
        <a class='download-button download-button-1' href='$userVCF'>Download Visitenkarte</a> 
    </div>
       		<div class='member-contact-top'>
       		$member_facebook
   			$member_twitter
   			$member_xing
   			</div>
               
				
</div>";

    endwhile; else:
      $output_2 .= "not found.";
   endif;
   wp_reset_query();
   return $output_2;
}
add_shortcode("team", "section_team_shortcode");
