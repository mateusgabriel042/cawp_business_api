create schema main_cawptech_business collate utf8mb4_general_ci;

use main_cawptech_business;

create table main_cawptech_business.tenants
(
    id VARCHAR(40) not null primary key,
    name VARCHAR(80) not null,
    host VARCHAR(150) not null,
    port VARCHAR(5) not null,
    database_name VARCHAR(60) not null,
    username VARCHAR(60) not null,
    password VARCHAR(250) not null,
    created_at timestamp not null,
    updated_at timestamp
);

create table main_cawptech_business.reports (
  id char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  id_user char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  host varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  type_report varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  name_file varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  status varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  date_create date NOT NULL,
  date_expired date NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
);

create table main_cawptech_business.jobs (
  id bigint unsigned NOT NULL AUTO_INCREMENT,
  queue varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  payload longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  attempts tinyint unsigned NOT NULL,
  reserved_at int unsigned DEFAULT NULL,
  available_at int unsigned NOT NULL,
  created_at int unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY jobs_queue_index (queue)
);

drop table main_cawptech_business.reports;
drop table main_cawptech_business.jobs;

select * from tenants;
