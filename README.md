## Online Mobile Recharge Website  

**_Website for making online Prepaid &amp; Postpaid Recharge of Mobile with Any type of Operator you have._**

#### Languages & Frameworks used :  

* For Back – end or server side scripting 
  * PHP 
  * MYSQL Database with SQL
  * API  
* For Front – end or Client side scripting 
  * HTML 
  * CSS
  * Javascript
  * Jquery
  * Bootstrap

#### Software Tools & Online Services/Platforms Used : 

* Paid Hosting Platform - [Hostinger](https://www.hostinger.in/)
* [Xampp](https://www.apachefriends.org/download.html) for windows 10 
* [Email sending API From Sendgrid Website](https://sendgrid.com/) 
* [Paytm Business For Payment Gateway](https://business.paytm.com/) 

#### GIF Tutorial of this website :
![Online Mobile Recharge Website](https://github.com/Nitinkumar3399/My_GIFs/blob/master/OMR-giphy.gif)

### Features and their explanation :

> **SMTP Email verification : Secure Authentication**
*	_I have included **SMTP Email verification of user’s Registered account** on my website.With email verification you will also see a ‘welcome message’ attachment for you.if you **click on account verification link** then your acccount is verified and you will be redirecting to login page.Without verifying account you are not able to login so ensure that your account must have been verified. **Not verified accounts deleted automatically within 5 days.**_

> **Login with OTP : Secure Authentication**
* _I have also given an option to a user of my website to **LOGIN WITH OTP Directly into their user’s account** without entering password. This will really helpful in case of **FORGOT PASSWORD**. And also this feature maintains high security of user account because OTP only sented to the user’s registered email.So I requested to you, not share this OTP with unknown anyone else._ 
  * _You will **receive OTP on your Registered email** with us._ 
  * _You will also see an **“welcome message” attachement in pdf format** added for you._
  * _This attachement feature is also very interesting and useful when you request for some information in pdf format._  

> **Login with Email and Password : Secure Authentication**
* _You can also login using your registered email and password._ 

> **MYSQL Database : Save User's All Data**
* _For this Registeration on my website **I have also saved Live information of my user in my database in actual**._ 
* _I have created **2 tables** in database named as **‘all_users’  and ‘otp_login’._**

> **Registration/Sign-Up is necessary**
* _First of all just by going on to a website you will not be able to use services provided by me on my website, you must have to register first.There is **Register option is also available.**_

> **View Different Plans : FullTT, TOP-UP, 3G/4G, 2G**
* _Now after authentication or login into your account you will be able to recharge your mobile, also there is **PLANS FEATURE** available  so that you can easily select which type of recharge you want to do._
  * Validity in no.of days.
  * Amount of recharge
  * Type of recharge like Top-Up, 4G, 3G

> **Paytm Payment Gateway Integration : Choose Payment Options**
* _After selecting plans you will be redirecting to **payment gateway** option where you can edit your actual TOTAL amount just by clicking on it and proceed for payment._
* Different payment options available :
  * Pay using Paytm via OTP authentication
  * Pay using Credit Card
  * Pay using Debit Card
  * Pay using net banking :
    * Already popular banks listed
    * Search your bank in a list
* Warning Note : _Careful regarding payment , do not enter your actual details on gateway like **debit card , credit  card or netbanking user id** and **password** details. But you can enter your mobile no. of paytm so that you can check OTP received or not, before payment on your mobile number._

> **Paytm Payment Gateway Testing Details :**
* _You can use easily all other **Debit Card** or **Credit Card** features with these **Dummy details** shown below Because these are already set in source code for **Testing Environment**.If you want to use debit card , use **Test Debit Card** details for your successful transaction._

|          Payment Details On Email & Text Messages           |                 Test UPI Details                |
|:-----------------------------------------------------------:|:-----------------------------------------------:|
| <img src="screenshot images/mobile-msg-ss.png" width="320"> |    <img src="screenshot images/UPI-Test.jpg">   |
|                     Test Wallet Details                     |             Test Debit Card Details             |
|        <img src="screenshot images/Test-Wallet.jpg">        | <img src="screenshot images/TestDebitCard.jpg"> |

|    ✅ Success - Payment Details From Paytm Business Dashboard   |
|:------------------------------------------------------------:|
| <img src="screenshot images/Payments Dashboard-Success.jpg" width="700"> |
|    ❌ Failed - Payment Details From Paytm Business Dashboard    |
|  <img src="screenshot images/Payments Dashboard-Failed.jpg" width="700"> |

> **Receive order details on your mobile phone via Email or Text messages**
* _If you use that paytm gateway for successfull payment then I have received ‘payment message’ for exact amount on my mobile phone as well as on email with order ID , customer ID , Transaction date , Amount etc. details._

> **I have used  3 free API’s in this website**
* _Paytm Payment Gateway integration API._
* _SMTP email sending API from SENDGRIDS._ 
* _OTP sending API.(I have used here rand function for sending random OTPs of 6 digit)._

> **Prepaid & Postpaid Recharge**
* _You can recharge for both type **prepaid** as well as **postpaid** and also all **plans** are available._

> **Can run in production as well**
* _All types of payment options are  available  with all banks .My payment gateway also used for PRODUCTION as well, only what we have to do is that changing or setting the **variable PAYTM_ENVIRONMENT from ‘Test’ to ‘PROD’ in config_paytm.php** file present in PaytmKit Folder._

> **Feedback, Support, Contact Us, About Us, T&C and FAQ Page**
* _There is also **feedback page,** **support page,** **Contact page,** **About us page,** **Terms & Conditions page** and **FAQ** available for your communication with us and to provide best services to you._

**NOTE** : _Payment gateway that I have used in my website is real **paytm payment gatway** but right now it is in **TESTING MODE**.if you enter correct details of debit etc.on gateway then amount is deducted from your account but after deducting where it is going I really don’t know because my account is not attached with this kit , so you have to ensure that amount is not coming to my account I have provided a link below for your satisfaction that it is a real gateway._

#### Some screenshots of this website : 

| Intro Slider-1                                    |
|---------------------------------------------------|
| <img src="screenshot images/Screenshot (15).png"> |

| Intro Slider-2                                    |
|---------------------------------------------------|
| <img src="screenshot images/Screenshot (16).png"> |

| Intro Slider-3                                    |
|---------------------------------------------------|
| <img src="screenshot images/Screenshot (17).png"> |

| Home-1                                                         |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (18).png" >             |

| Home-2                                                         |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (19).png">              |

| Home-3                                                         |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (20).png">              |

| Home-4                                                         |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (21).png">              |

| Footer-1                                                       |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (22).png">              |

| Footer-2                                                       |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (23).png">              |

| Login/Sign-in                                                  |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (24).png">              |

| Register/Sign-up                                               |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (25).png">              |

| Account verification details has been sent on your E-mail      |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (26).png">              |

| Account has been verified when you click on the link given in you E-mail|
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (27).png">              |

| After verification click on the login buttton                  |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (30).png">              |

| You have entered wrong password, please enter correct details  |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (31).png">              |

| Successfully logged in, now you will be able to recharge your mobile|
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (32).png">              |
  
| View Plans : FullTT, TOP-UP, 3G/4G, SPL/Rate Cutter, 2G        |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (33).png">              |

| View Plans-2                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (34).png">              |

| View Plans-3                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (35).png">              |

| View Plans-4                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (36).png">              |

| View Plans-5                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (37).png">              |

| View Plans-6                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (38).png">              |

| View Plans-7                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (39).png">              |

| Payment - Standard Checkout                                    |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (40).png">              |

| You can edit the Standard Checkout                             |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (41).png">              |

| Transaction Initiates : generate TxN ID, Cust ID, Order No., Amount, Date & Time|
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (42).png">              |

| Choose Payment Option for test order                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (43).png">              |

| Pay using Paytm via OTP authetication                          |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (44).png">              |

| Pay using Debit Card                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (45).png">              |

| Pay using Credit Card                                          |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (46).png">              |

| Pay using net banking : Popular banks                          |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (47).png">              |

| Pay using net banking : Search your bank                       |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (48).png">              |

| Bank Demo : Failure/Success in my hand while in Testing Mode   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (49).png">              |

| Transaction Successful-1                                       |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (50).png">              |

| Transaction Successful-2                                       |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (51).png">              |

| Processing : Wait, Do not press any button                     |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (52).png">              |

| Support Page                                                   |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (53).png">              |

| Feedback Page                                                  |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (54).png">              |

| Contact Us Page                                                |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (56).png">              |

| About Us Page-1                                                |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (58).png">              |

| About Us Page-2                                                |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (59).png">              |

| About Us Page-3                                                |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (60).png">              |

| FAQ Page-1                                                     |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (62).png">              |

| FAQ Page-2                                                     |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (64).png">              |

| Terms & Conditions-1                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (65).png">              |

| Terms & Conditions-2                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (66).png">              |

| Terms & Conditions-3                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (67).png">              |

| Terms & Conditions-4                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (68).png">              |

| Terms & Conditions-5                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (69).png">              |

| Terms & Conditions-6                                           |
|----------------------------------------------------------------|
| <img src="screenshot images/Screenshot (70).png">              |

> _**OMR Website by Nitin Kumar**_
