all:sass js
	cp -rf ./themes/vincent ./public_html/wp-content/themes
copy:
	cp -rf ./themes/vincent ./public_html/wp-content/themes
sass:
	npm run sass
js:
	npm run bundle-js
