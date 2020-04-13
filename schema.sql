
DROP DATABASE project_main;
CREATE DATABASE project_main;
Use project_main;
-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `option_admission` varchar(32) NOT NULL,
  `time` text NOT NULL,
  `Confirmed` int(1) NOT NULL DEFAULT 0,
  `Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `Investigations`
--

CREATE TABLE `Investigations` (
  `id` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `BiliTD` tinytext NOT NULL,
  `AST` tinytext NOT NULL,
  `ALT` tinytext NOT NULL,
  `ALP` tinytext NOT NULL,
  `GGT` tinytext NOT NULL,
  `Prot` tinytext NOT NULL,
  `Alb` tinytext NOT NULL,
  `CK` tinytext NOT NULL,
  `HbHct` tinytext NOT NULL,
  `WCC` tinytext NOT NULL,
  `Neutro` tinytext NOT NULL,
  `Platelets` tinytext NOT NULL,
  `CRP` tinytext NOT NULL,
  `ESR` tinytext NOT NULL,
  `PTINR` tinytext NOT NULL,
  `APTR` tinytext NOT NULL,
  `Fibrinogen` tinytext NOT NULL,
  `Cortisol` tinytext NOT NULL,
  `Urea` tinytext NOT NULL,
  `Creatinine` tinytext NOT NULL,
  `Urgent` tinytext DEFAULT NULL,
  `Completed` int(2) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `referral_id` int(11) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `ID` int(11) NOT NULL,
  `nhs_number` double NOT NULL,
  `first_name` text NOT NULL,
  `last_name` tinytext NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` char(1) NOT NULL,
  `home_address` varchar(32) NOT NULL,
  `postcode` varchar(32) NOT NULL,
  `home_phone` varchar(32) NOT NULL,
  `mobile_phone` varchar(32) NOT NULL,
  `gp_address` varchar(120) NOT NULL,
  `gp_phone` varchar(16) NOT NULL,
  `email` text DEFAULT NULL,
  `accessCode` int(4) DEFAULT NULL,
  `referring_doctor_name` varchar(32) NOT NULL,
  `referring_doc_email` text NOT NULL,
  `referring_hospital` varchar(32) NOT NULL,
  `person_registering_surname` varchar(32) NOT NULL,
  `person_registering_forename` varchar(32) NOT NULL,
  `person_registering_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `Referral`
--

CREATE TABLE `Referral` (
  `ID` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `consultant_name` varchar(32) NOT NULL,
  `consultant_specialty` varchar(32) NOT NULL,
  `organisation_hospital_name` varchar(32) DEFAULT NULL,
  `organisation_hospital_no` tinytext DEFAULT NULL,
  `referring_name` varchar(32) DEFAULT NULL,
  `bleep_number` tinytext DEFAULT NULL,
  `is_patient_aware` char(1) DEFAULT NULL,
  `is_interpreter_needed` char(1) DEFAULT NULL,
  `interpreter_language` tinytext DEFAULT NULL,
  `kch_doc_name` tinytext DEFAULT NULL,
  `current_issue` mediumtext DEFAULT NULL,
  `history_of_present_complaint` mediumtext DEFAULT NULL,
  `family_history` mediumtext DEFAULT NULL,
  `current_feeds` mediumtext DEFAULT NULL,
  `medications` mediumtext DEFAULT NULL,
  `other_investigations` mediumtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) DEFAULT '',
  `name` tinytext NOT NULL,
  `surname` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `userLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `name`, `surname`, `email`, `userLevel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@nhs.net', 3),
(2, 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'doctor', 'doctor', 'doctor@nhs.net', 2),
(3, 'registrar', '5940569cd1d60781f856f93235b072ee', 'registrar', 'registrar', 'registrarwqeqwe@nhs.net', 1);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Investigations`
--
ALTER TABLE `Investigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_id` (`referral_id`),
  ADD KEY `patient_id` (`patient_ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nhs_number` (`nhs_number`);

--
-- Indexes for table `Referral`
--
ALTER TABLE `Referral`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Foreign Key(patient)` (`patient_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `Investigations`
--
ALTER TABLE `Investigations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `Referral`
--
ALTER TABLE `Referral`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Investigations`
--
ALTER TABLE `Investigations`
  ADD CONSTRAINT `patient_id` FOREIGN KEY (`patient_ID`) REFERENCES `Patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_id` FOREIGN KEY (`referral_id`) REFERENCES `Referral` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Referral`
--
ALTER TABLE `Referral`
  ADD CONSTRAINT `Foreign Key(patient)` FOREIGN KEY (`patient_ID`) REFERENCES `Patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

