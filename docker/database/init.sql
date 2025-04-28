CREATE ROLE root superuser;
CREATE ROLE root postgres;
CREATE USER root;
CREATE USER postgres;

CREATE DATABASE abp-testing;
GRANT ALL PRIVILEGES ON DATABASE abp_testing; TO postgres;
