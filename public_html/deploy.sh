#!/bin/bash
# deploy.sh

HOST="190.92.174.128"
USER="myfitnesscmsdev"
PASS="+z9zAIbMxgv)XgEN"
ROOT_DIR="/home/myfitnesscmsdev/public_html"

# Files to deploy
FILES=(
    "resources/views/admin/settings/index.blade.php"
    "app/Services/SiteSettingService.php"
    "database/seeders/SiteSettingSeeder.php"
    "public/assets/css/premium-fitness.css"
    "resources/views/front/contact.blade.php"
    "resources/views/components/front/footer.blade.php"
    "resources/views/components/front/header.blade.php"
    "resources/views/front/login.blade.php"
    "app/Http/Controllers/Dashboard/SiteSettingController.php"
)

echo "Starting deployment via SFTP..."

for file in "${FILES[@]}"; do
    echo "Uploading $file..."
    # URL encode special chars in password if needed, but passing via -u is safer
    curl -k --user "$USER:$PASS" -T "$file" "sftp://$HOST$ROOT_DIR/$file" --ftp-create-dirs
    if [ $? -eq 0 ]; then
        echo "Successfully uploaded $file"
    else
        echo "Failed to upload $file"
        exit 1
    fi
done

echo "Deployment complete!"
