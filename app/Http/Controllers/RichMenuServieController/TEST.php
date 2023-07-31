
response=$(curl -v -X POST https://api.line.me/v2/bot/richmenu \
-H 'Authorization: Bearer {token}' \
-H 'Content-Type: application/json' \
-d '{
    "size": {
      "width": 2500,
      "height": 843
    },
    "selected": false,
    "name": "richmenu-demo-1",
    "chatBarText": "LINE圖文選單範例",
    "areas": [
      {
        "bounds": {
          "x": 0,
          "y": 0,
          "width": 833,
          "height": 843
        },
        "action": {
          "type": "message",
          "label": "文字",
          "text": "Hello, World!"
        }
      },
      {
        "bounds": {
          "x": 833,
          "y": 0,
          "width": 833,
          "height": 843
        },
        "action": {
          "type": "uri",
          "label": "網址",
          "uri": "https://medium.com/@augustus0818/line-bot-rich-menu-aa5fa67ac6ae"
        }
      },
      {
        "bounds": {
          "x": 1666,
          "y": 0,
          "width": 833,
          "height": 843
        },
        "action": {
          "type": "location",
          "label": "位置"
        }
      }
   ]
}')

# Extract Rich Menu ID from the response
rich_menu_id=$(echo $response | grep -o '"richMenuId": *"[^"]*"' | grep -o '"[^"]*"$' | tr -d '"')

# Step 2: Upload the image for the created Rich Menu
curl -v -X POST "https://api.line.me/v2/bot/richmenu/${rich_menu_id}/content" \
-H "Authorization: Bearer {token}" \
-H "Content-Type: image/png" \
-T image-path.png