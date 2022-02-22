<?php

class BuddybossTabTemplate
{
    private $title;

    private $content;

    private $slug;

    private $isPrivate;


    function __construct($title,$content,$slug,$isPrivate)
    {
        $this->title = $title;
        $this->content=$content;
        $this->slug = $slug;
        $this->isPrivate = $isPrivate;
    }

     public function buddyboss_custom_user_tab() {
        // Avoid fatal errors when plugin is not available.
        $tempSlug = $this->slug;
        $tempTitle = $this->title;
        $tempContent = $this->content;
        $privateTab = $this->isPrivate;
       // $func = $this->user_custom_tab_screen();
        if ( ! function_exists( 'bp_core_new_nav_item' ) ||
             ! function_exists( 'bp_loggedin_user_domain' ) ) {
    
            return;
    
          }
          if($privateTab=='yes')
          {
            if(bp_displayed_user_id() !== bp_loggedin_user_id())
            {
                return;
            }
          }
    
          global $bp;
    
          $args = array();
    
          // Tab 1 arg.
          $args[] = array(
            'name'                => esc_html__( $tempTitle, 'default' ),
            'slug'                => $tempSlug,
            'screen_function'     => function(){
                
            add_action( 'bp_template_title', function(){
                
            echo esc_html__( $this->title, 'default' );
        } );
        add_action( 'bp_template_content', function(){
            echo $this->content;
        } );
        bp_core_load_template( 'buddypress/members/single/plugins' );
            },
            'position'            => 100,
            'parent_url'          => bp_loggedin_user_domain() . '/'.$tempSlug.'/',
            'parent_slug'         => $bp->profile->slug,
        );
    
        foreach ( $args as $arg ) {
            bp_core_new_nav_item( $arg );
        }
    }
    
  
    
    /**
     * Set template for new tab.
     */
    //  public function user_custom_tab_screen() {
    //     $func2= $this-> custom_tab_title();
    //     $func3= $this-> custom_tab_content();
    //     // Add title and content here - last is to call the members plugin.php template.
    //     add_action( 'bp_template_title', function(){
    //         $func2;
    //     } );
    //     add_action( 'bp_template_content', function(){
    //         $func3;
    //     } );
    //     bp_core_load_template( 'buddypress/members/single/plugins' );
    
    // }
    // /**
    //  * Set title for custom tab.
    //  */
    // public function custom_tab_title() {
    //     echo esc_html__( $this->title, 'default' );
    // }
    
    // /**
    //  * Display content of custom tab.
    //  */
    // public function custom_tab_content() {
    
    //     $this->content;
    
    // }

}