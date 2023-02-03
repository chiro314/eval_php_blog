-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 fév. 2023 à 13:36
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_rire_cma`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text,
  `showcase` bigint NOT NULL DEFAULT '0',
  `status` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'draft',
  `firstpublicationdate` bigint NOT NULL DEFAULT '0',
  `lastmodificationdate` bigint NOT NULL,
  `loginuser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `photo`, `summary`, `content`, `showcase`, `status`, `firstpublicationdate`, `lastmodificationdate`, `loginuser`) VALUES
(13, 'Le Change (extrait d\'un conte)', 'view/pictures/le-change-la-princesse.png', 'A travers un extrait du conte \"Le Change\", découvrez l\'univers atypique de Mireille Chakras. Son œuvre est éditée chez Plon.\r\n\r\nIl était une fois, au pays du concombre, un roi.\r\n\r\nSes parents avaient élevé leur fils selon les usages de la dynastie, afin qu’il fût bien dans ses mules de futur roi de Concombrie. Il avait passé son enfance à manger roi, à bouger roi, à penser roi, à rêver roi. Enfin, le jour advint du couronnement de ses efforts et de ses renoncements.\r\n\r\n', 'Il était une fois, au pays du concombre, un roi.\r\n<br><br>\r\nSes parents avaient élevé leur fils selon les usages de la dynastie, afin qu’il fût bien dans ses mules de futur roi de Concombrie. Il avait passé son enfance à manger roi, à bouger roi, à penser roi, à rêver roi. Enfin, le jour advint du couronnement de ses efforts et de ses renoncements. Il s’installa sur le trône et une dépression post coronam regalem s’empara de son âme de fer. Une reine lui fut donnée, issue de la famille la plus titrée du royaume. Elle se prénommait Päivänkakkara. D’une candeur feinte et pourvue de cette beauté un peu farouche qui fait tourner la tête aux hommes de devoir, la reine avait su un temps divertir le royal échalas. Une princesse était née de leurs jeux d’adultes consentants.<br>\r\nTrès vite, le roi était retourné à ses décrets et à ses urnes funéraires, à ses inaugurations de boulangeries et à ses défilés de grosses têtes, à ses batailles de fleurs et à ses chasses à courre.\r\n<br><br>\r\nIl était une fois, encore, cette reine qui avait pris ses distances avec un roi au destin sans fraîcheur. Ça faisait longtemps que Päivänkakkara n’avait pas promené ses longs doigts de galopine dans les boucles blondes de cette barbe qui, selon une légende solidement établie, portait chance à tout le royaume – pas moins de deux servantes étaient préposées à l’entretien de la toison propitiatoire. <br>\r\nLa reine ne portait pas non plus dans son cœur, la fillette qui lui avait confisqué les entrailles pendant neuf mois. Elle avait dû, dans sa jeunesse, élever son petit frère, et n’avait pas envie de remettre ça avec une fille, fût-elle la sienne.<br>\r\nLe temps des caresses n’était plus.\r\n<br><br>\r\nIl était donc, ce petit frère devenu grand que sa sœur la reine gratifiait d’un amour maternel économe. Cela irritait le jeune homme qui vouait à sa protectrice une adoration incestueuse assumée. Il faisait maintenant partie de la cour rapprochée de sa majesté. Il était de toutes les fêtes, de tous les bals masqués, de tous les ohé-ohé, de toutes les noces, de toutes les grandes eaux, de toutes les fééries.<br>\r\nMais cette promiscuité restait sans espoir car le cœur de la reine n’avait jamais cessé d’appartenir à l’autre, leur demi-frère, celui que leur père avait ramené, déjà grand, d’une de ses prestigieuses campagnes. La sœur en était tombée immédiatement amoureuse ; le petit frère l’avait immédiatement détesté.\r\n<br><br>\r\nAprès son mariage avec le roi, la reine consort n’avait pas tardé à ouvrir un poste de super intendant pour faire venir auprès d’elle son premier et unique amour. Son petit frère lui avait soufflé cette idée pour témoigner de ses bonnes dispositions à l’égard du couple adultère ; en réalité, il voyait là le meilleur moyen de pousser les deux étourneaux à l’erreur, sous les yeux mi-clos des caudataires, et de se débarrasser, un jour, du gêneur.<br>\r\nLa reine avait naturellement offert à son petit frère de devenir le parrain de sa fille. Il avait accepté cet honneur avec une haine indétectable. Depuis, tout le monde l’appelait « Parrain ». Quant au demi-frère, on l’appelait « super intendant », comme le réclamait l’usage. Parlons un peu de celui-ci.\r\n<br><br>\r\nIl était, une deuxième fois, ce garçon de second lit qui avait laissé ses chiens pour monter à la cour, après une enfance en bout de table. Il avait développé, au milieu de ses meutes, une intelligence carnassière et sauvage. Une ambition rubigineuse rongeait son sang et la soif de reconnaissance lui asphyxiait le cœur. Elevés, sa demi-sœur et lui, dans une gémellité de circonstance, ils avaient, ensemble, découvert un grand nombre de choses et étaient restés attachés l’un à l’autre par la chair, davantage que par le sang. Le super intendant qu’il était devenu s’était montré à la hauteur de la fonction et ses compétences en matière de cynégétique et de vénerie lui avaient attiré la sympathie du roi.\r\n<br><br>\r\nLa reine avait aussi trouvé un emploi de confiance à sa fille qui devait l’accompagner à ses rendez-vous de travail avec le super intendant. Päivänkakkara était très impliquée dans l’organisation des évènements festifs, qui étaient nombreux en ce royaume prospère. La petite princesse servait de couverture aux deux amants qui s’en donnaient à cœur battant pendant que l’enfant jouait dans la poussière avec les chiens. En la voyant assise au milieu des bêtes, le super intendant se rappelait avec une rage malsaine, les longues heures passées à étudier le fonctionnement de la meute, pendant que d’autres apprenaient à jouter avec des armes et des phrases, à danser la pavane, à jouer du clavecin et de la viole.\r\n<br><br>\r\nIl était une fois, une petite princesse qui, en grandissant, avait fini par comprendre que la reine sa mère trompait le roi son père. Mais sa mère était pour elle le concombre et le sel, et le code de l’honneur que lui inculquaient ses précepteurs lui interdisait de trahir une reine. La princesse comprenait confusément que les concombres du royaume ne gagneraient ni en taille ni en saveur, si la vérité dont la cour s’accommodait venait à caresser les dents cariées des sujets de sa majesté. Outre la reconnaissance de la reine, elle y perdrait le peu de liberté dont elle faisait grand usage ; en effet, bonnes et précepteurs mettaient sur le compte de l’emploi du temps surchargé de la reine, les fréquentes absences de la princesse.\r\n<br><br>\r\nPar ailleurs, le concept de roi restait flou dans l’esprit de la fillette. Elle rencontrait peu ce monsieur aux habits ridicules qui, même pour aller à la selle, ne pouvait faire trois pas sans une escorte de gentilshommes aux componctions empesées. Cela n’empêchait pas la princesse de cultiver dans les serres étouffantes de son for intérieur, une culpabilité rhizomique dont le feuillage coruscant aveuglait sa pensée. Plus que le silence qu’elle s’imposait, cette complicité à laquelle on l’avait contrainte années après année, lui pesait affreusement. Elle n’avait pas, comme sa mère, besoin qu’on l’aime et qu’on l’admire, qu’on la protège et qu’on la gronde ; elle aurait voulu fuir cette cour pour découvrir des horizons moins tors, établir de véritables échanges avec des êtres moins crapuleux. On ne choisit pas sa solitude. Mais patience, le concombre avance masqué. \r\n<br><br>\r\nIl était une fois, une jeune princesse, qui avait attendu l’âge de quinze ans pour faire sa première fugue. Même les enfants de roi mourraient jeunes, en ce temps-là, et l’on n’appréciait pas qu’ils prissent des risques inutiles. La princesse était restée enfant unique. En quittant l’utérus, elle avait jeté la clé du royaume gynécologique de sa mère et aucun enfant masculin n’était venu remettre en cause sa prétention à régner. Dans moins d’un an, elle aurait l’âge de succéder à son père une fois que celui-ci aurait passé le sceptre à gauche. <br>\r\nAyant leurré son roi durant toute sa maigre vie, elle était persuadée qu’en atteignant l’âge de régner, elle mettrait les jours de son père en péril. L’ombre de cette échéance qui se rapprochait n’était pas étrangère aux tourments qui lui firent, un beau matin, monter sur sa jument Dolly et, emmitouflée dans un poil de chameau, passer le pont-levis sous le blason coupé d’argent à deux concombres de sinople en bande et en barre, et de gueule à une couronne d’or.\r\n<br><br>\r\nA suivre…\r\n\r\n\r\n\r\n\r\n', 1675416132, 'inline', 1675338457, 1675416132, 'cma'),
(15, 'Bestiaire décalé – Le loris grêle', 'view/pictures/loris grêle.JPG', 'Les animaux sont une source intarissable d\'émerveillement et d\'amusement. Parodier les zoologues est procure une joie sophistiquée proche de l\'hypnose. Lisez plutôt.<br>\r\n\r\nLe loris grêle (de l’ancien néerlandais loeris, « clown »). Petit prosimien somnambule des forêts et des marais du sud de l’Inde et de Sri Lanka, le loris est un nocturne qui ne se réveille jamais tout à fait. Il se nourrit de végétaux hallucinogènes, d’insectes rêveurs et de petits vertébrés virtuels...\r\n\r\n', 'Le loris grêle (de l’ancien néerlandais loeris, « clown »).\r\n<br><br>\r\nPetit prosimien somnambule des forêts et des marais du sud de l’Inde et de Sri Lanka, le loris est un nocturne qui ne se réveille jamais tout à fait. Il se nourrit de végétaux hallucinogènes, d’insectes rêveurs et de petits vertébrés virtuels.\r\n<br><br>\r\nAu moyen de ses yeux immenses, il est capable d’hypnotiser un œuf à plus de cinq mètres en moins de temps qu‘il ne faut pour prononcer le mot « hypnotiser ».\r\n<br><br>\r\nSon goût déficient lui permet de consommer des punaises à l’odeur repoussante. Pour autant il ne compte pas s’éterniser sur cette planète.\r\n<br><br>\r\nComme son nom ne l’indique pas, le loris déteste se donner en spectacle. Porté par d’intimes convictions, tel le mime Marceau de vingt-deux heures cinquante-cinq, le loris grimpe aux arbres sans effort mais avec une extrême lenteur et d’infinies précautions tant il s’en voudrait de réveiller les feuilles.\r\n<br><br>\r\nIl a pourtant la détente rapide et sûre lorsqu’il s’agit d’étrangler un lézard ou un jeune oiseau. Il mange rarement ses œufs à la coque. Comme la plupart des tueurs en série, il ne se rappelle jamais ses crimes crépusculaires lorsqu‘il regagne, de sa démarche d’automate, son arbre creux.\r\n<br><br>\r\nDe la taille d’une peluche, son pelage est d’une douceur extrême, mais ses canines sont empoisonnées.\r\n<br><br>\r\nNotre truc mnémotechnique : grêle comme l’auriculaire du Loris.\r\n<br><br>\r\nBibliographie : Un loris à Vallauris (roman).', 0, 'inline', 1675367885, 1675431201, 'cma'),
(16, 'Critique du film « Alerte rouge en Afrique noire »', 'view/pictures/MK2.JPG', 'Le roman d’espionnage est une littérature sans risque qui peut rapporter gros. Jean Bruce, que l’on connaît davantage pour sa littérature érotique, s’y est risqué avec succès, de 1949 jusqu’à sa mort. <br>\r\nUn 26 mars 1963 pas comme les autres, sur la N16, sa Jaguar MK2 (3.8 litres) immatriculée 117 HJ 60 percute au niveau de Luzarches, le semi-remorque responsable de la mort des artistes.', 'Le roman d’espionnage est une littérature sans risque qui peut rapporter gros. Jean Bruce, que l’on connaît davantage pour sa littérature érotique, s’y est risqué avec succès de 1949 jusqu’à sa mort. Un 26 mars 1963 pas comme les autres, sur la N16, sa Jaguar MK2 (3.8 litres) immatriculée 117 HJ 60 percute au niveau de Luzarches, le semi-remorque responsable de la mort des artistes.\r\n<br><br>\r\nFaut-il rappeler que la Jaguar MK2 (Mark 2, soit série 2 en bon français) a remporté le Tour de France automobile quatre années consécutives, sous le pied talentueux de Bernard Consten, né à Courbevoie (ça ne s’invente pas) ? Marin Karmitz se souviendra de Jean Bruce en 1974, quand il fondera MK2, sa société de production et de distribution. Les biographes s’accordent sur le M et le K mais restent indécis quant au 2. Je ne suis pas peu fier d’avoir contribué à la résolution de cette énigme. Si vous participez à un jeu télévisé où il vous est demandé de trouver un point commun entre Jean Bruce, Bernard Consten et Marin Karmitz, vous connaissez la réponse.\r\n<br><br>\r\nD’aucuns prétendent que Jean Bruce est mort accidentellement. Je préfère dire qu’il est mort dans un accident et qu’il l’a bien cherché (il n’avait pas le pied léger). Il a voulu jouer les Bernard Consten sur la N16 et sa mort ne fut pas celle d’un héros de roman d’espionnage. Mourir piégé sous les décombres d’un palais vénitien qui s’enfonce inexorablement dans les eaux brunes de la lagune, passe encore, mais pas sur la N16, au volant d’une Jaguar, toute MK2 soit-elle !\r\n<br><br>\r\nPendant 88 volumes (plus de 6 par an), Hubert Bonisseur de La Bath, alias OSS 117, va, malgré les femmes qu’il attire comme des mouches, déjouer autant de complots nazis contre l’Occident en faisant chaque fois exploser un dépôt d’armes destinées à l’axe du mal.\r\n<br><br>\r\nOSS 117 serait né de la rencontre de Jean Bruce avec un véritable agent de l’OSS (Office of Strategic Services, ancêtre de la CIA), matricule 1117, lors de la libération de Lyon. Par ailleurs, Jean Bruce avait l’étoffe des héros, sa vie ressemble à celle d’un agent secret, même si sa mort ne fut pas à la hauteur : École nationale supérieure de la Police, Commission internationale de police criminelle, pilote à 17 ans, membre actif de la Résistance intérieure, employé de mairie, acteur dans une troupe ambulante, imprésario, agent d’un réseau de renseignement, inspecteur à la Sûreté, joaillier, secrétaire d’un maharadjah, globe-trotteur, directeur de collection, écrivain prolifique… <br>\r\nPour se détendre, Jean Bruce pratique le ski en hiver, la littérature érotique au printemps, la peinture en été, l’équitation en automne et les rallyes en toutes saisons (toutes les voitures de Jean Bruce étaient immatriculées en 117). Et encore, Wikipédia ne raconte pas tout ! Personnellement, je suis loin de cocher toutes les cases. J’ai été employé de mairie et un acteur médiocre dans une troupe plus amateur qu’ambulante, mais c’est à peu près tout. Je ne pratique pas le ski hors piste, je ne publie pas ma littérature érotique, je suis un modeste dessinateur, j’ai oublié comment on montait à cheval et il m’est arrivé de prendre un couloir de bus avant de tourner à droite.\r\n<br><br>\r\nHubert Bonisseur de La Bath survivra à la mort de Jean Bruce dont les proches reprendront la franchise. À plusieurs reprises, il entrera au service de scénaristes distingués.\r\n<br><br>\r\nLe Caire, nid d’espions (2006) et Rio ne répond plus (2009) rendent hommage aux films des années 50 et 60 (Alfred Hitchcock, les James Bond avec Sean Connery et Roger Moore…). Mais Halin, Hazanavicius (l’auteur de The Artist, le film aux cent récompenses) et Dujardin ont franchouillé le personnage jusqu’à la ringardise absolue et l’on débarrassé de la partie externe de son cerveau, un peu comme on pèle un fruit, pour pouvoir mettre dans sa bouche d’abruti polymorphe les horreurs les plus cocassières du chauvinisme patriotique, de la xénophobie raciste et du machisme homophobe. Même s’il sait compter jusqu’à quatre, OSS 117 est incapable de la moindre déduction. Nonobstant ce handicap, il s’adapte miraculeusement aux situations qu’il retourne avec l’expérience des grands ingénus confiants en leur légende.\r\n<br><br>\r\nLe décor étant planté, fallait-il écrire ce troisième opus très attendu ? Après avoir réglé leur compte aux arabes et aux juifs, il fallait s’attaquer aux noirs. Curieusement, les Chinois prennent plus cher que les noirs dans cette Alerte rouge en Afrique noire. Ceux qui suivent ne sont pas sans savoir que la Chine a déjà un pied en Afrique et que le Petit Livre rouge a été écrit par des nègres chinois (ce sont des extraits de discours et l’on sait que les discours sont rarement écrits par ceux qui les prononcent). Pour autant, la Chine reste hors sujet et ne sert que de running gag et de deus ex machina ; mais la quatrième de couverture de Monsieur Li est dans de beaux draps est peut-être déjà écrite. \r\n<br><br>\r\nDujardin et Halin, le scénariste, sont toujours de la partie, mais c’est Bedos fils qui est aux commandes. Hazanavicius avait trop à faire avec l’ouverture de son huitième élevage intensif de poulets et surtout n’avait pas été séduit par le scénario. Bedos a dû se dire qu’il allait faire le film qu’Hazanavicius allait regretter de ne pas avoir fait.\r\n<br><br>\r\nLe film nous propose en entrée une parodie de film d’action américain. C’est bien fait, tellement bien fait que ça provoque un malaise chez le spectateur qui se demande où est passé l’OSS 117 avec lequel il avait rendez-vous. Sur le papier c’est censé créer un gap émotionnel chez le spectateur (vous avez vu à quoi vous avez échappé ?), proposer une parodie référencée (c’est l’un des marqueurs de la franchise franchouillée), préparer cette histoire de livraison d’armes qui va devenir le point névralgique nécessaire et suffisant à traiter d’urgence, et enfin assoir la légende du héros qui va bientôt rencontrer son admirateur et boulet en la personne de Pierre Niney. Mais ces considérations théoriques n’empêchent pas le spectateur de rester sur sa réserve (sa réserve africaine, bien sûr).\r\n<br><br>\r\nIl était tentant de faire vieillir OSS 117 pour confronter son impuissance à la libération de la femme et de l’Afrique. Mais une partie des spectateurs sont perdus car au lieu de s’en sortir avec panache, le personnage encaisse et morfle, même si en définitive il reste dans le déni.\r\n<br><br>\r\nPar ailleurs, la libération de la femme blanche de service se résume à quitter son âne impuissant pour un zèbre certes à la féminité plus assumée, mais surtout plus jeune et plus vigoureux. La femme se transforme en homme et l’homme en femme. La féminité a fait long feu mais n’aura été qu’un fantasme. C’est bien vu mais tout cela n’est pas très bon pour le moral. Cette vision de la femme en homme comme les autres est difficile à avaler mais on ne peut pas reprocher à Bedos de nous l’avoir proposée. Tous les spectateurs n’encaisseront pas, d’autant plus que cette vision n’est pas explicite et n’est pas mise en scène avec l’humour et la mauvaise fois qu’elle mériterait (il n’est pas impossible qu’elle soit le fruit de mon imagination intellectualisante).\r\n<br><br>\r\nLa libération de la femme noire passe quant à elle par la case prison après quelques tentatives de rapprochement peu convaincantes, sinon pathétiques.\r\n<br><br>\r\nMalgré le budget considérable et les animaux de la savane, l’Afrique reste curieusement absente, on ne voyage pas. Bedos veut-il nous faire croire qu’il s’intéresse plus aux femmes qu’à l’Afrique ? Hélas, on a vu, concernant les femmes, combien nous sommes restés sur notre faim. « C’est tout de même un comble au pays des anthropophages où la nourriture abonde ! » J’espère que vous goûtez cet humour noir ? Cette tirade n’est heureusement pas de moi, elle est extraite du film (je plaisante).\r\n<br><br>\r\nAlors on se recentre sur le duo Dujardin-Niney qui est censé tenir à distance les ratiocineurs. Encore un essai périlleux que d’avoir fait de chacun de ces deux personnages le boulet de l’autre. Dans les films à boulet, il y a un boulet et un abominable homme des neiges, un Auguste et un clown blanc. C’est assez de matière pour tenir une heure trente. Que se passe-t-il quand on met ensemble deux Augustes ? On doit se débarrasser de l’un d’eux en le jetant aux crocodiles (c’est une image), je veux dire, de la façon la plus inadmissible qui soit. Et le clown qui reste se retrouve seul (comme le spectateur) et a bien du mal à se reconstruire. Était-ce une leçon de cinéma à deux balles démontrant ce qu’il ne faut pas faire, en tous cas pas de cette façon ? Le spectateur a-t-il été pris en otage, voire pour un demeuré ? Je ne vous en dis pas plus tellement je m’en voudrais d’affaiblir l’intensité du malaise que vous allez ressentir face à cette incongruité magistrale (ce n’est pas si fréquent, merci à Bedos pour ce moment). Coupable d’avoir trahi le spectateur (vous saurez comment en allant voir le film), le personnage en question subit le sort qu’on réserve aux traitres nazis.\r\n<br><br>\r\nSi cette interprétation n’est pas le fruit de mon imagination intellectualisante (toujours elle), nous attaquons le troisième degré (n’allez toutefois pas jusqu’à penser qu’Alerte rouge en Afrique noire est un remake d’Inception), ce qui demande beaucoup d’effort à un spectateur qui était venu au départ pour se faire secouer les trippes.\r\n<br><br>\r\nJe ne suis pas sûr que cet éparpillement intellectuel puisse trouver sa place dans un film, même en sortant les rallonges (116 minutes). On n’écrit pas un film comme on écrit un livre. Le film doit bénéficier d’une certaine évidence, diffuse ou fulgurante, mais limpide. Le personnage peut se permettre de partir en vrille mais pas le film (c’est le grand professionnel qui vous parle).\r\n<br><br>\r\nJe termine sur un exemple plus concret de ce qui ne m’a pas déplu, pour vous donner envie d’aller voir le film (de toutes façons vous serez bien obligés si vous voulez entrer dans la polémique).\r\nDans Le Caire, nid d’espions, OSS 117 est assis devant son patron à la table d’un restaurant. C’est juste avant d’apprendre la mort de son ami Jack Jefferson qui ne donne plus de nouvelles depuis un mois. Le patron est en train d’ouvrir une enveloppe contenant une information de première main censée les éclairer sur la disparition de Jack. Incapable de se concentrer plus de 0,07 seconde, OSS 117 tend le doigt vers le bec pointu d’une volaille empaillée qui se trouve là (on trouve ce genre d’objet dans les restaurants). Si OSS 117 était normal, on pourrait expliquer ce comportement par une tentative pour dissiper son appréhension, mais OSS 117 n’a aucune appréhension. Il ne va pas jusqu’au bout de son geste car il est interrompu par le « Grand dieu ! » du boss. Outre son incapacité à la moindre concentration, ce geste de l’agent traduit sa propension à se fourrer dans la gueule du loup (cette attirance pour le danger), et suggère une homosexualité refoulée de bon aloi (nous parlerons des agent double une autre fois). Lorsque son patron lui met sous le nez la photo du cadavre de son ami Jack, OSS 117 se remémore, avec une tête d’imbécile heureux, une partie de jokari en maillot de bain qui se termine par de viriles empoignades, couvert de sable façon escalope de veau à la milanaise, dans un concert d’éclats de rire masculins à gorges déployées.\r\n<br><br>\r\nDans ce contexte, le geste inachevé d’OSS 117 se trouve au centre d’un réseau de tensions sémantiques complexe.\r\n<br><br>\r\nDeux scènes miroir similaires consécutives ont lieu dans Alerte rouge en Afrique noire. Vous les trouverez dans la bande annonce tellement elles se veulent emblématiques de ce troisième opus. Le fait qu’elles soient deux et consécutives pourrait être mauvais signe. Mais on échappe au catalogue hors contexte gratuitement déposé dans la boîte aux lettres : ces scènes participent bien de la mise en scène. Pendant que Niney fait un point téléphonique avec Paris dans le hall d’un hôtel – il ne comprend pas la stratégie d’OSS 117 qui a l’art de tout faire foirer -, Dujardin, pour répondre par l’insolence aux inquiétudes de Niney, mime un rire silencieusement impertinent face à un massacre d’hyène (comme chez OSS 117, le rire chelou est le propre de l’hyène africaine, c’est rigolo). Dujardin en rajoute une couche en se déplaçant devant un second massacre, celui d’un zèbre, dont il prend l’air satisfait, tout en approchant lentement le doigt en direction du museau de l’animal. Le doigt de la star disparaît à l’intérieur du naseau . Dans un coin de notre tête il y a un « toi, mon petit bonhomme, je te le mets bien profond » qui clignote. Était-il nécessaire d’ajouter ce bruitage de bouchon qu’on sépare de sa bouteille, lorsque Dujardin retire son doigt pour rejoindre Niney ? Probablement la tentation des effets spéciaux, la technique offre tellement de possibilités… Je vous laisse seul juge. Vous noterez toutefois que le tissu sémantique est plus lâche que dans le premier opus, malgré nos tentatives de voir un clin d’œil côté Jardin.[1] On fait ici dans le symbolisme farceur assez facile. Mais, bon… On en reparlera quand vous aurez vu le film.\r\n<br><br>\r\n[1] Jeu de mots avec côté jardin (théâtre), Dujardin (fausse piste), et Alexandre Jardin, auteur du roman Le zèbre, une tentative de sauvetage d’un couple qui bat de l’aile, mise en scène par Jean Poiret dans le film adapté de ce roman éponyme ; la question étant de savoir s’il va être possible de revivre la passion des débuts avec cet opus d’OSS 117 !\r\n\r\n', 0, 'inline', 1675367921, 1675416537, 'cma'),
(19, 'Les expressions franco-africaines', 'view/pictures/afrique.JPG', 'Les expressions des pays francophones africains sont particulièrement savoureuses. Faites votre marché (« Bon appétit, Messieurs ! ») et surtout inspirez-vous en pour créer vos propres expressions.', 'Le soir venu, les deux jeunes mariés décident de prendre le onze pour aller danser la moule devant l’une des dernières pagodes de Nichonville encore ouvertes en cette saison – au prix de sacs de ciment livrés sans commune mesure à l’administration niçoise. Il y a là toute une faune de zouaves qui dallassent en cirant les airs, se serrant l’os et se touchant l’ambassadeur. Ils ont débarqué dans leurs tétanos, accompagnés de leurs vibreuses qui s’échangent leurs noms de caresse en décolleté cinq-sous, bijoux japons et dessous climatisés. Des margouillats se font jongler par des échangères, au jeu cousu de gros sel de l’amour commercial. Quelque mécanisés sont venus s’encanailler avec leur deuxième bureau.\r\n<br>\r\nUne typesse en mini-boubou avec les dents dehors installe les deux tourtereaux à une table en bois sous un parasol en paille synthétique marron clair. La boyerie de cette garcerie leur apporte du pain chargé au poulet camemberisé avec du jus de piment, accompagné d’eau à ressort, de quelques allumettes d’un rhum à tomber sans glisser et de pisse d’araignée. À quelques pas, un citoyen cou-plié aux oreilles rouges se fait couper les lèvres par une longtemps bien flanquée au décolleté nombril, qui parle plusieurs bouches en remuant son train-arrière au ras des assiettes en carton.\r\n<br>\r\nQuelques conjecturés déficitaires et plusieurs femmes floues kaotent au bord de cette ambiance improvisée, buvant des cigarettes avec des mines de filles qui viennent de voir la lune. Une bande d’enfants de Monoprix aux ordres de quelques déjà, rode à l’affut dont ne sait quoi. Un deux doigts circule entre les couples serrés en se dandinant. Un grand gars qui a mangé de la ferraille repère son manège et le prend en chasse. Un couple s’éloigne parfois pour aller au fleuve, ou visiter le bas-zaïre.\r\n<br>\r\n̶    Elle est nylon marmite ta toquante !<br>\r\n̶    Ce mois-ci je suis machine.<br>\r\n̶    Moi je manque de FAC présentement.<br>\r\n<br>\r\nC’est ce genre de palabres qu’on peut surprendre entre les mesures chaloupées de la musique afro-cubaine. De l’autre côté de la mer il y a l’Afrique zondomisée par les Bounty, où des mange-pays font régner un ordre assassin. On peut toujours rêver. Aimer qui ne t’aime pas, c’est aimer la pluie qui tombe dans la forêt. Un orage disperse cette petite foule qui disparaît dans un fracas de galets.\r\n', 0, 'draft', 0, 1675411602, 'cma'),
(20, 'L’énigme', 'view/pictures/nous.jpg', 'Les inspecteurs Bachi et Bouzouk sont attablés à la terrasse de l’auberge La Marée. Une succession qui a mal tourné a conduit ces deux acolytes de la PJ à cette station balnéaire de la côte bretonne. Bachi a commandé une bière brune, Bouzouk une bière blonde. Comme on dit dans le métier, ils prennent la température.', 'Les inspecteurs Bachi et Bouzouk sont attablés à la terrasse de l’auberge La Marée. Une succession qui a mal tourné a conduit ces deux acolytes de la PJ à cette station balnéaire de la côte bretonne. Bachi a commandé une bière brune, Bouzouk une bière blonde. Comme on dit dans le métier, ils prennent la température.\r\n<br><br>\r\nOn est hors saison. Les mouettes jouent à pile ou face dans le casino des airs. Ça sent le sel et le varech. Le vent soulève les coins de la nappe en papier que des pinces en acier empêchent de s’envoler.<br>\r\n‒ Mon cher Bachi, j’ai une énigme à vous soumettre, s’anime Bouzouk.<br>\r\n‒ Vous n’avez donc pas dormi ?<br>\r\n‒ Peu… Voilà, il faut trouver un mot de quatre lettres, toutes différentes. Si, au lieu d’écrire la dernière lettre à sa place habituelle, vous l’écrivez au début du mot, alors je pourrai lire le même mot. Par exemple, « user » donne « ruse », mais ce n’est pas la solution.<br>\r\n‒ Pourtant la ruse est souvent le fruit de l’usure, objecte Bachi : dix ans de siège avant le cheval de Troie. Je ne voudrais pas vous vexer Bouzouk mais votre énigme ressemble plus à une devinette. Ah ! Voilà les Saint-Jacques !\r\n<br><br>\r\nA la fin du repas, devant le chigodenn, submergé par une vague de tendresse qu’il n’a pas vu venir, Bachi prononce les paroles suivantes.<br>\r\n‒ La réponse à votre énigme, c’est nous, mon cher Bouzouk. C’est par la fin que nous commençons notre travail : on fait appel à nous lorsque le mal est fait ! Et c’est la conjugaison de nos points de vue diamétralement opposés qui permet la résolution de toutes ces énigmes.<br>\r\nBouzouk écarte de sa lourde paupière le petit crustacé de perplexité que les paroles de son collègue font danser dans son cristallin.<br>\r\n‒ Dois-je en conclure que vous avez trouvé la solution, Bachi ?<br>\r\n‒ Vous me décevez, Bouzouk. Je vous ai répondu, il me semble.\r\n<br><br>\r\n<h3> Solution du casse-tête </h3>\r\nComme l’a dit Bachi à Bouzouk : « la réponse à votre énigme, c’est nous ». Bachi écrivit « snou » en script sur la nappe en papier et Bouzouk, qui était assis en face de lui, pu lire la réponse qu’il attendait : « nous ».', 0, 'draft', 0, 1675420475, 'cma'),
(21, 'Les doigts chauds de Tripolo (un conte)', 'view/pictures/tripolo.jpg', 'J’ai écrit ce conte après avoir consulté l’étymologie et l’histoire du mots lotus (voir en fin d’article). De proche en proche je suis tombé sur lotier, lotte et loto. En mixant les thèmes et les champs lexicaux du jeu, du poisson phallique et de l’oubli, j’ai imaginé ce conte à deux balles. Un conte étymologique en quelque sorte !', 'Il était une fois un roi qui se nommait Nélombo.\r\n<br><br>\r\nC’était le roi d’un tout petit pays qui prospérait sur le littoral africain de Tune facile (mon dieu qu’il était petit).\r\n<br><br>\r\nLes hommes de cette belle contrée étaient coiffés de couronnes de lotier, dit trèfle cornu. Ils passaient le plus clair de leur temps à jouer à des jeux de hasard pendant que leurs femmes faisaient l’amour avec un poisson à la chair ferme et appréciée, au corps cylindrique, à peau épaisse, gluante et couverte d’écailles.\r\n<br><br>\r\nUn beau jour, le poisson d’amour se fit plus rare. Les bains de mer perdirent peu à peu leur attrait. \r\n<br><br>\r\nUn grand désordre advint dans le royaume.\r\n<br><br>\r\nNélombo consulta son très spirituel premier vizir qui n’était jamais le dernier, et qui eut ce mot : « Sir, on est dans de beaux droits ! »\r\n<br><br>\r\nIl n’était pas plus avancé mais Nélombo ne recula pas par quatre chemins, il se rendit aux bains-douches pour demander conseil à la sage Mélilotte, sa femme, qui parla en ses thermes :\r\n<br><br>\r\n– Nélombo mon mari et meilleur époux du royaume, tendre et vénéré marital concubain, il ne faut pas rêver, le poisson d’amour est parti, il ne reviendra pas. Tu dois sur l’heure mandater ton plus sûr messager auprès de Tripolo les doigts chauds, cet homme qui vit aux confins du Désert sans qualité, pour te procurer le fruit de l’oubli. Nous en ferons manger à toutes les femmes du royaume afin qu’elles oublient leurs plaisirs passés et reprennent goût à la vie.<br>\r\n– Comme tes paroles sont sages se réjouit Nélombo, je m’en vais quérir le véloce Archémion.\r\n<br><br>\r\nIl fallut faire tous les casinos de la côte avant de ramener un Archémion fébrile mais concentré néanmoins.\r\n<br><br>\r\n– Archémion, acceptes-tu cette mission qui consiste à rapporter le fruit de l’oubli en quantité nécessaire et suffisante ? Tu devras te le procurer auprès de Tripolo les doigts chauds. Il te faudra donc traverser le Désert sans qualité dans les deux sens.<br>\r\n– J’accepte la mission Ô Nélombo notre roi, et je me le tiens pour dit.<br>\r\n– Parfait, écoute encore ceci, en échange du fruit de l’oubli, tu remettras à Tripolo ces rondelles de lotte séchée que ma femme a préparées. Surtout n’en consomme pas, tu compromettrais définitivement l’avenir du royaume. Pars sur l’heure, je n’ai pas de fille à t’offrir en mariage mais j’ai des actions dans tous les casinos de la côte.\r\n<br><br>\r\nA peine eût-il passé les portes de la ville, Archémion le véloce ouvrit le petit sac et goutta au poisson séché de Mélilotte. Peuchère comme c’est gouteux s’exclama le fidèle messager, et le sac fut vidé en un instant. Inutile dans ces conditions de poursuivre plus avant ma mission, raisonna le gourmet, je dois maintenant accepter mon festin. Archémion emplit le sac de sable chaud et rentra tôt au palais.\r\n<br><br>\r\n– Je savais que je pouvais te faire confiance lui ouvrit ses bras Nélombo. Alors comment va ce cher Tripolo ?<br>\r\n– Il a toujours les doigts aussi chauds, marqua un point Archémion. <br>\r\n– Bon, c’est pas tout ça, il faut penser à nos femmes. Mais qu’elle est cette poudre que tu rapportes ?<br>\r\n– C’est pour mieux le transporter que Tripolo a réduit en poudre le précieux fruit. L’oubli, a-t-il déclaré, est semblable au sable du désert, autant en emporte le vent. <br>\r\n– Que de sages paroles mon véloce ! La distribution en sera facilitée : nous allons jeter cette poudre dans l’eau des puits et le tour sera joué.\r\n<br><br>\r\nLa vie continua sans notable désordre au royaume de Tune facile. Mais c’est depuis ce temps que les hommes sont persuadés que les femmes ont la faculté d’oublier.\r\n<br><br>\r\nMorale : on peut toujours compter sur les doigts chauds de Tripolo.', 0, 'draft', 0, 1675423609, 'cma');

