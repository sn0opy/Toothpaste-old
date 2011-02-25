CREATE TABLE `tp_pastes` (
   `pasteID` int(11) not null auto_increment,
   `pasteSource` text,
   `pastePrivate` int(1),
   `pasteKey` varchar(16),
   `pasteIP` varchar(25),
   `pasteType` varchar(20),
   `pasteHits` int(11) default '1',
   `pasteDate` int(15),
   PRIMARY KEY (`pasteID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
