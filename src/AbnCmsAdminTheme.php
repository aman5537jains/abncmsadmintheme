<?php
namespace Aman5537jains\AbnCmsAdminTheme;

use Aman5537jains\AbnCms\Lib\AbnCms;
use Aman5537jains\AbnCms\Lib\Sidebar\AbnSidebar;
use Aman5537jains\AbnCms\Lib\Theme\ScriptLoader;
use Aman5537jains\AbnCms\Lib\Theme\StylesheetLoader;
use Aman5537jains\AbnCms\Lib\Theme\Theme;

class AbnCmsAdminTheme extends Theme{

    protected $layout="index";
    function __construct()
    {
        parent::__construct();

        $this->addStylesheets([
            new StylesheetLoader(asset('public/asset/css/dashboard.css') ),
            new StylesheetLoader(asset('public/asset/css/custom.css') ),

        ]);

        $this->addScripts([
            new ScriptLoader(asset('public/asset/scripts/jQuery.js')),
            new ScriptLoader(asset('public/asset/scripts/dashScript.js')),
            (new ScriptLoader(" $('.has-child > a').on('click', function(e) {
                $(this).parent().siblings('.has-child').find('.dropdown-menu').slideUp();
                $(this).parent().siblings('.has-child').removeClass('selected');


                $(this).parent().toggleClass('selected');
                $(this).next('ul').slideToggle();
                e.stopPropagation();
                e.preventDefault();
            });"))->inline("true"),


            // new ScriptLoader(asset('public/assets/js/jquery-3.2.1.min.js')),
        ]);
    }

    public function getKey(){
        return "AbnCmsAdminTheme";
    }

    public function mixinStylesheet()
    {
        $primary  = $this->getSetting("PRIMARY_COLOR");
        $secondry = $this->getSetting("SECONDRY_COLOR");
        return "
        .dHeader{ background : $primary !important }
         .sidebar-dropdown li.selected > a, .daside-item.active > a, .daside-item:hover > a{ background:$secondry !important }
         .page-dashboard{ background:$primary !important} .dlogin-action .buttons{background:$secondry !important}
         .dbtn-secondary, .buttons.secondary{ background:$secondry !important}
         .buttons.grey {
            border: 1px solid $secondry;
            color: $secondry;
         }
         ";
    }

    function getHeader()
    {
        return $this->view("header");
    }
    function getFooter()
    {
        return $this->view("footer");
    }
    public function getActiveSidebar(){
        return AbnCms::getSidebar();
    }
    public function getSidebar(){
        return $this->view("sidebar");
    }





}
