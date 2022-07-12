from PIL import Image, ImageFont, ImageDraw
import qrcode
import csv

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

input_data = mlfb + " " + cislo
qr = qrcode.QRCode(
    version=1,
    box_size=2,
    border=1)
qr.add_data(input_data)
qr.make(fit=True)
im2 = qr.make_image(fill='black', back_color='white')
my_image = Image.open("//home/nic/Dokumenty/tisk-stitku/st.jpg")
title_font = ImageFont.truetype("/home/nic/Dokumenty/tisk-stitku/Roboto-Medium.ttf", 20)

image_editable = ImageDraw.Draw(my_image)
image_editable.text((25,35), "3 ~ Motor " + mlfb, (0, 0, 0), font=title_font)
image_editable.text((25,73), "No. YF " + cislo + "  Z:" + z, (0, 0, 0), font=title_font)
image_editable.text((25,105), "Enc. " + odmer, (0, 0, 0), font=title_font)
image_editable.text((25,135), "Brake "+ brzda, (0, 0, 0), font=title_font)
image_editable.text((25,175), "m "+ vaha +"Kg", (0, 0, 0), font=title_font)
image_editable.text((225,105), "Tepl. čidlo " + tep, (0, 0, 0), font=title_font)

my_image.paste(im2, (340, 135))
my_image.save("/home/nic/Dokumenty/web/venv/static/pillow_paste.jpg", quality=95) 
