import requests
import sys

token = 'dqXK2QxfJNgqvlg206mXrrk9F1tke6Tt0Y4Ha7fCNpg'
headers = {
    'Content-Type': 'application/x-www-form-urlencoded',
    'Authorization': f'Bearer {token}'
}
url = "https://notify-api.line.me/api/notify"
message =  'เสร็จสิ้นขั้นตอนชำระ'
print(headers)
r = requests.post(url=url, headers=headers, data={'message': message})