import requests

def check_internet_connection():
    url_to_check = "http://www.google.com"

    try:
        # Thực hiện yêu cầu HTTP đến trang web
        response = requests.get(url_to_check)

        # Kiểm tra mã trạng thái
        if response.status_code == 200:
            print("Kết nối Internet hoạt động.")
        else:
            print(f"Yêu cầu trang web không thành công. Mã trạng thái: {response.status_code}")

    except requests.ConnectionError:
        print("Không thể kết nối đến trang web.")

if __name__ == "__main__":
    check_internet_connection()
