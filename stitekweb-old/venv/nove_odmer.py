from openpyxl import load_workbook
import csv

wb = load_workbook(filename = '/home/nic/Dokumenty/web/venv/data.xlsx')
ws = wb['nic']
ws2 = wb['pamet']

indexp = ws2['A9'].value
print(indexp)


odmerp = ws2['A4'].value
if odmerp == "?" :
    newRowLocation = ws.max_row +1


    file = open('/home/nic/Dokumenty/web/venv/data/odmer.csv')
    csvreader = csv.reader(file)
 
    


    odmerpp, nic = csvreader
    odmer = " ".join(odmerpp)
    ws.cell(column=1,row=newRowLocation, value=indexp)
    ws.cell(column=2,row=newRowLocation, value=odmer)
    wb.save('/home/nic/Dokumenty/web/venv/data.xlsx')
