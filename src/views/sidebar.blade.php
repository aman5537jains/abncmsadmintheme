<div class="daside">
    {{-- <div class="dAside-title">
       <p class="text-default">Admin</p>
    </div> --}}
    <div class="sidebar-dropdown">

       <ul class="">
          {!! \Aman5537jains\AbnCms\Lib\AbnCms::getSidebar() !!}
       </ul>
    </div>
 </div>

 <style>

    .sidebar-dropdown>ul li ul {
       display: none;
       margin-left: 0px;
    }

    li .has-child {
       position: relative;
    }
    .selected * {
    /* color: red !important; */
    }
    .has-child .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
    }
    .sidebar-dropdown li.has-child {
    position: relative;
    }
    .sidebar-dropdown li.has-child>a:after {
    content: "";
    position: absolute;
    right: 12px;
    top: 26px;
    transition: all .3s ease;
    border-left: 5px solid #3d6798;
    border-right: 5px solid transparent;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    }
    .sidebar-dropdown li.selected {
    background-color: #fff;
    }
    .sidebar-dropdown li.selected a {
    color: #172165;
    border-left-color: #EC4117;
    background-color: #F6F6F6;
    }
    .sidebar-dropdown li.selected>a {
    background-color: #ececec;
    }
    .sidebar-dropdown li.selected>a:after {
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #EC4117;
    border-bottom: 5px solid transparent;right: 14px;
    }
    .sidebar-dropdown li.selected>a svg path {
    fill: #EC4117;
    }
    .sidebar-dropdown li.selected svg path {
    fill: #172165;
    }
 </style>
