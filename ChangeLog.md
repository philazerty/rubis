# CHANGELOG RUBIS FOR [DOLIBARR ERP CRM](https://www.dolibarr.org)

## 11.0.1 (mai 2020)
	- Compatibilité avec Dolibarr V11
	- Paramétrage complet depuis le panneau de configuration de Rubis
	- Ajout du calcul et l'affichage de l'acompte sur la commande client (Edison) en plus du devis (Rubis)
	- Ajout du choix de la couleur des lignes des tableaux pour chacun des modèles clients (Rubis, Edison, Homard)
	- Ajout du choix des images de logo pour chacun des modèles clients (Rubis, Edison, Homard, Epinoche)
	- Ajout du modèle de bon d'expédition "Epinoche" avec date d'envoi
	- Ajout du modèle de contrat "Alto"
	- Ajout de la possibilité de désactiver la zone de signature sur le contrat (Alto)
	- Ajout des références d'engagement et de marché public sur les modèles clients (Rubis, Edison, Homard, Alto) compatible avec Demat4Dolibarr de OpenDSI
	- Ajout d'un tampon avertissement pour faire passer un message sur la facture (Homard) Par exemple pour un changement de rib, adresse, une promotion etc.
	- Diverses corrections (fautes de frappe)
	
## 6.1.1 (janvier 2019)
	- FIX : Pied de page du contrat HOMARD

## 6.1.0 (novembre 2017)
	- FIX : Correction sur le choix de logo personnalisé dans HOMARD
	- FIX : Correction sur un problème d'édition de la traite dans HOMARD
	- Ajout d'une zone de signature avec mention manuscrite

## 6.0.0 Beta (octobre 2017)
	- Compatibilité avec la version 6.0 de Dolibarr

## 4.1.0 (mars 2017)
	- Ajout de la LCR (Lettre de change)
	- Ajout des CGA (Conditions Générales d'Achat)
	- Ajout des images dans les commandes fournisseurs

## 4.0.2 (octobre 2016)
	- Compatibilité avec la version 4.0 de Dolibarr
	- Choix de la couleur d'impression de la mention d'acompte
	- Impression des coordonnées de l'entreprise en bas de page
	 
## 3.9.6
	- Ajout d'un panneau de configuration (Merci à Alex !)
	- FIX : Traductions
		
## 3.9.5
	- Compatibilité avec le dossier Custom.
	- Divers correctifs
	- Préparation de la V4
		
## 3.9.4
	- Compatibilité avec la version 3.9.4 de Dolibarr. 
	- Rubis devient un pack de modèles (Rubis (devis), Edison(commande), Homard(facture)
	- Les CGV peuvent être dans la langue du client
	- Les images du logo peuvent être personnalisées
	 
## 3.8.2
	- Compatibilité avec la version 3.8.2 de Dolibarr. 
	- L'activation de RUBIS_SIGNATURE_AREA remplace la zone de signature native de Dolibarr
	- Ajout de la version de Rubis dans les paramètres du PDF (pour la maintenance)
		
## 3.5.x V3 (Compatible avec Dolibarr 3.5.x -> 3.5.6)
	- RUBIS_PAGE_NUMBER n'est plus utilisé depuis la correction du numéro de page natif de Dolibarr
	- Pour mettre un logo spécifique dans RUBIS, il suffit de mettre en place la constante RUBIS_LOGO avec pour valeur le nom du fichier image. L'image doit être présente dans documents/mycompany/logos
	- Pour mentionner le montant d'un acompte sur RUBIS, il suffit de créer un attribut supplémentaire sur les propale de type décimal, code "deposit", libéllé au choix. Le pourcentage est à saisir dans la propale.
	- Les texte avant et après le montant de l'acompte se personalisent dans le fichier de langue.
		
## 3.5.2-2
	- Compatible avec Dolibarr 3.5.2
		Pour activer le numéro de page, mettre en place la constante RUBIS_PAGE_NUMBER avec valeur à 1
		Intégre son propre fichier de traduction propal_rubis.lang afin de mieux supporter les mises à jour de Dolibarr
 
## 3.5.0
	- Compatible avec Dolibarr 3.5.x
		Pour activer le repère de pliage, mettre en place la constante RUBIS_FOLD_MARK avec valeur à 1
		pour activer la zone de signature, mettre en place la constante RUBIS_SIGNATURE_AREA avec valeur à 1
		
## 3.4.1-1
	- Compatible avec Dolibarr 3.4.x
	
## 3.3 Version initiale (aout 2013)
	- Ajout du modèle Rubis avec repère de pliage et cgv.