
from PyQt5 import QtCore, QtGui, QtWidgets
from Login import Ui_lg
from Qrcode import Ui_qrcodepage

class Ui_Home(object):
        def member(self):
                self.lg = QtWidgets.QMainWindow()
                self.ui = Ui_lg()
                self.ui.setupUi(self.lg)
                self.lg.show()
        def close(self):
                self.lg.close()
        def qr(self):
                self.window3 = QtWidgets.QMainWindow()
                self.ui = Ui_qrcodepage()
                self.ui.setupUi(self.window3)
                self.window3.show()
        def setupUi(self, Home):
                Home.setObjectName("Home")
                Home.resize(800, 485)
                Home.setStyleSheet("background:#333\n"
"\n"
"")
                self.centralwidget = QtWidgets.QWidget(Home)
                self.centralwidget.setObjectName("centralwidget")
                self.frame = QtWidgets.QFrame(self.centralwidget)
                self.frame.setEnabled(True)
                self.frame.setGeometry(QtCore.QRect(-30, -10, 831, 481))
                self.frame.setStyleSheet("QFrame\n"
"{\n"
"    background:#333\n"
"}")
                self.frame.setFrameShape(QtWidgets.QFrame.StyledPanel)
                self.frame.setFrameShadow(QtWidgets.QFrame.Raised)
                self.frame.setObjectName("frame")
                self.label = QtWidgets.QLabel(self.frame)
                self.label.setGeometry(QtCore.QRect(250, 10, 391, 61))
                self.label.setStyleSheet("*{\n"
"    font-family:century gothic;\n"
"    font-size:30px;\n"
"    color:white;\n"
"\n"
"}")
                self.label.setObjectName("label")
                self.toolButton = QtWidgets.QToolButton(self.frame)
                self.toolButton.setGeometry(QtCore.QRect(100, 90, 261, 251))
                self.toolButton.setStyleSheet("#toolButton{\n"
"background:pink;\n"
"border-radius:60px;\n"
"}")
                icon = QtGui.QIcon()
                icon.addPixmap(QtGui.QPixmap("admin_1246350.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
                self.toolButton.setIcon(icon)
                self.toolButton.setIconSize(QtCore.QSize(500, 500))
                self.toolButton.setAutoRepeat(False)
                self.toolButton.setAutoExclusive(False)
                self.toolButton.setObjectName("toolButton")
                self.toolButton.clicked.connect(self.member)
                #self.toolButton.clicked.connect(self.close)
                self.toolButton.clicked.connect(Home.close)
                self.toolButton2 = QtWidgets.QToolButton(self.frame)
                self.toolButton2.setGeometry(QtCore.QRect(510, 90, 261, 251))
                self.toolButton2.setStyleSheet("#toolButton2{\n"
"background:pink;\n"
"border-radius:60px;\n"
"}")
                icon1 = QtGui.QIcon()
                icon1.addPixmap(QtGui.QPixmap("qr.png"), QtGui.QIcon.Normal, QtGui.QIcon.Off)
                self.toolButton2.setIcon(icon1)
                self.toolButton2.setIconSize(QtCore.QSize(180, 180))
                self.toolButton2.setAutoRepeat(False)
                self.toolButton2.setAutoExclusive(False)
                self.toolButton2.setObjectName("toolButton2")
                self.toolButton2.clicked.connect(self.qr)
                self.toolButton2.clicked.connect(Home.close)
                self.label_2 = QtWidgets.QLabel(self.frame)
                self.label_2.setGeometry(QtCore.QRect(160, 360, 391, 61))
                self.label_2.setStyleSheet("*{\n"
"    font-family:century gothic;\n"
"    font-size:30px;\n"
"    color:white;\n"
"\n"
"}")
                self.label_2.setObjectName("label_2")
                self.label_3 = QtWidgets.QLabel(self.frame)
                self.label_3.setGeometry(QtCore.QRect(590, 360, 391, 61))
                self.label_3.setStyleSheet("*{\n"
"    font-family:century gothic;\n"
"    font-size:30px;\n"
"    color:white;\n"
"\n"
"}")
                self.label_3.setObjectName("label_3")
                self.label_4 = QtWidgets.QLabel(self.frame)
                self.label_4.setGeometry(QtCore.QRect(760, 436, 391, 61))
                self.label_4.setStyleSheet("*{\n"
"    font-family:century gothic;\n"
"    font-size:20px;\n"
"    color:white;\n"
"\n"
"}")
                self.label_4.setObjectName("label_4")
                Home.setCentralWidget(self.centralwidget)
                self.menubar = QtWidgets.QMenuBar(Home)
                self.menubar.setGeometry(QtCore.QRect(0, 0, 800, 21))
                self.menubar.setObjectName("menubar")
                Home.setMenuBar(self.menubar)
                self.statusbar = QtWidgets.QStatusBar(Home)
                self.statusbar.setObjectName("statusbar")
                Home.setStatusBar(self.statusbar)
                self.retranslateUi(Home)
                QtCore.QMetaObject.connectSlotsByName(Home)

        def retranslateUi(self, Home):
                _translate = QtCore.QCoreApplication.translate
                Home.setWindowTitle(_translate("Home", "MainWindow"))
                self.label.setText(_translate("Home", "Choose Payment System"))
                self.toolButton.setText(_translate("Home", "..."))
                self.toolButton2.setText(_translate("Home", "..."))
                self.label_2.setText(_translate("Home", "Member"))
                self.label_3.setText(_translate("Home", "QR Code"))
                self.label_4.setText(_translate("Home", "G001"))
import PyQt5


if __name__ == "__main__":
    import sys

    counter = 0
    app = QtWidgets.QApplication(sys.argv)
    Home = QtWidgets.QMainWindow()
    ui = Ui_Home()
    ui.setupUi(Home)

    Lg = QtWidgets.QMainWindow()
    ui2 = Ui_lg()
    ui2.setupUi(Lg)
    Home.show()
    #lg.show()
    sys.exit(app.exec_())
