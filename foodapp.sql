-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 20 jan. 2023 à 10:18
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `foodapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `aimerecette`
--

CREATE TABLE `aimerecette` (
  `idRecette` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aimerecette`
--

INSERT INTO `aimerecette` (`idRecette`, `idUtilisateur`) VALUES
(43, 18);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(3, 'boissons'),
(4, 'desserts'),
(1, 'entrees'),
(2, 'plats');

-- --------------------------------------------------------

--
-- Structure de la table `diaporamanews`
--

CREATE TABLE `diaporamanews` (
  `idDiapo` int(11) NOT NULL,
  `linkImage` int(11) NOT NULL,
  `imageDiapo` varchar(500) NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `diaporamarecette`
--

CREATE TABLE `diaporamarecette` (
  `idDiapo` int(11) NOT NULL,
  `linkImage` int(11) NOT NULL,
  `imageDiapo` varchar(500) NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diaporamarecette`
--

INSERT INTO `diaporamarecette` (`idDiapo`, `linkImage`, `imageDiapo`, `display`) VALUES
(24, 53, 'starbuck.avif', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etapederecette`
--

CREATE TABLE `etapederecette` (
  `idEtape` int(11) NOT NULL,
  `contenuEtape` varchar(1000) NOT NULL,
  `numeroEtape` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etapederecette`
--

INSERT INTO `etapederecette` (`idEtape`, `contenuEtape`, `numeroEtape`, `idRecette`) VALUES
(41, 'Preheat oven to 350 degrees F (175 degrees C).', 1, 37),
(42, 'Mix water, onion, olive oil, balsamic vinegar, Dijon mustard, garlic, black pepper, cayenne pepper, and salt together in a roasting dish. Add chicken; turn until well coated with mixture.', 2, 37),
(43, 'Bake in the preheated oven until an instant-read thermometer inserted into the thickest part of the thigh, near the bone, reads 165 degrees F (74 degrees C), about 1 hour 30 minutes.', 3, 37),
(44, 'Heat 3 tablespoons olive oil in a large pot over medium-high heat. Season mutton chops and chicken drumsticks with salt and pepper; cook in batches with onions in the hot oil until browned, about 2 minutes per side. Transfer to a large plate.', 1, 38),
(45, 'Scrape the bottom of the pot with a wooden spoon to release browned bits. Return mutton chops and chicken to the pot. Pour in enough water to cover; add turmeric, cumin, and coriander. Cover and bring to a boil. Reduce heat to medium; simmer for 20 minutes.', 2, 38),
(46, 'Stir potatoes, turnips, and carrots into the pot. Simmer, covered, until vegetables start to soften, about 10 minutes. Mix in tomato paste and ras el hanout; cook for 10 minutes. Stir in chickpeas, zucchini, and cilantro; continue cooking, covered, until zucchini is tender, about 5 minutes.', 3, 38),
(47, 'Bring 3 cups water to a boil in a saucepan; remove from heat and stir in couscous and butter. Cover saucepan and let stand until water is absorbed completely, 5 to 10 minutes. Fluff couscous with a fork and stir in 1 tablespoon olive oil. Transfer to a serving dish.', 4, 38),
(48, 'Ladle 2 scoops of cooking liquid into a bowl; mix in harissa until smooth.', 5, 38),
(49, 'Scoop vegetables onto a serving plate. Scoop mutton and chicken onto a separate plate. Serve alongside couscous, harissa sauce, and remaining cooking liquid in the pot.', 6, 38),
(50, 'In a saucepan over medium heat, put olive oil.', 1, 39),
(51, 'Add onion, garlic, salt, pepper, Ras al Hanout, paprika, tomato paste and let cook for 5 minutes.', 2, 39),
(52, 'Add grated tomato and chickpeas and let cook for 10 to 15 minutes.', 3, 39),
(53, 'Add boiled water to slightly cover the meat.', 4, 39),
(54, 'Let cook for about 45 minutes or until the meat and chickpeas are cooked.', 5, 39),
(55, 'In meanwhile, tear the sheets of Rougag with hands into small pieces (picture shown above).', 6, 39),
(56, 'Place the pieces of Rougag in the top of a steamer and steam for about 5 minutes.', 7, 39),
(57, 'Chech on the meat sauce and adjust the seasoning. Add salt if needed.', 8, 39),
(58, 'Once the meat and chickpeas are cooked, turn off the heat (the sauce should be reduced and thick).', 9, 39),
(59, 'Place the meat and chickpeas on the Rougag pieces in the serving dish and add the sauce on top.', 10, 39),
(60, 'Serve this dish with the sauce aside.', 11, 39),
(61, 'Serve with harissa.', 12, 39),
(67, 'Place freekeh in a small bowl and cover with cold water. Set aside.', 1, 41),
(68, 'Combine lamb, onion, pepper, paprika, cinnamon, and salt in a pot. Add 1/2 of the cilantro, 1/2 of the mint, celery stalk, and oil; mix well. Simmer over low heat for 15 minutes. Stir in chickpeas, pour in just enough water to cover, and return to a simmer. Stir in zucchini, carrot, and tomato paste.', 2, 41),
(69, 'Set a steamer over the pot and add tomatoes. Cover and steam tomatoes until soft, about 5 minutes. Crush tomatoes using a wooden spoon, so pulp drips into soup. Remove the steamer and discard leftover tomato peels.', 3, 41),
(70, 'Add potato to soup and just enough water to cover. Simmer until potato is soft, about 10 minutes.', 4, 41),
(71, 'Drain freekeh and add to soup. Simmer until soft, about 15 minutes. Remove celery stalk. Sprinkle soup with remaining cilantro and mint before serving.', 5, 41),
(72, 'Brown the onion until soft. Now add the minced meat and stir well', 1, 42),
(73, 'Then add in the spices. Cook over low fire for 10 and when the meat is thoroughly cooked break the eggs over the mixture', 2, 42),
(74, 'Keep stirring so the egg cooks in with the meat. Leave to cool before filling the bourek pastry with it.', 3, 42),
(75, 'Fold the bourek as shown the above picture: Seperate each sheet of diouel. Place about 2 tablespoons of the filling in the lower center of the sheet.', 4, 42),
(76, 'Fold the two o opposite edges of the sheet to get a rectangle. Roll into cigar shape. Egg wash the seam of the bourek.', 5, 42),
(77, 'Fry the bourek in hot oil.', 6, 42),
(78, 'Finely grate Parmesan cheese. Slice baguette. Butter each side of the slices and press into the grated Parmesan. Heat a frying pan over medium heat and toast the Parmesan-crusted baguette until crisp and golden brown on both sides. Cut into large croutons and set aside.', 1, 43),
(79, 'Separate egg, reserving white for another use and transferring yolk to a large bowl. Finely grate garlic clove and the zest of about half of a lemon into the bowl. Squeeze in the juice of half of the lemon. Finely chop anchovies and add to the bowl. Add Dijon mustard and whisk everything to combine. Starting with a very thin stream at first, whisking constantly as you go,', 2, 43),
(80, 'Remove the base of the romaine heads and separate heads into leaves. Toss leaves and croutons in the dressing with your hands. Plate and top with more freshly grated Parmesan and pepper. Enjoy!', 3, 43),
(81, 'Halve cherry tomatoes. Cut carrot and celery into bite-sized pieces. Thinly slice onion and green onion. Cut lemon in thirds. Roughly chop mint and cilantro.', 1, 44),
(82, 'In a large saucepan, bring chickpeas and water to a boil and cook for approx. 5 – 10 min.', 2, 44),
(83, 'Add canned tomatoes, turmeric, cinnamon, and harissa to pan. Juice lemon into pan. Season to taste with salt and pepper.', 3, 44),
(84, 'Using a hand blender, briefly puree soup to thicken it slightly.', 4, 44),
(85, 'Add tomatoes, carrots, green onions, red onions, cilantro, mint, and celery to soup. Season to taste with salt and pepper. Allow to simmer for approx. 3 – 5 min. until the vegetables are firm to the bite. Enjoy with a dollop of homemade crème fraîche or some soy yoghurt as a vegan option!', 5, 44),
(86, 'mix dry ingredients together then make a whole and pour wet ingredients bit by bit in to the flour', 1, 45),
(87, 'Mix until the dough is combined. The dough should not be sticky if is add a little bit more flour. Let dough rest till double the size.', 2, 45),
(88, 'kneed the dough then roll the dough out and cut in to circles.', 3, 45),
(89, 'fry your bacon with black pepper for about 2min', 4, 45),
(90, 'add your tomato base then add your baco, mushroom, and cheddar cheese on to the greased tray', 5, 45),
(91, 'Serve with extra cheese', 6, 45),
(92, 'Juice the orange. Peel and quarter the banana.', 1, 46),
(93, 'Put all ingredients into a blender.', 2, 46),
(94, 'Blend on the highest setting. Enjoy straight away.', 3, 46),
(95, 'Start with frozen fruits. To keep your smoothie chilled and creamy, it’s best to use frozen fruits. You can use store-bought frozen bags, or chop and freeze fresh fruit.', 1, 47),
(96, 'Consider adding healthy fats. Healthy fats will help absorb all those fat-soluble vitamins and nutrients from your fruits and vegetables! All you need is a dollop of almond butter, a drizzle of coconut oil, a slice of avocado or a variety of seeds such as chia seeds or flax seeds.', 2, 47),
(97, 'Blend everything and enjoy your meal!', 3, 47),
(98, 'Cut lime in half, then into quarters. Put sugar and lime pieces in a glass and crush until the juice comes out.', 1, 48),
(99, 'Add rum and mint and stir. Add ice cubes and top with sparkling water. Garnish with more mint.', 2, 48),
(100, 'Sift flour, baking powder, sugar, and salt together in a large bowl. Make a well in the center and add milk, melted butter, and egg; mix until smooth.', 1, 49),
(101, 'Heat a lightly oiled griddle or pan over medium-high heat. Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake; cook until bubbles form and the edges are dry, about 2 to 3 minutes. Flip and cook until browned on the other side. Repeat with remaining batter.', 2, 49),
(102, 'Preheat the oven to 190°C/375°F. Grease and line a 20-cm/8-in cake pan with parchment paper. Roughly chop chocolate. Cut butter into small cubes. Melt chocolate, butter, and five spice in a saucepan, then remove from heat and let cool slightly.', 1, 50),
(103, 'Separate egg whites from egg yolks. Beat the egg whites until stiff peaks form. Then whisk in egg yolks, sugar, vanilla sugar, and cocoa powder into the chocolate butter until just combined. Fold in the egg whites.', 2, 50),
(104, 'Gently pour batter into cake pan and let bake for approx. 25 min.', 3, 50),
(105, 'In the meantime, use a hand mixer to beat heavy cream, ground ginger, and powdered sugar until medium peaks form. Set aside in the fridge.', 4, 50),
(106, 'Allow the cake to cool for approx. 10 min. before removing from the pan. Serve cake with a dollop of ginger whipped cream. Enjoy!', 5, 50),
(107, 'put the butter on heat.', 1, 51),
(108, 'add the honey and mix them very well', 2, 51),
(109, 'add smid and cook for about 10 min , enjoy!', 3, 51),
(110, 'Place all constituents in a blender', 1, 52),
(111, 'In a cup/mug of your choice, place a layer of whipped cream on the bottom. Pour drink on top. Add more whipped cream on top and drizzle chocolate syrup, too!', 2, 52),
(112, 'Enjoy!!!', 3, 52),
(113, 'Separate eggs. Beat egg yolks with some confectioner’s sugar until pale and fluffy. Add Amaretto and mascarpone. Beat until smooth.', 1, 53),
(114, 'Beat egg whites with a pinch of salt until stiff peaks form. Slowly whisk in the remaining confectioner’s sugar. Carefully fold beaten egg whites into mascarpone cream.', 2, 53),
(115, 'Combine slightly cooled espresso and remaining Amaretto in a shallow dish. Quickly dip ladyfingers in espresso mixture and then layer soaked ladyfingers in bottom of the serving dish. Cover with a layer of mascarpone cream and top with a fine layer of grated chocolate.', 3, 53),
(116, 'Repeat layering process until all ingredients are used up. Finish up with a layer of mascarpone cream, finely grated chocolate, and a dusting of unsweetened cocoa powder. Refrigerate for approx. at least 3 hrs. before serving. Enjoy!', 4, 53),
(117, 'Finely chop red onion. Crush garlic cloves with the back of a knife. Pluck basil leaves.', 1, 54),
(118, 'Heat a generous amount of olive oil in a pan over medium low. Add onion and crushed garlic cloves and sauté until the onions are soft and translucent. Add tomato paste and sauté on low for approx. 10 min.', 2, 54),
(119, 'In the meantime, cook pasta according to package instructions. Drain, reserving about a cup (150 grams) of pasta water.', 3, 54),
(120, 'Whisk together the crème fraîche with half a cup of pasta water to loosen it up. Add to the frying pan over low heat and stir together, adding extra pasta water if needed until the sauce has a glossy consistency. Season with salt and pepper to taste. Before serving, add a handful of grated Parmesan to the sauce, then combine with the pasta and serve with plenty of basil leaves and more grated Parmesan on top. Enjoy!', 4, 54);

-- --------------------------------------------------------

--
-- Structure de la table `fete`
--

CREATE TABLE `fete` (
  `idFete` int(100) NOT NULL,
  `nomFette` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `imagenews`
--

CREATE TABLE `imagenews` (
  `idImage` int(11) NOT NULL,
  `linkImage` varchar(500) NOT NULL,
  `diapo` int(11) NOT NULL,
  `idNews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `imagenews`
--

INSERT INTO `imagenews` (`idImage`, `linkImage`, `diapo`, `idNews`) VALUES
(8, 'starbucks.avif', 0, 38),
(16, 'pouletroti.avif', 0, 48);

-- --------------------------------------------------------

--
-- Structure de la table `imagerecette`
--

CREATE TABLE `imagerecette` (
  `idImage` int(11) NOT NULL,
  `linkImage` varchar(500) NOT NULL,
  `diapo` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `imagerecette`
--

INSERT INTO `imagerecette` (`idImage`, `linkImage`, `diapo`, `idRecette`) VALUES
(25, 'pouletroti.avif', 0, 37),
(26, 'couscouss.avif', 0, 38),
(27, 'check.jpg', 0, 39),
(28, 'chorba.webp', 0, 41),
(29, 'bourek.jfif', 0, 42),
(30, 'salad.avif', 0, 43),
(31, 'soup.avif', 0, 44),
(32, 'minipizza.avif', 0, 45),
(33, 'banana.avif', 0, 46),
(34, 'straw.avif', 0, 47),
(35, 'mock.jfif', 0, 48),
(36, 'pancake.avif', 0, 49),
(37, 'choco.avif', 0, 50),
(38, 'tamina.jfif', 0, 51),
(39, 'cappucino.avif', 0, 52),
(40, 'tiramissu.avif', 0, 53),
(41, 'spaggeti.avif', 0, 54);

-- --------------------------------------------------------

--
-- Structure de la table `infonutrition`
--

CREATE TABLE `infonutrition` (
  `idNutrition` int(11) NOT NULL,
  `nomNutrition` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `infonutrition`
--

INSERT INTO `infonutrition` (`idNutrition`, `nomNutrition`) VALUES
(10, 'Carbohydrate'),
(8, 'cholesterol'),
(6, 'fat'),
(4, 'fibre alimentaire'),
(2, 'glucide'),
(3, 'lipide'),
(9, 'potassium'),
(1, 'proteine'),
(7, 'sel'),
(5, 'sodium');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `nomIngredient` varchar(100) NOT NULL,
  `caloriesIngredient` int(11) NOT NULL,
  `healthy` int(11) NOT NULL,
  `saisonNaturelle` int(1) NOT NULL,
  `saisonIngredient` varchar(200) DEFAULT NULL,
  `imageIngredient` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `nomIngredient`, `caloriesIngredient`, `healthy`, `saisonNaturelle`, `saisonIngredient`, `imageIngredient`) VALUES
(15, 'olive oil', 120, 1, 0, 'autumn', 'oliveoil.avif'),
(16, 'tomato', 18, 1, 0, 'summer', 'tomato.avif'),
(17, 'potato', 77, 1, 0, 'summer', 'potatoes.avif'),
(18, 'water', 0, 1, 0, '', 'water.avif'),
(19, 'onion', 40, 1, 0, '', 'onion.avif'),
(20, 'meat', 143, 1, 0, '', 'meat.avif'),
(21, 'chicken', 239, 1, 0, '', 'chicken.avif'),
(22, 'salt', 0, 0, 0, '', 'salt.avif'),
(23, 'garlic', 100, 1, 0, 'summer', 'garlic.avif'),
(24, 'couscous', 150, 0, 0, '', 'cous.avif'),
(25, 'butter', 717, 0, 0, '', 'butter.jpeg'),
(26, 'tomato paste', 82, 1, 0, '', 'tomatopaste.avif'),
(27, 'checkchoukha', 350, 0, 0, '', 'check.jpg'),
(28, 'freekeh', 400, 1, 0, 'summer', 'freekeh.jpg'),
(30, 'cheese', 104, 0, 0, '', 'cheese.avif'),
(31, 'lettuce', 15, 1, 0, 'spring', 'lettuce.avif'),
(32, 'carrot', 41, 1, 0, '', 'carrot.avif'),
(34, 'flour', 364, 0, 0, '', 'flour.avif'),
(35, 'strawberries', 32, 1, 0, '', 'straw.avif'),
(36, 'milk', 146, 0, 0, '', 'milk.avif'),
(37, 'banana', 89, 1, 0, '', 'banana.avif'),
(38, 'sugar', 387, 0, 0, '', 'sugar.avif'),
(39, 'mint', 70, 1, 0, 'spring', 'mint.avif'),
(40, 'lemon', 29, 1, 0, 'winter', 'lemon.avif'),
(41, 'chocolat', 546, 0, 0, '', 'choco.avif'),
(42, 'eggs', 155, 1, 0, '', 'eggs.avif'),
(43, 'Honey', 304, 0, 0, '', 'honey.avif'),
(44, 'Smid', 120, 0, 0, '', 'semoule.avif'),
(45, 'coffee', 2, 1, 0, '', 'coffee.avif'),
(46, 'biscuit', 353, 0, 0, '', 'biscuit.avif'),
(47, 'cream', 400, 0, 0, '', 'cream.avif'),
(48, 'spagetti', 380, 0, 0, '', 'spagetti.avif');

-- --------------------------------------------------------

--
-- Structure de la table `newstable`
--

CREATE TABLE `newstable` (
  `idNews` int(11) NOT NULL,
  `idVideo` varchar(400) DEFAULT NULL,
  `titreNews` varchar(500) DEFAULT NULL,
  `descriptionNews` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `newstable`
--

INSERT INTO `newstable` (`idNews`, `idVideo`, `titreNews`, `descriptionNews`) VALUES
(38, 'sarbucks.mp4', 'How To Order At Starbucks If You\'re Gluten-Free', 'If you’re gluten-free, you likely know that eating or drinking out at any restaurant presents challenges. Of course, you\'re probably safe with black coffee, and you can reliably enjoy a nice hot café au lait. But did you know that you can also enjoy a Starbucks Frappuccino? Yep, it\'s gluten free. The same goes for most of the chain\'s Refreshers and hot chocolate offerings. But the list doesn\'t stop there. While Starbucks and its sugary, addictive drinks may not seem friendly toward anyone avoiding gluten, you\'ll be pleasantly surprised to find a fairly wide selection of goodies that contain no wheat at all.'),
(48, 'lkhg.mp4', 'testing', 'testinghhh');

-- --------------------------------------------------------

--
-- Structure de la table `noterecette`
--

CREATE TABLE `noterecette` (
  `idRecette` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `nutritioningredient`
--

CREATE TABLE `nutritioningredient` (
  `idIngredient` int(11) NOT NULL,
  `idNutrition` int(11) NOT NULL,
  `quantityNutrition` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nutritioningredient`
--

INSERT INTO `nutritioningredient` (`idIngredient`, `idNutrition`, `quantityNutrition`) VALUES
(15, 6, '14 g'),
(16, 1, '1 g'),
(16, 2, '2,6 g'),
(16, 4, '1,2 g'),
(16, 6, '0,2 g'),
(17, 2, '0,8 g'),
(17, 4, '2,2 g'),
(17, 5, '6 mg'),
(17, 6, '0,1 g'),
(19, 1, '1,1 g'),
(19, 2, '4,2 g'),
(19, 4, '1,7 g'),
(19, 5, '4 mg'),
(19, 6, '0,1 g'),
(20, 1, '26 g'),
(20, 5, '57 mg'),
(20, 6, '3,5 g'),
(20, 8, '73 mg'),
(21, 1, '27 g'),
(21, 5, '82 mg'),
(21, 6, '14 g'),
(21, 8, '88 mg'),
(22, 5, '38 mg'),
(22, 9, '8 mg'),
(23, 1, '0,3 g'),
(23, 6, '0 g'),
(23, 10, '0,7 g'),
(24, 1, '5 g'),
(24, 4, '2 g'),
(24, 6, '1 g'),
(24, 10, '30 g'),
(25, 1, '0,9 g'),
(25, 5, '11 g'),
(25, 6, '81 g'),
(25, 8, '215 g'),
(25, 9, '24 g'),
(26, 2, '1,9 g'),
(26, 4, '0,7 g'),
(26, 5, '9,4 mg'),
(26, 9, '162 mg'),
(26, 10, '3 g'),
(28, 2, '0,9 g'),
(28, 6, '1 g'),
(28, 10, '2 g'),
(30, 1, '5 g'),
(30, 2, '0,6 g'),
(30, 5, '468 mg'),
(30, 6, '9 g'),
(31, 1, '1,4 g'),
(31, 5, '28 mg'),
(31, 9, '194 mg'),
(31, 10, '2 g'),
(32, 2, '4,7 g'),
(32, 5, '69 mg'),
(32, 6, '0,2 g'),
(32, 9, '320 mg'),
(32, 10, '10 g'),
(34, 5, '2 mg'),
(34, 6, '1 g'),
(34, 9, '107 mg'),
(34, 10, '76 g'),
(35, 2, '4,9 g'),
(35, 4, '2 g'),
(35, 6, '0,3 g'),
(35, 10, '7,7 g'),
(36, 5, '107 mg'),
(36, 6, '2 mg'),
(36, 8, '12 mg'),
(37, 2, '12 g'),
(37, 5, '1 mg'),
(37, 6, '0,3 g'),
(37, 9, '358 mg'),
(37, 10, '23 g'),
(38, 1, '0 g'),
(38, 5, '1 mg'),
(38, 6, '0 g'),
(38, 8, '0 g'),
(38, 9, '2 mg'),
(38, 10, '100 g'),
(39, 5, '31 mg'),
(39, 6, '0,9 g'),
(39, 9, '596 mg'),
(40, 5, '2 mg'),
(40, 6, '0,2 g'),
(40, 9, '132 mg'),
(41, 2, '61 g'),
(41, 3, '31 g'),
(41, 5, '24 mg'),
(41, 8, '31 g'),
(41, 9, '559 mg'),
(42, 1, '13 g'),
(42, 5, '124 mg'),
(42, 6, '11'),
(42, 8, '373'),
(43, 1, '0,4 g'),
(43, 2, '34,6 g'),
(43, 10, '76,4 g'),
(44, 2, '24 g'),
(44, 4, '1,4 g'),
(44, 6, '0,8 g'),
(45, 1, '0,3 g'),
(46, 2, '2,2 g'),
(46, 5, '580 mg'),
(46, 6, '16 g'),
(46, 8, '3 mg'),
(47, 1, '3 g'),
(47, 6, '43 g'),
(48, 6, '1 g'),
(48, 10, '3 g');

-- --------------------------------------------------------

--
-- Structure de la table `paragraph`
--

CREATE TABLE `paragraph` (
  `idParagraph` int(11) NOT NULL,
  `contenuParagraph` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `titreRecette` varchar(200) NOT NULL,
  `descriptionRecette` varchar(1000) NOT NULL,
  `tempsPreparation` int(20) NOT NULL,
  `tempsCuisson` int(20) DEFAULT NULL,
  `caloriesRecette` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `tempsRepos` int(20) NOT NULL,
  `tempsTotal` int(20) NOT NULL,
  `saison` varchar(200) NOT NULL,
  `healthyRecette` int(1) NOT NULL,
  `newsRecette` int(1) NOT NULL,
  `feteRecette` varchar(100) DEFAULT NULL,
  `difficulteRecette` int(11) NOT NULL,
  `valideRecette` int(11) NOT NULL,
  `idFete` int(11) NOT NULL,
  `notation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `titreRecette`, `descriptionRecette`, `tempsPreparation`, `tempsCuisson`, `caloriesRecette`, `idUtilisateur`, `idCategorie`, `tempsRepos`, `tempsTotal`, `saison`, `healthyRecette`, `newsRecette`, `feteRecette`, `difficulteRecette`, `valideRecette`, `idFete`, `notation`) VALUES
(37, 'Algerian Roast Chickenn', 'This is a traditional roast chicken dish from Algeria. The sauce is a combination of onions, garlic, mustard, balsamic vinegar, and cayenne pepper. When I have time, I prepare the chicken a few hours ahead of time and let it marinate in the sauce before roasting it in the oven. I usually serve the chicken with cubed roast potatoes. I coat them with the same sauce and cook them in the oven for 1 hour.\r\n          \r\n          \r\n          \r\n          \r\n          ', 15, 90, 397, 1, 2, 0, 105, 'summer', 1, 0, 'yennayer', 2, 1, 0, 0),
(38, 'Couscous', 'This recipe is made with mutton and chicken, but you can easily change the meats for lamb and/or merguez. I make this often and my family loves it!', 30, 67, 492, 1, 2, 5, 102, 'winter', 0, 1, 'adha', 7, 1, 0, 0),
(39, 'chekchouka', 'This dish is prepared in festive celebrations in Algeria. It is made of small pieces of thin round flatbread and served with a fragrant meat sauce cooked with chickpeas and vegetables. The preferred meat is lamb but beef or chicken can be used in this dish.\r\nThe thin round flatbread is called Rougag or Trid in Algeria and the dish is called Chakhchoukha. This Chakhchoukha recipe is from the region of Constantine in Algeria.', 30, 90, 570, 1, 2, 15, 135, 'winter', 0, 0, 'fitr', 9, 1, 0, 0),
(41, 'Chorba frik', 'Chorba frik is a soup frequently prepared during the month of Ramadan. It is usually accompanied by briks or böreks.', 35, 50, 400, 1, 2, 0, 85, 'winter', 1, 1, 'marriage', 7, 1, 0, 0),
(42, 'Bourek', 'It being Ramadan, no iftar table in Algeria is complete without Bourek. I have mentioned bourek several times before here and here. But I have not shown the method of folding the Bourek cigares in which they are made in Alger, the capital of Algeria.', 30, 25, 580, 17, 1, 0, 55, 'summer', 0, 0, 'mawlid', 2, 1, 0, 0),
(43, 'Cesar salads', 'For me, one of the hallmarks of a delicious salad—one tempting enough to steer my attention away from more alluring dishes on a menu—is how it brings together seemingly disparate ingredients, ones you could never imagine together in the same bowl. A top notch salad explores the murky depths of flavor and texture and marries ingredients to reveal something unexpected and whimsical.', 0, 0, 490, 17, 1, 0, 0, 'summer', 1, 0, 'mawlid', 3, 1, 0, 0),
(44, 'Veggies soup', 'Not only is this soup delicious but and it’s so easy to make. It just takes some chopping and a bit of simmering until you’ve got a soup everyone will love! This is a recipe you’ll definitely want to add to your dinner or lunch rotation. And it yields a pot full and makes great leftovers!', 0, 0, 490, 17, 1, 0, 0, 'summer', 1, 0, '', 4, 1, 0, 0),
(45, 'Mini pizza', 'Mini pizzas on homemade thin crust dough + tons of topping ideas! These little bites are perfect for parties and fun for weeknights!', 0, 0, 460, 1, 1, 0, 0, 'spring', 0, 1, '', 4, 1, 0, 0),
(46, 'Banana smoothie', 'These smoothie recipes give new life to your favorite fruits and veggies – in a slurpable drink! They’re packed with good-for-you ingredients, made in less than 5 minutes, and can be enjoyed any time throughout the day.', 0, 0, 320, 18, 3, 0, 0, 'summer', 1, 0, '', 1, 1, 0, 0),
(47, 'Strawberries smoothie', 'When it comes to making a smoothie, don’t overthink it. The best ones are often made from improvising with what you have on hand. Toss in your slightly browned banana, sprinkle in a handful of spinach that’s about to go bad, or use up that half can of coconut milk. Just a little bit of each can go far in a delicious blended drink.', 0, 0, 420, 17, 3, 0, 0, 'summer', 1, 0, '', 1, 1, 0, 0),
(48, 'Mockito', 'Mojitos are one of the most classic cocktails of all time and with their vibrant and refreshing taste, they work for any and every occasion. Mojitos are similar to the Brazilian caipirinha, but are prepared with white Cuban rum instead of cachaça and garnished with mint for extra freshness. With our Mojito recipe and the right ingredients, you can bring some of the Caribbean lifestyle into your home. A non-alcoholic version can be easily created by replacing the rum and part of the soda water with ginger ale or ginger berry.', 0, 0, 250, 18, 3, 0, 0, 'summer', 1, 0, '', 1, 1, 0, 0),
(49, 'Fluffy buttermilk pancakes', 'Perfect pancakes are easier to make than you think. This pancake recipe produces thick, fluffy, and all-around delicious pancakes with just a few ingredients that are probably already in your kitchen (and it\'s so much better than the boxed stuff).', 0, 0, 350, 18, 4, 0, 0, '', 0, 0, '', 3, 1, 0, 0),
(50, 'Chocolat cake', 'This twist on flourless chocolate cake contains Chinese five-spice, a warming spice blend made with cinnamon, cloves, fennel seeds, star anise—all the holiday flavors we love—plus Sichuan peppercorns, a fun addition that works surprisingly well in desserts. I love how five-spice gives this cake slightly sweet, tangy, and peppery notes to balance out the richness of dark chocolate. Serve it alongside ginger whipped cream for a dessert that’s surprising, aromatic, and delicious.', 0, 0, 800, 17, 4, 0, 0, '', 0, 0, '', 6, 1, 0, 0),
(51, 'Tamina', 'La tamina, tamminet, tamena, atamine, ou taqnata, est un entremets algérien à texture pâteuse, composé : soit uniquement de semoule torréfiée dans l\'Algérois ; soit d\'un mélange de semoule, caroubes et pois chiches, torréfié et moulu, dans l\'est du pays ; le tout agrémenté de miel, fleur d\'oranger et beurre fondu.', 0, 0, 900, 18, 4, 0, 0, '', 0, 0, 'mawlid', 3, 1, 0, 0),
(52, 'Capuccino', 'This is the absolute best frappe I’ve ever had in my entire life! Inspired by a black and white cookie, the Black and White Frappe tastes similar. If you want extra chocolate, drizzle some on the bottom and sides before serving. I hope you enjoy my creation!', 0, 0, 240, 18, 3, 0, 0, '', 0, 0, '', 1, 1, 0, 0),
(53, 'Tiramissu', 'For this tiramisu recipe I used strong and freshly brewed espresso, not the instant powder. It makes a difference, trust me. Make sure the coffee has cooled slightly and that you don\'t soak the ladyfingers, but just quickly dunk them in the Amaretto-espresso mixture. That way they will stay soft and melt together with the rich cream, but won\'t be mushy. If Amaretto isn\'t your favorite, you can leave it out—I personally prefer my tiramisu without it.', 0, 0, 513, 1, 4, 0, 0, '', 0, 1, '', 4, 1, 0, 0),
(54, 'Spagetti', 'This simple number, using a generous amount of tomato paste as a base, is inspired by Bon Appetit’s Basically recipe for rigatoni with easy vodka sauce. You could also use heavy cream or mascarpone, but I like the tanginess of crème fraîche here, and would highly recommend seeking out bucatini, as it’s THE pasta for slurping up all that creamy sauce', 0, 0, 460, 18, 2, 0, 0, '', 0, 0, '', 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `recetteingredient`
--

CREATE TABLE `recetteingredient` (
  `quantite` varchar(200) NOT NULL,
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recetteingredient`
--

INSERT INTO `recetteingredient` (`quantite`, `idRecette`, `idIngredient`) VALUES
('5 tablespoons', 37, 15),
('¼ cup', 38, 15),
('4 drumsticks', 38, 21),
('1 pinch', 38, 22),
('3', 38, 19),
('cover', 38, 18),
('6 ounce', 38, 26),
('tablespoon', 38, 25),
('2 cups', 38, 24),
('1 kg', 39, 20),
('1 big', 39, 19),
('3 cloves', 39, 23),
('3 tbsp', 39, 15),
('1 tbsp', 39, 26),
('1 tbsp', 39, 22),
('2 medium', 39, 16),
('1 medium', 41, 17),
('3 medium', 41, 16),
('3 tablespoon', 41, 26),
('1/2 cup', 41, 15),
('1/2 kg', 41, 20),
('1 cup', 41, 28),
('2 medium', 41, 19),
('200 g', 42, 30),
('500 g', 42, 21),
('500 g', 42, 17),
('2 small', 42, 19),
('60 ml', 43, 15),
('200 g', 43, 30),
('300 g', 43, 21),
('4 medium', 44, 16),
('3 medium', 44, 17),
('400 g', 44, 32),
('1 small', 44, 19),
('1 tablespoon', 44, 22),
('200 g', 44, 30),
('2 cups', 44, 18),
('2 cloves', 45, 23),
('1 kg', 45, 16),
('700 g', 45, 34),
('400 g', 45, 30),
('1 tablespoon', 45, 22),
('1 small', 45, 19),
('4 tablespoon', 45, 15),
('1/2 cup', 45, 18),
('4', 46, 37),
('2 cups', 46, 36),
('500 g', 47, 35),
('2 cups', 47, 36),
('60 g', 47, 38),
('50 g', 48, 39),
('200 g', 48, 40),
('3 tablespoons', 48, 38),
('2 cups', 48, 18),
('300 g', 49, 34),
('80 g', 49, 38),
('50 ml', 49, 36),
('25 g', 49, 25),
('200 g', 49, 35),
('200 g', 50, 34),
('300 g', 50, 41),
('50 g', 50, 25),
('50 ml', 50, 36),
('50 g', 50, 38),
('1 medium', 50, 37),
('3', 50, 42),
('200 g', 51, 25),
('250 g', 51, 44),
('4 tablespoon', 51, 43),
('3 tablespoons', 52, 45),
('4 tablespoons', 52, 38),
('2 cups', 52, 36),
('1 tablespoon', 53, 45),
('2', 53, 42),
('2 pockets', 53, 46),
('150 g', 53, 47),
('150 g', 53, 41),
('50 g', 53, 38),
('4 medium', 54, 16),
('1 tablespoon', 54, 26),
('1 medium', 54, 19),
('200 g', 54, 30),
('4 cups', 54, 18),
('500 g', 54, 48);

-- --------------------------------------------------------

--
-- Structure de la table `saverecette`
--

CREATE TABLE `saverecette` (
  `idRecette` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(200) NOT NULL,
  `emailUtilisateur` varchar(500) NOT NULL,
  `motDePasseUtilisateur` varchar(500) NOT NULL,
  `admin` int(11) NOT NULL,
  `prenomUtilisateur` varchar(200) NOT NULL,
  `imageUtilisateur` varchar(500) DEFAULT NULL,
  `sexUtilisateur` varchar(100) NOT NULL,
  `statusUtilisateur` int(11) NOT NULL,
  `bdUtilisateur` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `emailUtilisateur`, `motDePasseUtilisateur`, `admin`, `prenomUtilisateur`, `imageUtilisateur`, `sexUtilisateur`, `statusUtilisateur`, `bdUtilisateur`) VALUES
(1, 'dif', 'jm_dif@esi.dz', '12345meryem', 1, 'meryem', 'meryem2.jpeg', 'female', 1, NULL),
(17, 'Dif', 'jz_dif@esi.dz', '12345meryem', 0, 'Zineb', 'meryem2.jpg', 'female', 1, '2000-06-13'),
(18, 'Dif', 'ja_dif@esi.dz', '12345meryem', 0, 'Mounir', 'mounir.webp', 'male', 1, '1999-06-10');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `idVideo` int(11) NOT NULL,
  `linkVideo` varchar(500) NOT NULL,
  `idRecette` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`idVideo`, `linkVideo`, `idRecette`) VALUES
(1, 'Pommes de terre à lail rôties au four.mp4', 37),
(11, 'Y2Mate.is - COUSCOUS TRADITIONNEL (Recette Maghrébine) - Recette Détaillée - Cuisson en Cocotte Minute-o5r2Fu31K3Q-240p-1654096654913.mp4', 38),
(12, 'check.mp4', 39),
(14, 'chorba1.mp4', 41),
(15, 'bourek.mp4', 42),
(16, 'salad.mp4', 43),
(17, 'soup.mp4', 44),
(18, 'mini.mp4', 45),
(19, 'bn.mp4', 46),
(20, 'ss.mp4', 47),
(21, 'mock.mp4', 48),
(22, 'pan.mp4', 49),
(23, 'choco.mp4', 50),
(24, 'tamina.mp4', 51),
(25, 'cap.mp4', 52),
(26, 'tira.mp4', 53),
(27, 'spag.mp4', 54);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aimerecette`
--
ALTER TABLE `aimerecette`
  ADD PRIMARY KEY (`idRecette`,`idUtilisateur`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`),
  ADD UNIQUE KEY `nomCategorie` (`nomCategorie`);

--
-- Index pour la table `diaporamanews`
--
ALTER TABLE `diaporamanews`
  ADD PRIMARY KEY (`idDiapo`),
  ADD KEY `linkImage` (`linkImage`);

--
-- Index pour la table `diaporamarecette`
--
ALTER TABLE `diaporamarecette`
  ADD PRIMARY KEY (`idDiapo`),
  ADD KEY `linkImage` (`linkImage`);

--
-- Index pour la table `etapederecette`
--
ALTER TABLE `etapederecette`
  ADD PRIMARY KEY (`idEtape`),
  ADD UNIQUE KEY `contenuEtape` (`contenuEtape`) USING HASH,
  ADD KEY `idRecette` (`idRecette`);

--
-- Index pour la table `imagenews`
--
ALTER TABLE `imagenews`
  ADD PRIMARY KEY (`idImage`),
  ADD UNIQUE KEY `linkImage` (`linkImage`),
  ADD KEY `idNews` (`idNews`);

--
-- Index pour la table `imagerecette`
--
ALTER TABLE `imagerecette`
  ADD PRIMARY KEY (`idImage`),
  ADD UNIQUE KEY `linkImage` (`linkImage`),
  ADD KEY `idRecette` (`idRecette`);

--
-- Index pour la table `infonutrition`
--
ALTER TABLE `infonutrition`
  ADD PRIMARY KEY (`idNutrition`),
  ADD UNIQUE KEY `nomNutrition` (`nomNutrition`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`);

--
-- Index pour la table `newstable`
--
ALTER TABLE `newstable`
  ADD PRIMARY KEY (`idNews`),
  ADD UNIQUE KEY `idVideo` (`idVideo`);

--
-- Index pour la table `noterecette`
--
ALTER TABLE `noterecette`
  ADD PRIMARY KEY (`idRecette`,`idUtilisateur`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `nutritioningredient`
--
ALTER TABLE `nutritioningredient`
  ADD PRIMARY KEY (`idIngredient`,`idNutrition`),
  ADD KEY `idNutrition` (`idNutrition`);

--
-- Index pour la table `paragraph`
--
ALTER TABLE `paragraph`
  ADD PRIMARY KEY (`idParagraph`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD UNIQUE KEY `titreRecette` (`titreRecette`),
  ADD KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `recetteingredient`
--
ALTER TABLE `recetteingredient`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idIngredient` (`idIngredient`);

--
-- Index pour la table `saverecette`
--
ALTER TABLE `saverecette`
  ADD PRIMARY KEY (`idRecette`,`idUtilisateur`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `emailUtilisateur` (`emailUtilisateur`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idVideo`),
  ADD UNIQUE KEY `linkVideo` (`linkVideo`),
  ADD UNIQUE KEY `idRecette` (`idRecette`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `diaporamanews`
--
ALTER TABLE `diaporamanews`
  MODIFY `idDiapo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `diaporamarecette`
--
ALTER TABLE `diaporamarecette`
  MODIFY `idDiapo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `etapederecette`
--
ALTER TABLE `etapederecette`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT pour la table `imagenews`
--
ALTER TABLE `imagenews`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `imagerecette`
--
ALTER TABLE `imagerecette`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `newstable`
--
ALTER TABLE `newstable`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aimerecette`
--
ALTER TABLE `aimerecette`
  ADD CONSTRAINT `aimerecette_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`),
  ADD CONSTRAINT `aimerecette_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `diaporamanews`
--
ALTER TABLE `diaporamanews`
  ADD CONSTRAINT `diaporamanews_ibfk_1` FOREIGN KEY (`linkImage`) REFERENCES `newstable` (`idNews`);

--
-- Contraintes pour la table `diaporamarecette`
--
ALTER TABLE `diaporamarecette`
  ADD CONSTRAINT `diaporamarecette_ibfk_1` FOREIGN KEY (`linkImage`) REFERENCES `recette` (`idRecette`);

--
-- Contraintes pour la table `etapederecette`
--
ALTER TABLE `etapederecette`
  ADD CONSTRAINT `etapederecette_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`);

--
-- Contraintes pour la table `imagenews`
--
ALTER TABLE `imagenews`
  ADD CONSTRAINT `imagenews_ibfk_1` FOREIGN KEY (`idNews`) REFERENCES `newstable` (`idNews`);

--
-- Contraintes pour la table `imagerecette`
--
ALTER TABLE `imagerecette`
  ADD CONSTRAINT `imagerecette_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`);

--
-- Contraintes pour la table `noterecette`
--
ALTER TABLE `noterecette`
  ADD CONSTRAINT `noterecette_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`),
  ADD CONSTRAINT `noterecette_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `nutritioningredient`
--
ALTER TABLE `nutritioningredient`
  ADD CONSTRAINT `nutritioningredient_ibfk_1` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`),
  ADD CONSTRAINT `nutritioningredient_ibfk_2` FOREIGN KEY (`idNutrition`) REFERENCES `infonutrition` (`idNutrition`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `recette_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `recetteingredient`
--
ALTER TABLE `recetteingredient`
  ADD CONSTRAINT `recetteingredient_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`),
  ADD CONSTRAINT `recetteingredient_ibfk_2` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`);

--
-- Contraintes pour la table `saverecette`
--
ALTER TABLE `saverecette`
  ADD CONSTRAINT `saverecette_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`),
  ADD CONSTRAINT `saverecette_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
