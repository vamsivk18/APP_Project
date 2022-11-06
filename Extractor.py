import numpy as np
import pandas as pd
import requests
for i in range(1,31):
    url="https://dummyjson.com/quotes/"+str(i)
    response = requests.get(url)
    df=pd.DataFrame(response.json(),index=[0])[['id','quote','author']]
    print(df.values.tolist())