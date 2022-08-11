<?php
$sitesArray = scandir(DIRECTORY_SEPARATOR . "var" . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR);
$source = "Site,CMS,Version,Beta\n";

for ($i = 0; $i < count($sitesArray); $i++) {

    $path = DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR . $sitesArray[$i] . DIRECTORY_SEPARATOR . "public_html" . DIRECTORY_SEPARATOR;

//WORDPRESS version file
    $wordpressFilePath = $path . "wp-includes/version.php";
//JOOMLA version file
    $joomlaFilePath = $path . "language/pt-BR/pt-BR.xml";
//DRUPAL version file
    $drupalFilePath = $path . "CHANGELOG.txt";
//OJS version file
    $ojsFilePath = $path . "tools/upgrade.php";

    switch ($path) {
        case file_exists($wordpressFilePath):
            $re = '/(\$wp_version = \')|(\';)/m';
            $wordpressCommand = shell_exec("grep '\$wp_version =' " . $wordpressFilePath);
            $subst = '';
            $result = preg_replace($re, $subst, $wordpressCommand);
            $source .= "$sitesArray[$i],WORDPRESS," . $result;
            break;
        case file_exists($joomlaFilePath):
            $re = '/(\s{0,}<version>)|(<\/version>)/m';
            $joomlaCommand = shell_exec("grep '<\/version>' " . $joomlaFilePath);
            $subst = '';
            $result = preg_replace($re, $subst, $joomlaCommand);
            $source .= "$sitesArray[$i],JOOMLA," . $result;
            break;
        case file_exists($drupalFilePath):
            $drupalCommand = shell_exec("grep -m1 -e Drupal " . $drupalFilePath);
            $re = '/(Drupal )|(, \d{0,4}-\d{0,2}-\d{0,2})/m';
            $str = $drupalCommand;
            $subst = '';
            $source .= "$sitesArray[$i],DRUPAL," . preg_replace($re, $subst, $str);
            break;
        case file_exists($ojsFilePath):
            $ojsCommand = shell_exec("php $ojsFilePath check | grep 'Code version:'");
            $source .= "$sitesArray[$i],OJS," . trim(str_replace('Code version:      ', "", $ojsCommand), "");
            break;
        default:
            $source .= "$sitesArray[$i],Unknown,Unknown\n";
    }
}

$file = fopen('cmsVersion.csv', 'w');
fwrite($file, $source);
fclose($file);