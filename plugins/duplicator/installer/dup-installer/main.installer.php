<?php
/*
 * Duplicator Website Installer
 * Copyright (C) 2018, Snap Creek LLC
 * website: snapcreek.com
 *
 * Duplicator (Pro) Plugin is distributed under the GNU General Public License, Version 3,
 * June 2007. Copyright (C) 2007 Free Software Foundation, Inc., 51 Franklin
 * St, Fifth Floor, Boston, MA 02110, USA
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/** IDE HELPERS */
/* @var $GLOBALS['DUPX_AC'] DUPX_ArchiveConfig */

/** Absolute path to the Installer directory. - necessary for php protection */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if (!defined('KB_IN_BYTES')) { define('KB_IN_BYTES', 1024); }
if (!defined('MB_IN_BYTES')) { define('MB_IN_BYTES', 1024 * KB_IN_BYTES); }
if (!defined('GB_IN_BYTES')) { define('GB_IN_BYTES', 1024 * MB_IN_BYTES); }
if (!defined('DUPLICATOR_PHP_MAX_MEMORY')) { define('DUPLICATOR_PHP_MAX_MEMORY', 4096 * MB_IN_BYTES); }

date_default_timezone_set('UTC'); // Some machines don’t have this set so just do it here.
@ignore_user_abort(true);
@set_time_limit(3600);
@ini_set('memory_limit', DUPLICATOR_PHP_MAX_MEMORY);
@ini_set('max_input_time', '-1');
@ini_set('pcre.backtrack_limit', PHP_INT_MAX);
@ini_set('default_socket_timeout', 3600);

