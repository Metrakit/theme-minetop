/**
	ATTENTION: l'utilisation de ce script nécessite au préalable la création d'un Topserver
**/

-- Supprime les doublons de l'ancienne DB
-- ALTER IGNORE TABLE minetop.account ADD UNIQUE KEY idx1(email); 

-- Début de la transaction
START TRANSACTION;

-- Variables
SET @top_server_id = 1;
SET @week_number = 22;
SET @current_year = 2015;
SET @last_year = 2014;

-- Ajoute les comptes dans la table 'auths'
INSERT INTO `minetop_v2`.`auths`(`email`, `password`, `created_at`, `updated_at`) 
SELECT `email`, CONCAT('md5', '_', `password`), 
FROM_UNIXTIME(`datereg`, '%Y-%m-%d %H:%i:%s'), FROM_UNIXTIME(`lastlog`, '%Y-%m-%d %H:%i:%s')
FROM `minetop_v1`.`account`
WHERE `name` NOT IN ('Jill', 'Metra');

-- Ajoute les infos supplémentaires des comptes dans la table 'users'
INSERT INTO `minetop_v2`.`users`(`auth_id`, `pseudo`, `last_ip`, `last_login`) 
SELECT NEW_T.`id`, OLD_T.`name`, OLD_T.`lastip`, NEW_T.`updated_at`
FROM `minetop_v1`.`account` AS OLD_T
JOIN `minetop_v2`.`auths` AS NEW_T ON OLD_T.`email` = NEW_T.`email`
WHERE OLD_T.`name` NOT IN ('Jill', 'Metra');

