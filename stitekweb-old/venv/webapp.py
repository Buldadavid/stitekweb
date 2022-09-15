from flask import Flask, render_template, redirect, request, flash, url_for
import time
from datetime import date
import os
from openpyxl import load_workbook
from PIL import Image, ImageFont, ImageDraw
import qrcode
import csv
import datetime
from os.path import exists

from PIL import Image
import pytesseract
import re

app = Flask(__name__)
app.secret_key = "manbearpig_MUDMAN888"

@app.route('/')
def index():
    return render_template('index2.html')
    
@app.route('/', methods=['POST'])
def my_form_post():
    Imput = request.form['text']
    print(Imput)
    brzda = request.form['text2']
    print(brzda)
    vaha = request.form['text3']
    print(vaha)
    tep = request.form.get('tep')
    print(tep)
    
    wb = load_workbook(filename = '/home/nic/Dokumenty/web/venv/data.xlsx')
    ws = wb['nic']
    ws2 = wb['pamet']

    #Imput = "1p1FT6108-8AC71-1AH0+syfM123123412123" # 37-38
    imput = Imput[2:50]
    cd = len(imput)
    #print(cd)
    
    if " " in Imput :
        return render_template('error/error_qr.html',Imput=Imput)        

    if cd >= 37 :
        mlfb = imput[0:20]
        z = "?"
        barvaZ = "#ff0000"
        #print(z)
        #print(mlfb)
        datum = imput[24:26]
        #print(datum)
    
        vc = imput[24:38]
        wc = len(vc)
        #print(wc)


        if wc == 13 :

            cislo = imput[24:28]+"-"+imput[28:32]+"-"+imput[32:34]+"-"+imput[34:37]
            #print(cislo)

        elif wc == 14:     

            cislo = imput[24:29]+"-"+imput[29:33]+"-"+imput[33:35]+"-"+imput[35:38]
            #print(cislo)
    
    elif cd < 37 :
        mlfb = imput[0:18]
        z = "/"
        barvaZ = "#dddddd"
        #print(mlfb)
        #print(z)
        datum = imput[22:24]
        #print(datum)
        
        vc = imput[22:38]
        wc = len(vc)
        #print(wc)
        if wc == 13 :

            cislo = imput[22:26]+"-"+imput[26:30]+"-"+imput[30:32]+"-"+imput[32:35]
            #print(cislo)

        elif wc == 14:     

            cislo = imput[22:27]+"-"+imput[27:31]+"-"+imput[31:33]+"-"+imput[33:36]
            #print(cislo)
        

    #tvorba indexu 1ft6108a-8
    index = imput[0:6]+imput[15]+imput[7:9]
    print(index)

    #vyhledání indexu v tabulce
    for row in ws.rows:
        if row[0].value == index:
            odmer = row[1].value
            barvaO = "#dddddd"

    try:
      odmer
    except NameError:
      #print("Variable is not defined....!")
      odmer = "?"
      barvaO = "#ff0000"
      print(odmer)
    else:
      #print("Variable is defined.")
      print(odmer)
      
    #vyhledání data v tabulce
    for row in ws.rows:
        if wc == 13 :
            if row[2].value == datum:
                dat_o = row[3].value
                #print(dat_o)

        if wc == 14 :
            if row[4].value == datum:
                dat_o = row[5].value
                #print(dat_o)
     
    #return redirect("/")
    
    current_time = datetime.datetime.now()
    dat = str(current_time.year) + "." + str(current_time.month) + "." + str(current_time.day)
    vibroOK = dat + "_" + mlfb + "_" + cislo + "_16,67Hz_OK_VIB12"
    vibroNOK = dat + "_" + mlfb + "_" + cislo + "_16,67Hz_NOK_VIB12"
    
    todays_date = date.today()
    year = todays_date.year
    q= year-int(dat_o[-4:])
    barva = "#fefefe"
    
    if q > 2 :
        barva = "#ff0000"
    elif q == 1:
        barva = "yellow"
    elif q == 0:
        barva = "#74ec3a"

    
    qr_text = "1P"+mlfb+"+SYF"+cislo.replace("-","")
    
    input_data = qr_text
    qr = qrcode.QRCode(
        version=1,
        box_size=2,
        border=1)
    qr.add_data(input_data)
    qr.make(fit=True)
    im2 = qr.make_image(fill='black', back_color='white')
    my_image = Image.open("/home/nic/Dokumenty/tisk-stitku/st.jpg")
    title_font = ImageFont.truetype("/home/nic/Dokumenty/tisk-stitku/Roboto-Medium.ttf", 20)

    image_editable = ImageDraw.Draw(my_image)
    image_editable.text((25,35), "3 ~ Motor " + mlfb, (0, 0, 0), font=title_font)
    image_editable.text((25,73), "No. YF " + cislo, (0, 0, 0), font=title_font)
    image_editable.text((25,105), "Enc. " + odmer, (0, 0, 0), font=title_font)
    image_editable.text((25,135), "Brake "+ brzda, (0, 0, 0), font=title_font)
    image_editable.text((25,175), "m "+ vaha +"Kg", (0, 0, 0), font=title_font)
    image_editable.text((225,105), "Tepl. čidlo " + tep, (0, 0, 0), font=title_font)

    my_image.paste(im2, (340, 135))
    my_image.save("/home/nic/Dokumenty/web/venv/static/pillow_paste.jpg", quality=95)
    
    data = ['Index:', index,mlfb,cislo,z,odmer]

    with open('/home/nic/Dokumenty/web/venv/data/odmer.csv', 'w', encoding='UTF8') as f:
        writer = csv.writer(f)
        writer.writerow(data)
    
    
    ws2['A2'] = mlfb
    ws2['A3'] = cislo
    ws2['A4'] = odmer
    ws2['A5'] = dat_o
    ws2['A6'] = z
    ws2['A7'] = vibroOK
    ws2['A8'] = vibroNOK
    ws2['A9'] = index
    ws2['A10'] = barvaO
    ws2['A11'] = barvaZ
    ws2['A12'] = barva
    ws2['A13'] = Imput
    wb.save('/home/nic/Dokumenty/web/venv/data.xlsx')

    return render_template('index2.html',barvaO = barvaO, barvaZ=barvaZ, z=z, mlfb=mlfb, datum=dat_o, odmer = odmer, cislo = cislo, Imput= Imput, barva = barva)

