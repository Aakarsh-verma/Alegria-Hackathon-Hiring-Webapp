#!/usr/bin/env python

from pyresparser import ResumeParser
import nltk
import spacy
import pandas as pd
# import sys


# fileurl = sys.argv[1]
fileurl = './cv/01_rahul.pdf'
nltk.download('stopwords')
spacy.load('en_core_web_sm')
# data = ResumeParser(str(fileurl)).get_extracted_data()
data = ResumeParser(fileurl).get_extracted_data()

name = data['name']
email = data['email']
exp = int(data['total_experience'])
if exp !=0: emp = 1
else: emp = 0
prev_emp = data['designation']

no_prev = len(prev_emp)
if no_prev != 0 and exp == 0:
    exp = no_prev+1
# for i in prev_emp:
#     if i.include('Manager') or i.include('Associate') or i.include('Developer') or i.include('Head'):
#         no_prev +=1
edu = data['degree']
edu_lvl = len(edu)

apdata = [exp, emp, no_prev, edu_lvl, 0, 0]
apid = fileurl.split('_')
apid = apid[0].split('/')
apid = apid[2]
