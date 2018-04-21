-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 02:08 AM
-- Server version: 5.7.20-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `email` varchar(50) NOT NULL,
  `id_number` int(8) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `user_image` text NOT NULL,
  `username` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`email`, `id_number`, `first_name`, `last_name`, `password`, `user_image`, `username`) VALUES
('a@mail.com', 0, 'Jane', 'Doe', '1234', 'IMG_0014.JPG', 'a_username'),
('asd@gmail.com', 88832, 'Liz', 'asd', 'Idkbro123', 'totoro.png', 'Liz');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `streetAddr` int(150) NOT NULL,
  `zip` int(6) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(16) NOT NULL,
  `userId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorNum` decimal(2,0) NOT NULL,
  `authorLast` char(12) DEFAULT NULL,
  `authorFirst` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorNum`, `authorLast`, `authorFirst`) VALUES
('1', 'Morrison', 'Toni'),
('2', 'Solotaroff', 'Paul'),
('3', 'Vintage', 'Vernor'),
('4', 'Francis', 'Dick'),
('5', 'Straub', 'Peter'),
('6', 'King', 'Stephen'),
('7', 'Pratt', 'Philip'),
('8', 'Chase', 'Truddi'),
('9', 'Collins', 'Bradley'),
('10', 'Heller', 'Joseph'),
('11', 'Wills', 'Gary'),
('12', 'Hofstadter', 'Douglas R.'),
('13', 'Lee', 'Harper'),
('14', 'Ambrose', 'Stephen E.'),
('15', 'Rowling', 'J.K.'),
('16', 'Salinger', 'J.D.'),
('17', 'Heaney', 'Seamus'),
('18', 'Camus', 'Albert'),
('19', 'Collins, Jr.', 'Bradley'),
('20', 'Steinbeck', 'John'),
('21', 'Castelman', 'Riva'),
('22', 'Owen', 'Barbara'),
('23', 'O\'Rourke', 'Randy'),
('24', 'Kidder', 'Tracy'),
('25', 'Schleining', 'Lon');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `cardNum` varchar(16) NOT NULL,
  `expMo` int(2) NOT NULL,
  `expYr` int(4) NOT NULL,
  `cardHolderName` varchar(120) NOT NULL,
  `userId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(5, '::1', 1),
