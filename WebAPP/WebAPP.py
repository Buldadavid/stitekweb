from flask import Flask, render_template, request,redirect
import csv
from openpyxl import load_workbook
import stitek
from datetime import date
import os


app = Flask(__name__)
header = ['QR','MLFB','cislo','z','brzda','odmer','vaha','tep','dat_v','barvaO','barvaZ']

@app.route('/')
def index():
    return render_template('index.html')
    

@app.route('/', methods=['POST', 'GET'])
def indexV():
	row = []	
	QR = request.form['text']
	QR = QR.upper()
	print(QR)
	
	brzda = request.form['text2']
	print(brzda)
	
	vaha = request.form['text3']
	print(vaha)
	
	tep = request.form.get('tep')
	print(tep)
	
	if " " in QR :
		return render_template('error_qr.html',Imput=QR) 

	MLFB,cislo,odmer,Z,dat_v,barvaO,barvaZ = stitek.vyroba(QR)
	
	#pridani do listu
	row.append(QR)
	row.append(MLFB)
	row.append(cislo)
	row.append(Z)
	row.append(brzda)
	row.append(odmer)
	row.append(vaha)
	row.append(tep)
	row.append(dat_v)
	row.append(barvaO)
	row.append(barvaZ)
	
	with open('data/data.csv', 'w') as f:
		writer = csv.writer(f)
		writer.writerow(header)
		writer.writerow(row)
	
	QR,MLFB,Z,cislo,odmer,dat_v,barva,vibroOK,vibroNOK,barvaO,barvaZ = stitek.stitek()
	print(barva)
	return render_template('index.html', z=Z, mlfb=MLFB, datum=dat_v, odmer = odmer, cislo = cislo, Imput= QR,barvaO = barvaO, barvaZ=barvaZ,barva = barva)
    
@app.route('/manualne', methods=['GET'])
def indexM():
	return render_template('indexM.html')

@app.route('/manualne', methods=['POST'])
def indexMV():
	MLFB = request.form['text']
	print(MLFB)
	cislo = request.form['text2']
	print(cislo)
	Z = request.form['textz']
	print(Z)
	brzda = request.form['text3']
	print(brzda)
	odmer = request.form['text4']
	print(odmer)
	vaha = request.form['text5']
	print(vaha)        
	tep = request.form.get('tep')
	print(tep)

	QR = "?"
	dat_v = stitek.vyroba2(cislo)
	row = []

	row.append(QR)
	row.append(MLFB)
	row.append(cislo)
	row.append(Z)
	row.append(brzda)
	row.append(odmer)
	row.append(vaha)
	row.append(tep)
	row.append(dat_v)
	print(MLFB)

	with open('data/data.csv', 'w') as f:
		writer = csv.writer(f)
		writer.writerow(header)
		writer.writerow(row)
    
	return redirect('/uka')

@app.route('/uka', methods=['POST', 'GET'])
def uka():
	QR,MLFB,Z,cislo,odmer,dat_v,barva,vibroOK,vibroNOK,barvaO,barvaZ  = stitek.stitek()
	return render_template('stitek.html',vibroOK = vibroOK, vibroNOK = vibroNOK , z=Z, mlfb=MLFB, datum=dat_v, odmer = odmer, cislo = cislo, barvaO = barvaO, barvaZ=barvaZ, barva = barva, Imput = QR)

@app.route('/home', methods=['POST', 'GET'])
def home():
    return redirect('/')

@app.route("/tisk", methods=['POST'])
def tisker():
    print("tisk")
    #os.system("lp -o media=1*1.9 /static/pillow_paste.png")
    return redirect("/uka")

@app.errorhandler(500)
def page_not_found(e):
    return render_template('500.html'), 500   

app.run(host="0.0.0.0")
