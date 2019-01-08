<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/pace/pace.min.js')}}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="{{URL::asset('SmartAdmin_HTML_Version/js/libs/jquery-2.1.1.min.js')}}"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="{{URL::asset('SmartAdmin_HTML_Version/js/libs/jquery-ui-1.10.3.min.js')}}"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/app.config.js')}}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/bootstrap/bootstrap.min.js')}}"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/notification/SmartNotification.min.js')}}"></script>

<!-- JARVIS WIDGETS -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/smartwidgets/jarvis.widget.min.js')}}"></script>

<!-- EASY PIE CHARTS -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>

<!-- SPARKLINES -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>

<!-- JQUERY SELECT2 INPUT -->
{{--<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/select2/select2.min.js')}}"></script>--}}

<!-- JQUERY UI + Bootstrap Slider -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}"></script>

<!-- browser msie issue fix -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/msie-fix/jquery.mb.browser.min.js')}}"></script>

<!-- FastClick: For mobile devices -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/fastclick/fastclick.min.js')}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->


<!-- MAIN APP JS FILE -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/app.min.js')}}"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/speech/voicecommand.min.js')}}"></script>

<!-- SmartChat UI : plugin -->
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/smart-chat-ui/smart.chat.ui.min.js')}}"></script>
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/smart-chat-ui/smart.chat.manager.min.js')}}"></script>

<!-- Pusher -->
<script src="https://js.pusher.com/2.2/pusher.min.js"></script>

<!-- PAGE RELATED PLUGIN(S)
<script src="..."></script>-->

<script type="text/javascript">

    $(document).ready(function() {

        /* DO NOT REMOVE : GLOBAL FUNCTIONS!
         *
         * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
         *
         * // activate tooltips
         * $("[rel=tooltip]").tooltip();
         *
         * // activate popovers
         * $("[rel=popover]").popover();
         *
         * // activate popovers with hover states
         * $("[rel=popover-hover]").popover({ trigger: "hover" });
         *
         * // activate inline charts
         * runAllCharts();
         *
         * // setup widgets
         * setup_widgets_desktop();
         *
         * // run form elements
         * runAllForms();
         *
         ********************************
         *
         * pageSetUp() is needed whenever you load a page.
         * It initializes and checks for all basic elements of the page
         * and makes rendering easier.
         *
         */

        pageSetUp();
        /*
         * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
         * eg alert("my home function");
         *
         * var pagefunction = function() {
         *   ...
         * }
         * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
         *
         * TO LOAD A SCRIPT:
         * var pagefunction = function (){
         *  loadScript(".../plugin.js", run_after_loaded);
         * }
         *
         * OR
         *
         * loadScript(".../plugin.js", run_after_loaded);
         */

    })

</script>