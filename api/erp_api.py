from flask import Flask, request, render_template,jsonify,redirect
from datetime import datetime
import mysql.connector
import os
import subprocess
import requests
import webbrowser


def db_conn():
    mydb = mysql.connector.connect(
        host="127.0.0.1",
        port = "3306",
        user="erp",
        password="Polin#96",
        database="erp"
    )
    return mydb    


def send_message(text):
    url = f"https://api.telegram.org/bot6144791187:AAHRTw6JoOEAel8G14vPCvMRsbhnhSxPsqw/sendMessage"
    payload = {
        'chat_id': '-1002040256441',
        'text': text,
        'parse_mode': 'MarkdownV2'  # Use MarkdownV2 for special characters
    }
    response = requests.post(url, data=payload)
    return response.json()

# Your bot's token and chat ID
bot_token = 'your_bot_token'
chat_id = 'your_chat_id'

# Your message with special characters
message = "Hello, *World* \\! This message includes \\*special\\* characters."

# Send the message


#https://api.telegram.org/bot6144791187:AAHRTw6JoOEAel8G14vPCvMRsbhnhSxPsqw/sendMessage?chat_id=-1002040256441&text={msg}




def escape_special_characters(text):
    # List of special characters that need to be escaped in MarkdownV2
    special_characters = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!']

    # Escape each special character with a backslash
    for char in special_characters:
        text = text.replace(char, '\\\\' + char)

    return text

app = Flask(__name__)
@app.route('/stock_entry', methods=['GET', 'POST'])
def index2():
    connection = db_conn()
    cursor = connection.cursor()
    seller = str(request.args.get('seller'))
    email = str(request.args.get('email'))
    passw = str(request.args.get('pass'))
    start_date = request.args.get('start_date')
    price = str(request.args.get('price'))
    print(start_date)
    #data = "Hi boss.\nYou have a new review\n\nName: "+seller+" \nEmail: "+email+" \nSubject: "+passw+" \nMessage: "+start_date+" \n\nprice: "+price
    #print(data)
    x2= email.replace(" ", "+")
    mycursor = mydb.cursor()
    sql = "INSERT INTO netflix_stock (`seller`, `user_email`,`user_pass`, `start_date`,`price`) VALUES (%s, %s, %s, %s, %s)"
    val = (seller, x2, passw, start_date, price, )
    mycursor.execute(sql, val)
    mydb.commit()
    mycursor.close()
    mydb.close()
    x="success"
    #url = f"https://api.telegram.org/bot6144791187:AAHRTw6JoOEAel8G14vPCvMRsbhnhSxPsqw/sendMessage?chat_id=-703960512&text={data}"
    #reder_url = f"http://m4h4d1.tech/contact.html"
    #reder = requests.get(reder_url)
    #print(requests.get(url).json()) # this sends the start_date
    #with open('Templates\\Syslog\\'+'contact_process_'+TIME+'.txt', 'w') as f:
    #    f.write(data)
    return x

@app.route('/stock_renew', methods=['GET', 'POST'])
def index3():
    connection = db_conn()
    mycursor = connection.cursor()
    email = str(request.args.get('email'))
   # print(start_date)
    #data = "Hi boss.\nYou have a new review\n\nName: "+seller+" \nEmail: "+email+" \nSubject: "+passw+" \nMessage: "+start_date+" \n\nprice: "+price
    #print(data)
    x1 = email.replace(" ", "+")
    sql = "UPDATE `erp`.`netflix_stock` SET `start_date`=DATE_ADD(start_date, INTERVAL 30 DAY),  renew_count = renew_count+1, active = 1 WHERE `user_email` =  %s"
    val = (x1, )
    mycursor.execute(sql, val)
    connection.commit()
    mycursor.close()
    connection.close()
    x="stock renewed for "+email
    return x

@app.route('/netflix_flush', methods=['GET', 'POST'])
def index4():
    connection = db_conn()
    cursor = connection.cursor()
    sql = "CALL `update_end_date`()"
    val = ( )
    mycursor.execute(sql, val)
    mydb.commit()
    mycursor.close()
    mydb.close()
    reder_url = f"http://127.0.0.1/"
   # render(reder_url)
    return jsonify("done")

@app.route('/demo', methods=['GET', 'POST'])
def demo():
    x="Success"

    return x

