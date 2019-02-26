<?php
/**
 * Copyright (C) 2014-2019 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

class Ai1wm_Export_Controller {

	public static function index() {
		Ai1wm_Template::render( 'export/index' );
	}

	public static function export( $params = array() ) {
		global $wp_filter;

		ai1wm_setup_environment();

		// Set params
		if ( empty( $params ) ) {
			$params = stripslashes_deep( array_merge( $_GET, $_POST ) );
		}

		// Set priority
		if ( ! isset( $params['priority'] ) ) {
			$params['priority'] = 5;
		}

		// Set secret key
		$secret_key = null;
		if ( isset( $params['secret_key'] ) ) {
			$secret_key = trim( $params['secret_key'] );
		}

		try {
			// Ensure that unauthorized people cannot access export action
			ai1wm_verify_secret_key( $secret_key );
		} catch ( Ai1wm_Not_Valid_Secret_Key_Exception $e ) {
			exit;
		}

		// Get hook
		if ( isset( $wp_filter['ai1wm_export'] ) && ( $filters = $wp_filter['ai1wm_export'] ) ) {
			// WordPress 4.7 introduces new class for working with filters/actions called WP_Hook
			// which adds another level of abstraction and we need to address it.
			if ( isset( $filters->callbacks ) ) {
				$filters = $filters->callbacks;
			}

			ksort( $filters );

			// Loop over filters
			while ( $hooks = current( $filters ) ) {
				if ( intval( $params['priority'] ) === key( $filters ) ) {
					foreach ( $hooks as $hook ) {
						try {

							// Run function hook
							$params = call_user_func_array( $hook['function'], array( $params ) );

							// Log request
							Ai1wm_Log::export( $params );

						} catch ( Exception $e ) {
							if ( defined( 'WP_CLI' ) ) {
								WP_CLI::error( sprintf( __( 'Unable to export: %s', AI1WM_PLUGIN_NAME ), $e->getMessage() ) );
							} else {
								Ai1wm_Status::error( __( 'Unable to export', AI1WM_PLUGIN_NAME ), $e->getMessage() );
								Ai1wm_Notification::error( __( 'Unable to export', AI1WM_PLUGIN_NAME ), $e->getMessage() );
							}
							Ai1wm_Directory::delete( ai1wm_storage_path( $params ) );
							exit;
						}
					}

					// Set completed
					$completed = true;
					if ( isset( $params['completed'] ) ) {
						$completed = (bool) $params['completed'];
					}

					// Do request
					if ( $completed === false || ( $next = next( $filters ) ) && ( $params['priority'] = key( $filters ) ) ) {
						if ( defined( 'WP_CLI' ) ) {
							continue;
						}

						if ( isset( $params['ai1wm_manual_export'] ) ) {
							echo json_encode( $params );
							exit;
						}

						wp_remote_post( apply_filters( 'ai1wm_http_export_url', admin_url( 'admin-ajax.php?action=ai1wm_export' ) ), array(
							'timeout'   => apply_filters( 'ai1wm_http_export_timeout', 5 ),
							'blocking'  => apply_filters( 'ai1wm_http_export_blocking', false ),
							'sslverify' => apply_filters( 'ai1wm_http_export_sslverify', false ),
							'headers'   => apply_filters( 'ai1wm_http_export_headers', array() ),
							'body'      => apply_filters( 'ai1wm_http_export_body', $params ),
						) );
						exit;
					}
				}

				next( $filters );
			}
		}
		return $params;
	}

	public static function buttons() {
		return array(
			apply_filters( 'ai1wm_export_file', Ai1wm_Template::get_content( 'export/button-file' ) ),
			apply_filters( 'ai1wm_export_ftp', Ai1wm_Template::get_content( 'export/button-ftp' ) ),
			apply_filters( 'ai1wm_export_dropbox', Ai1wm_Template::get_content( 'export/button-dropbox' ) ),
			apply_filters( 'ai1wm_export_gdrive', Ai1wm_Template::get_content( 'export/button-gdrive' ) ),
			apply_filters( 'ai1wm_export_s3', Ai1wm_Template::get_content( 'export/button-s3' ) ),
			apply_filters( 'ai1wm_export_b2', Ai1wm_Template::get_content( 'export/button-b2' ) ),
			apply_filters( 'ai1wm_export_onedrive', Ai1wm_Template::get_content( 'export/button-onedrive' ) ),
			apply_filters( 'ai1wm_export_box', Ai1wm_Template::get_content( 'export/button-box' ) ),
			apply_filters( 'ai1wm_export_mega', Ai1wm_Template::get_content( 'export/button-mega' ) ),
			apply_filters( 'ai1wm_export_digitalocean', Ai1wm_Template::get_content( 'export/button-digitalocean' ) ),
			apply_filters( 'ai1wm_export_gcloud_storage', Ai1wm_Template::get_content( 'export/button-gcloud-storage' ) ),
			apply_filters( 'ai1wm_export_azure_storage', Ai1wm_Template::get_content( 'export/button-azure-storage' ) ),
			apply_filters( 'ai1wm_export_glacier', Ai1wm_Template::get_content( 'export/button-glacier' ) ),
			apply_filters( 'ai1wm_export_pcloud', Ai1wm_Template::get_content( 'export/button-pcloud' ) ),
			apply_filters( 'ai1wm_export_webdav', Ai1wm_Template::get_content( 'export/button-webdav' ) ),
			apply_filters( 'ai1wm_export_s3_client', Ai1wm_Template::get_content( 'export/button-s3-client' ) ),
		);
	}

	public static function http_export_headers( $headers = array() ) {
		if ( ( $user = get_option( AI1WM_AUTH_USER ) ) && ( $password = get_option( AI1WM_AUTH_PASSWORD ) ) ) {
			if ( ( $hash = base64_encode( sprintf( '%s:%s', $user, $password ) ) ) ) {
				$headers['Authorization'] = sprintf( 'Basic %s', $hash );
			}
		}

		return $headers;
	}

	public static function cleanup() {
		// Iterate over storage directory
		$iterator = new Ai1wm_Recursive_Directory_Iterator( AI1WM_STORAGE_PATH );

		// Exclude index.php
		$iterator = new Ai1wm_Recursive_Exclude_Filter( $iterator, array( 'index.php' ) );

		// Recursively iterate over content directory
		$iterator = new Ai1wm_Recursive_Iterator_Iterator( $iterator, RecursiveIteratorIterator::CHILD_FIRST, RecursiveIteratorIterator::CATCH_GET_CHILD );

		// We can't delete in the main loop since deletion updates mtime for parent folders
		$files = $folders = array();
		foreach ( $iterator as $item ) {
			try {
				if ( $item->getMTime() < time() - 23 * 60 * 60 ) {
					if ( $item->isFile() ) {
						$files[] = $item->getPathname();
					} elseif ( $item->isDir() ) {
						$folders[] = $item->getPathname();
					}
				}
			} catch ( Exception $e ) {
			}
		}

		// Delete outdated files
		foreach ( $files as $file ) {
			@unlink( $file );
		}

		// Delete outdated folders
		foreach ( $folders as $folder ) {
			Ai1wm_Directory::delete( $folder );
		}
	}
}
