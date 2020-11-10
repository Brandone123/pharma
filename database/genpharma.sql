-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 16 sep. 2020 à 16:54
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `genpharma`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(14) NOT NULL,
  `amount` varchar(64) DEFAULT NULL,
  `due` varchar(64) DEFAULT NULL,
  `paid` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `accounts_report`
--

CREATE TABLE `accounts_report` (
  `id` int(14) NOT NULL,
  `transection_type` varchar(128) DEFAULT NULL,
  `transection_name` varchar(128) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `mtype` varchar(128) DEFAULT NULL,
  `cheque` varchar(128) DEFAULT NULL,
  `issuedate` varchar(128) DEFAULT NULL,
  `bankid` varchar(128) DEFAULT NULL,
  `amount` varchar(128) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accounts_report`
--

INSERT INTO `accounts_report` (`id`, `transection_type`, `transection_name`, `description`, `mtype`, `cheque`, `issuedate`, `bankid`, `amount`, `entry_id`, `date`) VALUES
(26, 'Payment', 'dsfsf', 'sdfsdf', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(27, 'Receipt', 'dfgfdgd', 'sdfds', 'Cash', '', '', '1', '1000', 'U392', '1522778400'),
(28, 'Payment', 'fgdfds', 'fgdgfd', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(29, 'Payment', 'fgfdg', 'sdfsd', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(30, 'Payment', 'xfsdf', 'dsfs', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(31, 'Payment', 'fdsfs', 'sfs', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(32, 'Payment', 'fdsfs', 'sfs', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(33, 'Payment', 'fdgdfgd', 'dfssf', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(34, 'Payment', 'fsfs', 'dsfds', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(35, 'Payment', 'ghgf', 'fsd', 'Cash', '', '', '1', NULL, 'U392', '1522778400'),
(36, 'Payment', 'dasda', 'dfdsfs', 'Cash', '', '', '1', NULL, 'U392', '1522778400'),
(37, 'Payment', 'dsadsa', 'asdas', 'Cash', '', '', '1', '1000', 'U392', '1522778400'),
(38, 'Receipt', 'sdfsdfs', 'sdfds', 'Cash', '', '', '1', '1000', 'U392', '1522778400'),
(39, 'Payment', 'fsdfs', 'sdffsd', 'Cash', '', '', '1', '1000', 'U392', '1522778400');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `company_name`, `status`) VALUES
(1, 'ACI', 'ACTIVE'),
(2, 'Aristopharma', 'ACTIVE'),
(3, 'Global', 'ACTIVE'),
(4, 'Beximco', 'ACTIVE');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(14) NOT NULL,
  `c_id` varchar(64) DEFAULT NULL,
  `c_name` varchar(256) DEFAULT NULL,
  `pharmacy_name` varchar(256) DEFAULT NULL,
  `c_email` varchar(256) DEFAULT NULL,
  `c_type` enum('Regular','Wholesale') NOT NULL DEFAULT 'Regular',
  `barcode` varchar(512) DEFAULT NULL,
  `cus_contact` varchar(64) DEFAULT NULL,
  `c_address` varchar(512) DEFAULT NULL,
  `c_note` varchar(512) DEFAULT NULL,
  `c_img` varchar(128) DEFAULT NULL,
  `regular_discount` varchar(64) DEFAULT NULL,
  `target_amount` varchar(64) DEFAULT NULL,
  `target_discount` varchar(64) DEFAULT NULL,
  `entrydate` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `c_id`, `c_name`, `pharmacy_name`, `c_email`, `c_type`, `barcode`, `cus_contact`, `c_address`, `c_note`, `c_img`, `regular_discount`, `target_amount`, `target_discount`, `entrydate`) VALUES
(5, 'C612101', 'Dapsie', '', '', 'Regular', '625601', '656358736', '', '', NULL, NULL, NULL, NULL, '1595800800'),
(6, 'C17806', 'Wise', 'bien être', 'wise@gmail.com', 'Wholesale', '2078437', '68579143', '6476486', '', NULL, NULL, NULL, NULL, '1595800800'),
(7, 'C454924', 'Serge', '', '', 'Regular', '9534656', '665682587', '', '', 'C454924.png', NULL, NULL, NULL, '1595887200'),
(8, 'C195731', 'Merveil', '', '', 'Regular', '799267', '695165899', '', '', NULL, NULL, NULL, NULL, '1596146400'),
(9, 'C303308', 'Achile', '', '', 'Regular', '9255780', '695165899', '', '', NULL, NULL, NULL, NULL, '1596146400');

-- --------------------------------------------------------

--
-- Structure de la table `customer_ledger`
--

CREATE TABLE `customer_ledger` (
  `id` int(14) NOT NULL,
  `customer_id` varchar(64) DEFAULT NULL,
  `total_balance` varchar(64) DEFAULT NULL,
  `total_paid` varchar(64) NOT NULL,
  `total_due` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer_ledger`
--

INSERT INTO `customer_ledger` (`id`, `customer_id`, `total_balance`, `total_paid`, `total_due`) VALUES
(1, 'C13612396', '0', '0', '0'),
(2, 'C602298', '0', '0', '0'),
(3, 'C115963', '0', '0', '0'),
(4, 'C360911', '0', '0', '0'),
(5, 'C612101', '21775', '20825', '950'),
(6, 'C17806', '136075', '135905', '170'),
(7, 'C454924', '135046', '135049', '1023'),
(8, 'C195731', '46400', '41300', '5100'),
(9, 'C303308', '175735', '101435', '74300'),
(10, 'C257624', '0', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fire_service`
--

CREATE TABLE `fire_service` (
  `id` int(11) NOT NULL,
  `name` varchar(223) NOT NULL,
  `email` varchar(223) NOT NULL,
  `contact` varchar(223) NOT NULL,
  `address` varchar(223) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `logout` varchar(64) DEFAULT NULL,
  `counter` varchar(64) DEFAULT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login_history`
--

INSERT INTO `login_history` (`id`, `em_id`, `date`, `login`, `logout`, `counter`, `status`) VALUES
(1, 'U392', '2020/07/11', '1594411507', '1594411529', 'ADMIN', ''),
(2, 'U392', '2020/07/11', '1594411587', '1594412120', 'ADMIN', ''),
(3, 'U254', '2020/07/11', '1594412134', '1594412179', 'ADMIN', ''),
(4, 'U392', '2020/07/11', '1594412190', '1594412219', 'ADMIN', ''),
(5, 'U254', '2020/07/11', '1594412228', '1594412278', 'ADMIN', ''),
(6, 'U254', '2020/07/11', '1594412328', '1594412379', 'ADMIN', ''),
(7, 'U254', '2020/07/11', '1594412399', '1594413149', 'ADMIN', ''),
(8, 'U254', '2020/07/11', '1594413202', '1594413265', 'ADMIN', ''),
(9, 'U392', '2020/07/11', '1594413805', '1594413867', 'ADMIN', ''),
(10, 'U305', '2020/07/11', '1594413876', '1594414012', 'ADMIN', ''),
(11, 'U305', '2020/07/11', '1594414244', '1594414251', 'ADMIN', ''),
(12, 'U188', '2020/07/11', '1594414260', '1594414304', 'SALESMAN', ''),
(13, 'U380', '2020/07/11', '1594414343', '1594414368', 'SALESMAN', ''),
(14, 'U305', '2020/07/11', '1594414375', '0', 'ADMIN', '1'),
(15, 'U305', '2020/07/11', '1594442156', '1594443626', 'ADMIN', ''),
(16, 'U305', '2020/07/11', '1594448481', '1594457072', 'ADMIN', ''),
(17, 'U380', '2020/07/11', '1594457084', '1594458051', 'SALESMAN', ''),
(18, 'U188', '2020/07/11', '1594458060', '1594458070', 'SALESMAN', ''),
(19, 'U305', '2020/07/11', '1594458078', '1594474080', 'ADMIN', ''),
(20, 'U398', '2020/07/11', '1594474090', '1594501682', 'SALESMAN', ''),
(21, 'U305', '2020/07/12', '1594501691', '1594502046', 'ADMIN', ''),
(22, 'U188', '2020/07/12', '1594502054', '1594502171', 'SALESMAN', ''),
(23, 'U398', '2020/07/12', '1594502192', '1594502961', 'SALESMAN', ''),
(24, 'U305', '2020/07/12', '1594502969', '1594503127', 'ADMIN', ''),
(25, 'U398', '2020/07/12', '1594503135', '1594510322', 'SALESMAN', ''),
(26, 'U305', '2020/07/12', '1594510345', '0', 'ADMIN', '1'),
(27, 'U305', '2020/07/12', '1594532715', '1594549718', 'ADMIN', ''),
(28, 'U305', '2020/07/12', '1594556287', '1594567969', 'ADMIN', ''),
(29, 'U305', '2020/07/12', '1594568190', '1594571843', 'ADMIN', ''),
(30, 'U324', '2020/07/12', '1594571860', '1594571903', 'ADMIN', ''),
(31, 'U188', '2020/07/12', '1594571920', '1594572259', 'SALESMAN', ''),
(32, 'U305', '2020/07/12', '1594572269', '0', 'ADMIN', '1'),
(33, 'U305', '2020/07/16', '1594880181', '0', 'ADMIN', '1'),
(34, 'U305', '2020/07/17', '1594954247', '0', 'ADMIN', '1'),
(35, 'U305', '2020/07/18', '1595015179', '0', 'ADMIN', '1'),
(36, 'U305', '2020/07/18', '1595052328', '0', 'ADMIN', '1'),
(37, 'U305', '2020/07/22', '1595439286', '0', 'ADMIN', '1'),
(38, 'U305', '2020/07/27', '1595842601', '0', 'ADMIN', '1'),
(39, 'U305', '2020/07/29', '1595962692', '0', 'ADMIN', '1'),
(40, 'U305', '2020/07/29', '1596036819', '0', 'ADMIN', '1'),
(41, 'U305', '2020/07/31', '1596134745', '0', 'ADMIN', '1'),
(42, 'U305', '2020/07/31', '1596177546', '1596178841', 'ADMIN', ''),
(43, 'U188', '2020/07/31', '1596178853', '1596187105', 'SALESMAN', ''),
(44, 'U305', '2020/07/31', '1596187116', '1596211432', 'ADMIN', ''),
(45, 'U305', '2020/07/31', '1596211486', '0', 'ADMIN', '1'),
(46, 'U305', '2020/08/01', '1596228414', '0', 'ADMIN', '1'),
(47, 'U305', '2020/08/01', '1596250279', '1596256636', 'ADMIN', ''),
(48, 'U324', '2020/08/01', '1596256728', '0', 'ADMIN', '1'),
(49, 'U324', '2020/08/02', '1596342738', '1596414948', 'ADMIN', ''),
(50, 'U324', '2020/08/03', '1596415974', '0', 'ADMIN', '1'),
(51, 'U324', '2020/08/05', '1596645038', '1596647911', 'ADMIN', ''),
(52, 'U324', '2020/08/05', '1596647971', '1596648087', 'ADMIN', ''),
(53, 'U324', '2020/08/05', '1596649256', '1596649347', 'ADMIN', ''),
(54, 'U387', '2020/08/05', '1596649360', '1596654802', 'SALESMAN', ''),
(55, 'U324', '2020/08/05', '1596654814', '1596656099', 'ADMIN', ''),
(56, 'U387', '2020/08/05', '1596656189', '1596657370', 'SALESMAN', ''),
(57, 'U324', '2020/08/05', '1596657382', '1596657532', 'ADMIN', ''),
(58, 'U387', '2020/08/05', '1596657642', '1596657855', 'SALESMAN', ''),
(59, 'U324', '2020/08/05', '1596657868', '0', 'ADMIN', '1'),
(60, 'U324', '2020/08/06', '1596714369', '0', 'ADMIN', '1'),
(61, 'U324', '2020/09/14', '1600082804', '0', 'ADMIN', '1'),
(62, 'U324', '2020/09/16', '1600248863', '1600250981', 'ADMIN', ''),
(63, 'U324', '2020/09/16', '1600251049', '0', 'ADMIN', '1');

-- --------------------------------------------------------

--
-- Structure de la table `medicine`
--

CREATE TABLE `medicine` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(64) DEFAULT NULL,
  `supplier_id` varchar(64) DEFAULT NULL,
  `batch_no` varchar(256) DEFAULT NULL,
  `product_name` varchar(64) DEFAULT NULL,
  `generic_name` varchar(64) DEFAULT NULL,
  `strength` varchar(64) DEFAULT NULL,
  `form` varchar(64) DEFAULT NULL,
  `box_size` varchar(64) DEFAULT NULL,
  `trade_price` varchar(64) DEFAULT NULL,
  `mrp` varchar(64) DEFAULT NULL,
  `box_price` varchar(64) DEFAULT NULL,
  `product_details` varchar(512) DEFAULT NULL,
  `side_effect` varchar(512) DEFAULT NULL,
  `expire_date` varchar(64) DEFAULT NULL,
  `instock` int(128) DEFAULT NULL,
  `w_discount` varchar(128) DEFAULT NULL,
  `product_image` varchar(256) DEFAULT NULL,
  `short_stock` int(128) DEFAULT NULL,
  `favourite` enum('1','0') NOT NULL DEFAULT '0',
  `date` varchar(256) DEFAULT NULL,
  `discount` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `sale_qty` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medicine`
--

INSERT INTO `medicine` (`id`, `product_id`, `supplier_id`, `batch_no`, `product_name`, `generic_name`, `strength`, `form`, `box_size`, `trade_price`, `mrp`, `box_price`, `product_details`, `side_effect`, `expire_date`, `instock`, `w_discount`, `product_image`, `short_stock`, `favourite`, `date`, `discount`, `sale_qty`) VALUES
(3, 'P25682', NULL, '331472066', 'Doliprane', '', '1500', 'Cream', NULL, '300', '300', NULL, NULL, '', '10/07/2021', 109, NULL, 'P256821.png', 987, '0', '1602021600', 'NO', '391'),
(10, 'P29223', NULL, '1327168622', 'HEXAQUINE', '', '500', 'Select Here', '02', '200', '200', '400.00', NULL, 'NON', '10/07/2021', 52, NULL, NULL, 500, '0', NULL, 'YES', NULL),
(15, 'P13578', NULL, '1435368853', 'DERINOX', '', '800', 'Spray', NULL, '300', '325', NULL, NULL, '', '11/07/2023', 73, NULL, NULL, 600, '1', NULL, '', '1127'),
(25, 'P17443', '', '1423358956', 'Text', '', '', 'Capsules', NULL, '300', '359', NULL, NULL, '', '22/07/2020', 70, NULL, NULL, NULL, '0', NULL, 'YES', NULL),
(41, 'P31663', NULL, '1229817418', 'AMI', '', '', 'Suspension', NULL, '100', '100', NULL, NULL, '', '06/08/2020', 11, NULL, 'P31663.png', 500, '1', '0', 'NO', '56'),
(42, 'P25319', '', '1150602517', 'Ibuprofen', '', '50', 'Capsules', NULL, '300', '350', NULL, NULL, '', '31/07/2028', 2520, NULL, 'P25319.png', 6000, '1', '0', 'NO', '3680'),
(44, 'P6695', '', '1393014699', 'Valide', '', '20', 'Capsules', NULL, '100', '110', NULL, NULL, '', '22/07/2027', 27, NULL, NULL, 200, '1', NULL, 'YES', '173');

-- --------------------------------------------------------

--
-- Structure de la table `police`
--

CREATE TABLE `police` (
  `id` int(14) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(14) NOT NULL,
  `p_id` varchar(64) DEFAULT NULL,
  `sid` varchar(64) DEFAULT NULL,
  `invoice_no` varchar(64) DEFAULT NULL,
  `pur_date` varchar(64) DEFAULT NULL,
  `pur_details` varchar(64) DEFAULT NULL,
  `total_discount` varchar(64) DEFAULT NULL,
  `gtotal_amount` varchar(64) DEFAULT NULL,
  `entry_date` varchar(64) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `ph_id` int(14) NOT NULL,
  `pur_id` varchar(128) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `supp_id` varchar(64) DEFAULT NULL,
  `qty` varchar(128) DEFAULT NULL,
  `supplier_price` varchar(128) DEFAULT NULL,
  `discount` varchar(128) DEFAULT NULL,
  `expire_date` varchar(128) DEFAULT NULL,
  `total_amount` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` int(14) NOT NULL,
  `r_id` varchar(64) DEFAULT NULL,
  `pur_id` varchar(64) DEFAULT NULL,
  `sid` varchar(64) DEFAULT NULL,
  `invoice_no` varchar(128) DEFAULT NULL,
  `return_date` varchar(128) DEFAULT NULL,
  `total_deduction` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `id` int(14) NOT NULL,
  `r_id` varchar(128) DEFAULT NULL,
  `pur_id` varchar(128) DEFAULT NULL,
  `supp_id` varchar(64) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `return_qty` varchar(64) DEFAULT NULL,
  `deduction_amount` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

CREATE TABLE `sales` (
  `id` int(14) NOT NULL,
  `sale_id` varchar(64) DEFAULT NULL,
  `cus_id` varchar(64) DEFAULT NULL,
  `total_discount` varchar(64) DEFAULT NULL,
  `total_amount` varchar(64) DEFAULT NULL,
  `paid_amount` varchar(64) DEFAULT NULL,
  `due_amount` varchar(64) DEFAULT NULL,
  `invoice_no` varchar(128) DEFAULT NULL,
  `create_date` varchar(128) DEFAULT NULL,
  `monthyear` varchar(64) DEFAULT NULL,
  `entryid` varchar(64) DEFAULT NULL,
  `counter` varchar(64) DEFAULT NULL,
  `pay_status` enum('Hold','Pay') NOT NULL DEFAULT 'Pay',
  `sales_time` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sales`
--

INSERT INTO `sales` (`id`, `sale_id`, `cus_id`, `total_discount`, `total_amount`, `paid_amount`, `due_amount`, `invoice_no`, `create_date`, `monthyear`, `entryid`, `counter`, `pay_status`, `sales_time`) VALUES
(56, 'S6458004', 'C612101', '0', '735', '735', '35', '20448734', '1596132000', '2020-07', 'U305', 'ADMIN', 'Pay', '1596177701'),
(57, 'S1601313', 'C612101', '0', '27284', '27284', '7284', '7820310', '1596132000', '2020-07', 'U305', 'ADMIN', 'Pay', '1596178291'),
(79, 'S6682474', 'WalkIn', '0', '700', '700', '0', '38117406', '1596218400', '2020-08', 'U324', 'ADMIN', 'Pay', '1596265484'),
(88, 'S8063417', 'WalkIn', NULL, '73150', '73150', '0', '8257327', '1596218400', '2020-08', 'U324', 'ADMIN', 'Pay', '1596269516'),
(153, 'S8079939', 'C612101', NULL, '3450', '3000', '450', '14284869', '1596391200', '2020-08', 'U324', 'ADMIN', 'Pay', '1596406442'),
(162, 'S9863556', 'WalkIn', NULL, '7350', '7350', '0', '12178204', '1596391200', '2020-08', 'U324', 'ADMIN', 'Pay', '1596410307'),
(175, 'S1633938', 'WalkIn', NULL, '975', '975', '0', '37843995', '1596582000', '2020-08', 'U324', 'ADMIN', 'Pay', '1596645241'),
(180, 'S7414885', 'C17806', NULL, '61500', '61500', '0', '9848348', '1596582000', '2020-08', 'U387', 'SALESMAN', 'Pay', '1596656233'),
(181, 'S8017409', 'WalkIn', NULL, '1625', '1625', '0', '12310', '1596582000', '2020-08', 'U387', 'SALESMAN', 'Pay', '1596657778'),
(182, 'S7010396', 'WalkIn', NULL, '3600', '3600', '0', '47753390', '1600210800', '2020-09', 'U324', 'ADMIN', 'Pay', '1600248949'),
(186, 'S3692470', 'WalkIn', NULL, '6900', '6900', '0', '31991192', '1600210800', '2020-09', 'U324', 'ADMIN', 'Pay', '1600263401'),
(187, 'S3459348', 'WalkIn', NULL, '32500', '32500', '0', '15988030', '1600210800', '2020-09', 'U324', 'ADMIN', 'Pay', '1600265534');

-- --------------------------------------------------------

--
-- Structure de la table `sales_details`
--

CREATE TABLE `sales_details` (
  `sd_id` int(14) NOT NULL,
  `sale_id` varchar(128) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `cartoon` varchar(128) DEFAULT NULL,
  `qty` varchar(128) DEFAULT NULL,
  `rate` varchar(128) DEFAULT NULL,
  `supp_rate` varchar(128) NOT NULL,
  `total_price` varchar(128) DEFAULT NULL,
  `discount` varchar(128) DEFAULT NULL,
  `total_discount` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sales_details`
--

INSERT INTO `sales_details` (`sd_id`, `sale_id`, `mid`, `cartoon`, `qty`, `rate`, `supp_rate`, `total_price`, `discount`, `total_discount`) VALUES
(1, 'S9472336', 'P21970', NULL, '1', '', '', '200', '0', NULL),
(2, 'S1713084', 'P21970', NULL, '3', '', '', '600', '0', NULL),
(3, 'S6331400', 'P21970', NULL, '850', '', '', '170000', '0', NULL),
(4, 'S6331400', 'P25682', NULL, '2', '', '', '1050', '0', NULL),
(5, 'S5082394', 'P21970', NULL, '40', '', '', '8000', '0', NULL),
(6, 'S5082394', 'P25682', NULL, '59', '', '', '30975', '0', NULL),
(7, 'S6195366', 'P39995', NULL, '4', '', '', '16400', '0', NULL),
(8, 'S791771', 'P25682', NULL, '6', '', '', '1800', '0', NULL),
(9, 'S791771', 'P13578', NULL, '5', '', '', '500', '0', NULL),
(10, 'S6954103', 'P12183', NULL, '2', '', '', '200', '0', NULL),
(11, 'S904010', 'P13578', NULL, '1', '', '', '100', '0', NULL),
(12, 'S3364527', 'P12183', NULL, '1', '', '', '100', '0', NULL),
(13, 'S758947', 'P12183', NULL, '4', '', '', '400', '0', NULL),
(14, 'S2755993', 'P36837', NULL, '50', '', '', '5250', '0', NULL),
(15, 'S7437516', 'P36837', NULL, '40', '', '', '4200', '0', NULL),
(16, 'S7672158', 'P36837', NULL, '50', '', '', '5250', '0', NULL),
(17, 'S3246917', 'P13578', NULL, '594', '', '', '193050', '0', NULL),
(18, 'S8421133', 'P25682', NULL, '150', '', '', '45000', '0', NULL),
(19, 'S8421133', 'P39995', NULL, '1200', '', '', '4920000', '0', NULL),
(20, 'S3105928', 'P42477', NULL, '13', '', '', '1300', '0', NULL),
(21, 'S5429254', 'P42477', NULL, '15', '', '', '1500', '0', NULL),
(22, 'S5827758', 'P42477', NULL, '15', '', '', '1500', '0', NULL),
(23, 'S7474014', 'P42477', NULL, '15', '', '', '1500', '0', NULL),
(24, 'S1890116', 'P42477', NULL, '15', '', '', '1500', '0', NULL),
(25, 'S4203890', 'P42477', NULL, '5', '', '', '500', '0', NULL),
(26, 'S4388352', 'P39995', NULL, '15165', '', '', '62176500', '0', NULL),
(27, 'S2444317', 'P39995', NULL, '454', '', '', '1861400', '0', NULL),
(28, 'S7635523', 'P39995', NULL, '454', '', '', '1861400', '0', NULL),
(29, 'S8109280', 'P39995', NULL, '454', '', '', '1861400', '0', NULL),
(30, 'S5314979', 'P12183', NULL, '20', '', '', '6500', '0', NULL),
(31, 'S6522425', 'P12183', NULL, '20', '', '', '6500', '0', NULL),
(32, 'S6522425', 'P24774', NULL, '25', '', '', '0', '0', NULL),
(33, 'S6522425', 'P36837', NULL, '200', '', '', '21000', '0', NULL),
(34, 'S1725584', 'P25682', NULL, '52', '', '', '15600', '0', NULL),
(35, 'S4372088', 'P25682', NULL, '30', '', '', '9000', '0', NULL),
(36, 'S4740945', 'P25682', NULL, '5', '', '', '1500', '0', NULL),
(37, 'S4740945', 'P12183', NULL, '50', '', '', '16250', '0', NULL),
(38, 'S7975304', 'P42477', NULL, '50', '', '', '5000', NULL, NULL),
(39, 'S7975304', 'P12183', NULL, '15', '', '', '4875', NULL, NULL),
(40, 'S1095578', 'P42477', NULL, '50', '', '', '5000', NULL, NULL),
(41, 'S1095578', 'P12183', NULL, '20', '', '', '6500', NULL, NULL),
(42, 'S670795', 'P42477', NULL, '5', '', '', '500', NULL, NULL),
(43, 'S670795', 'P36837', NULL, '205', '', '', '21525', NULL, NULL),
(44, 'S9378479', 'P42477', NULL, '20', '', '', '2000', NULL, NULL),
(45, 'S9378479', 'P11845', NULL, '52', '', '', '520', NULL, NULL),
(46, 'S9378479', 'P39995', NULL, '1332', '', '', '5461200', NULL, NULL),
(47, 'S3605842', 'P25682', NULL, '12', '', '', '3600', NULL, NULL),
(48, 'S3605842', 'P11845', NULL, '20', '', '', '200', NULL, NULL),
(49, 'S197251', 'P42477', NULL, '5', '', '', '500', NULL, NULL),
(50, 'S8669982', 'P36837', NULL, '45', '', '', '4725', NULL, NULL),
(51, 'S635124', 'P42477', NULL, '85', '', '', '8500', NULL, NULL),
(52, 'S635124', 'P11845', NULL, '95', '', '', '950', NULL, NULL),
(53, 'S4804843', 'P36837', NULL, '5', '', '', '525', NULL, NULL),
(54, 'S4804843', 'P11788', NULL, '5', '', '', '1795', NULL, NULL),
(55, 'S5001423', 'P36837', NULL, '25', '', '', '2625', NULL, NULL),
(56, 'S4156779', 'P36837', NULL, '25', '', '', '2625', NULL, NULL),
(57, 'S5668702', 'P42477', NULL, '230', '', '', '23000', NULL, NULL),
(58, 'S3266171', 'P39995', NULL, '900000', '', '', '3690000000', NULL, NULL),
(59, 'S158644', 'P36837', NULL, '21', '', '', '2205', NULL, NULL),
(60, 'S158644', 'P42477', NULL, '20', '', '', '2000', NULL, NULL),
(61, 'S2586750', 'P36837', NULL, '1000', '', '', '105000', NULL, NULL),
(62, 'S9795454', 'P25682', NULL, '20', '', '', '6000', NULL, NULL),
(63, 'S5054308', 'P25682', NULL, '20', '', '', '6000', NULL, NULL),
(64, 'S7405204', 'P31663', NULL, '4', NULL, '', '400', NULL, NULL),
(65, 'S7177138', 'P31663', NULL, '3', NULL, '', '300', NULL, NULL),
(66, 'S2431956', 'P31663', NULL, '3', NULL, '', '300', NULL, NULL),
(67, 'S2431956', 'P11788', NULL, '6', NULL, '', '2154', NULL, NULL),
(68, 'S4308792', 'P9075', NULL, '89', NULL, '', '680537254', NULL, NULL),
(69, 'S3699183', 'P9075', NULL, '748475', NULL, '', '5723203608850', NULL, NULL),
(70, 'S1260021', 'P36837', NULL, '5', '', '', '525', NULL, NULL),
(71, 'S8681582', 'P36837', NULL, '9', '', '', '945', NULL, NULL),
(72, 'S1175803', 'P36837', NULL, '5', '', '', '525', '0', NULL),
(73, 'S6458004', 'P36837', NULL, '7', '', '', '735', '0', NULL),
(74, 'S1601313', 'P11788', NULL, '76', '', '', '27284', '0', NULL),
(75, 'S5003658', 'P11788', NULL, '76', '', '', '27284', '0', NULL),
(76, 'S7550374', 'P9075', NULL, '687', '', '', '5253135882', '0', NULL),
(77, 'S7550374', 'P42477', NULL, '6', '', '', '600', '0', NULL),
(78, 'S4799626', 'P9075', NULL, '68', NULL, '', '519961048', '0', NULL),
(79, 'S2245371', 'P36837', NULL, '98', '105 FCFA', '', '10290', '0', NULL),
(80, 'S7837878', 'P36837', NULL, '10', '105 FCFA', '', '1050', '0', NULL),
(81, 'S3169151', 'P36837', NULL, '10', NULL, '', '1050', '0', NULL),
(82, 'S13639', 'P36837', NULL, '5', NULL, '', '525', '0', NULL),
(83, 'S7906107', 'P36837', NULL, '5', NULL, '', '525', '0', NULL),
(84, 'S3193301', 'P11788', NULL, '30', NULL, '', '10770', '0', NULL),
(85, 'S4545092', 'P11788', NULL, '7', NULL, '', '2513', '0', NULL),
(86, 'S5330607', 'P11788', NULL, '7', NULL, '', '2513', '0', NULL),
(87, 'S8989858', 'P11788', NULL, '3', NULL, '', '1077', '0', NULL),
(88, 'S8803407', 'P11788', NULL, '10', NULL, '', '3590', '0', NULL),
(89, 'S5152989', 'P11788', NULL, '10', NULL, '', '3590', '0', NULL),
(90, 'S7925520', 'P11788', NULL, '70', NULL, '', '25130', '0', NULL),
(91, 'S6008555', 'P36837', NULL, '10', '105 FCFA', '', '1050', '0', NULL),
(92, 'S7664089', 'P36837', NULL, '10', '105 FCFA', '', '1050', '0', NULL),
(93, 'S6205332', 'P11788', NULL, '100', '359 FCFA', '', '35900', '0', NULL),
(94, 'S471245', 'P25319', NULL, '1000', NULL, '', '350000', '0', NULL),
(95, 'S4365312', 'P25319', NULL, '1000', NULL, '', '350000', '0', NULL),
(96, 'S9640137', 'P25319', NULL, '500', '350 FCFA', '', '175000', '0', NULL),
(97, 'S6682474', 'P31663', NULL, '7', NULL, '', '700', '0', NULL),
(98, 'S8632778', 'P31663', NULL, '10', NULL, '', '1000', '0', NULL),
(99, 'S5256986', 'P31663', NULL, '10', NULL, '', '1000', '0', NULL),
(100, 'S9614868', 'P36837', NULL, '20', NULL, '', '2100', '0', NULL),
(101, 'S1753476', 'P36837', NULL, '20', NULL, '', '2100', '0', NULL),
(102, 'S3986359', 'P857', NULL, '16', NULL, '', '3680', '0', NULL),
(103, 'S8015140', 'P39995', NULL, '240', NULL, '', '984000', '0', NULL),
(104, 'S2869223', 'P13578', NULL, '120', NULL, '', '39000', '0', NULL),
(105, 'S2612175', 'P25319', NULL, '200', NULL, '', '70000', '0', NULL),
(106, 'S8063417', 'P25319', NULL, '209', NULL, '', '73150', '0', NULL),
(107, 'S9796277', 'P857', NULL, '23', NULL, '', '5290', '0', NULL),
(108, 'S3237504', 'P857', NULL, '50', '230 FCFA', '', '11500', '0', NULL),
(109, 'S390607', 'P25319', NULL, '35', '350 FCFA', '', '12250', '0', NULL),
(110, 'S3542641', 'P6695', NULL, '30', '110 FCFA', '', '3300', '0', NULL),
(111, 'S7289098', 'P31663', NULL, '10', '100 FCFA', '', '1000', '0', NULL),
(112, 'S5897770', 'P25319', NULL, '200', NULL, '', '70000', '0', NULL),
(113, 'S3512228', 'P857', NULL, '12', '230 FCFA', '', '2760', '0', NULL),
(114, 'S1169391', 'P31663', NULL, '05', '100 FCFA', '', '500', NULL, NULL),
(115, 'S4162360', 'P857', NULL, '45', '230 FCFA', '', '10350', NULL, NULL),
(116, 'S956560', 'P31663', NULL, '2', '100 FCFA', '', '200', NULL, NULL),
(117, 'S2059487', 'P857', NULL, '5', '230 FCFA', '', '1150', NULL, NULL),
(118, 'S4678168', 'P25319', NULL, '67', '350 FCFA', '', '23450', NULL, NULL),
(119, 'S5610180', 'P31663', NULL, '2', '100 FCFA', '', '200', NULL, NULL),
(120, 'S3595218', 'P25319', NULL, '32', '350 FCFA', '', '11200', NULL, NULL),
(121, 'S7415503', 'P25319', NULL, '2', '350 FCFA', '', '700', NULL, NULL),
(122, 'S9949870', 'P13578', NULL, '6', '325 FCFA', '', '1950', NULL, NULL),
(123, 'S7620704', 'P13578', NULL, '3', '325 FCFA', '', '975', NULL, NULL),
(124, 'S1651233', 'P13578', NULL, '4', '325 FCFA', '', '1300', NULL, NULL),
(125, 'S2303160', 'P13578', NULL, '3', NULL, '', '975', NULL, NULL),
(126, 'S5586975', 'P13578', NULL, '4', '325 FCFA', '', '1300', NULL, NULL),
(127, 'S4564226', 'P857', NULL, '12', '230 FCFA', '', '2760', NULL, NULL),
(128, 'S5447198', 'P13578', NULL, '34', '325 FCFA', '', '11050', NULL, NULL),
(129, 'S5479419', 'P13578', NULL, '3', '325 FCFA', '', '975', NULL, NULL),
(130, 'S3881962', 'P6695', NULL, '3', '325 FCFA', '', '330', NULL, NULL),
(131, 'S3881962', 'P13578', NULL, '4', NULL, '', '1300', NULL, NULL),
(132, 'S5802288', 'P6695', NULL, '67', NULL, '', '7370', NULL, NULL),
(133, 'S3552523', 'P13578', NULL, '21', '325 FCFA', '', '6825', NULL, NULL),
(134, 'S3552523', 'P42477', NULL, '7', '100 FCFA', '', '700', NULL, NULL),
(135, 'S3552523', 'P25319', NULL, '9', '350 FCFA', '', '3150', NULL, NULL),
(136, 'S3552523', 'P36837', NULL, '5', '105 FCFA', '', '525', NULL, NULL),
(137, 'S4730954', 'P42477', NULL, '4', '100 FCFA', '', '400', NULL, NULL),
(138, 'S4730954', 'P25319', NULL, '43', '350 FCFA', '', '15050', NULL, NULL),
(139, 'S8576329', 'P857', NULL, '4', '230 FCFA', '', '920', NULL, NULL),
(140, 'S8576329', 'P13578', NULL, '9', '325 FCFA', '', '2925', NULL, NULL),
(141, 'S8576329', 'P42477', NULL, '3', '100 FCFA', '', '300', NULL, NULL),
(142, 'S3439854', 'P13578', NULL, '23', NULL, '', '7475', NULL, NULL),
(143, 'S28086', 'P857', NULL, '21', '230 FCFA', '', '4830', NULL, NULL),
(144, 'S9513388', 'P42477', NULL, '5', '100 FCFA', '', '500', NULL, NULL),
(145, 'S1258751', 'P42477', NULL, '3', '100 FCFA', '', '300', NULL, NULL),
(146, 'S3090768', 'P42477', NULL, '9', '100 FCFA', '', '900', NULL, NULL),
(147, 'S669849', 'P25319', NULL, '23', '350 FCFA', '', '8050', NULL, NULL),
(148, 'S6589956', 'P39995', NULL, '23', '4100 FCFA', '', '94300', NULL, NULL),
(149, 'S7225523', 'P13578', NULL, '23', '325 FCFA', '', '7475', NULL, NULL),
(150, 'S2710995', 'P13578', NULL, '23', '325 FCFA', '', '7475', NULL, NULL),
(151, 'S2003200', 'P857', NULL, '2', '230 FCFA', '', '460', NULL, NULL),
(152, 'S3799975', 'P857', NULL, '2', '230 FCFA', '', '460', NULL, NULL),
(153, 'S8773779', 'P39995', NULL, '3', '4100 FCFA', '', '12300', NULL, NULL),
(154, 'S5586241', 'P42477', NULL, '4', '100 FCFA', '', '400', NULL, NULL),
(155, 'S9729820', 'P36837', NULL, '1', '105 FCFA', '', '105', NULL, NULL),
(156, 'S9729464', 'P13578', NULL, '4', '325 FCFA', '', '1300', NULL, NULL),
(157, 'S8720201', 'P25319', NULL, '4', '350 FCFA', '', '1400', NULL, NULL),
(158, 'S4197066', 'P39995', NULL, '45', '4100 FCFA', '', '184500', NULL, NULL),
(159, 'S508553', 'P25319', NULL, '23', '350 FCFA', '', '8050', NULL, NULL),
(160, 'S6050731', 'P6695', NULL, '3', '110 FCFA', '', '330', NULL, NULL),
(161, 'S559747', 'P25319', NULL, '5', '350 FCFA', '', '1750', NULL, NULL),
(162, 'S2870515', 'P25319', NULL, '2', '350 FCFA', '', '700', NULL, NULL),
(163, 'S3003202', 'P25319', NULL, '45', '350 FCFA', '', '15750', NULL, NULL),
(164, 'S3003202', 'P6695', NULL, '12', '110 FCFA', '', '1320', NULL, NULL),
(165, 'S3003202', 'P13578', NULL, '6', '325 FCFA', '', '1950', NULL, NULL),
(166, 'S2916881', 'P6695', NULL, '5', '110 FCFA', '', '550', NULL, NULL),
(167, 'S3759284', 'P25319', NULL, '6', '350 FCFA', '', '2100', NULL, NULL),
(168, 'S4804272', 'P6695', NULL, '5', '110 FCFA', '', '550', NULL, NULL),
(169, 'S1269996', 'P25319', NULL, '5', NULL, '', '1750', NULL, NULL),
(170, 'S9503982', 'P6695', NULL, '6', '110 FCFA', '', '660', NULL, NULL),
(171, 'S8393502', 'P42477', NULL, '6', NULL, '', '600', NULL, NULL),
(172, 'S9145813', 'P857', NULL, '5', '230 FCFA', '', '1150', NULL, NULL),
(173, 'S324912', 'P39995', NULL, '56', '4100 FCFA', '', '229600', NULL, NULL),
(174, 'S3913126', 'P857', NULL, '2', '230 FCFA', '', '460', NULL, NULL),
(175, 'S5803402', 'P42477', NULL, '5', NULL, '', '500', NULL, NULL),
(176, 'S9408766', 'P6695', NULL, '10', '110 FCFA', '', '1100', NULL, NULL),
(177, 'S3589895', 'P13578', NULL, '20', '325 FCFA', '', '6500', NULL, NULL),
(178, 'S9761348', 'P13578', NULL, '6', '325 FCFA', '', '1950', NULL, NULL),
(179, 'S4975910', 'P36837', NULL, '7', '105 FCFA', '', '735', NULL, NULL),
(180, 'S8079939', 'P42477', NULL, '2', '100 FCFA', '', '200', NULL, NULL),
(181, 'S8079939', 'P36837', NULL, '10', '105 FCFA', '', '1050', NULL, NULL),
(182, 'S8079939', 'P6695', NULL, '20', '110 FCFA', '', '2200', NULL, NULL),
(183, 'S8012331', 'P25319', NULL, '20', '350 FCFA', '', '7000', NULL, NULL),
(184, 'S6343427', 'P25319', NULL, '20', '350 FCFA', '', '7000', NULL, NULL),
(185, 'S1536571', 'P25319', NULL, '20', '350 FCFA', '', '7000', NULL, NULL),
(186, 'S8880152', 'P25319', NULL, '20', '350 FCFA', '', '7000', NULL, NULL),
(187, 'S2230095', 'P25319', NULL, '20', '350 FCFA', '', '7000', NULL, NULL),
(188, 'S346425', 'P13578', NULL, '23', '325 FCFA', '', '7475', NULL, NULL),
(189, 'S9448887', 'P13578', NULL, '23', '325 FCFA', '', '7475', NULL, NULL),
(190, 'S6426449', 'P13578', NULL, '23', '325 FCFA', '', '7475', NULL, NULL),
(191, 'S9863556', 'P25319', NULL, '21', '350 FCFA', '', '7350', NULL, NULL),
(192, 'S8140634', 'P25319', NULL, '21', '350 FCFA', '', '7350', NULL, NULL),
(193, 'S2309234', 'P25319', NULL, '21', '350 FCFA', '', '7350', NULL, NULL),
(194, 'S6711773', 'P25319', NULL, '21', '350 FCFA', '', '7350', NULL, NULL),
(195, 'S2225681', 'P25319', NULL, '21', '350 FCFA', '', '7350', NULL, NULL),
(196, 'S4166656', 'P13578', NULL, '12', '325 FCFA', '', '3900', NULL, NULL),
(197, 'S1364067', 'P42477', NULL, '1', '100 FCFA', '', '100', NULL, NULL),
(198, 'S2852769', 'P39995', NULL, '12', '4100 FCFA', '', '49200', NULL, NULL),
(199, 'S2544170', 'P13578', NULL, '3', '325 FCFA', '', '975', NULL, NULL),
(200, 'S2832067', 'P25319', NULL, '20', '350 FCFA', '', '7000', NULL, NULL),
(201, 'S1072089', 'P39995', NULL, '12', '4100 FCFA', '', '49200', NULL, NULL),
(202, 'S4972240', 'P25319', NULL, '2', '350 FCFA', '', '700', NULL, NULL),
(203, 'S9386012', 'P13578', NULL, '5', '325 FCFA', '', '1625', NULL, NULL),
(204, 'S1633938', 'P13578', NULL, '3', '325 FCFA', '', '975', NULL, NULL),
(205, 'S1804254', 'P25319', NULL, '12', '350 FCFA', '', '4200', NULL, NULL),
(206, 'S6015102', 'P25319', NULL, '12', '350 FCFA', '', '4200', NULL, NULL),
(207, 'S3789540', 'P25319', NULL, '12', '350 FCFA', '', '4200', NULL, NULL),
(208, 'S5206927', 'P6695', NULL, '12', '110 FCFA', '', '1320', NULL, NULL),
(209, 'S7414885', 'P39995', NULL, '15', '4100 FCFA', '', '61500', NULL, NULL),
(210, 'S8017409', 'P13578', NULL, '5', '325 FCFA', '', '1625', NULL, NULL),
(211, 'S7010396', 'P25682', NULL, '12', '300 FCFA', '', '3600', NULL, NULL),
(212, 'S2398519', 'P13578', NULL, '8', '325 FCFA', '', '2600', NULL, NULL),
(213, 'S4530741', 'P25319', NULL, '7', '350 FCFA', '', '2450', NULL, NULL),
(214, 'S6142121', 'P13578', NULL, '6', '325 FCFA', '', '1950', NULL, NULL),
(215, 'S3692470', 'P25682', NULL, '23', '300 FCFA', '', '6900', NULL, NULL),
(216, 'S3459348', 'P13578', NULL, '100', '325 FCFA', '', '32500', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(14) NOT NULL,
  `sr_id` varchar(128) DEFAULT NULL,
  `cus_id` varchar(128) DEFAULT NULL,
  `sale_id` varchar(128) DEFAULT NULL,
  `invoice_no` varchar(256) DEFAULT NULL,
  `return_date` varchar(128) DEFAULT NULL,
  `total_deduction` varchar(128) DEFAULT NULL,
  `total_amount` varchar(128) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL,
  `counter` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sales_return`
--

INSERT INTO `sales_return` (`id`, `sr_id`, `cus_id`, `sale_id`, `invoice_no`, `return_date`, `total_deduction`, `total_amount`, `entry_id`, `counter`) VALUES
(1, 'SR4344352', '', 'S7437516', '4346312', '1594404000', '0', '4200', 'U305', 'ADMIN'),
(2, 'SR3499528', '', 'S7672158', '4355028', '1594404000', '0', '5250', 'U305', 'ADMIN'),
(3, 'SR653913', '', 'S7672158', '2934887', '1594404000', '0', '0', 'U305', 'ADMIN'),
(4, 'SR3169960', '', 'S5001423', '2926811', '1594490400', '0', '0', 'U305', 'ADMIN'),
(5, 'SR700258', '', 'S5001423', '1784199', '1594490400', '0', '0', 'U305', 'ADMIN'),
(6, 'SR3381091', '', 'S4156779', '4422353', '1594490400', '0', '0', 'U305', 'ADMIN'),
(7, 'SR4261126', 'C303308', 'S9640137', '2362774', '1596132000', '0', '0', 'U305', 'ADMIN'),
(8, 'SR2059709', '', 'S7289098', '2952093', '1596304800', '0', '1000', 'U324', 'ADMIN'),
(9, 'SR2721406', 'C454924', 'S5897770', '3394653', '1596391200', '0', '70000', 'U324', 'ADMIN'),
(10, 'SR4747424', 'C195731', 'S7837878', '3950361', '1596391200', '0', '1050', 'U324', 'ADMIN'),
(11, 'SR4129009', 'C195731', 'S7837878', '4380297', '1596391200', '0', '1050', 'U324', 'ADMIN'),
(12, 'SR3562804', 'C195731', 'S7837878', '4733497', '1596391200', '0', '1050', 'U324', 'ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `sales_return_details`
--

CREATE TABLE `sales_return_details` (
  `id` int(14) NOT NULL,
  `sr_id` varchar(128) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `r_qty` varchar(128) DEFAULT NULL,
  `r_total` varchar(128) DEFAULT NULL,
  `r_deduction` varchar(128) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sales_return_details`
--

INSERT INTO `sales_return_details` (`id`, `sr_id`, `mid`, `r_qty`, `r_total`, `r_deduction`, `date`) VALUES
(1, 'SR4344352', 'P36837', '40', '4200', '0', '1594404000'),
(2, 'SR3499528', 'P36837', '50', '5250', '0', '1594404000'),
(3, 'SR2059709', 'P31663', '10', '1000', '0', '1596304800'),
(4, 'SR2721406', 'P25319', '200', '70000', '0', '1596391200'),
(5, 'SR4747424', 'P36837', '10', '1050', '0', '1596391200'),
(6, 'SR4129009', 'P36837', '10', '1050', '0', '1596391200'),
(7, 'SR3562804', 'P36837', '10', '1050', '0', '1596391200');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `sitelogo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(256) DEFAULT NULL,
  `description` text,
  `copyright` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `currency` varchar(128) DEFAULT NULL,
  `symbol` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `name`, `sitelogo`, `sitetitle`, `description`, `copyright`, `contact`, `currency`, `symbol`, `email`, `address`) VALUES
(1, 'Pharmacie La Mouanque', 'index9.png', 'Pharmacie', 'Votre Santé, Notre priorité \r\n\r\n\r\n', NULL, '695165899', NULL, NULL, 'mouanque@gmail.com', 'Youande, Cameroune');

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(14) NOT NULL,
  `s_id` varchar(64) DEFAULT NULL,
  `s_name` varchar(256) DEFAULT NULL,
  `s_email` varchar(256) DEFAULT NULL,
  `s_note` varchar(512) DEFAULT NULL,
  `s_phone` varchar(128) DEFAULT NULL,
  `s_address` varchar(512) NOT NULL,
  `s_img` varchar(256) DEFAULT NULL,
  `entrydate` varchar(128) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `id` int(14) NOT NULL,
  `supplier_id` varchar(256) DEFAULT NULL,
  `total_amount` varchar(256) DEFAULT NULL,
  `total_paid` varchar(256) DEFAULT NULL,
  `total_due` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `sp_id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `sup_id` varchar(64) DEFAULT NULL,
  `sup_price` varchar(64) DEFAULT NULL,
  `sup_date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `supp_account`
--

CREATE TABLE `supp_account` (
  `id` int(14) NOT NULL,
  `supplier_id` varchar(64) DEFAULT NULL,
  `pur_id` varchar(128) DEFAULT NULL,
  `total_amount` varchar(64) DEFAULT NULL,
  `paid_amount` varchar(64) DEFAULT NULL,
  `due_amount` varchar(256) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `supp_payment`
--

CREATE TABLE `supp_payment` (
  `id` int(14) NOT NULL,
  `supp_id` varchar(64) DEFAULT NULL,
  `pur_id` varchar(64) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `bank_id` int(14) DEFAULT NULL,
  `cheque_no` varchar(128) DEFAULT NULL,
  `issue_date` varchar(64) DEFAULT NULL,
  `receiver_name` varchar(128) DEFAULT NULL,
  `receiver_contact` varchar(128) DEFAULT NULL,
  `paid_amount` varchar(64) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `em_name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `em_role` enum('SALESMAN','ADMIN','MANAGER') NOT NULL DEFAULT 'SALESMAN',
  `em_contact` varchar(128) DEFAULT NULL,
  `em_address` varchar(512) DEFAULT NULL,
  `em_image` varchar(256) DEFAULT NULL,
  `em_details` varchar(512) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `em_entrydate` varchar(64) DEFAULT NULL,
  `em_ip` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `em_id`, `em_name`, `email`, `password`, `em_role`, `em_contact`, `em_address`, `em_image`, `em_details`, `status`, `em_entrydate`, `em_ip`) VALUES
(34, 'U398', 'Serge', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'SALESMAN', '656484626', '', NULL, '', 'ACTIVE', '1604703600', '::1'),
(35, 'U324', 'Brandone', 'brandone.sape@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ADMIN', '6565485423', '', 'U324.png', '', 'ACTIVE', '1607295600', '::1'),
(36, 'U483', 'Kevin', 'kevin@gmail', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'MANAGER', '68776748687', '', 'U483.png', '', 'ACTIVE', '0', '::1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accounts_report`
--
ALTER TABLE `accounts_report`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fire_service`
--
ALTER TABLE `fire_service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`ph_id`);

--
-- Index pour la table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- Index pour la table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Index pour la table `supp_account`
--
ALTER TABLE `supp_account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supp_payment`
--
ALTER TABLE `supp_payment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `accounts_report`
--
ALTER TABLE `accounts_report`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `ph_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT pour la table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sd_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT pour la table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `sp_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supp_account`
--
ALTER TABLE `supp_account`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supp_payment`
--
ALTER TABLE `supp_payment`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
