<?php /*Template Name: Email Glossary*/
get_header();
?>
<style type="text/css">
  /*****************************************************************
  A-Z Filter
******************************************************************/

#title-status {
  float: left;
  width: 100%;
}
  #title-status p {
    float: left;
    width: 50%;
    margin-bottom: 15px;
    font-size: 16px;
  }
    #title-status span {
      font-weight: bold;
      text-transform: uppercase;
    }
  #title-status p:last-child {
    text-align: right;
    text-decoration: underline;
    color: #de466c;
    cursor: pointer;
  }

#a-z {
  float: left;
    width: 100%;
  margin-bottom: 25px;
  display: flex;
  flex-direction: row;
}
  ul#a-z li {
    flex-grow: 1;
    padding: 7px;
    text-align: center;
    background: #dadbdc;
    color: #fff;
    text-transform: uppercase;
    border-left: 2px solid #fff;
    list-style-type: none;
  }
  ul#a-z li.active {
    background: #9c9c9c;
    cursor: pointer;
  }

  ul#a-z li.current {
    background: #de466c;
  }
  ul#a-z li:first-child {
    border: 0px none;
  }

#posts-results {
}
  #posts-results li {
    display: none;
  }
  #posts-results li.show {
    display: block;
  }
  #posts-results a {
    border-bottom: 1px solid #ccc;
    display: block;
    padding: 10px 0;
  }
</style>
       
  <div id="main-area">
    <div class="wrapper">
      <div <?php post_class(); ?>>
      
      <?php 
      $filter_args = array
      (
        'post_type' => 'post',
        'posts_per_page' => -1,
       
      );
      $tutorial_posts = new WP_Query($filter_args);
      $posts_array = array();

      // Get all posts
      while ( $tutorial_posts->have_posts() ) : $tutorial_posts->the_post(); 
        $posts_array[] = strtolower(get_the_title()[0]);
      endwhile; ?>
        
        
      <?php // ?>
      <ul id="a-z">
        <?php 
        $alphabet_array = range('a', 'z');
        $number_array = range(0, 9); 
        //$build_li = '';
        
        // Check if number
        if(count(array_intersect($posts_array, $number_array)) > 0){
          echo "<li class=\"active\" data-letter=\"#\">#</li>";
        }
        else 
        {
          echo "<li data-letter=\"#\">#</li>";
        }
        //echo "<li $build_li>" . '#' . '</li>';
        
        foreach ($alphabet_array as $letter)
        {
          if (in_array($letter, $posts_array)) 
          { 
            echo "<li class=\"active\" data-letter=".$letter.">$letter</li>";
          }
          else 
          {
            echo "<li data-letter=".$letter.">$letter</li>";
          }
        } 
        ?>
      </ul>
        
      <div id="title-status">
        <p>Showing: <span></span></p>
        <p id="show-all">Show all posts</p>
      </div>
        
      <?php 
      $i = -1;
      ?>
        
      <ul id="posts-results">
      <?php while ( $tutorial_posts->have_posts() ) : $tutorial_posts->the_post(); 
        $i++;
        
        if(is_numeric($posts_array[$i])) 
        {
          echo "<li data-letter=\"#\">";
            echo "<a href=".get_the_permalink().">";
              echo get_the_title();
            echo "</a>";
          echo "</li>";
        }
        else 
        {
          echo "<li data-letter=".$posts_array[$i].">";
            echo "<a href=".get_the_permalink().">";
              echo get_the_title();
            echo "</a>";
          echo "</li>";
        } ?>
        
      <?php endwhile; ?>
      </ul>
       
      </div>
      
    </div>
  </div>
  <script type="text/javascript">
    jQuery(document).ready(function()
      { 
       // alert("use strict");
        
        let initial_first_letter = jQuery('#a-z li.active:eq(0)').data('letter');
        let click_first_char;
        let title_showing = jQuery('#title-status span');
        let az_li = jQuery('#a-z li');
        let title_show_all = jQuery('p#show-all');
        let posts_results_li = jQuery("#posts-results li");
        
        // Initial load
        jQuery("#posts-results li[data-letter="+initial_first_letter+"]").addClass('show');
        jQuery('az_li:eq(0)').addClass('current');
        title_showing.text(initial_first_letter);
        
        // Click A-Z menu item
        jQuery('#a-z li.active').click(function()

        {
          //alert("hello");
          jQuery("#posts-results li").removeClass('show');
          click_first_char = jQuery(this).data('letter');
          jQuery('#a-z li.active').removeClass('current');
          title_showing.text(click_first_char);
          title_show_all.show();
          jQuery(this).addClass('current');
          jQuery("#posts-results li[data-letter="+click_first_char+"]").addClass('show');
        });
        
        // Show all posts
        title_show_all.click(function()
        {
          posts_results_li.addClass('show');
          title_showing.text('all');
          az_li.removeClass('current');
          jQuery(this).hide(); 
        }); 

      });
  </script>
    
<?php get_footer(); ?>
