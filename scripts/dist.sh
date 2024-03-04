#Remove the contents of the dist folder
rm -frd ./dist
mkdir ./dist

#Run the wp script that produces the zip
npx wp-scripts plugin-zip

# unzip the zip into its own folder so we can zip that
unzip enable-contributor-uploads.zip -d ./dist/enable-contributor-uploads

# plugin-zip includes package.json which is not needed for the plugin, so remove.
rm ./dist/enable-contributor-uploads/package.json
rm ./dist/enable-contributor-uploads/README.md

#remove the original zip
rm enable-contributor-uploads.zip

#move into the dist folder and zip the plugin's folder
cd ./dist
zip -r enable-contributor-uploads.zip ./enable-contributor-uploads

#cleanup and drop back into the original dir
rm -r ./enable-contributor-uploads
cd ..
