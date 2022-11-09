import numpy as np
import pandas as pd
import requests
import mysql.connector
mydb = mysql.connector.connect(
    host = "localhost",
    username = "root",
    password = "",
    database = "app_project"
)
mycursor = mydb.cursor()
mycursor.execute("drop table if exists quotes")
mycursor.execute("drop table if exists Users")
mycursor.execute("create table Users(name varchar(50),email varchar(50),username varchar(20) PRIMARY KEY,password varchar(15))")
for i in range(1,31):
    url="https://dummyjson.com/users/"+str(i)
    response = requests.get(url)
    df=pd.DataFrame(response.json(),index=[0])[['firstName','lastName','email','username','password']]
    out = df.values.tolist()
    sql = "insert into Users(name,email,username,password) values(%s, %s, %s, %s)"
    val = (str(out[0][0])+str(" ")+str(out[0][1]),out[0][2],out[0][3],out[0][4])
    try:
        mycursor.execute(sql,val)
        mydb.commit()
        print("User "+str(out[0][0])+" data entered")
    except Exception as err:
        print("Cannot insert")
    