<?php
defined("ABSPATH") or die("");

class DUP_Web_Services
{

    /**
     * init ajax actions
     */
    public static function init()
    {
        add_action('wp_ajax_duplicator_reset_all_settings', array(__CLASS__, 'ajax_reset_all'));
    }

    /**
     * reset all ajax action
     *
     * the output must be json
     */
    public static function ajax_reset_all()
    {
        ob_start();
        try {
            /** Execute function * */
            $error  = false;
            $result = array(
                'data' => array(),
                'html' => '',
                'message' => ''
            );

            $nonce = sanitize_text_field($_POST['nonce']);
            if (!wp_verify_nonce($nonce, 'duplicator_reset_all_settings')) {
                DUP_Log::trace('Security issue');
                throw new Exception('Security issue');
            }

            $noCompletePakcs = DUP_Package::get_all_by_status(array(
                    array('op' => '<', 'status' => DUP_PackageStatus::COMPLETE)
            ));

            /** Delete all not completed packages * */
            foreach ($noCompletePakcs as $pack) {
                $pack->delete();
            }

            /** reset active package id * */
            DUP_Settings::Set('active_package_id', -1);

            /** Clean tmp folder * */
            DUP_Package::not_active_files_tmp_cleanup();

            //throw new Exception('force error test');
        } catch (Exception $e) {
            $error             = true;
            $result['message'] = $e->getMessage();
        }

        /** Intercept output * */
        $result['html'] = ob_get_clean();

        /** check error and return json * */
        if ($error) {
            wp_send_json_error($result);
        } else {
            wp_send_json_success($result);
        }
    }
}