-- --------------------------------------------------------

--
-- Structure de la table `article_theme`
--

DROP TABLE IF EXISTS `article_theme`;
CREATE TABLE IF NOT EXISTS `article_theme` (
  `idarticle` int NOT NULL,
  `idtheme` int NOT NULL,
  KEY `CIR_ARTICLE-THEME_ARTICLE` (`idarticle`),
  KEY `CIR_ARTICLE-THEME_THEME` (`idtheme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'draft',
  `contentmodif` tinyint(1) DEFAULT '0',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creationdate` bigint NOT NULL,
  `lastmodificationdate` bigint NOT NULL DEFAULT '0',
  `firstpublicationdate` bigint NOT NULL DEFAULT '0',
  `idarticle` int NOT NULL,
  `loginuser` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CIR_COMMENT` (`idarticle`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `status`, `contentmodif`, `content`, `creationdate`, `lastmodificationdate`, `firstpublicationdate`, `idarticle`, `loginuser`) VALUES
(43, 'inline', 0, 'Je n\'ai pas trouvé d\'ouvrages de cet auteur aux éditions Plon.', 1675367189, 0, 1675367288, 13, 'chr'),
(44, 'inline', 0, 'J\'ai finalement trouvé un recueil de nouvelles d\'occasion sur internet.', 1675367246, 0, 1675367289, 13, 'chr'),
(45, 'draft', 0, 'Très drôle en effet. Je vous recommande dans le même esprit \"L\'astrologie des insectes\" de François Mourelet et \"How to Attract the Wombat\" de Will Cuppy.', 1675369689, 0, 0, 15, 'chr'),
(46, 'draft', 0, 'Vous êtes dur avec Bedos.', 1675375692, 0, 0, 16, 'chr2'),
(47, 'inline', 1, 'Dans un prochain article, je communiquerai un petit lexique où vous trouverez l\'explication de toutes ces expressions. En attendant je laisse travailler votre imagination.', 1675411717, 1675412022, 1675411750, 19, 'cma');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'user',
  `status` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'actif',
  `avatar` varchar(60) DEFAULT NULL,
  `avatarstatus` varchar(2) NOT NULL DEFAULT 'ko',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `psw`, `type`, `status`, `avatar`, `avatarstatus`) VALUES
('chr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user', 'actif', NULL, 'ko'),
('chr2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user', 'actif', NULL, 'ko'),
('cma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 'actif', NULL, 'ko');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_theme`
--
ALTER TABLE `article_theme`
  ADD CONSTRAINT `CIR_ARTICLE-THEME_ARTICLE` FOREIGN KEY (`idarticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `CIR_ARTICLE-THEME_THEME` FOREIGN KEY (`idtheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `CIR_COMMENT` FOREIGN KEY (`idarticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;