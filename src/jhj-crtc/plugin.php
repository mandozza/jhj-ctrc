<?php

class JhjCrtc_Plugin
{
    /**
     * The basename of the plugin.
     *
     * @var string
     */
    private $basename;

    /**
     * The plugin custom post type.
     *
     * @var JhjCrtc_Cpt
     */
    private $cpt;

        /**
     * The plugin custom post type.
     *
     * @var JhjCrtc_Taxonomy
     */
    private $taxonomy;

     /**
     * The plugin metabox
     *
     * @var JhjCrtc_Metabox
     */
    private $metabox;

         /**
     * The plugin scripts
     *
     * @var JhjCrtc_Scripts
     */
    private $scripts;

     /**
     * The plugin shortcodes
     *
     * @var JhjCrtc_Shotecodes
     */
     private $shortcodes;

    /**
     * Flag to track if the plugin is loaded.
     *
     * @var bool
     */
    private $loaded;

     /**
     * Flag to track if on the admin side.
     *
     * @var bool
     */
    private $isadmin;



    /**
     * Constructor.
     *
     * @param string $file
     */
    public function __construct($file)
    {
        $this->basename = plugin_basename($file);
        $this->cpt = new JhjCrtc_Cpt();
        $this->loaded = false;
        $this->isadmin = self::adminCheck();
        $this->taxonomy = new JhjCrtc_Taxonomy();
        $this->shortcodes = new JhjCrtc_Shortcode();
        if ( true ===  $this->isadmin ){
                $this->getAdminClasses();
        }
    }

    /**
     * Loads the plugin into WordPress.
     */
    public function load()
    {
        if ($this->loaded) {
            return;
        }

        $this->loaded = true;
    }

    public function adminCheck()
    {
        if ( ! is_admin() ) {
            $admin_flag =  false;
        } else {
           $admin_flag =  true;
        }
        return $admin_flag;
    }

    public function getAdminClasses()
    {
       // echo 'on the admin side';
        $this->metabox = new JhjCrtc_Metabox();
        $this->scripts = new JhjCrtc_Scripts();
    }


}
