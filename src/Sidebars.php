<?php
namespace Aman5537jains\AbnCmsAdminTheme;


use Aman5537jains\AbnCms\Lib\Sidebar\Sidebar;
use Aman5537jains\AbnCms\Lib\Sidebar\SidebarItem;


class Sidebars{

    public static function dashboard(){
        return new Sidebar("Dashboard",[
            new SidebarItem("Dashboard","","",function($permissions){
                return isset($permissions["contact-form__view"]);
            })

        ]);
    }
    public static function settings(){
        return new Sidebar("Settings",[
            new SidebarItem("Settings","","",function($permissions){
                return isset($permissions["contact-form__view"]);
            })

        ]);
    }

}
