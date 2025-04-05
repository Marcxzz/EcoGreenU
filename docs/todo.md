# Requisiti
- [x] permettere cancellazione account utente
- [x] permettere inserimento/modifica/cancellazione contenuti (progetti)
    - [x] aggiunta progetto
    - [x] modifica progetto
    - [x] eliminazione progetto (se donazioni <1000$, verranno rimborsati -> specificare nel report)
- [x] evitare sql injection
- [x] dark mode
- [x] ricerca dinamica progetti
- [ ] 100% responsive
- [ ] report scelte progettuali
- [x] file .sql con create table


# To-do
## Importanti
- verificare duplicazione email nel signup (try-catch)
- donare ai progetti
- ? aggiungere fundraiser alla pagina dettagli progetto
- fixare larghezza form modifica progetto quando il messaggio di errore diventa molto largo

## Meno importanti
- ? chiusura manuale progetto
- ? riorganizzare css
- ? pulire codice
- ? filtrare progetti
- bloccare info utente da scroll nella pagina profilo
- ? aggiungere validation bootstrap ai forms

## Non funzionano
- mettere un dropdown nella navbar per il profilo
- mettere icon links
- fixare colore sfondo input login/signup per l'autofill


# Done
- login funzionante al 100% con redirecting
- cambiare font
- aggiornare navbar
- visualizzare elenco donazioni nei dettagli progetto
- fixare link tabella donazioni
- fare pagina di modifica profilo
- verificare funzionamento modifica profilo
- inserire logo
- cambiare link al navbar brand nelle pagine
- centrare in basso pulsante 'edit' nel profilo
- fare pagina creazione progetto
- centrare contenuto edit-profile.php
- uniformare dimensioni immagini nelle card
- finire pagina dettagli progetto
- aggiungere favicon
- visualizzare anche progetti con 0$
- aggiungere validazione input (min, max, minlength)