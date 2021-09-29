# Dictionnaire de données

## Tâches (`tasks`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT| Identifiant de notre tâche|
|name|VARCHAR(64)|NOT NULL|Nom de la tâche|
|completion|INT|NOT NULL, DEFAULT 0|Niveau d'achèvement de la tâche|
|status|TINYINT(1)|NOT NULL, DEFAULT 0|Statut de la tâche (0=non archivée, 2=archivée)|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la tâche|
|updated_at|TIMESTAMP|NULL|Date de la dernière mise à jour de la tâche|
|category|entity|NOT NULL|Catégorie de la tâche|

## Catégories (`categories`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT| Identifiant de la catégorie|
|name|VARCHAR(64)|NOT NULL|Nom de la catégorie|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la catégorie|
|updated_at|TIMESTAMP|NULL|Date de la dernière mise à jour de la catégorie|
