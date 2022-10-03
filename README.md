# FLASK WEB stitekweb
- folder WebAPP put into ~/home/{USER}/
- start app run WebAPP.py
- FLASK IP 192.168.0.120:5000
- tiskarna.ppd is for CUPS settitn ZEBRA printer

# CHANGE LOG
<03.05.2022 
- vsechno :D

03.05.2022 
- úprava manuálního zadávání štítku - min/max délka vstupu, povolení zadávat jen čisla ...
- úprava 2index - min/max délka vstupu qr
- úprava wevapp.py - pokud je qr chybný obsahuje mezeru, tak se presmeruje na error_qr.html
- úprava zakladu pro vytvorení stitku, st.jpg - odstravení šedivé a zostreni vzhledu

04.05.2022 	
- úprava 2index - vylepšený vzhled (hamburger menu)
- oprava data.xlsx 1fk7 N/M opraveo na A/E
- úprava stitek.html - lepší tabulka, stejná jako na 2index
- přidání barev na záložku /UKA - odmeřování, Z a datum výroby
	
15.09.2022 	
- přepsání celé appky 
- zápis paměti do jediného csv
- zrušení PHP, vše funguje ve flasku
- odstranení zbytečných funkcí (diag,obr,...)

03.10.2022 	
- štítek manuálně - upraveno, aby šlo zadávat cokoliv (třeba - ) a nejenom správný formát (M100 0000 00 000)   
- tvorba štítku - zapisuje se i Z, pokud je / tak nic, ale pukud je cokoliv jiného, tak to napíše (Z:blablabla)
