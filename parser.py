import sys
import xml.dom.minidom
import datetime
import mysql.connector

import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
import binascii

document = xml.dom.minidom.parse(sys.argv[1])

regdict,predict,diedict={},{},{}

table=document.getElementsByTagName('table')[0]
tbody=table.getElementsByTagName('tbody')[0]
trtable=tbody.getElementsByTagName('tr')
for tr in trtable:
    tdtable=tr.getElementsByTagName('td')
    a=tdtable[0].getElementsByTagName('a')[0]
    state=a.childNodes[0].nodeValue.strip()
    if state=="District of Columbia":
        continue
    regprice=tdtable[1].childNodes[0].nodeValue.strip()
    regdict[state]=regprice

    preprice=tdtable[3].childNodes[0].nodeValue.strip()
    predict[state]=preprice

    dieprice=tdtable[4].childNodes[0].nodeValue.strip()
    diedict[state]=dieprice
    
xregarr,yregarr=[],[]
for key in sorted(regdict, key=regdict.get):
    xregarr.append(key)
    yregarr.append(float(regdict[key][1:]))

xprearr,yprearr=[],[]
for key in sorted(predict, key=predict.get):
    xprearr.append(key)
    yprearr.append(float(predict[key][1:]))

xdiearr,ydiearr=[],[]
for key in sorted(diedict, key=diedict.get):
    xdiearr.append(key)
    ydiearr.append(float(diedict[key][1:]))

plt.rcParams['figure.dpi']=300
plt.rcParams['savefig.dpi']=300

fig, ax=plt.subplots()
ax.tick_params(axis='y',which='major',labelsize=5)
ax.tick_params(axis='x',which='major',labelsize=5)
ax.set_title("Cost of Regular Gasoline In Each US State")
ax.set_xlabel("Dollars Per Gallon")
ax.set_ylabel("State")

hbars=ax.barh(xregarr,yregarr)
ax.bar_label(hbars,fmt='%.3f',fontsize=5)
ax.set_xlim(right=float(max(regdict.values())[1:])+0.25)

plt.savefig("regular.png", bbox_inches="tight")


fig, ax=plt.subplots()
ax.tick_params(axis='y',which='major',labelsize=5)
ax.tick_params(axis='x',which='major',labelsize=5)
ax.set_title("Cost of Premium Gasoline In Each US State")
ax.set_xlabel("Dollars Per Gallon")
ax.set_ylabel("State")

hbars=ax.barh(xprearr,yprearr)
ax.bar_label(hbars,fmt='%.3f',fontsize=5)
ax.set_xlim(right=float(max(predict.values())[1:])+0.25)

plt.savefig("premium.png", bbox_inches="tight")


fig, ax=plt.subplots()
ax.tick_params(axis='y',which='major',labelsize=5)
ax.tick_params(axis='x',which='major',labelsize=5)
ax.set_title("Cost of Diesel In Each US State")
ax.set_xlabel("Dollars Per Gallon")
ax.set_ylabel("State")

hbars=ax.barh(xdiearr,ydiearr)
ax.bar_label(hbars,fmt='%.3f',fontsize=5)
ax.set_xlim(right=float(max(diedict.values())[1:])+0.25)

plt.savefig("diesel.png", bbox_inches="tight")


with open("regular.png", 'rb') as f:
    content=f.read()
regimginhex=binascii.hexlify(content)

with open("premium.png", 'rb') as f:
    content=f.read()
preimginhex=binascii.hexlify(content)

with open("diesel.png", 'rb') as f:
    content=f.read()
dieimginhex=binascii.hexlify(content)

today=datetime.date.today().strftime("%m/%d/%Y")

mydb = mysql.connector.connect(host="localhost", user="root", passwd="root",database="gas") 
mycursor = mydb.cursor()

# INCASE DATE OVERLAP OCCURS DELETE FROM 
# DATABASE AND UPDATE NEW DATA FOR SAME DATE
delete_instruct = "DELETE FROM imgs WHERE date = %s"
delete_params = [today]
mycursor.execute(delete_instruct, delete_params)

insert_instruct = "INSERT INTO imgs (gastype, date, img) VALUES (%s,%s,%s)"
insert_params = ('reg',today,regimginhex)
mycursor.execute(insert_instruct, insert_params)
mycursor.fetchwarnings()

insert_instruct = "INSERT INTO imgs (gastype, date, img) VALUES (%s,%s,%s)"
insert_params = ('pre',today,preimginhex)
mycursor.execute(insert_instruct, insert_params)
mycursor.fetchwarnings()

insert_instruct = "INSERT INTO imgs (gastype, date, img) VALUES (%s,%s,%s)"
insert_params = ('die',today,dieimginhex)
mycursor.execute(insert_instruct, insert_params)
mycursor.fetchwarnings()

mydb.commit()
mydb.close()