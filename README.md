# Installation Guide

1. composer install

2. npm install

3. ' Create MySQL database "MailManager_db"

4. ' Execute dump file "mailtable.sql"

5. npm run dev

6. php artisan serve




# This is an unfinished version of MiniSend, a mimicry of Email Servers.
# It is based on Laravel Framework 8.12 and Vue 2.6, Vue-router 3.4



# Currently unfulfilled tasks are

1. createMail() method in CreateMail.vue is causing vue warning "is not defined on the instance but referenced during render."
   Suspected to be a problem of reactivity and object structure

2. A file upload feature for file attachment to emails is unfulfilled.
   The file "UploadTry.vue" contains a few unsuccessful methods to file uploading.

3. The HTML content of an email should be displayed in "send_email.blade.php" blade template, but no good result.

4. Live testing of email sending still incomplete due to host connection errors like the following.

    "A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond."