# Remove the contents of the dist folder
rm -frd ./dist
mkdir ./dist

# Ensure the vendor folder is present in the current directory
if [ ! -d "./vendor" ]; then
    echo "Vendor folder not found. Exiting."
    exit 1
fi

# Run the wp script that produces the zip
npx wp-scripts plugin-zip

# Unzip the zip into its own folder so we can zip that
unzip enable-contributor-uploads.zip -d ./dist/enable-contributor-uploads

# Check if vendor folder is present in the unzipped content
if [ ! -d "./dist/enable-contributor-uploads/vendor" ]; then
    echo "Vendor folder is missing in the unzipped content. Adding it manually."
    cp -r ./vendor ./dist/enable-contributor-uploads/vendor
fi

# plugin-zip includes package.json which is not needed for the plugin, so remove.
rm ./dist/enable-contributor-uploads/package.json
rm ./dist/enable-contributor-uploads/README.md

# Remove the original zip
rm enable-contributor-uploads.zip

# Move into the dist folder and zip the plugin's folder
cd ./dist
zip -r enable-contributor-uploads.zip ./enable-contributor-uploads

# Cleanup and drop back into the original dir
rm -r ./enable-contributor-uploads
cd ..
