#!/bin/sh
echo "Installing PHP packages..."
composer update

echo "Running Polylang build..."
npm install && npm run build

echo "Build done!"
