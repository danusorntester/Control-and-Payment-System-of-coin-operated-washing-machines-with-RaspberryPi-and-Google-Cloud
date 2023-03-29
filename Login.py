
from PyQt5 import QtCore, QtGui, QtWidgets
import random
from tkinter import *
import tkinter.messagebox as messagebox
import pymysql
from tkinter import *
import requests
import sys
import time
counter = 0
class Ui_lg(object):
        def OnStart(self):
                import RPi.GPIO as GPIO
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
        def Home(self):
                from Home import Ui_Home
                self.window1 = QtWidgets.QMainWindow()
                self.ui = Ui_Home()
                self.ui.setupUi(self.window1)
                self.window1.show()
                
       

        def working(self):
                from working import Ui_working
                self.window3 = QtWidgets.QMainWindow()
                self.ui = Ui_working()
                self.ui.setupUi(self.window3)
                self.window3.show()
                
        def lineend(self,val):
                token = 'EwIl4LXJmp73pHOyu0RDYphVGmztgczcugyBB4Ob1cg'
                headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': f'Bearer {token}'
                }
                url = "https://notify-api.line.me/api/notify"
                message =  'Room '+str(val)+': เครื่องซักผ้า 1 ทำงานเสร็จแล้ว'
                print(headers)
                r = requests.post(url=url, headers=headers, data={'message': message})
        def line(self,val):
                token = 'EwIl4LXJmp73pHOyu0RDYphVGmztgczcugyBB4Ob1cg'
                headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': f'Bearer {token}'
                }
                url = "https://notify-api.line.me/api/notify"
                message =  'Room '+str(val)+': เครื่องซักผ้า 1 กำลังทำงาน'
                print(headers)
                r = requests.post(url=url, headers=headers, data={'message': message})
        def upload(self,val):
                from google.cloud import storage
                client = storage.Client.from_service_account_json(json_credentials_path='credentials-python-storage.json')
                bucket = client.get_bucket('imageuser')
                object_name_in_gcs_bucket = bucket.blob('Room'+str(val)+'.jpg')
                object_name_in_gcs_bucket.upload_from_filename('D:/Project/Program1/Image/Room'+str(val)+'.jpg')
        def camera(cam,val):
                import cv2
                camera = cv2.VideoCapture(0)
                for i in range(10):
                        return_value, image = camera.read()
                        file='D:/Project/Program1/Image/Room'+str(val)+'.jpg'
                        cv2.imwrite(file, image)
                del(camera)
        def messagebox(self,title,message):
                mess=QtWidgets.QMessageBox()
                mess.setWindowTitle("Welcome")
                mess.setText(message)
                mess.setStandardButtons(QtWidgets.QMessageBox.Ok)
                mess.exec_()
        def warning(self,title,message):
                mess=QtWidgets.QMessageBox()
                mess.setWindowTitle("Warning")
                mess.setText(message)
                mess.setStandardButtons(QtWidgets.QMessageBox.Ok)
                mess.exec_()
        def con(self):
                #from Ui_Home import
                import pymysql
                import tkinter as tk
                counter = 0
                
                def counter_label(label):
                        global counter
                        if(counter < 4000):
                                counter += 1
                                label.config(text = "เครื่องซักผ้ากำลังทำงาน..  ")
                                label.after(1000, counter_label, label)
                        else:
                                root.destroy()
                                counter = 0

                Username = self.lineEdit.text()
                Password = self.lineEdit_2.text()
                conn=pymysql.connect(host="34.101.79.102",user="Admin",passwd="0932199742",database="login")
                cur=conn.cursor()
                query="select * from users where Username=%s and Password=%s"
                cur.execute(query,(Username,Password))
                data_user = cur.fetchall()
                data=cur.execute(query,(Username,Password))
                
                if(data == 1):
                        for user in data_user:
                                print(user)
                        count = user[5]
                        count = count + 1
                        query="UPDATE users SET Used = %s where Username=%s and Password=%s"
                        cur.execute(query,(count,Username,Password))
                        query1="INSERT INTO usedtime (Room,Usedtime,WashmachineID) VALUES (%s,NOW(),%s)"
                        val = (user[7])
                        val2 = "G002"
                        cur.execute(query1,(val,val2))
                        conn.commit()
                        self.messagebox("Congrats", "You are Login")
                        #self.camera(val)
                        #self.OnStart()
                        self.line(val)
                        #self.upload(val)
                        root = tk.Tk()
                        root.title("Counter")
                        root.geometry("800x485")
                        root.configure(background="#F5DEB3")
                        label = tk.Label(root, fg = "black" , text = "50",background="#F5DEB3",font="consolas 60")
                        label.pack(side="right")
                        counter_label(label)
                        root.mainloop()
                        self.lineend(val)
                        self.Home()

                        

                else:
                        self.warning("Alert","Username&Password Not Correct")
                        self.lineEdit.clear()
                        self.lineEdit_2.clear()
                        self.Home()
        
        def setupUi(self, lg):
                lg.setObjectName("lg")
                lg.resize(800, 485)
                lg.setStyleSheet("background:#F5DEB3\n"
"\n"
"")
                self.centralwidget = QtWidgets.QWidget(lg)
                self.centralwidget.setObjectName("centralwidget")
                self.frame = QtWidgets.QFrame(self.centralwidget)
                self.frame.setGeometry(QtCore.QRect(190, 80, 401, 351))
                self.frame.setStyleSheet("QFrame\n"
"{\n"
"    background:#333\n"
"}")
                self.frame.setFrameShape(QtWidgets.QFrame.StyledPanel)
                self.frame.setFrameShadow(QtWidgets.QFrame.Raised)
                self.frame.setObjectName("frame")
                self.label = QtWidgets.QLabel(self.frame)
                self.label.setGeometry(QtCore.QRect(130, 50, 151, 61))
                self.label.setStyleSheet("*{\n"
"    font-family:century gothic;\n"
"    font-size:24px;\n"
"    color:white;\n"
"\n"
"}")
                self.label.setObjectName("label")
                self.lineEdit = QtWidgets.QLineEdit(self.frame)
                self.lineEdit.setGeometry(QtCore.QRect(40, 120, 311, 51))
                self.lineEdit.setStyleSheet("QLineEdit{\n"
"background:transparent;\n"
"border:none;\n"
"font-size:20px;\n"
"color:white;\n"
"border-bottom:1px solid #717072;\n"
"}")
                self.lineEdit.setText("")
                self.lineEdit.setMaxLength(32768)
                self.lineEdit.setFrame(True)
                self.lineEdit.setCursorPosition(0)
                self.lineEdit.setObjectName("lineEdit")
                self.log = QtWidgets.QPushButton(self.frame)
                self.log.setGeometry(QtCore.QRect(50, 290, 311, 41))
                self.log.setStyleSheet("#log{\n"
"background:red;\n"
"font-size:24px;\n"
"color:white;\n"
"border-radius:15px;\n"
"}\n"
"#pushButtonHover{\n"
"background:white;\n"
"font-size:24px;\n"
"color:black;\n"
"border-radius:15px;\n"
"}")
                self.log.setObjectName("log")
                self.log.clicked.connect(self.con)
                #self.log.clicked.connect(self.Home)
                self.log.clicked.connect(lg.close)
                self.lineEdit_2 = QtWidgets.QLineEdit(self.frame)
                self.lineEdit_2.setGeometry(QtCore.QRect(40, 200, 311, 51))
                self.lineEdit_2.setStyleSheet("QLineEdit{\n"
"background:transparent;\n"
"border:none;\n"
"font-size:20px;\n"
"color:white;\n"
"border-bottom:1px solid #717072;\n"
"}")
                self.lineEdit_2.setText("")
                self.lineEdit_2.setMaxLength(32768)
                self.lineEdit_2.setFrame(True)
                self.lineEdit_2.setEchoMode(QtWidgets.QLineEdit.Password)
                self.lineEdit_2.setCursorPosition(0)
                self.lineEdit_2.setReadOnly(False)
                self.lineEdit_2.setClearButtonEnabled(False)
                self.lineEdit_2.setObjectName("lineEdit_2")
                self.toolButton = QtWidgets.QToolButton(self.centralwidget)
                self.toolButton.setGeometry(QtCore.QRect(340, 10, 121, 121))
                self.toolButton.setStyleSheet("#toolButton{\n"
"background:red;\n"
"border-radius:60px;\n"
"}")
                icon = QtGui.QIcon()
                icon.addPixmap(QtGui.QPixmap("kisspng-washing-machine-laundry-scalable-vector-graphics-c-a-washing-machine-5a6e0ac989c6a7.9257319415171611615644.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
                self.toolButton.setIcon(icon)
                self.toolButton.setIconSize(QtCore.QSize(100, 90))
                self.toolButton.setAutoRepeat(False)
                self.toolButton.setAutoExclusive(False)
                self.toolButton.setObjectName("toolButton")
                self.pushButton2 = QtWidgets.QPushButton(self.centralwidget)
                self.pushButton2.setGeometry(QtCore.QRect(640, 370, 61, 61))
                self.pushButton2.setStyleSheet("#pushButton2{\n"
"background:white;\n"
"font-size:24px;\n"
"color:white;\n"
"border-radius:15px;\n"
"}\n"
"#pushButtonHover2{\n"
"background:white;\n"
"font-size:24px;\n"
"color:black;\n"
"border-radius:15px;\n"
"}")
                self.pushButton2.setText("")
                icon1 = QtGui.QIcon()
                icon1.addPixmap(QtGui.QPixmap("home.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
                self.pushButton2.setIcon(icon1)
                self.pushButton2.setIconSize(QtCore.QSize(50, 50))
                self.pushButton2.setObjectName("pushButton2")
                self.pushButton2.clicked.connect(self.Home)
                self.pushButton2.clicked.connect(lg.close)
                lg.setCentralWidget(self.centralwidget)
                self.menubar = QtWidgets.QMenuBar(lg)
                self.menubar.setGeometry(QtCore.QRect(0, 0, 800, 21))
                self.menubar.setObjectName("menubar")
                lg.setMenuBar(self.menubar)
                self.statusbar = QtWidgets.QStatusBar(lg)
                self.statusbar.setObjectName("statusbar")
                lg.setStatusBar(self.statusbar)

                self.retranslateUi(lg)
                QtCore.QMetaObject.connectSlotsByName(lg)

        def retranslateUi(self, lg):
                _translate = QtCore.QCoreApplication.translate
                lg.setWindowTitle(_translate("lg", "MainWindow"))
                self.label.setText(_translate("lg", "LOGIN HERE"))
                self.lineEdit.setPlaceholderText(_translate("lg", "USERNAME"))
                self.log.setText(_translate("lg", "Login"))
                self.lineEdit_2.setPlaceholderText(_translate("lg", "PASSWORD"))
                self.toolButton.setText(_translate("lg", "..."))
import PyQt5
        


if __name__ == "__main__":
        import sys
        counter = 0
        def timerEvent():
                print("......")

        app = QtWidgets.QApplication(sys.argv)
        lg = QtWidgets.QMainWindow()
        ui = Ui_lg()
        ui.setupUi(lg)
        lg.show()
        
        sys.exit(app.exec_())