ob_start();
try {
    $exceptionError = false;

    $GLOBALS['DUPX_DEBUG'] = (isset($_GET['debug']) && $_GET['debug'] == 1) ? true : false;
    $GLOBALS['DUPX_ROOT']  = str_replace("\\", '/', (realpath(dirname(__FILE__) . '/..')));
    $GLOBALS['DUPX_INIT']  = "{$GLOBALS['DUPX_ROOT']}/dup-installer";
    $GLOBALS['DUPX_ENFORCE_PHP_INI']  = false;
    require_once($GLOBALS['DUPX_INIT'].'/classes/class.csrf.php');

    // ?view=help
    if (!empty($_GET['view']) && 'help' == $_GET['view']) {
        if (!isset($_GET['archive'])) {
            // RSR TODO: Fail gracefully
            die("Archive parameter not specified");
        }
        if (!isset($_GET['bootloader'])) {
            // RSR TODO: Fail gracefully
            die("Bootloader parameter not specified");
        }
    } else if (isset($_GET['is_daws']) && 1 == $_GET['is_daws']) { // For daws action
        $post_ctrl_csrf_token = isset($_GET['daws_csrf_token']) ? $_GET['daws_csrf_token'] : '';
        if (DUPX_CSRF::check($post_ctrl_csrf_token, 'daws')) {
            require_once($GLOBALS['DUPX_INIT'].'/lib/dup_archive/daws/daws.php');
            die();
        } else {
            die("An invalid request was made to 'daws'.  In order to protect this request from unauthorized access please "
            . "<a href='../{$GLOBALS['BOOTLOADER_NAME']}'>restart this install process</a>.");
        }        
    } else {
        if (!isset($_POST['archive'])) {
            if (isset($_COOKIE['archive'])) {
                $_POST['archive'] = $_COOKIE['archive'];
            } else {
                // RSR TODO: Fail gracefully
                die("Archive parameter not specified");
            }
        }
        if (!isset($_POST['bootloader'])) {
            if (isset($_COOKIE['bootloader'])) {
                $_POST['bootloader'] = $_COOKIE['bootloader'];
            } else {
                // RSR TODO: Fail gracefully
                die("Bootloader parameter not specified");
            }
        }
    }

    require_once($GLOBALS['DUPX_INIT'].'/lib/snaplib/snaplib.all.php');
    require_once($GLOBALS['DUPX_INIT'].'/classes/config/class.constants.php');
    require_once($GLOBALS['DUPX_INIT'].'/classes/config/class.archive.config.php');
    require_once($GLOBALS['DUPX_INIT'].'/classes/class.installer.state.php');
    require_once($GLOBALS['DUPX_INIT'].'/classes/class.password.php');

    $GLOBALS['DUPX_AC'] = DUPX_ArchiveConfig::getInstance();
    if ($GLOBALS['DUPX_AC'] == null) {
        die("Can't initialize config globals! Please try to re-run installer.php");
    }

    //Password Check
    $_POST['secure-pass'] = isset($_POST['secure-pass']) ? $_POST['secure-pass'] : '';
    if ($GLOBALS['DUPX_AC']->secure_on && $GLOBALS['VIEW'] != 'help') {
        $pass_hasher = new DUPX_PasswordHash(8, FALSE);
        $pass_check  = $pass_hasher->CheckPassword(base64_encode($_POST['secure-pass']), $GLOBALS['DUPX_AC']->secure_pass);
        if (! $pass_check) {
            $GLOBALS['VIEW'] = 'secure';
        }
    }

    // Constants which are dependent on the $GLOBALS['DUPX_AC']
    $GLOBALS['SQL_FILE_NAME']		= "dup-installer-data__{$GLOBALS['DUPX_AC']->package_hash}.sql";

    if($GLOBALS["VIEW"] == "step1") {
        $init_state = true;
    } else {
        $init_state = false;
    }

    // TODO: If this is the very first step
    $GLOBALS['DUPX_STATE'] = DUPX_InstallerState::getInstance($init_state);
    if ($GLOBALS['DUPX_STATE'] == null) {
        die("Can't initialize installer state! Please try to re-run installer.php");
    }

    require_once($GLOBALS['DUPX_INIT'] . '/classes/utilities/class.u.php');

    if (!empty($GLOBALS['view'])) {
        $post_view = $GLOBALS['view'];
    } elseif (!empty($_POST['view'])) {
        $post_view = DUPX_U::sanitize_text_field($_POST['view']);
    } else {
        $post_view = '';
    }

    // CSRF checking
    if (!empty($post_view)) {
        $csrf_views = array(
            'secure',
            'step1',
            'step2',
            'step3',
            'step4',
        );

        if (in_array($post_view, $csrf_views)) {
            if (isset($_POST['csrf_token']) && !DUPX_CSRF::check($_POST['csrf_token'], $post_view)) {
                /*
                var_dump($_POST['csrf_token']);
                echo '<br/>';
                echo '<pre>';
                var_dump($_COOKIE);
                echo '</pre>';
                echo '<br/>';
                */
                die("An invalid request was made to '{$post_view}'.  In order to protect this request from unauthorized access please "
                . "<a href='../{$GLOBALS['BOOTLOADER_NAME']}'>restart this install process</a>.");
            }
        }
    }

    require_once($GLOBALS['DUPX_INIT'] . '/classes/class.db.php');
    require_once($GLOBALS['DUPX_INIT'] . '/classes/class.logging.php');
    require_once($GLOBALS['DUPX_INIT'] . '/classes/class.http.php');
    require_once($GLOBALS['DUPX_INIT'] . '/classes/class.server.php');
    require_once($GLOBALS['DUPX_INIT'] . '/classes/config/class.conf.srv.php');

    $GLOBALS['_CURRENT_URL_PATH'] = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    $GLOBALS['_HELP_URL_PATH']    = "?view=help&archive={$GLOBALS['FW_PACKAGE_NAME']}&bootloader={$GLOBALS['BOOTLOADER_NAME']}&basic";
    $GLOBALS['NOW_TIME']		  = @date("His");

    if (!chdir($GLOBALS['DUPX_INIT'])) {
        // RSR TODO: Can't change directories
        echo "Can't change to directory ".$GLOBALS['DUPX_INIT'];
        exit(1);
    }

    if (isset($_POST['ctrl_action'])) {
        $post_ctrl_csrf_token = isset($_POST['ctrl_csrf_token']) ? $_POST['ctrl_csrf_token'] : '';
        $post_ctrl_action = DUPX_U::sanitize_text_field($_POST['ctrl_action']);
        if (!DUPX_CSRF::check($post_ctrl_csrf_token, $post_ctrl_action)) {
            /*
            var_dump($post_ctrl_csrf_token);
            echo '<br/>';
            echo '<pre>';
            var_dump($_COOKIE);
            echo '</pre>';
            echo '<br/>';
            */
            die("An invalid request was made to '{$post_ctrl_action}'.  In order to protect this request from unauthorized access please "
                . "<a href='../{$GLOBALS['BOOTLOADER_NAME']}'>restart this install process</a>.");
        }
        require_once($GLOBALS['DUPX_INIT'].'/ctrls/ctrl.base.php');

        //PASSWORD CHECK
        if ($GLOBALS['DUPX_AC']->secure_on) {
            $pass_hasher = new DUPX_PasswordHash(8, FALSE);
            $pass_check  = $pass_hasher->CheckPassword(base64_encode($_POST['secure-pass']), $GLOBALS['DUPX_AC']->secure_pass);
            if (! $pass_check) {
                die("Unauthorized Access:  Please provide a password!");
            }
        }

        switch ($_POST['ctrl_action']) {
            case "ctrl-step1" :
                require_once($GLOBALS['DUPX_INIT'].'/ctrls/ctrl.s1.php');
                break;

            case "ctrl-step2" :
                require_once($GLOBALS['DUPX_INIT'].'/ctrls/ctrl.s2.dbtest.php');
                require_once($GLOBALS['DUPX_INIT'].'/ctrls/ctrl.s2.dbinstall.php');
                require_once($GLOBALS['DUPX_INIT'].'/ctrls/ctrl.s2.base.php');
                break;

            case "ctrl-step3" :
                require_once($GLOBALS['DUPX_INIT'].'/classes/class.engine.php');
                require_once($GLOBALS['DUPX_INIT'].'/ctrls/ctrl.s3.php');
                break;
        }
        @fclose($GLOBALS["LOG_FILE_HANDLE"]);
        die("");
    }

} catch (Exception $e) {
    $exceptionError = $e;
}

