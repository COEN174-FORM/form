Group 4 - Marton Demeter, Jonathan Ho, Sanika Lakka
Tuition and Fees Payment Authorization Form for Graduate Students

Files in the drive:
confirmation.php		Page after advisor/signer approves form. 
deletion.php			Page after advisor deletes form.
final.php			Page after the final approver approves the form.
get_student_info.php		Page displayed for each advisor/signer.
install				Install script (don't forget to change information)
java.js				Holds the javascript code used in the websites 
process_form.php		Stores the data written by the TA into database and send email to advisor
readme.txt			This file
rejection.php			Page displayed to the advisor after they reject the form
scu.jpg				Banner at the top of each page
source.php			Page the TA/RA fills in. 
style.css			Holds CSS code used in the websites

Steps to set up the system:

Step 1)

	All the files must be put into php-cgi folder (must run with the correct permissions)

Step 2)

	Put correct database credentials in secrets.txt (first line username, second line password)

Step 3)

	secrets.txt needs 400 (read only by user) permission

OR

Alternatively, in the install script, fill in the correct database creditials and the correct install directory. Running the script will fetch our current version from GitHub.  
