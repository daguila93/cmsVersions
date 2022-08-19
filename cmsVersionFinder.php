<?php
$sitesArray = scandir(DIRECTORY_SEPARATOR . "var" . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR);
$source = "Site,CMS,Version,Beta\n";

foreach ($sitesArray as $site) {
    if ($site === "." || $site === ".." || strpos($site, "www.") === false) {
        unset($sitesArray[array_search($site, $sitesArray)]);
    }
}

foreach($sitesArray as $site){
    $path = DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR . $site . DIRECTORY_SEPARATOR . "public_html" . DIRECTORY_SEPARATOR;

//WORDPRESS version file
    $wordpressFilePath = $path . "wp-includes/version.php";
//JOOMLA version file
    $joomlaFilePath = $path . "language/pt-BR/pt-BR.xml";
//DRUPAL version file
    $drupalFilePath = $path . "CHANGELOG.txt";
//DRUPAL version file
    $drupal9FilePath = $path . "core/lib/Drupal.php";
//OJS version file
    $ojsFilePath = $path . "dbscripts/xml/version.xml";
//MOODLE version file
    $moodleFilePath = $path . "version.php";

    switch ($path) {
        case file_exists($wordpressFilePath):
            $re = '/(\$wp_version = \')|(\';)/m';
            $wordpressCommand = shell_exec("grep '\$wp_version =' " . $wordpressFilePath);
            $subst = '';
            $result = preg_replace($re, $subst, $wordpressCommand);
            $source .= "$site,WORDPRESS," . $result;
            break;
        case file_exists($joomlaFilePath):
            $re = '/(\s{0,}<version>)|(<\/version>)/m';
            $joomlaCommand = shell_exec("grep '<\/version>' " . $joomlaFilePath);
            $subst = '';
            $result = preg_replace($re, $subst, $joomlaCommand);
            $source .= "$site,JOOMLA," . $result;
            break;
        case file_exists($drupalFilePath):
            $drupalCommand = shell_exec("grep -m1 -e Drupal " . $drupalFilePath);
            $re = '/(Drupal )|(, \d{0,4}-\d{0,2}-\d{0,2})/m';
            $str = $drupalCommand;
            $subst = '';
            $source .= "$site,DRUPAL," . preg_replace($re, $subst, $str);
            break;
        case file_exists($drupal9FilePath):
            $drupalCommand = shell_exec("grep -m1 -e VERSION " . $drupal9FilePath);
            $re = '/(..const VERSION = \')|(\';)/m';
            $str = $drupalCommand;
            $subst = '';
            $result = preg_replace($re, $subst, $str);
            $source .= "$site,DRUPAL," . $result;
            break;
        case file_exists($ojsFilePath):
            $ojsCommand = shell_exec("grep '<release' " . $ojsFilePath);
            $re = '/(\s)|(<release>)|(<\/release>)/m';
            $str = $ojsCommand;
            $subst = '';
            $result = preg_replace($re, $subst, $str);
            $source .= "$site,OJS,$result\n";
            break;
        case file_exists($moodleFilePath):
            $re = '/(\$release  = \')|( \(.{0,})/m';
            $moodleCommand = shell_exec("grep '\$release' $moodleFilePath");
            $subst = '';
            $result = preg_replace($re, $subst, $moodleCommand);
            $source .= "$site,MOODLE,$result";
            break;
        default:
            $source .= "$site,Unknown,Unknown\n";
    }
}
$file = fopen('cmsVersion.csv', 'w');
fwrite($file, $source);
fclose($file);
