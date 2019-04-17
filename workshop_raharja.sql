-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2019 at 09:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop_raharja`
--

-- --------------------------------------------------------

--
-- Table structure for table `backers`
--

CREATE TABLE `backers` (
  `id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `donation` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backers`
--

INSERT INTO `backers` (`id`, `project_id`, `user_id`, `donation`) VALUES
(1, 4, 1, 10000),
(2, 4, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `goal` int(10) NOT NULL,
  `deadline` int(10) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `goal`, `deadline`, `description`, `image`) VALUES
(4, 2, 'The Magic Box - a picture book about screen addiction', 1000000, 48, 'Written for the millions of children growing up in the digital world. Let\'s educate them about screens - sooner rather than later.\r\nThe Magic BoxÂ is a picture book about screen addiction, written for the millions of children entering our digital world. Let\'s help them understand and cope with screens better.Â \r\n\r\nPledge Â£25 to receive your own early bird copy by Christmas!\r\n-the story-\r\nMeet Ollie. Ollie\'s an adorable orangutan. He likes to have fun in the rainforest with his friends.Â \r\nOne day, his life is turned upside down. He gets a magic box.\r\nHe starts to spend a lot of time on the magic box. So much, in fact, that he loses interest in his friends altogether.Â Â Â Â \r\nBut his clever, creative buddies don\'t sit idly by. They hatch a plan to get Ollie back - by turning the tables on him!', '1555364991452.jpg'),
(5, 2, 'CLIPâš¡Portable e-motor to Transform any bike into an e-bike', 15000000, 72, 'Attach CLIP to bike to ride effortlessly. Detach, after parking to recharge CLIP on your desk.\r\n\r\nWe designed CLIP to reduce your effort when you\'re riding your bike. \r\nBy easily attaching it to your bike, any bike, CLIP will provide that extra push when you face an uphill climb or that last stretch of a long commute.\r\nIt\'s light enough to toss in with everything else in your backpack and compatible with both shared bikes and your personal bike. \r\n\r\nFinally, when you arrive, you\'ll be able to simply unclip it from your bike, carry it with you, and recharge it fast on your desk for the ride back home. \r\n\r\nBiking to work every morning is one of the best things you can do for yourself and the environment. \r\n\r\nWhat holds so many of us back is that no one wants to show up at their 10am meeting worked up in a sweat. Brief moments of extreme effort discourage committed bikers and foil the best intentions.\r\nCLIP is designed to solve the \"brief moments of extreme effort\" problem so you can choose biking as your commute of choice every-time!', '1555365031451.jpg'),
(6, 2, 'Torque American - YouTube channel about USA classic cars.', 25000000, 72, 'I want help to finance a filming trip to Texas to make GREAT content that will appear on my YouTube channel \'Torque American\"\r\n\r\nThe story of Torque American... and this initiative\r\n\r\nIf you\'ve seen our Kickstarter video you will know that I love American Classic Cars and much of what I\'m about to impart to you here. I started the YouTube channel, Torque American after I got made redundant from my TV production job and I drunkenly purchased my dream car, a 1970 Dodge Charger, on EBay in 2016.  \r\n\r\nI confess, I wanted to be kind to myself after suffering the loss of a job I really loved with people I adored. (Well 90% of the people I used to work with, anyway).  The car was at a good price and after giving it some thought, I originally wanted to film and edit a \"sizzle\" reel to entice the big platforms like Amazon, Netflix and the Discovery Network to commission me to produce a series of entertaining factual documentaries about how I purchased the vehicle and how it was being restored to it\'s former glory in the UK.\r\n\r\nI thought the \"USP\" on the series might be the fact that it would be British people restoring an American Classic and that we could broaden the concept away from just my story and show how the Swedish actually run the biggest USA Classic car show in the world because they\'re crazy about American vehicles... How there\'s lots of USA cars in Germany... Etc.\r\n\r\nBut I couldn\'t get much interest. So rather than walk away, I thought, as I had now gone freelance and I had some time between work gigs, I could do it all myself and put the series on YouTube. Unfortunately, I need more financing to make the series popular on YouTube and filming in Texas with some contacts I have through a friend seems to be a fantastic way to get more people interested in the channel, as I have found that half my audience is watching from America, anyway.\r\n\r\nIf you like classic cars, if you appreciate history or even if you just like good entertainment, this is the Kickstarter project for you. \r\n\r\nRisks and challenges\r\nAs Karl specified in the Kickstarter video, we are making a profit on the items we are offering so we can finance filming in Texas (complete with at least one USA cameraman, drone hire, possible jib hire etc).\r\n\r\nThe T shirts and fridge magnets will be ordered and made when we know how many backers need them. We do not anticipate any major problems doing this but if there are issues, November 2019 as a delivery date will give us plenty of time to deal with them. We very much hope to get you your item/s well before November 2019.', '15553650602321.jpg'),
(7, 2, 'Johnathan Miller\'s New \"Experimental\" Album!', 15000000, 48, 'A full length music album by Johnathan Miller with diverse styles, influences and genres for a full sonic(ally) beautiful experience.\r\n\r\nHi everyone! \r\n\r\nIâ€™ve got great news! Iâ€™m making a BRAND NEW ALBUM!!\r\n\r\nIt will be the first studio album since 2015! Wow! \r\n\r\nBut in order to get this album to you, Iâ€™m gonna need YOUR help! \r\n\r\nI cannot do half of the things I am incredibly blessed to do without the support of my dear family, friends and die hard fans! \r\n\r\nPlease help and support my new album by making a donation to my Kickstarter fundraiser. I believe in this album, and I believe in the people I want to make it available to. \r\n\r\nHelp me breathe life into it! \r\n\r\n-Love ya much\r\n\r\n-JM. \r\n\r\nRisks and challenges\r\nThe risk and challenges of anyone making a full length album are always high. Incredibly enough, I believe that just like the many great musical works of our time that exists in the world right now, someone took a leap of faith to back that work to make it happen. This album is an embodiment of what I\'ve been wanting to give to the supporters of my music for so long. It\'s a refresher! In order to make this album happen I have to hire the people to produce it, create and help market it effectively.\r\n\r\nWith this budget (or more) we will be able to do some incredible things. If there\'s something I\'ve learned over the past years as an independent artist is doing as much as I can on a budget. But releasing music and content is not cheap at all! But I have always done things on a budget and got creative with it. \r\nI\'ll be able to - \r\nâ€¢	Pay For Studio Time \r\nâ€¢	Pay For Mixing and Mastering of each song (Approx $1.2K for mixing/mastering of each song) \r\nâ€¢	Single / Album Artwork \r\nâ€¢	Pay For Submissions \r\nâ€¢	Promote / Online Marketing and Ads for the songs \r\nâ€¢	New Merch Made (T Shirts / CD\'s printed / Posters Printed) \r\nâ€¢	Travel for promotion \r\nâ€¢	Music Videos done for one or more of the songs (Separate funding may be needed for these) \r\nâ€¢	Music Licenses \r\nMusic Videos are very important in promoting new songs. But quality Music Videos are definitely on the more expensive side. Here\'s a breakdown of what goes into funding a Music Video Specifically - \r\nâ€¢	Music Director \r\nâ€¢	Videographer \r\nâ€¢	Camera Equipment \r\nâ€¢	Lighting Equipment \r\nâ€¢	Location Permits \r\nâ€¢	Post Production/Editing \r\nâ€¢	Online Marketing \r\nAs an independent artist, these expenses would be impossible for me to cover without your help. Join me in this journey to create something exciting and inspiring. Together we can do this!', '15553650944641.jpg'),
(8, 2, 'ZenART VR - The next best thing after teleportation', 120000000, 280, 'A unique virtual-reality platform for travel & exploring with unprecedented visual fidelity on the HTC Vive, Oculus Rift, PSVR and more\r\n\r\nZenART VR is a unique virtual-reality platform for travel & exploration on the HTC Vive, Oculus Rift and PlayStation VR.\r\n\r\nItâ€™s time to take the next step towards immersive virtual reality. ZenART VR allows you to explore world landmarks and mythical places in VR with unprecedented graphical fidelity.\r\nWe are proud to offer some of the most realistic graphics and physics simulation on VR platforms. We achieve this by using a method called Photogrammetry. Basically, it works like this:\r\n\r\nFirst, we go to a real-world location with remarkable architecture, nature and history. We use state-of-the-art camera equipment and drones to 3D scan the entire thing and take it to the studio.\r\n\r\nSecond, we re-create the terrain within the Unreal engine and our talented artists polish every single texture by hand. We use our own custom shaders to simulate the materials as closely as possible. Realism is always our main goal.\r\n\r\nThen, we optimize the project. Photogrammetry for VR is an extremely data-heavy process, but we need to make it run smoothly on all VR-ready devices. Thatâ€™s why we use sophisticated optimization processes and take the frame rate very seriously.\r\n\r\nFinally, we add a little bit of Hollywood-style flare to the location to make your journey exciting! We create storylines, quests, interactable objects and a personal virtual guide to show you around. You donâ€™t just walk about â€“ there are characters to meet, history to re-live and secrets to unearth!', '15553651253941.jpg'),
(9, 2, 'Quickstarter: Wizardry Treats - Chocolate Frogs', 13000000, 72, 'The Cat SÃ¬th introduces one of all time favourite wizardry treats - chocolate frogs. Selection of dark, milk and white chocolate.\r\n\r\nHello everyone,\r\n\r\nBehind the brand name The Cat Sith sits a girl with an ambitious dream - to open a guest house with its main focus on the environment, sustainability and with magic inspired dÃ©cor and a menu which would be located in Scotland, the UK. \r\n\r\nWhile I am working towards this big dream, I would love to test myself by doing a much smaller Kickstarter campaign and share a little bit of my passion for food through inspiration of fantasy books. This time, it\'s chocolate frogs from Harry Potter world. \r\nI\'m introducing one of all time favourite wizardry treats - chocolate frogs. The Wizardry Box will contain 8 frogs. Two in white, three in milk and three in dark chocolate. Each frog weights approximately 25 grams.  \r\n\r\nINGREDIENTS:  Sugar, cocoa butter, milk, cocoa mass, emulsifier: soy lecithin (to create that smooth texture), vanilla flavouring.  \r\n\r\nALLERGY ADVICE: Please note that everything is prepared in our domestic, home kitchen which may contain traces of any of the following: Eggs, Fish, Lupin, Milk, Mustard, Peanuts, Sesame, Soya, Tree Nuts, Cereals containing gluten, Celery and celeriac, Sulphur Dioxide, (preservative found in dried fruit), Crustaceans (i.e. prawns, crab, lobster, crayfish), Molluscs (i.e: clams, snails, muscles). ', '15553651521077.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'arbiyanto', 'arbiyantowijaya17@gmail.com', '$2y$10$MrP5QNaOz9kkb/sOAr8T.OlOkuV2J/qxiUL4yIDtgG48Iwaa.dLRO'),
(2, 'myuser', 'myuser@gmail.com', '$2y$10$MICF9R9JL0hJ3HIu2F5uKevaR5a0ukrdQHAinvXJ3SqVtCIdGw4Ha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backers`
--
ALTER TABLE `backers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backers`
--
ALTER TABLE `backers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
