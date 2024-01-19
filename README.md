# Installation and Usage Guide for OpenCV Face Detection and Data Logging

## Project Description

The source code in this project uses the OpenCV library to perform face detection and log student data to a website, facilitating convenient student management.

## System Requirements

- [Python](https://www.python.org/): The primary programming language of the project.
- [OpenCV](https://opencv.org/): A library for image and video processing.
- [face_recognition](https://github.com/ageitgey/face_recognition): A library for face detection.
- [requests](https://pypi.org/project/requests/): A library for making HTTP requests.
- [Visual Studio Community Edition](https://visualstudio.microsoft.com/visual-cpp-build-tools/): Required for installing `face_recognition`.

## Installation

1. **Install Python:**
   - [Download Python](https://www.python.org/downloads/) and follow the instructions to install.

2. **Install Libraries:**
   - Open a terminal or command prompt and run the following commands to install the necessary libraries:
     ```bash
     pip install opencv-python numpy requests
     pip install cmake
     pip install dlib
     pip install face_recognition
     ```

   - Note: If you encounter issues with the Visual Studio Compiler, make sure Visual Studio and CMake are installed correctly.

3. **Prepare the `picture` Folder:**
   - Create a folder named `picture` in the same directory as the `nhandien.py` file.
   - Place the face recognition images in the `picture` folder with the format: `student_id-student_name.jpg`.

## Running the Source Code

To run the source code and initiate face detection, follow these steps:

1. **Open Terminal or Command Prompt:**
   - Open a terminal or command prompt on your computer.

2. **Navigate to the Source Code Folder:**
   - Use the `cd` command to navigate to the folder containing the `nhandien.py` file. For example:
     ```bash
     cd path_to_nhandien.py_folder
     ```

3. **Run the Source Code:**
   - Use the following command to start the application:
     ```bash
     python nhandien.py
     ```

   - The application will connect and use the webcam to perform face detection and log data to the website.

4. **Exit the Application:**
   - When you finish using the application, press the `q` key to close it.

Please note that a connected webcam with permission is required to perform face detection. Check the messages in the terminal for any errors and report back if necessary.

## Contact

If you encounter any issues or need assistance, please contact via email:

- Email: [khoa31122006@gmail.com](mailto:khoa31122006@gmail.com)

You can also connect with me on Facebook:

- Facebook: [Tran Dang Khoa](https://www.facebook.com/100026315003067)

We will try to provide support as soon as possible.