/**
 * clean output
 */
ob_clean();
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow">
	<title>Duplicator</title>
	<link rel='stylesheet' href='assets/font-awesome/css/font-awesome.min.css' type='text/css' media='all' />
	<?php
		require_once($GLOBALS['DUPX_INIT'] . '/assets/inc.libs.css.php');
		require_once($GLOBALS['DUPX_INIT'] . '/assets/inc.css.php');
		require_once($GLOBALS['DUPX_INIT'] . '/assets/inc.libs.js.php');
		require_once($GLOBALS['DUPX_INIT'] . '/assets/inc.js.php');
	?>
</head>
<body>

<div id="content">

<!-- HEADER TEMPLATE: Common header on all steps -->
<table cellspacing="0" class="header-wizard">
	<tr>
		<td style="width:100%;">
			<div class="dupx-branding-header">Duplicator</div>
		</td>
		<td class="wiz-dupx-version">
			<a href="javascript:void(0)" onclick="DUPX.openServerDetails()">version:<?php echo DUPX_U::esc_html($GLOBALS['DUPX_AC']->version_dup); ?></a>&nbsp;
			<?php
				$help_url = "?view=help&archive={$GLOBALS['FW_ENCODED_PACKAGE_PATH']}&bootloader={$GLOBALS['BOOTLOADER_NAME']}&basic";
				echo ($GLOBALS['DUPX_AC']->secure_on) 
					? "<a href='{$help_url}#secure' target='_blank'><i class='fa fa-lock'></i></a>"
					: "<a href='{$help_url}#secure' target='_blank'><i class='fa fa-unlock-alt'></i></a>" ;
			?>
			
			<div style="padding: 6px 0">
				<a href="<?php echo DUPX_U::esc_url($help_url);?>" target="_blank">help</a> <i class="fa fa-question-circle"></i>
			</div>
		</td>
	</tr>
</table>

<div class="dupx-modes">
	<?php
		$php_enforced_txt = ($GLOBALS['DUPX_ENFORCE_PHP_INI']) ? '<i style="color:red"><br/>*PHP ini enforced*</i>' : '';
		$db_only_txt = ($GLOBALS['DUPX_AC']->exportOnlyDB) ? ' - Database Only' : '';
		$db_only_txt = $db_only_txt . $php_enforced_txt;

		if ($GLOBALS['DUPX_AC']->installSiteOverwriteOn) {
			echo  ($GLOBALS['DUPX_STATE']->mode === DUPX_InstallerMode::OverwriteInstall)
				? "<span class='dupx-overwrite'>Mode: Overwrite Install {$db_only_txt}</span>"
				: "Mode: Standard Install {$db_only_txt}";
		} else {
			echo "Mode: Standard Install {$db_only_txt}";
		}
	?>
</div>

<!-- =========================================
FORM DATA: User-Interface views -->
<div id="content-inner">
	<?php
    if ($exceptionError === false) {
        try {
            ob_start();
            switch ($GLOBALS["VIEW"]) {
                case "secure" :
                    require_once($GLOBALS['DUPX_INIT'] . '/views/view.init1.php');
                    break;

                case "step1"   :
                    require_once($GLOBALS['DUPX_INIT'] . '/views/view.s1.base.php');
                    break;

                case "step2" :
                    require_once($GLOBALS['DUPX_INIT'] . '/views/view.s2.base.php');
                    break;

                case "step3" :
                    require_once($GLOBALS['DUPX_INIT'] . '/views/view.s3.php');
                    break;

                case "step4"   :
                    require_once($GLOBALS['DUPX_INIT'] . '/views/view.s4.php');
                    break;

                case "help"   :
                    require_once($GLOBALS['DUPX_INIT'] . '/views/view.help.php');
                    break;
                
                default :
                    echo "Invalid View Requested";
            }
        } catch (Exception $e) {
            /** delete view output **/
            ob_clean();
            $exceptionError = $e;
        }

        /** flush view output **/
        ob_end_flush();
        
    }

    if ($exceptionError !== false) {
        DUPX_Log::info("--------------------------------------");
        DUPX_Log::info('EXCEPTION: '.$exceptionError->getMessage());
        DUPX_Log::info('TRACE:');
        DUPX_Log::info($exceptionError->getTraceAsString());
        DUPX_Log::info("--------------------------------------");
        /**
         *   $exceptionError call in view
         */
        require_once($GLOBALS['DUPX_INIT'] . '/views/view.exception.php');
    }
	?>
