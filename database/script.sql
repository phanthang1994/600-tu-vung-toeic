create table admin
(
    id             bigint unsigned auto_increment
        primary key,
    name           varchar(255) not null,
    email          varchar(255) not null,
    password       varchar(255) not null,
    remember_token varchar(100) null,
    created_at     timestamp    null,
    updated_at     timestamp    null,
    constraint admin_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

create table category
(
    ID            int unsigned auto_increment
        primary key,
    CATEGORY_NAME varchar(255) not null,
    IMAGE         varchar(255) not null,
    TRANG_THAI    int          null,
    created_at    timestamp    null,
    updated_at    timestamp    null,
    constraint category_category_name_unique
        unique (CATEGORY_NAME)
)
    collate = utf8mb4_unicode_ci;

create table chu_de
(
    ID                int unsigned auto_increment
        primary key,
    CHU_DE_NAME       varchar(255) not null,
    IMAGE             varchar(255) not null,
    SO_NGUOI_THEO_HOC int          null,
    TONG_SO_TU        int          null,
    CATEGORY_ID       int unsigned null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    STATUS            int          null,
    constraint chu_de_chu_de_name_unique
        unique (CHU_DE_NAME),
    constraint chu_de_category_id_foreign
        foreign key (CATEGORY_ID) references category (ID)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table failed_job
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                          not null,
    connection text                                  not null,
    queue      text                                  not null,
    payload    longtext                              not null,
    exception  longtext                              not null,
    failed_at  timestamp default current_timestamp() not null,
    constraint failed_job_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table password_reset
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_reset_email_index
    on password_reset (email);

create table personal_access_token
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_token_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_token_tokenable_type_tokenable_id_index
    on personal_access_token (tokenable_type, tokenable_id);

create table tu_moi
(
    ID           int unsigned auto_increment
        primary key,
    NAME         varchar(255) charset utf8          null,
    PHIEN_AM     varchar(255) charset utf8          null,
    AUDIO        varchar(255)                       not null,
    TU_LOAI      varchar(20)                        not null,
    VI_DU        text                               not null,
    IMAGE        varchar(255)                       not null,
    CHE_TU       text collate utf8mb4_vietnamese_ci null,
    CAU_TRUC_CAU text                               null,
    CHU_DE_ID    int unsigned                       null,
    THUOC        text                               null,
    DA_HOC       text                               null,
    BO_QUA       text                               null,
    STATUS       tinyint(1) default 0               null,
    created_at   timestamp                          null,
    updated_at   timestamp                          null,
    constraint tu_moi_name_unique
        unique (NAME),
    constraint tu_moi_phien_am_unique
        unique (PHIEN_AM),
    constraint tu_moi_chu_de_id_foreign
        foreign key (CHU_DE_ID) references chu_de (ID)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table user
(
    id                int unsigned auto_increment
        primary key,
    name              varchar(255)                         not null,
    email             varchar(255)                         not null,
    phone             varchar(255)                         null,
    email_verified_at timestamp                            null,
    password          varchar(255) collate utf8_unicode_ci not null,
    status            int                                  null,
    level             int                                  null,
    test_grade        int unsigned                         null,
    user_detail_id    int unsigned                         null,
    remember_token    varchar(100)                         null,
    created_at        timestamp                            null,
    updated_at        timestamp                            null,
    chu_de_id         int unsigned                         null,
    constraint user_email_unique
        unique (email),
    constraint user_phone_unique
        unique (phone),
    constraint user_chu_de_id_foreign
        foreign key (CHU_DE_ID) references chu_de (ID)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table comment
(
    ID         int unsigned auto_increment
        primary key,
    NAME       varchar(255) null,
    EMAIL      varchar(255) not null,
    PHONE      varchar(255) not null,
    NOI_DUNG   varchar(255) null,
    TRANG_THAI varchar(255) null,
    NGAY_DANG  varchar(255) null,
    PHAN_HOI   varchar(255) null,
    ID_USER    int unsigned null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint comment_id_user_foreign
        foreign key (ID_USER) references user (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table man_hinh
(
    ID         int unsigned auto_increment
        primary key,
    NAME       varchar(255) not null,
    COMMENT_ID int unsigned null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint man_hinh_comment_id_foreign
        foreign key (COMMENT_ID) references comment (ID)
)
    collate = utf8mb4_unicode_ci;

create table user_detail
(
    ID         int unsigned auto_increment
        primary key,
    KHO        int unsigned null,
    THUOC      int unsigned null,
    DA_HOC     int unsigned null,
    BO_QUA     int unsigned null,
    created_at timestamp    null,
    updated_at timestamp    null,
    user_id    int unsigned null,
    constraint user_detail_bo_qua_foreign
        foreign key (BO_QUA) references tu_moi (ID),
    constraint user_detail_da_hoc_foreign
        foreign key (DA_HOC) references tu_moi (ID),
    constraint user_detail_kho_foreign
        foreign key (KHO) references tu_moi (ID),
    constraint user_detail_thuoc_foreign
        foreign key (THUOC) references tu_moi (ID),
    constraint user_detail_user_id_foreign
        foreign key (user_id) references user (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

alter table user
    add constraint user_user_detail_id_foreign
        foreign key (USER_DETAIL_ID) references user_detail (ID)
            on delete cascade;

create view information_schema.ALL_PLUGINS as
-- missing source code
;

create view information_schema.APPLICABLE_ROLES as
-- missing source code
;

create view information_schema.CHARACTER_SETS as
-- missing source code
;

create view information_schema.CHECK_CONSTRAINTS as
-- missing source code
;

create view information_schema.CLIENT_STATISTICS as
-- missing source code
;

create view information_schema.COLLATIONS as
-- missing source code
;

create view information_schema.COLLATION_CHARACTER_SET_APPLICABILITY as
-- missing source code
;

create view information_schema.COLUMNS as
-- missing source code
;

create view information_schema.COLUMN_PRIVILEGES as
-- missing source code
;

create view information_schema.ENABLED_ROLES as
-- missing source code
;

create view information_schema.ENGINES as
-- missing source code
;

create view information_schema.EVENTS as
-- missing source code
;

create view information_schema.FILES as
-- missing source code
;

create view information_schema.GEOMETRY_COLUMNS as
-- missing source code
;

create view information_schema.GLOBAL_STATUS as
-- missing source code
;

create view information_schema.GLOBAL_VARIABLES as
-- missing source code
;

create view information_schema.INDEX_STATISTICS as
-- missing source code
;

create view information_schema.INNODB_BUFFER_PAGE as
-- missing source code
;

create view information_schema.INNODB_BUFFER_PAGE_LRU as
-- missing source code
;

create view information_schema.INNODB_BUFFER_POOL_STATS as
-- missing source code
;

create view information_schema.INNODB_CMP as
-- missing source code
;

create view information_schema.INNODB_CMPMEM as
-- missing source code
;

create view information_schema.INNODB_CMPMEM_RESET as
-- missing source code
;

create view information_schema.INNODB_CMP_PER_INDEX as
-- missing source code
;

create view information_schema.INNODB_CMP_PER_INDEX_RESET as
-- missing source code
;

create view information_schema.INNODB_CMP_RESET as
-- missing source code
;

create view information_schema.INNODB_FT_BEING_DELETED as
-- missing source code
;

create view information_schema.INNODB_FT_CONFIG as
-- missing source code
;

create view information_schema.INNODB_FT_DEFAULT_STOPWORD as
-- missing source code
;

create view information_schema.INNODB_FT_DELETED as
-- missing source code
;

create view information_schema.INNODB_FT_INDEX_CACHE as
-- missing source code
;

create view information_schema.INNODB_FT_INDEX_TABLE as
-- missing source code
;

create view information_schema.INNODB_LOCKS as
-- missing source code
;

create view information_schema.INNODB_LOCK_WAITS as
-- missing source code
;

create view information_schema.INNODB_METRICS as
-- missing source code
;

create view information_schema.INNODB_MUTEXES as
-- missing source code
;

create view information_schema.INNODB_SYS_COLUMNS as
-- missing source code
;

create view information_schema.INNODB_SYS_DATAFILES as
-- missing source code
;

create view information_schema.INNODB_SYS_FIELDS as
-- missing source code
;

create view information_schema.INNODB_SYS_FOREIGN as
-- missing source code
;

create view information_schema.INNODB_SYS_FOREIGN_COLS as
-- missing source code
;

create view information_schema.INNODB_SYS_INDEXES as
-- missing source code
;

create view information_schema.INNODB_SYS_SEMAPHORE_WAITS as
-- missing source code
;

create view information_schema.INNODB_SYS_TABLES as
-- missing source code
;

create view information_schema.INNODB_SYS_TABLESPACES as
-- missing source code
;

create view information_schema.INNODB_SYS_TABLESTATS as
-- missing source code
;

create view information_schema.INNODB_SYS_VIRTUAL as
-- missing source code
;

create view information_schema.INNODB_TABLESPACES_ENCRYPTION as
-- missing source code
;

create view information_schema.INNODB_TABLESPACES_SCRUBBING as
-- missing source code
;

create view information_schema.INNODB_TRX as
-- missing source code
;

create view information_schema.KEY_CACHES as
-- missing source code
;

create view information_schema.KEY_COLUMN_USAGE as
-- missing source code
;

create view information_schema.OPTIMIZER_TRACE as
-- missing source code
;

create view information_schema.PARAMETERS as
-- missing source code
;

create view information_schema.PARTITIONS as
-- missing source code
;

create view information_schema.PLUGINS as
-- missing source code
;

create view information_schema.PROCESSLIST as
-- missing source code
;

create view information_schema.PROFILING as
-- missing source code
;

create view information_schema.REFERENTIAL_CONSTRAINTS as
-- missing source code
;

create view information_schema.ROUTINES as
-- missing source code
;

create view information_schema.SCHEMATA as
-- missing source code
;

create view information_schema.SCHEMA_PRIVILEGES as
-- missing source code
;

create view information_schema.SESSION_STATUS as
-- missing source code
;

create view information_schema.SESSION_VARIABLES as
-- missing source code
;

create view information_schema.SPATIAL_REF_SYS as
-- missing source code
;

create view information_schema.STATISTICS as
-- missing source code
;

create view information_schema.SYSTEM_VARIABLES as
-- missing source code
;

create view information_schema.TABLES as
-- missing source code
;

create view information_schema.TABLESPACES as
-- missing source code
;

create view information_schema.TABLE_CONSTRAINTS as
-- missing source code
;

create view information_schema.TABLE_PRIVILEGES as
-- missing source code
;

create view information_schema.TABLE_STATISTICS as
-- missing source code
;

create view information_schema.TRIGGERS as
-- missing source code
;

create view information_schema.USER_PRIVILEGES as
-- missing source code
;

create view information_schema.USER_STATISTICS as
-- missing source code
;

create view information_schema.VIEWS as
-- missing source code
;

create view information_schema.user_variables as
-- missing source code
;


