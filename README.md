# Hướng Dẫn Cài Đặt và Sử Dụng OpenCV để Nhận Diện Khuôn Mặt và Ghi Dữ Liệu

## Mô tả dự án

Mã nguồn trong dự án này sử dụng thư viện OpenCV để nhận diện khuôn mặt và ghi dữ liệu học sinh vào website, giúp quản lý học sinh một cách thuận tiện.

## Yêu Cầu Hệ Thống

- [Python](#python): Ngôn ngữ lập trình chính của dự án.
- [OpenCV](https://opencv.org/): Thư viện xử lý ảnh và video.
- [face_recognition](https://github.com/ageitgey/face_recognition): Thư viện nhận diện khuôn mặt.
- [requests](https://pypi.org/project/requests/): Thư viện để thực hiện HTTP requests.
- [Visual Studio Community Edition](https://visualstudio.microsoft.com/visual-cpp-build-tools/): Cần thiết cho việc cài đặt `face_recognition`.

## Cài Đặt

1. **Cài Đặt Python:**
   - [Tải Python](https://www.python.org/downloads/) và cài đặt theo hướng dẫn.

2. **Cài Đặt Thư Viện:**
   - Mở terminal hoặc command prompt và chạy lệnh sau để cài đặt các thư viện cần thiết:
     ```bash
     pip install opencv-python numpy requests
     pip install cmake
     pip install dlib
     pip install face_recognition
     ```

   - Lưu ý: Nếu bạn gặp vấn đề về Visual Studio Compiler, chắc chắn đã cài đặt Visual Studio và CMake đúng cách.

3. **Chuẩn Bị Thư Mục `picture`:**
   - Tạo một thư mục có tên là `picture` trong cùng thư mục với file `nhandien.py`.
   - Đặt các ảnh nhận diện trong thư mục `picture` theo định dạng: `mã học sinh-tên học sinh.jpg`.

## Chạy Mã Nguồn

1. **Mở Terminal hoặc Command Prompt:**
   - Mở một terminal hoặc command prompt để chạy mã nguồn.

2. **Chuyển đến Thư Mục Chứa Mã Nguồn:**
   - Sử dụng lệnh `cd` để chuyển đến thư mục chứa file `nhandien.py`.

3. **Chạy Mã Nguồn:**
   - Sử dụng lệnh sau để chạy mã nguồn:
     ```bash
     python nhandien.py
     ```

   - Ứng dụng sẽ sử dụng webcam để thực hiện nhận diện khuôn mặt và ghi dữ liệu vào website.

4. **Thoát Ứng Dụng:**
   - Nhấn phím `q` để thoát ứng dụng khi bạn đã kết thúc.

Lưu ý rằng cần có webcam kết nối và được phép truy cập để thực hiện nhận diện khuôn mặt. Kiểm tra các thông báo trong terminal để xem có lỗi hay không và báo cáo lại nếu cần thiết.

Nếu có bất kỳ vấn đề nào, hãy liên hệ qua [khoa31122006@gmail.com](mailto:khoa31122006@gmail.com) để được hỗ trợ.
