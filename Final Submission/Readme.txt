                                    2nd iteration of scheduling system webware of FACS and confocal facility:
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Contents:
         1. Files included
         2. How to test
         3. 2nd iteration working functionalities
         4. GUI and its details
         5. Present limitations

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Descrition:

1. Files included :
                    htdocs/projects = book, check, checkout, urn, payment, first, sql, checkthebooked   - .php files
                                    = project                                                           - .sql.zip files
                                    = readme.txt                                                        - other files


2. How to test :
                 a. Install XAMPP.
                 b. Copy htdocs folder into XAMPP folder and merge them.
                 c. Open XAMPP control panel and start apache and mysql.
                 d. Click on admin beside start of mysql. Create new database in left panel and name it project and select it.
                 e. Click on import and select the htdocs/final/project.sql file and save. Hence database is ready.
                 f. Open new tab in the browser and enter localhost/project/first.php
                 g. Hence you will be able to testrun the webware. The changes made to database are visible in localhost/phpmyadmin/, in bsbe_db


3. 2nd iteration working functionalities :
                                           For now the working functionalities are 
                                                                                   a. create a new user account.
                                                                                   b. login using existing account.
                                                                                   c. Select a machine
                                                                                   d. Select date, time that you want.
                                                                                   e. Unless logged in you can only access first.php only.
                                                                                   f. Upon closing the browser or ending the transaction, sessions are destroyed, hence secure usage.
                                                                                   g. Payment page is automated.
                                                                                   h. Basic level security points are maintained.
                                                                                   i. Even if transaction fails, the details will be on server with payment status. Secure payment is provided by IITI payment service.
                                                                                   j. IITI users and other users are charged with separate priveleges automatically.
                                                                                   k. Special restrictions for new user accounts during creation.
                                                                                   l. One can check the booking status.
                                                                                   m. 2 bookings can't be done at same time.


4. GUI and its details :
                         We are matching our website's GUI with bsbe.iiti.ac.in GUI.


5. Present limitations :    (We plan to overcome these by the time of submission by implementing it on IITI server)
                         a. Can't test online services due to lack of server.



----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
