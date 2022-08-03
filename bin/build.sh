#!/bin/sh
echo "Installing PHP packages..."
composer update

echo "Running Polylang build..."
npm install && npm run build

echo "Build done!"

echo "Cleanup" # Discard composer.lock and package-lock.json changings to ensure they'll never be pushed on repository.
git checkout -- composer.lock package-lock.json
