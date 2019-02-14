=== Plugin Name ===
Contributors: jeffrey-wp
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SSNQMST6R28Q2
Tags: category, categories, media, library, medialibrary, image, images, media category, media categories
Requires at least: 3.1
Tested up to: 5.0.2
Stable tag: 1.7
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds the ability to use categories in the media library.

== Description ==

Adds the ability to use categories in the WordPress Media Library. When activated a dropdown of categories will show up in the media library.
You can change / add / remove the category of multiple items at once with bulk actions.
There is even an option to filter on categories when using the gallery shortcode.

= Features WordPress Media Library Categories =
* add / edit / remove categories from media items
* change the category of multiple items at once with bulk actions
* category options & management in the Media Library
* filter on categories in the media library
* filter on categories in the gallery shortcode
* taxonomy filter
* support for WordPress 3.1 – 5.0

> <strong>Try Premium version - 100% money back guarantee</strong>
> WordPress Media Library Categories Premium adds the option to filter on categories when inserting media into a post or page.
> [Try now - 100% money back guarantee](https://1.envato.market/c/1206953/275988/4415?subId1=wpmlcp&subId2=readme&u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmedia-library-categories-premium%2F6691290)

== Installation ==

For an automatic installation through WordPress:

1. Go to the 'Add New' plugins screen in your WordPress admin area
2. Search for 'Media Library Categories'
3. Click 'Install Now' and activate the plugin
4. A dropdown of categories will show up in the media library


For a manual installation via FTP:

1. Upload the 'Media Library Categories' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' screen in your WordPress admin area
3. A dropdown of categories will show up in the media library


To upload the plugin through WordPress, instead of FTP:

1. Upload the downloaded zip file on the 'Add New' plugins screen (see the 'Upload' tab) in your WordPress admin area and activate.
2. Activate the plugin through the 'Plugins' screen in your WordPress admin area
3. A dropdown of categories will show up in the media library

== Frequently Asked Questions ==

= How to use separate categories for the WordPress Media Library (and don't use the same categories as in posts & pages)? =
By default the WordPress Media Library uses the same categories as WordPress does (such as in posts & pages). If you want to use separate categories for the WordPress Media Library add this code to the file functions.php located in your theme or child-theme:
`/**
* separate media categories from post categories
* use a custom category called 'category_media' for the categories in the media library
*/
add_filter( 'wpmediacategory_taxonomy', function(){ return 'category_media'; } ); //requires PHP 5.3 or newer
`
Or if you have an older PHP version:
`add_filter( 'wpmediacategory_taxonomy', create_function( '', 'return "category_media";' ) );  //requires PHP 4.0.1 or newer`


= How to use category in the [gallery] shortcode? =
To only show images from one category in the gallery you have to add the '`category`' attribute to the `[gallery]` shortcode.
The value passed to the '`category`' attribute can be either the `category slug` or the `term_id`, for example with the category slug:
`[gallery category="my-category-slug"]
Or with term_id:
[gallery category="14"]`
If you use an incorrect slug by default WordPress shows the images that are attached to the page / post that is displayed. If you use an incorrect term_id no images are shown. Aside from this behavior, the `[gallery]` shortcode works as it does by default with the built-in shortcode from WordPress ([see the WordPress gallery shortcode codex page](https://codex.wordpress.org/Gallery_Shortcode)). If you only want to show attachments uploaded to the page and filtered by category than use the '`id`' in combination with the '`category`' attribute. For example (the id of the post is 123):
`[gallery category="my-category-slug" id="123"]
Or leave id empty for current page / post:
[gallery category="my-category-slug" id=""]`
In this example the slug is used, but you could also use the term_id.


= How can I filter on categories when inserting media into a post or page? =
This feature is only available in the [premium version](https://1.envato.market/c/1206953/275988/4415?subId1=wpmlcp&subId2=readme&u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmedia-library-categories-premium%2F6691290)


= I want to thank you, where can I make a donation? =
Maintaining a plugin and keeping it up to date is hard work. Please support me by making a donation. Thank you.
[Please donate here](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SSNQMST6R28Q2)

== Screenshots ==

1. Filter by category in the media library. Use bulk actions to add and remove categories of multiple images at once.
2. Manage categories in the media library
3. Filter by category when inserting media [(premium version)](https://1.envato.market/c/1206953/275988/4415?subId1=wpmlcp&subId2=readme&u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmedia-library-categories-premium%2F6691290)

== Changelog ==

= 1.7 =
* Support WordPress 5.0
* Support multiple slugs and id's in gallery shortcode
* Support WordPress Coding Standards 1.1.0
* Add support for [Dark Mode](https://wordpress.org/plugins/dark-mode/) in WordPress

= 1.6.1 =
* Support for SCRIPT_DEBUG
* Only load CSS when needed

= 1.6 =
* Notice for first time users how to separate media categories
* Rewrite entire plugin to improve quality and make it ready for future development
* Move language files to GlotPress

[See complete changelog for all versions](https://jeffrey-wp.com/wordpress-plugin/media-library-categories/changelog/?utm_source=plugin&utm_medium=changelog&utm_campaign=wpmlc).