
# ClicToPay Monétique Tunisie (SPS-SMT) – PrestaShop 8.x compatible

> Compatible with PrestaShop 8.2+

![logo ClicToPay](logo.png) 

ClicToPay (SMT-SPS) est un module de paiement en ligne destiné aux commerçants en Tunisie. Cette version a été adaptée et testée pour **PrestaShop 8.2** tout en restant compatible avec **PrestaShop 1.7**.

## Caractéristiques et fonctionnalités du module ClicToPay (SMT-SPS) :

> - Simple, performant.
> - Répond aux normes de développements de PrestaShop 8.x
> - Accepte les paiements multidevises \*\*selon votre accord avec la banque
> - Accepte les paiements de différents cartes (locale et internationale) \*\*selon votre accord avec la banque
> - Enregistré sous la licence BSD.
> - Développé par  **ExtrumWeb International**

## Installation

> 1. Télécharger le « . **zip**  » du module depuis GitHub «  **ClicToPay-SMT-master.zip**  »
> 2. Décompressez le fichier «  **.zip**  » «  **ClicToPay-SMT-master.zip** »
> 3. Renommez le dossier «  **ClicToPay-SMT-master** » en «  **clictopay** » ( **Attention tout est en minuscule !** ).
> 4. Compressez le dossier renommé «  **clictopay**  » en fichier «  **.zip**  »
> 5. Uploader le fichier «  **clictopay.zip ** » depuis le back office de Prestashop, menu Modules.
> 6. Installez le module «  **ClicToPay SMT »** depuis le back office de Prestashop, menu Modules.

## Configuration

> 1. Cliquez sur le bouton «  **Configurer**  » du module «  **ClicToPay SMT ** »
> 2. Remplissez le champ «  **Terminal Number ** »
> 3. Activer ou désactiver le mode «  **Sandbox ** ».
> 4. Enregistrer la configuration.

## Liens de Configuration

Rajouter « **http(s)://www.domain.com** » avant les liens (ou votre sous-dossier si applicable, ex. `https://www.domain.com/boutique/`).

> - Contrôle et Notification (server-to-server callbacks)
>  - /index.php?fc=module&amp;module=clictopay&amp;controller=smtcontrol
> - Success
>  - /index.php?fc=module&amp;module=clictopay&amp;controller=success
> - Echec
>  - /index.php?fc=module&amp;module=clictopay&amp;controller=echec

Exemples d’URLs complètes:

- Notification: `https://www.domain.com/index.php?fc=module&module=clictopay&controller=smtcontrol`
- Succès: `https://www.domain.com/index.php?fc=module&module=clictopay&controller=success`
- Échec: `https://www.domain.com/index.php?fc=module&module=clictopay&controller=echec`

## Auteur / Crédits

- Web Developer: **Hatem Dridi**
- Module d’origine: **ExtrumWeb International**

## Licence

Ce module est sous la licence BSD. Développé par  [ExtrumWeb International](https://www.extrumweb.com/) et adapté pour PrestaShop 8.x.

Voir [LICENCE](https://github.com/agencep/ClicToPay-SMT/blob/master/LICENSE.txt)
 
