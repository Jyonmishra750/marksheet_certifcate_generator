-- database: 'niis'

--------------------------------------------
--admin::
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--Dumping data for table `admin`

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2022-01-01 10:30:57');

-----------------------------------------------------------------------------------
--table "branch"
CREATE TABLE `branch`(
    `id` int(11) unsigned NOT NULL,
    `Branch` varchar(100) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `branch`

INSERT INTO `branch` (`id`, `Branch`) VALUES
(1, 'BBA'),(2,'BCA'),(3,'ITM');

--------------------------------------------------------------------------------------------------------------------
--table "student"

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Branch` varchar(100) DEFAULT NULL
  `status` int(1) DEFAULT NULL
  `UpdationDate` timestamp NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

------------------------------------------------------------------------------
--table "notice"

CREATE TABLE `tblnotice` (
  `id` int(11) NOT NULL,
  `noticeTitle` varchar(255) DEFAULT NULL,
  `noticeDetails` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `notice`

INSERT INTO `tblnotice` (`id`, `noticeTitle`, `noticeDetails`, `postingDate`) VALUES
(2, 'Notice regarding result Delearation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing elit ut aliquam purus. Vel risus commodo viverra maecenas. Et netus et malesuada fames ac turpis egestas sed. Cursus eget nunc scelerisque viverra mauris in aliquam sem fringilla. Ornare arcu odio ut sem nulla pharetra diam. Vel pharetra vel turpis nunc eget lorem dolor sed. Velit ut tortor pretium viverra suspendisse. In ornare quam viverra orci sagittis eu. Viverra tellus in hac habitasse. Donec massa sapien faucibus et molestie. Libero justo laoreet sit amet cursus sit amet dictum. Dignissim diam quis enim lobortis scelerisque fermentum dui.\r\n\r\nEget nulla facilisi etiam dignissim. Quisque non tellus orci ac. Amet cursus sit amet dictum sit amet justo donec. Interdum velit euismod in pellentesque massa. Condimentum lacinia quis vel eros donec ac odio. Magna eget est lorem ipsum dolor. Bibendum at varius vel pharetra vel turpis nunc eget lorem. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit amet. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Massa tincidunt dui ut ornare lectus sit amet est placerat. Nisi quis eleifend quam adipiscing vitae.', '2022-01-01 14:34:58'),
(3, 'Test Notice', 'This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  This is for testing purposes only.  ', '2022-01-01 14:48:32');

---------------------------------------------------------------------------------

--create table "notification"

CREATE TABLE `tblnotification` (
  `Id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `notification`

INSERT INTO `tblnotification`(`id`,`subject`, `message`, `status`) VALUES(
    1,'student','registered his/her application'
);

-----------------------------------------------------------------

--table "result"
CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `result`
INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(2, 1, 1, 2, 100, '2022-01-01 10:30:57', NULL),
(3, 1, 1, 1, 80, '2022-01-01 10:30:57', NULL),
(4, 1, 1, 5, 78, '2022-01-01 10:30:57', NULL),
(5, 1, 1, 4, 60, '2022-01-01 10:30:57', NULL),
(6, 2, 4, 2, 90, '2022-01-01 10:30:57', NULL),
(7, 2, 4, 1, 75, '2022-01-01 10:30:57', NULL),
(8, 2, 4, 5, 56, '2022-01-01 10:30:57', NULL),
(9, 2, 4, 4, 80, '2022-01-01 10:30:57', NULL),
(10, 4, 7, 2, 54, '2022-01-01 10:30:57', NULL),
(11, 4, 7, 1, 85, '2022-01-01 10:30:57', NULL),
(12, 4, 7, 5, 55, '2022-01-01 10:30:57', NULL),
(13, 4, 7, 7, 65, '2022-01-01 10:30:57', NULL),
(14, 5, 8, 2, 75, '2022-01-01 10:30:57', NULL),
(15, 5, 8, 1, 56, '2022-01-01 10:30:57', NULL),
(16, 5, 8, 5, 52, '2022-01-01 10:30:57', NULL),
(17, 5, 8, 4, 80, '2022-01-01 10:30:57', NULL),
(18, 6, 9, 8, 80, '2022-01-01 15:20:18', NULL),
(19, 6, 9, 8, 70, '2022-01-01 15:20:18', NULL),
(20, 6, 9, 2, 90, '2022-01-01 15:20:18', NULL),
(21, 6, 9, 1, 60, '2022-01-01 15:20:18', NULL);

----------------------------------------------------------------------------
--table subject combination 
CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `subjectcombination`
INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(3, 2, 5, 1, '2022-01-01 10:30:57', NULL),
(4, 1, 2, 1, '2022-01-01 10:30:57', NULL),
(5, 1, 4, 1, '2022-01-01 10:30:57', NULL),
(6, 1, 5, 1, '2022-01-01 10:30:57', NULL),
(8, 4, 4, 1, '2022-01-01 10:30:57', NULL),
(10, 4, 1, 1, '2022-01-01 10:30:57', NULL),
(12, 4, 2, 1, '2022-01-01 10:30:57', NULL),
(13, 4, 5, 1, '2022-01-01 10:30:57', NULL),
(14, 6, 1, 1, '2022-01-01 10:30:57', NULL),
(15, 6, 2, 1, '2022-01-01 10:30:57', NULL),
(16, 6, 4, 1, '2022-01-01 10:30:57', NULL),
(17, 6, 6, 1, '2022-01-01 10:30:57', NULL),
(18, 7, 1, 1, '2022-01-01 10:30:57', NULL),
(19, 7, 7, 1, '2022-01-01 10:30:57', NULL),
(20, 7, 2, 1, '2022-01-01 10:30:57', NULL),
(21, 7, 6, 1, '2022-01-01 10:30:57', NULL),
(22, 7, 5, 0, '2022-01-01 10:30:57', NULL),
(23, 8, 1, 1, '2022-01-01 10:30:57', NULL),
(24, 8, 2, 1, '2022-01-01 10:30:57', NULL),
(25, 8, 4, 1, '2022-01-01 10:30:57', NULL),
(26, 8, 6, 1, '2022-01-01 10:30:57', NULL),
(27, 8, 5, 0, '2022-01-01 10:30:57', NULL),
(28, 9, 1, 1, '2022-01-01 15:18:40', NULL),
(29, 9, 2, 1, '2022-01-01 15:18:43', NULL),
(30, 9, 8, 1, '2022-01-01 15:18:48', NULL),
(31, 9, 8, 1, '2022-01-01 15:18:54', NULL);


------------------------------------------------------------------------
--table "tblsubject"
CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `subjects`
INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Maths', 'MTH01', '2022-01-01 10:30:57', NULL),
(2, 'English', 'ENG11', '2022-01-01 10:30:57', NULL),
(4, 'Science', 'SC1', '2022-01-01 10:30:57', NULL),
(5, 'Music', 'MS', '2022-01-01 10:30:57', NULL),
(6, 'Social Studies', 'SS08', '2022-01-01 10:30:57', NULL),
(7, 'Physics', 'PH03', '2022-01-01 10:30:57', NULL),
(8, 'Chemistry', 'CH65', '2022-01-01 10:30:57', NULL);

---------------------------------------------------------------------------

--table "teacher"

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Branch` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `teacher'


