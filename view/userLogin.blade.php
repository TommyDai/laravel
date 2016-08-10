<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
  <link rel="stylesheet" type="text/css" href="/admin/css/icons/16x16.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/css/icons/24x24.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/css/icons/32x32.css"  media="screen" />
  <!-- Demo and Plugin Stylesheets -->
  <link rel="stylesheet" type="text/css" href="/admin/css/demo.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/imgareaselect/css/imgareaselect-default.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/fullcalendar/fullcalendar.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/fullcalendar/fullcalendar.print.css"  media="print" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/chosen/chosen.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/prettyphoto/css/prettyPhoto.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/tipsy/tipsy.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/sourcerer/Sourcerer-1.2.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/jgrowl/jquery.jgrowl.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/plugins/spinner/ui.spinner.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css"  media="screen" />
  <!-- Theme Stylesheet -->
  <link rel="stylesheet" type="text/css" href="/admin/css/mws.theme.css"  media="screen" />

  <title>后台管理--登录</title>

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

  </div>

  <!-- Start Main Wrapper -->
  <div id="mws-wrapper">
    <!-- Main Container Start -->
    <div id="mws-container" style="margin-left:260px;width:60%" class="clearfix">

      <!-- Inner Container Start -->
      <div class="container">
        <!-- data start -->
        <div class="mws-panel grid_8">

          <div class="mws-panel-header">
            <span class="mws-i-24 i-list">后台管理登陆</span>
          </div>
          <div class="mws-panel-body">

            <form class="mws-form" action="{{ url('admin/login') }}" method="post">
              @if (session('tips'))
              <div class="mws-form-message error">
                <ul>
                  <li>{{ session('tips') }}</li>
                </ul>
              </div>
              @endif
        {{ csrf_field() }}
              <div class="mws-form-inline" style="padding:20px">
                <div class="mws-form-row">
                  <label>用 户 名</label>
                  <div class="mws-form-item small">
                    <input name="name" class="mws-textinput" type="text" value="{{ session('name') }}"></div>
                </div>
                <div class="mws-form-row">
                  <label>密　码</label>
                  <div class="mws-form-item small">
                    <input name="password" class="mws-textinput" type="password" value="{{ session('password') }}"></div>
                </div>
              </div>
              <div class="mws-button-row">
                <input value="登录" class="mws-button red" type="submit">
                <input value="撤销" class="mws-button gray" type="reset"></div>
            </form>

          </div>

        </div>
        <!-- data end --> </div>
      <!-- Inner Container End -->

      <!-- Footer -->
      <div id="mws-footer" style="left:0">Copyright Your Website 2012. All Rights Reserved.</div>

    </div>
    <!-- Main Container End --> </div>

</body>
</html>
<script type="text/javascript" src="/admin/js/jquery-1.7.2.min.js" ></script>
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
<script type="text/javascript" src="/admin/js/core/mws.js" ></script>
<script type="text/javascript" src="/admin/js/core/themer.js" ></script>
<script type="text/javascript" src="/admin/js/demo/demo.js" ></script>
<script type="text/javascript" src="/admin/js/demo/demo.dashboard.js" ></script>