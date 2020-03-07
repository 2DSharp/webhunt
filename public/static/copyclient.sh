npm build
rm /var/www/webhunt/public/static/css -rf
rm /var/www/webhunt/public/static/js -rf

cp -rf build/static/css /var/www/webhunt/public/static
cp -rf build/static/js /var/www/webhunt/public/static

cp -rf build/index.html /var/www/webhunt/templates/index.html