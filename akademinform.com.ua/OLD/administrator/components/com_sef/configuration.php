<?php
/**
 * SEF component for Joomla! 1.5
 *
 * @author      ARTIO s.r.o.
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @version     3.1.0
 * @license     GNU/GPLv3 http://www.gnu.org/copyleft/gpl.html
 */

$alwaysUseLang = "1";
$enabled = "1";
$replacement = "-";
$pagerep = "-";
$stripthese = ",|~|!|@|%|^|*|(|)|+|<|>|:|;|{|}|[|]|---|--|..|.";
$suffix = "";
$addFile = "";
$friendlytrim = "-|.";
$canonicalLink = true;
$pagetext = "JText::_('PAGE')-%s";
$langPlacement = "0";
$lowerCase = "1";
$useAlias = "0";
$excludeSource = "0";
$reappendSource = "0";
$ignoreSource = "1";
$appendNonSef = "1";
$transitSlash = "1";
$useCache = "1";
$cacheSize = "1000";
$cacheMinHits = "10";
$cacheRecordHits = false;
$cacheShowErr = false;
$translateNames = "1";
$page404 = "0";
$record404 = "0";
$template404 = true;
$showMessageOn404 = false;
$use404itemid = false;
$itemid404 = 0;
$nonSefRedirect = "1";
$useMoved = "1";
$useMovedAsk = "1";
$replacements = "Á|A, Â|A, Å|A, Ă|A, Ä|A, À|A, Æ|A, Ć|C, Ç|C, Č|C, Ď|D, É|E, È|E, Ë|E, Ě|E, Ì|I, Í|I, Î|I, Ï|I, Ĺ|L, ľ|l, Ľ|L, Ń|N, Ň|N, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ø|O, Ŕ|R, Ř|R, Š|S, Ś|O, Ť|T, Ů|U, Ú|U, Ű|U, Ü|U, Ý|Y, Ž|Z, Ź|Z, á|a, â|a, å|a, ä|a, à|a, æ|a, ć|c, ç|c, č|c, ď|d, đ|d, é|e, ę|e, ë|e, ě|e, è|e, ì|i, í|i, î|i, ï|i, ĺ|l, ń|n, ň|n, ñ|n, ò|o, ó|o, ô|o, ő|o, ö|o, ø|o, š|s, ś|s, ř|r, ŕ|r, ť|t, ů|u, ú|u, ű|u, ü|u, ý|y, ž|z, ź|z, ˙|-, ß|ss, Ą|A, µ|u, Ą|A, µ|u, ą|a, Ą|A, ę|e, Ę|E, ś|s, Ś|S, ż|z, Ż|Z, ź|z, Ź|Z, ć|c, Ć|C, ł|l, Ł|L, ó|o, Ó|O, ń|n, Ń|N, А|A, а|a, Б|B, б|b, В|V, в|v, Г|G, г|g, Д|D, д|d, Е|E, е|e, Ж|Zh, ж|zh, З|Z, з|z, И|I, и|i, Й|Y, й|y, К|K, к|k, Л|L, л|l, М|M, м|m, Н|N, н|n, О|O, о|o, П|P, п|p, Р|R, р|r, С|S, с|s, Т|T, т|t, У|U, у|u, Ф|F, ф|f, Х|Ch, х|ch, Ц|Ts, ц|ts, Ч|Ch, ч|ch, Ш|Sh, ш|sh, Щ|Sch, щ|sch, Ы|I, ы|i, Э|E, э|e, Ю|U, ю|iu, Я|Ya, я|ya, Ъ| , ъ| , Ь| , ь|";
$predefined = array('0' => "com_login",'1' => "com_newsfeeds",'2' => "com_sef",'3' => "com_weblinks",'4' => "com_joomfish");
$serverUpgradeURL = "http://www.artio.cz/updates/joomsef3/upgrade.zip";
$serverNewVersionURL = "http://www.artio.cz/updates/joomla/joomsef3/version";
$serverAutoUpgrade = "http://www.artio.net/joomla-auto-upgrade";
$serverLicenser = "http://www.artio.net/license-check";
$langDomain = array();
$altDomain = null;
$disableNewSEF = "0";
$dontRemoveSid = "0";
$setQueryString = "1";
$parseJoomlaSEO = true;
$customNonSef = "";
$jfBrowserLang = true;
$jfLangCookie = true;
$jfSubDomains = array();
$contentUseIndex = true;
$checkJunkUrls = true;
$junkWords = "http:// http// https:// https// www. @";
$junkExclude = "";
$preventNonSefOverwrite = true;
$mainLanguage = 0;
$allowUTF = false;
$numberDuplicates = false;
$artioUserName = "";
$artioPassword = "";
$artioDownloadId = "";
$trace = "0";
$traceLevel = "3";
$autoCanonical = true;
$sefComponentUrls = false;
$versionChecker = 0;
$tag_generator = "";
$tag_googlekey = "";
$tag_livekey = "";
$tag_yahookey = "";
$customMetaTags = array();
$wwwHandling = 0;
$enable_metadata = true;
$prefer_joomsef_title = true;
$use_sitename = 2;
$sitename_sep = "-";
$rewrite_keywords = true;
$rewrite_description = true;
$prevent_dupl = true;
$check_base_href = 1;
$sitemap_changed = true;
$sitemap_filename = "sitemap";
$sitemap_indexed = false;
$sitemap_frequency = "weekly";
$sitemap_priority = "0.5";
$sitemap_show_date = true;
$sitemap_show_frequency = true;
$sitemap_show_priority = true;
$sitemap_pingauto = true;
$sitemap_yahooId = "";
$sitemap_services = array('0' => "http://blogsearch.google.com/ping/RPC2",'1' => "http://rpc.pingomatic.com/");
$external_nofollow = false;
$internal_enable = true;
$internal_nofollow = false;
$internal_newwindow = false;
$internal_maxlinks = 1;
$artioFeedDisplay = true;
$artioFeedUrl = "http://www.artio.net/joomsef-news/rss";
$fixIndexPhp = true;
$fixQuestionMark = true;
$fixDocumentFormat = false;
$useGlobalFilters = true;
$spaceTolerant = true;
$redirectJoomlaSEF = true;
?>