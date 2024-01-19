import cv2
import numpy as np
import face_recognition
import os
import requests
from datetime import datetime

# Lấy ngày và giờ hiện tại
now = datetime.now()

# Định dạng ngày
date = now.strftime("%Y-%m-%d")

path="picture"
images= []
classNames =[]
myList =os.listdir(path) # Lấy ra list các name ảnh
for cl in myList:
    curImg = cv2.imread(f"{path}/{cl}")
    images.append(curImg)
    classNames.append(os.path.splitext(cl)[0])
    #splitext sẽ tách path ra thành 2 phần, phần trước đuôi mở rộng và phần mở rộng

#step2 encodeing
def findEncodings(images):
    encodeList = []
    for img in images:
        img = cv2.cvtColor(img,cv2.COLOR_BGR2RGB) #BGR được chuyển đổi sang RGB
        encode = face_recognition.face_encodings(img)[0]
        encodeList.append(encode)
    return encodeList

encodeListKnown = findEncodings(images)
print("encodeing complete")

def thamgia(name):
    url_to_check = "http://www.google.com"
    try: 
        response = requests.get(url_to_check)
        if response.status_code == 200:
            mylist=[]
            # Định dạng ngày
            date = now.strftime("%Y-%m-%d")
            # Gửi yêu cầu GET và chuyển đổi kết quả thành JSON
            response = requests.get("https://dichvusieure.net/api/callback/callback.php?search=" + date)
            data = response.json()
            ma = name.split("-")[0]
            hvt = name.split("-")[1]
            # Kiểm tra nếu có dữ liệu trả về
            if isinstance(data, list):
                count = len(data)
                for i in range(0,count):
                    mahs = data[i]["ma_hoc_sinh"];
                    mylist = mahs
                if ma not in mylist:
                    ghi = requests.get(f"https://dichvusieure.net/api/callback/ghi.php?mahs={ma}&hvt={hvt}").text
                    return
            else:
                print("Không có dữ liệu trả về từ API.")
        else :
            print("Lỗi Hệ Thống Vui Lòng Báo Admin")
    except requests.ConnectionError:
        print("Không có Internet.")


# khởi động webcam, mã hóa hình ảnh webcam
cap =cv2.VideoCapture(0) # nếu có 1 webcam để 0

while True:
    ret, frame= cap.read()
    framS= cv2.resize(frame,(0,0),None,fx=0.5,fy=0.5)
    framS = cv2.cvtColor(framS, cv2.COLOR_BGR2RGB)

    #xác định vị trí khuôn mặt trên cam và encode hình ảnh trên cam
    facecurFrame = face_recognition.face_locations(framS)
    encodecurFrame = face_recognition.face_encodings(framS)

    for encodeFace,faceLoc in zip(encodecurFrame,facecurFrame):  # lấy từng khuôn mặt và vị trí khuôn mặt hiện tại
        matches = face_recognition.compare_faces(encodeListKnown,encodeFace)
        faceDis = face_recognition.face_distance(encodeListKnown,encodeFace)
        # tìm faceDis thấp nhất sẽ chính nhận dạng được người cần tìm
        matchIndex = np.argmin(faceDis) #đẩy về index của faceDis nhỏ nhất

        if faceDis[matchIndex] < 0.40:
            name = classNames[matchIndex].upper()
            thamgia(name)
        else:
            name = 'Unknown'
        # print(name)
        y1, x2, y2, x1 = faceLoc
        y1, x2, y2, x1 = y1 * 2, x2 * 2, y2 * 2, x1 * 2
        cv2.rectangle(frame, (x1, y1), (x2, y2), (0, 255, 0), 2)
        if name !="Unknown":
            cv2.putText(frame, name.split("-")[1], (x1, y2+20), cv2.FONT_HERSHEY_DUPLEX, 0.5, (255, 255, 255), 1)
        else :
            cv2.putText(frame, name, (x1, y2+20), cv2.FONT_HERSHEY_DUPLEX, 0.5, (255, 255, 255), 1)

    cv2.imshow('Tran Dang Khoa', frame)
    if cv2.waitKey(1) == ord("q"):  # độ trễ 1/1000s , nếu bấm q sẽ thoát
        break
cap.release()  # giải phóng camera
cv2.destroyAllWindows()  # thoát tất cả các cửa sổ