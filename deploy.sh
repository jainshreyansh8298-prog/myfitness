#!/bin/bash

# 1. Commit any local changes
echo "Adding changes to git..."
git add .
git commit -m "Deployment update: contact details and seeders"

# 2. Push code to the server's remote (live)
echo "Pushing code to live server..."
git push live main

# 3. SSH into the server to synchronize the working files and run artisan commands
echo "Running seeders and optimizing on remote server..."
ssh -o StrictHostKeyChecking=no myfitnesscmsdev@190.92.174.128 "cd public_html && \
    git reset --hard HEAD && \
    composer dump-autoload && \
    php artisan db:seed --class=SiteSettingContactDetailsSeeder --force && \
    php artisan optimize:clear && \
    php artisan optimize"

echo "Deployment complete!"
