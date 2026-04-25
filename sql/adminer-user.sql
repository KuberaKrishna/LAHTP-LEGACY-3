-- Works perfectly on macOS and Windows adminer.
CREATE USER 'kuberakrishna'@'localhost' IDENTIFIED BY 'cd7e49b1d851bee9f908d218b7cd5aec';
GRANT
  SELECT, INSERT, UPDATE, DELETE,
  CREATE, DROP, INDEX, ALTER,
  CREATE TEMPORARY TABLES,
  LOCK TABLES,
  EXECUTE,
  CREATE VIEW, SHOW VIEW,
  EVENT, TRIGGER
ON *.* TO 'kuberakrishna'@'localhost';
FLUSH PRIVILEGES;