-- Ajout des credientials des réseaux sociaus liés aux comptes
INSERT INTO `minetop_v2`.`oauth_identities`(`user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) 
SELECT NEW_T.`id`, OLD_T.`facebookID`, 'facebook', NEW_T.`created_at`, NEW_T.`updated_at`
FROM `minetop_v1`.`account` AS OLD_T
JOIN `minetop_v2`.`auths` AS NEW_T ON OLD_T.`email` = NEW_T.`email`
WHERE OLD_T.`facebookID` != '';

-- Création d'une table temporaire pour les serveurs
CREATE TEMPORARY TABLE IF NOT EXISTS `minetop_v1`.`full_servers` (id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY) AS 
(
	SELECT
		@top_server_id AS top_server_id,
    	T.name,
    	-- ugly slug (a modifier en php)
    	SUBSTRING(MD5(RAND()) FROM 1 FOR 6) AS slug,
    	T.url AS website,
    	T.description AS short_description,
    	T.long_desc AS description,
    	T.ip,
    	T.port,
    	T.slots,
    	T.access,
    	T.banner,
        T.type,
    	A.id AS owner_id,
    	1 AS is_enable,
    	T.keygen AS token,
    	T.teamspeak AS teamspeak_ip,
    	T.port_ts AS teamspeak_port,
    	T.mumble AS mumble_ip,
    	T.port_mumble AS mumble_port,
    	T.ChainYT AS youtube_chan,
    	T.twitter AS twitter,
    	T.facebook AS facebook,
    	T.clics AS total_clics,
    	S.total AS total_votes,
    	A.created_at,
    	A.updated_at,
    	S.lundi AS monday_votes,
    	S.mardi AS tuesday_votes,
    	S.mercredi AS wednesday_votes,
    	S.jeudi AS thursday_votes,
    	S.vendredi AS friday_votes,
    	S.samedi AS saturday_votes,
    	S.dimanche AS sunday_votes,
    	S.janvier AS january_votes,
    	S.fevrier AS february_votes,
    	S.mars AS march_votes,
    	S.avril AS april_votes,
    	S.mai AS may_votes,
    	S.juin AS june_votes,
    	S.juillet AS july_votes,
    	S.aout AS august_votes,
    	S.septembre AS september_votes,
    	S.octobre AS october_votes,
    	S.novembre AS november_votes,
    	S.decembre AS december_votes
    FROM `minetop_v1`.`topsite` AS T
	LEFT JOIN `minetop_v1`.`stats` AS S ON T.`keygen` = S.`serial`
    JOIN `minetop_v1`.`account` AS OLD_A ON OLD_A.`id` = T.`owner`
    JOIN `minetop_v2`.`auths` AS A ON OLD_A.`email` = A.`email`
);

-- Rempli la nouvelle table des serveurs
INSERT INTO `minetop_v2`.`servers`(`top_server_id`, `name`, `slug`, `website`, `short_description`, `description`, `ip`, `port`, `slots`, `access`, `owner_id`, `is_enable`, `token`, `teamspeak_ip`, `teamspeak_port`, `mumble_ip`, `mumble_port`, `total_clics`, `total_votes`, `created_at`, `updated_at`) 
SELECT `top_server_id`, `name`, `slug`, `website`, `short_description`, `description`, `ip`, `port`, `slots`, `access`, `owner_id`, `is_enable`, `token`, `teamspeak_ip`, `teamspeak_port`, `mumble_ip`, `mumble_port`, `total_clics`, `total_votes`, `created_at`, `updated_at`
FROM `minetop_v1`.`full_servers`;

-- Insert les stats mensuels de l'année en cours
INSERT INTO `minetop_v2`.`monthly_stats`(`server_id`, `year`, `january_votes`, `february_votes`, `march_votes`, `april_votes`, `may_votes`, `june_votes`) 
SELECT S.`id`, @current_year, F.`january_votes`, F.`february_votes`, F.`march_votes`, F.`april_votes`, F.`may_votes`, F.`june_votes`
FROM `minetop_v1`.`full_servers` AS F
JOIN `minetop_v2`.`servers` AS S ON S.`owner_id` = F.`owner_id`;

-- Insert les stats mensuels de l'année derniere
INSERT INTO `minetop_v2`.`monthly_stats`(`server_id`, `year`, `july_votes`, `august_votes`, `september_votes`, `october_votes`, `november_votes`, `december_votes`) 
SELECT S.`id`, @last_year, F.`july_votes`, F.`august_votes`, F.`september_votes`, F.`october_votes`, F.`november_votes`, F.`december_votes`
FROM `minetop_v1`.`full_servers` AS F
JOIN `minetop_v2`.`servers` AS S ON S.`owner_id` = F.`owner_id`;

-- Insert les stats hebdomadaires
INSERT INTO `minetop_v2`.`weekly_stats`(`server_id`, `year`, `number`, `monday_votes`, `tuesday_votes`, `wednesday_votes`, `thursday_votes`, `friday_votes`, `saturday_votes`, `sunday_votes`) 
SELECT S.`id`, @current_year, @week_number, F.`monday_votes`, F.`tuesday_votes`, F.`wednesday_votes`, F.`thursday_votes`, F.`friday_votes`, F.`saturday_votes`, F.`sunday_votes`
FROM `minetop_v1`.`full_servers` AS F
JOIN `minetop_v2`.`servers` AS S ON S.`owner_id` = F.`owner_id`;

-- Insert les types
INSERT INTO `minetop_v2`.`gametype_server` (`server_id`, `gametype_id`) 
SELECT S.`id`, F.`type`
FROM `minetop_v1`.`full_servers` AS F
JOIN `minetop_v2`.`servers` AS S ON S.`owner_id` = F.`owner_id`;

-- Insert les bannières
INSERT INTO `minetop_v2`.`server_banners`(`server_id`, `url`, `enable`) 
SELECT S.`id`, F.`banner`, 1
FROM `minetop_v1`.`full_servers` AS F
JOIN `minetop_v2`.`servers` AS S ON S.`owner_id` = F.`owner_id`
WHERE F.`banner` NOT LIKE '%minetop.net%'
AND F.`banner` LIKE '%.png%'
OR F.`banner` LIKE '%.jpg%'
OR F.`banner` LIKE '%.jpeg%'
OR F.`banner` LIKE '%.gif%';

COMMIT;
