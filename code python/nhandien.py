import cv2  # Thư viện OpenCV, sử dụng để xử lý hình ảnh và video
import numpy as np  # Thư viện NumPy, sử dụng để làm việc với mảng và ma trận
import csv # Thư viện file excel
import face_recognition  # Thư viện face_recognition, hỗ trợ nhận diện khuôn mặt
import os  # Thư viện hệ điều hành, sử dụng để thao tác với hệ thống tệp tin
import requests  # Thư viện để gửi HTTP requests
from datetime import datetime  # Thư viện để làm việc với thời gian và ngày tháng

# Lấy ngày và giờ hiện tại
now = datetime.now()

# Định dạng ngày
date = now.strftime("%Y-%m-%d")

path = "picture"
images = []
classNames = []
myList = os.listdir(path)  # Lấy ra list các tên ảnh từ thư mục
for cl in myList:
    curImg = cv2.imread(f"{path}/{cl}")
    images.append(curImg)
    classNames.append(os.path.splitext(cl)[0])  # splitext tách path thành tên và đuôi mở rộng

# Step 2: Encoding
def findEncodings(images):
    encodeList = []
    for img in images:
        img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)  # BGR được chuyển đổi sang RGB
        encode = face_recognition.face_encodings(img)[0]
        encodeList.append(encode)
    return encodeList

encodeListKnown = findEncodings(images)
print("Encoding complete")

def thamgia(name):
    url_to_check = "http://www.google.com"
    try: 
        response = requests.get(url_to_check)
        if response.status_code == 200:
            mylist = []
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
                for i in range(0, count):
                    mahs = data[i]["ma_hoc_sinh"]
                    mylist = mahs
                if ma not in mylist:
                    ghi = requests.get(f"https://dichvusieure.net/api/callback/ghi.php?mahs={ma}&hvt={hvt}").text
                    return
            else:
                print("Không có dữ liệu trả về từ API.")
        else:
            print("Lỗi Hệ Thống Vui Lòng Báo Admin")
    except requests.ConnectionError:
        # get thông tin file
        ma = name.split("-")[0]
        hvt = name.split("-")[1]
        # Mở file txt và đọc nội dung
        date = now.strftime("%Y-%m-%d")
        file_path = f"thamgia_{date}.csv"
        try:
            # Thử mở file nếu tồn tại
            with open(file_path, mode='r+') as file:
                content = file.read()
                # Kiểm tra xem ma có trong content không
                if ma not in content:
                    print(f"Không có kết nối Internet. Lưu thông tin vào file {file_path}.")
                    date = now.strftime("%H:%M:%S")
                    file.write(f"{ma};{hvt};{date}\n")
        except FileNotFoundError:
            # Nếu không tồn tại, tạo mới file
            with open(file_path, mode='a') as file:
                print(f"Không có kết nối Internet. Lưu thông tin vào file {file_path}.")
                date = now.strftime("%H:%M:%S")
                file.write(f"Ma hoc sinh; Ho va ten; Thoi gian\n")
                file.write(f"{ma};{hvt};{date}\n")

# Khởi động webcam, mã hóa hình ảnh từ webcam
cap = cv2.VideoCapture(0)  # Nếu có 1 webcam, đặt giá trị là 0

while True:
    ret, frame = cap.read()
    framS = cv2.resize(frame, (0, 0), None, fx=0.5, fy=0.5)
    framS = cv2.cvtColor(framS, cv2.COLOR_BGR2RGB)

    # Xác định vị trí khuôn mặt trên cam và encode hình ảnh trên cam
    facecurFrame = face_recognition.face_locations(framS)
    encodecurFrame = face_recognition.face_encodings(framS)

    for encodeFace, faceLoc in zip(encodecurFrame, facecurFrame):  # Lấy từng khuôn mặt và vị trí khuôn mặt hiện tại
        matches = face_recognition.compare_faces(encodeListKnown, encodeFace)
        faceDis = face_recognition.face_distance(encodeListKnown, encodeFace)
        # Tìm faceDis thấp nhất sẽ chính xác nhận diện được người cần tìm
        matchIndex = np.argmin(faceDis)  # Đưa về index của faceDis nhỏ nhất

        if faceDis[matchIndex] < 0.40:
            name = classNames[matchIndex].upper()
            thamgia(name)
        else:
            name = 'Unknown'
        # print(name)
        y1, x2, y2, x1 = faceLoc
        y1, x2, y2, x1 = y1 * 2, x2 * 2, y2 * 2, x1 * 2
        cv2.rectangle(frame, (x1, y1), (x2, y2), (0, 255, 0), 2)
        if name != "Unknown":
            cv2.putText(frame, name.split("-")[1], (x1, y2+20), cv2.FONT_HERSHEY_DUPLEX, 0.5, (255, 255, 255), 1)
        else:
            cv2.putText(frame, name, (x1, y2+20), cv2.FONT_HERSHEY_DUPLEX, 0.5, (255, 255, 255), 1)

    cv2.imshow('Tran Dang Khoa', frame)
    if cv2.waitKey(1) == ord("q"):  # Độ trễ 1/1000s , nếu bấm q sẽ thoát
        break
cap.release()  # Giải phóng camera
cv2.destroyAllWindows()  # Đóng tất cả các cửa sổ
