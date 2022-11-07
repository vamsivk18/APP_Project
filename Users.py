import numpy as np
import pandas as pd
import requests
import mysql.connector
mydb = mysql.connector.connect(
    host = "localhost",
    username = "root",
    password = "",
    database = "Project"
)
print(mydb)
mycursor = mydb.cursor()
mycursor.execute("drop table if exists Users")
mycursor.execute("create table Users(id int AUTO_INCREMENT PRIMARY KEY,firstName varchar(20),lastName varchar(20),email varchar(20),phone varchar(15),userName varchar(10),password varchar(15))")
for i in range(1,31):
    url="https://dummyjson.com/users/"+str(i)
    response = requests.get(url)
    df=pd.DataFrame(response.json(),index=[0])[['id','firstName','lastName','email','phone','username','password']]
    out = df.values.tolist()
    sql = "insert into Users(id,firstName,lastName,email,phone,username,password) values(%s, %s, %s, %s, %s, %s, %s)"
    val = (out[0][0],out[0][1],out[0][2],out[0][3],out[0][4],out[0][5],out[0][6])
    try:
        mycursor.execute(sql,val)
        mydb.commit()
        print("User "+str(out[0][0])+" data entered")
    except Exception as err:
        print("Cannot insert")
    