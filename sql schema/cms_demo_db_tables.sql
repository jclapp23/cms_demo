-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.jmcdesignstudios.com
-- Generation Time: May 27, 2013 at 12:27 PM
-- Server version: 5.1.56
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `about_paragraphs`
--

CREATE TABLE IF NOT EXISTS `about_paragraphs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `paragraph` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `about_paragraphs`
--

INSERT INTO `about_paragraphs` (`id`, `paragraph`) VALUES
(10, 'We truly appreciate our customers in the Seacoast and Lakes Regions, therefore, feel it is our duty to provide our undivided attention to your project start to finish. This coming season we look forward to earning your trust, respect, and your business.'),
(8, 'John Prince and Chris Parker established Great Escapes Patio & Stonework Inc in 2012. Combined we have nearly 20 years of experience in all aspects of masonry construction. While our areas of expertise are different, we feel that our versatility can be a major benefit to your construction project. The scope of work that we handle includes all forms of landscape masonry, outdoor living spaces, foundation and house veneers, as well as structural masonry. We have vast experience working within many architectural mediums.'),
(9, 'We pride ourselves on delivering the highest quality work along with the highest quality contractor experience. When you deal with Great Escapes in the field, you are dealing with an owner/operator. Streamlined, efficient management and communication is in everyoneâ€™s best interest and is what you deserve. Our hands-on approach with designers, architects, and homeowners allows us to implement on site changes and problem solve effectively.');

-- --------------------------------------------------------

--
-- Table structure for table `html_wsywig`
--

CREATE TABLE IF NOT EXISTS `html_wsywig` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `page_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `html_wsywig`
--

