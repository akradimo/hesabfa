#!/bin/bash  

while true; do  
    cd /c/wamp64/www/b/wp-content/plugins/hesabfa || exit  
    git add .  
    git commit -m "Auto-deploy changes"  
    git push origin main  
    sleep 20  # توقف به مدت 20 ثانیه  
done