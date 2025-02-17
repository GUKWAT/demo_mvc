-- --------------------------------------------------------------------------------------------
-- Database creation script for Saas Vanilla MVC
-- Author: Adrian Gould
--
-- ATTENTION: Replace demo with YOUR INITIALS before continuing
-- --------------------------------------------------------------------------------------------


-- --------------------------------------------------------------------------------------------
-- Clear up previous versions of the Database and User
-- --------------------------------------------------------------------------------------------
DROP
DATABASE IF EXISTS demo_php_mvc_jokes;
DROP
USER IF EXISTS 'demo_php_mvc_jokes'@'localhost';
DROP
USER IF EXISTS 'demo_php_mvc_jokes'@'127.0.0.1';

-- --------------------------------------------------------------------------------------------
-- Create the demo_mvc_Jokes Database & two users (one each for @localhost, @127.0.0.1)
-- ATTENTION: Replace demo with YOUR INITIALS
-- --------------------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS demo_php_mvc_jokes;

CREATE USER 'demo_php_mvc_jokes'@'localhost'
    IDENTIFIED WITH mysql_native_password
        BY 'Password1234';

CREATE USER 'demo_php_mvc_jokes'@'127.0.0.1'
    IDENTIFIED WITH mysql_native_password
        BY 'Password1234';

-- --------------------------------------------------------------------------------------------
-- Provide full access to the database to the two users
-- --------------------------------------------------------------------------------------------
GRANT USAGE ON *.*
    TO 'demo_php_mvc_jokes'@'localhost';

GRANT ALL PRIVILEGES
    ON `demo_php_mvc_jokes`.*
    TO 'demo_php_mvc_jokes'@'localhost';

GRANT USAGE ON *.*
    TO 'demo_php_mvc_jokes'@'127.0.0.1';

GRANT ALL PRIVILEGES
    ON `demo_php_mvc_jokes`.*
    TO 'demo_php_mvc_jokes'@'127.0.0.1';
