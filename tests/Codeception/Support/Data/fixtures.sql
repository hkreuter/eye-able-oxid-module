#Add default user
REPLACE INTO `oxuser` (`OXID`, `OXACTIVE`, `OXRIGHTS`, `OXSHOPID`, `OXUSERNAME`, `OXPASSWORD`, `OXPASSSALT`, `OXCREATE`, `OXREGISTER`, `OXTIMESTAMP`, `OXBIRTHDATE`) VALUES
('oxdefaultuser',  1,      'user',1,  'user@oxid-esales.com','$2y$10$ljaDXMPHOyC7ELlnC5ErK.3ET4B0oAN3WVr/Tk.RKlUfiuBcQEVVC','', '2003-01-01 00:00:00', '2003-01-01 00:00:00', '2003-01-01 00:00:00', '1985-01-01'),
('oxdefaultadmin', 1, 'malladmin',1, 'admin@myoxideshop.com','6cb4a34e1b66d3445108cd91b67f98b9','6631386565336161636139613634663766383538633566623662613036636539', '2003-01-01 00:00:00', '2003-01-01 00:00:00', '2003-01-01 00:00:00', '1985-01-01');