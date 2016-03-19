export DISPLAY=:0
cd ~/jubi-slideshow/index.htm && php -S 0.0.0.0:8000
nohup chromium-browser --kiosk --start-maximized --incognito http://localhost:8000&
