<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Apple iOS and Android stuff (do not remove) -->
  <meta name="apple-mobile-web-app-capable" content="no" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />
  <!-- Required Stylesheets -->
  <link rel="stylesheet" type="text/css" href="/admin/css/reset.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/css/text.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/css/fluid.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/css/mws.style.css"  media="screen" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- <link rel="stylesheet" type="text/css" href="/admin/css/icons/16x16.css"  media="screen" />
  -->
  <link rel="stylesheet" type="text/css" href="/admin/css/icons/24x24.css"  media="screen" />
  <!-- <link rel="stylesheet" type="text/css" href="/admin/css/icons/32x32.css"  media="screen" />
  -->
  <!-- Demo and Plugin Stylesheets -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/css/demo.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css"  media="screen" />
  -->
  <link rel="stylesheet" type="text/css" href="/admin/plugins/imgareaselect/css/imgareaselect-default.css"  media="screen" />
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/fullcalendar/fullcalendar.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/fullcalendar/fullcalendar.print.css"  media="print" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/chosen/chosen.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/prettyphoto/css/prettyPhoto.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/tipsy/tipsy.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/sourcerer/Sourcerer-1.2.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/jgrowl/jquery.jgrowl.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/plugins/spinner/ui.spinner.css"  media="screen" />
  -->
  <!-- <link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css"  media="screen" />
  -->
  <!-- Theme Stylesheet -->
  <link rel="stylesheet" type="text/css" href="/admin/css/mws.theme.css"  media="screen" />

  <title>@yield('title')</title>

</head>

<body>

  <!-- Themer (Remove if not needed) -->
  <div id="mws-themer">
    <div id="mws-themer-css-dialog">
      <form class="mws-form">
        <div class="mws-form-row">
          <div class="mws-form-item">
            <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Themer End -->

  <!-- Header -->
  <div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

      <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
      <div id="mws-logo-wrap">
        <img src="/admin/images/mws-logo.png"  alt="mws admin" />
      </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">

      <!-- Notifications -->
      <div id="mws-user-notif" class="mws-dropdown-menu">
        <a href="#" class="mws-i-24 i-alert-2 mws-dropdown-trigger">Notifications</a>

        <!-- Unread notification count -->
        <span class="mws-dropdown-notif">35</span>

        <!-- Notifications dropdown -->
        <div class="mws-dropdown-box">
          <div class="mws-dropdown-content">
            <ul class="mws-notifications">
              <li class="read">
                <a href="#">
                  <span class="message">
                    Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                  </span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
              <li class="read">
                <a href="#">
                  <span class="message">Lorem ipsum dolor sit amet</span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
              <li class="unread">
                <a href="#">
                  <span class="message">Lorem ipsum dolor sit amet</span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
              <li class="unread">
                <a href="#">
                  <span class="message">Lorem ipsum dolor sit amet</span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
            </ul>
            <div class="mws-dropdown-viewall">
              <a href="#">View All Notifications</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Messages -->
      <div id="mws-user-message" class="mws-dropdown-menu">
        <a href="#" class="mws-i-24 i-message mws-dropdown-trigger">Messages</a>

        <!-- Unred messages count -->
        <span class="mws-dropdown-notif">35</span>

        <!-- Messages dropdown -->
        <div class="mws-dropdown-box">
          <div class="mws-dropdown-content">
            <ul class="mws-messages">
              <li class="read">
                <a href="#">
                  <span class="sender">John Doe</span>
                  <span class="message">
                    Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                  </span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
              <li class="read">
                <a href="#">
                  <span class="sender">John Doe</span>
                  <span class="message">Lorem ipsum dolor sit amet</span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
              <li class="unread">
                <a href="#">
                  <span class="sender">John Doe</span>
                  <span class="message">Lorem ipsum dolor sit amet</span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
              <li class="unread">
                <a href="#">
                  <span class="sender">John Doe</span>
                  <span class="message">Lorem ipsum dolor sit amet</span>
                  <span class="time">January 21, 2012</span>
                </a>
              </li>
            </ul>
            <div class="mws-dropdown-viewall">
              <a href="#">View All Messages</a>
            </div>
          </div>
        </div>
      </div>

      <!-- User Information and functions section -->
      <div id="mws-user-info" class="mws-inset">

        <!-- User Photo -->
        <div id="mws-user-photo">
          <img src="/admin/example/profile.jpg"  alt="User Photo" />
        </div>

        <!-- Username and Functions -->
        <div id="mws-user-functions">
          <div id="mws-username">{{ session('user')[0]->name }}</div>
          <ul>
            <li>
              <a href="{{ url('admin/user/logout') }}" >退出</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Start Main Wrapper -->
  <div id="mws-wrapper">

    <!-- Necessary markup, do not remove -->
    <div id="mws-sidebar-stitch"></div>
    <div id="mws-sidebar-bg"></div>

    <!-- Sidebar Wrapper -->
    <div id="mws-sidebar">

      <!-- Searchbox -->
      <div id="mws-searchbox" class="mws-inset">
        <form action="http://www.malijuthemeshop.com/themes/mws-admin/1.5/typography.html">
          <input type="text" class="mws-search-input" />
          <input type="submit" class="mws-search-submit" />
        </form>
      </div>

      <!-- Main Navigation -->
      <div id="mws-navigation">
        <ul>
          <li>
            <a href="#" class="mws-i-24 i-list">用户管理</a>
            <ul class="closed" style="display:none">
              <li>
                <a href="{{ url('admin/user/list') }}" >用户列表</a>
              </li>
              <li>
                <a href="{{ url('admin/user/add') }}" >添加用户</a>
              </li>
              <li>
                <a href="{{ url('admin/user/lock')}}" >黑名单</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="mws-i-24 i-blocks-images">分类管理</a>
            <ul class="closed" style="display:none">
              <li>
                <a href="{{ url('admin/cate/list') }}" >分类列表</a>
              </li>
              <li>
                <a href="{{ url('admin/cate/add') }}" >添加分类</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="mws-i-24 i-file-cabinet">书籍管理</a>
            <ul class="closed" style="display:none">
              <li>
                <a href="{{ url('admin/book/list') }}" >图书列表</a>
              </li>
              <li>
                <a href="{{ url('admin/book/add') }}" >添加新书</a>
              </li>
              <li>
                <a href="{{ url('admin/book/recycle') }}" >回收站</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">

      <!-- Inner Container Start -->
      <div class="container">
        <!-- data start -->
        <div class="mws-panel grid_8">@yield('content')</div>
        <!-- data end --> </div>
      <!-- Inner Container End -->

      <!-- Footer -->
      <div id="mws-footer">Copyright Your Website 2012. All Rights Reserved.</div>

    </div>
    <!-- Main Container End --> </div>

