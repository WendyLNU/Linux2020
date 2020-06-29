import time
import lxml
from lxml import etree
from selenium import webdriver
import re
from bs4 import BeautifulSoup
import pymysql
url="http://jwgl.lnu.edu.cn/zhxt_bks/zhxt_bks.html"
driver = webdriver.Chrome()
driver.get(url)
input_username = driver.find_element_by_id('input_username')input_password = driver.find_element_by_id('input_password')
input_username.send_keys('171491518')
input_password.send_keys('2017meng')
loginButton = driver.find_element_by_id('loginButton')
loginButton.click()

tree = etree.HTML(driver.page_source)
href = tree.xpath('/pls/wwwbks/bkscjcx.yxkc')
for i in href:
	url = 'http://jwgl.lnu.edu.cn/zhxt_bks/' + i
driver.get(url)
for i in range(200):
    js = 'var q = document.querySelector("#pager_scroll").scrollTop = 10000'
    driver.execute_script(js)
tree = etree.HTML(driver.page_source)
mark = []
time = []
score = []
type = []
name = []
for i in range(1,640):
	td_name = tree.xpath('//*[@id="table"]/tr[' + str(i) + ']/td[1]/text()')
	td_mark = tree.xpath('//*[@id="table"]/tr[' + str(i) + ']/td[5]/text()')
	td_score = tree.xpath('//*[@id="table"]/tr[' + str(i) + ']/td[3]/text()')
	td_time = tree.xpath('//*[@id="table"]/tr[' + str(i) + ']/td[4]/text()')
	td_type = tree.xpath('//*@id = "title"].string)
	name.append(td_name)
    	mark.append(td_mark)
	type.append(td_type)
	score.append(td_score)
	time.append(td_time)


connection = pymysql.connect(host = 'localhost',
                            user = 'root',
                             password = '123456',
                             database = 'university_mark',
                             charset = 'gb2312')
for i in range(len(name)):  
	print(name[i])    
	try:
		with connection.cursor() as cursor:
            		sql = 'insert into my_university_mark (course_name,course_mark,course_time,course_score,course_type) values (%s,%s,%s,%s,%s)'
			cursor.execute(sql,(name[i],mark[i],time[i],score[i],type[i]))
 			connection.commit()
    except pymysql.DatabaseError:
		connection.rollback()
connection.close()
