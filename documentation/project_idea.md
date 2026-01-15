# 📌 Projet : Dashboard de gestion de campagnes de communication omnicanales

## 🎯 Contexte

Ciss propose des services d'envoi de SMS, email, notifications et courriers postaux via leurs API pour gérer la communication multicanale des clients. Ton projet consistera à créer une plateforme web Laravel qui :

- Permet à une entreprise de configurer des campagnes de messages
- Planifier et suivre l'envoi via plusieurs canaux
- Afficher des statistiques / métriques d'engagement
- Gérer les utilisateurs, les autorisations, et la sécurité

> 👉 C'est très proche des services « Send » / « Gestion de relation client » proposés par Ciss, ce qui montre que tu comprends leur métier.

---

## 🧠 Fonctionnalités clés

### 🔹 Authentification & gestion des rôles

- Login / inscription
- Rôles : admin, contributeur, lecteur
- Permissions (CRUD sur campagnes)

### 🔹 Gestion des campagnes

Chaque campagne contient :

- Titre, description
- Date/heure de publication
- Liste de destinataires
- Canaux sélectionnés (SMS, email, push…)
- Statut (planifié / en cours / terminé / annulé)

**Exemple de structure :**

```json
{
  "title": "Promo de printemps",
  "channels": ["email", "sms"],
  "scheduled_at": "2026-02-15T10:00:00"
}
```

### 🔹 Intégration multi-canaux

Appelle des services externes (fictifs ou réels si tu veux) :

- Email via SMTP ou service web
- SMS via API tierce
- Push notifications à des utilisateurs web/mobile

Chaque appel se fait via une classe Service Laravel abstraite pour permettre facilement d'ajouter de nouveaux canaux.

### 🔹 Historique & métriques

Stocke les logs d'envois :

- Livrés / échoués
- Taux d'ouverture
- Clics (pour simplifier, tu peux simuler ces données)

Affiche un tableau de bord :

- Total messages envoyés
- Succès / échecs
- Graphiques par canal

### 🔹 Sécurité & conformité

- Validation RGPD des listes de contacts
- Gestion des désabonnements automatique
- Consentement utilisateur
- Encryption des données sensibles

> 👉 Très pertinent pour un profil orienté sécurité & données, ce que Ciss met en avant.

---

## 🧠 Architecture du projet

### Backend (Laravel API)

- API RESTful (routes `api.php`)
- Auth via Sanctum (stateless, SPA ou mobile friendly)
- Services & interfaces (SMS, Email, Push)
- Jobs + Queues pour envois asynchrones
- Events : `CampaignSent`, `MessageDelivered`, etc.

### Frontend (option Vue.js)

- SPA avec Vue 3 + Pinia
- Dashboard des campagnes
- Graphiques (Chart.js / ECharts)
- Formulaires de création / édition
- Vue sécurisée avec Auth Sanctum

---

## 📌 Exemple d'endpoint (Laravel)

### Création d'une campagne

```http
POST /api/campaigns
```

```json
{
    "title": "Nouvelles offres",
    "description": "Promo du mois",
    "channels": ["email", "sms"],
    "scheduled_at": "2026-02-25T09:00:00"
}
```

### Envoi (job asynchrone)

```php
dispatch(new SendCampaignJob($campaign));
```

---

## 📊 Page de résumé (tableau de bord)

| Campagne | Statut | Envoyés | Ouverts | Taux d'échec |
|----------|---------|---------|---------|--------------|
| Promo 15/02 | Terminé | 1,200 | 75% | 3% |
| Newsletter | Planifié | – | – | – |

---

## 🧪 Bonus / évolutions possibles

- ✅ Intégration d'un vrai provider email (Mailgun, SendGrid)
- ✅ Intégration SMS avec Twilio ou un service API
- ✅ Webhooks pour remontée des événements d'envoi
- ✅ Multi-tenant pour plusieurs entreprises
- ✅ Support mobile PWA

---

## 🎯 Pourquoi ce projet est pertinent pour Ciss

- ✔ Il met en œuvre API + dashboard (tech stack Laravel + Vue.js)
- ✔ Il touche des sujets proches de leurs offres « Send / multicanal »
- ✔ Il inclut la capacité à gérer la sécurité des données et RGPD, un point clé dans leurs solutions
- ✔ Asynchrone, métriques, status, et logique métier solides

---

## 🏁 En une phrase

> **Une plateforme de gestion de campagnes omnicanales, sécurisée et évolutive, qui centralise l'envoi de messages via email, SMS ou notifications avec tracking des performances.**
