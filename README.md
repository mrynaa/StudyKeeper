#StudyKeeper README

link github: https://github.com/mrynaa/StudyKeeper

[1. Introduzione]

- Lato client: HTML, Bootstrap, CSS, Javascript, JQuery, Ajax;
- Lato server: PHP e un database relazionale (database.txt per visualizzare la struttura delle tabelle).

L’applicazione web ha un design responsive, impedisce ad utenti che non hanno effettuato l’accesso di visualizzare le pagine interne del sito e mantiene la sessione attiva nel browser attraverso l’utilizzo dei cookie. Le grafiche sono state realizzate e personalizzate attraverso il sito Canva.

[2.Descrizione dei file]

2.1 Index

index.html: pagina costituita da un logo (logo.png nella cartella assets), una descrizione generale dell'applicazione web e due bottoni che rimandano rispettivamente all'accesso e alla registrazione.

2.2 Login

login.php + login-registrazione.css: form che permette l'accesso agli utenti che già possiedono un account. 

check.php: sui campi della form vengono fatti dei controlli attraverso l'action check.php con metodo post per validare l'accesso attraverso una connessione al database. Se l'accesso va a buon fine, viene salvata la sessione e vengono settati i cookie; altrimenti l'utente viene rimandato alla pagina di login e vengono segnalati su schermo in rosso gli errori.

2.3 Registrazione

registrazione.php + login-registrazione.css: form che permette la registrazione agli utenti che non possiedono un account. 

reg.php + psw.js: sui campi della form vengono fatti dei controlli attraverso l'action reg.php con metodo post per validare la registrazione attraverso una connessione al database e un controllo sulla corrispondenza delle password attraverso la funzione richiamata nel file psw.js (nella cartella js). Lo script nel file psw.js va a selezionare l’oggetto del DOM corrispondente alla form di registrazione e gli viene affiancata una “listener”, la quale consiste nel bloccare l’invio della form e di controllare se le password inserite siano uguali. Se ciò è verificato, permette l’invio della form, altrimenti va ad agire sul DOM facendo apparire gli appositi messaggi di errore.
Se la registrazione va a buon fine, c'è un messaggio di alert di conferma, un comando di INSERT nel database per le informazioni dell’utente, viene salvata la sessione e vengono settati i cookie; altrimenti l'utente viene rimandato alla pagina di registrazione e vengono segnalati in rosso su schermo gli errori.


2.4 Disconnessione

logout.php: per disconnettersi dall'applicazione è sufficiente, una volta effettuato l'accesso, premere il bottone di logout presente nella navbar. La sessione viene distrutta e i cookie vengono cancellati.

2.5 HomePage

main.php + main.css: pagina costituita da una grafica (home.png nella cartella assets), un testo di benvenuto per l'utente e due bottoni che rimandano rispettivamente alla pagina delle statistiche e al timer.

2.6 Timer (cartella studyarea)

timer.php + timer-statistic.css: pagina costituita da un timer in formato ore/minuti/secondi, una grafica interattiva (timer.png/timer2.png nella cartella assets) e un bottone di inizio con evento onclick che richiama la funzione start() nel file timer.js (nella cartella js).

timer.js:  funzioni in javascript per l'inizio, la pausa, la ripresa e la terminazione della sessione di studio. Le funzioni sono:

o  startTimer(): funzione che fa partire il timer e che viene richiamata ogni secondo. Agisce su tre variabili (ore, minuti, secondi) che vengono incrementate secondo il normale funzionamento di un orologio. Poi, tramite jquery, va ad aggiornare gli elementi del DOM di timer.php che mostrano il timer, con i rispettivi valori delle variabili;

o   stopTimer(): blocca startTimer() e incrementa di 1 una variabile che tiene il conto delle pause, oltre ad agire con delle jquery sugli elementi del DOM corrispondenti ai bottoni e all’immagine sopra al timer;

o   resumeTimer(): fa ripartire startTimer() e agisce sugli elementi del DOM con delle jquery;

o   terminateTimer(): viene richiamata quando si vuole porre fine alla sessione. I valori delle variabili di tempo vengono concatenati in una stringa e, tramite metodo ajax, si viene rimandati al file summary.php, con i il tempo e le pause della sessione inviati tramite metodo post.
 
summary.php: riepilogo della sessione e una form da compilare riguardante la votazione della sessione (obbligatoria) e un eventuale commento (opzionale). 


2.7 Statistiche (cartella progressarea)

statistic.php + timer-statistic.css: pagina costituita da una tabella in cui ritroviamo le statistiche medie dell'utente.  In questa prima parte viene selezionata dal database il tempo medio delle sessioni raggruppate per giorni e il tempo medio di una singola sessione. Viene selezionata in più la media delle pause a sessione, effettuando un piccolo controllo che consiste nel arrotondare per difetto (se la parte decimale della media è <= 0.50) o per eccesso (se è > 0.50). Nella seconda parte vengono selezionate le sessioni raggruppate per giorni e, per ogni giorno in cui c’è stata almeno una sessione di studio, viene generata una vignetta che mostra il tempo totale delle sessioni di quel giorno e la media delle valutazioni. Ad ogni vignetta viene affiancato un bottone che richiama la funzione javascript  showDetails(), la quale rimanda al file details.php tramite metodo ajax, a cui viene inviata la data del corrispettivo giorno tramite metodo post.

details.php: cliccando sul bottone 'vedi dettagli', si viene rimandati al file details.php attraverso un evento onclick. In questa pagina è possibile visualizzare le singole sessioni di quel giorno (con relative informazioni sulla durata, la votazione e l'eventuale commento).

2.8 Profilo Personale

profilo.php + profilo.css: pagina in cui troviamo le informazioni personali dell’utente stampate su schermo attraverso php. Qui l’utente può cliccare su due bottoni: uno per la modifica del profilo (evento onclick modIn() ) e uno per l’eliminazione (evento onclick goToCanc() ).

modify.php: action con metodo post richiamata in profilo.php che gestisce la cancellazione del profilo attraverso un comando di DELETE nel database e il salvataggio delle informazioni attraverso un comando di UPDATE nel database. Le modifiche sono indipendenti una dall’altra.

mod.js: contiene le funzioni modIn(), la quale gestisce la modifica attraverso la libreria jquery con metodo html rimandando al file cgpsw.php, e goToCanc(), la quale gestisce la cancellazione attraverso la libreria jquery con metodo ajax rimandando al file delconfirm.php.

delconfirm.php: conferma della cancellazione attraverso i bottoni Sì/No.

cgpsw.php + psw.js: form per la modifica della password con controllo sulla vecchia password e sulla corrispondenza tra le nuove attraverso la funzione nel file psw.js.

pswsave.php: action richiamata nel file cgpsw.php con metodo post per fare l’UPDATE della password nel database.



