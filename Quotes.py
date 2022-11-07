import numpy as np
import pandas as pd
import requests
import mysql.connector
mydb = mysql.connector.connect(
    host = "localhost",
    username = "root",
    password = ""
)
print(mydb)
for i in range(1,31):
    url="https://dummyjson.com/quotes/"+str(i)
    response = requests.get(url)
    df=pd.DataFrame(response.json(),index=[0])[['id','quote','author']]
    # print(df.values.tolist())