@app.route('/stock_full', methods=['GET', 'POST'])
def netflix():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `id`,`user_email`,`is_sold`,`seller`,`start_date`,`end_date`,`day_left`,`price`,`renew_count`,`is_rplacement`,`active` FROM `netflix_stock` ORDER BY day_left DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/stock_sold', methods=['GET', 'POST'])
def netflix1():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `profile_type`,`user_email`,`seller`,`start_date`,`end_date`,`day_left`,`price` FROM `netflix_stock` WHERE is_sold = 1 AND active = 1 AND is_rplacement = 0 ORDER BY day_left DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/stock_unsold', methods=['GET', 'POST'])
def netflix3():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `profile_type`,`user_email`,`seller`,`start_date`,`end_date`,`day_left`,`price` FROM `netflix_stock` WHERE is_sold = 0 AND active = 1 AND is_rplacement = 0 ORDER BY day_left DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/stock_on_replace', methods=['GET', 'POST'])
def netflix4():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `profile_type`,`user_email`,`seller`,`on_replace_time`,`on_replace_day`,`start_date`,`end_date`,`day_left`,`price` FROM `netflix_stock` WHERE is_rplacement = 1 ORDER BY day_left DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/stock_on_risk', methods=['GET', 'POST'])
def netflix5():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `profile_type`,`user_email`,`seller`,`start_date`,`end_date`,`day_left`,`price` FROM `netflix_stock` WHERE Day_Left BETWEEN 0 AND 5 AND active = 1 AND is_rplacement = 0 ORDER BY day_left DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/view_pass', methods=['GET', 'POST'])
def netflix6():
    email = str(request.args.get('email'))
    connection = db_conn()
    cursor = connection.cursor()
    
    x = email.replace(" ", "+")
    #print(x)
    sql = "SELECT `user_pass` FROM `netflix_stock` WHERE user_email = %s"
    val = (x, )
    cursor.execute(sql, val)
    data = cursor.fetchall()
    cursor.close()
    x1 = str(data[0]).replace("'", "")
    x2 = x1.replace("(", "")
    x3 = x2.replace(")", "")
    x4 = x3.replace(",", "")
    return jsonify(str(x4))


@app.route('/stock_expire', methods=['GET', 'POST'])
def netflix8():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `profile_type`,`user_email`,`seller`,`start_date`,`end_date`,`day_left`,`price` FROM `netflix_stock` WHERE Day_Left <= 0  ORDER BY day_left DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/Employee_Activity', methods=['GET', 'POST'])
def Employee_Activity():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT id, `user`,`log_details`,`created_at`,login_status FROM `access_logs`  ORDER BY id DESC")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/view_password', methods=['GET', 'POST'])
def home():
    return jsonify(data)

@app.route('/update_pass', methods=['GET', 'POST'])
def netflix9():
    email = str(request.args.get('email'))
    passw = str(request.args.get('passw'))
    connection = db_conn()
    cursor = connection.cursor()
    
    x = email.replace(" ", "+")
    #print(x)
    sql = "UPDATE netflix_stock SET user_pass = %s WHERE user_email = %s"
    val = (passw,x, )
    cursor.execute(sql, val)
    mydb.commit()
    cursor.close()
    return jsonify("Done")

@app.route('/update_password', methods=['GET', 'POST'])
def home2():
    return jsonify(data)

@app.route('/conn_php', methods=['GET', 'POST'])
def home3():
    return jsonify(data)

@app.route('/', methods=['GET', 'POST'])
def home4():
    php_response = requests.get('http://127.0.0.1:82/conn_php')
    return jsonify(data)

@app.route('/s_user_active', methods=['GET', 'POST'])
def nf_s_user_full():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT u.`id`,u.`User_Type`,u.`Profile`,s.`user_email`,u.`User_Name`,u.`User_From`,u.`User_Contact`,u.`Package`,u.`start_Date`,u.`end_date`,u.`Day_Left`,u.`Account_Status`,u.`renew_count`,u.`Price` FROM `netflix_user` AS u JOIN `netflix_stock` AS s ON u.`stock_id` = s.`id`")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)


@app.route('/s_user_no_stock', methods=['GET', 'POST'])
def s_user_no_stock():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT u.`id`,u.`User_Type`,u.`Profile`,u.`User_Name`,u.`User_From`,u.`User_Contact`,u.`Package`,u.`start_Date`,u.`end_date`,u.`Day_Left`,u.`Account_Status`,u.`renew_count`,u.`Price` FROM `netflix_user` as u where u.`stock_id` = 0")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

@app.route('/assign_account', methods=['GET', 'POST'])
def assign_account():
    account = str(request.args.get('account'))
    ids = str(request.args.get('ids'))
    connection = db_conn()
    cursor = connection.cursor()
    sql3 = "CALL update_end_date()"
    val3 = ()
    cursor.execute(sql3, val3)
    mydb.commit()
    sql = "UPDATE `netflix_user` SET `stock_id` = 0 WHERE `id` = %s"
    val = (ids, )
    cursor.execute(sql, val)
    mydb.commit()
    sql = "UPDATE `netflix_user` SET `stock_id` = %s WHERE `id` = %s"
    val = (account,ids, )
    cursor.execute(sql, val)
    mydb.commit()
    sql2 = "SELECT u.profile, s.user_email, s.user_pass,u.end_date FROM `netflix_user` AS u JOIN `netflix_stock` AS s ON s.id = u.stock_id WHERE u.id = %s"
    val2 = (ids,)
    cursor.execute(sql2, val2)
    data = cursor.fetchall()
    demo = data[0]
    x = str(demo[1]).replace(" ", "+")

    msg = "Netflix assign_account\n\nProfile: "+str(demo[0])+"\nEmail: "+x+"\nPassword: "+str(demo[2])+"\nRenew Date: "+str(demo[3])
    #msg = "hasantech2banglabd+57@gmail.com"
    message = "Hello, *World* ! This message + includes *special* characters."

    cursor.close()

