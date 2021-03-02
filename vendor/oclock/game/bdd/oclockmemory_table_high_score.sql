
-- --------------------------------------------------------

--
-- Table structure for table `high_score`
--

CREATE TABLE `high_score` (
  `id` int(11) NOT NULL COMMENT 'Identifier',
  `PlayerName` varchar(75) NOT NULL COMMENT 'Nom du joueur',
  `Difficulty` int(2) NOT NULL COMMENT 'Nombre de cartes (2 fois le nombre de paires)',
  `ElapsedTime` int(11) NOT NULL COMMENT 'en millisecondes',
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for table `high_score`
--
ALTER TABLE `high_score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `high_score`
--
ALTER TABLE `high_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifier';