INSERT INTO `html_wsywig` (`id`, `content`, `page_id`) VALUES
(1, ' <div class="about_team">\r\n   <img src="../images/john.png"/>\r\n      <h5>John Prince - President</h5>\r\n      <p>John Prince has been practicing traditional masonry as well as landscape masonry in New England since 2001. His construction experience started at Southern Maine Technical College where he studied Architectural Drafting and Auto CAD extensively. He then served an accelerated apprenticeship for Richard Irons Restoration Masons. There he gained experience and knowledge in traditional masonry practices. One of the notable jobs completed while with Richard is the rebuild and restoration of the chimneys on The House of Seven Gables in Salem, Massachusetts. John then decided to expand his skillset, and developed a strong background in stonework. He sought employment from one of the seacoast''s most renowned firms, Hayden Hillsgrove Stone Masonry Inc. There, he expanded his knowledge in natural stone shaping and application on the most prestigious properties in New Hampshire''s seacoast and lake''s region. John has spent the last four years as a construction foreman for Piscataqua Landscaping Company, Inc. Working in the landscape masonry field has enabled John to tie his experience together and further expand into custom flatwork using many different materials.</p>\r\n\r\n      <p>In 2012, John Prince and Chris Parker founded Great Escapes Patio & Stonework, Inc. Through a strong commitment to providing his customers the best possible experience, John has devoted his time to advancing his business education through the New Hampshire Small Business Development Center. His industrial education is ongoing as well. For the 2013 season John will be an Interlocking Concrete Pavement Institute certified installer as well as a Techo-Block Pro installer.</p>\r\n\r\n      <p>While John is not making improvements to customer''s property, he finds time to work on the home he bought in Rochester, NH with his wife Mallory. He enjoys skiing, four-wheeling, and boating with friends and family. John and Mallory are enjoying the experience of raising their first child, Leona born February 21, 2013.</p>\r\n\r\n  </div>\r\n   <div class="about_team">\r\n     <img src="../images/chris.png"/>\r\n      <h5>Chris Parker - Vice President</h5>\r\n      <p>Chris Parker has been building stonework and hardscapes since 2004. This line of work started as a summer job to pay for college at the University of New Hampshire where he received a bachelor''s degree in Kinesiology, Exercise Physiology. Over those four summers he installed several thousand square feet of pavers and also built several outdoor kitchens. In 2008 Chris decided to put his degree aside and take on masonry full time. In 2010 Chris moved to Portsmouth, NH and began working for Piscataqua Landscaping, in Eliot, Maine, as a Landscape Mason. He has worked on several high profile accounts here on the seacoast performing many different forms of masonry. While at Piscataqua, Chris was awarded Rookie of the year in 2010, 1st place safety award in 2011, and the leading attendance award for 2012. His strong work ethic and dedication led him to being promoted to a foreman position in 2012 </p>\r\n      \r\n      <p>In 2012, Chris and John Prince started Great Escapes Patio & Stonework, Inc. He is looking forward to the hard work and commitment to building a successful company from the ground up. He is continuing his education through the New Hampshire Small Business Development Center and is also becoming an Interlocking Concrete Paver Certified Installer, Segmental Retaining Wall Certified Installer, and a Techo-bloc Pro.</p>\r\n\r\n      <p>In his spare time he enjoys building furniture and woodworking around his home in Dover, NH. He also enjoys spending time being active outdoors with his fiance Leanne and his dog Cooper. Chris and Leanne will be saying<em>â€œI Doâ€</em> in June 2013.</p>\r\n  </div>', 'about-masonry-construction-management-team'),
(2, '<p>To schedule an appointment for a free estimate or if would like more information about our products and services feel free to contact us.</p>\r\n   <ul>  \r\n     <li class="contact_headings">Office\r\n        <ul>  \r\n          <li class="contact_sub_headings">Phone: (603) 948-2835</li>\r\n          <li class="contact_sub_headings">Mailing Address: 410 Middle Rd Dover, NH 03820</li>\r\n        </ul>\r\n      </li>\r\n      <br/>\r\n      <li class="contact_headings">John Prince \r\n        <ul>\r\n            <li class="contact_sub_headings">Cell: (207) 206-4683</li>\r\n          <li class="contact_sub_headings">Email: <a target="blank_" href="mailto:Greatescapesstonework@gmail.com?subject=Great%20Escapes%20Website%20Inquiry" >john@greatescapespatio.com</a></li>\r\n           \r\n        </ul>\r\n      </li>\r\n      <br/>\r\n      <li class="contact_headings">Chris Parker\r\n        <ul>\r\n            <li class="contact_sub_headings">Cell: (860) 214-5805</li>\r\n            <li class="contact_sub_headings">Email: <a target="blank_" href="mailto:Greatescapespatio@gmail.com?subject=Great%20Escapes%20Website%20Inquiry">chris@greatescapespatio.com</a></li>\r\n        </ul>\r\n      </li>\r\n     \r\n   </ul>', 'new-hampshire-stone-mason-contact');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_location` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `show_in_landscape_gallery` tinyint(1) NOT NULL DEFAULT '0',
  `show_in_popular_gallery` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_location`, `project_id`, `show_in_landscape_gallery`, `show_in_popular_gallery`) VALUES
