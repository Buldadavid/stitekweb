from PIL import ImageGrab
from tkinter import *
from tkinter import ttk
import os
from os.path import exists
try:
    from PIL import Image
except ImportError:
    import Image

file_exists1 = exists(r"S:\web\venv\static\obr\_jemno.jpg")
file_exists2 = exists(r"S:\web\venv\static\obr\_abr.jpg")
file_exists3 = exists(r"S:\web\venv\static\obr\_kolecko.jpg")



def delete():
    if file_exists1 == True:
        os.remove(r"S:\web\venv\static\obr\_jemno.jpg")
    if file_exists2 == True:
        os.remove(r"S:\web\venv\static\obr\_abr.jpg")
    if file_exists3 == True:
        os.remove(r"S:\web\venv\static\obr\_kolecko.jpg")

def jemner():
    #print("jemno")
    pr = ImageGrab.grabclipboard()
    #pr1 = pr.crop((1250, 500, 1900, 1000))
    im1 = pr.transpose(Image.ROTATE_90)
    im1.save(r"\\192.168.0.120\piservershare\web\venv\static\obr\_jemno.jpg")
    
def aber():
    #print("abr")
    prr = ImageGrab.grabclipboard()
    #prr1 = prr.crop((1250, 500, 1900, 1000))
    imm1 = prr.transpose(Image.ROTATE_90)
    imm1.save(r"\\192.168.0.120\piservershare\web\venv\static\obr\_abr.jpg")
    
def cder():
    #print("cdr")
    prrr = ImageGrab.grabclipboard()
    #prrr1 = prrr.crop((1250, 500, 1900, 1000))
    immm1 = prrr.transpose(Image.ROTATE_90)
    immm1.save(r"\\192.168.0.120\piservershare\web\venv\static\obr\_kolecko.jpg")
    
def kolecko():
    #print("kolecko")
    prrrr = ImageGrab.grabclipboard()
    #prrrr1 = prrrr.crop((450, 200, 1460, 740))
    immmm1 = prrrr.transpose(Image.ROTATE_90)
    immmm1.save(r"\\192.168.0.120\piservershare\web\venv\static\obr\_kolecko.jpg")

root = Tk()
frm = ttk.Frame(root, padding=10)
frm.grid()
ttk.Label(frm, text="Hello World!").grid(column=0, row=0)

ttk.Button(frm, text="jemno", command=jemner).grid(column=1, row=0)
ttk.Button(frm, text="abr", command=aber).grid(column=1, row=1)
ttk.Button(frm, text="cdr", command=cder).grid(column=1, row=2)
ttk.Button(frm, text="kolecko", command=kolecko).grid(column=1, row=3)
ttk.Button(frm, text="smazat", command=delete).grid(column=1, row=4)
root.mainloop()
