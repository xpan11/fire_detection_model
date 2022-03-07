# Real-time Fire Detection System Project


Contributor: `Weikun Zhang`, `Xiaofeng Pan`, `Kaitlyn Jiaqi Li`, `Ruowen Li`

# Introduction 

The Real-Time Flame Detection and Public Fire Prevention System is intended to be a system that detects the occurrences of fire at any location and alerts the public safety authorities in communities to react to the received alarm immediately to prevent damage to property and injury to people. Such reaction of security authorities in the community includes confirming the alert and notifying residents in the affected area and other authorities or ignoring the alert, not taking immediate actions. Integrating this system into any community’s security system allows authorities and security guards to be alerted of 0the fire incident without having to monitor all the security cameras and screens all the time. This system also dynamically analyzes the videos or pictures files using YoloV5 deep-learning algorithm. The intended audience of this system can be community residents, community security guards, congested public area, and so on. 


# Purpose

Why do we create this system?
Fire safety is a fundamental and mandatory factor for every facility, residential area, and enterprise. In a congested environment with lots of people, electronic devices, and other fire hazard objects, the spread of any fire incident can be very rapid and catastrophic because it takes the community security or local safety department to receive the incident's alert to the scene. If they don't contain the fire as quickly as possible, the fire can injure many people and the properties as well. 

Why do we allow the security to manually confirm or ignore the fire alarm?
This system's primary purpose is to detect severe fire accidents that can threaten the lives of the residents and damage the properties. Because of the detection algorithm's sensitivity, the system can also recognize any small flame that can't lead to a public fire accident, such as smoke from someone smoking a cigarette, cooking, etc. Therefore, to avoid wasting public resources or bring unnecessary public panic, we implemented the feature where the system will send a notification to the community securities to confirm the fire manually. They can either choose to confirm or ignore the alarm by checking the actual situation after receiving the notification. 

Why do we build a database to store resident information?
Our system is implemented in congested areas, including the working environment, public spaces, and residential areas. We want our system to spot the fire incidents and know the location of the population affected by the fire. In the traditional fire detection system, they can only alert residents, but they ignore that residents need help from security to rescue them when a fire accident happens. Therefore, a resident network allows the security guards to notify and evacuate the residents quickly. Creating a database that stores resident information for security reference in case of an accident is highly crucial. 


# Algorithm
Yolo V5
Our system's main part is the model training, which is based on the AI object detector model "YoloV5". On June 25th, the first official version of YOLOv5 was released by Ultralytics. 
Yolo network consists of three main parts: Backbone(CNN), Neck, and Head. 

YoloV5 is an extension of YoloV3 object detector model, which contains four specific ".pt" files, and each represents one weighting model. We choose the largest weighting model, "yolov5x" for better performance. 
More information about YoloV5: 

https://blog.roboflow.com/yolov5-improvements-and-evaluation/

# Approach to Get The Dataset
We have met multiple severe problems during the process of finding the dataset, and we have conquered most of them. 

“The size of images”

In the beginning, we tried to search and download the flame images manually on the internet, and we created a 2000+ images dataset. However, since each image's size in the dataset is different, and the fire position in each image is different, we cannot reshape all the images into one standard, which will cause images to miss the critical content. To solve this problem, we decided to find a dataset with images that have the same size.

“Biased dataset & Labeling images”

After a long time searching, we found one dataset on Kaggle, which contains 3000 unlabeled images of flame. At first, we wrote a python program to label all flames in the images, but it didn’t perform very well, so we decided to label each image manually. We used YoloV5 to train our model based on this dataset. However, when we tested our trained model, the output showed the model is biased. Instead of labeling the flame, the model will intentionally label the area with high brightness. Two situations may cause this issue: our dataset is basically made of images with dark backgrounds and high brightness flame. It will also happen when the dataset only presents one specific feature of flame, which is high brightness in this case. 

# “Overfitting”

To solve the overfitting problem stated in the last section, we decided to add more images to make our dataset more diverse. We randomly deleted 1200 images and added 1000 images that contain smoke, which is another feature of flame.  We also found 200 labeled flame images with a bright background and reshaped them to the proper size. After training the model with a modified dataset, the model can identify flames inside the high brightness area.

# The Dataset

Our final dataset contains 1800 pieces of the general flame image with no/little smoke, 1000 pieces of the smoke image with some/little flame, 200 pieces of the unique flame image with high brightness background.

Defining a Problem from the Dataset

The main problem of the dataset is still the background. The images of most of the flame dataset have a dark background to better present the flame. However, to train a better model, we need more images with bright backgrounds. This is because those special images will make our model perform better when the flame is under the light.

# Database System

We choose to put our customers' information into a real-time update Mysql database and present all the information in a visual report for the database part. The MySQL databse is connect to the "sign-in" page by using PHP and HTML to make connection bettween database and the front-end.  As in our application, we do not need a vast database platform to focus on too much database information. For example, like a shopping list application, it might need to store too much data information. But for our case, we only need to show customers' email, phone number, name, gender, building location, etc. Moreover, we also use HTML to implement the account-information-display-function for the administrator account, so that administrator can deal with the account more easily.