(68, 'Deck-Veneer.jpg', '117', 1, 1),
(71, 'Truck.jpg', '120', 0, 1),
(73, 'Stone-chimney.jpg', '122', 0, 1),
(74, 'Garden-wall.jpg', '123', 1, 1),
(75, 'Patio-1.jpg', '124', 1, 1),
(76, 'Retaining-Wall.jpg', '125', 0, 1),
(77, 'Small-Stone-wall.jpg', '126', 1, 1),
(78, 'stone-wall.jpg', '127', 1, 1),
(79, 'After-Gable-end-Veneer.jpg', '128', 0, 1),
(80, 'Before-gable-end-veneer.jpg', '128', 0, 0),
(84, 'Granite-stairs-3-11-13.jpg', '132', 0, 0),
(85, '2-Granite-stairs-3-11-13.jpg', '133', 0, 0),
(86, 'granite-mailbox-post-3-11-13.jpg', '134', 0, 0),
(87, 'Small-firepit-3-11-13.jpg', '135', 0, 0),
(88, 'Techo-bloc-circle-pak-3-11-13.jpg', '136', 0, 0),
(89, 'firepit-with-seating-3-11-13.jpg', '137', 0, 0),
(90, 'outdoor-fireplace-with-seating-3-11-13.jpg', '138', 0, 0),
(91, 'planter-box-3-11-13.jpg', '139', 0, 0),
(92, 'retaining-wall-planting-3-11-13.jpg', '140', 0, 0),
(99, 'photo 1 (2) (800x600).jpg', '146', 0, 0),
(100, 'photo 4 (1) (800x600).jpg', '147', 0, 0),
(101, 'photo 5 (800x600).jpg', '148', 0, 0),
(102, 'photo 2 (800x600).jpg', '150', 0, 0),
(105, 'photo 1 (800x600).jpg', '151', 0, 0),
(108, 'IMG_1079 (640x480).jpg', '153', 0, 0),
(109, 'IMG_1079 (640x480).jpg', '154', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`name`, `phone`, `email`, `comments`, `id`, `date`) VALUES
('sfdsdf', '7742540302', 'jclapp23@gmail.com', 'Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.Hello please give me a quote asap, thanks Bob.', 26, '2013-02-05 13:48:34'),
('Timmy', '7742540302', 'jclapp23@gmail.com', 'Hello pls give a quote, thanks Tim.', 27, '2013-02-05 13:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_lines`
--

CREATE TABLE IF NOT EXISTS `marketing_lines` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `marketing_line` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `marketing_lines`
--

INSERT INTO `marketing_lines` (`id`, `marketing_line`) VALUES
(1, 'Custom Stonework'),
(2, 'Appreciate your yard! Your home''s value will appreciate it too!'),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_keyword` varchar(255) NOT NULL,
  `portfolio_description` longtext NOT NULL,
  `project_date` varchar(20) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`project_id`, `service_keyword`, `portfolio_description`, `project_date`) VALUES
(117, 'thin-veneer', 'Granite veneer around cypress deck', '2012-09-01'),
(120, 'winter', 'Plow truck', '2013-03-09'),
(122, 'traditional-masonry', 'Stone Chimney', '2013-03-09'),
(123, 'wall-systems', 'Dry laid field stone garden wall', '2013-03-09'),
(124, 'pavers', 'Techo Bloc paver patio', '2013-03-09'),
(125, 'wall-systems', 'Dry laid field stone retaining wall', '2013-03-09'),
(126, 'wall-systems', 'Small dry laid graite stone wall', '2013-03-09'),
(127, 'wall-systems', 'Granite Stone Wall', '2013-03-09'),
(128, 'thin-veneer', 'Gable end before & after', '2013-03-09'),
(132, 'granite', 'Wide granite stairs', '2013-03-11'),
(133, 'granite', 'Small set of granite steps', '2013-03-11'),
(134, 'granite', 'Granite mailbox posts', '2013-03-11'),
(135, 'outdoor-living-spaces', 'Small Paver fire pit', '2013-03-11'),
(136, 'pavers', 'Techo Bloc Circle', '2013-03-11'),
(137, 'outdoor-living-spaces', 'Fire pit with seating', '2013-03-11'),
(138, 'outdoor-living-spaces', 'Outdoor Fireplace with seating', '2013-03-11'),
(139, 'wall-systems', 'Planting wall box', '2013-03-11'),
(140, 'wall-systems', 'Planting wall', '2013-03-11'),
(146, 'thin-veneer', 'Home before thin veneer.', '04/22/2013'),
(147, 'thin-veneer', 'home after colonial tan mosaic veneer with a raked joint.', '04/22/2013'),
(148, 'pavers', '15x22 sandlewood color Holland stone paver patio.', '04/15/2013'),
(150, 'decks', 'deck after remodel with, new landing, new decking and custom spindles.', '04/01/2013'),
(151, 'decks', 'deck before remodel', '04/01/2013'),
(153, 'wall-systems', 'Genest block retaining wall with granite steps.', '05/01/2013'),
(154, 'Patios', 'Sawn and thermaled raised bluestone patio laid in a running bond pattern', '05/01/2013');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `short_title`) VALUES
(45, 'Traditional Masonry', '', 'traditional-masonry'),
(42, 'Wall Systems (Stone or Block)', '', 'wall-systems'),
(41, 'Thin Veneer', '', 'thin-veneer'),
(44, 'Pavers', '', 'pavers'),
(20, 'Outdoor Living Spaces', '', 'outdoor-living-spaces'),
(43, 'Paver Maintenance', '', 'paver-maintenance'),
(22, 'Granite', '', 'granite'),
(23, 'Winter', '', 'winter'),
(49, 'Custom built decks', '', 'decks'),
(50, 'Patios', '', 'Patios');

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--

CREATE TABLE IF NOT EXISTS `sub_services` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `service_id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `sub_services`
--

INSERT INTO `sub_services` (`id`, `service_id`, `title`, `short_title`, `description`) VALUES
(60, 42, 'Pillars', 'pillars', ''),
(59, 42, 'Sitting Walls', 'sitting-walls', ''),
(58, 42, 'Free Standing Walls', 'free-standing-walls', ''),
(57, 42, 'Retaining Walls', 'retaining-walls', ''),
(56, 41, 'Interior/exterior fireplaces', 'Interior-exterior-fireplaces', ''),
(55, 41, 'Entry ways', 'entry-ways', ''),
(54, 41, 'House Foundations', 'house-foundations', ''),
(67, 44, 'Walkways', 'walkways', ''),
(66, 44, 'Permeable Pavers', 'permeable pavers', ''),
(65, 44, 'Patios', 'patios', ''),
(78, 45, 'Historically Accurate Restorations', 'Restoration', ''),
(16, 20, 'Firepits', 'firepits', ''),
(17, 20, 'Fireplaces', 'fireplaces', ''),
(18, 20, 'Benches', 'benches', ''),
(19, 20, 'Outdoor kitchens', 'outdoor-kitchens', ''),
(20, 20, 'Built in grills/barbeque pits', 'built-in-grills-barbeque-pits', ''),
(21, 20, 'Brick Pizza ovens', 'brick-pizza-ovens', ''),
(22, 20, 'Pergolas', 'pergolas', ''),
(63, 43, 'Joint Sand Stabilization (Prevent weeds and movement)', 'joint-sand-stabilization', ''),
(62, 43, 'Cleaning/Pressure washing', 'cleaning-pressure-washing', ''),
(61, 43, 'Sealing', 'sealing', ''),
(28, 22, 'Steps', 'steps', ''),
(29, 22, 'Landings', '', ''),
(30, 22, 'Mailbox posts', 'mailbox-posts', ''),
(31, 22, 'Cobblestone aprons and driveways', 'cobblestone-aprons-and-driveways', ''),
(32, 23, 'Plowing', 'plowing', ''),
(33, 23, 'Sanding/salting applications', 'sanding-salting-applications', ''),
(34, 23, 'Sidewalk snow removal and de-icing', 'sidewalk-snow-removal-and-de-icing', ''),
(36, 28, 'fsdsf', 'sdsfd', ''),
(72, 45, 'Block Foundations', 'block foundations', ''),
(68, 44, 'Driveways', 'driveways', ''),
(69, 44, 'Pool Decks', 'pool-decks', ''),
(70, 45, 'Chimneys', 'chimneys', ''),
(71, 45, 'Inside Fireplaces', 'inside-fireplaces', ''),
(73, 45, 'Repairs and re-pointing', 'repairs-and-re-pointing', ''),
(74, 45, 'Steps', 'steps', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(4, 'cms_demo@gmail.com', 'cms_demo');
