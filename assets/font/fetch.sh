#!/bin/sh
#
# Fetches font files, and @font-face CSS for loading the fonts.
# They're not hosted on GitHub due to licence conditions.
#

echo "Fetching font files. The password is in the Lighthouse 1Pass!"
cd assets/font

# Try wget, if that fails, use curl:
wget -O fonts.zip https://www.dropbox.com/s/wlbtno0c6tf8ooe/fonts.zip?dl=0 || \
curl -L -o fonts.zip https://www.dropbox.com/s/wlbtno0c6tf8ooe/fonts.zip?dl=0

echo "Extracting files then removing the .zip"
unzip -q fonts.zip
rm fonts.zip
