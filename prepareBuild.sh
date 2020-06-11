#!/bin/bash

############################################
# Script for getting the latest versions of webinterface and web-api to integrate it in the aroioOS Image.
############################################
# Webinterace: https://github.com/aroio/webinterface
# Web-API: https://github.com/aroio/web-api
#####################


#####################
# Get latest release of Webinterface and API
LATEST_INTERFACE=$(curl --silent "https://api.github.com/repos/aroio/webinterface/tags" | jq -r '.[-1].name')
LATEST_API=$(curl --silent "https://api.github.com/repos/aroio/web-api/tags" | jq -r '.[-1].name')

#####################
# Remove old webinterface and api
rm -rf aroio/overlay/opt/www
rm -rf aroio/overlay/opt/api

#####################
# Download latest webinterface releses, unzip and bring them into the right place
cd aroio/overlay/opt
wget https://github.com/aroio/webinterface/archive/$LATEST_INTERFACE.zip
unzip -q $LATEST_INTERFACE.zip && rm $LATEST_INTERFACE.zip
mv webinterface-$LATEST_INTERFACE/frontend/dist/aroio-wi www && rm -rf webinterface-$LATEST_INTERFACE

#####################
# Download latest web api releses, unzip and bring them into the right place
wget https://github.com/aroio/web-api/archive/$LATEST_API.zip
unzip -q $LATEST_API.zip && rm $LATEST_API.zip
mv web-api-$LATEST_API api && rm -rf web-api-$LATEST_API
