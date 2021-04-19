-- Structure table `divisi` --

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Data table `divisi` --

INSERT INTO `divisi` (`id`, `nama`) VALUES
(1, 'HRD'),
(2, 'Keuangan'),
(3, 'Operasional'),
(4, 'Marketing');


-- Structure table `member` --

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Data table `member` --

INSERT INTO `member` (`id`, `fullname`, `username`, `password`, `role`, `foto`) VALUES
    -> (1, 'Admin', 'admin', '67771da7cef164702710b6803ea0b099bce5b0ce', 'admin', 'admin.jpg'),
    -> (2, 'Reza CW', 'reza', '31736dafad7adea7b65baf26ab9c4e05727b9238', 'manager', 'reza.jpg'),
    -> (3, 'Vionna Nurisma', 'vionna', 'f72e9d7e4fe5deac9913fb34f7d4c6c096586032', 'staff', 'vionna.jpg');


-- Structure table `pegawai` --

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(5) NOT NULL,
  `agama` enum('Islam','Krristen Protestan','Kristen Katholik','Hindu','Budha','Khonghucu') DEFAULT NULL,
  `iddivisi` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Data table `pegawai` --

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `email`, `agama`, `iddivisi`, `foto`) VALUES
    -> (1, '01101', 'Reza Cahyo Wibowo', 'rcw@gm', 'Islam', 1, 'fotoReza'),
    -> (7, '01143', 'Randika', 'dika', 'Hindu', 4, 'fotoRandika'),
    -> (9, '01103', 'Putri', 'ptr@gm', 'Budha', 2, 'fotoPutri'),
    -> (13, '01111', 'firdaus', 'mif@g', 'Islam', 1, 'foto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `iddivisi` (`iddivisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`iddivisi`) REFERENCES `divisi` (`id`);
COMMIT;