# Escape the special characters in the text
    escaped_text = escape_special_characters(msg)
    
    print(escaped_text, type(escaped_text))
    #url = f"https://api.telegram.org/bot6144791187:AAHRTw6JoOEAel8G14vPCvMRsbhnhSxPsqw/sendMessage?chat_id=-1002040256441&text={msg}"
    print(send_message(escaped_text))

    #print(requests.get(url).json()) 

    return jsonify("Done")

@app.route('/unassign_account', methods=['GET', 'POST'])
def unassign_account():
    ids = str(request.args.get('ids'))
    connection = db_conn()
    cursor = connection.cursor()
    sql = "UPDATE `netflix_user` SET `stock_id` = 0 WHERE `id` = %s"
    val = (ids, )
    cursor.execute(sql, val)
    mydb.commit()
    cursor.close()
    return jsonify("Done")

@app.route('/user_entry', methods=['GET', 'POST'])
def user_entry():
    connection = db_conn()
    cursor = connection.cursor()

    profile = str(request.args.get('profile'))
    user_name = str(request.args.get('user_name'))
    contact = str(request.args.get('contact'))
    package = request.args.get('package')
    start_date = request.args.get('start_date')
    price = str(request.args.get('price'))
    pin = str(request.args.get('pin'))
    user_from =  str(request.args.get('user_from'))
    mycursor = mydb.cursor()
    sql = "INSERT INTO `netflix_user` (`profile`,`User_Name`,`User_Contact`,`Package`,`start_Date`,`Price`,`pin`,`User_From`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"
    val = (profile, user_name, contact, package, start_date,price,pin, user_from,)
    mycursor.execute(sql, val)
    mydb.commit()
    sql = "SELECT `id` FROM `netflix_user` WHERE profile = %s and user_name = %s and User_Contact = %s and package = %s and start_date = %s and price = %s and pin = %s and user_from = %s"
    val = (profile, user_name, contact, package, start_date,price,pin, user_from, )
    mycursor.execute(sql, val)
    data = mycursor.fetchall()
    mycursor.close()
    x1 = str(data[0]).replace("'", "")
    x2 = x1.replace("(", "")
    x3 = x2.replace(")", "")
    x4 = x3.replace(",", "")
    return jsonify(str(x4))

@app.route('/user_renew', methods=['GET', 'POST'])
def user_renew():
    connection = db_conn()
    cursor = connection.cursor()
    email = str(request.args.get('email'))
   # print(start_date)
    #data = "Hi boss.\nYou have a new review\n\nName: "+seller+" \nEmail: "+email+" \nSubject: "+passw+" \nMessage: "+start_date+" \n\nprice: "+price
    #print(data)
    mycursor = mydb.cursor()
    x1 = email.replace(" ", "+")
    sql = "UPDATE `erp`.`netflix_user` SET `start_date`=DATE_ADD(start_date, INTERVAL 30 DAY),  renew_count = renew_count+1, active = 1 WHERE `id` =  %s"
    val = (x1, )
    mycursor.execute(sql, val)
    mydb.commit()
    mycursor.close()
    mydb.close()
    x="stock renewed for "+email
    return x

@app.route('/stock_send_replace', methods=['GET', 'POST'])
def stock_send_replace():
    connection = db_conn()
    cursor = connection.cursor()
    email = str(request.args.get('email'))
    mycursor = mydb.cursor()
    x1 = email.replace(" ", "+")
    sql2 = "SELECT is_rplacement FROM `netflix_stock` WHERE `user_email` =  %s"
    val2 = (x1,)
    mycursor.execute(sql2, val2)
    data = mycursor.fetchall()
    demo = data[0]
    print(demo[0])
    if demo[0] == 0:
        sql = "UPDATE `netflix_stock` SET is_rplacement = 1, on_replace_time = current_time() WHERE `user_email` =  %s"
        val = (x1, )
        mycursor.execute(sql, val)
        mydb.commit()
        mycursor.close()
        mydb.close()
    else:
        sql = "UPDATE `netflix_stock` SET is_rplacement = 0, on_replace_time = null WHERE `user_email` =  %s"
        val = (x1, )
        mycursor.execute(sql, val)
        mydb.commit()
        mycursor.close()
        mydb.close()
    x="stock renewed for "+email
    return x

@app.route('/employee_list', methods=['GET', 'POST'])
def employee_list():
    connection = db_conn()
    cursor = connection.cursor()
    cursor.execute("SELECT `id`,`username`,`employee_type`,`email`,`status` FROM `users`")
    data = cursor.fetchall()
    cursor.close()
    return jsonify(data)

if __name__ == '__main__':
    app.run(debug=True,host ='0.0.0.0',port='82')
    
