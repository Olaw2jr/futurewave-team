# futurewave-team
Wordpress team-member display with downloadable vcf/vcard generator ///  I hope someone finds this useful
(owl carousel is necessary: https://github.com/OwlFonk/OwlCarousel)

  - Upload Team.php to wp-plugins
  - Insert functions.php code into your functions.php file
  - insert style.css into your theme css file
  - insert this into your theme js file
```
jQuery(document).ready(function(){
jQuery("#owl-blog-posts").owlCarousel({
      autoPlay: 15000, //Set AutoPlay to 3 seconds
      items : 3,
      navigation: false,
      pagination: true,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,2],
 	  itemsTablet: [756,2],
 	  itemsMobile: [631,1]
  });
});
```

------> owl carousel is necessary: https://github.com/OwlFonk/OwlCarousel !!! <------


in your wordpress backend page insert to load member list
```
[team the_query="posts_per_page=10&order=DESC&post_type=team_mitarbeiter"]
```
 