</body>
</html>
<script type="text/javascript" src="/admin/js/jquery-1.7.2.min.js" ></script>
<script type="text/javascript">@yield('myjs')</script>
<script type="text/javascript" src="/admin/js/core/mws.js" ></script>
<script type="text/javascript" src="/admin/js/jquery.mousewheel.min.js" ></script>
<script type="text/javascript" src="/admin/js/jquery.placeholder.js" ></script>
<script type="text/javascript" src="/admin/js/jquery.fileinput.js" ></script>
<script type="text/javascript" src="/admin/jui/js/jquery-ui.js" ></script>
<script type="text/javascript" src="/admin/jui/js/jquery.ui.timepicker.js" ></script>
<script type="text/javascript" src="/admin/jui/js/jquery.ui.touch-punch.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/spinner/ui.spinner.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/imgareaselect/jquery.imgareaselect.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/duallistbox/jquery.dualListBox-1.3.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/jgrowl/jquery.jgrowl-min.js" ></script>
<script type="text/javascript" src="/admin/plugins/fullcalendar/fullcalendar.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/datatables/jquery.dataTables.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/chosen/chosen.jquery.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/prettyphoto/js/jquery.prettyPhoto.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/flot/excanvas.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/flot/jquery.flot.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/flot/jquery.flot.pie.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/flot/jquery.flot.stack.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/flot/jquery.flot.resize.min.js" ></script>
<script type="text/javascript" src="/admin/plugins/colorpicker/colorpicker-min.js" ></script>
<script type="text/javascript" src="/admin/plugins/tipsy/jquery.tipsy-min.js" ></script>
<script type="text/javascript" src="/admin/plugins/sourcerer/Sourcerer-1.2-min.js" ></script>
<script type="text/javascript" src="/admin/plugins/smartwizard/js/jquery.smartWizard-2.0.js" ></script>
<script type="text/javascript" src="/admin/plugins/validate/jquery.validate-min.js" ></script>
<script type="text/javascript" src="/admin/js/core/themer.js" ></script>
<script type="text/javascript" src="/admin/js/demo/demo.js" ></script>
<script type="text/javascript" src="/admin/js/demo/demo.dashboard.js" ></script>