# rsa_database
A demonstrative RSA encrypted web database system. In this project you can see the process of creating RSA key pairs, 
encrypt user data with the public key, store them into database and read, edit and delete them from the database with the private 
key in principle.

## Disclaimer
The algorithms and processes are only created for demonstrative purposes. The length of the keys, the algorithms and the
access management are not meeting the demand of commercial or security relevant purposes.

## Repository structure
+ the top directory contains all files, that concern the repository itself (like README, .gitignore, etc.)
+ the directory database/ contains all files for building the MySQL database for the application
+ the directory application/ contains all files for the application itself
+ the directory license/ contains the text of the GPL3 License

## Deployment
+ create a MySQL database from the database/database.sql dump file
+ edit the application/config/database.conf file for your mysql server
+ deploy the content of application/ on a PHP Webserver
+ (optional) restrict the public webserver access of the application/config/ directory, to keep your server credentials safe<br>
The latest source is provided on <a href="https://github.com/DevWurm/rsa_database">GitHub</a>

## License
Copyright 2015 by DevWurm, Enceladus-2, kkegel, mjoest, tarek96, Tolator and vgerber.
'rsa_database' is offered under GPL 3 License (Read license/gpl-3.0.txt)

## Documentation and additional information
A more detailed documentation and additional information will be offered in the future.

## Authors

#### Database and database connection
+ <a href="https://github.com/mjoest/">mjoest</a> (email: <a href"mailto:michael_joest@web.de">michael_joest@web.de</a>)
+ <a href="https://github.com/Tolator/">Tolator</a> (email: <a href"mailto:fresh.r12@googlemail.com">fresh.r12@googlemail.com</a>)

#### Hash generation
+ <a href="https://github.com/kkegel/">kkegel</a> (email: <a href"mailto:karlkegel9817@gmail.com">karlkegel9817@gmail.com</a>)

#### Frontend development
+ <a href="https://github.com/tarek96/">tarek96</a> (email: <a href"mailto:Darius.Knauer@web.de">Darius.Knauer@web.de</a>)
+ <a href="https://github.com/vgerber/">vgerber</a> (email: <a href"mailto:VG-Development@web.de">VG-Development@web.de</a>)

#### Key generation, encryption/decryption algorithms
+ <a href="https://github.com/DevWurm/">DevWurm</a> (email: <a href"mailto:devwurm@gmx.net">devwurm@gmx.net</a>)
+ <a href="https://github.com/Enceladus-2">Enceladus-2</a> (email: <a href"mailto:enceladus.2.89@gmail.com">enceladus.2.89@gmail.com</a>)

## Bugs & Feature Requests
+ use the GitHub Issue Tracker for submitting bugs and feature requests
+ or try to figure out in which field your advice is concerning and write a mail to one of the authors in this field
+ or write a mail to <a href"mailto:devwurm@gmx.net">devwurm@gmx.net</a> if you have no idea who is responsible for your request

## Collaborating
+ submit bugs and feature requests
+ fork the project
+ create pull requests to merge your changes into our project
+ write a mail with your changes or ideas to one of the authors in the regarding field or to <a href"mailto:devwurm@gmx.net">devwurm@gmx.net</a>

## Contact
Feel free to contact us if there is anything left in your mind :)<br>
If you want to contact developers of a specific field, search for the concerning addresses in the Authors section, otherwise
just write to <a href"mailto:devwurm@gmx.net">devwurm@gmx.net</a>.
