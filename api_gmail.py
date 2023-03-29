
# Importing required libraries
from googleapiclient import discovery
from googleapiclient import errors
from httplib2 import Http
from oauth2client import file, client, tools
import base64
from bs4 import BeautifulSoup
import re
import time
import dateutil.parser as parser
from datetime import datetime
import datetime
import csv
import time
import requests
import tkinter as tk
counter = 0

def lineend():
                token = 'EwIl4LXJmp73pHOyu0RDYphVGmztgczcugyBB4Ob1cg'
                headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': f'Bearer {token}'
                }
                url = "https://notify-api.line.me/api/notify"
                message =  'ผู้ใช้งาน Qrcode : เครื่องซักผ้าทำงานเสร็จแล้ว'
                print(headers)
                r = requests.post(url=url, headers=headers, data={'message': message})
def line():
                token = 'EwIl4LXJmp73pHOyu0RDYphVGmztgczcugyBB4Ob1cg'
                headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': f'Bearer {token}'
                }
                url = "https://notify-api.line.me/api/notify"
                message =  'ผู้ใช้งาน Qrcode : เครื่องซักผ้ากำลังทำงาน'
                print(headers)
                r = requests.post(url=url, headers=headers, data={'message': message})
def On_Start():
                '''import RPi.GPIO as GPIO
                import time

                GPIO.setmode(GPIO.BCM)
                GPIO.setwarnings(False)

                pins = [21] #เป็น array
                GPIO.setup(pins, GPIO.OUT, initial = GPIO.HIGH)

                time.sleep(1)
                counter = range(2)
                for i in counter :
                     GPIO.output(21,  GPIO.HIGH)
                     print('PIN: ' + str(21) + ' is 1 (GPIO.HIGH)')
                     time.sleep(0.2)
                     GPIO.output(21,  GPIO.LOW)
                     print('PIN: ' + str(21) + ' is 1 (GPIO.LOW)')
                     time.sleep(0.2)
                     line()
                     '''
                def counter_label(label):
                        global counter
                        if(counter < 10):
                            counter += 1
                            label.config(text = "เครื่องซักผ้ากำลังทำงาน...")
                            label.after(1000, counter_label, label)
                        else:
                            root.destroy()
                            counter=0
                        
                root = tk.Tk()
                root.title("Counter")
                root.geometry("800x485")
                root.configure(background="#F5DEB3")
                label = tk.Label(root, fg = "black" , text = "50",background="#F5DEB3",font="consolas 60")
                label.pack(side="right")
                counter_label(label)
                root.mainloop()
                lineend()
#time.sleep(50)
def gmail_checker():
    
    SCOPES = 'https://www.googleapis.com/auth/gmail.modify' # we are using modify and not readonly, as we will be marking the messages Read
    store = file.Storage('storage.json') 
    creds = store.get()
    if not creds or creds.invalid:
        flow = client.flow_from_clientsecrets('credentials.json', SCOPES)
        creds = tools.run_flow(flow, store)
    GMAIL = discovery.build('gmail', 'v1', http=creds.authorize(Http()))

    user_id =  'me'
    label_id_one = 'INBOX'
    label_id_two = 'UNREAD'

    # Getting all the unread messages from Inbox
    # labelIds can be changed accordingly
    try :
        unread_msgs = GMAIL.users().messages().list(userId='me',labelIds=[label_id_one, label_id_two]).execute()

        # We get a dictonary. Now reading values for the key 'messages'
        mssg_list = unread_msgs['messages']


        TotalmessageInbox = str(len(mssg_list))

        print("TotalmessageInbox = ",TotalmessageInbox)


        final_list = [ ]

        count = 0
        for mssg in mssg_list:
            if count < 1 :
                temp_dict = { }
                m_id = mssg['id'] # get id of individual message
                message = GMAIL.users().messages().get(userId=user_id, id=m_id).execute() # fetch the message using API
                payld = message['payload'] # get payload of the message 
                headr = payld['headers'] # get header of the payload


                for one in headr: # getting the Subject
                    if one['name'] == 'Subject':
                        msg_subject = one['value']
                        temp_dict['Subject'] = msg_subject
                    else:
                        pass


                for two in headr: # getting the date
                    if two['name'] == 'Date':
                        msg_date = two['value']
                        date_parse = (parser.parse(msg_date))
                        m_date = (date_parse.date())
                        temp_dict['Date'] = str(m_date)
                    else:
                        pass

                for three in headr: # getting the Sender
                    if three['name'] == 'From':
                        msg_from = three['value']
                        temp_dict['Sender'] = msg_from
                    else:
                        pass

                temp_dict['Snippet'] = message['snippet'] # fetching message snippet


                try:
                    
                    # Fetching message body
                    mssg_parts = payld['parts'] # fetching the message parts
                    part_one  = mssg_parts[0] # fetching first element of the part 
                    part_body = part_one['body'] # fetching body of the message
                    part_data = part_body['data'] # fetching data from the body
                    clean_one = part_data.replace("-","+") # decoding from Base64 to UTF-8
                    clean_one = clean_one.replace("_","/") # decoding from Base64 to UTF-8
                    clean_two = base64.b64decode (bytes(clean_one, 'UTF-8')) # decoding from Base64 to UTF-8
                    soup = BeautifulSoup(clean_two , "lxml" )
                    mssg_body = soup.body()
                    # mssg_body is a readible form of message body
                    # depending on the end user's requirements, it can be further cleaned 
                    # using regex, beautiful soup, or any other method
                    temp_dict['Message_body'] = mssg_body

                except :
                    pass

                # print (temp_dict)
        
                final_list.append(temp_dict) # This will create a dictonary item in the final list
                
                # This will mark the messagea as read
                GMAIL.users().messages().modify(userId=user_id, id=m_id,body={ 'removeLabelIds': ['UNREAD']}).execute() 


                header = temp_dict['Subject']
                x = header.split()
                body = temp_dict['Snippet']
                ShowMoney = body.split('(บาท): ')
                splitMoney = ShowMoney[1].split()
                Money = splitMoney[0]

                
                if x[0] == 'SCB' and x[1]=='Easy' and x[2]=='App:' and x[3]=='คุณได้รับเงินผ่านรายการพร้อมเพย์' and temp_dict['Sender'] == 'SCB Easy <scbeasynet@scb.co.th>' and Money == '1.00':
                    On_Start()
                
                count = count+1
            



        print ("Total messaged retrived: ", str(len(final_list)))

    except :
        print ("NO EMAIL UNREAD")
        pass










while 1 :
    time.sleep(2)
    gmail_checker()




