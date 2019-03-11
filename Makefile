all:sass js
	cp -rf ./themes/vincent ./public_html/wp-content/themes
	notify-send "Ready"
copy:
	cp -rf ./themes/vincent ./public_html/wp-content/themes
sass:
	npm run sass
js:
	npm run bundle-js
