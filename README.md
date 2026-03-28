<div align="center">
  <img src="https://cdn.pensieriincodice.it/images/pensieriincodice-locandina.png" alt="Logo Progetto" width="150"/>
  <h1>Pensieri In Codice — Episode to X</h1>
  <p>GitHub Action che pubblica automaticamente i nuovi episodi del podcast su X (Twitter).</p>
  <p>
    <img src="https://img.shields.io/github/stars/valeriogalano/pensieriincodice-episode-to-x?style=for-the-badge" alt="GitHub Stars"/>
    <img src="https://img.shields.io/github/forks/valeriogalano/pensieriincodice-episode-to-x?style=for-the-badge" alt="GitHub Forks"/>
    <img src="https://img.shields.io/github/last-commit/valeriogalano/pensieriincodice-episode-to-x?style=for-the-badge" alt="Last Commit"/>
    <a href="https://pensieriincodice.it/sostieni" target="_blank" rel="noopener noreferrer">
      <img src="https://img.shields.io/badge/sostieni-Pensieri_in_codice-fb6400?style=for-the-badge" alt="Sostieni Pensieri in codice"/>
    </a>
  </p>
</div>

---

## Come funziona

Il workflow controlla il feed RSS del podcast e pubblica i nuovi episodi sull'account X tramite le API ufficiali. Gli episodi già pubblicati vengono tracciati per evitare duplicati. Il workflow può essere attivato anche manualmente dalla scheda Actions.

---

## Requisiti

- Un account X con applicazione OAuth configurata (API v2)
- Uno o più feed RSS di podcast

---

## Installazione e configurazione

### 1. Clona la repository

```bash
git clone https://github.com/YOUR_USERNAME/pensieriincodice-episode-to-x.git
cd pensieriincodice-episode-to-x
```

### 2. Configura i secrets di GitHub Actions

In **Settings → Secrets and variables → Actions**, aggiungi i seguenti **Secrets**:

| Secret | Descrizione |
|---|---|
| `X_API_KEY` | API Key dell'applicazione X |
| `X_API_SECRET` | API Secret dell'applicazione X |
| `X_ACCESS_TOKEN` | Access Token dell'account X |
| `X_ACCESS_TOKEN_SECRET` | Access Token Secret dell'account X |

### 3. Configura le variabili di GitHub Actions

Nella stessa sezione, sotto la scheda **Variables**, aggiungi:

| Variabile | Descrizione |
|---|---|
| `PODCAST1_RSS_URL` | URL del feed RSS del primo podcast |
| `PODCAST1_TEMPLATE` | Template del messaggio per il primo podcast |

### 4. Template del messaggio

I placeholder disponibili sono `{title}` e `{link}`. Tieni presente il limite di 280 caratteri per i post su X. Esempio:

```
🎙️ Nuovo episodio: {title}

Ascoltalo qui: {link}

#Podcast #Tech
```

---

## Contributi

Se noti qualche problema o hai suggerimenti, sentiti libero di aprire una **Issue** e successivamente una **Pull Request**. Ogni contributo è ben accetto!

---

## Importante

Vorremmo mantenere questo repository aperto e gratuito per tutti, ma lo scraping del contenuto di questo repository **NON È CONSENTITO**. Se ritieni che questo lavoro ti sia utile e vuoi utilizzare qualche risorsa, ti preghiamo di citare come fonte il podcast e/o questo repository.

---

<div align="center">
  <p>Realizzato con ❤️ da <strong>Valerio Galano</strong></p>
  <p>
    <a href="https://valeriogalano.it/">Sito Web</a> |
    <a href="https://daredevel.com/">Blog</a> |
    <a href="https://pensieriincodice.it/">Podcast</a>
  </p>
</div>
