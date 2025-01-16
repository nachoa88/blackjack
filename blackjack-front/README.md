# Blackjack Front End

Aquest projecte és el front end per consumir l'API REST de blackjack creada amb Laravel (blackjack-api). El desenvolupament utilitza Docker amb la configuració detallada als fitxers `docker-compose.yml` i `Dockerfile`.

## Tecnologies Utilitzades
- **Vue 3**: Framework JavaScript modern i reactiu per al desenvolupament del front end.
- **Tailwind CSS**: Framework CSS per a dissenys ràpids i personalitzables.
- **Axios**: Llibreria per gestionar les peticions HTTP de manera senzilla i eficient.
- **Pinia**: Eina recomanada per Vue 3 per gestionar l'estat de manera reactiva i organitzada.

---

## Per què Axios?
1. **Gestió de l'autenticació**  
   L'API inclou autenticació, rols i permisos. Axios simplifica la gestió d'aquestes funcionalitats gràcies als interceptors, que permeten afegir headers o gestionar errors de manera centralitzada.
   
2. **Gestió d'errors i excepcions**  
   Amb Axios és fàcil implementar lògiques per capturar i tractar errors en les peticions HTTP.

---

## Per què Pinia?
1. **Gestió de l'estat de l'autenticació**  
   Pinia permet gestionar de manera reactiva l'estat del token d'autenticació i altres dades relacionades amb l'usuari, oferint una experiència d'usuari més coherent i organitzada.

2. **Recomanat per Vue 3**  
   Pinia és l'eina oficialment recomanada per Vue 3 per gestionar estats globals en aplicacions modernes.

---

## Testing Pendent.
El projecte inclourà proves per garantir la qualitat i fiabilitat del front end. Es recomana utilitzar eines com Jest o Cypress per a tests unitàries i d'integració.