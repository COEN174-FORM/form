Files in the drive:
confirmation.php		Page after TA submits form. 
deletion.php			Page after advisor deletes form.
final.php			Page after the final approver approves the form.
get_student_info.php		Page displayed for each advisor/signer.
install				install script
java.js				Holds the javascript code used in the websites 
process_form.php		Stores the data written by the TA into database and send email to advisor
readme.txt			this file
rejection.php			Page displayed to the advisor after they reject the form
scu.jpg				Banner at the top of each page
source.php			Page the TA fills in. 
style.css			Holds CSS code used in the websites

Steps to set up the system:

Step 1)

	All the files must be put into php CGI

Step 2)

	Put correct database credentials in secrets.txt

Step 3)

	secrets.txt needs a 400 permission

OR

Alternatively, in the install script, fill in the correct database creditials and the correct install directory. It will fetch our current version from GitHub.  