@app.route("/uka", methods=['POST'])
def stitek():
    wb = load_workbook(filename = '/home/nic/Dokumenty/web/venv/data.xlsx')
    ws2 = wb['pamet']
    
    mlfbp = ws2['A2'].value
    cislop = ws2['A3'].value
    odmerp = ws2['A4'].value
    dat_op = ws2['A5'].value
    zp = ws2['A6'].value
    vibroOK = ws2['A7'].value
    vibroNOK = ws2['A8'].value
    barvaOp = ws2['A10'].value
    barvaZp = ws2['A11'].value
    barvap = ws2['A12'].value
    Imputp = ws2['A13'].value

    return render_template('stitek.html' ,vibroOK = vibroOK, vibroNOK = vibroNOK , z=zp, mlfb=mlfbp, datum=dat_op, odmer = odmerp, cislo = cislop, barvaO = barvaOp, barvaZ=barvaZp, barva = barvap, Imput = Imputp)

@app.route("/home", methods=['POST'])
def homeer():
    print("home")
    return redirect("/")

@app.route("/tisk", methods=['POST'])
def tisker():
    print("tisk")
    os.system("lp -o media=1*1.9 /home/nic/Dokumenty/web/venv/static/pillow_paste.jpg")
    return redirect("/help")

@app.route("/onkokos", methods=['POST'])
def oner():
    print("on")
    return redirect("http://192.168.0.120")

@app.route("/offkokos", methods=['POST'])
def offer():
    print("off")
    return redirect("/")

@app.route("/new", methods=['POST'])
def newer():
    #os.system("python3 /home/nic/Dokumenty/web/venv/nove_odmer.py")
    #return redirect("/")
    return redirect("http://192.168.0.120/new/nove.php")

@app.route("/diag", methods=['POST'])
def diaer():

    return redirect("http://192.168.0.120/fpdf/mlfb.php")

@app.route("/vyt", methods=['POST', 'GET'])
def vyter():
    os.system("python3 /home/nic/Dokumenty/web/venv/nove_odmer.py")
    return redirect("/")

@app.route("/obrazek", methods=['POST', 'GET'])
def obrazek():  
    return render_template("obrazek.html")
    
@app.route("/smazat", methods=['POST', 'GET'])
def smazat(): 
    print("mazu")
    file_exists1 = exists("/home/nic/Dokumenty/web/venv/static/obr/_jemno.jpg")
    file_exists2 = exists("/home/nic/Dokumenty/web/venv/static/obr/_abr.jpg")
    file_exists3 = exists("/home/nic/Dokumenty/web/venv/static/obr/_kolecko.jpg")
    
    if file_exists1 == True:
        os.remove("/home/nic/Dokumenty/web/venv/static/obr/_jemno.jpg")
    if file_exists2 == True:
        os.remove("/home/nic/Dokumenty/web/venv/static/obr/_abr.jpg")
    if file_exists3 == True:
        os.remove("/home/nic/Dokumenty/web/venv/static/obr/_kolecko.jpg")    
    return redirect("/")

@app.route("/help", methods=['POST', 'GET'])
def off():
    print("nic")
    os.system("python3 /home/nic/Dokumenty/web/venv/manu-stitek.py")
    file = open('/home/nic/Dokumenty/web/venv/data/file.csv')
    csvreader = csv.reader(file)

    mlfbp, cislop, brzdap, odmerp, vahap, tepp, zp = csvreader
    mlfb = " ".join(mlfbp)
    cislo = " ".join(cislop)
    brzda = " ".join(brzdap)
    odmer = " ".join(odmerp)
    vaha = " ".join(vahap)
    tep = " ".join(tepp)
    z = " ".join(zp)
    return render_template("stitek.html", z=z,mlfb=mlfb, odmer = odmer, cislo = cislo,brzda=brzda, vaha=vaha,tep=tep)

@app.route("/foto", methods=['POST', 'GET'])
def foto(): 
    print("foto")
    os.system("mv /home/nic/Dokumenty/web/venv/static/foto/*.jpg /home/nic/Dokumenty/web/venv/static/foto/1")
    data= pytesseract.image_to_string(Image.open("/home/nic/Dokumenty/web/venv/static/foto/1"))
    mlfb = data[41:62]
    cislo = data[70:85]
    return render_template("foto.html", mlfb=mlfb, cislo=cislo)

app.run(host="192.168.0.120")
