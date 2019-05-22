import re
import csv
import os
import csv
import nltk
import json
from nltk.corpus import stopwords
import pandas as pd
pwd = os.path.dirname(__file__)
df = pd.read_csv('link1-100.csv')
f = open('json_url.json')

mykey = json.load(f)
f.close()


def stop_word(content):
    words = re.findall("[A-Za-z]+", content)
    stop = set(stopwords.words('english'))
    stop_word = []
    for i in words:
        if i not in stop:
            stop_word.append(i)
    return stop_word


def count_word(word, dicted):
    count = 0
    for i in dicted[word]:
        len(dicted[word][i])
        count = count + len(dicted[word][i])
    return count


def intersec(search, dicts):
    intersect = {}
    n = 0
    for i in search:
        if i in dicts.keys():
            lists = []
            for j in dicts[i]:
                lists.append(j)
                s = set(lists)
            intersect[n] = s
            n += 1
        else:
            n = 0
            break

    first = intersect[0]
    for i in intersect.keys():
        s1 = first.intersection(intersect[i])
        first = s1
        (s2) = first

    return list(s2)


def SearchWord(wordsearchs):
  geturl = {}
  word = wordsearchs.lower()
  wordsearchs = stop_word(word)
  result = []
  # try:
  for i in wordsearchs:
    if i in mykey: #ที่อยู่ใน file json
      result.append(i)
      freq = count_word(i, mykey)
      print(i, ": ", freq)
      for j in mykey[i]:
        print(f"{j} :{mykey[i][j]}")
    else:
      print(f"{i} Not found!")

      
  print(result)
  flag = 0
  if len(result) == len(wordsearchs):
    inter = intersec(result, mykey)
    inter = list(map(int, inter))
    print(f"Intersection >>>> {inter}")
    if(len(inter) != 0):
      flag = 1
      for i in inter:
        geturl[i] = df['url'][i-1]
        print(df['url'][i-1])
      return geturl    
  if flag == 0:
    print("Not Intersaction!!!")
      
  # except:
  #     pass
     
