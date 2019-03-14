all:sass js
	notify-send "Ready"
copy:
	cp -rf ./themes/vincent ./public_html/wp-content/themes
sass:
	npm run sass
	make copy
js:
	npm run bundle-js
	make copy
