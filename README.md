Crawler
==

Usage
--

1. copy config.php.sample to config.php
2. modify database connection in your config.php
3. create tables in database (use create-tables.sql)
4. insert the first url (url dans crawltag)
5. launch via crawl.php
6. open stats.php to watch progress

Added by papapingouin
--
* remove config.php and make a config.php.sample
* change README format
* type to links (abs/rel), schema modification

TODO
--
* Now : Only HTTP (not HTTPS). Need to modify "clean_links" to accept
* "clean_links" must take some configurations options (y/n : add www, close slash)


TIPS
--
	Changes to php.ini
		1. Increase memory limit (1GB) => need to correct the memory leaks if exists
		2. Remove execution time limit
	Changes to mysql.ini
		* Increased max query size (to avoid "mysql went away" error) => need to optimise requests (if error exists)

Additional documentation (source code) in (/source)