</div>
</div>


<!-- SERVER INFO DIALOG -->
<div id="dialog-server-details" title="Setup Information" style="display:none">
	<!-- DETAILS -->
	<div class="dlg-serv-info">
		<?php
			$ini_path 		= php_ini_loaded_file();
			$ini_max_time 	= ini_get('max_execution_time');
			$ini_memory 	= ini_get('memory_limit');
			$ini_error_path = ini_get('error_log');
		?>
         <div class="hdr">SERVER DETAILS</div>
		<label>Web Server:</label>  			<?php echo DUPX_U::esc_html($_SERVER['SERVER_SOFTWARE']); ?><br/>
        <label>PHP Version:</label>  			<?php echo DUPX_U::esc_html(DUPX_Server::$php_version); ?><br/>
		<label>PHP INI Path:</label> 			<?php echo empty($ini_path ) ? 'Unable to detect loaded php.ini file' : $ini_path; ?>	<br/>
		<?php
		$php_sapi_name = php_sapi_name();
		?>
		<label>PHP SAPI:</label>  				<?php echo DUPX_U::esc_html($php_sapi_name); ?><br/>
		<label>PHP ZIP Archive:</label> 		<?php echo class_exists('ZipArchive') ? 'Is Installed' : 'Not Installed'; ?> <br/>
		<label>PHP max_execution_time:</label>  <?php echo $ini_max_time === false ? 'unable to find' : DUPX_U::esc_html($ini_max_time); ?><br/>
		<label>PHP memory_limit:</label>  		<?php echo empty($ini_memory)      ? 'unable to find' : DUPX_U::esc_html($ini_memory); ?><br/>
		<label>Error Log Path:</label>  		<?php echo empty($ini_error_path)      ? 'unable to find' : DUPX_U::esc_html($ini_error_path); ?><br/>

        <br/>
        <div class="hdr">PACKAGE BUILD DETAILS</div>
        <label>Plugin Version:</label>  		<?php echo DUPX_U::esc_html($GLOBALS['DUPX_AC']->version_dup); ?><br/>
        <label>WordPress Version:</label>  		<?php echo DUPX_U::esc_html($GLOBALS['DUPX_AC']->version_wp); ?><br/>
        <label>PHP Version:</label>             <?php echo DUPX_U::esc_html($GLOBALS['DUPX_AC']->version_php); ?><br/>
        <label>Database Version:</label>        <?php echo DUPX_U::esc_html($GLOBALS['DUPX_AC']->version_db); ?><br/>
        <label>Operating System:</label>        <?php echo DUPX_U::esc_html($GLOBALS['DUPX_AC']->version_os); ?><br/>

	</div>
</div>

<script>
DUPX.openServerDetails = function ()
{
	$("#dialog-server-details").dialog({
	  resizable: false,
	  height: "auto",
	  width: 700,
	  modal: true,
	  position: { my: 'top', at: 'top+150' },
	  buttons: {"OK": function() {$(this).dialog("close");} }
	});
}

$(document).ready(function ()
{
	//Disable href for toggle types
	$("a[data-type='toggle']").each(function() {
		$(this).attr('href', 'javascript:void(0)');
	});

});
</script>


<?php if ($GLOBALS['DUPX_DEBUG']) :?>
	<form id="form-debug" method="post" action="?debug=1">
		<input id="debug-view" type="hidden" name="view" />
		<br/><hr size="1" />
		DEBUG MODE ON
		<br/><br/>
		<a href="javascript:void(0)"  onclick="$('#debug-vars').toggle()"><b>PAGE VARIABLES</b></a>
		<pre id="debug-vars"><?php print_r($GLOBALS); ?></pre>
	</form>

	<script>
		DUPX.debugNavigate = function(view)
		{
		//TODO: Write app that captures all ajax requets and logs them to custom console.
		}
	</script>
<?php endif; ?>


<!-- Used for integrity check do not remove:
DUPLICATOR_INSTALLER_EOF -->
</body>
</html>
<?php
ob_end_flush(); // Flush the output from the buffer
