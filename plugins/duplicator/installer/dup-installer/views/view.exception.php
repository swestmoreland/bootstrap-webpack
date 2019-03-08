<?php
    $log_link = './'.$GLOBALS["LOG_FILE_NAME"];
    $attr_log_link = DUPX_U::esc_attr($log_link);
?>
<div class="dupx-logfile-link"><a href="<?php echo $attr_log_link;?>" target="dup-installer">installer-log.txt</a></div>
<div class="hdr-main">
	Exception error
</div><br/>
<div id="ajaxerr-data">
    <b style="color:#B80000;">INSTALL ERROR!</b>
    <p>
        Message: <b><?php echo DUPX_U::esc_html($exceptionError->getMessage()); ?></b><br>
        Please see the <a href="<?php echo $attr_log_link; ?>" target="dup-installer">installer-log.txt</a> file for more details.
    </p>
    <hr>
    Trace:
    <pre class="exception-trace"><?php
    echo $exceptionError->getTraceAsString();
    ?></pre>
</div>
<div style="text-align:center; margin:10px auto 0px auto">
    <!--<input type="button" class="default-btn" onclick="DUPX.hideErrorResult()" value="&laquo; Try Again" /><br/><br/>-->
    <i style='font-size:11px'>See online help for more details at <a href='https://snapcreek.com/ticket' target='_blank'>snapcreek.com</a></i>
</div>