(6, '::1', 1),
(9, '::1', 1),
(8, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `book_id` int(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `comment_text` text,
  `rating` int(11) DEFAULT NULL,
  `Anonymous` tinyint(1) NOT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`book_id`, `user_id`, `comment_text`, `rating`, `Anonymous`, `com_id`) VALUES
(5, 0, 'This book is amazing. I love it! 5 Stars!!', 5, 1, 13),
(5, 0, 'Hello', 4, 1, 14),
(5, 0, 'This book', 4, 0, 15),
(5, 0, ';;', 0, 0, 16),
(5, 0, 'This book wasnt that great', 0, 0, 17),
(5, 0, 'Awesome book', 2, 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `gen_id` int(100) NOT NULL,
  `gen_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`gen_id`, `gen_type`) VALUES
(1, 'SCI'),
(2, 'FIC');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_author` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` double NOT NULL,
  `product_bio` text NOT NULL,
  `product_genre` varchar(255) NOT NULL,
  `product_pub` text NOT NULL,
  `product_release` date NOT NULL,
  `ratings` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_image`, `product_author`, `product_desc`, `product_price`, `product_bio`, `product_genre`, `product_pub`, `product_release`, `ratings`) VALUES
(1, 'A Game of Thrones', 'AGameOfThrones.jpg', 'George R. R. Martin', 'At the beginning of the story, Lord Eddard \"Ned\" Stark executes a deserter from the Night\'s Watch, who has betrayed his vows and fled from the Wall. On the way back, his children adopt six direwolf pups, the animal of his sigil. There are three male and two female direwolf pups, as well as an albino runt, which aligns with his three trueborn sons, two trueborn daughters, and one bastard son. That night, Ned receives word of the death of his mentor, Lord Jon Arryn, the principal advisor to Ned\'s childhood friend, King Robert Baratheon. During his own visit to Ned\'s castle of Winterfell, Robert recruits Ned to replace Arryn as the King\'s Hand. Ned is reluctant, but agrees to go when he learns that Arryn\'s widow Lysa believes Queen Cersei Lannister and her family poisoned Arryn. Shortly thereafter, Ned\'s son Bran inadvertently discovers Cersei having sex with her twin brother Jaime Lannister, who throws Bran from the tower to conceal their affair.', 10.99, '\r\nGeorge R.R. Martin sold his first story in 1971 and has been writing professionally ever since. He has written fantasy, horror, and science fiction, and for his sins spent ten years in Hollywood as a writer/producer, working on Twilight Zone, Beauty and the Beast, and various feature films and television pilots that were never made. In the mid 90s he returned to prose, his first love, and began work on his epic fantasy series A Song of Ice and Fire. He has been in the Seven Kingdoms ever since. Whenever he\'s allowed to leave, he returns to Santa Fe, New Mexico, where he lives with the lovely Parris, a big white dog called Mischa, and two cats named Augustus and Caligula who think they run the place.', 'Fantasy', 'Bantam Spectra', '1996-09-01', '4'),
(2, 'The Chronicles of Narnia', 'narnia.jpg', 'C. S. Lewis', 'Epic battles between good and evil, fantastic creatures, betrayals, heroic deeds, and friendships won and lost all come together in this unforgettable world, which has been enchanting readers of all ages for over sixty years.', 6.99, 'Clive Staples Lewis (1898-1963) was one of the intellectual giants of the twentieth century and arguably one of the most influential writers of his day. He was a Fellow and Tutor in English Literature at Oxford University until 1954, when he was unanimously elected to the Chair of Medieval and Renaissance Literature at Cambridge University, a position he held until his retirement. He wrote more than thirty books, allowing him to reach a vast audience, and his works continue to attract thousands of new readers every year. His most distinguished and popular accomplishments include Out of the Silent Planet, The Great Divorce, The Screwtape Letters, and the universally acknowledged classics The Chronicles of Narnia. To date, the Narnia books have sold over 100 million copies and have been transformed into three major motion pictures.\r\n\r\nClive Staples Lewis (1898-1963) fue uno de los intelectuales más impo', 'Fantasy', 'HarperCollins', '1950-10-01', '4'),
(3, 'Harry Potter and the Deathly Hallows', 'Hallows.jpg', 'J. K. Rowling', 'Overview\r\nHarry Potter and the Deathly Hallows (Harry Potter Series #7) by J. K. Rowling\r\nIt all comes down to this - a final faceoff between good and evil. You plan to pull out all the stops, but every time you solve one mystery, three more evolve. Do you stay the course you started, despite your lack of progress? Do you detour and follow a new lead that may not help? Do you listen to your instincts, or your friends?\r\n\r\nLord Voldemort is preparing for battle and so must Harry. With Ron and Hermione at his side, he\'s trying to hunt down Voldemort\'s Horcruxes, escape danger at every turn, and find a way to defeat evil once and for all. How does it all end? Find out in Harry Potter and the Deathly Hallows.', 11.98, 'J.K. Rowling is the author of the record-breaking, multi-award-winning Harry Potter novels. Loved by fans around the world, the series has sold over 450 million copies, been translated into 80 languages, and made into eight blockbuster films. She has written three companion volumes in aid of charity: Quidditch Through the Ages and Fantastic Beasts and Where to Find Them (in aid of Comic Relief and Lumos), and The Tales of Beedle the Bard (in aid of Lumos), as well as a screenplay inspired by Fantastic Beasts and Where to Find Them, which marked the start of a five-film series to be written by the author. She has also collaborated on a stage play, Harry Potter and the Cursed Child Parts One and Two, which opened in London’s West End in the summer of 2016.', 'Fantasy', 'Bloomsbury', '2007-07-01', '4'),
(4, 'Harry Potter and the Philosopher\'s Stone', 'philosopher.jpg', 'J. K. Rowling', 'In case you don\'t remember, Harry Potter is an eleven year old wizard. Long ago, Harry\'s parents were killed in a battle with the evil Lord Voldemort. When we first meet Harry, he is living miserably with his repulsive and non-magical (or Muggle) Aunt Petunia and Uncle Vernon and their even more revolting son Dudley. Following a bizarre but hilarious chain of events, Harry finds himself at Hogwarts School of Witchcraft and Wizardry, with an outrageous cast of characters, including super-smart Hermione, vile Draco Malfoy, sinister Professor Snape and the wise Headmaster Albus Dumbledore. Adventures galore ensue...', 25.04, 'J.K. Rowling is the author of the record-breaking, multi-award-winning Harry Potter novels. Loved by fans around the world, the series has sold over 450 million copies, been translated into 80 languages, and made into eight blockbuster films. She has written three companion volumes in aid of charity: Quidditch Through the Ages and Fantastic Beasts and Where to Find Them (in aid of Comic Relief and Lumos), and The Tales of Beedle the Bard (in aid of Lumos), as well as a screenplay inspired by Fantastic Beasts and Where to Find Them, which marked the start of a five-film series to be written by the author. She has also collaborated on a stage play, Harry Potter and the Cursed Child Parts One and Two, which opened in London’s West End in the summer of 2016.', 'Fantasy', 'Bloomsbury', '1997-09-01', '4'),
(5, 'To Kill a Mockingbird', 'mockingbird.jpg', 'Harper Lee', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.', 6.61, 'Nelle Harper Lee (April 28, 1926 â€“ February 19, 2016), better known by her pen name Harper Lee, was an American novelist widely known for To Kill a Mockingbird, published in 1960. Immediately successful, it won the 1961 Pulitzer Prize and has become a classic of modern American literature.', 'Fiction', 'Warner Books, Inc.', '1960-07-11', '4'),
(6, 'Pride and Prejudice', 'pride.jpg', 'Jane Austen', 'â€œIt is a truth universally acknowledged, that a single man in possession of a good fortune must be in want of a wife.â€ So begins Pride and Prejudice, Jane Austenâ€™s witty comedy of mannersâ€”one of the most popular novels of all timeâ€”that features splendidly civilized sparring between the proud Mr. Darcy and the prejudiced Elizabeth Bennet', 6.99, 'Jane Austen (16 December 1775 â€“ 18 July 1817) was an English novelist known primarily for her six major novels, which interpret, critique and comment upon the British landed gentry at the end of the 18th century. ', 'Fiction', 'Thomas Egerton', '1813-01-28', '0'),
(7, 'Hamlet', 'hamlet.jpg', 'William Shakespeare', 'The protagonist of Hamlet is Prince Hamlet of Denmark, son of the recently deceased King Hamlet, and nephew of King Claudius, his father\'s brother and successor. Claudius hastily married King Hamlet\'s widow, Gertrude, Hamlet\'s mother, and took the throne for himself. Denmark has a long-standing feud with neighbouring Norway, in which King Hamlet slew King Fortinbras of Norway in a battle some years ago. Although Denmark defeated Norway, and the Norwegian throne fell to King Fortinbras\'s infirm brother, Denmark fears that an invasion led by the dead Norwegian king\'s son, Prince Fortinbras, is imminent.', 7.99, 'Widely esteemed as the greatest writer in the English language, William Shakespeare (1564-1616) was an actor and theatrical producer in addition to writing plays and sonnets. Dubbed \"The Bard of Avon,\" Shakespeare oversaw the building of the Globe Theatre in London, where a number of his plays were staged, the best-known of which include Romeo and Juliet, Hamlet, and Macbeth. The First Folio, a printed book of 36 of his comedies, tragedies, and history plays, was published in 1623.', 'Drama', 'Yale University Press', '1603-01-01', '4'),
(8, 'The Great Gatsby', 'greatGatsby.jpg', 'Francis Fitzgerald', 'Jay Gatsby is the man who has everything. But one thing will always be out of his reach. Everybody who is anybody is seen at his glittering parties. Day and night his Long Island mansion buzzes with bright young things drinking, dancing, and debating his mysterious character. ', 3.99, 'Francis Scott Key Fitzgerald was an American writer of novels and short stories, whose works have been seen as evocative of the Jazz Age, a term he himself allegedly coined. He is regarded as one of the greatest twentieth century writers.', 'Fiction', 'Charles Scribners Sons', '1925-04-10', '0'),
(9, 'The Book Thief', 'bookthief.jpg', 'Markus Zusak', 'Itâ€™s just a small story really, about among other things: a girl, some words, an accordionist, some fanatical Germans, a Jewish fist-fighter, and quite a lot of thievery ...', 5.29, 'Markus Zusak was born in 1975 and is the author of five books, including the international bestseller, The Book Thief , which is translated into more than forty languages.', 'Fiction', '', '0000-00-00', '0'),
(10, 'Sense and Sensibility', 'SenseandSensibility.jpg', 'Jane Austen', 'Henry Dashwood, his second wife, and their three daughters live for many years with Henry\'s wealthy bachelor uncle. That uncle decides, in late life, to will the use and income only of his property first to Henry, then to Henry\'s first son John Dashwood (by his first marriage), so that the property should pass intact to John\'s three-year-old son Harry. ', 6.99, 'It is a truth universally acknowledged, that a single man in possession of a good fortune must be in want of a wife.â€ So begins Pride and Prejudice, Jane Austenâ€™s witty comedy of mannersâ€”one of the most popular novels of all timeâ€”that features splendidly civilized sparring between the proud Mr. Darcy and the prejudiced Elizabeth Bennet', 'Fiction', 'Thomas Egerton', '1811-01-28', '0'),
(11, '1984', '1984.jpg', 'George Orwell', 'Winston Smith is a man who lives in Airstrip One, the remnants of Britain broken down by war, civil conflict, and revolution in the year 1984. A member of the middle class Outer Party, Winston lives in a one-room London flat in the Victory Mansions. Smith lives on rations consisting of black bread, synthetic meals, and \"Victory\"-branded gin. Telescreens in every building, accompanied by microphones and cameras, allow the Thought Police to identify anyone who might compromise the Party\'s regime, and threat of surveillance forces citizens to display an obligatory optimism regarding the country, who are afraid for being arrested for thoughtcrime, the infraction of expressing thoughts contradictory to the Party\'s ideology. ', 9.99, 'ERIC ARTHUR BLAIR (1903–1950), better known by his pen name George Orwell, was an English author and journalist whose best-known works include the dystopian novel 1984 and the satirical novella Animal Farm. He is consistently ranked among the best English writers of the 20th century, and his writing has had a huge, lasting influence on contemporary culture. Several of his coined words have since entered the English language, and the word \"Orwellian\" is now used to describe totalitarian or authoritarian social practices.', 'Sci-fi', 'Secker & Warburg', '1949-06-08', '0'),
(12, 'A Wrinkle in Time', 'wrinkleintime.jpg', 'Madeleine L\'Engle', 'Thirteen-year-old Meg Murry\'s classmates and teachers see her as a troublesome and stubborn student. Her family knows that she is emotionally immature but also sees her capable of doing great things. The family includes her scientist mother Katherine, her missing scientist father Alexander, the twins Sandy and Dennys, and her five-year-old brother Charles Wallace Murry, a child genius who can sometimes read Meg\'s mind.', 6.99, 'Madeleine L\'Engle Camp was an American writer who wrote young adult fiction, including A Wrinkle in Time and its sequels: A Wind in the Door, A Swiftly Tilting Planet, Many Waters and An Acceptable Time. Her works reflect both her Christian faith and her strong interest in science. ', 'Sci-fi', 'Farrar, Straus & Giroux', '1962-01-01', '0'),
(13, 'The Hobbit', 'hobbit.jpg', 'J. R. R. Tolkien', 'A reluctant Hobbit, Bilbo Baggins, sets out to the Lonely Mountain with a spirited group of dwarves to reclaim their mountain home, and the gold within it from the dragon Smaug.\r\n', 9.5, 'J.R.R. Tolkien (1892-1973) is the creator of Middle-earth and author of such classic and extraordinary works of fiction as The Hobbit , The Lord of the Rings , and The Silmarillion . His books have been translated into more than fifty languages and have sold many millions of copies worldwide.', 'Fantasy', 'George Allen & Unwin', '1937-09-21', '0'),
(14, 'The Catcher in the Rye', 'catcher.jpg', 'J. D. Salinger', 'A classic novel originally published for adults, it has since become popular with adolescent readers for its themes of teenage angst and alienation.', 9.48, 'His cloistered lifestyle and limited output have not prevented readers and writers from lionizing J. D. Salinger. With one-of-a-kind stories and the classic book The Catcher in the Rye, Salinger captured with wit and poignancy a growing malaise in post-war America. The 1951 novel The Catcher in the Rye, his best-known book, was an immediate success and remains popular and controversial. Salinger followed Catcher with Nine Stories, Franny and Zooey, and Raise High the Roof Beam, Carpenters and Seymour: An Introduction.', 'Fiction', 'Little, Brown and Company', '1951-07-15', '0'),
(15, 'Fahrenheit 451', '451F.jpg', 'Ray Bradbury', 'Guy Montag is a fireman. In his world, where television rules and literature is on the brink of extinction, firemen start fires rather than put them out. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden.\r\n\r\nMontag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But then he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television.\r\n\r\nWhen Mildred attempts suicide and Clarisse suddenly disappears, Montag begins to question everything he has ever known. He starts hiding books in his home, and when his pilfering is discovered, the fireman has to run for his life.', 10.07, 'Ray Bradbury (1920–2012) was the author of more than three dozen books, including Fahrenheit 451, The Martian Chronicles, The Illustrated Man, and Something Wicked This Way Comes, as well as hundreds of short stories. He wrote for the theater, cinema, and TV, including the screenplay for John Huston’s Moby Dick and the Emmy Award–winning teleplay The Halloween Tree, and adapted for television sixty-five of his stories for The Ray Bradbury Theater. He was the recipient of the 2000 National Book Foundation’s Medal for Distinguished Contribution to American Letters, the 2007 Pulitzer Prize Special Citation, and numerous other honors.', 'Fiction', 'Simon & Schuster', '2012-01-02', '0'),
(16, 'The Virtue of Selfishness', 'selfishness.jpg', 'Ayn Rand', 'A collection of essays that sets forth the moral principles of Objectivism, Ayn Rand\'s controversial, groundbreaking philosophy.\r\n\r\nSince their initial publication, Rand\'s fictional works—Anthem, The Fountainhead, and Atlas Shrugged—have had a major impact on the intellectual scene. The underlying theme of her famous novels is her philosophy, a new morality—the ethics of rational self-interest—that offers a robust challenge to altruist-collectivist thought.\r\n\r\nKnown as Objectivism, her divisive philosophy holds human life—the life proper to a rational being—as the standard of moral values and regards altruism as incompatible with man\'s nature. In this series of essays, Rand asks why man ', 7.99, 'Born February 2, 1905, Ayn Rand published her first novel, We the Living, in 1936. Anthem followed in 1938. It was with the publication of The Fountainhead (1943) and Atlas Shrugged (1957) that she achieved her spectacular success. Rand’s unique philosophy, Objectivism, has gained a worldwide audience. The fundamentals of her philosophy are put forth in three nonfiction books, Introduction to Objectivist Epistemology, The Virtues of Selfishness, and Capitalism: The Unknown Ideal. They are all available in Signet editions, as is the magnificent statement of her artistic credo, The Romantic Manifesto.', 'Fiction', 'New American Library', '1964-01-01', '0'),
(17, 'For Whom the Bell Tolls', 'belltolls.jpg', 'Ernest Hemingway', 'Jordan is an American who had lived in Spain during the pre-war period, and fights as an irregular soldier for the Republic against Francisco Franco\'s fascist forces. An experienced dynamiter, he is ordered by a Soviet general to travel behind enemy lines and destroy a bridge with the aid of a band of local anti-fascist guerrillas, in order to prevent enemy troops from responding to an upcoming offensive. On his mission, Jordan meets the rebel Anselmo who brings him to the hidden guerrilla camp and initially acts as an intermediary between Jordan and the other guerrilla fighters.\r\n\r\nIn the camp, Jordan encounters María, a young Spanish woman whose life had been shattered by her parents\' execution and her rape at the hands of the Falangists (part of the fascist coalition) at the outbreak of the war.', 12.34, 'Ernest Hemingway did more to influence the style of English prose than any other writer of his time. Publication of The Sun Also Rises and A Farewell to Arms immediately established him as one of the greatest literary lights of the 20th century. His classic novella The Old Man and the Sea won the Pulitzer Prize in 1953. Hemingway was awarded the Nobel Prize for Literature in 1954. He died in 1961.', 'Drama', 'Charles Scribner\'s Sons', '1940-10-02', '0'),
(18, 'The Picture of Dorian Gray', 'doriangray.jpg', 'Oscar Wilde', 'The Picture of Dorian Gray begins on a beautiful summer day in Victorian era England, where Lord Henry Wotton, an opinionated man, is observing the sensitive artist Basil Hallward painting the portrait of Dorian Gray, a handsome young man who is Basil\'s ultimate muse. While sitting for the painting, Dorian listens to Lord Henry espousing his hedonistic world view, and begins to think that beauty is the only aspect of life worth pursuing. This prompts Dorian to wish that the painted image of himself would age instead of himself.\r\n\r\nUnder the hedonistic influence of Lord Henry, Dorian fully explores his sensuality. He discovers the actress Sibyl Vane, who performs Shakespeare plays in a dingy, working-class theatre. Dorian approaches and courts her, and soon proposes marriage. The enamoured Sibyl calls him \"Prince Charming\", and swoons with the happiness of being loved, but her protective brother, James, warns that if \"Prince Charming\" harms her, he will murder him.', 7.95, 'The ever-quotable Oscar Wilde (1854-1900) was an Irish playwright, novelist, essayist, and poet who delighted Victorian England with his legendary wit. He found critical and popular success with his scintillating plays, chiefly The Importance of Being Earnest, while his only novel, The Picture of Dorian Gray, scandalized readers. Imprisoned for two years for homosexual behavior, Wilde moved to France after his release, where he died destitute.', 'Fiction', '1890 Lippincott\'s Monthly Magazine', '1890-01-01', '0'),
(19, 'Dante\'s Inferno', 'inferno.jpg', 'Dante Alighieri', 'The Inferno tells the journey of Dante through Hell, guided by the ancient Roman poet Virgil. In the poem, Hell is depicted as nine concentric circles of torment located within the Earth; it is the \"realm ... of those who have rejected spiritual values by yielding to bestial appetites or violence, or by perverting their human intellect to fraud or malice against their fellowmen\".[1] As an allegory, the Divine Comedy represents the journey of the soul toward God, with the Inferno describing the recognition and rejection of sin.', 8.57, 'Dante Alighieri was a major Italian poet of the Late Middle Ages. His Divine Comedy, originally called Comedìa (modern Italian: Commedia) and later christened Divina by Boccaccio, is widely considered the most important poem of the Middle Ages and the greatest literary work in the Italian language.', 'Poetry', 'Gabriele Giolito de\' Ferrari', '1555-01-01', '0'),
(20, 'The Poetry of Emily Dickinson', 'emily.jpg', 'Emily Dickinson', 'The Poetry of Emily Dickinson is a collection of pieces by 19th-century American poet Emily Dickinson, who insisted that her life of isolation gave her an introspective and deep connection with the world. As a result, her work parallels her life—misunderstood in its time, but full of depth and imagination, and covering such universal themes as nature, art, friendship, love, society, mortality, and more. During Dickinson’s lifetime, only seven of her poems were published, but after her death, her prolific writings were discovered and shared. With this volume, readers can dive into the now widely respected poetry of Emily Dickinson.', 9.99, 'Emily Dickinson is one of America’s greatest and most original poets of all time. She took definition as her province and challenged the existing definitions of poetry and the poet’s work. Like writers such as Ralph Waldo Emerson, Henry David Thoreau, and Walt Whitman, she experimented with expression in order to free it from conventional restraints.', 'Poetry', 'Canterbury Classics', '2015-01-01', '0');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `user_id` int(50) NOT NULL,
  `book_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`user_id`, `book_id`) VALUES
(0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `search_id` int(100) NOT NULL,
  `search_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`search_id`, `search_cat`) VALUES
(1, 'Title'),
(2, 'Author'),
(3, 'Price'),
(4, 'Publication'),
(5, 'Release');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`email`,`id_number`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorNum`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD UNIQUE KEY `user_id` (`user_id`,`book_id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`search_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `gen_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `search_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
