import numpy as np
import pandas as pd
import requests
import mysql.connector
import random
mydb = mysql.connector.connect(
    host = "localhost",
    username = "root",
    password = "",
    database = "app_project"
)
mycursor = mydb.cursor()
mycursor.execute("drop table if exists quotes")
mycursor.execute("create table quotes(id int auto_increment unique,quote varchar(500),author varchar(50),username varchar(20), foreign key(username) references users(username))")
mycursor.execute("SELECT name,username from users")
myresult = mycursor.fetchall()
for i in range(1,31):
    url="https://dummyjson.com/quotes/"+str(i)
    response = requests.get(url)
    df=pd.DataFrame(response.json(),index=[0])[['quote']]
    quotes = df.values.tolist()
    rand = random.randint(0,29)
    name = myresult[rand][0]
    username = myresult[rand][1]
    val= (quotes[0][0],name,username)
    sql = "insert into quotes(quote,author,username) values(%s,%s,%s);"
    try:
        mycursor.execute(sql,val)
        mydb.commit()
        print("Quote uploaded by user "+str(name))
    except Exception as err:
        print("Cannot insert")
    